<?php

//登录
if(!isset($_POST['submit'])){
    exit('Illegal Access!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);


include('conn.php');
//检测用户名及密码是否正确
$check_query = mysql_query("select uid from users where username='$username' and password='$password' limit 1");
if($result = mysql_fetch_array($check_query)){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['uid'];
    echo $username,' welcome to <a href="my.php">homepage!</a><br />';
    echo 'click here <a href="login.php?action=logout">log out</a> log on！<br />';
    exit;
} else {
    exit('Logon failure click here <a href="javascript:history.back(-1);">back</a> try again');
}

session_start();

//注销登录
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo 'success！click here to<a href="login.html">logon</a>';
    exit;
}

?>