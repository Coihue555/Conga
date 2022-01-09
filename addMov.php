<?php
include 'sesion/config.php';
include 'sesion/sesion.php';
if(isset($_POST['send'])){

$fecha = htmlspecialchars($_POST['fecha']);
$categoria = htmlspecialchars($_POST['Categoria']);
$detalle = htmlspecialchars($_POST['detalle']);
$cuenta = htmlspecialchars($_POST['cuenta']);
$usuario = htmlspecialchars($_SESSION['username']);



if ($_POST['tipoCuen']==='Transfer') {
	$valor = htmlspecialchars($_POST['valor']);
	$dest = htmlspecialchars($_POST['cuenDest']);
	//debito
	$sql = "INSERT INTO movimientos (fecha, valor, Categoria, detalle, cuenta, usuario) values ('$fecha', '-$valor', 'deb Transfer','$detalle', '$cuenta', '$usuario')";
	$val = $db->query($sql);
	
	//credito
	$sql = "INSERT INTO movimientos (fecha, valor, Categoria, detalle, cuenta, usuario) values ('$fecha', '$valor', 'dest Transfer','$detalle', '$dest', '$usuario')";
	$val = $db->query($sql);

} else {

	if ($_POST['tipoCuen']==='Gasto') {
		$valor = htmlspecialchars(-$_POST['valor']);
	} elseif ($_POST['tipoCuen']==='Ingreso'){
		$valor = htmlspecialchars($_POST['valor']);
	} 
		
	$sql = "INSERT INTO movimientos (fecha, valor, Categoria, detalle, cuenta, usuario) values ('$fecha', '$valor', '$categoria','$detalle', '$cuenta', '$usuario')";
	
	$val = $db->query($sql);
}


//printf("Errormessage: %s\n", $db->error);
//die();

if($val){
	header('location: stock.php');
}else{
	echo "error";
	}
}

?>