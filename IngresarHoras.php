<!DOCTYPE html lang="es">

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>

    <?php

    $conexion = mysqli_connect("localhost", "root", "", "todocarwash2");

    if (isset($_POST['guardar_horas'])) {
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

        foreach ($fecha as $index => $fechas) {
            $s_fecha = $fechas;
            $s_hora = $hora[$index];

            $query = "INSERT INTO horas (disponibilidad,EMPRESA_idEmpresa,fecha,hora) VALUES ('$_REQUEST[disponibilidad]','$_REQUEST[idEmpresa]','$s_fecha','$s_hora')";
            $query_run = mysqli_query($conexion, $query);
        }

        if ($query_run) {
            $_SESSION['status'] = "Datos insertados correctamente!";
            header("Location: Perfil.php");
            exit(5);
        } else {
            $_SESSION['status'] = "Datos no agregados!";
            header("Location: Perfil.php");
            exit(5);
        }
    }
    ?>


</body>





</html>