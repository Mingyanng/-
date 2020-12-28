
<html>
<head>
<meta charset="utf-8">
<style></style>
</head>
<body>
<?php
	require("../connection/connect.php");
	// echo "string";
// $sql="UPDATE teststore SET hide='".$_POST['hide']."' WHERE id= 1 ";
// 	echo $sql;

	$conn->exec("UPDATE alert SET hide='".$_POST['hide']."' WHERE id= 1");
echo"sucess"
?>
<form>

	<!-- <a href="read.php"><input type="button" value="back to read"></a> -->
	
</form>
</body>
</html>