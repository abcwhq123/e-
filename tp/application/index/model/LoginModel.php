<?php
namespace app\port\model;
use think\Db;
use think\Model;

class LoginModel extends Model
{
	protected $table = "user";
	public function findOne($sql){
		return Db::table($this->table)->field('user_id,user_name,user_tel,user_email')->where($sql)->find();
	}
}

