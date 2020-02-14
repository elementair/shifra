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
                jQuery("#mostrar_noficacion").html("Buscado servicios...");
            },
            success: function(response) {

                //escondemos gif
                jQuery('#loading_spinner').hide();
                //mostramos salida del PHP
                // jQuery("#mostrar_resultado_prepago").html(response);
                $("#mostrar_resultado_prepago").html(response);
                console.log(response);

                if (response === '') {

                    jQuery("#mostrar_noficacion").html("<small class='bg-danger text-danger'>FOLIO incorrecto, vuela a intentar...</small>");

                } else {

                    jQuery("#mostrar_noficacion").html("<small class='bg-success text-success'>FOLIO verificado, selecciona tu servicio en la pestaña *CERTIFICADO  </small>");

                }

            }

        });

    });

});