<?php
namespace core;
/**
 * 核心文件入口类
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年9月18日
 */
class wxuns{
	static public $classmap = array();
	
	static public function run(){
		new \core\lib\log('work');
		new \core\lib\config();
		//路由类
		$route = new \core\lib\route();
		//控制器controller
		$con = '\app\controller\\' . $route->con . 'Controller';
		$act = $route->act;
		$ctrl = new $con();
		$ctrl->$act();
	}
	/**
	 * 自动加载函数
	 * @param $class string
	 * @return bool
	 */
	static public function load($class){
		if(isset($classmap[$class])){
			return true;
		}else{
			//转换成文件格式
			$class = str_replace('\\', '/', $class);
			$file = WXUNS . '/' . $class . '.php';
			if(is_file($file)){
				include $file;
				self::$classmap[$class] = $class;
			}else{
				return false;
			}
		}
	}
}
