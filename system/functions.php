<?php
/*
 * 底层公共方法库
 * 
 * */

/*
 * 调试输出函数
 * @param mix $val 调试输出源数据
 * @param bool $dump 是否启用var_dump调试
 * @param bool $exit 是否在调试结束后设置断点
 * @return void
 *
 * */
function p($val, $dump = false, $exit = true)
{
    // 自动获取调试函数名称$print_method
    if ($dump){
        $print_method = 'var_dump';
    } else {
        $print_method = (is_array($val) || is_object($val)) ? 'print_r' : 'printf'; // printf输出格式化字符串
    }
    
    // 输出到html
    header("Content-type: text/html; charset=utf-8");
    echo '<pre>debug output:<hr />';
    //$sql = M()->getLastSql();
    $sql = NULL;
    $sql = !empty($sql) ? $sql : 'no SQL...';
    echo '<span style="color: #6fa3ef">'.$sql.'</span><hr />';
    $print_method($val);
    echo '</pre>';
    if($exit) exit;
}