<?php
/*
 * 网站项目基础配置文件
 * 
 * */

/* 默认设置 */
header("content-type:text/html;charset=utf-8"); // php编码
date_default_timezone_set('PRC'); // 默认时区
session_start(); // 开启session

/* 动态修改配置文件 */
ini_set('upload_max_filesize', '20M'); // 上传大小限制
ini_set('post_max_size', '300M'); // post提交大小限制

$config = array(
    /* 数据库设置 */
    'db' => array(
        'type' => 'mysql',
        'host' => 'localhost', // 主机地址
        'user' => 'root', // 用户名
        'password' => '', // 密码
        'db_name' => 'llf', // 数据库名
        'charset' => 'utf8', // 编码
        'tb_prefix' => '' // 数据表前缀
    ),
    
    /* 网站地址设置 */
    'base_url' => 'http://localhost'
);