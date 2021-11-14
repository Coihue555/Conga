<!DOCTYPE html>
<?php include 'db.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 30);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$sql = "select * from sivStock ORDER BY id DESC limit ".$start." , ".$perPage." ";
$total = $db->query("select * from sivStock")->num_rows;
$pages = ceil($total / $perPage);

$rows = $db->query($sql);


?>
<html>
<head>
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="estilo.css">
<title> SIVaS</title>
</head>


<body>



<div class="container">
<div class=" row justify-content-md-center "><h1><img src="logo.png">   - Control de Identificacion</h1>
<h2>Reportes</h2>
</div>
<div class="row" style="margin-top: 70px;">
	<div class="col-md-10 col-md-offset-1" >
		<table class="table">
			<button type="button" class="btn btn-default pull-right" onclick="print()">Imprimir</button>
			<hr><br>
			<!-- Modal -->
			
		<div id="clAc2" class="col-md-12 text-center">
			<form action="search2.php" method="post" class="form-group" name="search">
				<div class="row">
					<label>Fecha Inicial </label><input type="date" name="fechai">
					<label>Fecha Final </label><input type="date" name="fechaf">
				</div>
				<input type="text" placeholder="Buscar..." name="srch" class="form-control">
			</form>
		</div>


			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID.</th>
						<th>Fecha</th>
						<th>Item</th>
						<th>Cant</th>
						<th>Precio</th>
						<th>Detalle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php while($row = $rows->fetch_assoc()): ?>
						<th><?php echo $row['id'] ?></th>
						<td><?php echo $row['fecha'] ?></td>
						<td class="col-md-3"><?php echo $row['item'] ?> </td>
						<td><?php echo $row['cant'] ?> </td>
						<td><?php echo $row['precio'] ?> </td>
						<td class="col-md-3"><?php echo $row['det'] ?> </td>
						<td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Editar</a> </td>
						<td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Eliminar</a> </td>
					</tr>
						<?php endwhile; ?>

				</tbody>
			</table>
			<center>
				<ul class="pagination">
				<?php for($i = 1 ; $i <= $pages; $i++): ?>
				<li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>

			<?php endfor; ?>
				</ul>
			</center>






		</div>
	</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" media="print" href="print.css">
</body>
</html>
