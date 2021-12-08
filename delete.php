<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: register.php");
    exit;
}

include 'db.php';
$id = (int)$_GET['id'];

$sql1 = "SELECT * from movimientos where id ='$id'";

$rows = $db->query($sql1);

$row= $rows->fetch_assoc();

$cuenta= $row['cuenta'];
$valor = $row['valor'];
$tipoCue = $row['tipoCuen'];

if ($tipoCue===0) {
    $sql2 = "UPDATE cuentas SET totalParcial=(totalParcial - '$valor') WHERE nomCuen='$cuenta'";
} else {
    $sql2 = "UPDATE cuentas SET totalParcial=(totalParcial + '$valor') WHERE nomCuen='$cuenta'";
}



$sql2 = "UPDATE cuentas SET totalParcial=(totalParcial + '$valor') WHERE nomCuen='$cuenta'";

$val = $db->query($sql2);

$sql = "DELETE from movimientos where id = '$id'";

$val = $db->query($sql);

if($val){
header('location: stock.php');
};

?>