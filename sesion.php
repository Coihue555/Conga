<?php
$usuariook = 'admin';
$passok = 'admin';

if ($_POST['nombre'] == $usuariook && $_POST['pass'] == $passok) {
	session_start();
	$_SESSION["verificado"] = "si";
	$_SESSION['username'] = $usuariook;
		header ("Location: stock.php");
} else {
	header ("Location: index.php?error=si");
}

?>
