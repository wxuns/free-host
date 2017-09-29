<?php
namespace core\lib;
use \core\lib\Config;
/**
 * 数据库子类
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年9月24日
 */
class Model extends Medoo{
	public function __construct() {
		$config = Config::get('database');
		$type = $config['default'];
		$option = $config['connections'][$type];
		parent::__construct($option);
	}
	public function __destruct(){}
}