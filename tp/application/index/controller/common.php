<?php
namespace app\index\controller;

use think\Controller;

class Common extends Controller
{
    public function foot() {
        return $this->fetch("foot");
    }

    
}
