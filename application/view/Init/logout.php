<?php $url = APP_URL."init/init";  ?>
<div class="page-header">
    <h1 style="color: gray">注銷成功!</h1>
    <a href="<?php echo $url;?>">還沒有跳轉？點擊轉跳！</a>
</div>
<?php  

echo "<script language='javascript'type='text/javascript'>";  
echo "setTimeout(\"window.location.href='$url'\",2000);";
echo "</script>";  
?> 
