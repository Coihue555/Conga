<!DOCTYPE html>
<?php include 'db.php';

if(isset($_POST['search'])){

		$srch = htmlspecialchars($_POST['srch']);
		$numObraSocial = htmlspecialchars($_POST['numObraSocial']);
		$fechai = htmlspecialchars($_POST['fechai']);
		$fechaf = htmlspecialchars($_POST['fechaf']);

		$sql = "SELECT * FROM Insumos
				WHERE fecha BETWEEN '$fechai%' AND '$fechaf%'
				ORDER BY id DESC";


		$rows = $db->query($sql);

}



?>
<html>
<head>
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<title>SIVaS</title>
</head>
<body>
<div class="container">
<center><h1>Lista de resultados</h1></center>

<div class="row" style="margin-top: 70px;">
	<div class="col-md-10 col-md-offset-1" >
		<table class="table">
			<button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success ">Agregar Cambio</button>
			<button type="button" class="btn btn-default pull-right" onclick="print()">Imprimir</button>
			<hr><br>
			<div class="col-md-12 text-center">
			<form action="search.php" method="post" class="form-group">

				<input type="text" placeholder="Buscar" name="search" class="form-control">
			</form>
		</div>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						
						<div class="modal-body">
						<form method="post" action="add.php">
								<div class="form-group">
									<div class="row">
									<div class="col-md-6"><label>Item</label><input type="text" required name="item" class="form-control"></div>
									<div class="col-md-2"><label>Cantidad</label><input type="number" required name="cant" class="form-control"></div>
							</div>
							<div class="row">
								<div class="col-md-12"><label>Detalle</label><input type="text" required name="det" class="form-control"></div>								</div>
								<br>
								<input type="submit" name="send" value="Agregar" class="btn btn-success">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
		
		<?php if(mysqli_num_rows($rows) < 1 ): ?>

    <h2 class="text-danger text-center">Ninguna coincidencia</h2>
    <a href="reportes.php" class="btn btn-warning">Volver</a>

	  <?php else: ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID.</th>
						<th>Fecha</th>
						<th>Item</th>
						<th>Cant</th>
						<th>Precio</th>
						<th>Detalle</th>
						<th>Acciones</th>

					</tr>
				</thead>
				<tbody>
					<tr>
					<?php while($row = $rows->fetch_assoc()): ?>




						<th><?php echo $row['id'] ?></th>
							<td><?php echo $row['fecha'] ?> </td>
							<td class="col-md-10"><?php echo $row['item'] ?> </td>
							<td><?php echo $row['cant'] ?> </td>
							<td><?php echo $row['precio'] ?> </td>
							<td><?php echo $row['det'] ?> </td>
						<td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Editar</a> </td>
		<td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Eliminar</a> </td>
		<td><a href="reportes.php" class="btn btn-warning">Volver</a></td>
					</tr>
						<?php endwhile; ?>

				</tbody>
          </table>
<?php endif; ?>


		<center>

		</div>
	</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" media="print" href="print.css">
</body>
</html>
