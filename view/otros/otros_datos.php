
<section class="content-header cabecera">
      <h1>
        Otros Datos
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
              <h3 class="box-title">Datos</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="otros_datos">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="" id="msj_otros_datos">
                </div>
                <!--Mensaje de registro-->
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Tipo de Usuario</label>
                  <div class="col-sm-4">
                    <input type="text" name="tipo_usuario_o" onkeypress="return solo_letras(event);" class="form-control validacion"  id="tipo_usuario_o" placeholder="Tipo de Usuario" maxlength="40">
                  </div>
                  <div class="">
                    <button type="button" onclick="reg_tipo_user()" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Tipo de Tesis</label>
                  <div class="col-sm-4">
                    <input type="text" name="tipo_tesis_o" onkeypress="return solo_letras(event);" class="form-control validacion"  id="tipo_tesis_o" placeholder="Tipo de Tesis" maxlength="40">
                  </div>
                  <div class="">
                    <button type="button" onclick="reg_tipo_tesis()" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Grado Académico</label>
                  <div class="col-sm-4">
                    <input type="text" name="grado_academico_o" onkeypress="return solo_letras(event);" class="form-control validacion" id="grado_academico_o" placeholder="Grado Académico" maxlength="40">
                  </div>
                  <div class="">
                    <button type="button" onclick="reg_grado_academico()" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Filial</label>
                  <div class="col-sm-4">
                    <input type="text" name="filial_o" onkeypress="return solo_letras(event);" class="form-control validacion" id="filial_o" placeholder="Nombre Filial" maxlength="40">
                  </div>
                  <div class="">
                    <button type="button" onclick="reg_filial()" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Categoria</label>
                  <div class="col-sm-4">
                    <input type="text" name="categoria_o" onkeypress="return solo_letras(event);" class="form-control validacion" id="categoria_o" placeholder="Nombre Filial" maxlength="40">
                  </div>
                  <div class="">
                    <button type="button" onclick="reg_categoria()" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                  </div>
                </div>
              </div>
            
            </form>
          </div>
        </div>
        </div>
    </div><!--row-->

</section>
    <!-- /.content -->


<script src="html/javascript/re_otros_datos.js"></script>


