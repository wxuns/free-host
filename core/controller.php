<?php
namespace core;
use Smarty;
/**
 * Controller控制器
 * @author wxuns
 * @link http://www.wxuns.cn
 * @since 2017年10月9日
 */
class Controller extends Smarty{
	//定义html(模板)路径
	//定义标签的左右标识符
	public $left_limiter = '{{';
	public $right_limiter = '}}';
	public $Template_dir = html;//./表示当前路径
	public $setCompile_dir =  WXUNS . '/resources/template/compile';
	public $cache = WXUNS . '/resources/template/cache';
	
	public function __construct(){
		parent::__construct();
		$this->template_dir = $this->Template_dir;
		$this->compile_dir = $this->setCompile_dir;
		$this->cache_dir = $this->cache;
		$this->left_delimiter = $this->left_limiter;
		$this->right_delimiter = $this->right_limiter;
		$_smarty->caching=TRUE;
		
		$path = res . '/path';        //设置session存储的路径
		session_save_path($path);
		session_start();
	}
	/**
	 * 跳转url
	 * @param unknown $url
	 */
	public function redirect($url){
		header('Location: ' . $url);
		exit;
	}
}