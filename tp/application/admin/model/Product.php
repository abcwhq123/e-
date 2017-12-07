<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class Product extends Model{
    protected $table='product';
    //产品展示
    function show(){
        return Db::table($this->table)->where("product_status",2)->select();
    }
    //产品删除
    function deletedata($where){
        return Db::table($this->table)->delete($where);
    }
    //产品添加
    function insertData($data){
    return  Db::table($this->table)->insertGetId($data);
    }
    //修改
//    function findData($where){
//        return Db::table($this->table)->find($where);
//    }
    function updateData($id,$status){
        return Db::table($this->table)->where('product_id',$id)->update(['product_status'=>$status]);
    }
}