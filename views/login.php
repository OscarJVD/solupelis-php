<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" lang="es" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="Author" lang="es" content="Óscar Javier Vargas Diaz, oscarjaviervargas@hotmail.com"> 
  <meta name="DC.identifier" lang="es" content=""><!--Aqui va la paginaassets/login/ SOLUMOBIL.............................-->
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
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
  <!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
  <!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
  <!--===============================================================================================-->
  <!-- Favicon -->
  <link rel="Shortcut Icon" href="assets/img/1.ico"/>
  
  <title>Solupelis</title>
  
</head>
<body>

  <div class="limiter">
    <div class="container-login100 ">
      <div class="wrap-login100">
        <form action="?controller=login&method=login" method="post" class="login100-form validate-form" >

          <span class="login100-form-title p-b-34">
            Iniciar sesión en Solupelís
          </span>

          <?php if (isset($error['errorMessage'])) { ?>

            <div class="alert alert-danger alert-dismissable alert-width" role="alert">
              <button class="close" data-dismiss="alert">&times;</button>
              <p class="text-dark">
                <?php echo $error['errorMessage']; ?>
              </p>
            </div>

          <?php } ?>

          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="email" value="<?php echo isset($error['email']) ? $error['email']: '' ?>" class="input100" type="email" name="email" placeholder="Ej.test@t.com" autocomplete="" autofocus="">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input class="input100" type="password" name="password" placeholder="********" autocomplete="">
            <span class="focus-input100"></span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Iniciar Sesión
            </button>
          </div>

          <div class="w-full text-center p-t-27 p-b-239 d-none">
            <span class="txt1">
              <!-- Forgot -->
            </span>

            <a href="#" class="txt2">
              <!-- User name / password? -->
            </a>
          </div>

          <div class="w-full text-center">
            <a href="#" class="txt3">
              <!-- Registrarse -->
            </a>
          </div>
        </form>

        <div class="login100-more" style="background-image: url('assets/login/images/popcorn.jpg');">
        </div>
      </div>
    </div>
  </div>



  <!--==========START COMPLEMENTS=====================================================================================-->

  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
  <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="assets/login/vendor/select2/select2.min.js"></script>
  <script>
    $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>
  <!--===============================================================================================-->
  <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="assets/login/js/main.js"></script>

</body>
</html>




<!-- TEACHER VERSION INCOMPLETE -->
 <!-- 
<main class="container">
  <div class="row">
    <h1 class="col-12 d-flex justify-content-center">Iniciar</h1>
  </div>
  <section class="row mt-5">
    <div class="card w-50 m-auto">
      <div class="card-body w-100">
        <form action="">
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Ej. t@test.com"> 
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Ej. t@test.com"> 
          </div>
        </form>
      </div>
    </div>
  </section> 
</main> -->