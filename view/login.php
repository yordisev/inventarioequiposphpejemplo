<!DOCTYPE html>
<html style="background-color: white">
  <head>
    <meta charset="UTF-8">
    <title>Login | Inventario de Equipos</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Aplikasi Persediaan Obat pada Apotek">
    <meta name="author" content="Indra Styawantoro" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" />
  	<link href="../css/AdminLTE.css" rel="stylesheet">
    <link href="../css/AdminLTE.min.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style_nav.css" rel="stylesheet">

  </head>
  <body style="background-color: white" class="login-page bg-login">
    <div class="login-box">
      <div style="color:#889ccf" class="login-logo">
        <img style="margin-top:-12px" src="assets/img/logo-blue.png" alt="Logo" height="50"> 
        <b>REDES</b>
      </div><!-- /.login-logo -->
      <?php  
 
      if (empty($_GET['alert'])) {
        echo "";
      } 

      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Error al entrar!</h4>
               Usuario o la contraseña es incorrecta, vuelva a verificar su nombre de usuario y contraseña.
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
              Has salido con éxito.
              </div>";
      }
      ?>

      <div class="cajalogin login-box-body">
        <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Por favor Inicie Sesión</p>
        <br/>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario" autocomplete="off" required />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <br/>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Ingresar" />
            </div><!-- /.col -->
          </div>

          <?php if(!empty($errores)): ?>
                <div class="error">
<ul>
<?php echo $errores; ?>
</ul>
                </div>
            <?php endif; ?>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <center>
      <p class="box-footer">
¿ ya tienes cuenta Registrate?
<a href="registrate.php">Registrate</a>
          </p>
    </center>

  </body>
</html>