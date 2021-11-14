<?php

include 'db.php';
$id = (int)$_GET['id'];

$sql = "delete from movimientos where id = '$id'";

$val = $db->query($sql);

if($val){
header('location: stock.php');
};

?>