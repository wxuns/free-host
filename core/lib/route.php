<?php
namespace core\lib;
/**
 * 路由类
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年9月19日
 */
class Route{
	public $con = '';
	public $act = '';
	
	public function __construct(){
		$this->router();
	}
	/**
	 * 加载路由
	 */
	public function router(){
		//加载配置路由文件
		$web = include WXUNS . '/' . 'route/web.php';
		//判断当前url
		$request = $_SERVER['REQUEST_URI'];
		if (isset($request) && $request != '/') {
			$url = ltrim($request , '/');
			$count = substr_count($url, '/');//计算'/'出现的次数
			//没有get传值
			if ($count < 1){
				$this->con($url, $web);
			} else {//..
				$this->get($url, $web);
			}
		} else {//默认首页
			$this->con = 'Index';
			$this->act = 'index';
		}
		unset($web);
	}
	/**
	 * 无数据传输
	 * @param string $url
	 * @param string $web
	 * @return boolean
	 */
	public function con($url,$web){
		$url = trim($url,'/');
		if (array_key_exists($url,$web)) {
			$val = $web[$url];
			$rouarr = explode('Controller@',$val);
			//记录控制器与方法
			$this->con = $rouarr[0];
			$this->act = $rouarr[1];
		} else {
			return false;
		}
	}
	/**
	 * @param string $url
	 * @param string $web
	 * @return boolean
	 */
	public function get($url,$web){
		$url = trim($url,'/');
		$url = explode('/',$url);
		if (array_key_exists($url[0] . '/' . $url[1],$web)) {
			//取出控制器方法等信息
			$rot = $web[$url[0] . '/' . $url[1]];
			//计算'{'的数量，即可知道要传参数的数量
			$rotcon = substr_count($rot, '{');
			//与真实url中的传参信息比较
			if (substr_count($rot, '{') == count($url)-2) {
				unset($url[0]);unset($url[1]);//干掉虚拟路由
				$rouarr = explode('Controller@',$rot);//控制器、方法、get信息等组成数组
				//记录控制器与方法
				$this->con = $rouarr[0];
				$get = explode('{',str_replace('}', '', $rouarr[1]));
				$this->act = $get[0];
				unset($get[0]);//干掉方法
				//把传参信息手动加入GET
				$getcount = count($get);
				$urlcount = count($url);
				while ($getcount >= 0 && $urlcount >= 1) {
					$_GET[$get[$getcount]] = $url[$urlcount + 1];
					$getcount--;$urlcount--;
				}
				$_GET = array_reverse($_GET);
			} else {
				return false;
			}
		}else if (array_key_exists($url[0], $web)){
			$rot = $web[$url[0]];
			if(count($url)-1 == substr_count($web[$url[0]],'{')){
				unset($url[0]);
				$rouarr = explode('Controller@',$rot);//控制器、方法、get信息等组成数组
				//记录控制器与方法
				$this->con = $rouarr[0];
				$get = explode('{',str_replace('}', '', $rouarr[1]));
				
				$this->act = $get[0];
				unset($get[0]);//干掉方法
				//把传参信息手动加入GET
				$getcount = count($get);
				$urlcount = count($url);
				while ($getcount > 0 && $urlcount > 0) {
					$_GET[$get[$getcount]] = $url[$urlcount];
					$getcount--;$urlcount--;
				}
				$_GET = array_reverse($_GET);
			}
		} else {
			return false;
		}
	}
	public function __destruct(){}
}