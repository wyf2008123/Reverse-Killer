<?php
function addKey($num = 10){
	//默认卡密长度为10
	
	$data = Array(
   	//数字行
   	1,2,3,4,5,6,7,8,9,0,
   	//大写字母行
   	'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
   	//小写字母行
   	'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'
	);
	
	//储存返回值的盒子
	$box = "";
	
	for($i = 1;$i <= $num;$i++){
	   //获取随机键值
	   $Rand = mt_rand(0,count($data) - 1);
	   $box = $box.$data[$Rand];
	}
	
	//返回随机字符串
	return $box;
	
}
function getIp(){
  return $_SERVER['REMOTE_ADDR'];
}
function isOverdue($establishTime,$effectiveTime){
  //卡密是否过期
  //return date($establishTime,strtotime('+86400second'));
  $is = strtotime("+".$effectiveTime."second", strtotime($establishTime));
  if($is > strtotime(date('Y-m-d H:i:s'))){
    return false;
  }else{
    return true;
  }
}
?>