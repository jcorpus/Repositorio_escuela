<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AAAAA | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="site_media/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="site_media/css/AdminLTE.min.css">
  <!-- mi script-->
  <script src="site_media/app/js/generales.js" charset="utf-8"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form onkeypress="return runScriptLogin(event)" >
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" onclick="goLogin();"; class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
    <a href="#">olvide mi password</a><br>
    <a href="register.html" class="text-center">registrar nuevo usuario</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="site_media/app/js/login.js" charset="utf-8"></script>
<!-- jQuery 2.2.3 -->
<script src="site_media/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="site_media/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
