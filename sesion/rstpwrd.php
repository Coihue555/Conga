<?php
include 'sesion.php';
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty($_POST["new_password"])){
        $new_password_err = "Ingrese el nuevo password.";     
    } elseif(strlen($_POST["new_password"]) < 8){
        $new_password_err = "El password debe tener al menos 8 caracteres.";
    } else{
        $new_password = $_POST["new_password"];
    }
    
    // Validate confirm password
    if(empty($_POST["confirm_password"])){
        $confirm_password_err = "Confirme el password.";
    } else{
        $confirm_password = $_POST["confirm_password"];
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Los passwords no coinciden.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE usuarios SET password = :password WHERE id = :id";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: ../index.php");
                exit();
            } else{
                echo "Algo malio sal, intente nuevamente mas tarde";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resetear Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Resetear Password</h2>
        <p>Seleccione su nuevo password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Nuevo Password</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirme Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="../stock.php">Cancelar</a>
            </div>
        </form>
    </div>    
</body>
</html>