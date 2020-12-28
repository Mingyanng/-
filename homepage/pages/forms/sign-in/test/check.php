
<?php
require("../../connection/connect.php"); 
?>
<?php
$checkText = empty($_POST['id']) || empty($_POST["pw"]);
if ( $checkText ){
    echo 'id或いはPasswodを入力して下さい。';
   exit();
     
}

?>
<?php  
	session_start();
	if (!empty($_SESSION['name'])){
		header("Location: login.php");
		exit();
	}else{
		$t=true;
		$result=$conn->query("select * from users");
		foreach($result as $re){ 
		    if($_POST["id"] == $re["userID"] && $_POST["pw"] == $re["password"] ){
                $t=false; 
		        echo "0";
                $_SESSION['name'] = $re["name"];
                $resultadminlogintimes=$conn->query("update users set adminlogintimes=adminlogintimes+1 WHERE id='1';");
                $resultlastlogintime=$conn->query("update  users set lastlogintime=(now()) WHERE id='1'");		
                exit();
                break;
		    }   
		}		
                if ($t){
                    echo "IDとPasswordを確認して下さい。";
                exit();
            }
        }
		
?>
