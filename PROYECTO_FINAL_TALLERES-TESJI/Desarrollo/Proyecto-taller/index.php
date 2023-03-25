<?php
  session_start();
  if(isset($_SESSION['idRol'])){
    if($_SESSION['idRol'] == 1|| $_SESSION['idRol'] == 2 || $_SESSION['idRol'] == 3|| $_SESSION['idRol'] == 4 ){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Meta Tag -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- SEO -->
  <meta name="description" content="150 words">
  <meta name="author" content="uipasta">
  <meta name="url" content="http://www.yourdomainname.com">
  <meta name="copyright" content="company name">
  <meta name="robots" content="index,follow">


  <title>Tecnologico de Estudios Superiores de Jilotepec</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/Logo_tesji.ico">
  <link rel="Logo_tesji.png" sizes="144x144" type="image/x-icon" href="images/Logo_tesji.png">

  <!-- All CSS Plugins -->
  <link rel="stylesheet" type="text/css" href="css/plugin.css">

  <!-- Main CSS Stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- Google Web Fonts  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">


  <!-- HTML5 shiv and Respond.js support IE8 or Older for HTML5 elements and media queries -->
  <!--[if lt IE 9]>
	   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
  <?php
  require('Conexion/conexion.php')
  ?>
  <!-- Preloader Start 
  <div class="preloader">
    <p>Loading...</p>
  </div>
   Menu Section Start -->
  <header id="home">
    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <div class="col-md-1 col-sm-1">
            <div class="me-image">
              <img src="images/Logo_tesji.png" alt="">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="logo">
              <a href="index-2.html"> TESJI</a>
            </div>
          </div>

          <div class="col-sm-9">
            <div class="navigation-menu">
              <div class="navbar">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a class="smoth-scroll" href="#home">inicio <div class="ripple-wrapper"></div></a>
                    </li>
                    <li><a class="smoth-scroll" href="#about">Sobre Nosotros</a>
                    </li>
                    <?php
                      if($_SESSION['idRol'] == 3){ 
                    ?>
                    <li><a class="smoth-scroll" href="#testimonials">Actualizar/Eliminar</a>
                    </li>
                    <?php
                      }
                    ?>
                    <li><a class="smoth-scroll" href="#services">Talleres Disponibles</a>
                    </li>
                    <?php
                      if($_SESSION['idRol'] == 1){ 
                    ?>
                    <li><a class="smoth-scroll" href="#contact">Registrarse</a>
                    </li>
                    <?php
                      }
                    ?>
                    <li><a href="cerrar-sesion.php">Cerrar sesion</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Menu Section End -->
  <br>

  <!-- Home Section Start -->
  <section class="home-section">
    <div class="container">
      <section class="statistics-section section-space-padding bg-cover text-center">
        <div class="row">
          <div class="col-sm-offset-1 col-md-20 col-sm-5 margin-left-setting ">
            <div class="margin-top-10">
            <form action="pdf.php" method="post">
              <div class="table-responsive">
                <table class="table">
                  <?php
                  require("Conexion/conexion.php");
                  @$matri = $_POST["numMatricula"];
                  $sql = "CALL sp_ver_alumno('$matri')";
                  //Ejecutamos la consulta
                  $query = mysqli_query($conec, $sql);
                  while ($row = mysqli_fetch_assoc($query)) {
                  ?>
                    <tr>
                      <td>Numero de Control</td>
                      <td> 
                        <?php
                        echo $row['NUMERO_CONTROL_ALUMNO'];
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Name</td>
                      <td><?php echo $row['NOMBRE_ALUMNO']; ?></td>
                    </tr>
                    <tr>
                      <td>Apellido Paterno</td>
                      <td><?php echo $row['APELLIDOP_ALUMNO']; ?></td>
                    </tr>
                    <tr>
                      <td>Apellido Materno</td>
                      <td><?php echo $row['APELLIDOM_ALUMNO']; ?></td>
                    </tr>
                    <tr>
                      <td>Telefono</td>
                      <td><?php echo $row['TELEFONO_ALUMNO']; ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?php echo $row['EMAIL_ALUMNO']; ?></td>
                    </tr>
                    <tr>
                      <td>Carrera</td>
                      <td><?php echo $row['NOMBRE_CARRERA']; ?></td>
                    </tr>
                    <tr>
                      <td>Taller</td>
                      <td><?php echo $row['NOMBRE_TALLER']; ?></td>
                    </tr>
                    <tr>
                      <td>
                        <a href='editar.php?numControl=<?php echo $row['NUMERO_CONTROL_ALUMNO']; ?>'><i class="fa fa-pencil-square-o" title="Editar"></i>Actualizar</a>
                      </td>
                      <td>
                        <a href='eliminar.php?numControl=<?php echo $row['NUMERO_CONTROL_ALUMNO']; ?>'><i class="fa fa-window-close" title="Eliminar"></i> Eliminar</a>
                      </td>
                      
                      <a href='pdf.php?clave=<?php echo $row['NUMERO_CONTROL_ALUMNO'];?>'  class="button button-style button-style-dark button-style-color-2">Imprimir</a>
                      <br><br>

                    <?php } ?>
                    </tr>

                </table>
              </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
  <!-- Home Section End -->




  <!-- Experience Start -->
  <section class="section-space-padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="section-title">
            <h2>Actividades De Formación Integral</h2>
            <div class="divider dark">
              <i class="icon-graduation"></i>
            </div>
            <p>El Tecnológico de Estudios Superiores de Jilotepec reconoce la importancia de promover actividades culturales,
              recreativas y deportivas para lograr que los estudiantes cuenten con elementos para un pleno desarrollo físico y mental,
              por lo que se han implementado talleres tales como: Fútbol Soccer, Guitarra, Danza Moderna y Contemporánea, Fotografía,
              Voleibol, Dibujo y Basquetbol.</p>
            <h2 class="Horarios">Horarios</h2>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6 col-sm-6">
          <div class="experience">

            <div class="experience-item">
              <div class="experience-circle">
              <i class="fas fa-basketball-ball fa-spin" style="color:white"></i>
              </div>
              <div class="experience-content ">
                <h4>BasquetBall</h4>
                <h6>
                  <?php
                  require("conexion/conexion.php");
                  //preparamos la consulta
                  $Consultainfo = "SELECT
                 taller.NOMBRE_TALLER, 
                 taller.DESCRIPCION_TALLER, 
                 horarios.TURNO_HORARIO, 
                 horarios.DESCRIPCION_HORARIOS
               FROM
                 taller
                 INNER JOIN
                 horarios
                 ON 
                   taller.CLAVE_HORARIO = horarios.CLAVE_HORARIO
                   WHERE  taller.NOMBRE_TALLER= 'Basquetball' ";
                  //Ejecutamos la consulta
                  $Resultado = mysqli_query($conec, $Consultainfo);

                  //Estraer datos de consulta

                  while ($info = mysqli_fetch_array($Resultado)) {
                    echo ($info[1] . "<br>" . "<br>");
                    echo ($info[2] . "<br>" . "<br>");
                    echo ($info[3] . "<br>" . "<br>");
                  }
                  ?>
                  <h6>
              </div>
            </div>

            <div class="experience-item">
              <div class="experience-circle">
              <p><i class="fa fa-futbol-o fa-spin" style="color:white"></i></p> 
              </div>
              <div class="experience-content ">
                <h4>Futbol</h4>
                <h6>
                  <?php
                  require("conexion/conexion.php");
                  //preparamos la consulta
                  $Consultainfo = "SELECT
                 taller.NOMBRE_TALLER, 
                 taller.DESCRIPCION_TALLER, 
                 horarios.TURNO_HORARIO, 
                 horarios.DESCRIPCION_HORARIOS
               FROM
                 taller
                 INNER JOIN
                 horarios
                 ON 
                   taller.CLAVE_HORARIO = horarios.CLAVE_HORARIO
                   WHERE  taller.NOMBRE_TALLER= 'Futbol' ";
                  //Ejecutamos la consulta
                  $Resultado = mysqli_query($conec, $Consultainfo);

                  //Estraer datos de consulta

                  while ($info = mysqli_fetch_array($Resultado)) {
                    echo ($info[1] . "<br>" . "<br>");
                    echo ($info[2] . "<br>" . "<br>");
                    echo ($info[3] . "<br>" . "<br>");
                  }
                  ?>
                  <h6>
              </div>
            </div>

            <div class="experience-item">
              <div class="experience-circle">
              <p><i class="fa fa-dribbble fa-spin" style="color:white"></i></p>
              </div>
              <div class="experience-content ">
                <h4>Voleibol</h4>
                <h6>
                  <?php
                  require("conexion/conexion.php");
                  //preparamos la consulta
                  $Consultainfo = "SELECT
                 taller.NOMBRE_TALLER, 
                 taller.DESCRIPCION_TALLER, 
                 horarios.TURNO_HORARIO, 
                 horarios.DESCRIPCION_HORARIOS
               FROM
                 taller
                 INNER JOIN
                 horarios
                 ON 
                   taller.CLAVE_HORARIO = horarios.CLAVE_HORARIO
                   WHERE  taller.NOMBRE_TALLER= 'Voleibol' ";
                  //Ejecutamos la consulta
                  $Resultado = mysqli_query($conec, $Consultainfo);

                  //Estraer datos de consulta

                  while ($info = mysqli_fetch_array($Resultado)) {
                    echo ($info[1] . "<br>" . "<br>");
                    echo ($info[2] . "<br>" . "<br>");
                    echo ($info[3] . "<br>" . "<br>");
                    
                  }
                  ?>
                  <h6>
              </div>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="experience">

            <div class="experience-item">
              <div class="experience-circle experience-company">
              <p><i class="fa fa-female fa-spin" style="color:white"></i></p>
              </div>
              <div class="experience-content">
                <h4>Danza</h4>
                <h6>
                  <?php
                  require("conexion/conexion.php");
                  //preparamos la consulta
                  $Consultainfo = "SELECT
                 taller.NOMBRE_TALLER, 
                 taller.DESCRIPCION_TALLER, 
                 horarios.TURNO_HORARIO, 
                 horarios.DESCRIPCION_HORARIOS
               FROM
                 taller
                 INNER JOIN
                 horarios
                 ON 
                   taller.CLAVE_HORARIO = horarios.CLAVE_HORARIO
                   WHERE  taller.NOMBRE_TALLER= 'Danza' ";
                  //Ejecutamos la consulta
                  $Resultado = mysqli_query($conec, $Consultainfo);

                  //Estraer datos de consulta

                  while ($info = mysqli_fetch_array($Resultado)) {
                    echo ($info[1] . "<br>" . "<br>");
                    echo ($info[2] . "<br>" . "<br>");
                    echo ($info[3] . "<br>" . "<br>");
                  }
                  ?>
                  <h6>
              </div>
            </div>

            <div class="experience-item">
              <div class="experience-circle experience-company">
              <p><i class="fas fa-hand-rock fa-spin" style="color:white"></i></p>
              </div>
              <div class="experience-content">
                <h4>Taekwondo</h4>
                <h6>
                  <?php
                  require("conexion/conexion.php");
                  //preparamos la consulta
                  $Consultainfo = "SELECT
                 taller.NOMBRE_TALLER, 
                 taller.DESCRIPCION_TALLER, 
                 horarios.TURNO_HORARIO, 
                 horarios.DESCRIPCION_HORARIOS
               FROM
                 taller
                 INNER JOIN
                 horarios
                 ON 
                   taller.CLAVE_HORARIO = horarios.CLAVE_HORARIO
                   WHERE  taller.NOMBRE_TALLER= 'Taekwondo' ";
                  //Ejecutamos la consulta
                  $Resultado = mysqli_query($conec, $Consultainfo);

                  //Estraer datos de consulta

                  while ($info = mysqli_fetch_array($Resultado)) {
                    echo ($info[1] . "<br>" . "<br>");
                    echo ($info[2] . "<br>" . "<br>");
                    echo ($info[3] . "<br>" . "<br>");
                  }
                  ?>
                  <h6>
              </div>
            </div>

            <div class="experience-item">
              <div class="experience-circle experience-company ">
              <p><i class="fas fa-chess-knight fa-spin" style="color:white"></i></p>
              </div>
              <div class="experience-content">
                <h4>Ajedrez</h4>
                <h6>
                  <?php
                  require("conexion/conexion.php");
                  //preparamos la consulta
                  $Consultainfo = "SELECT
                 taller.NOMBRE_TALLER, 
                 taller.DESCRIPCION_TALLER, 
                 horarios.TURNO_HORARIO, 
                 horarios.DESCRIPCION_HORARIOS
               FROM
                 taller
                 INNER JOIN
                 horarios
                 ON 
                   taller.CLAVE_HORARIO = horarios.CLAVE_HORARIO
                   WHERE  taller.NOMBRE_TALLER= 'Ajedrez' ";
                  //Ejecutamos la consulta
                  $Resultado = mysqli_query($conec, $Consultainfo);

                  //Estraer datos de consulta

                  while ($info = mysqli_fetch_array($Resultado)) {
                    echo ($info[1] . "<br>" . "<br>");
                    echo ($info[2] . "<br>" . "<br>");
                    echo ($info[3] . "<br>" . "<br>");
                  }
                  ?>
                  <h6>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Experience End -->


  <!-- About Start -->
  <section id="about" class="about section-space-padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="section-title">
            <h2>Sobre Nostros</h2>
            <div class="divider dark">
              <i class="icon-emotsmile"></i>
            </div>
            <ul class=" about-me-text col-md-4">
              <li>Gobierno del Estado de México Tecnológico de Estudios Superiores de Jilotepec</li>
              <li>Carretera Jilotepec a Chapa de Mota km. 6.5, Ejido de Jilotepec, C.P. 54240, Jilotepec de Molina Enríquez</li>
              <li>Tel: 5586015264</li>
              <li>tesji.direccion@gmail.com</li>
              <li>dir_dejilotepec@tecnm.mx</li>

            </ul>
            <div class="col-md-6">

              <div class="about-me-text" style="padding-left:50px;">

                <ul class="social-icon">
                <li><a href="https://www.facebook.com/Tecnol%C3%B3gico-de-Estudios-Superiores-de-Jilotepec-200808756602550/?rf=148134381863945" target="_blank" class="facebook"><i class="icon-social-facebook"></i></a></li>
                <li><a href="https://twitter.com/tesji_oficial?lang=es" target="_blank" class="twitter"><i class="icon-social-twitter"></i></a></li>
                <li><a href="http://tesji.edomex.gob.mx/" target="_blank" class="google-plus"><i class="icon-social-google"></i></a></li>
                </ul>

              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">



      </div>
    </div>
  </section>

  <!-- Skills Modal Start -->
  <div class="modal fade padding-top-70" id="skillmodal" role="dialog">
    <div class="modal-dialog">


      <div class="modal-content pattern-bg">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="section-title margin-top-30">
                <button type="button" class="btn pull-right" data-dismiss="modal"><i class="fa fa-close"></i></button>
                <h2>My Skills.</h2>
                <div class="divider dark">
                  <i class="icon-energy"></i>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-offset-2 col-xs-offset-0 col-md-8 col-sm-8">

              <div class="my-skill margin-bottom-50">
                <strong>Graphic Design</strong>
                <span class="pull-right">80%</span>
                <div class="progress">
                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                  </div>
                </div>

                <strong>Website Design</strong>
                <span class="pull-right">99%</span>
                <div class="progress">
                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 99%;">
                  </div>
                </div>

                <strong>HTML5/CSS3</strong>
                <span class="pull-right">85%</span>
                <div class="progress">
                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                  </div>
                </div>

                <strong>Javascript</strong>
                <span class="pull-right">90%</span>
                <div class="progress">
                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Skills Modal End -->



  <!-- Subscribe Modal Start -->
  <div class="modal fade subscribe padding-top-120" id="subscribemodal" role="dialog">
    <div class="modal-dialog">


      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="section-title margin-top-30">
                <button type="button" class="btn pull-right" data-dismiss="modal"><i class="fa fa-close"></i></button>
                <h2>Subscribe.</h2>
                <div class="divider dark">
                  <i class="icon-envelope-letter"></i>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-offset-2 col-xs-offset-0 col-md-8 col-sm-8">

              <div class="margin-bottom-50">
                <form id="mc-form" method="post" action="http://uipasta.us14.list-manage.com/subscribe/post?u=854825d502cdc101233c08a21&amp;id=86e84d44b7">

                  <div class="subscribe-form">
                    <input id="mc-email" type="email" placeholder="Email Address" class="text-input">
                    <button class="submit-btn" type="submit">Submit</button>
                  </div>
                  <label for="mc-email" class="mc-label"></label>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Subscribe Modal End -->
  <!-- About End -->
  <?php
    if($_SESSION['idRol'] == 3){ 
  ?>
  <!-- Testimonial Start -->
  <section id="testimonials" class="testimonial-section section-space-padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="section-title">
            <h2>Actualizar/Eliminar</h2>
            <div class="divider dark">
              <i class="icon-speech"></i>
            </div>
            <p>Si se desea editar o eliminar aqui lo puedes solucionar</p>
          </div>
        </div>
      </div>

      <form action="index.php " method="POST">
        <label>Introduce tu numero de Matricula</label>
        <input type="text" name="numMatricula" placeholder="Numero de Matricula"></input>
        <button class="btn btn-primary" type="submit">BUSCAR</button>
      </form>
    </div>
  </section>
  <?php
    }
  ?>
  <!-- Testimonial End -->

  <section class="home-section">
    <div class="container">
      <div class="row">

        <div class="table-responsive">
          <table class="table table-hover" name="table_alum">

            <tbody id="datos">

          </table>
          <br>
          <hr>
  </section>

  <!-- Services Start -->
  <section id="services" class="services-section section-space-padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="section-title">
            <h2>TALLERES DISPONIBLES.</h2>
            <div class="divider dark">
              <i class="icon-drop"></i>
            </div>

          </div>
        </div>
      </div>

      <div class="row margin-top-30">

        <div class="col-md-4 col-sm-6">
          <div class="services-detail">
          <p><i class="fas fa-basketball-ball fa-spin" style="color:orangered"></i></p>
            <h3>BASKETBALL</h3>
            <hr>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="services-detail">
          <p><i class="fa fa-futbol-o fa-spin" style="color:black"></i></p>
            <h3>FUTBOL</h3>
            <hr>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="services-detail">
          <p><i class="fa fa-dribbble fa-spin" style="color:darkcyan"></i></p>
            <h3>Voleibol</h3>
            <hr>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="services-detail">
          <p><i class="fa fa-female fa-spin" style="color:fuchsia"></i></p>
            <h3>DANZA</h3>
            <hr>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="services-detail">
          <p><i class="fas fa-hand-rock fa-spin" style="color:red"></i></p>
            <h3>Taekwondo</h3>
            <hr>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="services-detail">
          <p><i class="fas fa-chess-knight fa-spin" style="color:black"></i></p>
            <h3>AJEDREZ</h3>
            <hr>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Services End -->



  <!-- Call to Action Start -->
  <section class="call-to-action bg-cover section-space-padding text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h2>¿Estas Interesado en Algun Taller?</h2>
        </div>

        <div class="col-md-4">
          <div class="text-center">
            <a class="button button-style button-style-color-2 smoth-scroll" href="login.html">Registrarse</a>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Call to Action End -->



  <?php
    if($_SESSION['idRol'] == 1){ 
  ?>
  <!-- Contact Start -->
  <section id="contact" class="section-space-padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="section-title">
            <h2>Registrarse</h2>
            <div class="divider dark">
              <i class="icon-envelope-open"></i>
            </div>

          </div>
        </div>
      </div>


      <div class="margin-top-30 margin-bottom-50">
        <div class="row">

          <div class="col-md-offset-3 col-sm-offset-2 col-md-6 col-sm-8">

            <div class="row">
              <div class="contact-us-detail"><a href="mailto:name@domain.com">telleresTesji@gmail.com</a></div>
              <form method="POST" action="index.php" class="contact-us pattern-bg">

                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="name" name="numeroControl" class="form-control" placeholder="Numero de Control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="email" name="nombre" class="form-control" placeholder="Nombre">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="website" name="apePa" class="form-control" placeholder="Apellido Paterno">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="address" name="apeMa" class="form-control" placeholder="Apellido Materno">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="address" name="telefono" class="form-control" placeholder="Telefono">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" id="address" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>
                <div class="col-sm-12">
                  <select id="subject" name="carrera" class="form-group form-control">
                    <option value="" selected disabled>Seleccione tu carrera</option>
                    <?php
                    require("conexion/conexion.php");
                    //preparamos la consulta
                    $Consultacarrera = "SELECT ID_CARRERA,NOMBRE_CARRERA FROM carrera";
                    //Ejecutamos la consulta
                    $Resultado = mysqli_query($conec, $Consultacarrera);

                    //Estraer datos de consulta

                    while ($carrera = mysqli_fetch_array($Resultado)) {
                      echo ("<option value='" . $carrera[0] . "'>" . $carrera[1] . "</option>");
                    }
                    ?>
                  </select>
                </div>

                <div class="col-sm-12">
                  <select id="subject" name="taller" class="form-group form-control">
                    <option value="" selected disabled>Seleccione un Taller</option>
                    <?php
                    require("conexion/conexion.php");
                    //preparamos la consulta
                    $Consultataller = "SELECT ID_TALLER, NOMBRE_TALLER FROM taller";
                    //Ejecutamos la consulta
                    $Resultado = mysqli_query($conec, $Consultataller);

                    //Estraer datos de consulta

                    while ($taller = mysqli_fetch_array($Resultado)) {
                      echo ("<option value='" . $taller[0] . "'>" . $taller[1] . "</option>");
                    }
                    ?>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="button button-style button-style-dark button-style-color-2">Regristrarse</button>
                </div>

                <?php
              
                  @$matricula = $_POST["numeroControl"];
                  @$nombre = $_POST["nombre"];
                  @$apePa = $_POST["apePa"];
                  @$apeMa = $_POST["apeMa"];
                  @$telefono = $_POST["telefono"];
                  @$email = $_POST["email"];
                  @$carrera = $_POST["carrera"];
                  @$taller = $_POST["taller"];
                  require("conexion/conexion.php");

                  //Hacer sentencia
                  $SQL = "Call sp_insertar_alumno('$matricula','$nombre','$apePa'

                              ,'$apeMa','$telefono','$email','$carrera','$taller')";

                  //Ejecutar sentencia
                  $Ejecutar = mysqli_query($conec, $SQL);
              
                ?>
              </form>

            </div>
          </div>
        </div>


      </div>
    </div>
  </section>
  <!-- Contact End -->
  <?php
    }
  ?>
  <h2>  Asistente Virtual</h2>
  <div class="bot">
    <iframe src="https://webbot.me/12a5647c30e0aa6206ff64105f225ad2d2e297ddab00d22eec457afc9fb0634d" 
      width="100%" height="450" style="border:0;">
    </iframe>
  </div>
<br>
  <h2>¿Cómo llegar?</h2>
  <div class="mapa">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3751.1911419805633!
                            2d-99.58326848561047!3d19.916348530195762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!
                            4f13.1!3m3!1m2!1s0x85d2485a8ff0293f%3A0x7d5b3039aa655255!2sTecnol%C3%B3gico
                            %20de%20Estudios%20Superiores%20de%20Jilotepec!5e0!3m2!1ses-419!2smx!4v16556
                            45735144!5m2!1ses-419!2smx" width="100%" height="550" style="border:0;" 
                            llowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">                        
  </iframe>
  </div>


  <!-- Footer Start -->
  <footer class="footer-section">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <ul class="social-icon margin-bottom-30">
            <li><a href="https://www.facebook.com/Tecnol%C3%B3gico-de-Estudios-Superiores-de-Jilotepec-200808756602550/?rf=148134381863945" target="_blank" class="facebook"><i class="icon-social-facebook"></i></a></li>
            <li><a href="https://twitter.com/tesji_oficial?lang=es" target="_blank" class="twitter"><i class="icon-social-twitter"></i></a></li>
            <li><a href="http://tesji.edomex.gob.mx/" target="_blank" class="google-plus"><i class="icon-social-google"></i></a></li>
            
          </ul>
        </div>



      </div>
    </div>
  </footer>
  <!-- Footer End -->


  <!-- Back to Top Start -->
  <a href="#" class="scroll-to-top"><i class="icon-arrow-up-circle"></i></a>
  <!-- Back to Top End -->


  <!-- All Javascript Plugins  -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/plugin.js"></script>

  <!-- Main Javascript File  -->
  <script type="text/javascript" src="js/scripts.js"></script>


</body>

</html>
<?php 
    }else{
      echo "<h4>No tienes los permisos para Ingresar</h4>";   
    }
  }else{
    header("Location:inicio.php");
  }
?>