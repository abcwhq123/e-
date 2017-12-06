<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Users;

class User extends Controller
{
	//首页
    public function index() {
        $user=new Users;
        $res=$user->getuserinfo(1);
        // echo "<pre>";
        // print_r($res);die;
        return $this->fetch("index",['user'=>$res]);
    }

    //充值
    public function recharge() {
        return $this->fetch("recharge");
    }

    // 充值\提现 记录
    public function record() {
        return $this->fetch("record");
    }

    //提现
	public function withdraw() {
        return $this->fetch("withdraw");
    }

    //投资记录
    public function invest() {
        return $this->fetch("invest");
    }

    //安全设置
    public function safety() {
        return $this->fetch("safety");
    }

    //实名认证
    public function autonym() {
    	return $this->fetch("autonym");
    }

    //借款记录
    public function borrow() {
    	return $this->fetch("borrow");
    }

    //修改密码
    public function password() {
    	return $this->fetch("password");
    }

	//修改手机号
    public function tell() {
    	return $this->fetch("tell");
    }




}
