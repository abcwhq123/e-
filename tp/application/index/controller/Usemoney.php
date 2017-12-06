<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Users;

class Usemoney extends Controller
{
	public function index(){
		return $this->fetch('index');
	}
}