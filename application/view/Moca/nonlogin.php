未登錄！轉跳至登陸界面！
<?php  
$url = APP_URL."/init/login";  
echo "<script language='javascript'type='text/javascript'>";  
echo "setTimeout(\"window.location.href='$url'\",1000);";
echo "</script>";  
?> 