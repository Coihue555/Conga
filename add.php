<?php
include 'db.php';
session_start();
if(isset($_POST['send'])){

$fecha = htmlspecialchars($_POST['fecha']);
$valor = htmlspecialchars($_POST['valor']);
$categoria = htmlspecialchars($_POST['Categoria']);
$detalle = htmlspecialchars($_POST['detalle']);
$cuenta = htmlspecialchars($_POST['cuenta']);

		if (isset($_POST['usuario'])){
			$usuario = htmlspecialchars($_POST['usuario']);
		}else{
			$usuario = htmlspecialchars($_SESSION['username']);
		}


$sql = "insert into movimientos (fecha, valor, Categoria, detalle, cuenta, usuario) values ('$fecha', '$valor', '$categoria','$detalle', '$cuenta', '$usuario')";

$val = $db->query($sql);

//printf("Errormessage: %s\n", $db->error);
//die();

if($val){
	header('location: stock.php');
}else{
	echo "error";
	}
}

?>