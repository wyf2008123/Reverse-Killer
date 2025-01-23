<?php
include('mysql.php');
//解除绑定
$imei = $_GET['imei'];
$_user = $_GET['user'];//账号
$_pass = $_GET['pass'];//md5加密密码
$appName = $_GET['app'];
if($imei == '' or $_user=='' or $_pass==''){
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

$sql = "SELECT * FROM km where user='$_user' and imei='$imei'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){
  exit("该设备未绑定卡密");
  
}
$sql ="UPDATE km SET imei=\"false\" where user='$_user' and imei=\"$imei\"";
if(mysqli_query($link,$sql)){
  echo '解绑成功';
}else{
  echo '解绑失败';
}

?>