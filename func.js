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
    } else {
        $("#ingreso").hide();
    }




    $('#tipoCuen').on('change', function() {
        if (this.value == 'Transfer') {
            $("#transfer").show();
        } else {
            $("#transfer").hide();
        }
    });

    if ($('#tipoCuen').val() == 'Transfer') {
        $("#transfer").show();
    } else {
        $("#transfer").hide();
    }


});