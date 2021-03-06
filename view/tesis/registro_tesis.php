
<section class="content-header cabecera">
      <h1>
        Registro de Tesis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tesis</a></li>
        <li class="active">Registro</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Tesis</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formulario_tesis">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="" id="msj_res_tesis">
                </div>
                <!--Mensaje de registro-->
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Titulo</label>
                  <div class="col-sm-4">
                    
                    <input type="text" name="nombre_tesis" class="form-control validacion"  id="nombre_tesis" placeholder="Titulo">
                  </div>
                  <label  class="col-sm-1 control-label">Autor</label>
                  <div class="col-sm-3">
                    <input type="hidden" onkeypress="return solo_letras(event);" class="form-control validacion" name="autor_tesis"  id="autor_tesis">
                    <input type="text" onkeypress="return solo_letras(event);" class="form-control validacion" name="autor_tesis_2" disabled  id="autor_tesis_2" maxlength="170" size="170" placeholder="Autor">
                  </div>
                    <button type="button" name="buscar" id="buscar"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal_buscar_alumno">Buscar&ensp;<span class="glyphicon glyphicon-search"></span></button>
                </div>
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Tipo de Investigación</label>

                  <div class="col-sm-4">
                    <select class="form-control" id="tipotesis_datos" name="tipotesis_datos">
                    </select>
                  </div>
                  <label  class="col-sm-1 control-label">Citación</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" name="cita_tesis"  id="cita_tesis" placeholder="cita tesis">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-1 control-label">Resumen</label>
                  <div class="col-sm-4">
                    <textarea name="resumen_tesis" placeholder="Resumen de tesis"  style="resize: vertical;"  class="form-control validacion" id="resumen_tesis" cols="6" rows="6"></textarea>
                  </div>
                  <label  class="col-sm-1 control-label">Obetivos</label>
                  <div class="col-sm-4">
                    <textarea name="" style="resize: vertical;" class="form-control validacion" placeholder="Objetivos del Documento" id="objetivos_tesis" cols="3" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Filial</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="filial_datos" id="filial_datos">
                    </select>
                  </div>
                  <label  class="col-sm-1 control-label">Palabras clave</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" name="pclaves_tesis" id="pclaves_tesis" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-1 control-label">grado academico</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="grado_academico" id="grado_academico">
                      <?php  include('controller/grado_academico.php'); ?>
                    </select>
                  </div>                  
                  <label  class="col-sm-1 control-label">Categoria</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="categoria_tesis" id="categoria_tesis">
                      <?php  include('controller/categoria_tesis.php'); ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label">Archivo</label>
                  <div class="col-sm-4">
                      <input type="file" onchange="seleccionar_archivo(this.value)"  class="file-input" id="archivo_tesis" name="archivo_tesis" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" />
                      <div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="archivo_tesis" class="btn btn-primary "><i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>&ensp;Escoger Archivo</label>
                      </span>
                      </div>
                      <p id="nombre_archivo"></p>
                  </div>
                  <label  class="col-sm-1 control-label">Estado Tesis</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="estado_tesis" id="estado_tesis">
                      <?php  include('controller/estado_publicacion.php'); ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label">Fecha de Tesis</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control validacion" name="fecha_tesis" id="fecha_tesis" value="">
                  </div>
                  
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="button" onclick="reg_tesis()" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
    </div><!--row-->

</section>
    <!-- /.content -->
    
    
    
    
    
    
    
    
    <div class="modal fade " id="myModal_buscar_alumno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Seleccionar Alumno</h4>
          </div>
          <form class="form-horizontal" id="mod_alumno">
              <div class="box-body">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label">Nombre o Apellido</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" onkeypress="return solo_letras(event);" name="datos_alumno" onkeypress="return solo_letras(event);" id="datos_alumno" placeholder="nombre o apellido">
                    </div>
                    <div class="col-sm-2">
                      <button type="button" onclick="busca_alumno_tesis();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div id="listar_t" class="icon-loading">
                      <i id="loading_alumno2" style="margin:auto;display:block; margin-top:60px;"></i>
                      <div id="nodatos"></div>
                    </div>
                      <p id="paginador_alumno_t" class="mi_paginador"></p>
                  </div>
                </div>
              </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove"></span></button>
              </div>
        
      </div>
    </div>
  </div>
  
  
  <!--MODAL 2-->
  <div class="modal fade " id="myModal_buscar_alumno2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Seleccionar Alumno</h4>
        </div>
        <form class="form-horizontal" id="mod_alumno2">
            <div class="box-body">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre o Apellido</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" onkeypress="return solo_letras(event);" name="datos_alumno2" onkeypress="return solo_letras(event);" id="datos_alumno2" placeholder="nombre o apellido">
                  </div>
                  <div class="col-sm-2">
                    <button type="button" onclick="busca_alumno_tesis2();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div id="listar_t2" class="icon-loading">
                    <i id="loading_alumno2" style="margin:auto;display:block; margin-top:60px;"></i>
                  </div>
                    <p id="paginador_alumno_t2" class="mi_paginador"></p>
                </div>
              </div>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove"></span></button>
            </div>
      
    </div>
  </div>
</div>

<!--modal 2-->
    
 <script src="html/javascript/reg_tesis.js"></script>
 <script src="html/javascript/buscar_alumno_tesis.js"></script>
 <script src="html/javascript/list_filial.js"></script>
 <script>

/********MOSTRAR NOMBRE DE ARCHIVO SELECCIONADO******/
function seleccionar_archivo(valor){
  valor = valor.split('\\');
  //alert(valor[valor.length-1]);
  $("#nombre_archivo").html(valor[valor.length-1]);

}

</script>
