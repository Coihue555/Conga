<nav id="clAc2" class="navbar navbar-expand-lg navbar-dark bg-primary">
  	<a class="navbar-brand" href="stock.php">Conga</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="cuentas.php">Cuentas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="categorias.php">Categorias</a>
				</li>
			</ul>
			<form action="search.php" method="post" class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" name="search" placeholder="Buscar" aria-label="Buscar">
			</form>
			<div class="btn-group" role="group" aria-label="">
				<div class="btn-group" role="group">
					<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
							<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
							<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						</svg> Hola <?php echo htmlspecialchars($_SESSION["username"]); ?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						<li><a class="dropdown-item" href="#">Dropdown link</a></li>
						<li><a class="dropdown-item" href="#">Dropdown link</a></li>
					</ul>
				</div>
			</div>
		</div>
</nav>