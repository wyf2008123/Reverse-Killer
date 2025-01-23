<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数据库</title>
    <link rel="stylesheet" type="text/css" href="./css/index.css"/>
</head>
<style>
*{
   margin: 0;
   padding: 0;
}
.box{
   margin: 50px;
   background-color: #d2dbcd;
   padding: 10px;
   border-radius:3px;
   min-height:200px;
   overflow:auto;
}
.tou{
display: flex;
flex-direction: row;
background-color: #ffffff;
border-radius:3px;
}
.tou > div{
display: flex;
align-items:center;
justify-content:center;
height:50px;
width:100%;
}
.itme{
display: flex;
flex-direction: row;
}
.itme > div{
overflow-x:auto;
display: flex;
align-items:center;
justify-content:center;
height:50px;
width:100%;
font-size:10sp;
}

</style>
<body>
<script type="text/javascript" src="./js/index.js"></script>

<div class="box">
  <div class="tou">
     <div>app</div>
     <div>Kami</div>
     <div>Imei</div>
     <div>establishTime</div>
     <div>effectiveTime</div>
  </div>
  
<?php
include("mysql.php");
//这里的账号密码为数据库的账号密码

$_user = $_GET['user'];
$_pass = $_GET['pass'];
if($_user=='' or $_pass==''){
  exit("<script>alert('不能留空')</script>");
}
$sql = "SELECT * FROM user where user='$_user'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){
  exit("<script>alert('账号不存在')</script>");
}
$_pass = md5($_pass);
$sql = "SELECT * FROM user where user='$_user' and pass='$_pass'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){
  exit("<script>alert('密码错误')</script>");
}

$sql = "SELECT * FROM app where user='$_user'";
$obj = mysqli_query($link,$sql);
if(!mysqli_fetch_assoc($obj)){exit("<script>alert('应用不存在')</script>");}

$sql="SELECT * FROM km where user='$_user' and name='$appName'";
$obj = mysqli_query($link,$sql);
while($row=mysqli_fetch_array($obj)){
  $effectiveTime = date('Y-m-d H:i:s',strtotime("+".$row['effectiveTime']."second", strtotime($row['establishTime'])));
  echo '<div class="itme">
     <div>'.$row["name"].'</div>
     <div>'.$row["km"].'</div>
     <div>'.$row["imei"].'</div>
     <div>'.$row["establishTime"].'</div>
     <div>'.$effectiveTime.'</div>
   </div>';
}

?>
  
  
</div>

</body>
</html>



