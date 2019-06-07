<?php 
/**
 * 控制器基類
 */
class Controller
{
    protected $controller;
    public $methodName;
    protected $view;
    protected $causeName;
    static protected $token;
    // 構造函數 進行初始化
    function __construct($_controller, $_methodName, $_causeName = "init")
    {
        session_start();
        $this->causeName = $_causeName;
        $this->controller = $_controller;
        $this->methodName = $_methodName;
        self::$token = (new Model)->isloged();
        switch ($_causeName) {
            case 'init':
                if (self::$token)  {
                    $_methodName = "loged";
                  	$this->methodName = $_methodName;
                }
                break;
            case 'moca':
                if (!self::$token) {
                    $_controller = "Init";
                    $_methodName = "nonlogin";
                }
                break;
            case 'api':
                if (!self::$token) {
                    $_controller = "Api";
                    $_methodName = $this->methodName= "nonlogin";
                }
                break;
            default:
            	die("404 Forbidden！");
                break;
        }
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
        return (new Model)->isloged();
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