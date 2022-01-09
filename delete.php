<?php
include 'sesion/sesion.php';

include 'sesion/config.php';
$id = (int)$_GET['id'];

$sql1 = "SELECT * from movimientos where id ='$id'";

$rows = $db->query($sql1);

$row= $rows->fetch_assoc();

$cuenta= $row['cuenta'];
$valor = $row['valor'];
$tipoCue = $row['tipoCuen'];

if ($tipoCue===0) {
    $sql2 = "UPDATE cuentas SET totalParcial=(totalParcial - '$valor') WHERE (nomCuen='$cuenta' and usuario='$user')";
} else {
    $sql2 = "UPDATE cuentas SET totalParcial=(totalParcial + '$valor') WHERE (nomCuen='$cuenta' and usuario='$user')";
}



$sql2 = "UPDATE cuentas SET totalParcial=(totalParcial + '$valor') WHERE (nomCuen='$cuenta' and usuario='$user')";

$val = $db->query($sql2);

$sql = "DELETE from movimientos where id = '$id'";

$val = $db->query($sql);

if($val){
header('location: stock.php');
};

?>