<script>
  function checkData(){
	  var x=myForm.userName.value;
	  var y=myForm.password.value;
	  if(x==null||x==""){
		  myForm.userName.focus();
		  return false;
	  }
	  else if(y==null||y==""){
		  myForm.password.focus();
		  return false;
	  }
	  else if(!(/^[0-9]+$/.test(x))){
		  alert("用户名为纯数字！");
		  return false;
	  }else{
		  return true;
	  }
  }
</script>
<div class="head">
  <form action="<?php echo APP_URL.'init/dologin';?>" method="post" name="myForm" onSubmit="return checkData()">
    <input type="text" name="userName" placeholder="用户名:" required class="form-control"/>
    <input type="password" name="password" placeholder="密码:" required class="form-control"/>
	  <div class="he">
	  <div class="zi2"><a href="register">注册</a></div>
	   <div class="zi1"> <a href="forget">忘记密码</a></div>
	</div>
    <button type="submit">登录</button>
  </form>
</div>