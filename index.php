<?php require('core/core.php');

if (isset($_SESSION['app_id'])) { //esta definida app_id
  echo '<script> window.location="home.php"; </script>';
}else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Repositorio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="site_media/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="site_media/css/AdminLTE.css">
  <!--style log in-->
  <link rel="stylesheet" href="site_media/css/estilo_login.css">
  <!-- mi script-->
  <!-- jQuery 2.2.3 -->
  <script src="site_media/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="html/javascript/v_login.js"></script>
  <script src="html/javascript/Recuperar_pass.js">

  </script>
</head>
<body class="login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php"><b>Repositorio</b>Escuela</a>
    </div>
            <div class="alerta" id="ajax_login" ></div>
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="site_media/img/avatar.png" />
                <p id="profile-name" class="profile-name-card"></p>

                <form class="form-signin" onkeypress="return runLogin(event);">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="user_email" class="form-control" placeholder="Email " >
                    <input type="password" id="user_password" class="form-control" placeholder="Password" >
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" id="sesion_login" value="remember-me"> Recordarme
                        </label>
                    </div>
                    <button type="button"class="btn btn-lg btn-primary btn-block btn-signin" onclick="go_login();">Ingresar</button>
                </form><!-- /form -->
                <a href="#" data-toggle="modal" data-target=".bd-example-modal-sm" class="forgot-password">
                    Olvidaste tu clave?
                </a>
            </div><!-- /card-container -->

  </div>
  <div class="">
    <p class="text-center">
      <?php printf(YEAR_APLICACION);  ?>
    </p>

  </div>

  <!-- modal olvido password-->
  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h4>
        </div>
        <div class="modal-body">
          <div class="" id="msj_get_pass">

          </div>
          <div onkeypress="return run_rec_password(event);">
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Tu email:</label>
              <input type="mail" class="form-control" id="get_pass_user">
            </div>
          </div>
          <div class="form-group">
            <p>
              La contraseña se enviará a tu Correo Electrónico
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="rec_password();" class="btn btn-primary">Enviarme un correo</button>
          </div>

      </div>
    </div>
  </div>



<!-- Bootstrap 3.3.6 -->
<script src="site_media/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
 ?>
