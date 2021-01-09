<?php
$conn = null;
try{
  $option = array(
	PDO::ATTR_ERRMODE
		=>PDO::ERRMODE_EXCEPTION );
  $conn = new PDO(
	"mysql:host=db;dbname=order;charset=utf8;", 
	"root", "test", $option );
}catch(PDOException $e){
  die($e->getMessage());
}   
?>

