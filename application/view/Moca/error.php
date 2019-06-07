<?php $url = APP_URL.'moca/index';?>
<img id="error_img" src="<?php echo SUPPORT_P.'img/123.png';?>" style="position:fixed;
		top:35%;
		left:25%;
		height: 20%;
		width: 20%;
	}">
	<div class="page-header" style="position:absolute;
		top: 35%;
		left: 47%;
		height: 20%;
		width: 20%;
	}">
  <h1>Um ...&nbsp;<small>这个页面</small>&nbsp;打不开了...</h1>
  <a style="color: #3889D4" href="<?php echo $url;?>">返回首页</a>
</div>
<?
echo "<script language='javascript'type='text/javascript'>";  
echo "setTimeout(\"window.location.href='$url'\",3000);";
echo "</script>";  