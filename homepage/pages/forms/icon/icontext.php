<?php
require("../connection/connect.php");
?>
<?php
$checkText = empty($_POST['ititle1']);
if ( $checkText ){
    echo 'タイトル入力して下さい。';
   exit();
     
}

?>
<?php
$checkText =  empty($_POST["itext1"]);
if ( $checkText ){
    echo '日本語の内容入力して下さい！';
    
   exit();
     
}

$checkText_en =  empty($_POST["itext1_en"]);
if ( $checkText_en ){
    echo '英語の内容入力して下さい！';
  
   exit();
     
}
$checkText_zh_HK =  empty($_POST["itext1_zh_HK"]);
if ( $checkText_zh_HK ){
    echo '繁体字の内容入力して下さい！';
   
   exit();
     
}
$checkText_zh_CH =  empty($_POST["itext1_zh_CH"]);
if ( $checkText_zh_CH ){
    echo '簡体字の内容入力して下さい！';

   exit();
     
}
$checkText_ko_KR =  empty($_POST["itext1_ko_KR"]);
if ( $checkText_ko_KR ){
    echo '韓国語の内容入力して下さい！';
  
   exit();
     
}
?>
<?php
function utf8_strlen($string = null) {

preg_match_all("/./us", $string, $match);

return count($match[0]);
}
?>
<?php
$str = $_POST['ititle1'];

$lenth = utf8_strlen($str);

if($lenth>25){
echo "タイトルの文字数が25文字を超える";
exit();
}
?>
<?php
$match= $_POST['itext1'];
$match_en = $_POST['itext1_en'];
$match_zh_HK = $_POST['itext1_zh_HK'];
$match_zh_CH = $_POST['itext1_zh_CH'];
$match_ko_KR = $_POST['itext1_ko_KR'];
$lenth = utf8_strlen($match);
$lenth_en = utf8_strlen($match_en);
$lenth_zh_HK = utf8_strlen($match_zh_HK);
$lenth_zh_CH = utf8_strlen($match_zh_CH);
$lenth_ko_KR = utf8_strlen($match_ko_KR);
if($lenth>250||$lenth_en>250||$lenth_zh_HK>250||$lenth_zh_CH>250||$lenth_ko_KR>250){
echo "内容の文字数が250文字を超える";
exit();
}
?>
<?php
	// session_start();
	// if (empty($_SESSION['name'])){
	// 	header("Location: login.php");
	// 	exit();
	// }else{
$t=true;
$ititle11=$_POST["ititle1"];
$itext11=$_POST["itext1"];
$itext11_en=$_POST["itext1_en"];
$itext11_zh_HK=$_POST["itext1_zh_HK"];
$itext11_zh_CH=$_POST["itext1_zh_CH"];
$itext11_ko_KR=$_POST["itext1_ko_KR"];
$result=$conn->query("select * from icontext");
$conn->exec("UPDATE icontext SET ititle='$ititle11' WHERE id='1'");
$conn->exec("UPDATE icontext SET itext='$itext11',itext_en='$itext11_en',itext_zh_HK='$itext11_zh_HK',itext_zh_CH='$itext11_zh_CH',itext_ko_KR='$itext11_ko_KR' WHERE id='1'");
$t=false;
echo "変更完了。";
	if ($t){
			echo 'もう一度やり直してください。';
		exit();
	}
// }
?>