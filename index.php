<?php
  include("api/mysql.php");
  if(!$isOpenWeb){
    include($closeJump);
    exit;
  }
?>
<?php
include('api/mysql.php');
if(isset($_COOKIE['user']) and isset($_COOKIE['pass'])){
  $_user = $_COOKIE['user'];
  $_pass = $_COOKIE['pass'];
  $sql ="SELECT * FROM user where user='$_user'";
	$obj = mysqli_query($link,$sql);
	if(!mysqli_fetch_assoc($obj)){
	  exit("<script>alert('账号不存在')</script>");
	}
	$_pass = md5($_pass);
	$sql ="SELECT * FROM user where user='$_user' and pass='$_pass'";
	$obj = mysqli_query($link,$sql);
	if(!mysqli_fetch_assoc($obj)){
	  exit("<script>alert('密码错误')</script>");
	}
	
}else{
  include("login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="" content="">
  <title><?php echo $title?> - 卡密系统</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css" media="all">
  body {
    background: #f0f0f0;
    font-family: Serif;
    
  }

  .top_card {
    width: 100%;
    height: 50px;
    background: #AFB0BA;
    box-shadow: 0px 0px 30px #AFB0BA, -18px -18px 30px #AFB0BA;
    position: relative;
    top: 0px;
    display: flex;
    align-items: center;
  }

  .tx {
    margin: 10px;
    width: 30px;
    height: 30px;
    box-shadow: 18px 18px 30px rgba(0, 0, 0, 0.1), -18px -18px 30px rgba(255, 255, 255, 1);
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
    background-color: #efeeee;
    transition: box-shadow .2s ease-in-out;
    position: relative;
  }
  .top_card > .user{
    font-size: 13px;
  }
  .endLogin{
    position: absolute;
    right: 10px;
    font-size: 13px;
    width: 60px;
    height: 28px;
    background: #8489C5;
    border-radius: 5px;
    color:#ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .endLogin:active{
    background: #A3A7DA;
  }
  
  .tou{
  display: flex;
  flex-direction: row;
  background-color: #ffffff;
  border-radius:3px;
  margin-top:20px;
  }
  .tou > div{
  display: flex;
  align-items:center;
  justify-content:center;
  height:50px;
  width:100%;
  font-size:12px;
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
  font-size:11px;
  }
  
</style>

<body>
  <div class="top_card">
    <div class="tx">
      <svg t="1662998063428" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2981" width="200" height="200"><path d="M512 393.728m-117.76 0a117.76 117.76 0 1 0 235.52 0 117.76 117.76 0 1 0-235.52 0Z" fill="#CCDAFF" p-id="2982"></path><path d="M698.88 666.112c0 9.728-1.536 18.944-8.704 27.648-26.112 31.744-96.256 54.272-178.176 54.272-81.92 0-152.064-22.528-178.176-54.272-7.168-8.704-8.704-17.92-8.704-27.648 0-9.728 1.536-18.944 8.704-27.648 26.112-31.744 96.256-54.272 178.176-54.272 81.92 0 152.064 22.528 178.176 54.272 7.168 8.704 8.704 17.92 8.704 27.648zM258.048 393.728c0 54.784 49.664 99.328 111.616 100.352 3.584 0 5.632-3.584 3.584-6.144-33.792-41.984-30.72-152.576 2.048-189.952 1.536-1.536 0.512-4.096-1.536-4.096-63.488-1.024-115.712 44.032-115.712 99.84zM204.8 622.08c0 9.728 1.536 18.432 7.168 27.136 13.312 19.456 33.28 31.744 67.584 41.984 11.776 3.584-34.816-58.368 71.68-144.384 1.536-1.024 1.024-4.096-1.024-4.096-64 1.536-117.76 23.04-138.24 52.736-5.632 8.192-7.168 17.408-7.168 26.624zM765.952 393.728c0 54.784-49.664 99.328-111.616 100.352-3.584 0-5.632-3.584-3.584-6.144 33.792-41.984 30.72-152.576-2.048-189.952-1.536-1.536-0.512-4.096 1.536-4.096 63.488-1.024 115.712 44.032 115.712 99.84zM819.2 622.08c0 9.728-1.536 18.432-7.168 27.136-13.312 19.456-33.28 31.744-67.584 41.984-11.776 3.584 34.816-58.368-71.68-144.384-1.536-1.024-1.024-4.096 1.024-4.096 64 1.536 117.76 23.04 138.24 52.736 5.632 8.192 7.168 17.408 7.168 26.624z" fill="#7A7AF9" p-id="2983"></path></svg>
    </div>
    <span class="user">1323613811</span>
    <div class="endLogin" onclick="endUser()">退出</div>
  </div>
  
  <div class="box">
  <div class="tou">
     <div>操作</div>
     <div>Kami</div>
     <div>Imei</div>
     <div>establishTime</div>
     <div>effectiveTime</div>
  </div>
  
<?php
$sql="SELECT * FROM km where user='$_user'";
$obj = mysqli_query($link,$sql);
while($row=mysqli_fetch_array($obj)){
  $effectiveTime = date('Y-m-d H:i:s',strtotime("+".$row['effectiveTime']."second", strtotime($row['establishTime'])));
  $_km = $row["km"];
  echo '<div class="itme">
     <div onclick="_delete(\''.$_km.'\')" >删除</div>
     <div>'.$row["km"].'</div>
     <div>'.$row["imei"].'</div>
     <div>'.$row["establishTime"].'</div>
     <div>'.$effectiveTime.'</div>
   </div>';
}

?>
</div>
  
  
  
  <script src='index.js'>
  </script>
  <script src='md5.js'>
  </script>
  <script>
     alert(gcookie('pass'));
     function hs(url, request, callback) {
        var httpRequest = new XMLHttpRequest(); //第一步：创建需要的对象
        httpRequest.open('POST', url, true); //第二步：打开连接
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //设置请求头 注：post方式必须设置请求头（在建立连接后设置请求头）
        httpRequest.send(request); //发送请求 将情头体写在send中
        httpRequest.onreadystatechange = function() { //请求后的回调接口，可将请求成功后要执行的程序写在其中
          if (httpRequest.readyState == 4 && httpRequest.status == 200) { //验证请求是否发送成功
            var end = httpRequest.responseText; //获取到服务端返回的数据
            callback(end);
          }
        };
      }
     
     
      function endUser(){
        utw("系统提示","是否退出登录","确认","exit()");
      }
      function exit(){
        dcookie("user");
        dcookie("pass");
        window.location.reload();
      }
      function _delete(km){
        var user = gcookie('user');
        var pass = gcookie('pass');
        hs('api/delete.php?user='+user+'&pass='+pass+'&km='+km,"",function(data){
          alert(data);
        });
      }
  </script>
</body>
</html>
