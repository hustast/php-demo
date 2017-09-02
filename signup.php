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
	<form class="form-horizontal col-sm-5" id="form-main" action="" method="post">
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

<?php 
@session_start();

require_once('conn/connect.php');
@$studentid    = $_POST['studentid'];
@$passwd	   = $_POST['password'];
@$submit	   = $_POST['signup'];

@$image = strtoupper($_POST['image']);//取得用户输入的图片验证码并转换为大写
$image2 = $_SESSION['pic'];//取得图片验证码中的四个随机数


if (isset($submit)) {
	if ($_POST['password'] == $_POST['passwordrepeat']) {
		if ($image == $image2 ) {// 验证码正确
            //邮箱验证
            /*
             *
             *
             *
             *
            */
            //对密码进行加密
            $pwd_md5 = md5($passwd);
            $md5_sha = hash('sha256',$pwd_md5);
            $sha_pwd_hash = password_hash($md5_sha,PASSWORD_DEFAULT);

            //将登录信息更新
			$update = "UPDATE EIC  SET password  = 
                                       grade     = 
                                 WHERE studentid =  ";

				if ( $con->query($update) ) {    //执行sql语句
					echo "<script>alert('注册成功');window.location= 'index.php';</script>";
				} else {
					echo "insert error".$con->error;
				}

		} else {
			echo "<script>alert('验证码错误！');</script>";
		}
	}else {
		echo "<script>alert('两次密码输入不一致！');</script>";
	}
}
?>