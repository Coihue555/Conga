<!doctype html>
<html lang="es">
    <?php
    include 'sesion/sesion.php';
    include 'sesion/config.php';

$id= (int)$_GET['id'];


$sql1 = "SELECT * from movimientos where id ='$id'";

$rows = $db->query($sql1);

$rowe= $rows->fetch_assoc();

$user=$_SESSION["username"];

if(isset($_POST['send'])){


	$fecha = htmlspecialchars($_POST['fecha']);
	
	//colocar if para el tipoCuen
	if ($_POST['tipoCuen'] == 'Ingreso') {
		$categoria = htmlspecialchars($_POST['catIngreso']);
		$valor = htmlspecialchars($_POST['valor']);
		}
	if ($_POST['tipoCuen'] == 'Gasto') {
		$categoria = htmlspecialchars($_POST['catGasto']);
		$valor = htmlspecialchars(-$_POST['valor']);
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
    <link rel="stylesheet" href="assets/css/estilo.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="func.js"></script>
    <title>Conga</title>
	</head>
	<body>
	<?php include 'components/navbar.php' ?>
		<div class="container">
		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10 col-md-offset-1" >
				    	<table class="table">
								<form method="post" class="needs-validation">
									<div class="form-group">
										<div class="row">
											<div class="col-md-6"><label for="cuenta">Cuenta</label>
												<select class='form-control' name='cuenta' required>
													<option selected value="<?php echo $rowe['cuenta']?>"><?php echo $rowe['cuenta']?></option>
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
														<input type="number" required name="valor" class="form-control" value="<?php echo abs($row['valor']);?>" placeholder="<?php echo $row['valor'];?>">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-md-6"><label for="tipoCuen">Tipo de categoria</label>
														<?php $sql = "SELECT C.tipoCat FROM categorias C INNER JOIN movimientos M ON C.Categoria = M.Categoria AND M.id ='$id'";
															$rows = $db->query($sql);
															$row= $rows->fetch_assoc();
														?>
														<select class="form-control" id="tipoCuen" name="tipoCuen" required>
															<option selected value="<?php echo $row['tipoCat'];?>"><?php echo $row['tipoCat'];?></option>
															<option value="Gasto">Gasto</option>
															<option value="Ingreso">Ingreso</option>
														</select>
													</div>
													<!-- Mostras ingreso -->
													<div class="col-md-6" style='display:none;' name="ingreso" id="ingreso"><label for="Categoria">Categoria</label>
														<select class='form-control' name='catIngreso' id="catIngreso">
															<option selected value="<?php echo $rowe['Categoria']?>"><?php echo $rowe['Categoria'] ?></option>
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
													<!-- Mostras gasto -->
													<div class="col-md-6" style='display:none;' name="gasto" id="gasto"><label for="Categoria">Categoria</label>
														<select class='form-control' name='catGasto' id="catGasto">
															<option selected value="<?php echo $rowe['Categoria'] ?>"><?php echo $rowe['Categoria'] ?></option>
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
