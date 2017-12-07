<?php
namespace app\port\controller;

use think\Request;
use think\Config;
use think\Controller;
use think\Db;
use think\Cookie;
use think\Session;
use app\port\model\LoginModel;

class Login
{
    /**
     * [login 登陆接口]
     * @return [type] [json]
     */
    public function login(){
        $user_name = Request::instance()->get('user_name');
        $user_pwd = Request::instance()->get('user_pwd');
        $user_model = new LoginModel();
        $sql = "user_tel = '$user_name' AND user_pwd = '$user_pwd' OR user_name = '$user_name' AND user_pwd = '$user_pwd'  OR user_email = '$user_name'  AND user_pwd = '$user_pwd' ";
        $user = $user_model -> find_query($sql);
        $data = array("user_name"=>$user_name,"user_id"=>$user['user_id']);
        Session::set('users',$data);
        $cookie = serialize($data);
        Cookie::set('users',$cookie,6200); 
        echo json_encode($user);
    }

    /**
     * [register 注册接口]
     * @return [type] [json]
     */
    public function register(){

    }

   /**
    * [cellphone 短信验证接口]
    * @return [type] [json]
    */
    public function cellphone() {
        $phone  = Request::instance()->get('tell');
        $appKey = Config::get('AppKey');
        $tempid = Config::get('Tempid');
        $sign = Config::get('Sign');
        $rand = mt_rand(1000,9999);
        $exist = Db('user')->where('user_tel',$phone)->find();
        if (empty($exist)) {
            $url = "http://api.k780.com/?app=sms.send&tempid=".$tempid."&param=code%3D".$rand."&phone=".$phone."&appkey=".$appKey."&sign=".$sign."&format=json";
             
            $data = file_get_contents($url);
            $data = json_decode($data); 
            //返回加密的验证码 以及 手机号查询状态 
            $code = md5($rand.$phone);
            $data = ['res'=>$data,"code"=>$code];
        }else{
            $data['success'] = "1";
            $data['msg'] = "已注册";
        }
        return json_encode($data);
    }
}
