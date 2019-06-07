<?php $url = APP_URL."init/register";  ?>
<div class="page-header">
	<h1 style="color: gray">注册失败 ... </br>请输入正确的学号或职工号</h1>
	<a href="<?php echo $url;?>">重新注册</a>
</div>
<?php  

echo "<script language='javascript'type='text/javascript'>";  
echo "setTimeout(\"window.location.href='$url'\",2000);";
echo "</script>";  
?> 
