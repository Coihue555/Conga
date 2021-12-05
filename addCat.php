<?php
include 'db.php';
session_start();
if(isset($_POST['send'])){


$categoria = htmlspecialchars($_POST['Categoria']);
$tipoCat = htmlspecialchars($_POST['tipoCat']);



$sql = "INSERT INTO categorias (Categoria, tipoCat) values ('$categoria','$tipoCat')";

$val = $db->query($sql);



printf("Errormessage: %s\n", $db->error);
//die();

if($val){
	header('location: categorias.php');
}else{
	echo "error";
	}
}

?>