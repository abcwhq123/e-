<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Product;
use think\response\Redirect;

class Index extends Controller
{
    public function index(){
        return $this->fetch("index");
    }
    //产品展示
    public function manage() {
        $user=new Product();
        $arr=$user->show();
        return view('manage',['arr'=>$arr]);
    }
    //产品展示
    public function product() {

        return $this->fetch("product");
    }
    //产品录入
    public function insert(){

    $Request=Request::instance();//调用Request里的instance方法;
        $data=$Request->post();//接值
        //将日期变成时间戳
        $data['end_time']=strtotime($data['end_time']);
        $data['start_time']=strtotime($data['start_time']);
        $arr['product_cade']="CODE".rand(1000,999999);
        $data=array_merge($data,$arr);
        $user=new Product(); //实例化model
        $res=$user->insertData($data);

        if($res){
              $this->success("录入成功","Index/manage");
        }else{
               $this->error("录入失败");
        }
    }
    //产品删除
    public function delete(){
        $Request=Request::instance();
        $id=$Request->get("id");
        $user=new Product();
        $res=$user->deleteData($id);
        if($res){
            return Redirect('Index/manage');
        }else{
            $this->error("删除失败");
        }
    }
    public function status(){
        $Request=Request::instance();
        $id=$Request->post("id");
        $status=$Request->post("status");
        $user=new Product();
        $res=$user->updateData($id,$status);
      if($res){
          //成功
        echo 1;
       }else{
          //失败
          echo 0;
      }

    }
}
