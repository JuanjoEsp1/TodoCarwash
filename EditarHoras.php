<?php
include("Funciones/db.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Datos de empleados</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            .content {
                margin-top: 80px;
            }
        </style>

    </head>
    <body>
        <section class="container">
            <article class="content">
                <h2>Datos de la hora &raquo; Editar datos</h2>
                <hr />

                <?php
                
                $nik = mysqli_real_escape_string($conexion, (strip_tags($_GET["nik"], ENT_QUOTES)));
                $sql = mysqli_query($conexion, "SELECT * FROM horas WHERE idHORAS='$nik'");
                if (mysqli_num_rows($sql) == 0) {
                    header("Location: perfil.php");
                } else {
                    $row = mysqli_fetch_assoc($sql);
                }
                if (isset($_POST['save'])) {
                    $codigo = mysqli_real_escape_string($conexion, (strip_tags($_POST["codigo"], ENT_QUOTES))); 
                    $fecha = mysqli_real_escape_string($conexion, (strip_tags($_POST["fecha"], ENT_QUOTES))); 
                    $hora = mysqli_real_escape_string($conexion, (strip_tags($_POST["hora"], ENT_QUOTES))); 
                    $disponibilidad = mysqli_real_escape_string($conexion, (strip_tags($_POST["disponibilidad"], ENT_QUOTES))); 

                    $update = mysqli_query($conexion, "UPDATE horas SET fecha='$fecha', hora='$hora', disponibilidad = '$disponibilidad' WHERE idHORAS='$nik'") 

                    or die('error');

                    if ($update) {
                        header("Location: EditarHoras.php?nik=" . $nik . "&pesan=sukses");
                    } else {
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
                    }
                }

                if (isset($_GET['pesan']) == 'sukses') {
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
                }
                ?>
                <form class="form-horizontal" action="" method="post">
                    <article class="form-group">
                        <label class="col-sm-3 control-label">Código</label>
                        <article class="col-sm-2">
                            <input type="text" name="codigo" value="<?php echo $row ['idHORAS']; ?>" class="form-control" placeholder="NIK" required readonly>
                        </article>
                    </article>
                    <article class="form-group">
                        <label class="col-sm-3 control-label">Fecha</label>
                        <article class="col-sm-4">
                            <input type="date" name="fecha" value="<?php echo $row ['fecha']; ?>" class="form-control" required readonly>
                        </article>
                    </article>
                    <article class="form-group">
                        <label class="col-sm-3 control-label">Hora</label>
                        <article class="col-sm-4">
                            <input type="time" name="hora" value="<?php echo $row ['hora']; ?>" class="form-control" required readonly>
                        </article>
                    </article>

                    <article class="form-group">
                        <label class="col-sm-3 control-label">Disponible</label>
                        <article class="col-sm-4">
                            <input type="text" name="disponibilidad" value="<?php echo $row ['disponibilidad']; ?>" class="form-control" maxlength="2" minlength="2" required> (si / no)
                        </article>
                    </article>
                  
                    <article class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <article class="col-sm-6">
                            <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
                            <a href="ModificarHoras.php" class="btn btn-sm btn-danger">Volver</a>
                        </article>
                    </article>
                </form>
                
            </article>



        </section>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    </body>
</html>