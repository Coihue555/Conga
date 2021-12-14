<!doctype html>
<html lang="es">
    <?php
    include 'sesion.php';
    include 'config.php';

$id= (int)$_GET['id'];


$sql1 = "SELECT * from movimientos where id ='$id'";

$rows = $db->query($sql1);

$rowe= $rows->fetch_assoc();

$user=$_SESSION["username"];

if(isset($_POST['send'])){


	$fecha = htmlspecialchars($_POST['fecha']);
	$valor = htmlspecialchars($_POST['valor']);
	//colocar if para el tipoCuen
	if ($_POST['tipoCuen'] == 'Ingreso') {
		$categoria = htmlspecialchars($_POST['Categoriai']);
		}
	if ($_POST['tipoCuen'] == 'Gasto') {
		$categoria = htmlspecialchars($_POST['Categoriag']);
		}
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
	<script src="func.js"></script>
    <title>Conga</title>
	</head>
	<body>
	<?php include 'navbar.php' ?>
		<div class="container">
		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10 col-md-offset-1" >
				    	<table class="table">
								<form method="post" class="needs-validation">
									<div class="form-group">
										<div class="row">
											<div class="col-md-6"><label for="cuenta">Cuenta</label>
												<?php
													$sql = "SELECT * FROM cuentas WHERE usuario='$user'";
													$result = $db->query($sql);
													if ($result->num_rows > 0) {
														echo "<select class='form-control' name='cuenta' required>";
														echo "<option selected value='".$rowe['cuenta']."'>" . $rowe['cuenta']. "</option>";
														// output data of each row
														while($row = $result->fetch_assoc()) {
															echo "<option value='" . $row['nomCuen'] . "'>" . $row['nomCuen'] . "</option>";
															}
														echo "</select>";
													} 
												?>
											</div>
											<div class="col-md-6"><label for="detalle">Detalle</label>
												<?php $sql = "select * from movimientos where id='$id'";
													$rows = $db->query($sql);
													$row= $rows->fetch_assoc();
												?>
												<input type="text" required name="detalle" class="form-control" value="<?php echo $row['detalle'];?>">
											</div>
										</div>
												<br>
												<div class="row">
													<div class="col-md-6"><label for="fecha">Fecha</label>
														<input type="date" required id="fecha" class="form-control" name="fecha" value="<?php echo $row['fecha'];?>">
													</div>
													<div class="col-md-6"><label for="valor">Valor</label>
														<input type="number" required name="valor" class="form-control" value="<?php echo $row['valor'];?>" placeholder="<?php echo $row['valor'];?>">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-6"><label for="tipoCuen">Tipo de categoria</label>
														<?php $sql = "SELECT C.tipoCat FROM categorias C INNER JOIN movimientos M ON C.Categoria = M.Categoria AND M.id ='$id'";
															$rows = $db->query($sql);

															$row= $rows->fetch_assoc();
														?>

														<select class="form-control" id="tipoCuen" name="tipoCuen">
															<option selected value="<?php echo $row['tipoCat'];?>"><?php echo $row['tipoCat'];?></option>
															<option value="Transfer">Transfer</option>
															<option value="Gasto">Gasto</option>
															<option value="Ingreso">Ingreso</option>
														</select>
													</div>
													<!-- Mostras ingreso -->
													<div class="col-md-6" style='display:none;' name="ingreso" id="ingreso"><label for="Categoria">Categoria</label>
														<?php
															$sql = "SELECT * FROM categorias WHERE (tipoCat='Ingreso' and usuario='$user')";
															$result = $db->query($sql);
															if ($result->num_rows > 0) {
																echo "<select class='form-control' name='Categoriai' required>";
																echo "<option selected value='".$rowe['Categoria']."'>".$rowe['Categoria']."</option>";
																// output data of each row
																while($row = $result->fetch_assoc()) {
																echo "<option value='" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";
																}
																echo "</select>";
															} 
														?>
													</div>
													<!-- Mostras gasto -->
													<div class="col-md-6" style='display:none;' name="gasto" id="gasto"><label for="Categoria">Categoria</label>
														<?php
															$sql = "SELECT * FROM categorias WHERE (tipoCat='Gasto' and usuario='$user')";
															$result = $db->query($sql);
															if ($result->num_rows > 0) {
																echo "<select class='form-control' name='Categoriag' required>";
																echo "<option selected value='".$rowe['Categoria']."'>".$rowe['Categoria']."</option>";
																// output data of each row
																while($row = $result->fetch_assoc()) {
																echo "<option value='" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";
																}
																echo "</select>";
															} 
														?>

													</div>


													
													<!-- Mostras transfer -->
													<div class="col-md-6" style='display:none;' name="transfer" id="transfer"><label for="cuenta">Cuenta</label>
														<?php
															$sql = "SELECT * FROM cuentas Where usuario='$user'";
															$result = $db->query($sql);
															if ($result->num_rows > 0) {
																echo "<select class='form-control' name='cuenDest' required>";
																echo "<option selected disabled>Elije Cuenta</option>";
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
