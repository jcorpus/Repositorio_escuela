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
                <h3>Mis Datos</h3>
                <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Código</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $usuarios[$_SESSION['app_id']]['Usuario']; ?>" class="form-control" disabled="" placeholder="codigo">
                  </div>
                </div>
                <div class="form-group">
                  <label for=""  class="col-sm-2 control-label">Nombres</label>
                  <div class="col-sm-10">
                    <input type="text" id="nombre_user" value="<?php echo $usuarios[$_SESSION['app_id']]['NomPersona']; ?>" class="form-control" disabled="" placeholder="nombres">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Apellidos</label>
                  <div class="col-sm-10">
                    <input type="text" id="apellidos_user" value="<?php echo $usuarios[$_SESSION['app_id']]['all_apellido']; ?>" class="form-control" disabled="" placeholder="Apellidos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-7">
                    <input type="email"  value="<?php echo $usuarios[$_SESSION['app_id']]['Email']; ?>" class="form-control" disabled=""  placeholder="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-7">
                    <input type="password" id="password_user"  value="<?php echo base64_decode($usuarios[$_SESSION['app_id']]['Password_user']); ?>" class="form-control"  placeholder="password">
                  </div>
                  <div class="col-sm-3">
                    <button type="button" data-toggle="modal" data-target="#myModal_cambiar_email" class="btn btn-primary" name="button">Cambiar</button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!--
                <button type="button"  class="btn btn-primary">Guardar Cambios</button>
                -->
              </div>
              <!-- /.box-footer -->
            </form>

            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Imagen Usuario</h3>
                <p>
                  <img src="<?php echo $usuarios[$_SESSION['app_id']]['imgUsuario']; ?>" class="img-circle" alt="Imágen Usuario">
                </p>
                <p><i class="fa fa-user"></i> 
                    : <?php echo $usuarios[$_SESSION['app_id']]['NomPersona']; ?></p>
                <p><i class="fa fa-envelope-o"></i> 
                    : <?php echo $usuarios[$_SESSION['app_id']]['Email']; ?></p>
            </div>
        </div>
        
        
        
        <!--MODAL CAMBIAR EMAIL-->
          <div class="modal fade" id="myModal_cambiar_email" role="dialog">
            <div class="modal-dialog ">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Cambiar Contraseña</h4>
                </div>
                <div class="modal-body">    
                  <form class="form-horizontal">
                    <div class="" id="resp_user_mod">
                      
                    </div>
                    <div class="form-group">
                      <label for=""  class="col-sm-3 control-label">Nueva Contraseña</label>
                      <div class="col-sm-8">
                        <input type="password"  name="password_userp" class="form-control"  id="password_userp" required value="">
                      </div>
                    </div>
                  </form>              
                  
                </div>
                <div class="modal-footer">
                  <div class="text-center">
                  <button type="button" onclick="cambiar_datos_user()" id="cambiar_datos_user" class="btn btn-success">Cambiar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        <!--MODAL CAMBIAR EMAIL-->
      
        
        
        <script type="text/javascript">
        $('#ver_password').click(function(){
        var valor = $('#password_user').attr();
        $('#password_user').attr('type','text');
        });
        </script>
        
        
        <script src="html/javascript/datos_usuario.js"></script>
        
        