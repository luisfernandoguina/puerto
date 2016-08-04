<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Permisos</title>
  <link rel="icon" href="<?php asset("dist/img/logo.png") ?>">
  <link rel="stylesheet" href="<?php asset("bootstrap/css/bootstrap.min.css") ?>">
<link rel="stylesheet"   href="<?php asset("dist/css/estiloRecoveryPassword.css") ?>">
  <!-- Google Font -->
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
</head>
<body>

<section class="container">

    <div class="login-form">

      <div class="panel panel-default">
        <div class="panel-heading">
          <center><p>Recuperar Contraseña</p></center>
          <div style="text-align:center;"><img src="<?php asset("dist/img/logo.png") ?>"></div>
        </div>
        <div class="panel-body">

            <form method="post" action="login" role="login">

                <label for="password">Email</label>
              <input type="password" name="pass" placeholder="Email"  required class="form-control input-lg" />
            
            <div class="form-group">
              <button type="submit" name="go" class="btn btn-lg btn-info btn-block">Recuperar</button>
            </div>
            <div class="account">
          			
              <center><a href="http://www.puertobolivar.gob.ec/">Autoridad Portuaria::.</a> <a href="<?php url("") ?>">.::Control de Permisos</a></center>
          	</div>
          </form>
        </div>
      </div>
    </div>
</section>
<!--end login modal-->

    <script src="<?php  asset("plugins/jQuery/jQuery-2.1.4.min.js")?>"></script>
  <scrip src="<?php asset("bootsrap/js/bootstrap.min.js") ?>"></scrip>
</body>
</html>

