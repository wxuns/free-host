<?php
/**
 * 入口文件
 */
// 1.定义常量
define('WXUNS', realpath('./'));//入口文件
define('CORE',WXUNS . '/core');//核心文件
define('APP', WXUNS . '/app');//mvc
define('html', WXUNS . '/public');

require WXUNS . '/vendor/autoload.php';//加载composer
require CORE . '/common/function.php';//常用类库
require CORE . '/wxuns.php';//核心文件入口

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//2.自动加载函数库
spl_autoload_register('\core\wxuns::load');//自动加载
//3.启动框架
\core\wxuns::run();