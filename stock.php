<!doctype html>
<html lang="es">
    <?php
    include 'sesion.php';
    include 'config.php';

	$tabla ="movimientos";
	$user=$_SESSION["username"];
	include 'tabla.php';

    ?>
  <head>
	  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121814257-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121814257-1');
</script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="styTablaSt.css">
	<script src="jquery.min.js"></script>
    <title>Conga</title>
  </head>
  <body>
  <?php include 'navbar.php' ?>
  <div class="container">
		<div class="row" style="margin-top: 70px;">
			<div class="col-md-12" >
				<table class="table">
					<div class="col-md-12">
								<?php
									// Saldo total
									$sql = "SELECT TRUNCATE(SUM(valor), 2) AS valor_suma FROM movimientos WHERE (valor >= 0 AND usuario='$user')";
									$result = $db->query($sql);

									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<button type='button' class='btn btn-success'>Total<br> <span class='badge bg-secondary'>$" . $row['valor_suma']."</span></button>		";
										}
									}

									//Resto de las cuentas
									$sql = "SELECT TRUNCATE(SUM(valor), 2) 'Parcial', cuenta 'Cuenta' FROM movimientos WHERE usuario='$user' GROUP BY cuenta";
									$result = $db->query($sql);

									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<button type='button' class='btn btn-primary'>" . $row['Cuenta']."<br> <span class='badge bg-secondary'>$" . $row['Parcial']."</span></button>		";
										}
									}



								?>
					</div>
                    <div style="float:right;">
                    	<button type="button" class="btn btn-primary" onclick="print()">Imprimir</button>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Nuevo</button>
                    </div>	
					<hr><br>
						 <!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Agregar movimiento</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="needs-validation" method="post" action="addMov.php">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
															<?php
																$sql = "SELECT * FROM cuentas WHERE usuario='$user'";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	echo "<select class='form-control' name='cuenta' required>";
																	echo "<option selected disabled>Cuenta</option>";
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['nomCuen'] . "'>" . $row['nomCuen'] . "</option>";
																	}
																	echo "</select>";
																} 
															?>
												</div>
												<div class="col-md-6">
													<input type="text" required name="detalle" class="form-control" placeholder="Detalle">
												</div>
											</div>
													<br>
											<div class="row">
												<div class="col-md-6">
													<input type="date" required id="fecha" name="fecha">
												</div>
												<div class="col-md-6">
													<input type="number" required name="valor" class="form-control" placeholder="$0.00">
												</div>
											</div>
													<br>
											<div class="row">
												<div class="col-md-6">
															<select class="form-control" id="tipoCuen" name="tipoCuen">
																<option selected disabled>Tipo</option>
																<option value="2">Transfer</option>
																<option value="0">Gasto</option>
																<option value="1">Ingreso</option>
															</select>
												</div>
															<!-- Mostras Gasto -->
															<script>$(document).ready(function(){
																	$('#tipoCuen').on('change', function() {
																	if ( this.value == '0')
																	{
																		$("#gasto").show();
																	}
																	else
																	{
																		$("#gasto").hide();
																	}
																	});
																});
															</script>

															<!-- Mostras ingreso -->
															<script>$(document).ready(function(){
																	$('#tipoCuen').on('change', function() {
																	if ( this.value == '1')
																	{
																		$("#ingreso").show();
																	}
																	else
																	{
																		$("#ingreso").hide();
																	}
																	});
																});
															</script>

															<!-- Mostras transfer -->
															<script>$(document).ready(function(){
																	$('#tipoCuen').on('change', function() {
																	if ( this.value == '2')
																	{
																		$("#transfer").show();
																	}
																	else
																	{
																		$("#transfer").hide();
																	}
																	});
																});
															</script>

															
														<!-- Mostras gasto -->
												<div class="col-md-6" style='display:none;' name="gasto" id="gasto">
															<?php
																$sql = "SELECT * FROM categorias WHERE (tipoCat='Gasto' and usuario='$user')";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	echo "<select class='form-control' name='Categoria' required>";
																	echo "<option selected disabled>Categoria</option>";
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";
																	}
																	echo "</select>";
																} 
															?>

												</div>
														<!-- Mostras ingreso -->
												<div class="col-md-6" style='display:none;' name="ingreso" id="ingreso">
															<?php
																$sql = "SELECT * FROM categorias WHERE (tipoCat='Ingreso' and usuario='$user')";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	echo "<select class='form-control' name='Categoria' required>";
																	echo "<option selected disabled>Categoria</option>";
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";
																	}
																	echo "</select>";
																} 
															?>

												</div>
														<!-- Mostras transfer -->
												<div class="col-md-6" style='display:none;' name="transfer" id="transfer">
															<?php
																$sql = "SELECT * FROM cuentas WHERE usuario='$user'";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	echo "<select class='form-control' name='cuenDest' required>";
																	echo "<option selected disabled>Cuenta</option>";
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['nomCuen'] . "'>" . $row['nomCuen'] . "</option>";
																	}
																	echo "</select>";
																} 
															?>

												</div>

											</div>
											<hr>
											<div style="float:right;">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
												<button type="submit" name="send" class="btn btn-primary">Agregar</button>
											</div>
											
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- fin modal -->


					<div class="col-md-12">
						<table id="myTable">
							<thead>
								<tr>
									<th onclick="sortTable(0)">ID</th>
									<th onclick="sortTable(1)">Fecha de ingr</th>
									<th onclick="sortTable(2)">Valor</th>
									<th onclick="sortTable(3)">Categoria</th>
									<th onclick="sortTable(4)">Cuenta</th>
									<th onclick="sortTable(5)">Detalle</th>
									<th onclick="sortTable(6)">Usuario</th>
									<th id="clAc">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php while($row = $rows->fetch_assoc()): ?>						
										<td><?php echo $row['id'] ?></td>
										<td><?php echo $row['fecha'] ?></td>
										<td>$<?php echo $row['valor'] ?> </td>
										<td><?php echo $row['Categoria'] ?> </td>
										<td><?php echo $row['cuenta'] ?> </td>
										<td><?php echo $row['detalle'] ?> </td>
										<td><?php echo $row['usuario'] ?> </td>
										<td >
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
                        <?php
                        include 'footer.php';
                        ?>