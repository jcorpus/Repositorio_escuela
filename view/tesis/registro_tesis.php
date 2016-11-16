
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
            <form class="form-horizontal" id="formulario_alumno">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="alert alert-success alert-dismissible" style="display:none" id="correcto">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Tesis Correctamente &nbsp;<i class="icon fa fa-check"></i>
                </div>
                <!--Mensaje de registro-->
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Titulo</label>

                  <div class="col-sm-4">
                    <input type="text" name="nombre_alumno" class="form-control" value="" id="nombre_alumno" placeholder="Titulo">
                  </div>
                  <label  class="col-sm-2 control-label">Autor</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="dni_alumno" value="" id="dni_alumno" maxlength="8" size="8" placeholder="Autor">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Fuente</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ape_paterno" value="" id="ape_paterno" placeholder="Fuente">
                  </div>
                  <label  class="col-sm-2 control-label">Tipo de Doc</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ape_materno" value="" id="ape_materno" placeholder="apellido materno">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-1 control-label">Resumen</label>
                  <div class="col-sm-4">
                    <textarea name="domicilio_alumno" placeholder="domicilio"  style="resize: vertical;"  class="form-control" id="domicilio_alumno" cols="6" rows="6">Saturno</textarea>
                  </div>
                  <label  class="col-sm-2 control-label">Obetivos</label>
                  <div class="col-sm-3">
                    <textarea name="objetivos" style="resize: vertical;" class="form-control" placeholder="Objetivos del Documento" id="objetivos_doc" cols="3" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Email</label>

                  <div class="col-sm-5">
                    <input type="email" name="email_alumno" class="form-control" value="" id="email_alumno" placeholder="email">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Archivo</label>
                  <div class="col-sm-4">
                      <input type="file" onchange="seleccionar_archivo(this.value)"  class="file-input" id="archivo_alumno" name="archivo_alumno" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" />
                      <div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="archivo_alumno" class="btn btn-primary "><i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>&ensp;Escoger Archivo</label>
                      </span>
                      </div>
                      <p id="nombre_archivo"></p>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="button" onclick="registrar_alumno()" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
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

 <script>

/********MOSTRAR NOMBRE DE ARCHIVO SELECCIONADO******/
function seleccionar_archivo(valor){
  valor = valor.split('\\');
  //alert(valor[valor.length-1]);
  $("#nombre_archivo").html(valor[valor.length-1]);

}

</script>
