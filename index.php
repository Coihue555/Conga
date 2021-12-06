<!doctype html>
<html lang="es">
	<head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Soluciones web y marketing online al alcance de todos">
    <meta name="author" content="Octarine Code">

		<title>Conga - Control de Gastos Domesticos</title>
		<meta charset = "UTF-8" />

		<!-- JAVASCRIPT
		================================================== -->
		<!-- Global JS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>

		<!-- Plugins JS -->
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- Slick JS -->
		<script src="assets/js/jquery.easing.1.3.js"></script>
		<script src="assets/js/slick.min.js"></script>
		<!-- Theme JS -->
		<script src="assets/js/theme.js"></script>


		    <!-- Plugins CSS -->
		    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		    <link rel="stylesheet" href="assets/fonts/themify/themify-icons.css">

		    <link rel="stylesheet" href="assets/css/slick.css">
		    <link rel="stylesheet" href="assets/css/slick-theme.css">
		    <link rel="stylesheet" href="assets/css/all.css">

		    <!-- Theme CSS -->
		    <link rel="stylesheet" href="assets/css/style.css">
		    <link rel="stylesheet" href="assets/css/responsive.css">
	</head>
	<body class="top-header">

		<?php
		if ($_GET[error] == "si") {
			echo "Tu usuario o/y tu contraseña no son correctos, inténtalo de nuevo.";
		}
		elseif ($_GET[error] == "fuera") {
			echo "No puedes entrar directamente en esta página.  Introduce usuario y contraseña.";
		}
		?>
		<div class="container">


		<div class="row">
		<div class="col-lg-6">
				<img src="logo.png" style="max-width: 70%;">
		</div>
		<div class="col-lg-6">
				<div class="banner-contact-form bg-white">
						<form action="sesion.php" method="post">
						  <div class="form-group">
						    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
						  </div>
						  <div class="form-group">
						    <input type="password" class="form-control" name="pass" placeholder="Password">
						  </div>
						  <button type="submit" class="btn btn-primary">Entrar</button>
						</form>
				</div>
		</div>
		</div>
		</div>
	</body>
</html>
