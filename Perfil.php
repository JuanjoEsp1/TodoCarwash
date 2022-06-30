<?php
include("Funciones/db.php");
session_start();
error_reporting(0);
$varsesion = $_SESSION['correo_empresa'];

if ($varsesion == null || $varsesion = '') {
    echo 'Usted no tiene autorizacion';
    die();
}

$correo = $_SESSION['correo_empresa'];
$idEmpresa = $_SESSION['idEmpresa'];

$sql = "SELECT * From empresa WHERE correo_empresa = '$correo'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

$idEmpresa = $row['idEmpresa'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/Perfil.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Perfil</title>
</head>

<body>
    <nav>
        <ul class="ul-1">
            <li><a class="a-1" href="Cerrar_session.php">Cerrar sesion</a></li>
            <li><a class="a-2" href="ModificarPerfil.php">Modificar datos del Perfil</a></li>
            <li><a class="a-3" href="ModificarHoras.php">Modificar Horas</a></li>
            <li><a class="a-3" href="ModificarServicios.php">Modificar Servicios</a></li>
            <!--<li><a class="a-3" href="ModificarHoras2.php">Modificar Horas 2</a></li> -->
            <li><a class="a-3" href="ModificarDescripcion.php">Modificar Descripcion</a></li>
            <li><a class="a-3" href="Perfil2.php">Registrar Horas</a></li>
        </ul>
    </nav>





    <div class="container">
        <h1>Bienvenido:<?php echo utf8_encode($row['nombre_empresa']); ?></h1>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

            </div>
        </div>
        <div class="card-header">
            <h4>Ingresar Servicios</h4>
        </div>
        <div class="card-body">
            <form action="IngresarServicios.php" method="POST">
                <input type="text" name="idEmpresa" value="<?php echo $row['idEmpresa']; ?>" readonly hidden required>


                <div class="main-form mt-3 border-bottom">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="">Servicios</label>
                                <input type="text" name="servicio[]" class="form-control" required placeholder="Nombre del servicio">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="">Precio</label>
                                <input type="number" name="precio[]" class="form-control" required placeholder="Ingrese precio">

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" name="guardar_servicio" class="btn btn-primary">Guardar Servicio</button>
            </form>

        </div>
        <hr>
        <h1>Horas Agendadas</h1>
        <hr>
        <article class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Id Servicio</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                </tr>
                <?php
                $sql = mysqli_query($conexion, "SELECT * FROM agendamiento 
                INNER JOIN horas ON agendamiento.HORAS_idHORAS = horas.idHORAS 
                INNER JOIN servicio ON agendamiento.SERVICIO_idSERVICIO = servicio.idSERVICIO 
                WHERE agendamiento.EMPRESA_idEmpresa = '$idEmpresa'");

                if (mysqli_num_rows($sql) == 0) {
                    echo '<tr><td colspan="8">No hay datos.</td></tr>';
                } else {
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '
						<tr>
                            <td>' . $row['idAGENDAMIENTO'] . '</td>
                            <td>' . $row['nomCLIENTE'] . ' ' . $row['apellCLIENTE'] . '</td>
                            <td>' . $row['numCLIENTE'] . '</td>
							<td>' . $row['nombre_servicio'] . '</td>
                            <td>' . $row['hora'] . '</td>
                            <td>' . $row['fecha'] . '</td>				
						</tr>
						';
                    }
                }
                ?>
            </table>
        </article>
        <div>
            <hr>

        </div>
    </div>










    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.add-more-form', function() {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                <div class="row">\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Fecha</label>\
                                            <input type="date" name="fecha[]" class="form-control" required placeholder="Ingrese Fecha">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <label for="">Hora</label>\
                                            <input type="time" name="hora[]" class="form-control" required placeholder="Ingrese Hora">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn btn btn-danger">Eliminar</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });

        });
    </script>






</body>

</html>