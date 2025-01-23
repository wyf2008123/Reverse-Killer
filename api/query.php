<?php
include("mysql.php");
include('tool.php');
//账号登录
$_user = $_GET['user'];//账号
$imei = $_GET['imei'];
$appName = $_GET['app'];
if($_user == '' or $imei == '' or $appName==''){
  exit('不能留空');
}
$sql = "SELECT * FROM user where user='$_user'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){
  exit("账号不存在");
}
$sql = "SELECT * FROM app where user='$_user' and name='$appName'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){exit("应用不存在");}
$sql = "SELECT * FROM km where user='$_user' and imei='$imei'";
$obj = mysqli_query($link,$sql);
if(!$row = mysqli_fetch_assoc($obj)){
  exit("该设备未绑定");
}
if(isOverdue($row['establishTime'],$row['effectiveTime'])){
 exit('卡密已过期');
}
echo '登录成功';