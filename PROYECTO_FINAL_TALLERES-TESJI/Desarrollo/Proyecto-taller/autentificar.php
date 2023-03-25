<?php
    include('conexion/conexion.php');
    $usuario= $_POST['txtMatricula'];
    $contra = $_POST['txtContrasenia'];

    $datos = mysqli_query($conexion, "CALL sp_ver_usuario ('$usuario', '$contra')");

    $datosUser = mysqli_fetch_array($datos);
   

    if($usuario == $datosUser[0] && $contra == $datosUser[1]){
        session_start();
        $_SESSION['rol']=$datosUser[2];
        $_SESSION['nombreRol'] = $datosUser[3];
        header("Location:index.php");

    }else{
        echo "<h3>Verifique que sus datos sean correctos</h3>";
        echo "<h5><a href='login.html'>Regresar</a></h5>";
    }

?>