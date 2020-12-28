<?php
require("../connection/connect.php");
?>
<?php
$checkText = empty($_POST['ititle1']) || empty($_POST["itext1"]);
if ( $checkText ){
    echo 'タイトル或いは内容入力して下さい。';
    // header("Location:../admin.php");
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
$lenth = utf8_strlen($match);
if($lenth>250){
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
$result=$conn->query("select * from icontext");
$conn->exec("UPDATE icontext SET ititle='$ititle11' WHERE id='1'");
$conn->exec("UPDATE icontext SET itext='$itext11' WHERE id='1'");
$t=false;
echo "変更完了。";
	if ($t){
			echo 'もう一度やり直してください。';
		exit();
	}
// }
?>