
<section class="content-header cabecera">
      <h1>
        Registro de Tesis
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
              <h3 class="box-title">Datos del Tesis</h3>
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

                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" name="autor_tesis"  id="autor_tesis" maxlength="8" size="8" placeholder="Autor">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Tipo de Tesis</label>

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
                    <textarea name="resumen_tesis" placeholder="Resumen de tesis"  style="resize: vertical;"  class="form-control validacion" id="resumen_tesis" cols="6" rows="6">Saturno</textarea>
                  </div>
                  <label  class="col-sm-1 control-label">Obetivos</label>
                  <div class="col-sm-4">
                    <textarea name="objetivos_tesis" style="resize: vertical;" class="form-control validacion" placeholder="Objetivos del Documento" id="objetivos_tesis" cols="3" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Filial</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="filial_datos" id="filial_datos">
                    </select>
                  </div>
                  <label  class="col-sm-2 control-label">Palabras clave</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" name="pclaves_tesis" id="pclaves_tesis" value="">
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
 <script src="html/javascript/reg_tesis.js"></script>
 <script src="html/javascript/list_filial.js"></script>
 <script>

/********MOSTRAR NOMBRE DE ARCHIVO SELECCIONADO******/
function seleccionar_archivo(valor){
  valor = valor.split('\\');
  //alert(valor[valor.length-1]);
  $("#nombre_archivo").html(valor[valor.length-1]);

}

</script>
