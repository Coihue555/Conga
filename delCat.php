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

$sql = "DELETE from categorias where id = '$id'";

$val = $db->query($sql);

if($val){
header('location: categorias.php');
};

?>