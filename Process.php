<?php
error_reporting(0);

date_default_timezone_set("America/Santiago");
// Dias
$dias = explode(',', $_POST['days']);
// Contar dias
$countdays = count($dias);

//for($i=0; $i <= $countdays;$i++){}

// Hora Inicio 24 Horas
$HoraInicio = date('H:i', strtotime($_POST['tiempo1']));
$HoraFin = date('G:i', strtotime($_POST['tiempo2']));
$entreHora = $_POST['minutos'];
$entreHora2 = $entreHora * 60;
$diferencia = ($HoraFin - $HoraInicio);

$FechaIn = $_POST['fechaIn'];
$FechaFin = $_POST['fechaFin'];

$FechaIn2 = date('d-m-y', strtotime($FechaIn));
$FechaFin2 = date('d-m-y', strtotime($FechaFin));

$FechaActual = date('d-m-Y');

$entrefecha = 86400;
$diferenciaDias = $FechaFin2 - $FechaIn2;

//$inicio =  date ( 'G:i' ,  strtotime ($data["params"]["tiempo1"]) ) ;             //fecha de inicio en formato 2022-07-12 09:30:00
//$fin = date ( 'Y-m-j H:i:s' ,strtotime ( $entreHora , strtotime ($data["params"]["tiempo1"]))) ;  //fecha de fin en formato 2022-07-12 10:15:00

// Hora Final 24 Horas
///////////////////////////////////////////////////////
//$horaTotal=strtotime ( $entreHora , strtotime ($inicio24) ) ; 



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php echo 'Hora de Inicio: ' . $HoraInicio ?></h1>
    <h1><?php echo 'Hora de Cierre: ' . $HoraFin ?></h1>
    <h1><?php echo 'La Fecha de hoy es: ' . date('d-m-Y'); ?></h1>
    <h1><?php echo 'Hoy es!!: ' . $FechaIn2; ?></h1>
    <h1><?php echo 'Diferencia: ' . $diferenciaDias; ?></h1>
    <?php


    /**
     * Comparacion de Fecha ingresada con la Fecha Actual!
     */
    if ($FechaIn2 > $FechaActual) {
        echo 'Fecha ok!' . $FechaIn2;
    }
    /**
     * Fecha inicial del rango de fechas
     */
    $fecha1 = strtotime($FechaIn);

    /**
     * Fecha final del rango de fechas
     */
    $fecha2 = strtotime($FechaFin);

    /**
     * Recorremos el rango de fechas. El valor de 86400 son los segundos
     * que tiene un dia (24 horas * 60 minutos * 60 segundos)
     */
    for ($i = $fecha1; $i <= $fecha2; $i += 86400) {
        echo 'Fechas: ' . date("d-m-Y", $i) . "<br>";
    }
    ?>
    <br>


    <?php


    for ($y = 0; $y <= $diferenciaDias; $y++) {

        if ($y == 0) {
            $ResFecha = $entrefecha * $y; // se va multiplicando por dia segun el array y se le suma a la fecha inicial.
            $nuevaFecha = ($FechaIn2);
            echo $nuevaFecha,'<br>';

            /**
             * Array de las Horas
             */
            for ($j = 0; $j < $diferencia; $j++) {

                if ($j == 0) {
                    echo '<br>',$nuevaFecha,' ', $HoraInicio;
                }
                if ($j >= 1) {
                    $ResEntreHora = $entreHora2 * $j;
                    $nuevaHora = date("H:i", strtotime($HoraInicio) + $ResEntreHora);
                    echo '<br>',$nuevaFecha,' ', $nuevaHora;
                }
            }
        }
    }

    /*for ($i = 0; $i < $countdays; $i++) {
        if ($dias[$i] == 1) {

            for ($j = 0; $j < $diferencia; $j++) {

                if ($j == 0) {
                    echo 'Lunes: ' . $HoraInicio;
                }
                if ($j >= 1) {
                    $ResEntreHora = $entreHora2 * $j;
                    $nuevaHora = date("H:i", strtotime($HoraInicio) + $ResEntreHora);
                    echo '<br>Lunes: ' . $nuevaHora;
                }
            }
        }

        if ($dias[$i] == 2) {
            for ($j = 0; $j < $diferencia; $j++) {

                if ($j == 0) {
                    echo '<br>Martes: ' . $HoraInicio;
                }
                if ($j >= 1) {
                    $ResEntreHora = $entreHora2 * $j;
                    $nuevaHora = date("H:i", strtotime($HoraInicio) + $ResEntreHora);
                    echo '<br>Martes: ' . $nuevaHora;
                }
                //Insert into Horas (dia, Horas) values('Martes',$hora1);             
            }
        }

        if ($dias[$i] == 3) {
            for ($j = 0; $j < $diferencia; $j++) {

                if ($j == 0) {
                    echo '<br>Miercoles ' . $HoraInicio;
                }
                if ($j >= 1) {
                    $ResEntreHora = $entreHora2 * $j;
                    $nuevaHora = date("H:i", strtotime($HoraInicio) + $ResEntreHora);
                    echo '<br>Miercoles ' . $nuevaHora;
                }
            }
        }
        if ($dias[$i] == 4) {
            for ($j = 0; $j < $diferencia; $j++) {

                if ($j == 0) {
                    echo '<br>Jueves ' . $HoraInicio;
                }
                if ($j >= 1) {
                    $ResEntreHora = $entreHora2 * $j;
                    $nuevaHora = date("H:i", strtotime($HoraInicio) + $ResEntreHora);
                    echo '<br>Jueves ' . $nuevaHora;
                }
            }
        }
        if ($dias[$i] == 5) {
            for ($j = 0; $j < $diferencia; $j++) {

                if ($j == 0) {
                    echo '<br>Viernes ' . $HoraInicio;
                }
                if ($j >= 1) {
                    $ResEntreHora = $entreHora2 * $j;
                    $nuevaHora = date("H:i", strtotime($HoraInicio) + $ResEntreHora);
                    echo '<br>Viernes ' . $nuevaHora;
                }
            }
        }
        if ($dias[$i] == 6) {
            for ($j = 0; $j < $diferencia; $j++) {

                if ($j == 0) {
                    echo '<br>Sabado ' . $HoraInicio;
                }
                if ($j >= 1) {
                    $ResEntreHora = $entreHora2 * $j;
                    $nuevaHora = date("H:i", strtotime($HoraInicio) + $ResEntreHora);
                    echo '<br>Sabado ' . $nuevaHora;
                }
            }
        }
        if ($dias[$i] == 7) {
            for ($j = 0; $j < $diferencia; $j++) {

                if ($j == 0) {
                    echo '<br>Domingo ' . $HoraInicio;
                }
                if ($j >= 1) {
                    $ResEntreHora = $entreHora2 * $j;
                    $nuevaHora = date("H:i", strtotime($HoraInicio) + $ResEntreHora);
                    echo '<br>Domingo ' . $nuevaHora;
                }
            }
        }
    } */

    ?>


</body>

</html>