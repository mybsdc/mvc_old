<?php
/*
 * 入口文件
 * 
 * */

// 定义参数常量 
$m = !empty($_GET['m']) ? $_GET['m'] : 'home'; // 模块名称
$c = !empty($_GET['c']) ? $_GET['c'] : 'index'; // 控制器名称
$a = !empty($_GET['a']) ? $_GET['a'] : 'index'; // 方法名称
define('MODEL_NAME', $m);
define('CONTROLLER_NAME', $c);
define('ACTION_NAME', $a);

// 定义路径常量
define('CONTROLLER_PATH', 'app/'.MODEL_NAME.'/controller/'); // 控制器
define('VIEW_PATH', 'app/'.MODEL_NAME.'/view/'); // 视图
define('MODEL_PATH', 'app/'.MODEL_NAME.'/model/'); // 模型层
define('PUBLIC_PATH', 'public/'); // 所有前端样式和js
define('SYSTEM_PATH', 'system/'); // 框架核心文件夹
define('BASE_URL', 'http://localhost/cdmgsd.com/'); // 访问控制器的URL常量
define('CONFIG_PATH', 'app/config/'); // 配置文件夹
define('ROOT_DIR', __DIR__); // 根目录

// 加载核心入口文件
include_once SYSTEM_PATH.'Core.php';