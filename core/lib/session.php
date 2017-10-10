<?php
namespace core\lib;
/**
 * session会话类
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年10月10日
 */
class Session{
	/**
	 * session存储
	 * @param string $name
	 * @param string $val
	 * @param string $cel 盐值
	 */
	static public function set($name,$val){
		$_SESSION[$name] = $val;
	}
	/**
	 * 获取session
	 * @param string $name
	 * @return array|boolean
	 */
	static public function get($name){
		if (isset($_SESSION[$name])){
			return rtrim($_SESSION[$name]);
		}else{
			return false;
		}
	}
	static public function all(){
		return $_SESSION;
	}
	/**
	 * 删除session
	 * @param string $name
	 */
	static public function del($name){
		unset($_SESSION[$name]);
	}
	/**
	 * 销毁所有session
	 */
	static public function destory(){
		$_SESSION = array();
		session_destroy();
	}
}