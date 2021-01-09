<?php
	require("../connection/connect.php");
?>
<?php
$checkTextname = empty($_POST['menuname']);
if ( $checkTextname ){
    echo '日本語の商品名入力して下さい！';
    // headefr("Location:../admin.php");
   exit();
     }
$checkTextname_en = empty($_POST['menuname_en']);
if ( $checkTextname_en ){
    echo '英語の商品名入力して下さい！';
  
   exit();
     }
$checkTextname_zh_HK = empty($_POST['menuname_zh_HK']);
if ( $checkTextname_zh_HK ){
    echo '繁体字の商品名入力して下さい！';
  
   exit();
     }
$checkTextname_zh_CH = empty($_POST['menuname_zh_CH']);
if ( $checkTextname_zh_CH ){
    echo '簡体字の商品名入力して下さい！';
  
   exit();
     }
$checkTextname_ko_KR = empty($_POST['menuname_ko_KR']);
if ( $checkTextname_ko_KR ){
    echo '韓国語の商品名入力して下さい！';
  
   exit();
     }


?>
<?php
$checkTextother =  empty($_POST["menuother"]);
if ( $checkTextother ){
    echo '日本語の紹介入力して下さい！';
    // header("Location:../admin.php");
   exit();
     
}
$checkTextother_en = empty($_POST['menuother_en']);
if ( $checkTextother_en  ){
    echo '英語の内容入力して下さい！';
  
   exit();
     }
$checkTextother_zh_HK = empty($_POST['menuother_zh_HK']);
if ( $checkTextother_zh_HK){
    echo '繁体字の内容入力して下さい！';
  
   exit();
     }
$checkTextother_zh_CH = empty($_POST['menuother_zh_CH']);
if ( $checkTextother_zh_CH  ){
    echo '簡体字の内容入力して下さい！';
  
   exit();
     }
$checkTextother_ko_KR = empty($_POST['menuother_ko_KR']);
if ( $checkTextother_ko_KR ){
    echo '韓国語の内容入力して下さい！';
  
   exit();
     }

$checkTextprice =  empty($_POST["menuprice"]);
if ( $checkTextprice ){
    echo '価格入力して下さい！';
  
   exit();
     
}
?>

<?php


?>

<?php
function utf8_strlen($string = null) {

preg_match_all("/./us", $string, $match);

return count($match[0]);
}
?>
<?php
$str = $_POST['menuname'];
$match_en = $_POST['menuname_en'];
$match_zh_HK = $_POST['menuname_zh_HK'];
$match_zh_CH = $_POST['menuname_zh_CH'];
$match_ko_KR = $_POST['menuname_ko_KR'];
$lenth = utf8_strlen($str);
$lenth_en = utf8_strlen($match_en);
$lenth_zh_HK = utf8_strlen($match_zh_HK);
$lenth_zh_CH = utf8_strlen($match_zh_CH);
$lenth_ko_KR = utf8_strlen($match_ko_KR);
if($lenth>30||$lenth_en>30||$lenth_zh_HK>30||$lenth_zh_CH>30||$lenth_ko_KR>30){
echo "商品名が30文字を超える";
exit();
}
?>
<?php
$match= $_POST['menuother'];
$match_en = $_POST['menuother_en'];
$match_zh_HK = $_POST['menuother_zh_HK'];
$match_zh_CH = $_POST['menuother_zh_CH'];
$match_ko_KR = $_POST['menuother_ko_KR'];
$len = utf8_strlen($match);
$len_en = utf8_strlen($match_en);
$len_zh_HK = utf8_strlen($match_zh_HK);
$len_zh_CH = utf8_strlen($match_zh_CH);
$len_ko_KR = utf8_strlen($match_ko_KR);
if($len>100||$len_en>100||$len_zh_HK>100||$len_zh_CH>100||$len_ko_KR>100){
echo "紹介の文字数が100文字を超える";
exit();
}
?>

