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
				$res = Db('product')->where("product_status",1)->where('product_type',$va)->select();
				$data=$this->judge($res);	
				echo json_encode($data);
				break;
			case 'status':
				$res = Db('product')->where("product_status",1)->select();
				// echo "<pre>";
				// print_r($res);die;
				foreach ($res as $k => $v) {
					if ($va==1) {
						if ($v['start_time']<time()) {
							$data['msg'][]=$v;
							$data['error']=200;
						}
						if (empty($data['msg'])) {
							$data['msg']="该类下没有产品，敬请期待!";
							$data['error']=0;
						}
					}else if ($va==2) {
						if ($v['start_time']<time()||($v['product_need_money']==$v['product_money']&&$v['end_time']>time())) {
							$data['msg'][]=$v;
							$data['error']=200;
						}
						if (empty($data['msg'])) {
							$data['msg']="该类下没有产品，敬请期待!";
							$data['error']=0;
						}
					}else if ($va==3) {
						if ($v['end_time']<time()&&($v['end_time']+$v['product_time']*3600*24*30<time())) {
							$data['msg'][]=$v;
							$data['error']=200;
						}
						if (empty($data['msg'])) {
							$data['msg']="该类下没有产品，敬请期待!";
							$data['error']=0;
						}
					}else if ($va==4) {
						if ($v['end_time']+$v['product_time']*3600*24*30>time()) {
							$data['msg'][]=$v;
							$data['error']=200;
						}
						if (empty($data['msg'])) {
							$data['msg']="该类下没有产品，敬请期待!";
							$data['error']=0;
						}
					}else{
						$data['msg']="该类下没有产品，敬请期待!";
						$data['error']=0;
					}
				}	
				echo json_encode($data);
				break;
			case 'all':
				$res = Db('product')->where("product_status",1)->select();
				$data=$this->judge($res);	
				echo json_encode($data);
				break;
			case "city":
				$res = Db('product')->where("product_status",1)->where("product_city",$va)->select();
				$data=$this->judge($res);	
				echo json_encode($data);
				break;
			default:
				$data=$this->judge(0);	
				echo json_encode($data);
				break;
		}
		
	}
	public function judge($res){
		if ($res){
			$data['msg']=$res;
			$data['error']=200;
		}else{
			$data['msg']="该类下没有产品，敬请期待!";
			$data['error']=0;
		}
		return $data;
	}
}