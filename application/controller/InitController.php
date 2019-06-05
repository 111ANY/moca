<?php
class InitController extends Controller
{
    // 首頁方法
    public function index()
    {
        $this->assign('title', '全部記錄');
        $this->assign('items', (new MocaModel)->selectAll());
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
        $this->isloged();
    }
    // 注冊
    public function register() 
    {
        $this->assign('title', '注冊用戶');
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