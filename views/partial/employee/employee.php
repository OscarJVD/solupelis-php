<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" lang="es" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="Author" lang="es" content="Óscar Javier Vargas Diaz, oscarjaviervargas@hotmail.com"> 
  <meta name="DC.identifier" lang="es" content=""><!--Aqui va la pagina SOLUMOBIL.............................-->
  <META http-equiv="Expires" lang="es" content="0"><!--ESTA NOSE PARA QUE ES.-->
  <meta name="Keywords" lang="es" content="Engativa,Colombia, Bogota,
  app películas, administración de películas, proyecto de software, aplicación para poder vender películas">
  <META http-equiv="PICS-Label" content='
  (PICS-1.1 "http://www.gcf.org/v2.5"
  labels on "1994.11.05T08:15-0500"
  until "1995.12.31T23:59-0000"
  for "http://w3.org/PICS/Overview.html"
  ratings (suds 0.5 density 0 color/hue 1)) 
  '>
  <META name="copyright" content="&copy; 2020 Solupelís Company.">
  <meta name="Description" lang="es" content="Software de administracíon de películas y alquileres de las mismas
  ">
  <META name="date" content="19:05:09, sábado 29, febrero 2020 -05">
  <meta name="generator" content="HTML-KIT 2.9"/>
  <meta name="language" content="es"/>
  <meta name="revisit-after" content="1 month"/>
  <meta name="robots" content="index, follow"/>
  <meta name="application-name" content="Solupelís" />
  <meta name="encoding" charset="utf-8" />
  <meta http-equiv="refresh" content="300" />
  <meta http-equiv=»X-UA-Compatible». />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
  <meta name="organization" content="Solupelís Company" />
  <meta name="revisit" content="7" />

  <!----------------------------------------------------------------------------------->
  <!----------------------------------------------------------------------------------->
  <!--TERMINA AQUI --------------------------------------------------------------META-->
  <!----------------------------------------------------------------------------------->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Favicon -->
  <link rel="Shortcut Icon" href="assets/img/1.ico"/>
  
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="assets/font/css/all.css">

  <!-- WaitMe -->
  <!-- <link rel="stylesheet" href="assets/plugins/waitMe/waitMe.min.css"> -->
  <title>Solupelís</title>
  
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <li class="fas fa-film"></li>
        Solupelís
        
      </a>
      <a class="navbar-brand text-light" href="?controller=home">Inicio</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

          <!-- que vaya al controlador user cuando le demos clic -->
          <!-- el index verifica y convierte a camel -->
          
          <li class="nav-item">
            <a class="nav-link" href="?controller=movie">Peliculas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=category">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=rental">Alquileres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=login&method=logout">Cerrar sesión</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>




  <!-- STACKTABLE -->
  <!-- <script type=”text/javascript” src=”assets/stacktable/stacktable.js”> -->
  </script>
  <script src="assets/datatable/js/jquery-3.5.1.js"></script>

  <!-- DATATABLE -->
  <script src="assets/datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <script>

    // DATATABLE EN ESPAÑOL: PRESENTABA ERROR CON EL COLSPAN DE LA TABLA
    $(document).ready(function() {
      $('.datatable').DataTable({
        "language": {
         "url": "assets/datatable/js/Spanish.json"
       }
     });
    } );

    // /*STACKTABLE*/
    // $(document).ready(function() {
    //   $('.stacktable').stacktable();
    // });
  </script>

</body>
</html>