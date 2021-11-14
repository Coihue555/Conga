<!DOCTYPE html>

<?php include 'db.php';

$id= (int)$_GET['id'];

$sql = "select * from movimientos where id='$id'";

$rows = $db->query($sql);

$row= $rows->fetch_assoc();
if(isset($_POST['send'])){

	$fecha = htmlspecialchars($_POST['fecha']);
	$valor = htmlspecialchars($_POST['valor']);
	$categoria = htmlspecialchars($_POST['categoria']);
	$detalle = htmlspecialchars($_POST['detalle']);
	$cuenta = htmlspecialchars($_POST['cuenta']);

$sql2 = "UPDATE movimientos set fecha='$fecha', valor='$valor', categoria='$categoria', detalle='$detalle', cuenta='$cuenta' where id ='$id'";


$db->query($sql2);

header('location: stock.php');

}


?>
<html>
	<head>
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css">
		<title>Conga</title>
	</head>
	<body>
		<div class="container">
			<center><h1>Actualizar registro</h1></center>

		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10 col-md-offset-1" >
				    	<table class="table">

					     	<hr><br>
								<form method="post" >
									<div class="form-group">
									<div class="row">
										<div class="col md 12"><label>Cuenta</label>
											<select class="form-control" name="cuenta" required>
											<option selected value="<?php echo $row['cuenta'];?>"><?php echo $row['cuenta'];?></option>
												<option value="Sant Deb">Sant Deb</option>
												<option value="Efectivo">Efectivo</option>
												<option value="Nac Andy">Nac Andy</option>
												<option value="Naranja">Naranja</option>
												<option value="Yaca Andy">Yaca Andy</option>
												<option value="Yaca Dani">Yaca Dani</option>
											</select>
										</div>
										<div class="col-md-5"><label>Categoria</label>
											<select class="form-control" name="categoria" required>
							      				<option selected value="<?php echo $row['categoria'];?>"><?php echo $row['categoria'];?></option>
												<option value="Comida">Comida</option>
												<option value="Salud">Salud</option>
												<option value="Limpieza">Limpieza</option>
												<option value="Casa">Casa</option>
												<option value="Viajes">Viajes</option>
												<option value="Extra">Extra</option>
							    			</select>
										</div>
										<div class="col-md-5"><label>Culote</label>
											<select class="form-control" name="tipoCul" required>
							      				<option selected value="<?php echo $row['tipoCul'];?>"><?php echo $row['tipoCul'];?></option>
												<option value="Pestaña">Pestaña</option>
												<option value="Reborde">Reborde</option>
												<option value="Reborde reforzado">Reborde reforzado</option>
												<option value="Pestaña y reborde">Pestaña y reborde</option>
												<option value="Base reducida">Base reducida</option>
							    			</select>
										</div>
									</div>
									
									<p></p>
									<div class="row">

										<div class="col-md-6"><label>Inscripcion del culote</label>
											<input type="text" name="insCul" class="form-control" value="<?php echo $row['insCul'];?>">
										</div>
										<div class="col-md-6"><label>Percusion</label>
											<select class="form-control" id="percusion" name="percusion" required>
							      				<option selected value="<?php echo $row['percusion'];?>"><?php echo $row['percusion'];?></option>
												<option value="Central/">Central/</option>
												<option value="Anular">Anular</option>
												<option value="Otro/">Otro/</option>
							    			</select>
										</div>
									</div>
									<p></p>
									<div class="row">
										<div class="col-md-6" id="percOtro" ><label>Otro</label>
											<input type="text" name="percOtro" id="percOtro" class="form-control" value="<?php echo $row['percOtro'];?>">
										</div>
										<div class="col-md-6"  id="fuegoCen"><label>Tipo fuego central</label>
											<input type="text" name="fuegoCen" id="fuegoCen" class="form-control" value="<?php echo $row['fuegoCen'];?>">
										</div>
										<div class="col-md-3"><label>Peso(gr)</label>
											<input type="number" required name="peso" class="form-control" value="<?php echo $row['peso'];?>">
										</div>
									</div>
									<br>
									<div class="row">						
										<div class="col-md-6"><label>Forma de percusion</label>
											<input type="text" required name="formPer" class="form-control" value="<?php echo $row['formPer'];?>">
										</div>
										<div class="col-md-6"><label>Regular</label>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="regular" id="irregular" value="No">
												<label class="form-check-label" for="irregular">
													Irregular
												</label>
												</div>
												<div class="form-check">
												<input class="form-check-input" type="radio" name="regular" id="regular" value="Si">
												<label class="form-check-label" for="regular">
													Regular
												</label>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-6"><label>Desplazamiento</label>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="despla" id="conDespl" value="Con Desp">
												<label class="form-check-label" for="conDespl">
													Con Desp
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="despla" id="sinDespl" value="Sin Desp">
												<label class="form-check-label" for="sinDespl">
													Sin Desp
												</label>
											</div>
										</div>
										<div class="col-md-6"><label>Orientacion</label>
											<select class="form-control" name="orientacion" required value="<?php echo $row['orientacion'];?>">
							      				<option selected value="<?php echo $row['orientacion'];?>"><?php echo $row['orientacion'];?></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
							    			</select>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-6"><label>Sello de fulminante</label>
											<input type="text" required name="selloFul" class="form-control" value="<?php echo $row['selloFul'];?>">
										</div>
										<div class="col-md-6"><label>Carac de fulm percutido</label>
											<select class="form-control" name="fulPerc" required value="<?php echo $row['fulPerc'];?>">
							      				<option selected value="<?php echo $row['fulPerc'];?>"><?php echo $row['fulPerc'];?></option>
												<option value="craterizado">Craterizado</option>
												<option value="planchado">Planchado</option>
												<option value="pinchado">Pinchado</option>
												<option value="sinanomalias">Sin anomalias</option>
							    			</select>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-12"><label>Otros</label>
										<input type="text" required name="obser" class="form-control" value="<?php echo $row['obser'];?>">
										</div>
									</div>
									<br>

									<div class="row">
										<div class="mb-3">
											<?php
												$query = $db->query("SELECT * FROM sivStock where id='$id'");
												if($query->num_rows > 0){
													while($row = $query->fetch_assoc()){
															$imageURL = 'uploads/'.$row["picPath"];
											?>
											<a href="<?php echo $imageURL; ?>"><img src="<?php echo $imageURL; ?>" alt="" style="width: 150px;"/></a> 
														<?php }
														}else{ ?>

															<p>No image(s) found...</p>
														
															<?php } ?>
											<label for="formFile" class="form-label">Cargue una imagen</label>
											<input class="form-control" type="file" name="file" id="file">
										</div>
									</div>
									<br>
								</div>
									 <input type="submit" name="send" value="Agregar Registro" class="btn btn-success">&nbsp;
								 <a href="stock.php" class="btn btn-warning">Volver</a>
							</form>
				    	</div>
			 	  </div>
			 </div>
		 </body>
	</html>
