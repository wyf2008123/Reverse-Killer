<?php
include('mysql.php');
include("tool.php");
//绑定卡密，一个设备绑定一个卡密
$_user = $_GET['user'];
$km = $_GET['km'];
$imei = $_GET['imei'];
$appName = $_GET['app'];
if($km == '' or $imei == '' or $_user == '' or $appName == ""){
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
if(mysqli_fetch_assoc($obj)){
  exit("该设备被绑定过了");
}

$sql = "SELECT * FROM km where user='$_user' and name='$appName' and km='$km'";
$obj = mysqli_query($link,$sql);
if(!@mysqli_fetch_assoc($obj)){
  exit("卡密不存在");
}

$sql = "SELECT * FROM km where user='$_user' and km='$km' and imei='false'";
$obj = mysqli_query($link,$sql);
if(!$row = mysqli_fetch_assoc($obj)){
  exit("卡密已被使用");
}
if(isOverdue($row['establishTime'],$row['effectiveTime'])){
 exit('卡密已过期');
}

$sql ="UPDATE km SET imei=\"$imei\" where user='$_user' and name='$appName' and km=\"$km\"";
if(mysqli_query($link,$sql)){
  echo '绑定成功';
}else{
  echo '绑定失败';
}

?>