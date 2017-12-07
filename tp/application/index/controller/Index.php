<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;//引入Db
use app\index\model\Products;

class Index extends Controller
{
    public function index() {
        $url="http://localhost/bigexcise/e/tp/public/port/product/getproduct?type=all";
        $res=file_get_contents($url);
        $product=json_decode($res,true);

        if ($product['error']==200) {
            $products=new Products;
            $count=$products->getnum();
            $arr=$products->pages(1);
            // echo "<pre>";
            // print_r($arr);die;
            return $this->fetch("index",["product"=>$arr]);die;
        }else{
            return $this->fetch("index",["product"=>""]);die;
        }
    }

    //项目详情
    public function info() {
        return $this->fetch("info");
    }

    //项目列表
    public function lists() {
        return $this->fetch("lists");
    }
}
