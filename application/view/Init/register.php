	<script>
		function checkData(){
			var x=myForm.userName.value;
			var y=myForm.password.value;
			var r=myForm.repassword.value;
			var w=myForm.tel.value;
			if(x==null||x==""){
				myForm.userName.focus();
				return false;
			}
			else if(!(/^[0-9]+$/.test(x))){
				alert("用户名为纯数字！");
				return false;
			}
			else if(y==null||y==""){
				myForm.password.focus();
				return false;
			}
			else if(r==null||r==""){
			   myForm.password.focus();
			}
			else if(r!=y){
				alert("两次密码输入不一致！")
				return false;
			}
			else if(myForm.select1.value==0){
				myForm.select1.focus();
				return false;
			}
			else if(z==null||z==""){
				myForm.job.focus();
				return false;
			}
			else if(w==null||w==""){
				myForm.tel.focus();
				return false;
			}else{
				return true;
			}

		}
	</script>
<div class="head">
	<form action="" name="myForm" method="post" onSubmit="return checkData()">
    <input type="text" name="userName" placeholder="学号/工号:" required class="form-control"/>
    <input type="password" name="password" placeholder="密码:" required class="form-control"/>
    <input type="password" name="repassword" placeholder="确认密码:" required class="form-control"/>
    <div class="form-group">
		<select name="select1" class="form-control">
			<option value="0">请选择</option>
			<option value="1">学生</option>
			<option value="2">教务老师</option>
			<option value="3">辅导员</option>
			<option value="4">宿管</option>
		</select>
	</div>
    <input type="tel" name="tel" placeholder="电话:" required class="form-control"/>
    <button type="submit" style="color: snow">注册 </button>
		<a href="login">返回登陆</a>
	</form>
</div>
