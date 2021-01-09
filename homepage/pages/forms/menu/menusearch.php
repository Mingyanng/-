<?php
    //require("../connection/connect.php");
    $link = mysqli_connect("localhost","root","7456958000.","order") or die("Error " . mysqli_error($link));
?>
<?php
$search = $_POST['menusearchdata'];
$output = '';
if(isset($search)){
    $query = "
    SELECT * FROM menu
    WHERE name LIKE '%".$search."%'
    OR 	name_en LIKE '%".$search."%'
    OR 	name_zh_HK LIKE '%".$search."%'
    OR 	name_zh_CH LIKE '%".$search."%'
    OR name_ko_KR LIKE '%".$search."%'
    OR other LIKE '%".$search."%'
    OR other_en LIKE '%".$search."%'
    OR other_zh_HK LIKE '%".$search."%'
    OR other_zh_CH LIKE '%".$search."%'
    OR other_ko_KR LIKE '%".$search."%'
    ";
}else{
    $query = "SELECT * FROM menu ORDER BY commodityid";
}

$result=mysqli_query($link, $query);
while($row = mysqli_fetch_array($result)){
    
        $output .= '

            
            <?php
                $result=$conn->query("select * from menu where commodityid in '.$row[commodityid].'");  
                $picc=0;
            ?>
		';
    //echo "<option>$row[commodityid]</option>";
}

?>
<?php
// $deleteid=$_POST['menudeleteid'];
// $result=$conn->query("delete from menu   where commodityid='".$deleteid."';");
// $result2=$conn->query("delete from menunature   where commodityid1='".$deleteid."';");
// //$result=$conn->query("DELETE menu FROM menu,menunature WHERE menu.commodityid= menunature.id='".$_POST['menudeleteid']."'");

// 	if ($result||$result2){
//     echo "<script>alert('消除成功しました！');location.href='admin.php'</script>"; 
//    exit();
// }else{
// 	echo "<script>alert('エラーが発生しました。しばらくしてからもう一度お試しください。');location.href='admin.php'</script>"; 

// }
//  	exit();
?>