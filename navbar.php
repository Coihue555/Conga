<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="stock.php">Conga</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
								<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
								<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
							</svg> Hola <?php echo htmlspecialchars($_SESSION["username"]); ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="rstpwrd.php">Cambiar contraseña</a></li>
              <li><a class="dropdown-item" target="_blank" href="https://octarinecode.com/#contact">Deja tu comentario</a></li>
              <li><a class="dropdown-item" target="_blank" href="https://www.youtube.com/c/OctarineCode">Youtube</a></li>
              <li><a class="dropdown-item" target="_blank" href="https://discord.gg/EPXR5QzNz3">Discord</a></li>
              <li><a class="dropdown-item" target="_blank" href="https://github.com/Coihue555/Conga">Codigo Fuente - Github</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Salir</a></li>
            </ul>
          </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="stock.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cuentas.php">Cuentas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php">Categorias</a>
        </li>
      </ul>
      <form class="d-flex" action="search.php" method="post" >
        <input class="form-control me-2" type="search" name="search" placeholder="Buscar" aria-label="Search">
      </form>

    </div>
  </div>
</nav>