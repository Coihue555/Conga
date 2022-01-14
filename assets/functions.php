<?php
include 'pdo_connect.php';
	//match entre categoria, cuenta, o detalle
	function busquedaSencilla($sch){
		//global $db;
		global $user;
		global $pdo;
		$search = $sch;
		//$sql = "SELECT * FROM movimientos WHERE ((detalle LIKE '%$sch%' OR Categoria LIKE '%$sch%' OR cuenta LIKE '%$sch%') AND usuario='$user') ORDER BY id DESC";
		//$rows = $db->query($sql);
		//return $rows;

		$stmt = $pdo->prepare("SELECT * FROM movimientos WHERE ((detalle LIKE '%$search%' OR Categoria LIKE '%$search%' OR cuenta LIKE '%$search%') AND usuario='$user') ORDER BY id DESC");
		$stmt->execute($search);
		$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(!$arr) exit('Sin resultados');
		var_export($arr);
		$stmt = null;
	}

	//filtrar por gastos
	function filtrarGastos(){
		
		global $user;
		global $pdo;

		$stmt = $pdo->prepare("SELECT * from movimientos Where valor<=0 And usuario='$user'");
		$stmt->execute([]);
		$arr = $stmt->fetch(PDO::FETCH_ASSOC);
		if(!$arr) exit('Sin resultados');
		var_export($arr);
		$stmt = null;

		//$sql = "SELECT * from movimientos Where valor<=0 And usuario='$user'";
		//$rows = $db->query($sql);
		//return $rows;

	}

		//filtrar por ingresos
	function filtrarIngresos(){
		global $db;
		global $user;
		$sql = "SELECT * from movimientos Where valor>0 And usuario='$user'";
		$rows = $db->query($sql);
		return $rows;

	}



?>