<?php
namespace app\index\model;

use think\Db;//引入Db
use think\Model;//引入Model

/**
* 
*/
class Usemoneys extends Model
{
	
	protected $tableName = 'money_user';
	
	function getuserinfo($uid){
		return Db::table('user_true_info')->where("user_id",$uid)->where('true_status',1)->find();
	}
	function insert($data){
		return Db::table($this->tableName)->insert($data);
	}
	function getuser($uid,$status){
		return Db::table($this->tableName)->where('status',$status)->where('user_id',$uid)->find();
	}
	function getlist($uid){
		$res=Db::table($this->tableName)->where('status',1)->where('user_id',$uid)->find();
		$time=time();
		
		
		if ($res['money_type']==1) {
			
			$money=$res['money_number']/3;
			$rate=0.03;
		}else if ($res['money_type']==2) {
			
			$money=$res['money_number']/6;
			$rate=0.05;
		}else{
			
			$money=$res['money_number']/12;
			$rate=0.07;
		}
		for ($i=0; $i <$res['money_num'] ; $i++) { 
			$time=strtotime('+1 month',$time);
			$data[$i]['time']=date("Y-m-d",$time);
			$data[$i]['money']=sprintf('%.2f',$money*$rate+$money);
			$data[$i]['back']=sprintf('%.2f',$rate*$money);
			
		}
		return $data;
	}
}

?>