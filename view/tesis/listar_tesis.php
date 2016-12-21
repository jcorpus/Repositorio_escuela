<section class="content-header cabecera">
      <h1>
        Lista de Tesis
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
    <div class="box box-primary">
       
              <div class="box-body">
        	<div>
        		<div class="form-group">
        	<label  class="col-sm-1 control-label">Filiales</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="bus_filial" id="bus_filial">
                      <?php  include('controller/filial.php'); ?>
                    </select>
                  </div> 	</div>
        	</div>
        	<div class="col-md-12 col-lg-12 col-xs-12">
        		<table class="table table-bordered">
        			<thead>
        				<tr>
        					<th class="info">ID</th>
        					<th class="info">Autor</th>
        					<th class="info">Titulo</th>
        					
        				</tr>
        			</thead>
        			<tbody id="tbody_lista_tesis">
        			</tbody>filial
        		</table>
        	</div> 
        	 <div class="form-group">
                    <div class="col-sm-8">
                     <button type="button" class="btn btn-success" id="reportefiliales"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Generar PDF</button>
                     </div>
                  </div>

        </div>   
        <div class="box-footer"></div>
    </div>
  </div>
</div>

</section>

<style type="text/css">

</style>

  <script src="html/javascript/busquedatesis.js"></script>
<script>
	$(document).ready(function(){
		Listar_tesis($("#bus_filial").val());

$("#bus_filial").on("change",function(){
			Listar_tesis($(this).val());
		})

 $("#reportefiliales").click(function(){
        window.open("html/reportes/reportefiliales.php?p="+$("#bus_filial").val(),"blank");
      });
	
	})

</script>