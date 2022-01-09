<?php
include 'sesion/sesion.php';
include 'sesion/config.php';
$user=$_SESSION["username"];

$id = (int)$_GET['id'];
$tabla = $_GET['tabla'];



//function deleteItemDeTabla($id, $tabla){
//global $db;
//global $user;
$sql = "DELETE from $tabla where id = '$id' AND usuario='$user'";
$val = $db->query($sql);

if($val){
header("location: $tabla.php");
};
//};

?>