<section class="content-header cabecera">
      <h1>
        Publicar Tesis
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
              <h3 class="box-title">Programar publicación</h3>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Buscar Tesis Registradas</label>
                  <div class="col-sm-4">
                    <input type="text" name="buscar_tesis"  class="form-control" id="buscar_tesis" placeholder="buscar por Nombre, Autor">
                  </div>
                  <div class="col-sm-2">
                    <button type="button" onclick="buscar_tesis();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                  </div>
            </div>
            <br>
            <br>
            <!-- /.box -->
            <div class="box-body">
              <div class="" id="msj_ptesis">
              </div>
            <div id="listar_tesis" class="icon-loading">
              <i id="loading_tesis" style="margin:auto;display:block; margin-top:60px;"></i>
            </div>
            <p id="paginador_tesis" class="mi_paginador"></p>
            </div>

          </div>
        </div>

    </div><!--row-->

</section>
    <!-- /.content -->
    
    
    
    
    
    
    
    
    <!--MODAL PUBLICAR TESIS-->
      <div class="modal fade" id="myModal_publicar_tesis" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Publicar Tesis</h4>
            </div>
            <div class="modal-body">
              <p>Estas seguro de publicar la Tesis:</p>
              <input type="hidden" name="id_tesis" id="id_tesis" value="">
              <input type="hidden" id="id_estado_tesis" name="id_estado_tesis" class="">
              <strong><p id="nombre_tesis_p"></p></strong>
            </div>
            <div class="modal-footer">
              <div class="text-center">
              <button type="button" onclick="public_tesis_id();" id="public_tesis_id" data-dismiss="modal" class="btn btn-success">Publicar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    <!--MODAL PUBLICAR TESIS-->

<script src="html/javascript/tesis_list.js"></script>

