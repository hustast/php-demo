<!doctype html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my.css">
	<title>登录页面</title>

</head>
<body>
<div class="
container">
	<form class="form-horizontal" action="signup.php" method="post">
  		<div class="form-group">
    		<label for="studentid">学号：</label>
    		<input type="text" class="form-control" id="studentid" placeholder="学号：U×××××××××" name="studentid">
  		</div>
  

	  	<div class="form-group">
		    <label for="password">密码</label>
		    <input type="password" class="form-control" id="password" placeholder="请输入您的密码" name="password">
		</div>

		<div class="form-group">
			<label for="check">验证码</label>
			<a href="signup.php"><img src="img.php"></a>
			<input type="text" name="image" class="form-control" id="image" placeholder="输入图中验证码">
		</div>
	<button type="submit" class="btn btn-default" name="signup">提交注册</button>
	<button type="reset" class="btn btn-default">重置</button>
	</form>
</div>


</body>
</html>

<?php 
@session_start();

require_once('connect.php');
@$studentid    = $_POST['studentid'];
@$passwd	   = $_POST['password'];
@$submit	   = $_POST['signup'];

@$image = strtoupper($_POST['image']);//取得用户输入的图片验证码并转换为大写
$image2 = $_SESSION['pic'];//取得图片验证码中的四个随机数


if (isset($submit)) {
	if ($image == $image2) {									// 验证码正确
		$insert_in = "INSERT INTO EIC (studentid, password, grade)
				  VALUES ( '$studentid', '$passwd', 90 )";
			if ( $con->query($insert_in) ) {    //执行sql语句
				echo "<script>alert('注册成功');window.location= 'index.php';</script>";
			} else {
				echo "insert error".$con->error;
			}
	} else {
		echo "<script>alert('验证码错误！');</script>";
	}
}
?>