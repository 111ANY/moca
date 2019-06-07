<?php
/**
 * 視圖基類
 */
class View
{
    protected $variables = array();
    protected $controller;
    protected $methodName;
 
    function __construct($_controller, $_methodName)
    {
        $this->controller = $_controller;
        $this->methodName = strtolower($_methodName);
    }
    // 變量分配
    function assign($name, $value)
    {
        $this->variables[$name] = $value;
    }
    // 顯示渲染
    function render()
    {
      if ($this->controller == "Api") {
        include (APP_P.'application/view/Api/init.php');
      } else {
        extract($this->variables);
        $defaultMenuCSS = APP_P.'support/css/menu.css';
        $defaultMenuJS = APP_P.'support/js/menu.js';
        $defaultHeader = APP_P.'application/view/header.php';
        $defaultMenu = APP_P.'application/view/menu.php';
        $defaultFooter = APP_P.'application/view/footer.php';
        $defaultInHead = APP_P.'application/view/indexHead.php';
        $conMenuInHead = APP_P.'application/view/'.$this->controller.'/indexHead.php';
        $conMenuCSS = APP_P.'support/css/'.$this->controller.'/menu.css';
        $conMenuJS = APP_P.'support/js/'.$this->controller.'/menu.js';
        $conHeader = APP_P.'application/view/'.$this->controller.'/header.php';
        $conMenu = APP_P.'application/view/'.$this->controller.'/menu.php';
        $conFooter = APP_P.'application/view/'.$this->controller.'/footer.php';
        file_exists($conMenuInHead) ? include ($conMenuInHead) : include ($defaultInHead);//頭部
        file_exists($conHeader) ? include ($conHeader) : include ($defaultHeader);  //頁頭
        file_exists($conMenu) ? include ($conMenu) : include ($defaultMenu);  //菜單
        $MenuCSS = file_exists($conMenuCSS) ? $conMenuCSS : $defaultMenuCSS;  //菜單樣式
        $MenuJS = file_exists($conMenuJS) ? $conMenuJS : $defaultMenuJS;  //菜單JS
        require APP_P.'application/view/'.ucfirst($this->controller).'/'.$this->methodName.'.php';
        file_exists($conFooter) ? include ($conFooter) : include ($defaultFooter);  //頁脚
      }
    }
}