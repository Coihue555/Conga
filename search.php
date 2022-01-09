<!doctype html>
<html lang="es">
    <?php
    include 'sesion/sesion.php';
    include 'sesion/config.php';
	$tabla ="movimientos";
	$orderBY="id";
	$user=$_SESSION["username"];
	include 'components/tabla.php';
	include 'assets/functions.php';
	

	//match entre categoria, cuenta, o detalle
	if(isset($_POST['search'])){
		$rows = busquedaSencilla($_POST['search']);
	}

	//gastos
	if(isset($_GET['filtro']) && ($_GET['filtro']=='Gasto')){

		$sql = "SELECT * from movimientos Where valor<=0 And usuario='$user'";
		$rows = $db->query($sql);
	}

	//ingresos
	if(isset($_GET['filtro'])&($_GET['filtro']=='Ingreso')){
		
		$sql = "SELECT * from movimientos Where valor>0 And usuario='$user'";
		$rows = $db->query($sql);
	}

	//movimientos de los ultimos 7 dias
	if(isset($_GET['filtro'])&($_GET['filtro']=='showLast7Days')){

		$sieteDiasAtras= date('Y-m-d', strtotime('-7 days'));
		$sql = "SELECT * from movimientos Where fecha>'$sieteDiasAtras' AND usuario='$user'";
		$rows = $db->query($sql);
	}

	//movimientos de los ultimos 30 dias
	if(isset($_GET['filtro'])&($_GET['filtro']=='showLast30Days')){

		$sieteDiasAtras= date('Y-m-d', strtotime('-30 days'));
		$sql = "SELECT * from movimientos Where fecha>'$sieteDiasAtras' AND usuario='$user'";
		$rows = $db->query($sql);
	}

	//los 5 gastos mas caros
	if(isset($_GET['filtro'])&($_GET['filtro']=='los5MasCaros')){

		$sql = "SELECT * FROM movimientos WHERE usuario='$user' ORDER BY valor asc LIMIT 5";
		$rows = $db->query($sql);
	}



	?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <title>Conga</title>
  </head>
  <body>
  <?php include 'components/navbar.php' ?>
	<div class="container">

		<div class="row" style="margin-top: 70px;">
			<div class="col-md-12 col-md-offset-1" >
				<h2 class="text-center">Resultados</h2>
				<table class="table"><hr>
				<div style="float:right;" id="clAc2">
                                <button type="button" class="btn btn-primary" onclick="print()">Imprimir</button>
								<a href="stock.php" class="btn btn-primary">Volver</a>
                            </div>
					<br>
				<!-- Modal -->
						
					<?php if(mysqli_num_rows($rows) < 1 ): ?>
						<h3 class="text-danger text-center">Ninguna coincidencia</h3>
					<?php else: ?>
				<div class="col-md-12">
				<table id="myTable">
					<thead>
						<tr>
							<th onclick="sortTable(1)">Fecha de ingr</th>
							<th onclick="sortTable(2)">Valor</th>
							<th onclick="sortTable(3)">Categoria</th>
							<th onclick="sortTable(4)">Cuenta</th>
							<th onclick="sortTable(5)">Detalle</th>
							<th id="clAc">Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php while($row = $rows->fetch_assoc()): ?>	
							<td><?php echo $row['fecha'] ?></td>
							<td>$<?php echo $row['valor'] ?> </td>
							<td><?php echo $row['Categoria'] ?> </td>
							<td><?php echo $row['cuenta'] ?> </td>
							<td><?php echo $row['detalle'] ?> </td>
							<td id="clAc2">
								<div class="btn-group">
								<a href="update.php?id=<?php echo $row['id'];?>" class="btn-sm btn-primary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
										<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg>
								</a>
								<a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-primary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
										<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
										<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
								</a>
								</div>
							</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
				</div>
				<?php endif; ?>
				<?php
                    include 'components/footer.php';
                ?>