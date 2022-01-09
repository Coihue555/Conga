<?php
// Initializar la sesion del usuario
session_start();
 
// Revisar si el usuario ya esta logueado, si lo esta, ir a la pagina pricipal -movimientos
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: stock.php");
    exit;
}
 
// Incluir los datos de conexion a la BD
require_once "sesion/config.php";
 
// Definicion de variables e inicializacion con valores vacios
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Procesamiento de los datos cuando son enviados
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Confirmar que el username este vacio
    if(empty(trim($_POST["username"]))){
        $username_err = "Ingrese su nombre de usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Confirmar que el password este vacio
    if(empty(trim($_POST["password"]))){
        $password_err = "Ingrese su password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar las credenciales de identificacion
    if(empty($username_err) && empty($password_err)){
        // Preparacion de una consulta SELECT
        $sql = "SELECT id, username, password FROM usuarios WHERE username = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Union de variables a la consulta preparada como parametros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Asignar parametros
            $param_username = $username;
            
            // Ejecucion del la consulta preparada
            if(mysqli_stmt_execute($stmt)){
                // Guardar los resultados
                mysqli_stmt_store_result($stmt);
                
                // Verificar si el username existe, si existe verificar el password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Unir las variables de los resultados
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // El password es correct, iniciar nueva sesion
                            session_start();
                            
                            // Guardar datos en variables de sesion
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirigir a la pagina principal
                            header("location: stock.php");
                        } else{
                            // El password no es valido, mostrar mensaje de error
                            $login_err = "Usuario o password incorrectos.";
                        }
                    }
                } else{
                    // El username no existe, mostrar mensaje de error
                    $login_err = "Usuario o password incorrectos.";
                }
            } else{
                echo "Oops! Algo salio mal. Intente nuevamente mas tarde.";
            }

            // Cerrar consulta
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cerrar conexion
    mysqli_close($db);
}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121814257-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-121814257-1');
    </script>
    <meta property="og:description" content="Lleva los gastos de tu casa de forma sencilla!" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="assets/js/jquery.min.js"></script>
    <title>Conga</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 70px;">
            <div class="col-md-6">
                <img class="rounded mx-auto d-block" src="logo.png" alt="">
            </div>
            <div class="col-md-6">
                <h2>Ingreso</h2>
                <p>Ingrese sus datos para entrar.</p>

                        <?php 
                        if(!empty($login_err)){
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }        
                        ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <br>    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Entrar">
                    </div>
                    <p>No tenes una cuenta? <a href="sesion/register.php">Registrate aca</a>.</p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>