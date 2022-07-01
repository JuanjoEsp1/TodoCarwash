<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);

if (isset($_POST['actualizar'])) {

    include('../Funciones/db.php');

    $NuevaDispo =    $_POST['disponible'];
    $id =    $_POST['id'];

    if (!empty($NuevaDispo)) {


        $loggedInUser = $_SESSION['idEmpresa'];

        $sql = "UPDATE horas SET disponible = '$NuevaDispo' WHERE idHORAS ='$id'";

        $results = mysqli_query($conexion, $sql);

        header('Location:../ModificarHoras2.php?success=userUpdated');
        exit;
        



        
    } else {
        header('Location:/todocarwash/ModificarHoras2.php?error=emptyNameAndEmail');
        exit;
    }
}
?>