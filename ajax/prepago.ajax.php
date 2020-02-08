<?php

require_once ('../servicio/consulta.php');
$datos = new consulta();
$conexion = new Conexion();
$conexion->selecciona_base_datos();
$link = $conexion->link;

$num = $_POST["numFactorial"];

sleep(2);
/*
*
**************************************
*
Consultas
*
**************************************
*
*/

// $prepagos_servicios=mysqli_query($link, "SELECT prepagos_id, folio, cupon, servicios_id FROM prepagos_servicios;");

// $prepagos_servicios=mysqli_query($link, "SELECT s.nombre AS 'nombre_servicio', s.id AS 'id_servicio', s.status, ps.folio, ps.servicios_id FROM servicios AS s  LEFT OUTER JOIN prepagos_servicios as ps on s.id=ps.servicios_id WHERE s.status=1;");

// $prepagos_servicios=mysqli_query($link, "SELECT  ps.folio, ps.servicios_id, s.nombre AS 'nombre_servicio', s.id AS 'id_servicio', s.status FROM prepagos_servicios AS ps  LEFT OUTER JOIN servicios as s on ps.servicios_id=s.id WHERE s.status=1;");

$prepagos_servicios = mysqli_query($link, "SELECT folio, servicios_id, status FROM prepagos_servicios WHERE status=1;");

$servicios = mysqli_query($link, "SELECT id, nombre, duracion, precio, subgrupo_servicio_id, status  FROM servicios WHERE status=1 ");

$cadena = "";
foreach ($prepagos_servicios as $prepago){

	$folio = $prepago['folio'];
	$servicio_id = $prepago['servicios_id'];

	if($num == $folio){

		$cadena = "<small class='bg-success text-success'>FOLIO verificado, puedes seleccionar tu servicio...</small>".$servicio_id;
		
	}else{
	
		$cadena = "<small class='bg-danger text-danger'>FOLIO incorrecto, vuela a intentar...</small>";
		
	}
	
}

echo $cadena;





function factorial($n) { 
	if ($n < 2) { 
			return 1; 
	} else { 
			return ($n * factorial($n-1)); 
	} 
}



if ($num > 10) {
	echo "¡No me hagas pensar tanto! Prueba con un número menor que 10.";
	exit();
}

if ( !is_numeric($num)) {
	echo "Estás intentando enredarme ¡Esto no es un número!";
	exit();
}


$factorial = factorial($num);

echo "¡Lo tengo! el factorial es... ".$factorial ;



?>