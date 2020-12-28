<?php
	require("../connection/connect.php");
?>
<?php
$checkdelete = empty($_POST['menudeleteid']);
if ( $checkdelete ){
    echo"<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');
   location.href='admin.php'";
    // headefr("Location:../admin.php");
   exit();
     }

?>
<?php
$deleteid=$_POST['menudeleteid'];
$result=$conn->query("delete from menu   where commodityid='".$deleteid."';");
$result2=$conn->query("delete from menunature   where commodityid1='".$deleteid."';");
//$result=$conn->query("DELETE menu FROM menu,menunature WHERE menu.commodityid= menunature.id='".$_POST['menudeleteid']."'");

	if ($result||$result2){
    echo "<script>alert('消除成功しました！');location.href='admin.php'</script>"; 
   exit();
     
}else{
	echo "<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='admin.php'</script>"; 

}
 	exit();
?>