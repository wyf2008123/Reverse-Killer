<?php
include("mysql.php");
$_link = mysqli_connect($host,$user,$pwd,$name);
if(!$_link){
exit('数据库连接失败');
}else{
$sql = "CREATE TABLE km (
  user varchar(255) NOT NULL,
  km varchar(255) NOT NULL,
  imei varchar(255) NOT NULL,
  establishTime varchar(255) NOT NULL,
  effectiveTime varchar(255) NOT NULL
)";
if(mysqli_query($_link,$sql)){
  $sql = "CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT,
    user varchar(255) NOT NULL,
    pass varchar(255) NOT NULL,
    ip varchar(255) NOT NULL,
    time varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
  )";
  if(mysqli_query($_link,$sql)){
    echo "创建成功";
  }else{
    echo "创建失败,自行检查参数是否有误";
  }
}else{
echo "创建失败,自行检查参数是否有误";
}
}