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
		$url="http://localhost/bigexcise/e/tp/public/port/product/getproduct?type=all";
		$res=file_get_contents($url);
		$product=json_decode($res,true);
		// echo "<pre>";
		// print_r($product);die;
		if ($product['error']==1) {
			return $this->fetch("index",["product"=>$product['msg']]);die;
		}else{
			return $this->fetch("index",["product"=>""]);die;
		}
		
	} 
	public function desc(){
		$pid=Request::instance()->get('pid');
		var_dump($pid);
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