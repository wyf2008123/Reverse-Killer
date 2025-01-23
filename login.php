<?php
  include("api/mysql.php");
  if(!$isOpenWeb){
    include($closeJump);
    exit;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="" content="">
    <title><?php echo $title?> - 用户登录</title>
  </head>
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <style type="text/css" media="all">
    body{
      background: rgb(70,180,220);
      font-family: Serif;
    }
    .forum{
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .box{
      width: 70%;
      height: 300px;
      background: rgb(256,256,256);
      border-radius: 5px;
      text-align: center;
      padding:10px;
    }
    .form{
      display: flex
      justify-content: center;
      flex-direction: column;
      margin: 10px;
    }
    input{
      font-family: Serif;
      outline:none;
      width: 80%;
      height: 35px;
      padding-left:5px;
      border: 1px solid rgb(60,160,210);
      border-radius: 5px;
    }
    button{
      font-family: Serif;
      margin-top: 10px;
      width: 80%;
      height: 38px;
      border-radius: 19px;
      border: 0px;
      background: rgb(51,161,221);
      color:white;
    }
    button:active{
      background: rgb(200,200,200);
    }
    input[type="password"]{
      margin: 20px;
    }
  </style>
  <body>
    <div class="forum">
      <div class="box">
        <span>登录</span>
        <div class="form">
          <input type="text" value="" placeholder="请输入账号" /><br />
          <input type="password" value="" placeholder="请输出密码"/><br>
          <button onclick="login()">登录</button>
          <div style="margin-top:10px"><a href="reg.php">注册</a></div>
        </div>
      </div>
    </div>
    <script src='index.js'>
    </script>
    <script src='md5.js'>
    </script>
    <script type="text/javascript">
      function hs(url, request, callback) {
        var httpRequest = new XMLHttpRequest(); 
        httpRequest.open('POST', url, true); 
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        httpRequest.send(request); 
        httpRequest.onreadystatechange = function() { 
          if (httpRequest.readyState == 4 && httpRequest.status == 200) { 
            var end = httpRequest.responseText;
            callback(end);
          }
        };
      }
      function setcookie(name, value, time) {
        var d = new Date();
        d.setTime(d.getTime() + time);
        var expires = "expires=" + d.toGMTString();
        document.cookie = name + "=" + value + ";" + expires;
      }
      function utw(title,content,buttonContent,buttonOnclick){
        var object = document.querySelector("body");
        object.insertAdjacentHTML("afterbegin",'<div class="iweb-utw-box" style="width:100%;height: 100vh;display: flex;justify-content: center;align-items: center;position: fixed;background:rgb(0,0,0,0.3);"><div class="iweb-utw-box-smallBox"><div class="iweb-utw-title">'+title+'</div><div class="iweb-utw-content">'+content+'</div><div class="iweb-utw-button"><button type="button" onclick=javascript:document.querySelector(".iweb-utw-box").remove();>取消</button><button type="button" onclick="'+buttonOnclick+'">'+buttonContent+'</button></div></div></div>');
      }
      function endutw(){
        document.querySelector(".iweb-utw-box").remove();
      }
      function login(){
        var user = document.querySelector("[type='text']").value;
        var pass = document.querySelector("[type='password']").value;
        hs("api/login.php?user="+user+"&pass="+pass,"",function(data){
          if(data=="登录成功"){
            setcookie("user",user,1000*60*60*24);
            setcookie("pass",pass,1000*60*60*24);
            //储存一天
            window.location.href = "../index.php"
            
          }
          utw("登录提示",data,"确定","endutw()");
        });
      }
    </script>
  </body>
</html>