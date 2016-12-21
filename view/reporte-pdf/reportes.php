<section class="content-header cabecera">
      <h1>
        Reportes
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reportes</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reportes PDF</h3>
            </div>
            
            <div class="box-body pad table-responsive">
              <form class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Reporte de Usuarios</label>
                    <div class="col-sm-8">
                     <button type="button" class="btn btn-success" id="reporte_usuarios"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Visualizar PDF</button>
                     
                     </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Reporte de Alumnos</label>
                    <div class="col-sm-8">
                     <button type="button" class="btn btn-success" id="reporte_alumnos"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Visualizar PDF</button>
                     
                     </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Reporte de Trabajadores</label>
                    <div class="col-sm-8">
                     <button type="button" class="btn btn-success" id="reporte_trabajador"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Visualizar PDF</button>
                     
                     </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Reporte de Tesis</label>
                    <div class="col-sm-8">
                     <button type="button" class="btn btn-success" id="reporte_tesis"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Visualizar PDF</button>
                     
                     </div>
                  </div><div class="form-group">
                    <label class="col-sm-3 control-label">Reporte de Filiales</label>
                    <div class="col-sm-8">
                     <button type="button" class="btn btn-success" id="reporte_filiales"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Visualizar PDF</button>
                     <a class="btn btn-danger " href="javascript:reportePDF();"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Descargar <i class="fa fa-download fa-lg" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  
                </div>
  
              </form>
              
            </div>
          
            
            
            
          </div>
          
          
          <!-- /.box -->
          <!-- /.box -->
        </div>

    </div><!--row-->

  </section>
    <!-- /.content -->

    <script type="text/javascript">
    
    function reporteAlumnos(){
    
      window.open('html/reportes/report_alumnos.php');
    }
      $("#reporte_usuarios").click(function(){
        window.open("html/reportes/report_usuarios.php","blank");
      });
      $("#reporte_alumnos").click(function(){
        window.open("html/reportes/report_alumnos.php","blank");
      });
      $("#reporte_trabajador").click(function(){
        window.open("html/reportes/report_trabajadores.php","blank");
      });
      $("#reporte_tesis").click(function(){
        window.open("html/reportes/report_tesis.php","blank");
      });
      $("#reporte_filiales").click(function(){
        window.open("reporte/alumno_report.php","blank");
      });
      
    
    
  </script>
  <script src="html/javascript/usuario_list.js"></script>
