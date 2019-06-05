<?php 
/**
 * 控制器基類
 */
class Controller
{
    protected $controller;
    protected $methodName;
    protected $view;
    protected $token;
    // 構造函數 進行初始化
    function __construct($_controller, $_methodName)
    {
        session_start();
        $this->isloged();
        $this->controller = $_controller;
        $this->methodName = $_methodName;
        $this->view = new View($_controller, $_methodName);

    }
    // 變量分配
    function assign($name, $value)
    {
        $this->view->assign($name, $value);
    }
    //登陸檢查
    public function isloged()
    {
        (new MocaModel)->isloged();
    }
	//URL錯誤處理提示
    public function error()
    {
        $this->assign('title', '訪問錯誤');
        $this->assign('items', "!");
        die;
    }
    // 視圖渲染
    function __destruct()
    {
        $this->view->render();
    }
}