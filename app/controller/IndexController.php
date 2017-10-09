<?php
namespace app\controller;
use core\Controller;

class IndexController extends Controller{
	public function index(){
		$this->assign('name','wxuns');
		$this->display('index.html');
	}
}