<div class="page-header">
  <h1>Um ...<small>还没登录呢</small>...</h1>
  <p style="color: #3889D4" href="<?php echo $url;?>">马上登录</p>
</div>
<?php  
$url = APP_URL."init/login";  
echo "<script language='javascript'type='text/javascript'>";  
echo "setTimeout(\"window.location.href='$url'\",1000);";
echo "</script>";  
?> 