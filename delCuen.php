<?php

include 'sesion.php';
include 'config.php';
$id = (int)$_GET['id'];

$sql = "DELETE from cuentas where id = '$id'";

$val = $db->query($sql);

if($val){
header('location: cuentas.php');
};

?>