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
  <title>AAAAA | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="site_media/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="site_media/css/AdminLTE.css">
  <!-- mi script-->
  <!-- jQuery 2.2.3 -->
  <script src="site_media/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="html/javascript/v_login.js"></script>
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
                <a href="#" class="forgot-password">
                    Olvidaste tu clave?
                </a>
            </div><!-- /card-container -->

  </div>
<?php printf(YEAR_APLICACION);  ?>


<!-- Bootstrap 3.3.6 -->
<script src="site_media/bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
body, html {
  /*
  height: 100%;
  background-repeat: no-repeat;
  background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
  */
}
.alerta{
  max-width: 380px;
  margin:0 auto;
}
.card-container.card {
  max-width: 380px;
  padding: 40px 40px;
}

.btn {
  font-weight: 700;
  height: 36px;
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none;
  cursor: default;
}

/*
* Card component
*/
.card {
  background-color: #F7F7F7;
  /* just in case there no content*/
  padding: 20px 25px 30px;
  margin: 0 auto 25px;
  margin-top: -19px;
  /* shadows and rounded borders */
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
  width: 96px;
  height: 96px;
  margin: 0 auto 10px;
  display: block;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}

/*
* Form styles
*/
.profile-name-card {
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  margin: 10px 0 0;
  min-height: 1em;
}

.reauth-email {
  display: block;
  color: #404040;
  line-height: 2;
  margin-bottom: 10px;
  font-size: 14px;
  text-align: center;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
  direction: ltr;
  height: 44px;
  font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  z-index: 1;
  position: relative;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.form-signin .form-control:focus {
  border-color: rgb(104, 145, 162);
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
  /*background-color: #4d90fe; */
  background-color: rgb(104, 145, 162);
  /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
  padding: 0px;
  font-weight: 700;
  font-size: 14px;
  height: 36px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  border: none;
  -o-transition: all 0.218s;
  -moz-transition: all 0.218s;
  -webkit-transition: all 0.218s;
  transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
  background-color: rgb(	22, 157, 167);
  cursor: pointer;
}

.forgot-password {
  color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
  color: rgb(12, 97, 33);
}
</style>
</body>
</html>

<?php
}
 ?>
