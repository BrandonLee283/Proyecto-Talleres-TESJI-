<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Usuarios TESJI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css " rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<form class="form-signin" method="post" action="autentificar-1.php">
  <img class="mb-4" src="images/Logo_tesji.ico" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Bienvenido</h1>
  <hr>
  <h3 class="h3 mb-3 font-weight-normal">¿Quien nos visita?</h3>

  <label for="text" class="sr-only">Num. de Control</label>
  <div class="col-sm-12">
    <select id="subject" name="cmbpersonal" class="form-group form-control">
      <option value="" selected disabled>Seleccione</option>
      <?php
                    require("conexion/conexion.php");
                    $Consulta= "SELECT rol.ID_ROL,rol.NOMBRE_ROL FROM rol";
                    $Resultado = mysqli_query($conec, $Consulta);

                    while ($personal = mysqli_fetch_array($Resultado)) {
                      echo ("<option value='" . $personal[0] . "'>" . $personal[1] . "</option>");
                    }
                    ?>
    </select>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">ENTRAR</button>
</form>   
</body>
</html>
