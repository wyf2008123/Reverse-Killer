<?php
include("mysql.php");
//账号登录
$_user = $_GET['user'];//账号
$_pass = $_GET['pass'];//md5加密密码

if($_user == '' or $_pass == ''){
  exit('不能留空');
}
$sql = "SELECT * FROM user where user='$_user'";
$obj = mysqli_query($link,$sql);
if(!@mysqli_fetch_assoc($obj)){
  exit("账号不存在");
}
$_pass = md5($_pass);
$sql = "SELECT * FROM user where user='$_user' and pass='$_pass'";
$obj = mysqli_query($link,$sql);
if(mysqli_fetch_assoc($obj)){
  exit("登录成功");
}
echo '密码错误';