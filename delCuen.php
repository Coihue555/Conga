<?php

include 'sesion.php';
include 'config.php';
$user=$_SESSION["username"];

$id = (int)$_GET['id'];
$tabla = $_GET['tabla'];

$sql = "DELETE from $tabla where id = '$id' AND usuario='$user'";
$val = $db->query($sql);

if($val){
header('location: cuentas.php');
};

?>