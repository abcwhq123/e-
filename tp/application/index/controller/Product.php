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
		// echo "<pre>";
		// print_r($product['msg']);die;
		if ($product['error']==200) {
			return $this->fetch("index",["product"=>$product['msg']]);die;
		}else{
			return $this->fetch("index",["product"=>""]);die;
		}
		
	} 
	public function desc(){
		$pid=Request::instance()->get('pid');
		return $this->fetch("show");
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