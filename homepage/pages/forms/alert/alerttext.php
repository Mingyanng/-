<?php
require("../connection/connect.php");
?>
<?php
$checkText = empty($_POST['alert']);
if ( $checkText ){
    echo 'アラート入力して下さい。';
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
$str = $_POST["alert"];;
$lenth = utf8_strlen($str);
if($lenth>50){
echo "アラートの文字数が50文字を超える";
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
$alert1=$_POST["alert"];

$result=$conn->query("select * from alert");
$conn->exec("UPDATE alert SET alerttext='$alert1' WHERE id='1'");

$t=false;
echo "変更完了。";
	if ($t){
			echo 'もう一度やり直してください。';
		exit();
	}
// }
?>