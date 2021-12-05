<?php

    function totalCuenta($cuenta) {
        $sql = "SELECT TRUNCATE(SUM(valor), 2) AS valor_suma_cuenta FROM movimientos WHERE cuenta='$cuenta'";
        $result = $db->query($sql);

     if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                return "<button type='button' class='btn btn-success'>";
                return "$cuenta";
                return "<br> <span class='badge bg-secondary'>$" . $row['valor_suma_cuenta']."</span></button>			";
            }
        }
    }

?>