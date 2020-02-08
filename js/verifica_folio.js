jQuery(document).ready(function() {

    jQuery("#calc").click(function() {
        //cogemos el valor del input
        var num = jQuery("#numero_folio").val();

        if (num == "") {
            alert("Ingresa un número de Folio :)");
            return;
        }

        //creamos array de parámetros que mandaremos por POST
        var params = {
            "numFactorial": num
        };

        //llamada al fichero PHP con AJAX
        $.ajax({
            data: params,
            url: 'ajax/prepago.ajax.php',
            dataType: 'html',
            type: 'post',
            beforeSend: function() {
                //mostramos gif "cargando"
                jQuery('#loading_spinner').show();
                //antes de enviar la petición al fichero PHP, mostramos mensaje
                jQuery("#resultado").html("Buscado servicios...");
            },
            success: function(response) {
                //escondemos gif
                jQuery('#loading_spinner').hide();
                //mostramos salida del PHP
                jQuery("#resultado_folio").html(response);

            }
        });


    });


});