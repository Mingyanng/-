<?php
	require("../connection/connect.php");
?>
<?php
////var_dump($_POST['menunatureid']);
////$id=$_POST['menunatureid'];
// $id=$_POST['menunatureid'];
////var_dump($id);
////echo '$id';
//	$result=$conn->query("delete from menunature where natureid='$id';");
//    
//	if ($result){
////    echo "<script>alert('消除成功しました！');</script>"; 
//        echo '<script language="JavaScript">;alert("这是");location.href="index.htm";</script>;';
//   exit();
//     
//}else{
////	echo "<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');</script>"; 
//        echo '<script language="JavaScript">;alert("这是");location.href="index.htm";</script>;';
//
//}
// 	exit();
$id=$_POST['menunatureid'];
$result=$conn->query("delete from  menunature where natureid='$id';");
	if ($result){
//    echo "<script>alert('消除成功しました！');location.href='read.php'</script>"; 
//      echo  "<script>alert(1);</script>";
        
        echo "0";
//   exit();
     
}else{
//	echo "<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='read.php'</script>"; 
 echo "1";
// 	exit();
    }
?>