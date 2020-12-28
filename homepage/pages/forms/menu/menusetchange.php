<?php
require("../connection/connect.php");
?>

<?php
$checkTextname = empty($_POST['menuchangesetname']);
if ( $checkTextname ){
    echo '日本語のセット名入力して下さい！';
  
   exit();
     }
$checkTextname_en = empty($_POST['menuchangesetname_en']);
if ( $checkTextname_en ){
    echo '英語のセット名入力して下さい！';
  
   exit();
     }
$checkTextname_zh_HK = empty($_POST['menuchangesetname_zh_HK']);
if ( $checkTextname_zh_HK ){
    echo '繁体字のセット名入力して下さい！';
  
   exit();
     }
$checkTextname_zh_CH = empty($_POST['menuchangesetname_zh_CH']);
if ( $checkTextname_zh_CH ){
    echo '簡体字のセット名入力して下さい！';
  
   exit();
     }
$checkTextname_ko_KR = empty($_POST['menuchangesetname_ko_KR']);
if ( $checkTextname_ko_KR ){
    echo '韓国語のセット名入力して下さい！';
  
   exit();
     }




?>
<?php
$checkTextcontent =  empty($_POST["menuchangesetcontent"]);
if ( $checkTextcontent ){
    echo '日本語の内容入力して下さい！';
  
   exit();
     
}
$checkTextcontent_en = empty($_POST['menuchangesetcontent_en']);
if ( $checkTextcontent_en  ){
    echo '英語の内容入力して下さい！';
  
   exit();
     }
$checkTextcontent_zh_HK = empty($_POST['menuchangesetcontent_zh_HK']);
if ( $checkTextcontent_zh_HK){
    echo '繁体字の内容入力して下さい！';
  
   exit();
     }
$checkTextcontent_zh_CH = empty($_POST['menuchangesetcontent_zh_CH']);
if ( $checkTextcontent_zh_CH  ){
    echo '簡体字の内容入力して下さい！';
  
   exit();
     }
$checkTextcontent_ko_KR = empty($_POST['menuchangesetcontent_ko_KR']);
if ( $checkTextcontent_ko_KR ){
    echo '韓国語の内容入力して下さい！';
  
   exit();
     }

$checkTextprice =  empty($_POST["menuchangesetprice"]);
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


$str = $_POST['menuchangesetname'];
$match_en = $_POST['menuchangesetname_en'];
$match_zh_HK = $_POST['menuchangesetname_zh_HK'];
$match_zh_CH = $_POST['menuchangesetname_zh_CH'];
$match_ko_KR = $_POST['menuchangesetname_ko_KR'];
$lenth = utf8_strlen($str);
$lenth_en = utf8_strlen($match_en);
$lenth_zh_HK = utf8_strlen($match_zh_HK);
$lenth_zh_CH = utf8_strlen($match_zh_CH);
$lenth_ko_KR = utf8_strlen($match_ko_KR);
if($lenth>30||$lenth_en>30||$lenth_zh_HK>30||$lenth_zh_CH>30||$lenth_ko_KR>30){
echo "セット名の文字数が30文字を超える";
exit();
}

$match= $_POST['menuchangesetcontent'];
$match_en = $_POST['menuchangesetcontent_en'];
$match_zh_HK = $_POST['menuchangesetcontent_zh_HK'];
$match_zh_CH = $_POST['menuchangesetcontent_zh_CH'];
$match_ko_KR = $_POST['menuchangesetcontent_ko_KR'];
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
 if(!(is_numeric($_POST["menuchangesetprice"]))){
 
           echo "価格に数字を入力してください！"; 
           exit();
}
?>
<?php
$newsetid=$_POST['menuchangesetid'];
$newsetname=$_POST['menuchangesetname'];
$newsetname_en=$_POST['menuchangesetname_en'];
$newsetname_zh_HK=$_POST['menuchangesetname_zh_HK'];
$newsetname_zh_CH=$_POST['menuchangesetname_zh_CH'];
$newsetname_ko_KR=$_POST['menuchangesetname_ko_KR'];

    
$newsetcontent=$_POST['menuchangesetcontent'];
$newsetcontent_en=$_POST['menuchangesetcontent_en'];
$newsetcontent_zh_HK=$_POST['menuchangesetcontent_zh_HK'];
$newsetcontent_zh_CH=$_POST['menuchangesetcontent_zh_CH'];
$newsetcontent_ko_KR=$_POST['menuchangesetcontent_ko_KR'];
  $newsetprice=$_POST['menuchangesetprice'];
$result=$conn->query("UPDATE menuset SET name = '$newsetname',name_en = '$newsetname_en',name_zh_HK = '$newsetname_zh_HK',name_zh_CH = '$newsetname_zh_CH',name_ko_KR = '$newsetname_ko_KR', menucompose = '$newsetcontent',menucompose_en = '$newsetcontent_en',menucompose_zh_HK = '$newsetcontent_zh_HK',menucompose_zh_CH = '$newsetcontent_zh_CH',menucompose_ko_KR = '$newsetcontent_ko_KR',price= '$newsetprice'
WHERE menusetid ='$newsetid';");
	if ($result){
    echo "更新成功しました！"; 
   exit();
     
}else{
	echo "エラーが発生しました。しばらくしてからもう一度お試しください。"; 

}
	
//	$i=$_POST['menuchangesetid'];
//
//	$exe1="UPDATE menuset SET menusetid='$i'";
//	
//		$exe1=$exe1.",name='$_POST['menunewsetname']'";	
//        $exe1=$exe1.",menucompose='$_POST['menunewsetcontent']'";
//		$exe1=$exe1.",price='$_POST['menunewsetprice']'";
//	
//	    $exe1=$exe1." WHERE menusetid='".$i."'";
//
//	$updated=$conn->exec($exe1);
//	if ($result){
//    echo "<script>alert('更新成功しました！');location.href='admin.php'</script>"; 
//   exit();
//     
//}else{
//	echo "<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='admin.php'</script>"; 
//
//}

//	$i=$_POST['menuchangesetid'];
//
//	$exe1="UPDATE menuset SET menusetid='".$i."'";
//	
//		$exe1=$exe1.",name='".$_POST['menuchangesetname']."'";
//	
//        $exe1=$exe1.",menucompose='".$_POST['menuchangesetcontent']."'";
//		$exe1=$exe1.",price='".$_POST['menuchangesetprice']."'";
//	   
//        
//	    $exe1=$exe1." WHERE menusetid='".$i."'";
//
//	$updated=$conn->exec($exe1);
//	if ($updated){
//    echo "<script>alert('更新成功しました！');location.href='read.php'</script>"; 
//   exit();
//     
//}else{
//	echo "<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='read.php'</script>"; 
//
//}
?>