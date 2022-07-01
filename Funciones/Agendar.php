<!DOCTYPE html lang="es">

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "todocarwash2") or
        die("Problemas con la conexion");

    mysqli_query($conexion, "insert into agendamiento(rutCLIENTE,nomCLIENTE,apellCLIENTE,dirCLIENTE,numCLIENTE,emailCLIENTE,HORAS_idHORAS, SERVICIO_idSERVICIO, EMPRESA_idEmpresa) values 
        ('$_REQUEST[rutCLIENTE]','$_REQUEST[nomCLIENTE]','$_REQUEST[apellCLIENTE]','$_REQUEST[dirCLIENTE]','$_REQUEST[numCLIENTE]','$_REQUEST[emailCLIENTE]','$_REQUEST[cbx_horas]','$_REQUEST[cbx_servicios]',
        '$_REQUEST[idEmpresa]')")

        or die("Problemas en la consulta" . mysqli_error($conexion));


    mysqli_query($conexion, "UPDATE horas SET disponible='no' WHERE idHoras='$_REQUEST[cbx_horas]'");

    mysqli_close($conexion);

    echo "su hora fue agendada exitosamente";

    header("location:/todocarwash/Index.php");
    ?>
    
    <?php

    ?>



</body>





</html>