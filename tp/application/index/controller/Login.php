<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Config;

class Login extends Controller
{
	//登陆
    public function login() {
        return $this->fetch("login");
    }

    //注册
    public function register() {  
    	$str = "/financial/public/index.php/";
		  	
		// $a = Config::get("view_replace_str");
		// $static = $a['__static__'];
  //   	echo "<pre>";
		// print_r($_SERVER);
		// die;
    	if (request()->isPost()) {
    		// $user_tel = Request::instance()->post('user_tel');
    		$data = $_POST;

    		p($data);
    	}else{
       		return $this->fetch("register");
    	}
    }


    //验证手机号是否为真
    public function sendtell() {
    	
    	$phone  = Request::instance()->post('user_tel');
    	$AppKey = Config::get('AppKey');
    	$tempid = Config::get('tempid');
    	$sign = Config::get('Sign');
    	$rand = mt_rand(1000,9999);
        $exist = Db('user')->where('user_tel',$phone)->find();

        if (!empty($exist)) {
            $url = "http://api.k780.com/?app=sms.send&tempid=".$tempid."&param=code%3D".$rand."&phone=".$phone."&appkey=".$AppKey."&sign=".$sign."&format=json";
            $data = file_get_contents($url);
            $data = json_decode($data); 
            //返回加密的验证码 以及 手机号查询状态 
            $code = sha1(md5($rand).$phone);
            $data = ['res'=>$data,"code"=>$code];
        }else{
            $data['success'] = "1";
            $data['msg'] = "已注册";
         }
    	
        
        echo json_encode($data);
    }

























    //协议
    public function protocol() {
    	return $this->fetch("protocol");
    }

}
