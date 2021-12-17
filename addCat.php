<?php
include 'config.php';
include 'sesion.php';
if(isset($_POST['send'])){


$categoria = htmlspecialchars($_POST['Categoria']);
$tipoCat = htmlspecialchars($_POST['tipoCat']);
$user=$_SESSION["username"];

$sql = "INSERT INTO categorias (Categoria, tipoCat, usuario) values ('$categoria','$tipoCat', '$user')";

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