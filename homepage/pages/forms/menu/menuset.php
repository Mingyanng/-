<?php
	require("../connection/connect.php");
?>
<?php
$checkTextname = empty($_POST['menunewsetname']);
if ( $checkTextname ){
    echo '日本語のセット名入力して下さい！';
  
   exit();
     }
$checkTextname_en = empty($_POST['menunewsetname_en']);
if ( $checkTextname_en ){
    echo '英語のセット名入力して下さい！';
  
   exit();
     }
$checkTextname_zh_HK = empty($_POST['menunewsetname_zh_HK']);
if ( $checkTextname_zh_HK ){
    echo '繁体字のセット名入力して下さい！';
  
   exit();
     }
$checkTextname_zh_CH = empty($_POST['menunewsetname_zh_CH']);
if ( $checkTextname_zh_CH ){
    echo '簡体字のセット名入力して下さい！';
  
   exit();
     }
$checkTextname_ko_KR = empty($_POST['menunewsetname_ko_KR']);
if ( $checkTextname_ko_KR ){
    echo '韓国語のセット名入力して下さい！';
  
   exit();
     }




?>
<?php
$checkTextcontent =  empty($_POST["menunewsetcontent"]);
if ( $checkTextcontent ){
    echo '日本語の内容入力して下さい！';
  
   exit();
     
}
$checkTextcontent_en = empty($_POST['menunewsetcontent_en']);
if ( $checkTextcontent_en  ){
    echo '英語の内容入力して下さい！';
  
   exit();
     }
$checkTextcontent_zh_HK = empty($_POST['menunewsetcontent_zh_HK']);
if ( $checkTextcontent_zh_HK){
    echo '繁体字の内容入力して下さい！';
  
   exit();
     }
$checkTextcontent_zh_CH = empty($_POST['menunewsetcontent_zh_CH']);
if ( $checkTextcontent_zh_CH  ){
    echo '簡体字の内容入力して下さい！';
  
   exit();
     }
$checkTextcontent_ko_KR = empty($_POST['menunewsetcontent_ko_KR']);
if ( $checkTextcontent_ko_KR ){
    echo '韓国語の内容入力して下さい！';
  
   exit();
     }

$checkTextprice =  empty($_POST["menunewsetprice"]);
if ( $checkTextprice ){
    echo '価格入力して下さい！';
  
   exit();
     
}
?>
<?php
function utf8_strlen($string = null) {

preg_match_all("/./us", $string, $match);

return count($match[0]);
}


$str = $_POST['menunewsetname'];
$match_en = $_POST['menunewsetname_en'];
$match_zh_HK = $_POST['menunewsetname_zh_HK'];
$match_zh_CH = $_POST['menunewsetname_zh_CH'];
$match_ko_KR = $_POST['menunewsetname_ko_KR'];
$lenth = utf8_strlen($str);
$lenth_en = utf8_strlen($match_en);
$lenth_zh_HK = utf8_strlen($match_zh_HK);
$lenth_zh_CH = utf8_strlen($match_zh_CH);
$lenth_ko_KR = utf8_strlen($match_ko_KR);
if($lenth>30||$lenth_en>30||$lenth_zh_HK>30||$lenth_zh_CH>30||$lenth_ko_KR>30){
echo "セット名の文字数が30文字を超える";
exit();
}

$match= $_POST['menunewsetcontent'];
$match_en = $_POST['menunewsetcontent_en'];
$match_zh_HK = $_POST['menunewsetcontent_zh_HK'];
$match_zh_CH = $_POST['menunewsetcontent_zh_CH'];
$match_ko_KR = $_POST['menunewsetcontent_ko_KR'];
$len = utf8_strlen($match);
$len_en = utf8_strlen($match_en);
$len_zh_HK = utf8_strlen($match_zh_HK);
$len_zh_CH = utf8_strlen($match_zh_CH);
$len_ko_KR = utf8_strlen($match_ko_KR);
if($len>50||$len_en>50||$len_zh_HK>50||$len_zh_CH>50||$len_ko_KR>50){
echo "内容の文字数が50文字を超える";
exit();
}


?>

<?php
 if(!(is_numeric($_POST["menunewsetprice"]))){
 
           echo "価格に数字を入力してください！"; 
           exit();
}
?>

<?php
	$result=$conn->query("insert into menuset (name,name_en,name_zh_HK,name_zh_CH,name_ko_KR,menucompose,menucompose_en,menucompose_zh_HK,menucompose_zh_CH,menucompose_ko_KR,price)  values('".$_POST["menunewsetname"]."','".$_POST["menunewsetname_en"]."','".$_POST["menunewsetname_zh_HK"]."','".$_POST["menunewsetname_zh_CH"]."','".$_POST["menunewsetname_ko_KR"]."','".$_POST["menunewsetcontent"]."','".$_POST["menunewsetcontent_en"]."','".$_POST["menunewsetcontent_zh_HK"]."','".$_POST["menunewsetcontent_zh_CH"]."','".$_POST["menunewsetcontent_ko_KR"]."','".$_POST["menunewsetprice"]."');");
 	if ($result){
    echo "<script>alert('追加成功しました！');location.href='admin.php'</script>"; 
   exit();
     
}else{
	echo "<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='admin.php'</script>"; 
exit();
}
 	
?>