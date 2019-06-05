
	  <script>
		  function checkData(){
			  var x=myForm.userName.value;
			  var y=myForm.tel.value;
			  if(x==null||x==""){
				  myForm.userName.focus();
				  return false;
			  }
			  if(y==null||y==""){
				  myForm.tel.focus();
				  return false;
			  }
			  if(!(/^[0-9]+$/.test(x))){
				  alert("用户名为纯数字！");
				  return false;
			  }
		  }
	  </script>
  <div class="head">
	  <form action="" method="post" name="myForm" onSubmit="return checkData()">
      <input type="text" name="userName" placeholder="用户名:" required class="form-control"/>
      <input type="tel" name="tel" placeholder="电话:" required class="form-control"/>
	  <div class="he">
	  <div class="zi2"><a href="register">注册</a></div>
	  <div class="zi1"> <a href="login">返回登陆</a></div>
	  </div>
      <button type="submit">找回密码</button>
	  </form>
  </div>







































