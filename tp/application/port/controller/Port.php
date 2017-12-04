<?php
namespace app\port\controller;

use think\Request;
use think\Config;
use think\Controller;

class Port
{
    // 手机接口
    public function cellphone() {
        $phone  = Request::instance()->get('tell');
        $appKey = Config::get('AppKey');
        $tempid = Config::get('Tempid');
        $sign = Config::get('Sign');
        $rand = mt_rand(1000,9999);
        $exist = Db('user')->where('user_tel',$phone)->find();

        if (!empty($exist)) {
            $url = "http://api.k780.com/?app=sms.send&tempid=".$tempid."&param=code%3D".$rand."&phone=".$phone."&appkey=".$appKey."&sign=".$sign."&format=json";
            $data = file_get_contents($url);
            $data = json_decode($data); 
            //返回加密的验证码 以及 手机号查询状态 
            $code = sha1(md5($rand).$phone);
            $data = ['res'=>$data,"code"=>$code];
        }else{
            $data['success'] = "1";
            $data['msg'] = "已注册";
        }
        return json_encode($data);
    }
}
