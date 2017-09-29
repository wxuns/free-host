<?php
namespace core\lib;
/**
 * 配置文件类
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年9月23日
 */
class Config {
	public static $config = [];
	/**
	 * 加载配置文件
	 * @param string $file
	 * @param string $name
	 * @throws \ErrorException
	 * @return multitype:string|array
	 */
	public static function get($file,$name = '') {
		//检测配置文件是否存在
		$file = WXUNS . '/' . 'config/' . $file . '.php';;
		if(is_file($file)) {
			//加载文件
			self::$config = include_once $file;
			//判断是否要取全部配置信息
			if ($name === '') {
				return self::$config;
			} else {
				if (isset(self::$config[$name])) {
					return self::$config[$name];
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}
}