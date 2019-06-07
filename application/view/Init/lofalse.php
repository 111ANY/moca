<?php $url = APP_URL."init/login";  ?>
<div class="page-header">
	<h1 style="color: gray">登录失败 ... </br>请请检查用户名密码！</h1>
	<a href="<?php echo $url;?>">重新登录</a>
</div>
<?php  

echo "<script language='javascript'type='text/javascript'>";  
echo "setTimeout(\"window.location.href='$url'\",2000);";
echo "</script>";  
?> 
