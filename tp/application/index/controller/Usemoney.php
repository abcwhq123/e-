<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Usemoneys;
use think\Request;

class Usemoney extends Controller
{
	public function index(){
		header('content-type:text/html;charset=utf-8');
		// $user=Session::get('users');
		// $user_id=$user['user_id'];
		$user_id=2;
		$money=new Usemoneys;
		$res=$money->getuserinfo($user_id);
		if ($res) {		
			if (request()->isPost()) {
				$data=input();
				if (input('money_type')==1) {
					$data['money_num']=3;
				}else if (input('money_type')==2) {
					$data['money_num']=6;
				}else{
					$data['money_num']=12;
				}
				$data['money_time']=time();
				$data['user_id']=$user_id;
				$res=$money->insert($data);
				if ($res) {
					return $this->fetch('success');
				}else{
					echo "<center><h1>sorry something is wrong !</h1></center>";
				}
			}else{
				$use=$money->getuser($user_id,0);
				$uses=$money->getuser($user_id,1);
				if ($use) {
					return $this->fetch('success');die;
				}else if ($uses) {
					$res=$money->getlist($user_id);
					// echo "<pre>";
					// print_r($uses);die;
					return $this->fetch('back',['list'=>$res,'uses'=>$uses]);die;
				}else{
					return $this->fetch('index');die;
				}
				
			}
			
		}else{
			echo "<script>alert('请完善你的个人信息');location.href='/index/user/autonym'</script>";die;
		}
		
	}
	public function pay(){
		$type=input('type');
		$pid=input('pid');
		return $this->fetch('pay');
	}
	//支付
	public function order(){
		$type=input('type');
		$money=new Usemoneys;
		$uid=2;
		$user=$money->getuser($uid,1);
		
		if ($type==1) {
			if ($user['money_type']==1) {
				$data['pay']=$user['money_number']/3*0.03+$user['money_number']/3;
				$data['down']=$user['money_number']/$user['money_num'];
			}else if ($user['money_type']==2) {
				$data['pay']=$user['money_number']/6*0.05+$user['money_number']/6;
				$data['down']=$user['money_number']/$user['money_num'];
			}else if ($user['money_type']==3) {
				$data['pay']=$user['money_number']/12*0.07+$user['money_number']/12;
				$data['down']=$user['money_number']/$user['money_num'];
			}
		}else if ($type==2) {
			if ($user['money_type']==1) {
				$data['pay']=$user['money_number']*0.03+$user['money_number'];
				$data['down']=$user['money_number'];
			}else if ($user['money_type']==2) {
				$data['pay']=$user['money_number']*0.05+$user['money_number'];
				$data['down']=$user['money_number'];
			}else if ($user['money_type']==3) {
				$data['pay']=$user['money_number']*0.07+$user['money_number'];
				$data['down']=$user['money_number'];
			}
		}else{
			$pay=0;
		}
		$data['pay']=sprintf("%.2f",$data['pay']);
		$data['down']=sprintf("%.2f",$data['down']);
		echo "<pre>";
		print_r($data);
		
	}
	public function more(){
		$money=input('money');
		$type=input('type');
		switch ($type) {
			case '1':
				$data['num']=sprintf("%.2f",$money*0.03);
				break;
			case '2':
				$data['num']=sprintf("%.2f",$money*0.05);
				break;
			case '3':
				$data['num']=sprintf("%.2f",$money*0.07);
				break;
			
			default:
				
				break;
		}
		echo json_encode($data);
	}
}