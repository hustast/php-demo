<?php
session_start();

require_once ('../conn/connect.php');
require_once ('../mysql/build.php');

@$studentid = $_POST['studentid'];
@$passwd    = $_POST['password'];

//匹配密码用户名
$stmt = $con->prepare("SELECT * FROM students WHERE studentid = :studentid");
$stmt->bindParam(':studentid', $studentid);
$stmt->execute();
$row    = $stmt->fetch(MYSQLI_BOTH);

$stu_id = $row[1];
$pass   = $row[2];

//页面密码加密
$pwd_md5_      = md5($passwd);
$md5_sha_      = hash('sha256', $pwd_md5_);

$image  = strtoupper($_POST['image']);//取得用户输入的图片验证码并转换为大写
$image2 = $_SESSION['pic'];//取得图片验证码中的四个随机数

if ($stu_id == $studentid && password_verify($md5_sha_,$pass) && $image == $image2)//验证用户名和密码是否一致
{
	//打印成绩单
	$stmt = $con->prepare("SELECT * FROM grades WHERE studentid = :studentid");
	$stmt->bindParam(':studentid', $studentid);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_BOTH);
	echo "欢迎你".$row['studentid']."你的成绩".$row['grade']."排名".$row['rank'];
	//其余参照14 15 行
} else {
	echo "<script>alert('帐户名或密码错误！');history.go(-1)</script>";
	//用户名和密码不一致，跳转到当前页面重新输入
}

?>



