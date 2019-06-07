<?php
class MocaController extends Controller
{
    function __construct($_controller, $_methodName)
    {
        parent::__construct($_controller, $_methodName, "moca");
    }
    // 首頁方法
    public function index()
    {
        $this->assign('title', '全部記錄');
        $this->assign('items', (new MocaModel)->selectAll());
    }
	// 注銷
  	public function logout()
    {
        session_destroy();
        $this->view = new View("init", $this->methodName);
        $this->assign('title', '注銷成功');
    }
    // 添加方法
/*    public function add()
    {
        $data['item_name'] = $_POST['value'];
        $this->assign('title', '添加成功');
        $this->assign('count', (new MocaModel)->add($data));
    }*/
    // 查看方法
    public function view($id = null)
    {
        $item = (new MocaModel)->select($id);
        $this->assign('title', '正在查看' . $item['item_name']);
        $this->assign('item', $item);
    }
    // 更新方法
/*    public function update()
    {
        $data = array('id' => $_POST['id'], 'item_name' => $_POST['value']);
        $count = (new MocaModel)->update($data['id'], $data);
        $this->assign('title', '修改成功');
        $this->assign('count', $count);
    }
    */
    // 刪除方法
    public function delete($id = null)
    {
        $this->assign('title', '刪除成功');
        $this->assign('count', (new MocaModel)->delete($id));
    }
}