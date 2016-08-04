<?php if (isset($_SESSION['usuario'])) :redirecciona()->to("admin")?>

<?php else :?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Permisos</title>
  <link rel="icon" href="<?php asset("dist/img/logo.png") ?>">

  <link rel="stylesheet" href="<?php asset("bootstrap/css/bootstrap.min.css") ?>">
<link rel="stylesheet"   href="<?php asset("dist/css/estiloLogin.css") ?>">
  <!-- Google Font -->
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
</head>
<body>

<section class="container">

    <div class="login-form">

      <div class="panel panel-default">
        <div class="panel-heading">
          <center><p>Control de Permisos</p></center>
          <div style="text-align:center;"><img src="<?php asset("dist/img/logo.png") ?>" height="123px"></div>
        </div>
        <div class="panel-body">

            <form method="post" action="<?php url("ingresar") ?>" role="login">
                <input value="<?php csrf_token() ?>" name ="_token" type="hidden">
              <div class="form-group">
                <label for="email">Usuario</label>
                <input type="text" name="user" placeholder="Usuario" required class="form-control input-lg" />
              </div>
              <div class="form-group">

                <label for="password">Contraseña</label>
              <input type="password" name="pass" placeholder="Contraseña"  required class="form-control input-lg" />
            </div>
            <div class="form-group">
              <button type="submit" name="go" class="btn btn-lg btn-info btn-block">Ingresar al Sistema</button>
            </div>

            <?php if(Session::has("estado") && Session::has("mensaje")){ ?>

                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong>Error! </strong> <?php echo Session::get("mensaje");  ?>
                    </div>

            <?php } ?>

            <div class="account">
          			<ul>
          				<li  list-style:none;><p>Tienes problemas ? <a href="<?php url("recoverypassword") ?>">Olvidaste la contraseña ?</a></p></li>
          				<div class="clear"></div>
          			</ul>
          	</div>
          </form>
        </div>
      </div>
    </div>
</section>
<!--end login modal-->

  <script src="<?php asset("plugins/jQuery/jQuery-2.1.4.min.js")?>"></script>
  <script src="<?php asset("bootstrap/js/bootstrap.min.js") ?>"></script>

  

</body>
</html>




<?php endif; ?>