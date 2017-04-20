<?php
/*
 * 底层核心控制器
 * 
 * */

class Controller
{
    protected $assign = array();
    protected $model = NULL; // 用于接收实例化模型对象 ctrl+g:23
    public function __construct()
    { // 构造函数
        $model_name = substr(get_class($this), 0, -10); // 获取类名并只截取名字部分eg: NewsController => News
        $this->loadModel($model_name); // 调用函数加载模型
    }

    /*
     * 加载模型
     * @param $model_name string 构造函数中截取后得到模型类名
     * 模型类名以及模型文件名通过继承本底层控制器的子控制器类名截去Controller关键字并大写首字母后再拼接Model关键字获得
     * */
    protected function loadModel($model_name)
    {
        $model_name = ucfirst($model_name).'Model'; // 使模型名字首字母大写，并拼接Model，得到完整的模型文件名 eg：AdminModel
        if (file_exists(MODEL_PATH.$model_name.'.php')){ // 判断此模型文件是否存在
            include_once MODEL_PATH.$model_name.'.php'; // 存在则载入
            $this->model = new $model_name; // 实例化模型对象
        }
        return $this;
    }

    /*
     * 数据分配
     * @param $key string 健
     * @param $value mixed 值
     * */
    protected function assign($key = '', $value = '')
    {
        $this->assign[$key] = $value; // 给数组assign传值$data['data']= array();
        return $this->assign;
    }

    /* 
     * 视图封装
     * @param $url string 视图路径
     * */
    protected function display($url = '')
    {
        if (MODEL_NAME == 'admin') { // 若是后台页面
            // 自动生成菜单
            include_once MODEL_PATH.'Admin_MenuModel.php';
            $menu_model = new Admin_MenuModel;
            $admin_menu = $menu_model->select();
        }
        extract($this->assign()); // extract从数组中将变量导入到当前的符号表
        if ($url == ''){
            $url = CONTROLLER_NAME.'/'.ACTION_NAME; // index/index
        }
        if (file_exists(VIEW_PATH.'public/header.php')){ // 判断头部文件是否存在
            include(VIEW_PATH.'public/header.php'); // 存在则加载
        }
        include(VIEW_PATH.$url.'.php'); // app/view/.home/.index/index.php
        if (file_exists(VIEW_PATH.'public/footer.php')){ // 判断底部文件是否存在
            include(VIEW_PATH.'public/footer.php');
        }
    }

    /*
     * 登录验证
     * */
    protected function isLogin()
    {
        if (empty($_SESSION['username'])) {
            header("location:".BASE_URL."index.php?m=admin&c=admin&a=index"); // 跳到登录页
        }
    }

    /*
     * 加载底层核心文件
     * */
    protected function load($fileName = '')
    {
        include_once SYSTEM_PATH.ucfirst($fileName).'.class.php';
    }
}