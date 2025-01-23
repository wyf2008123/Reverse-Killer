
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

function utw(title,content,buttonContent,buttonOnclick){
  var object = document.querySelector("body");
  object.insertAdjacentHTML("afterbegin",'<div class="iweb-utw-box" style="width:100%;height: 100vh;display: flex;justify-content: center;align-items: center;position: fixed;background:rgb(0,0,0,0.3);"><div class="iweb-utw-box-smallBox"><div class="iweb-utw-title">'+title+'</div><div class="iweb-utw-content">'+content+'</div><div class="iweb-utw-button"><button type="button" onclick=javascript:document.querySelector(".iweb-utw-box").remove();>取消</button><button type="button" onclick="'+buttonOnclick+'">'+buttonContent+'</button></div></div></div>');
}

function gcookie(name) {
    var name = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) { var c = ca[i].trim(); if (c.indexOf(name) == 0) return c.substring(name.length, c.length); }
    return "";
}
function scookie(name, value, time) {
    var d = new Date();
    d.setTime(d.getTime() + time);
    var expires = "expires=" + d.toGMTString();
    document.cookie = name + "=" + value + ";" + expires;
}

function dcookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
}