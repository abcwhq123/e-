<?php
namespace app\index\model;

use think\Db;//引入Db
use think\Model;//引入Model

class Products extends Model
{
	protected $table = 'product';
	function getnum($where  = '') {
		$num= Db::table($this->table)->where('product_status',1)->select();
		return count($num);
	}
	//查询
	function page($length  = '', $limit = '') {
		return Db::table($this->table)->where('product_status',1)->limit($length)->select(); 
	}
	//分页
	function pages($page){
		//每页显示数
		$size=3;
		//获取总条数
		$num=Db::table($this->table)->where("product_status",1)->count();
		//页数
		$sum=ceil($num/$size);
		//获取偏移量
		$limit=($page-1)*$size;
		//根据偏移量查询数据
		$info=Db::table($this->table)->where("product_status",1)->limit($limit,$size)->select();  
		//首页
		$first=1;
		//上一页
		$up=$page-1<1?1:$page-1;
		//下一页
		$next=$page+1>$sum?$sum:$page+1;
		//尾页
		$end=$sum;
		$arr=[
			'page'=>[
				'first'=>$first,
				'up'=>$up,
				'next'=>$next,
				'end'=>$end,
			],
			'info'=>$info,
			'page_num'=>$sum
		];
		return $arr;
	}

}