<?php
$tell=false;
if(empty($_POST["menusize"])){
    echo "日本語のサイズ入力してください";
    exit();
}
if(empty($_POST["menusize_en"])){
    echo "英語のサイズ入力してください";
    exit();
}
if(empty($_POST["menusize_zh_HK"])){
    echo "繁体字のサイズ入力してください";
    exit();
}
if(empty($_POST["menusize_zh_CH"])){
    echo "簡体字のサイズ入力してください";
    exit();
}
if(empty($_POST["menusize_ko_KR"])){
    echo "韓国語のサイズ入力してください";
    exit();
}
for ($i=0;$i<count($_POST["menusize"]);$i++){
    if ($_POST["menusize"][$i]==null||strlen($_POST["menusize"][$i])<=0){
        $tell=true;
    }
}
for ($i=0;$i<count($_POST["menusize_en"]);$i++){
    if ($_POST["menusize_en"][$i]==null||strlen($_POST["menusize_en"][$i])<=0){
        $tell=true;
    }
}
for ($i=0;$i<count($_POST["menusize_zh_HK"]);$i++){
    if ($_POST["menusize_zh_HK"][$i]==null||strlen($_POST["menusize_zh_HK"][$i])<=0){
        $tell=true;
    }
}
for ($i=0;$i<count($_POST["menusize_zh_CH"]);$i++){
    if ($_POST["menusize_zh_CH"][$i]==null||strlen($_POST["menusize_zh_CH"][$i])<=0){
        $tell=true;
    }
}
for ($i=0;$i<count($_POST["menusize_ko_KR"]);$i++){
    if ($_POST["menusize_ko_KR"][$i]==null||strlen($_POST["menusize_ko_KR"][$i])<=0){
        $tell=true;
    }
}
if(empty($_POST["menuprice"])){
    echo "価格入力してください";
    exit();
}
for ($i=0;$i<count($_POST["menuprice"]);$i++){
    if ($_POST["menuprice"][$i]==null||strlen($_POST["menuprice"][$i])<=0){
        $tell=true;
    }
           if(!(is_numeric($_POST["menuprice"][$i]))){
  
           echo "価格に数字を入力してください！"; 
           exit();
}
}
  

if ($tell){
    echo "サイズ或いは価格入力してください！"; 
    exit();
}

?>


<?php
    	
 	$id=$_POST['menuid'];

 	$exe1="UPDATE menu inner join menunature SET commodityid='".$id."'";
	
 		$exe1=$exe1.",name='".$_POST['menuname']."'";
        $exe1=$exe1.",name_en='".$_POST['menuname_en']."'";
        $exe1=$exe1.",name_zh_HK='".$_POST['menuname_zh_HK']."'";
        $exe1=$exe1.",name_zh_CH='".$_POST['menuname_zh_CH']."'";
        $exe1=$exe1.",name_ko_KR='".$_POST['menuname_ko_KR']."'";
        $exe1=$exe1.",other='".$_POST['menuother']."'";
        $exe1=$exe1.",other_en='".$_POST['menuother_en']."'";
        $exe1=$exe1.",other_zh_HK='".$_POST['menuother_zh_HK']."'";
        $exe1=$exe1.",other_zh_CH='".$_POST['menuother_zh_CH']."'";
        $exe1=$exe1.",other_ko_KR='".$_POST['menuother_ko_KR']."'";
 	    $exe1=$exe1." WHERE commodityid='".$id."'";
 //echo $exe1;

 	$updated=$conn->query($exe1);

for ($i=0;$i<count($_POST["menunatureid"]);$i++){
    if (strcmp($_POST['menunatureid'][$i],"new")==0){
        $sql="insert into menunature (size,size_en,size_zh_HK,size_zh_CH,size_ko_KR,price, commodityid1)  values('".$_POST["menusize"][$i]."','".$_POST["menusize_en"][$i]."','".$_POST["menusize_zh_HK"][$i]."','".$_POST["menusize_zh_CH"][$i]."','".$_POST["menusize_ko_KR"][$i]."','".$_POST["menuprice"][$i]."','".$id."');";
        //echo $sql;
        $result=$conn->query($sql);
 	      if ($result){
//            echo "tianjia"; 

        }else{
           echo "エラーが発生しました。しばらくしてからもう一度お試しください。"; 
          }
        continue;
 	//exit(); 
    }

    
		$sql="UPDATE menunature SET size='".$_POST["menusize"][$i]."',
        size_en='".$_POST["menusize_en"][$i]."',
        size_zh_HK='".$_POST["menusize_zh_HK"][$i]."',
        size_zh_CH='".$_POST["menusize_zh_CH"][$i]."',
        size_ko_KR='".$_POST["menusize_ko_KR"][$i]."',
        price='".$_POST["menuprice"][$i]."'
		where natureid='".$_POST['menunatureid'][$i]."'";
	$updated2=$conn->query($sql);

    
//echo $sql;
    
    
    
 	if ($updated&&$updated2){
   echo "更新成功しました！"; 
    }else{
         echo "エラーが発生しました。しばらくしてからもう一度お試しください。"; 
    }
}
  
?>

