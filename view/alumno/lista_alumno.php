<section class="content-header cabecera">
      <h1>
        Lista de Alumnos
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
                      <input type="text" name="buscar_usuario"  class="form-control" id="buscar_alumno" placeholder="buscar alumno por Apellido o DNI">
                    </div>
                    <div class="col-sm-2">
                      <button type="button" onclick="buscar_alumno();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                    </div>
              </div>
            <br>
            <br>
          <!-- /.box -->
          <div class="box-body">
            <div id="listar" class="icon-loading">
              <i id="loading_alumno" style="margin:auto;display:block; margin-top:60px;"></i>
              <div id="nodatos"></div>
            </div>
              <p id="paginador_alumno" class="mi_paginador"></p>
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
          <h4 class="modal-title">Modificar Alumno</h4>
        </div>
          <!--AQUI DATOS DEL MODAL-->
<section class="content">
  <div class="row">
    <div class="col-md-9">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Datos del Alumno</h3>
        </div>
        <form class="form-horizontal" id="mod_alumno">
            <div class="box-body">
              <div class="" id="msj_mod_alumno">
              </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombres</label>

                  <div class="col-sm-4">
                    <input type="hidden" id="id_alumno2" name="id_alumno2">
                    <input type="text" name="nombre_alumno2" onkeypress="return solo_letras(event);" class="form-control validacion" id="nombre_alumno2" placeholder="nombres">
                  </div>
                  <label  class="col-sm-2 control-label">DNI</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" onkeypress="return solo_numeros(event);"  maxlength="8"  name="dni_alumno2" id="dni_alumno2"  placeholder="DNI">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Ape Paterno</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" name="ape_paterno2" onkeypress="return solo_letras(event);" id="ape_paterno2" placeholder="apellido paterno">
                  </div>
                  <label  class="col-sm-2 control-label">Ape Materno</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" name="ape_materno2" onkeypress="return solo_letras(event);" id="ape_materno2" placeholder="apellido materno">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Domicilio</label>

                  <div class="col-sm-4">
                    <textarea name="domicilio_alumno2" placeholder="domicilio"  style="resize: none;"  class="form-control validacion" id="domicilio_alumno2" maxlength="85" cols="3" rows="3">Saturno</textarea>
                  </div>
                  <label  class="col-sm-2 control-label">Teléfono</label>

                  <div class="col-sm-4">
                    <input type="text" name="telefono_alumno2" maxlength="9" class="form-control validacion" onkeypress="return solo_numeros(event);"  id="telefono_alumno2" placeholder="telefono">
                  </div>
                </div>

              <div class="form-group">
                  <label  class="col-sm-2 control-label">Imagen</label>
                  <div class="col-sm-4">
                  <input type="hidden" id="imagen_oculta" name="imagen_oculta">
                    <input type="file" data-target="preview_image2" class="file-input" id="imagen_alumno2" name="imagen_alumno2" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" />
                      <div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="imagen_alumno2" class="btn btn-primary "><span class="glyphicon glyphicon-folder-open "></span>&ensp;Escoger Imágen</label>
                      </span>
                      </div>

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
              <h3 class="box-title">Imagen Alumno</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="">
            <p id="respuesta"></p>
              <div class="box-body">
                <div class="form-group">
                    <img id="preview_image2"  class="imagenpreview" width="170"  alt="imagen" />
                </div>
              </div>
            </form>
          </div>

        </div>
    </div><!--row-->

</section>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <span class="glyphicon glyphicon-remove"></span></button>
      </div>
    </div>
  </div>
</div>
<!--MODAL MODIFICAR ALUMNO-->
    <!-- /.content -->
<style type="text/css">

</style>

  <script src="html/javascript/alumno_list.js"></script>
  <script src="html/javascript/mod_alumno.js"></script>
