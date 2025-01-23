<?php
//导入工具库
include("tool.php");
//导入数据库
include("mysql.php");
//账号注册
$_user = $_GET['user'];//账号
$_pass = $_GET['pass'];//md5加密密码
$_ip = getIp();//获取到ip
$_time = date('Y-m-d h:i:s');//获取到注册时间

if($_user == '' or $_pass == ''){
  exit('不能留空');
}
$sql = "SELECT * FROM user where user='$_user'";
$obj = mysqli_query($link,$sql);
if(mysqli_fetch_assoc($obj)){
  exit("账号已经被注册");
}
//对密码进行加密处理
$_pass = md5($_pass);
$sql = "INSERT INTO user(user,pass,ip,time) VALUES ('$_user','$_pass','$_ip','$_time')";
mysqli_query($link,$sql);
echo '注册成功';