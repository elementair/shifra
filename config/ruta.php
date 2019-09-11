<?php
	/* Rutas universales */


    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
        || $_SERVER['SERVER_PORT'] == 443) {

        // HTTPS
        $ruta_universal = "https://www.shifraspaandares.com.mx/";

    } else {

        // HTTP
        $ruta_universal = "http://localhost/shifra/";

    }



    $ruta_universal = "http://localhost/shifra/";

    $ruta_universal_calendario = $ruta_universal."calendario/";

    $ruta_universal_sistema = $ruta_universal."sistema/";

    /* Ruta citas activas*/

    $modal_cita="#Modal_formulario_cita";
    $modal_cita_individual="#Modal_formulario_cita_individual";


    /* Ruta citas lanzamiento */


    // $modal_cita="#Modal_formulario_cita_lanzamiento";
    // $modal_cita_individual="#Modal_formulario_cita_lanzamiento";

?>