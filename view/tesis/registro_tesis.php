
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
                  <label  class="col-sm-2 control-label">Titulo</label>

                  <div class="col-sm-4">
                    <input type="text" name="nombre_alumno" class="form-control" value="bakuryo" id="nombre_alumno" placeholder="nombres">
                  </div>
                  <label  class="col-sm-2 control-label">Autor</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="dni_alumno" value="12345678" id="dni_alumno" maxlength="8" size="8" placeholder="DNI">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Fuente</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ape_paterno" value="corpus" id="ape_paterno" placeholder="apellido paterno">
                  </div>
                  <label  class="col-sm-2 control-label">Tipo de Doc</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ape_materno" value="mechato" id="ape_materno" placeholder="apellido materno">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Resumen</label>
                  <div class="col-sm-4">
                    <textarea name="domicilio_alumno" placeholder="domicilio"  style="resize: vertical;"  class="form-control" id="domicilio_alumno" cols="3" rows="3">Saturno</textarea>
                  </div>
                  <label  class="col-sm-2 control-label">Obetivos</label>
                  <div class="col-sm-3">
                    <textarea name="objetivos" style="resize: vertical;" class="form-control" placeholder="Objetivos del Documento" id="objetivos_doc" cols="3" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">F Nacimiento</label>
                  <div class="col-sm-2">
                    <select name="dia" id="dia" class="form-control cumple">
                        <option value="">Día</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="mes" id="mes" class="form-control cumple">
                        <option value="">Mes</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>

                    </select>
                  </div>
                  <div class="col-sm-2">
                    <select name="year" id="year" class="form-control cumple">
                        <option value="">Año</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>

                    </select>
                  </div>
                     <div class="col-sm-2">
                        <input type="text" name="edad" class="form-control" id="edad"  placeholder="Edad" disabled>
                        <b>Edad</b>
                     </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-5">
                    <input type="email" name="email_alumno" class="form-control" value="doombakuryo@gmail.com" id="email_alumno" placeholder="email">
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
