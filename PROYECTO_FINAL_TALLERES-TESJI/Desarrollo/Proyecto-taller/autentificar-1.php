<?php
    include('conexion/conexion.php');
    $datosP= $_POST['cmbpersonal'];
    session_start();
    $_SESSION['idRol']= $datosP;

    if( $_SESSION['idRol'] == 2|| $_SESSION['idRol'] == 4 ){
      header("Location:index.php");
    }else{
      header("Location:login.html");


      
    }
?>
