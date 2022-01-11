<?php

	//match entre categoria, cuenta, o detalle
	function busquedaSencilla($sch){
			global $db;
			global $user;
			$sql = "SELECT * FROM movimientos WHERE ((detalle LIKE '%$sch%' OR Categoria LIKE '%$sch%' OR cuenta LIKE '%$sch%') AND usuario='$user') ORDER BY id DESC";
			$rows = $db->query($sql);
			return $rows;
	}

	//filtrar por gastos
	function filtrarGastos(){

	}



?>