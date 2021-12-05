<!DOCTYPE html>

<?php include 'db.php';

$id= (int)$_GET['id'];


$sql1 = "SELECT * from cuentas where id ='$id'";

$rows = $db->query($sql1);

$row= $rows->fetch_assoc();

if(isset($_POST['send'])){


	$cuenta = htmlspecialchars($_POST['nomCuen']);



$sql2 = "UPDATE cuentas set nomCuen='$cuenta' WHERE id ='$id'";

$val = $db->query($sql2);



printf("Errormessage: %s\n", $db->error);

header('location: cuentas.php');

}


?>
<html>
	<head>
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css">
		<title>Conga - Cuentas</title>
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
											<div class="col-md-6"><label for="Categoria">Nombre de la Cuenta</label>
												<input type="text" required name="nomCuen" class="form-control" value="<?php echo $row['nomCuen'];?>" placeholder="<?php echo $row['nomCuen'];?>">
											</div>
										</div>								
									</div>
									 <input type="submit" name="send" value="Agregar Registro" class="btn btn-success">&nbsp;
								 <a href="cuentas.php" class="btn btn-warning">Volver</a>
							</form>
				    	</div>
			 	  </div>
			 </div>
		 </body>
	</html>
