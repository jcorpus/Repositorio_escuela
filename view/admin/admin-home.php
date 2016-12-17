<!--  PAGINA DE INIIO DEL ADMIN -->
<section class="content-header cabecera">
      <h1>
        Pagina de Inicio
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Heree</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php contar_tesis(); ?></h3>
              <p>Tesis Registradas</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text-o" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php contar_alumnos(); ?></h3>

              <p>Alumnos Registrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php contar_trabajadores(); ?></h3>

              <p>Trabajadores Registrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!--  
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total de Alumnos</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
          </div>
        </div>  
      -->  
        </div>
        <div class="col-md-12">
          <div class="">
              <h4>Grafico de Barras</h4>
          </div>
        </div>
        
        
    </div><!--row-->

</section>
    <!-- /.content -->
