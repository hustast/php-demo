<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my.css">
	<title>登录页面</title>

	<script language = "javascript">
	function Checked()
	{
		if(myform.studentid.value == "")//如果Email为空
		{
			alert("您还没有填写学号！");
			myform.studentid.focus();
			return false;
		}
		if(myform.password.value == "")//如果密码为空
		{
			alert("您忘记填写密码了！");
			return false;
		}
	}
</script>

</head>
<body>
<div class="container">
	<img src="img/logo.jpg" class="img" >
	<h3>Sign in to EIC,HUST</h3>
	<form class="form-horizontal col-sm-4" id = "form-main" onsubmit="return Checked();" action="login/action.php" method="post" name="myform" >
  		<div class="form-group">
    		<label for="studentid">学号：</label>
    		<input type="text" class="form-control" id="studentid" placeholder="学号：U2015×××××" name="studentid" maxlength="10">
  		</div>

	  	<div class="form-group">
		    <label for="password">密码</label>
		    <input type="password" class="form-control" id="password" placeholder="请输入您的密码" name="password" maxlength="20">
		</div>

		<div class="form-group">
			<label for="check">验证码</label>
			<a href="index.php"><img src = 'identify/img.php' class="check" /></a>
			<input type="text" name="image" class="form-control" id="image" placeholder="输入图中验证码">
		</div>
	<button type="submit" class="btn btn-info">登录</button>
	<button type="reset" class="btn btn-info">重置</button>
	<br />
	<p>首次登录，请先去<a href="signup.php">注册</a></p>
	</form>

	<p class="footer">2017 © Powered by 科协技术部  All rights reserved.</p>
</div>

</body>
</html>