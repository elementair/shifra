<?php
/*************************************************************
*** CONEXIÓN  Y OBTENCION DE CLASES DE CONEXIÓN
*************************************************************/

session_start();
require_once ('../servicio/consulta.php');
$datos = new consulta();
$conexion = new Conexion();
$conexion->selecciona_base_datos();
$link = $conexion->link;

/*************************************************************
*** Obtenemos los datos de los input
*************************************************************/

$id = $_POST['id'];
$Dia= $_POST['dia'];
$Hora= $_POST['hora'];
$obtener_id = $id;
$obtener_fecha = $Dia;
$obtener_hora = $Hora;
// ej: $obtener_fecha = 19/06/2019

/*************************************************************
*** DEFINIMOS UN ARRAY PARA TRADUCIR DIAS
*************************************************************/

$array_dias['Sunday']   = "domingo";
$array_dias['Monday']   = "lunes";
$array_dias['Tuesday']  = "martes";
$array_dias['Wednesday']= "miercoles";
$array_dias['Thursday'] = "jueves";
$array_dias['Friday']   = "viernes";
$array_dias['Saturday'] = "sabado";

/*************************************************************
*** Cambiamos formato de la fecha, obtenemos día actual
*** y lo remplazamos con el día correspondiente en español
*************************************************************/

$fecha = str_replace("/", "-", $obtener_fecha);
// 19/06/2019 = 19-06-2019
$obtener_dia_letra= $array_dias[date('l', strtotime($fecha))];
// 19-06-2019 = Monday & Monday = miercoles

/*************************************************************
*** Consulta: obtener lista de empleados  que son  aptos para X servicio seleccionado
*** y en su rol el dia seleccionado están disponibles y están activos en servicio
*************************************************************/

$empleados=mysqli_query($link,"SELECT s.id AS 'sid', s.nombre AS 'snombre', s.duracion, e.descripcion, e.id
                        AS 'eid', e.nombre AS 'enombre', e.status AS 'estatus', er.entrada, er.salida, er.lunes,
                        er.martes, er.miercoles,  er.jueves, er.viernes,  er.sabado, er.domingo from(((servicios as s
left outer join servicios_empleados as ss on s.id=ss.servicios_id)
left outer join empleados as e on e.id=ss.empleados_id)
left outer join empleados_rol as er on er.empleados_id=e.id) WHERE  e.status=1 servicios_id=".$obtener_id." AND ".$obtener_dia_letra."= 1");

foreach ($empleados as $empleado) {
    $capsula_select='';
    $capsula_select='<select name="empleado"  id="empleado" class="form-control empleadolista" required disabled>';
    $nombre_empleado=$empleado['enombre'];
    $estado_empleado=$empleado['estatus'];
    echo echo "<script>console.log( 'Debug Objects: " . $nombre_empleado . "' );</script>";

    for($i=0; $i<$empleado['eid']; $i++){


        $contenido1=$array[$i];
        echo $i;

        $citas_ocupados = mysqli_query($link,'SELECT empleados_id, nombre_empleado, fecha, hora_inicio, hora_fin, duracion FROM control_citas WHERE fecha="'.$obtener_fecha.'"');

        foreach ($citas_ocupados as $ocupados) {

            $array_final[]='<option value='.$nombre_empleado.'>'.$nombre_empleado;'</option>';
            $resultado = array($array_final);

       }

    }
}

header('Content-Type: application/json');
    //Guardamos los datos en un array

    $datos = array(
    'estado'    => 'ok',
    'id'        => $id,
    'dia'       => $Dia,
    'hora'       => $Hora,
    'select'    => $capsula_select,
    // 'empleado'  => $empleado_seleccionado,
    'contenido' => $resultado
    );

//Devolvemos el array pasado a JSON como objeto
$info = json_encode($datos, JSON_FORCE_OBJECT);
echo($info);
?>
