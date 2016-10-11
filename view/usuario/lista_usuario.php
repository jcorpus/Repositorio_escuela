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
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Alumno</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->

          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
         <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Otros datos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

          </div>

        </div>
    </div><!--row-->

</section>
    <!-- /.content -->

 <script>
$('.file-input').on('change', function() {
    previewImage(this);
});


/** cumpleaños **/
$(".cumple").change(function(){


   var dia = $("#dia option:selected").val();
  var mes = $("#mes option:selected").val();
  var year = $("#year option:selected").val();

  if((dia=='') || (mes=='') ||( year=='')){
    //alert("faltan datos");

  }else{
    var valor = dia+"/"+mes+"/"+year;
    console.log("el cumpleaños es: "+dia+"/"+mes+"/"+year);
    calcularedad(valor);
  }

});



</script>
