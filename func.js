//ajax gasto
$.ajax({
    url: "script.php",
    type: "POST",
    data: "id=1",
    success: function(msg) {
        alert(msg);
    }
})

// Mostras Gasto -->
$(document).ready(function() {


    $('#tipoCuen').on('change', function() {
        if (this.value == 'Gasto') {
            $("#gasto").show();
        } else {
            $("#gasto").hide();
        }
    });

    if ($('#tipoCuen').val() == 'Gasto') {
        $("#gasto").show();
        document.getElementById("catGasto").required = true;
    } else {
        $("#gasto").hide();
    }



    $('#tipoCuen').on('change', function() {
        if (this.value == 'Ingreso') {
            $("#ingreso").show();
        } else {
            $("#ingreso").hide();
        }
    });

    if ($('#tipoCuen').val() == 'Ingreso') {
        $("#ingreso").show();
        document.getElementById("catIngreso").required = true;
    } else {
        $("#ingreso").hide();
    }

});