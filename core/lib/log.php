<?php
namespace core\lib;
use \core\lib\config;
/**
 * 日志类
 * @param string $type
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年9月24日
 */
class Log {
	public $file = '';
	public function __construct($type) {
		$log = Config::get('configs');
		if ($log['LOG']) {
			if ($type =='db') {
				$this->error_reg($type);
			} else if ($type == 'work'){
				$this->error_reg($type);
			}
		} else {
			return false;
		}
	}
	/**
	 * 写错误日志
	 * @param string $type
	 */
	public function error_reg($type){
		$ar=array(
				E_ERROR => 'error',
				E_WARNING => 'warning',
				E_PARSE =>'prase',
				E_NOTICE => 'notice'
		);
		//文件存放位置
		$this->file = WXUNS . '/' . 'resources/log/' . $type . '/' . date('Ymd') . '.log';
		//在php程序终止时运行函数
		register_shutdown_function(function() use ($ar){
			$ers=error_get_last();
			if($ers['type']!=8 && $ers['type']){
				$er='[' .date('Y-m-d H:i:s').'] '.$ar[$ers['type']].$ers['type'].': '.' '.$ers['message'].' => '.$ers['file'].' line:'.$ers['line']."\n";
				error_log($er,3,$this->file);
			}
		});
		//记录用户定义错误
		set_error_handler(function($a,$b,$c,$d) use ($ar){
			if($a!=8 && $a){
				$er='[' .date('Y-m-d H:i:s').'] '.$ar[$a].$a.': '.$b.' => '.$c.' line:'.$d.' '.date('Y-m-d H:i:s')."\n";
				error_log($er,3, $this->file);
			}
		},E_ALL ^ E_NOTICE);
	}
	public function __destruct(){}
}