<?php

    function colTable($col, $tabla) {
        $sql = "SELECT * FROM $tabla";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            echo "<select class='form-control' name='$col' required>";
            echo "<option selected disabled>col</option>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['$col'] . "'>" . $row['$col'] . "</option>";
            }
            echo "</select>";
        }
    }

?>