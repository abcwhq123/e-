<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Config;
use think\Captcha;

class Login extends Controller
{
	//登陆
    public function login() {
        return $this->fetch("login");
    }

    //注册
    public function register() {  
    	
		  	
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
    	$site = Config::get('Site');
        $phone  = Request::instance()->post('user_tel');
    	$url = $site."?tell=".$phone;
        $data = file_get_contents($url);
        echo $data;
    }

    public function get_captcha(){    
        $txt_yzm  = Request::instance()->post('code');

        $capthcha = new \think\captcha\Captcha();
        
        if ($capthcha->check($txt_yzm)){
            $json['status'] = "1";
        }else{
            $json['status'] = "2";
            $json['msg'] = "验证码错误！！";
        }
        echo json_encode($json);
    }

    public function md5_code(){
        $tel_code  = Request::instance()->post('tel_code');
        $phone  = Request::instance()->post('user_tel');
        $yzm_code = Request::instance()->post('code');
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
