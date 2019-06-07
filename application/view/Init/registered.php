<?php $url = APP_URL."init/login";  ?>
<div class="page-header">
    <h1 style="color: gray"><?php echo $title; ?>!返回登录！</h1>
    <a href="<?php echo $url;?>">還沒有跳轉？點擊轉跳！</a>
</div>
<?php  

echo "<script language='javascript'type='text/javascript'>";  
echo "setTimeout(\"window.location.href='$url'\",200000);";
echo "</script>";  
?> 
