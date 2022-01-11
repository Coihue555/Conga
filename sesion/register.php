<?php
// Incluir la conexion a la BD
require_once "sesion/config.php";
 
// Definicion de variables e inicializacion con valores vacios
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Procesamiento de los datos cuando son enviados
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validacion del username
    if(empty($_POST["username"])){
        $username_err = "Por favor, ingrese un nombre de usuario.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', $_POST["username"])){
        $username_err = "El nombre de usuario debe tener solo letras, numeros y guiones bajos.";
    } else{
        // Preparacion de la consulta SELECT
        $sql = "SELECT id FROM usuarios WHERE username = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Union de variables a la consulta preparada como parametros
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Asignar parametros
            $param_username = $_POST["username"];
            
            // Ejecucion del la consulta preparada
            if(mysqli_stmt_execute($stmt)){
                /* guarda los resultados */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya existe.";
                } else{
                    $username = $_POST["username"];
                }
            } else{
                echo "Oops! Algo salio mal. Intente nuevamente mas tarde.";
            }

            // Cierra la consulta
            mysqli_stmt_close($stmt);
            include 'sesion/createDBTable.php';
        }
    }
    
    // Validar Password
    if(empty($_POST["password"])){
        $password_err = "Por favor, ingrese un password.";     
    } elseif(strlen($_POST["password"]) < 8){
        $password_err = "El password debe tener al menos 8 caracteres.";
    } else{
        $password = $_POST["password"];
    }
    
    // Validar Confirmar password
    if(empty($_POST["confirm_password"])){
        $confirm_password_err = "Por favor, confirme el password.";     
    } else{
        $confirm_password = $_POST["confirm_password"];
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "El password no coincide.";
        }
    }
    
    // Revisar errores de entrada antes de insertar en la BD
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Preparar la consulta INSERT
        $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Union de variables a la consulta preparada como parametros
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Asignar parametros
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Crear el hash del password
            
            // Ejecucion del la consulta preparada
            if(mysqli_stmt_execute($stmt)){
                // Redireccion a la pagina de Inicio de Sesion
                header("location: index.php");
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Conga</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 70px;">
            <div class="col-md-6">
                <img class="rounded mx-auto d-block" src="logo.png" alt="">
            </div>
            <div class="col-md-6">
                <h2>Registrate</h2>
                <p>Crea tu cuenta.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <br>    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Confirme su password</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Confirmar">
                        <input type="reset" class="btn btn-secondary ml-2" value="Resetear">
                    </div>
                    <p>Ya tenes una cuenta? <a href="index.php">Ingresa aqui</a>.</p>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>