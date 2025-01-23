<?php
include('mysql.php');
//绑定卡密，一个设备绑定一个卡密
$_user = $_GET['user'];//账号
$_pass = $_GET['pass'];//md5加密密码
$km = $_GET['km'];
$appName = $_GET['app'];
if($km=="" or $_user=='' or $_pass=='' or $appName==''){
  exit('不能留空');
}
$sql = "SELECT * FROM user where user='$_user'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){
  exit("账号不存在");
}
$_pass = md5($_pass);
$sql = "SELECT * FROM user where user='$_user' and pass='$_pass'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){
  exit("密码错误");
}
$sql = "SELECT * FROM app where user='$_user' and name='$appName'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){exit("应用不存在");}
$sql = "SELECT * FROM km where user='$_user' and km='$km'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){
  exit("卡密不存在");
}

$sql = "DELETE FROM km where user='$_user' and km='$km'";
$obj = mysqli_query($link,$sql);
if($obj){
  echo '删除成功';
}else{
  echo '删除失败';
}