<?php
class InitController extends Controller
{
    function __construct($_controller, $_methodName)
    {
        parent::__construct($_controller, $_methodName, "init");
    }
    // 首頁方法
    public function index()
    {
        $this->assign('title', '全部記錄');
        $this->assign('items', (new MocaModel)->selectAll());
    }
    // 添加方法
    public function init() 
    {
        $this->assign('title', '进入首頁');
    }
    // 登陸界面
    public function login() 
    {
        $this->assign('title', '登陸系統');
    }
    // 登陸界面
    public function loged() 
    {
        $this->assign('title', '以经登录啦');
    }
    // 進行登陸
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
    // 注冊界面
    public function register() 
    {
        $this->assign('title', '注冊用戶');
    }
  	// 進行注冊
    public function doregister() 
    {
        if (!(new InitModel)->register()) {
            $this->view = new View($this->controller, "refalse");
            $this->assign('title', '注册失败');
        } else {
            $this->view = new View($this->controller, "registered");
            $this->assign('title', '注冊成功');
        }
    }
    //密碼找回
    public function forget() 
    {
        $this->assign('title', '密碼找回');
    }
    public function view($id = null)
    {
        $item = (new MocaModel)->select($id);
        $this->assign('title', '正在查看' . $item['item_name']);
        $this->assign('item', $item);
    }
}