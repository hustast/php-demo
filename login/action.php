<?php 
session_start();

require_once('../conn/connect.php');
require_once ('../mysql/build.php');

@$studentid = $_POST['studentid'];
@$passwd	= $_POST['password'];

//匹配密码用户名
$stmt = $con->prepare("SELECT * FROM students WHERE studentid = :studentid");
$stmt->bindParam(':studentid', $studentid);
$stmt->execute();
$row 	    = $stmt->fetch(MYSQLI_BOTH);
$stu_id     = $row['studentid'];
$pass       = $row['password'];

$image = strtoupper($_POST['image']);//取得用户输入的图片验证码并转换为大写
$image2 = $_SESSION['pic'];//取得图片验证码中的四个随机数

if($stu_id == $studentid && $pass == $passwd && $image == $image2 )//验证用户名和密码是否一致
{
    //打印成绩单
    $stmt = $con->prepare("SELECT * FROM grades WHERE studentid = :studentid");
    $stmt->bindParam(':studentid', $studentid);
    $stmt->execute();
    $row 	    = $stmt->fetch(MYSQLI_BOTH);
    //其余参照14 15 行
}
else
{
	echo "<script>alert('帐户名或密码错误！');history.go(-1)</script>";//用户名和密码不一致，跳转到当前页面重新输入
}

?>



