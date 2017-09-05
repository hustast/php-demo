<?php
header("Content-type: text/html; charset=utf-8");

@session_start();

require_once ('../conn/connect.php');
require_once ('../mysql/build.php');

@$studentid = $_POST['studentid'];
@$passwd    = $_POST['password'];
@$submit    = $_POST['signup'];

@$image = strtoupper($_POST['image']);//取得用户输入的图片验证码并转换为大写
$image2 = $_SESSION['pic'];//取得图片验证码中的四个随机数

if (isset($submit)) {
	if (strlen($_POST["password"]) >= 6) {
		if ($_POST['studentid'] != "" || $_POST['password'] != "") {
			if ($_POST['password'] == $_POST['passwordrepeat']) {
				if ($image == $image2) {// 验证码正确

					//对密码进行加密
					$pwd_md5      = md5($passwd);
					$md5_sha      = hash('sha256', $pwd_md5);
					$sha_pwd_hash = password_hash($md5_sha, PASSWORD_DEFAULT);

					//插入用户数据库
					$stmt = $con->prepare("INSERT INTO students (studentid, passwd) VALUES (:studentid, :passwd)");
					$stmt->bindParam(':studentid', $studentid);
					$stmt->bindParam(':passwd', $sha_pwd_hash);

					if ($stmt->execute()) {//执行sql语句
						require_once "../identify/mail.php";
						echo "<script>alert('注册成功，请及时到华科邮箱(u2015×××××)进行验证!邮件可能误报垃圾邮件，请注意查收'); window.location= '../index.php';</script>";
					} else {
						echo "insert error".$con->errorInfo();
					}
				} else {
					echo "<script>alert('验证码错误！');history.go(-1)</script>";
				}
			} else {
				echo "<script>alert('两次密码输入不一致！');history.go(-1)</script>";
			}
		} else {
			echo "<script>alert('用户名密码不能为空!');history.go(-1)</script>";
		}
	} else {
		echo "<script>alert('密码不能少于6位!');history.go(-1)</script>";
	}
}
?>