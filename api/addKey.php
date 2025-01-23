<?php
include('tool.php');
include('mysql.php');

//一键添加卡密
$_user = $_GET['user'];//账号
$_pass = $_GET['pass'];//md5加密密码
$num = $_GET['num'];
$second = $_GET['second'];//有效时长
//卡密的有效时间 单位为秒 例如：1天 = 1*60*60*24 = 86400（秒）
$appName = $_GET["app"];
if($_user == '' or $_pass == '' or $appName=='' or $num == '' or $second == ''){
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

$sql = "SELECT * FROM user where user='$_user'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){
  exit("账号不存在");
}

$sql = "SELECT * FROM app where user='$_user' and name='$appName'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){exit("应用不存在");}

for($i = 1;$i <= $num;$i++){
  $km = addKey(16);
  $time = date('Y-m-d h:i:s');
  $sql = "INSERT INTO km(user,name,km,imei,establishTime,effectiveTime) VALUES ('$_user','$appName','$km','false','$time','$second')";
  mysqli_query($link,$sql);
  echo $km.'<br>';
}
?>