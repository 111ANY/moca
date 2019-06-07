<?php
/**
 * 框架核心部分
 */
class Core
{
    // 程式運行
    function run()
    {
        spl_autoload_register(array($this, 'loadClass'));//實現自動加載未定義類
        //提前注冊  //靜態對象回調函數方法 spl_autoload_register(array(類名, 方法名))
        $this->setMonitor();
        $this->findEC();
        $this->Route();
    }

    // 錯誤監視設置
    function setMonitor()
    {
        if (DEBUG_MODE === true) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'On'); //ini_set()設置php.ini 慎用！
        } else {
            error_reporting(E_ALL);     //報告所有錯誤
            ini_set('display_errors', 'Off');
            ini_set('log_errors', 'On');
            ini_set('error_log', MONITOR_P.'logs/error.log');
        }
    }

    // 對接收到的請求檢查是否含轉義符Escape Sequences magic_quotes_gpc=ON->進行轉義\
    function findEC()
    {
        if(get_magic_quotes_gpc()) { //獲取magic_quotes_gpc全局變量 php6.0始刪除magic_quotes_gpc
            $_GET = removeEC($_GET);
            $_POST = removeEC($_POST);
            $_COOKIE = removeEC($_COOKIE);
            $_SESSION = removeEC($_SESSION);
        }
    }

    // 移除轉義符
    function removeEC($value)
    {                               //array_map(函數名, array())               刪除\轉義符
        $result = is_array($value) ? array_map('removeEC', $value) : stripslashes($value); 
        return $result;
    }

    // 路由處理
    function Route()
    {
        $controllerName = 'Init';
        $methodName = 'Init';
        if (!empty($_GET['url'])) { //路徑處理
            $url = strtolower($_GET['url']);
            $urlArray = explode('/', $url);
            $controllerName = ucfirst($urlArray[0]); // 首字母大寫獲取控制器名
            array_shift($urlArray);                  // 右移一位獲取方法名
            $methodName = empty($urlArray[0]) ? 'Init' : $urlArray[0];
            array_shift($urlArray);                  // 右移一位獲取URL參數
            $queryString = $urlArray;
        }
        $queryString  = empty($queryString) ? array() : $queryString; // 處理空URL參數
        $controller = $controllerName.'Controller';                   // 實例化控制器
        if (!(int)method_exists($controller, $methodName))            // 判斷控制器與方法名存在
            $methodName = "error";
        $dispatch = new $controller($controllerName, $methodName);
        call_user_func_array(array($dispatch, $dispatch->methodName), $queryString);//回調 調用方法傳參
    }

    // 自動加載控制器模型視圖
    static function loadClass($class)
    {
        $controller = APP_P.'application/controller/'.$class.'.php';
        $model = APP_P.'application/model/'.$class.'.php';
        $view = APP_P.'application/view/'.$class.'.php';
        file_exists($controller) ? include $controller : $controller = false;
        file_exists($model) ? include $model : $model = false;
        file_exists($view) ? include $view : $view = false;
        if (!$controller && !$model && !$view) {
            $controller = "InitController";
            $dispatch = new $controller("Init", "error");
            call_user_func_array(array($dispatch, "error"), array());
        }
    }
}