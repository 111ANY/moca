<?php // 常量初始化
// 縂框架文件路徑 FRAME_P
defined('FRAME_P') or define('FRAME_P', __DIR__.'/');

// 文件所在路徑 APP_P
defined('APP_P') or define('APP_P', str_replace('\\','/',dirname(dirname(__FILE__))).'/');

// 配置文件路徑 CONFIG_P
defined('CONFIG_P') or define('CONFIG_P', APP_P.'config/');

// 調試模式設定
defined('DEBUG_MODE') or define('DEBUG_MODE', true);

// 設定日志文件路徑 MONITOR_P
defined('MONITOR_P') or define('MONITOR_P', APP_P.'log/');

// 支持文件路徑
defined('SUPPORT_P') or define('SUPPORT_P', APP_URL.'support/');
// 引入配置文件
require APP_P.'config/config.php';
// 引入框架核心類
require FRAME_P.'core.php'; 
// 核心類實例化 開始
$moca = new Core;
$moca->run();