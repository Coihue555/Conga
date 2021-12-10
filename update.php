<!doctype html>
<html lang="es">
    <?php
    include 'sesion.php';
    include 'config.php';

$id= (int)$_GET['id'];


$sql1 = "SELECT * from movimientos where id ='$id'";

$rows = $db->query($sql1);

$row= $rows->fetch_assoc();

$cuenta= $row['cuenta'];
$valor = $row['valor'];

if(isset($_POST['send'])){


	$fecha = htmlspecialchars($_POST['fecha']);
	$valor = htmlspecialchars($_POST['valor']);
	$categoria = htmlspecialchars($_POST['Categoria']);
	$detalle = htmlspecialchars($_POST['detalle']);
	$cuenta = htmlspecialchars($_POST['cuenta']);







$sql2 = "UPDATE movimientos set fecha='$fecha', valor='$valor', Categoria='$categoria', detalle='$detalle', cuenta='$cuenta' WHERE id ='$id'";

$val = $db->query($sql2);



printf("Errormessage: %s\n", $db->error);

header('location: stock.php');

}


?>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
	<script src="jquery.min.js"></script>
    <title>Conga</title>
	</head>
	<body>
	<?php include 'navbar.php' ?>
		<div class="container-fluid">
		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10 col-md-offset-1" >
				    	<table class="table">
								<form method="post" >
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<?php
													$sql = "SELECT * FROM cuentas";
													$result = $db->query($sql);
													if ($result->num_rows > 0) {
														echo "<select class='form-control' name='cuenta' required>";
														echo "<option selected value='".$row['cuenta']."'>" . $row['cuenta']. "</option>";
														// output data of each row
														while($row = $result->fetch_assoc()) {
															echo "<option value='" . $row['nomCuen'] . "'>" . $row['nomCuen'] . "</option>";
															}
														echo "</select>";
													} 
												?>
											</div>
											<div class="col-md-6">
												<?php $sql = "select * from movimientos where id='$id'";
												$rows = $db->query($sql);

												$row= $rows->fetch_assoc();
												?>
												<select class="form-control" name="usuario" required>
													<option selected disabled value="<?php echo $row['usuario'];?>"><?php echo $row['usuario'];?></option>
													<option value="Dani">Dani</option>
													<option value="Andy">Andy</option>
												</select>
											</div>
										</div>
												<br>
												<div class="row">
													<div class="col-md-6">
														<input type="date" required id="fecha" class="form-control" name="fecha" value="<?php echo $row['fecha'];?>">
													</div>
													<div class="col-md-6">
														<input type="text" required name="valor" class="form-control" value="<?php echo $row['valor'];?>" placeholder="<?php echo $row['valor'];?>">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-12">
														<input type="text" required name="detalle" class="form-control" value="<?php echo $row['detalle'];?>">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-6">
													<?php $sql = "SELECT C.tipoCat FROM categorias C INNER JOIN movimientos M ON C.Categoria = M.Categoria AND M.id ='$id'";
														$rows = $db->query($sql);

														$row= $rows->fetch_assoc();
													?>

														<select class="form-control" id="tipoCuen" name="tipoCuen">
															<option selected value="<?php echo $row['tipoCat'];?>"><?php echo $row['tipoCat'];?></option>
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
															$sql = "SELECT * FROM categorias WHERE tipoCat='Gasto'";
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
															$sql = "SELECT * FROM categorias WHERE tipoCat='Ingreso'";
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
															$sql = "SELECT * FROM cuentas";
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
																		
									<br>
									
								
								</div>
									 <input type="submit" name="send" value="Agregar Registro" class="btn btn-primary">&nbsp;
								 <a href="stock.php" class="btn btn-primary">Volver</a>
							</form>
				    	</div>
			 	  </div>
			 </div>
		 </body>
	</html>
