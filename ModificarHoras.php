<?php include("Funciones/db.php");
session_start();
error_reporting(0);
$varsesion = $_SESSION['correo_empresa'];

if ($varsesion == null || $varsesion = '') {
    echo 'Usted no tiene autorizacion';
    die();
}
$correo = $_SESSION['correo_empresa'];


$sql = "SELECT * From empresa WHERE correo_empresa = '$correo'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

$idEmpresa = $row['idEmpresa'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Modificar Horas y Servicios</title>
</head>

<body>


    <div align="center">
        <hr>
        <h3>Actualizacion de Horas y Servicios</h3>
        <hr>
        <div class="row">
            <div class="col-md-6 offset-3">

                <article class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>DISPONIBLE</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th>ACCIONES</th>
                        </tr>
                        <?php
                        $sql = mysqli_query($conexion, "SELECT * FROM horas WHERE EMPRESA_idEmpresa ='$idEmpresa'");
                        if (mysqli_num_rows($sql) == 0) {
                            echo '<tr><td colspan="8">No hay datos.</td></tr>';
                        } else {
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
						<tr>
                            <td>' . $row['idHORAS'] . '</td>
                            <td>' . $row['disponible'] . '</td>
                            <td>' . $row['fecha'] . '</td>
							<td>' . $row['hora'] . '</td>
                            <td>

								<a href="EditarHoras.php?nik=' . $row['idHORAS'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							</td>			
						</tr>
						';
                            }
                        }
                        ?>
                    </table>
                </article>


                <a type="button" name="Volver" class="btn btn-primary" href="Perfil.php">Volver al Perfil</a>


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>

</html>