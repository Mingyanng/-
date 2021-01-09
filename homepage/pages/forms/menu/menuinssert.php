<?php
	require("../connection/connect.php");
?>

<?php
$checkTextname = empty($_POST['newmenuname']);
if ( $checkTextname ){
    echo '日本語の商品名入力して下さい！';
    // headefr("Location:../admin.php");
   exit();
     }
$checkTextname_en = empty($_POST['newmenuname_en']);
if ( $checkTextname_en ){
    echo '英語の商品名入力して下さい！';
  
   exit();
     }
$checkTextname_zh_HK = empty($_POST['newmenuname_zh_HK']);
if ( $checkTextname_zh_HK ){
    echo '繁体字の商品名入力して下さい！';
  
   exit();
     }
$checkTextname_zh_CH = empty($_POST['newmenuname_zh_CH']);
if ( $checkTextname_zh_CH ){
    echo '簡体字の商品名入力して下さい！';
  
   exit();
     }
$checkTextname_ko_KR = empty($_POST['newmenuname_ko_KR']);
if ( $checkTextname_ko_KR ){
    echo '韓国語の商品名入力して下さい！';
  
   exit();
     }


?>

<?php
$checkTextother =  empty($_POST["newmenuother"]);
if ( $checkTextother ){
    echo '日本語の紹介入力して下さい！';
    // header("Location:../admin.php");
   exit();
     
}
$checkTextother_en = empty($_POST['newmenuother_en']);
if ( $checkTextother_en  ){
    echo '英語の内容入力して下さい！';
  
   exit();
     }
$checkTextother_zh_HK = empty($_POST['newmenuother_zh_HK']);
if ( $checkTextother_zh_HK){
    echo '繁体字の内容入力して下さい！';
  
   exit();
     }
$checkTextother_zh_CH = empty($_POST['newmenuother_zh_CH']);
if ( $checkTextother_zh_CH  ){
    echo '簡体字の内容入力して下さい！';
  
   exit();
     }
$checkTextother_ko_KR = empty($_POST['newmenuother_ko_KR']);
if ( $checkTextother_ko_KR ){
    echo '韓国語の内容入力して下さい！';
  
   exit();
     }

?>

<?php
function utf8_strlen($string = null) {

preg_match_all("/./us", $string, $match);

return count($match[0]);
}
$str = $_POST['newmenuname'];
$match_en = $_POST['newmenuname_en'];
$match_zh_HK = $_POST['newmenuname_zh_HK'];
$match_zh_CH = $_POST['newmenuname_zh_CH'];
$match_ko_KR = $_POST['newmenuname_ko_KR'];
$lenth = utf8_strlen($str);
$lenth_en = utf8_strlen($match_en);
$lenth_zh_HK = utf8_strlen($match_zh_HK);
$lenth_zh_CH = utf8_strlen($match_zh_CH);
$lenth_ko_KR = utf8_strlen($match_ko_KR);
if($lenth>30||$lenth_en>30||$lenth_zh_HK>30||$lenth_zh_CH>30||$lenth_ko_KR>30){
echo "商品名が30文字を超える";
exit();
}

$match= $_POST['newmenuother'];
$match_en = $_POST['newmenuother_en'];
$match_zh_HK = $_POST['newmenuother_zh_HK'];
$match_zh_CH = $_POST['newmenuother_zh_CH'];
$match_ko_KR = $_POST['newmenuother_ko_KR'];
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
//$tell=false;
//if(empty($_POST["newmenusize"])){
//    echo "サイズ入力してください";
//    exit();
//}
//for ($i=0;$i<count($_POST["newmenusize"]);$i++){
//    if ($_POST["newmenusize"][$i]==null||strlen($_POST["newmenusize"][$i])<=0){
//        $tell=true;
//    }
//}
//if(empty($_POST["newmenuprice"])){
//    echo "価格入力してください";
//    exit();
//}
//for ($i=0;$i<count($_POST["newmenuprice"]);$i++){
//    if ($_POST["newmenuprice"][$i]==null||strlen($_POST["newmenuprice"][$i])<=0){
//        $tell=true;
//    }
//       if(!(is_numeric($_POST["newmenuprice"][$i]))){  
//           echo "価格に数字を入力してください！"; 
//           exit();
//}
//         
// }
//
//if ($tell){
//    echo "サイズ或いは価格入力してください！"; 
//    exit();
//}





