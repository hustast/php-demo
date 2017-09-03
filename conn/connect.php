<?php 

require_once('config.php');

$dbms='mysql';     //数据库类型
$host=HOST; //数据库主机名
$dbName=DB;    //使用的数据库
$user=USERNAME;      //数据库连接用户名
$pass=PASSWORD;          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

$con = new PDO($dsn, $user, $pass); //初始化一个PDO对象

$con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false)//关闭默认预处理
?>