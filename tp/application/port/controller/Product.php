<?php
namespace app\port\controller;

use think\Request;
use think\Config;
use think\Controller;

//产品接口
class Product
{
	public function getproduct(){
		$type  = Request::instance()->get('type');
		$va    = Request::instance()->get('va');
		$type=isset($type)?$type:"";
		$va=isset($va)?$va:"";

		switch ($type) {
			case 'month':
				$res = Db('product')->where('product_type',$va)->select();
				$data=$this->judge($res);	
				echo json_encode($data);
				break;
			case 'all':
				$res = Db('product')->where("product_status",1)->select();
				$data=$this->judge($res);	
				echo json_encode($data);
				break;
			default:
				# code...
				break;
		}
		
	}
	public function judge($res){
		if ($res){
			$data['msg']=$res;
			$data['error']='1';
		}else{
			$data['msg']="该类下没有产品，敬请期待!";
			$data['error']='0';
		}
		return $data;
	}
}