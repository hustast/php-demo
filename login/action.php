<?php 
session_start();
<<<<<<< HEAD
require_once('/conn/connect.php');
=======
require_once('connect.php');
>>>>>>> c61558f60aff06e04176272be27e2d9eb840b87c

@$studentid = $_POST['studentid'];
@$passwd	= $_POST['password'];

$sql_check  = "SELECT * FROM EIC WHERE studentid = '$studentid'";
$result     = $con->query($sql_check);

$row 	    = $result->fetch_array(MYSQLI_BOTH);
$stu_id     = $row['studentid'];
$pass       = $row['password'];

$image = strtoupper($_POST['image']);//取得用户输入的图片验证码并转换为大写
$image2 = $_SESSION['pic'];//取得图片验证码中的四个随机数

if($stu_id == $studentid && $pass == $passwd && $image == $image2 )//验证用户名和密码是否一致
{
	echo "<script>window.location= 'hello.html';</script>";//用户名和密码一致，跳转到指定页面
}
else
{
	echo "<script>alert('帐户名或密码错误！');history.go(-1)</script>";//用户名和密码不一致，跳转到当前页面重新输入
}

?>



