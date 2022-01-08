<!doctype html>
<html lang="es">
    <?php
    include 'sesion.php';
    include 'config.php';

$id= (int)$_GET['id'];
$tabla = $_GET['tabla'];
$user=$_SESSION["username"];


$sql1 = "SELECT * from $tabla where id ='$id' AND usuario='$user'";

$rows = $db->query($sql1);

$row= $rows->fetch_assoc();

if(isset($_POST['send'])){


	$cuenta = htmlspecialchars($_POST['nomCuen']);



$sql2 = "UPDATE $tabla set nomCuen='$cuenta' WHERE id ='$id' AND usuario='$user'";

$val = $db->query($sql2);



printf("Errormessage: %s\n", $db->error);

header('location: cuentas.php');

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
		<?php include 'navbar.php'?>
		<div class="container">
		    	<div class="row" style="margin-top: 70px;">
			    	<div class="col-md-10" >
						<form method="post" class="needs-validation">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6 justified"><label for="Categoria">Nombre de la Cuenta</label>
										<input type="text" required name="nomCuen" class="form-control" value="<?php echo $row['nomCuen'];?>" placeholder="<?php echo $row['nomCuen'];?>">
									</div>
								</div>								
							</div>
							<br>
							<input type="submit" name="send" value="Agregar Registro" class="btn btn-primary">&nbsp;
							<a href="cuentas.php" class="btn btn-primary">Volver</a>
				    	</form>	
			 	  	</div>
			 	</div>
		</div>
	</body>
</html>
