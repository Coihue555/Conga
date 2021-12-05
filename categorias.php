<!DOCTYPE html>
	<?php
		session_start();
		if(isset($_SESSION['verificado'])){
			} else {
			header ("Location: index.php?error=fuera");
			}
	?>

	<?php include 'db.php';

		$page = (isset($_GET['page']) ? $_GET['page'] : 1);
		$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 30);
		$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


		$sql = "select * from categorias ORDER BY id DESC limit ".$start." , ".$perPage." ";
		$total = $db->query("select * from categorias")->num_rows;
		$pages = ceil($total / $perPage);

		$rows = $db->query($sql);


	?>
	<html>
		<head>
			<script src="jquery.min.js"></script>
			<script src="bootstrap.min.js"></script>
			<link rel="stylesheet" href="bootstrap.min.css">
			<link rel="stylesheet" href="estilo.css">
			<link rel="icon" href="favicon.ico">
			<title> Categorias </title>
		</head>
		<body>
		<?php include 'navbar.php' ?>
			<div class="container">
				<div class="row" style="margin-top: 70px;">
					<div class="col-md-12 col-md-offset-1" >
						<table class="table">
								
							<button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</button>
							<button type="button" class="btn btn-default pull-right" onclick="print()">Imprimir</button>
							<hr><br>
						 <!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog">
								 <!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Agregar</h4>
											<button type="button" class="btn btn-close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<form method="post" action="addCat.php">
											<div class="form-group">
											<div class="row">
												<div class="col-md-6"><label>Tipo de categoria</label>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="tipoCat" id="0" value="0" checked>
														<label class="form-check-label" for="0">
															Gasto
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="tipoCat" id="1" value="1">
														<label class="form-check-label" for="1">
															Ingreso
														</label>
													</div>
												</div>
											<div class="col-md-6"><label for="Categoria">Nombre de la Categoria</label>
												<input type="text" required name="Categoria" class="form-control" placeholder="<?php echo $row['Categoria'];?>">
											</div>
										</div>
												
												
											
												<br>
												<button style="float: left;" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
												<input style="float: right;" type="submit" name="send" value="Agregar" class="btn btn-success">
											</form>
										</div>
									</div>
								</div>
							</div>
					</div>

					<div id="clAc2" class="col-md-12 text-center">
						<form action="search.php" method="post" class="form-group">
							<input type="text" placeholder="Buscar..." name="search" class="form-control">
						</form>
					</div>

					<div class="col-md-12">
						<table class="table table-hover" id="myTable" style="font-size:0.7em; table-layout: auto; width: 100%; ">
							<thead>
								<tr>
									<th>ID</th>
									<th onclick="sortTable(1)">Categoria</th>
									<th onclick="sortTable(2)">Tipo</th>
									<th id="clAc">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php while($row = $rows->fetch_assoc()): ?>						
										<td><?php echo $row['id'] ?></td>
										<td><?php echo $row['Categoria'] ?> </td>
										<td><?php echo $row['tipoCat'] ?> </td>
										<td class="btn-group">
											<a href="updCat.php?id=<?php echo $row['id'];?>" class="btn-sm btn-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
													<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
													<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
												</svg>
											</a>
											<a href="delCat.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
													<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
													<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
												</svg>
											</a>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>

						<script>
							function sortTable(n) {
							var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
							table = document.getElementById("myTable");
							switching = true;
							//Set the sorting direction to ascending:
							dir = "asc"; 
							/*Make a loop that will continue until
							no switching has been done:*/
							while (switching) {
								//start by saying: no switching is done:
								switching = false;
								rows = table.rows;
								/*Loop through all table rows (except the
								first, which contains table headers):*/
								for (i = 1; i < (rows.length - 1); i++) {
								//start by saying there should be no switching:
								shouldSwitch = false;
								/*Get the two elements you want to compare,
								one from current row and one from the next:*/
								x = rows[i].getElementsByTagName("TD")[n];
								y = rows[i + 1].getElementsByTagName("TD")[n];
								/*check if the two rows should switch place,
								based on the direction, asc or desc:*/
								if (dir == "asc") {
									if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
									//if so, mark as a switch and break the loop:
									shouldSwitch= true;
									break;
									}
								} else if (dir == "desc") {
									if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
									//if so, mark as a switch and break the loop:
									shouldSwitch = true;
									break;
									}
								}
								}
								if (shouldSwitch) {
								/*If a switch has been marked, make the switch
								and mark that a switch has been done:*/
								rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
								switching = true;
								//Each time a switch is done, increase this count by 1:
								switchcount ++;      
								} else {
								/*If no switching has been done AND the direction is "asc",
								set the direction to "desc" and run the while loop again.*/
								if (switchcount == 0 && dir == "asc") {
									dir = "desc";
									switching = true;
								}
								}
							}
							}
							</script>




					</div>
				</div>
				<div class="row justify-content-md-center">
					<ul class="pagination">
						<?php for($i = 1 ; $i <= $pages; $i++): ?>
							<li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>
						<?php endfor; ?>
					</ul>
				</div>	
			</div>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" media="print" href="print.css">
		</body>
	</html>
