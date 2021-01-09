<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script>
// 这句必须，否则 IE 下代码会出错
var d1;

function init(){
  // 不用document.all 是为了兼容别的浏览器
  d1=document.getElementById("d1"); 
  refreshDiv();
  // 注意 setInterval 的用法
  setInterval("refreshDiv();",1000);
}

function refreshDiv(){
  // d1 已经被定义为了全局变量，可以直接用
  //d1.innerHTML="anything you like." + (new Date()).toLocaleString();
}
</script>
</head>
<body onload="init();">
<div id="d1" style="background-color:red;width:300px;height:200px;">
  
    dddd
 </div>
     <?php
$time=1;
//$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$a="1";

$file_path

= "domain.txt";

if(file_exists($file_path)){

$fp= fopen($file_path,"r");

$str= fread($fp,filesize($file_path));



}

$user = substr_count($str,$a);

if($user==1){
    echo"忙しい";
}else{
echo"少し空いている";
}


//sleep($time);
//file_get_contents($url);

?> 
<div style="background-color:#CCCCCC;width:300px;height:200px;">
  <input type="text">
</div>
</body>
</html>

