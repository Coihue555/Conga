<!doctype html>
<html lang="es">
    <?php
    include 'sesion.php';
    include 'config.php';

	$tabla ="categorias";
	include 'tabla.php';

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
  <?php include 'navbar.php' ?>
			<div class="container-fluid">
				<div class="row" style="margin-top: 70px;">
					<div class="col-md-12" >
						<table class="table">
							<div style="float:right;">
								<button type="button" class="btn btn-default pull-right" onclick="print()">Imprimir</button>
								<button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-primary pull-right">Nuevo</button>
							</div>
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

					<div class="col-md-12">
						<table id="myTable">
							<thead>
								<tr>
									<th onclick="sortTable(1)">Categoria</th>
									<th onclick="sortTable(2)">Tipo</th>
									<th id="clAc">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php while($row = $rows->fetch_assoc()): ?>
										<td><?php echo $row['Categoria'] ?> </td>
										<td><?php echo $row['tipoCat'] ?> </td>
										<td>
											<div class="btn-group">
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
											</div>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
                        <?php
                        include 'footer.php';
                        ?>