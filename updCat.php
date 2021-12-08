<!DOCTYPE html>
<?php
	// Initialize the session
	session_start();
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: register.php");
		exit;
	}
	?>
<?php include 'db.php';
include 'navbar.php';

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
<html>
	<head>
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css">
		<title>Conga - Categorias</title>
	</head>
	<body>
		<div class="container">

		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10" >
				    	<table class="table">

					     	<hr><br>
								<form method="post" >
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