$tell=false;
if(empty($_POST["newmenusize"])){
    echo "日本語のサイズ入力してください";
    exit();
}
if(empty($_POST["newmenusize_en"])){
    echo "英語のサイズ入力してください";
    exit();
}
if(empty($_POST["newmenusize_zh_HK"])){
    echo "繁体字のサイズ入力してください";
    exit();
}
if(empty($_POST["newmenusize_zh_CH"])){
    echo "簡体字のサイズ入力してください";
    exit();
}
if(empty($_POST["newmenusize_ko_KR"])){
    echo "韓国語のサイズ入力してください";
    exit();
}
for ($i=0;$i<count($_POST["newmenusize"]);$i++){
    if ($_POST["newmenusize"][$i]==null||strlen($_POST["newmenusize"][$i])<=0){
        $tell=true;
    }
}
for ($i=0;$i<count($_POST["newmenusize_en"]);$i++){
    if ($_POST["newmenusize_en"][$i]==null||strlen($_POST["newmenusize_en"][$i])<=0){
        $tell=true;
    }
}
for ($i=0;$i<count($_POST["newmenusize_zh_HK"]);$i++){
    if ($_POST["newmenusize_zh_HK"][$i]==null||strlen($_POST["newmenusize_zh_HK"][$i])<=0){
        $tell=true;
    }
}
for ($i=0;$i<count($_POST["newmenusize_zh_CH"]);$i++){
    if ($_POST["newmenusize_zh_CH"][$i]==null||strlen($_POST["newmenusize_zh_CH"][$i])<=0){
        $tell=true;
    }
}
for ($i=0;$i<count($_POST["newmenusize_ko_KR"]);$i++){
    if ($_POST["newmenusize_ko_KR"][$i]==null||strlen($_POST["newmenusize_ko_KR"][$i])<=0){
        $tell=true;
    }
}
if(empty($_POST["newmenuprice"])){
    echo "価格入力してください";
    exit();
}
for ($i=0;$i<count($_POST["newmenuprice"]);$i++){
    if ($_POST["newmenuprice"][$i]==null||strlen($_POST["newmenuprice"][$i])<=0){
        $tell=true;
    }
           if(!(is_numeric($_POST["newmenuprice"][$i]))){
  
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
$result=$conn->query("insert into menu (name, menulocation,other) values('','','');");
$id=$conn->query("SELECT LAST_INSERT_ID();");
foreach ($id as $r){
    
$newcommodityid=($r[0]);	
    
}

$id=$newcommodityid;

 	$exe1="UPDATE menu SET commodityid='".$id."'";
	
 		$exe1=$exe1.",name='".$_POST['newmenuname']."'";
	    $exe1=$exe1.",name_en='".$_POST['newmenuname_en']."'";
        $exe1=$exe1.",name_zh_HK='".$_POST['newmenuname_zh_HK']."'";
        $exe1=$exe1.",name_zh_CH='".$_POST['newmenuname_zh_CH']."'";
        $exe1=$exe1.",name_ko_KR='".$_POST['newmenuname_ko_KR']."'"; 


         $exe1=$exe1.",other='".$_POST['newmenuother']."'";
        $exe1=$exe1.",other_en='".$_POST['newmenuother_en']."'";
        $exe1=$exe1.",other_zh_HK='".$_POST['newmenuother_zh_HK']."'";
        $exe1=$exe1.",other_zh_CH='".$_POST['newmenuother_zh_CH']."'";
        $exe1=$exe1.",other_ko_KR='".$_POST['newmenuother_ko_KR']."'";
 	    $exe1=$exe1." WHERE commodityid='".$id."'";


 	$updated=$conn->query($exe1);


for ($i=0;$i<count($_POST["newmenusize"]);$i++){
    
        $sql="insert into menunature (size,size_en,size_zh_HK,size_zh_CH,size_ko_KR,price, commodityid1)  values('".$_POST["newmenusize"][$i]."','".$_POST["newmenusize_en"][$i]."','".$_POST["newmenusize_zh_HK"][$i]."','".$_POST["newmenusize_zh_CH"][$i]."','".$_POST["newmenusize_ko_KR"][$i]."','".$_POST["newmenuprice"][$i]."','".$newcommodityid."');";
     
        $result=$conn->query($sql);
 	      if ($updated&&$result){
   echo "<script>alert('追加成功しました！');location.href='admin.php'</script>";

        }else{
           echo "エラーが発生しました。しばらくしてからもう一度お試しください。"; 
            
          }
        continue;

    
    
    
}
    
    







?>
