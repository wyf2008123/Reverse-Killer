<?php
require 'mysql.php';
//账号登录
$_user = $_GET['user'];//账号
$_pass = $_GET['pass'];//md5加密密码
$appName = $_GET["app"];
if($_user == ''||$_pass == ''||$appName== ""){
  die('不能留空');
}
$sql = "SELECT * FROM user where user='$_user'";
$obj = mysqli_query($link,$sql);
if(!@mysqli_fetch_assoc($obj)){
  exit("账号不存在");
}
$_pass = md5($_pass);
$sql = "SELECT * FROM user where user='$_user' and pass='$_pass'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){exit('密码错误');}
$sql = "SELECT * FROM app where user='$_user' and name='$appName'";
$obj = mysqli_query($link,$sql);
if(mysqli_num_rows($obj)){die("应用已经存在");}
$sql = "INSERT INTO app (user,name) VALUES ('$_user','$appName')";
if(mysqli_query($link,$sql)){
echo '应用添加成功';
}else{
echo '应用添加失败';
}