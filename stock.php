<!doctype html>
<html lang="es">
    <?php
    include 'sesion.php';
    include 'config.php';

	$tabla ="movimientos";
	$orderBY="fecha";
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
		<div class="row">
			<div class="col-md-12" >
				<table class="table">
					<div class="col-md-12">
						<div class="accordion" id="accordionExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingOne">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Saldo de cuentas
									</button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<?php
											// Saldo total
											$sql = "SELECT TRUNCATE(SUM(valor), 2) AS valor_suma FROM movimientos WHERE (usuario='$user')";
											$result = $db->query($sql);

											if ($result->num_rows > 0) {
												// output data of each row
												while($row = $result->fetch_assoc()) {
													echo "<button type='button' class='btn btn-success' style='margin-bottom:5px;'>Total<br> <span class='badge bg-secondary'>$" . $row['valor_suma']."</span></button>		";
												}
											}

											//Resto de las cuentas
											$sql = "SELECT TRUNCATE(SUM(valor), 2) 'Parcial', cuenta 'Cuenta' FROM movimientos WHERE usuario='$user' GROUP BY cuenta";
											$result = $db->query($sql);

											if ($result->num_rows > 0) {
												// output data of each row
												while($row = $result->fetch_assoc()) {
													echo "<button type='button' class='btn btn-primary' style='margin-bottom:5px;'>" . $row['Cuenta']."<br> <span class='badge bg-secondary'>$" . $row['Parcial']."</span></button>		";
												}
											}



										?>
								</div>
								</div>
							</div>
						</div>
								
					</div>
					<hr>
					<div class="row">
						<div class="col">
						<div id="clAc2" style="float:left;">
								<a href="search.php?filtro=Gasto"><button type="button" class="btn btn-primary" >Gastos</button></a>
								<a href="search.php?filtro=Ingreso"><button type="button" class="btn btn-primary" >Ingresos</button></a>
								<a href="search.php?filtro=showLast7Days"><button type="button" class="btn btn-primary" >Ult 7 dias</button></a>
								<a href="search.php?filtro=showLast30Days"><button type="button" class="btn btn-primary" >Ult 30 dias</button></a>
								<a href="search.php?filtro=los5MasCaros"><button type="button" class="btn btn-primary" >Los 5 + caros</button></a>
						</div>
						</div>
						<div class="col">
						<div id="clAc2" style="float:right;">
							<button type="button" class="btn btn-primary" onclick="print()">Imprimir</button>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Nuevo</button>
						</div>
						</div>
					</div>
					<br>	
					<hr>
					
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
												<div class="col-md-6"><label for="cuenta">Cuenta</label>
													<select class='form-control' name='cuenta' required>
														<option selected disabled value="">Cuenta</option>
															<?php
																$sql = "SELECT * FROM cuentas WHERE usuario='$user'";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['nomCuen'] . "'>" . $row['nomCuen'] . "</option>";
																	}
																} 
															?>
													</select>
												</div>
												<div class="col-md-6"><label for="detalle">Detalle</label>
													<input type="text" required name="detalle" class="form-control" placeholder="Detalle">
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-6"><label for="fecha">Fecha</label>
													<input type="date" required id="fecha" name="fecha">
												</div>
												<div class="col-md-6"><label for="valor">Valor</label>
													<input type="number" required name="valor" class="form-control" min="0" placeholder="0.00" value="" step=".01">
												</div>
											</div>
													<br>
											<div class="row">
												<div class="col-md-6"><label for="tipoCuen">Tipo de categoria</label>
															<select class="form-control" id="tipoCuen" name="tipoCuen" required>
																<option selected disabled value="">Tipo</option>
																<option value="Transfer">Transfer</option>
																<option value="Gasto">Gasto</option>
																<option value="Ingreso">Ingreso</option>
															</select>
												</div>
															<!-- Mostras Gasto -->
															<script>$(document).ready(function(){
																	$('#tipoCuen').on('change', function() {
																	if ( this.value == 'Gasto')
																	{
																		$("#gasto").show();
																		document.getElementById("catGasto").required = true;
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
																	if ( this.value == 'Ingreso')
																	{
																		$("#ingreso").show();
																		document.getElementById("catIngreso").required = true;
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
																	if ( this.value == 'Transfer')
																	{
																		$("#transfer").show();
																		document.getElementById("catTransfer").required = true;
																	}
																	else
																	{
																		$("#transfer").hide();
																	}
																	});
																});
															</script>

															
														<!-- Mostras gasto -->
												<div class="col-md-6" style='display:none;' name="gasto" id="gasto"><label for="Categoria">Tipo de gasto</label>
													<select class='form-control' name='Categoria' id="catGasto">
														<option selected disabled value="">Categoria</option>
															<?php
																$sql = "SELECT * FROM categorias WHERE (tipoCat='Gasto' and usuario='$user')";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";
																	}
																} 
															?>
													</select>
												</div>
														<!-- Mostras ingreso -->
												<div class="col-md-6" style='display:none;' name="ingreso" id="ingreso"><label for="Categoria">Tipo de ingreso</label>
													<select class='form-control' name='Categoria' id="catIngreso">
														<option selected disabled value="">Categoria</option>
															<?php
																$sql = "SELECT * FROM categorias WHERE (tipoCat='Ingreso' and usuario='$user')";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";
																	}
																} 
															?>
													</select>
												</div>
														<!-- Mostras transfer -->
												<div class="col-md-6" style='display:none;' name="transfer" id="transfer"><label for="cuenDest">Cuenta Destino</label>
													<select class='form-control' name='cuenDest' id="catTransfer">
														<option selected disabled value="">Cuenta</option>
															<?php
																$sql = "SELECT * FROM cuentas WHERE usuario='$user'";
																$result = $db->query($sql);
																if ($result->num_rows > 0) {
																	// output data of each row
																	while($row = $result->fetch_assoc()) {
																	echo "<option value='" . $row['nomCuen'] . "'>" . $row['nomCuen'] . "</option>";
																	}
																} 
															?>
													</select>
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
									<th id="clAc2" onclick="sortTable(0)">ID</th>
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
										<td id="clAc2"><?php echo $row['id'] ?></td>
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
						<?php
						if ($total<1) {
							echo "<div class='text-center' id='clAc2'>";
							echo "<h2>No hay nada por aqui :P</h2>";
							echo "<h5>Proba agregando los Saldos Iniciales de tus cuentas con el boton <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>Nuevo</button></h5>";
							echo "</div>";
						}
						?>
                        <?php
                        include 'footer.php';
                        ?>