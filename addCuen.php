<?php
include 'db.php';
session_start();
if(isset($_POST['send'])){


$cuenta= htmlspecialchars($_POST['nomCuen']);



$sql = "INSERT INTO cuentas (nomCuen) values ('$cuenta')";

$val = $db->query($sql);



printf("Errormessage: %s\n", $db->error);
//die();

if($val){
	header('location: cuentas.php');
}else{
	echo "error";
	}
}

?>