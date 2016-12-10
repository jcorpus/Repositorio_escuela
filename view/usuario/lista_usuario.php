<section class="content-header cabecera">
      <h1>
        Lista de usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Usuario</h3>
            </div>

              <div class="form-group">
                  <label class="col-sm-2 control-label">Buscar</label>
                    <div class="col-sm-4">
                      <input type="text" name="buscar_usuario"  class="form-control" id="buscar_usuario" placeholder="buscar usuario por Código">
                    </div>
                    <div class="col-sm-2">
                      <button type="button" onclick="buscar_user();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                    </div>
              </div>
            <br>
            <br>
          <!-- /.box -->
          <div class="box-body">
              <div id="listar" class="icon-loading">
                <i id="loading_user" style="margin:auto;display:block; margin-top:60px;"></i>
                <div id="nodatos"></div>
              </div>
              <p id="paginador_usuarios" class="mi_paginador"></p>
            </div>
          <!-- /.box -->
          </div>
        </div>

    </div><!--row-->

</section>
<!--MODAL MODIFICAR ALUMNO-->
  <div class="modal fade " id="myModal_modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modificar Usuario</h4>
        </div>
          <!--AQUI DATOS DEL MODAL-->
<section class="content">
  <div class="row">
    <div class="col-md-9">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Datos del Usuario</h3>
        </div>
        <form class="form-horizontal" id="mod_user">
            <div class="box-body">
                <!--Mensaje de registro-->
                <div class="alert alert-success alert-dismissible" style="display:none" id="correcto">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Alumno Modificado Correctamente &nbsp;<i class="icon fa fa-check"></i>
                </div>
                <!--Mensaje de registro-->
                <div class="alert alert-warning alert-dismissible" style="display:none" id="error">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="icon fa fa-warning"></i>&nbsp;Faltan Datos...
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombres</label>

                  <div class="col-sm-4">
                    <input type="hidden" id="id_user" name="id_user">
                    <input type="hidden" id="id_user2" name="user">
                    <input type="text" name="nombre_user2" onkeypress="return solo_letras(event);" class="form-control" id="nombre_user2" placeholder="nombres">
                  </div>
                  <label  class="col-sm-2 control-label">DNI</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" onkeypress="return solo_numeros(event);"  maxlength="8"  name="dni_user2" id="dni_user2"  placeholder="DNI">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Ape Paterno</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="apep_user2" onkeypress="return solo_letras(event);" id="apep_user2" placeholder="apellido paterno">
                  </div>
                  <label  class="col-sm-2 control-label">Ape Materno</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="apem_user2" onkeypress="return solo_letras(event);" id="apem_user2" placeholder="apellido materno">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Domicilio</label>

                  <div class="col-sm-4">
                    <textarea name="domicilio_user2" placeholder="domicilio"  style="resize: none;"  class="form-control" id="domicilio_user2" maxlength="230" cols="3" rows="3">Saturno</textarea>
                  </div>
                  <label  class="col-sm-2 control-label">Teléfono</label>

                  <div class="col-sm-4">
                    <input type="text" name="telefono_user2" maxlength="9" class="form-control" onkeypress="return solo_numeros(event);"  id="telefono_user2" placeholder="telefono">
                  </div>
                </div>

              <div class="form-group">
                <label  class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="email" name="email_user2" class="form-control" id="email_user2" placeholder="email">
                  </div>
                  <label  class="col-sm-2 control-label">Imágen</label>
                  <div class="col-sm-4">
                  <input type="hidden" id="image_oculta" name="imagen_oculta">
                    <!-- <input type="file" data-target="preview_image" class="file-input" id="imagen_user2" name="imagen_user2" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" />  -->
                      <div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="imagen_user" class="btn btn-primary "><span class="glyphicon glyphicon-folder-open "></span>&ensp;Escoger Imágen</label>
                      </span>
                      </div>

                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 control-label">Sexo</label>
                  <div class="col-sm-4">
                    <label class="miradio "><!--checked-->
                    <input type="radio" id="masculino2" class="form-control sexo2"  name="sexo_user" value="M" >
                    <span> Masculino </span>
                    </label>
                    <label class="miradio ">
                    <input type="radio" id="femenino2" class="form-control sexo2"  name="sexo_user" value="F">
                    <span>Femenino </span>
                    </label>
                    <input style="display:none" type="text" name="fecha_registro" class="form-control" id="fecha_registro">
                  </div>
                  <label  class="col-sm-2 control-label">Codigo</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  name="codigo_alumno2" id="codigo_alumno2" placeholder="codigo">
                  </div>
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="button" onclick="mod_alumno()" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Modificar</button>
              </div>
              <p id="respuesta2"></p>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div><!--fin col-md8-->
        <div class="col-md-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Imágen Alumno</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="">
            <p id="respuesta"></p>
              <div class="box-body">
                <div class="form-group">
                    <img id="preview_image2"  class="imagenpreview" width="170" src="" alt="imagen" />
                </div>
              </div>
            </form>
          </div>

        </div>
    </div><!--row-->

</section>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove"></span></button>
      </div>
    </div>
  </div>
</div>
<!--MODAL MODIFICAR ALUMNO-->
    <!-- /.content -->
<style type="text/css">

</style>

  <script src="html/javascript/usuario_list.js"></script>
