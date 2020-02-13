jQuery(document).ready(function() {

    jQuery("#calc").click(function() {
        //cogemos el valor del input


        // var num = jQuery("#numero_folio").val();

        // if (num == "") {
        //     alert("Ingresa un número de Folio :)");
        //     return;
        // }




        // var datos = { "numFactorial": num };

        // console.log(datos);
        // $.ajax({
        //     url: 'ajax/prepago.ajax.php',
        //     type: "POST",
        //     data: datos,
        //     beforeSend: function() {
        //         //mostramos gif "cargando"
        //         jQuery('#loading_spinner').show();
        //         //antes de enviar la petición al fichero PHP, mostramos mensaje
        //         jQuery("#resultado").html("Buscado servicios...");
        //     },
        //     success: function(respuesta) {

        //         //escondemos gif

        //         //mostramos salida del PHP
        //         jQuery("#resultado_folio").html(respuesta);


        //     },
        // }).done(function(respuesta) {


        //     console.log(respuesta);

        //     if (respuesta.estado === "ok") {

        //         console.log(respuesta.contenido);

        //         // $(".mostrar_servicios_folio").html(JSON.stringify(contenido));

        //         $("#resultado_folio").html(respuesta.contenido);


        //     }

        // });








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

                if (response === '') {

                    jQuery("#resultado_notificacion").html("<small class='bg-danger text-danger'>FOLIO incorrecto, vuela a intentar...</small>");

                } else {

                    jQuery("#resultado_notificacion").html("<small class='bg-success text-success'>FOLIO verificado, puedes seleccionar tu servicio en *CERTIFICADO...</small>");

                }
            }
        });


    });


});