<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

/**
* 
*/
class Product extends Controller
{
	public function index(){
		// $a=strtotime("2017-12-05 00:00:00");
		// var_dump($a);die;
		$url="http://localhost/bigexcise/e/tp/public/port/product/getproduct?type=all";
		$res=file_get_contents($url);
		$product=json_decode($res,true);
		
		if ($product['error']==200) {
			return $this->fetch("index",["product"=>$product['msg']]);die;
		}else{
			return $this->fetch("index",["product"=>""]);die;
		}
		
	} 
	public function desc(){
		$pid=Request::instance()->get('pid');
		$url="http://localhost/bigexcise/e/tp/public/port/product/getproduct?type=one&va=$pid";
		$res=file_get_contents($url);
		$product=json_decode($res,true);


		if ($product['error']==200) {
			$num=$product['msg']['product_money']/$product['msg']['product_need_money'];
			$product['msg']['length']=sprintf('%.2f',$num)*100;
			date_default_timezone_set('PRC');
		    
		 	$time=$product['msg']['end_time']+$product['msg']['product_time']*3600*24*30;   
		 	$product['msg']['end']=date('Y-m-d H:i:s',$time);//产品到期时间
		    $timestr =date('Y-m-d H:i:s',$time);//倒计时时间
		    $time = strtotime($timestr);//时间戳
		    $nowtime = time();//当前时间戳
	 
		    if ($time>=$nowtime){
		        $overtime = $time-$nowtime; //实际剩下的时间（单位/秒）
		    }else{
		        $overtime=0;
		    }

			return $this->fetch("show",["product"=>$product['msg'],"overtime"=>$overtime]);die;
		}else{
			return $this->fetch("show",["product"=>""]);die;
		}
	}
	public function order(){
		echo "111";
	}
	public function getinfo(){
		$type=Request::instance()->post('type');
		$va=Request::instance()->post('va');
		$url="http://localhost/bigexcise/e/tp/public/port/product/getproduct?type=$type&va=$va";
		$res=file_get_contents($url);
		echo $res;
	}
}

?>