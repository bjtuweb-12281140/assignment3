<!DOCTYPE html>
<html>
<head>
	<title>欢迎回来，<?php echo $username; ?> </title>
	<meta http-equiv="Content-Type" content="textml; charset=utf-8" />
	<link href="page.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
//包含数据库连接文件
include('conn.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

$user_query = mysql_query("select * from users where uid=$userid limit 1");
$row = mysql_fetch_array($user_query);

echo '<a href="login.php?action=logout">注销</a> 登录<br />';
?>

</body>
</html>

