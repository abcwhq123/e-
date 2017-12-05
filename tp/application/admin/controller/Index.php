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
    public function product() {
        return $this->fetch("product");
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
}
