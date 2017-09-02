<!doctype html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my.css">
	<title>注册页面</title>

</head>
<body>
	<div class="container">
	<img src="img/logo.jpg" class="img" >
	<h3>Sign up to EIC,HUST</h3>
	<form class="form-horizontal col-sm-5" id="form-main" action="login/register.php" method="post">
  		<div class="form-group">
    		<label for="studentid">学号：</label>
    		<input type="text" class="form-control" id="studentid" placeholder="学号：U2015×××××" name="studentid" maxlength="10">
  		</div>
  

	  	<div class="form-group">
		    <label for="password">密码：</label>
		    <input type="password" class="form-control" id="password" placeholder="请输入您的密码" name="password" maxlength="20">
		</div>
	  	<div class="form-group">
		    <label for="passwordrepeat">重复密码</label>
		    <input type="password" class="form-control" id="passwordrepeat" placeholder="请重新输入您的密码" name="passwordrepeat"
                   maxlength="20">
		</div>

		<div class="form-group">
			<label for="check">验证码</label>
			<a href="signup.php"><img src="identify/img.php"></a>
			<input type="text" name="image" class="form-control" id="image" placeholder="输入图中验证码">
		</div>
	<button type="submit" class="btn btn-info" name="signup">提交注册</button>
	<button type="reset" class="btn btn-info">重置</button>
	</form>
</div>


</body>
</html>
