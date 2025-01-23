<?php
/****数据库账号密码修改****/

$host = "localhost"; //主机地址默认：localhost
$user = "yujiannb666"; //数据库账号
$pwd = "yujiannb666"; //数据库密码
$name = "yujiannb666"; //数据库名

/**********************/

/*****网址其他配置*******/
$title = "卡密后台";
//网站标题
$isOpenWeb = true;
//是否开启网站
$closeJump = "close.html";
//网站被关闭后自动跳转到网页，默认网页为close.html
//目前只能是本地网页
/**********************/


@$link = mysqli_connect($host,$user,$pwd);
if(!$link){
exit('数据库连接失败');
}
@mysqli_set_charset($link,'utf8');
@mysqli_select_db($link,$name);
?>