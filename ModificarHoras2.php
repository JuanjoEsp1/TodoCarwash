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

    <title>Modificar Perfil</title>
</head>

<body>


    <div align="center">
        <hr>
        <h3>Actualizacion de Datos Perfil</h3>
        <hr>
        <div class="row">
            <div class="col-md-6 offset-3">
                <?php
                if ($_GET['success']) {
                    if ($_GET['success'] == 'userUpdated') {
                ?>
                        <small class="alert alert-success"> Perfil Actualizado Correctamente!</small>
                        <hr>
                <?php
                    }
                }
                ?>

                <form action="../TodoCarwash/Funciones/HorasUpdateFunc.php" method="POST" enctype="multipart/form-data">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th>DISPONIBLE</th>

                        </tr>
                        <?php

                        $sql = "SELECT * FROM horas WHERE EMPRESA_idEmpresa ='$idEmpresa'";

                        $gotResuslts = mysqli_query($conexion, $sql);

                        if ($gotResuslts) {
                            if (mysqli_num_rows($gotResuslts) > 0) {
                                while ($row = mysqli_fetch_array($gotResuslts)) {
                                    //print_r($row['nombre_empresa']);
                                    echo '
                                <tr>
                                    
                                    <td>' . $row['fecha'] . '</td>
                                    <td>' . $row['hora'] . '</td>	
                                    <td>' ?> <input type="text" name="id" class="form-control" value="<?php echo $row['idHORAS']; ?>" readonly hidden><?php '</td>
                                    <td>' ?> Disponibilidad: (si / no) <input type="text" name="disponible" class="form-control" value="<?php echo $row['disponibilidad']; ?>"><?php
                                                                                                                                                                                '</td>	
                                </tr>
                                ';
                                                                                                                                                                                ?>
                                    <!--<div class="form-group">
                                    <input type="text" name="fecha" class="form-control" value="<?php echo $row['fecha']; ?>" readonly>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" name="hora" class="form-control" value="<?php echo $row['hora']; ?>" readonly>
                                </div>
                                <br>
                                <div class="form-group">Disponibilidad: (si / no)
                                    <input type="text" name="disponible" class="form-control" value="<?php echo $row['disponibilidad']; ?>">
                                </div>
                                <br>
                                -->
                        <?php


                                }
                            }
                        }

                        ?>
                        <div class="form-group">
                            <input type="submit" name="actualizar" class="btn btn-info" value="Actualizar Datos">
                        </div>
                </form>

                <a type="button" name="Volver" class="btn btn-primary" href="Perfil.php">Volver al Perfil</a>
            </div>

        </div>


    </div>
</body>

</html>