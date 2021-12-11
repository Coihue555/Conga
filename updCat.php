<!doctype html>
<html lang="es">
    <?php
    include 'sesion.php';
    include 'config.php';

$id= (int)$_GET['id'];


$sql1 = "SELECT * from categorias where id ='$id'";

$rows = $db->query($sql1);

$row= $rows->fetch_assoc();

if(isset($_POST['send'])){


	$categoria = htmlspecialchars($_POST['Categoria']);
	$tipoCat = htmlspecialchars($_POST['tipoCat']);







$sql2 = "UPDATE categorias set Categoria='$categoria', tipoCat='$tipoCat' WHERE id ='$id'";

$val = $db->query($sql2);



printf("Errormessage: %s\n", $db->error);

header('location: categorias.php');

}


?>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <title>Conga</title>
	</head>
	<body>
	<?php include 'navbar.php';?>
		<div class="container">
		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10" >
				    	<table class="table">
								<form method="post" class="needs-validation">
									<div class="form-group">
										<div class="row">
											<div class="col-md-6"><label>Tipo de categoria</label>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="tipoCat" id="0" value="Gasto" checked>
														<label class="form-check-label" for="0">
															Gasto
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="tipoCat" id="1" value="Ingreso">
														<label class="form-check-label" for="1">
															Ingreso
														</label>
													</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6"><label for="Categoria">Nombre de la Categoria</label>
												<input type="text" required name="Categoria" class="form-control" value="<?php echo $row['Categoria'];?>" placeholder="<?php echo $row['Categoria'];?>">
											</div>
										</div>								
									</div>
									 <input type="submit" name="send" value="Agregar Registro" class="btn btn-primary">&nbsp;
								 <a href="categorias.php" class="btn btn-primary">Volver</a>
							</form>
				    	</div>
			 	  </div>
			 </div>
		 </body>
	</html>
