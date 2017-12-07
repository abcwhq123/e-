<?php 

namespace app\index\model;

use think\Db;//引入Db
use think\Model;//引入Model
/**
* 
*/
class Paylist extends Model
{
	
	protected $tableName = 'pay_list';
	protected $table;

	public function __construct(){
		$this->table = Db::table($this->tableName);
	}
	//增加
	function insertData($data) {
		return $this->table->insertGetId($data);
	}

	//查询
	function show($where  = '', $limit = 5) {
		return $this->table->where($where)->limit($limit)->select();
	}

	//删除
	function deleteData($where) {
		return $this->table->where($where)->delete();
	}

	//查询单条
	function findData($where) {
		return $this->table->where($where)->find();
	}
	
	//修改
	function updateData($data, $where) {
		return $this->table->where($where)->update($data);
	}

	function page_demo($page, $user_id){
		//每页显示数
		$size  = 10;
		//获取总条数
		$num   = $this->table->where('user_id='.$user_id)->count();
		//页数
		$sum   = ceil($num/$size);
		//获取偏移量
		$limit = ($page-1) * $size;
		//根据偏移量查询数据
		$info  = Db::table($this->tableName)->where('user_id='.$user_id)->limit($limit, $size)->select();
		//页码   首页
		$first = 1;
		//上一页
		$up    = $page-1<1 ? 1 : $page-1;
		//下一页
		$next  = $page+1>$sum ? $sum : $page+1;
		//尾页
		$end   = $sum;
		//将数据放到数组中
		$arr = [
			'page' => [
				'first' => $first,
				'up' => $up,
				'next' => $next,
				'end' => $end,
			],
			'info' => $info,
			'page_num' => $sum
		];
		return $arr;
 	}
}
