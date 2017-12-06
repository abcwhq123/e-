<?php 

namespace app\index\model;

use think\Db;//引入Db
use think\Model;//引入Model
/**
* 
*/
class Users extends Model
{
	protected $table = 'user';
	function getuserinfo($id) {
		return Db::table('user')->alias('u')->join('user_info i','u.user_id = i.user_id')->where("u.user_id",$id)->find();				
	}
}