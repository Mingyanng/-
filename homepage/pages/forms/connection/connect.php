<?php
$conn = null;
try{
  $option = array(
	PDO::ATTR_ERRMODE
		=>PDO::ERRMODE_EXCEPTION );
  $conn = new PDO(
	"mysql:host=127.0.0.1;dbname=order;charset=utf8;", 
	"root", "654321", $option );
}catch(PDOException $e){
  die($e->getMessage());
}   
?>

