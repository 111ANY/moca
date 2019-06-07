<?php
class ApiController extends Controller
{
    function __construct($_controller, $_methodName)
    {
        parent::__construct($_controller, $_methodName, "api");
    }
    // 首頁方法
    public function index()
    {
		echo "!";
    }
    // 添加方法
    public function init() 
    {
        $this->assign('title', '首頁');
    }
    // 登陸
    public function login() 
    {
        $this->assign('title', '登陸系統');
    }
    public function dologin() 
    {
        (new User)->login();
        if ($this->isloged()) {
            $this->view = new View($this->controller, "loged");
            $this->assign('title', '成功登陸');
        } else {
            $this->view = new View($this->controller, "lofalse");
            $this->assign('title', '登录失败');
        }
    }

    public function userdelect()

    {
        $arrayName = array('state' => 'error',
                           'reason' => 'not_login');
        echo json_encode($arrayName);
    }
    public function nonlogin()

    {
        $arrayName = array('state' => 'error',
                           'reason' => 'not_login');
        echo json_encode($arrayName);
    }

    public function user()
    {

    }

    public function view($id = null)
    {
        $item = (new MocaModel)->select($id);
        $this->assign('title', '正在查看' . $item['item_name']);
        $this->assign('item', $item);
    }
}