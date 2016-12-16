<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Perfil
                    <small>Usuario</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php">Home</a>
                    </li>
                    <li class="active">Perfil Usuario</li>
                </ol>
            </div>
        </div>
<div class="row">
            <!-- Map Column -->
            <div class="col-md-6">
                <h3>Tus Datos</h3>
                <form name="sentMessage" id="contactForm" novalidate="">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Usuario:</label>
                            <input type="text" name="user_name" value="<?php echo $usuarios[$_SESSION['app_id']]['Usuario']; ?>" class="form-control" disabled  required="" data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nombres:</label>
                            <input type="text" name="nombre_user" value="<?php echo $usuarios[$_SESSION['app_id']]['NomPersona']; ?>" class="form-control" disabled id="nombre_user" required="" data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Apellidos:</label>
                            <input type="text" name="apellidos_user" value="<?php echo $usuarios[$_SESSION['app_id']]['all_apellido']; ?>" class="form-control" disabled id="apellidos_user" required="" data-validation-required-message="Please enter your phone number.">
                        <div class="help-block"></div>
                      </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email:</label>
                        </div>
                        <div class="controls col-sm-9">
                          <input type="email" name="email_user" value="<?php echo $usuarios[$_SESSION['app_id']]['Email']; ?>" class="form-control" id="email_user" required="" data-validation-required-message="Please enter your email address.">
                        </div><button type="button" class="btn btn-success"  name="button">Cambiar</button>  
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Contraseña:</label>
                              <input type="password" name="password_user" value="<?php echo base64_decode($usuarios[$_SESSION['app_id']]['Password_user']); ?>" class="form-control" id="password_user" required="" data-validation-required-message="Please enter your email address.">
                        </div><input type="button" value="ver" class="btn btn-success" id="ver_password"> 
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Imagen Usuario</h3>
                <p>
                  <img src="<?php echo $usuarios[$_SESSION['app_id']]['imgUsuario']; ?>" class="img-circle" alt="Imágen Usuario">
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">P</abbr>: <?php echo $usuarios[$_SESSION['app_id']]['NomPersona']; ?></p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <?php echo $usuarios[$_SESSION['app_id']]['Email']; ?></p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
        $('#ver_password').click(function(){
        var valor = $('#password_user').attr();
        $('#password_user').attr('type','text');
        });
        </script>
        