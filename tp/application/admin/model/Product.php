<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class Product extends Model{
    protected $table='product';
    //产品展示
    function show(){
        return Db::table($this->table)->select();
    }
    function deletedata($where){
        return Db::table($this->table)->delete($where);
    }
}