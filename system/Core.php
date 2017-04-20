<?php
/*
 * 底层基类入口
 * 
 * */

class Core
{
    public static $config = array(); // 定义配置数组

    // 运行程序
    static public function run()
    {
        // 载入核心
        include_once SYSTEM_PATH.'functions.php'; // 加载公共方法文件
        include_once SYSTEM_PATH.'Controller.class.php'; // 加载核心底层控制器
        include_once SYSTEM_PATH.'Model.class.php'; // 加载核心模块层
        include_once SYSTEM_PATH.'View.class.php'; // 加载视图基类
        include_once SYSTEM_PATH.'DB.class.php'; // 加载数据库基类

        // 载入配置
        include_once CONFIG_PATH.'base.php'; // 加载网站基础配置文件
        self::$config = $config; // 静态属性的值由配置文件传入，声明静态属性以保证配置只有一个

        // 载入指定的类文件后实例化并调用指定的方法
        include CONTROLLER_PATH.ucfirst(CONTROLLER_NAME).'.class.php'; // 路径和文件由传入的参数确定
        $class_name = ucfirst(CONTROLLER_NAME).'Controller'; // 自动获取类名
        $action_name = ACTION_NAME.'Action'; // 自动获取方法名
        $object = new $class_name; // 实例化对应类的对象
        $object->$action_name(); // 调用对应类的对应方法
    }
}

Core::run(); // 外部调用Core类中的静态方法run