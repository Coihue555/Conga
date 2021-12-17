<?php
include 'config.php';
include 'sesion.php';
if(isset($_POST['send'])){


$cuenta= htmlspecialchars($_POST['nomCuen']);
$user=$_SESSION["username"];

$sql = "INSERT INTO cuentas (nomCuen, usuario) values ('$cuenta', '$user')";

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