<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Config;
use think\Cookie;
use think\Session;
use think\Captcha;
use app\index\model\LoginModel;
use app\index\components\SaeTClientV2;
use app\index\components\SaeTOAuthV2;

class Login extends Controller
{
	//登陆
    public function login() {
        $weibo = Config::get('weibo');
        $appkey = $weibo['appkey'];
        $appsecret = $weibo['appsecret'];
        $callback_url = $weibo['callback_url'];

        $object = new SaeTOAuthV2( $appkey, $appsecret);
        $code_url = $object->getAuthorizeURL( $callback_url);
        if (request()->isPost()) {
            $user_name = Request::instance()->post('user_name');
            $user_pwd = md5(Request::instance()->post('user_pwd'));
            $site = Config::get('Site');
            $url = $site."login?user_name=".$user_name."&user_pwd=".$user_pwd; 
            $result = file_get_contents($url);
            $res = json_decode($result,true);
            if ($res) {
                echo "<script>alert('登录成功');location.href='/index/index/index'</script>";die;
            }else{
                echo "<script>alert('用户名或密码错误');location.href='/index/login/login'</script>";die;
            }
        }else{
            return $this->fetch("login",['url'=>$code_url]);
        }
    }

    //第三方登陆
    public function Callback(){
        header('content-type:text/html;charset=utf8');
        $weibo = Config::get('weibo');
        $appkey = $weibo['appkey'];
        $appsecret = $weibo['appsecret'];
        $callback_url = $weibo['callback_url'];

        $code = Request::instance()->get('code');
        // 处理回调的信息
        $sea = new SaeTOAuthV2($appkey , $appsecret);
        if ($code) {
            $keys = array();
            $keys['code'] = $code;
            $keys['redirect_uri'] = $callback_url;
            try {
                $token = $sea->getAccessToken( 'code', $keys ) ;
            } catch (Exception $e) {
                throw new NotFoundHttpException;
            }
        }   
        $id= isset($token['uid']) ? $token['uid'] : ""; 
        $token= isset($token) ? $token : ""; 
        $weibo = Db('user_three')->where('three_id',$id)->find();
        
        if (!empty($weibo)) {
            $three_name = $weibo['three_name'];
            $three_id = $weibo['three_id'];
            $data = ['three_name'=>$three_name,'three_user_id'=>$three_id];
            Session::set('users',$data);
            $data = serialize($data);
            Cookie::set('users',$data,6200);
            return $this->fetch("user/index");
        }
        if (!empty($token))
        {
            // 根据token获取个人信息
            $c = new SaeTClientV2( $appkey , $appsecret , $token['access_token'] );
            $uid_get = $c->get_uid();
            $uid = $uid_get['uid'];
            $user_message = $c->show_user_by_id( $uid);
            //去数据库中去看看有没有id 关联的用户信息  没有的话去自动添加一个5388651766
            $user_name=$user_message['screen_name'];
            $weibo_id=$user_message['id'];   
            $three_time=time();
            $data = ['three_type' => '新浪微博', 'three_name' => $user_name , 'three_time' => $three_time, 'three_user_id'=>$weibo_id];
            Db('user_three')->insert($data);
            Session::set('users',$data);
            $data = serialize($data);
            Cookie::set('users',$data,6200);
            
            return $this->fetch("user/index");
        }else{
            $this->redirect("index/index");
        }
    }


    //注册
    public function register() {  
        if (request()->isPost()) {
            $user_tel = Request::instance()->post('user_tel');
            $user_pwd = Request::instance()->post('user_pwd');
            $user_password = Request::instance()->post('user_password');
            $code = Request::instance()->post('code');
            $tel_code = Request::instance()->post('tel_code');
            $tel_code_yz = Request::instance()->post('tel_code_yz');
            // if ($user_password != $user_pwd || empty($code) || $tel_code != $tel_code_yz) {
            //     echo "<script>alert('信息错误');location.href='?r=login/login'</script>";die;
            // }
            // $this -> md5_code();
            $addtime = time();
            $data = ['user_tel' => $user_tel, 'user_pwd' => md5($user_pwd) , 'user_addtime' => $addtime];
            if (Db('user')->insert($data)){
                $user_id = Db('user')->insertGetId($data);
                Cookie::init();
                Cookie::set('user_id' , $user_id,3600);
                Cookie::set('user_name', $user_tel,3600);
                $session = [
                    'user_id'   => $user_id,
                    'user_name'  => $user_tel,
                ];
                Session::set('users',$session);
                echo "<script>alert('注册成功');location.href='?r=index/index/index'</script>";die;
            }
        }else{
            return $this->fetch("register");
        }
    }

    //验证手机号是否为真
    public function sendtell() {
    	$site = Config::get('Site');
        $phone  = Request::instance()->post('user_tel');
    	$url = $site."cellphone?tell=".$phone;
        $data = file_get_contents($url);
        echo $data;
    }
    //验证手机号是否存在
    public function true_tell(){
        $phone  = Request::instance()->get('user_tel');
        $exist = Db('user')->where('user_tel',$phone)->find();
        if (empty($exist)) {
            $json['status'] = 1;
            $json['msg'] = '可以注册';
        }else{
            $json['status'] = 2;
            $json['msg'] = '已注册';
        }
        echo json_encode($json);
    }

    //验证码验证
    public function get_captcha(){    
        $txt_yzm  = Request::instance()->post('code');
        $capthcha = new \think\captcha\Captcha();
        if ($capthcha->check($txt_yzm)){
            $json['status'] = "1";
        }else{
            $json['status'] = "2";
            $json['msg'] = "验证码错误！！";
        }
        // p($json);
        echo json_encode($json);
    }

    public function md5_code(){
        $tel_code  = Request::instance()->post('tel_code');
        $phone     = Request::instance()->post('user_tel');
        $yzm_code  = Request::instance()->post('code');
        $code = md5($tel_code.$phone);

        if ($yzm_code == "") {
            $json['status'] = 2;
            $json['msg'] = "没有发送短信";
        }else{
            if ($yzm_code != $code) {
                $json['status'] = 3;
                $json['msg'] = "验证码错误";
            }else{
                $json['status'] = 1;
            }
        }     
        echo json_encode($json); 
    }
























    //协议
    public function protocol() {
    	return $this->fetch("protocol");
    }

}
