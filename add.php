<?php
include 'db.php';

if(isset($_POST['send'])){

$fecha = htmlspecialchars($_POST['fecha']);
$valor = htmlspecialchars($_POST['valor']);
$categoria = htmlspecialchars($_POST['categoria']);
$detalle = htmlspecialchars($_POST['detalle']);
$cuenta = htmlspecialchars($_POST['cuenta']);
$usuario = htmlspecialchars($_POST['usuario']);

$sql = "insert into movimientos (fecha, valor, categoria, detalle, cuenta, usuario) values ('$fecha', '$valor', '$categoria','$detalle', '$cuenta', '$usuario')";

$val = $db->query($sql);

printf("Errormessage: %s\n", $db->error);
die();

if($val){
	header('location: stock.php');
}else{
	echo "error";
	}
}

?>