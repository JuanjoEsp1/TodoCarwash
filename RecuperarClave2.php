<?php
include("Funciones/db.php");

$correo= $_POST['correo_empresa'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="../TodoCarwash/Funciones/RecuperarClaveFunc.php" method="POST" enctype="multipart/form-data">
        <?php

        $sql = "SELECT * FROM empresa WHERE correo_empresa ='$correo'";

        $gotResuslts = mysqli_query($conexion, $sql);

        if ($gotResuslts) {
            if (mysqli_num_rows($gotResuslts) > 0) {
                while ($row = mysqli_fetch_array($gotResuslts)) {
        ?>
                    <div class="form-group">
                        </div>
                        <input type="email" name="correo_empresa" class="form-control" value="<?php echo $correo ?>" readonly>
                    <div class="form-group">
                        <input type="password" name="contrasenaEmpresa" class="form-control" value="">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" name="actualizar" class="btn btn-info" value="Actualizar Contrasena">
                    </div>
        <?php
                }
            }
        }

        ?>

    </form>
</body>

</html>