<?php
include 'config.php';
 

try{
    $sql = "INSERT INTO `cuentas` (`nomCuen`, `totalParcial`, `usuario`) VALUES
    ('Banco', 0, '$username'),
    ('Sueldo', 0, '$username'),
    ('Mercado Pago', 0, '$username'),
    ('Efectivo', 0, '$username'),
    ('Freelance', 0, '$username'),
    ('Tarj Cred 1', 0, '$username'),
    ('Tarj Cred 2', 0, '$username'),
    ('App de Pagos', 0, '$username');";

    $sql .="INSERT INTO `categorias` (`Categoria`, `tipoCat`, `usuario`) VALUES
    ('Comida', 'Gasto', '$username'),
    ('Comida Afuera', 'Gasto', '$username'),
    ('Arreglos Casa', 'Gasto', '$username'),
    ('Ropa', 'Gasto', '$username'),
    ('Transporte', 'Gasto', '$username'),
    ('Telefono', 'Gasto', '$username'),
    ('Extra', 'Gasto', '$username'),
    ('Alquiler', 'Gasto', '$username'),
    ('Salud', 'Gasto', '$username'),
    ('Impuestos', 'Gasto', '$username'),
    ('Sueldo', 'Ingreso', '$username'),
    ('Changas', 'Ingreso', '$username'),
    ('Intereses', 'Ingreso', '$username'),
    ('Regalos', 'Ingreso', '$username');";


    $sql .="COMMIT;";

    $pdo->exec($sql);

} catch(PDOException $e){
die("ERROR: No se pudo ejecutar $sql. " . $e->getMessage());
}

?>