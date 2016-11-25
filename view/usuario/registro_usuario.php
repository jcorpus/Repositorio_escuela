
<section class="content-header cabecera">
      <h1>
        Registro de Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>

  </section>

    <!-- Main content -->
<section class="content">
  
    <div class="row">
        <div class="col-md-9">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Usuario</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formulario_usuario">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="resp_c" id="resp_user">
                </div>
                <!--Mensaje de registro-->
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombres</label>
                  <div class="col-sm-4">
                    <input type="text" name="nombre_user" onkeypress="return solo_letras(event);" class="form-control validacion" value="bakuryo" id="nombre_user" placeholder="nombres" maxlength="40">
                  </div>
                  <label  class="col-sm-2 control-label">DNI</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" onkeypress="return solo_numeros(event);" name="dni_user" value="12345678" id="dni_user" maxlength="8" size="8" placeholder="DNI">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Ape Paterno</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" name="apep_user" value="corpus" onkeypress="return solo_letras(event);" id="apep_user" maxlength="40"  placeholder="apellido paterno">
                  </div>
                  <label  class="col-sm-2 control-label">Ape Materno</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control validacion" name="apem_user" value="mechato" onkeypress="return solo_letras(event);" id="apem_user" maxlength="40" placeholder="apellido materno">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Domicilio</label>

                  <div class="col-sm-4">
                    <textarea name="domicilio_user" placeholder="domicilio"  style="resize: vertical;"  class="form-control validacion" id="domicilio_user" maxlength="240" cols="3" rows="3">Saturno</textarea>
                  </div>
                  <label  class="col-sm-2 control-label">Teléfono</label>

                  <div class="col-sm-3">
                    <input type="text" name="telefono_user" onkeypress="return solo_numeros(event);" class="form-control validacion" value="767675" maxlength="20" id="telefono_user" placeholder="telefono">
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
                        <input type="text" name="edad_user" class="form-control validacion"  onkeypress="return solo_numeros(event);" id="edad_user"  placeholder="Edad" >
                        <b>Edad</b>
                     </div>
                </div>

                <div class="form-group">
                <label  class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="email" name="email_user" class="form-control validacion"  value="doombakuryo@gmail.com" id="email_user" placeholder="email" maxlength="50">
                  </div>
                  <label  class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-4">
                    <input type="password" name="password_user" class="form-control validacion" value="" id="password_user" placeholder="password" maxlength="50">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Sexo</label>

                  <div class="col-sm-4">
                    <label class="miradio ">
                      <input type="radio" id="masculino" class="form-control sexo validacion"  name="sexo_user" value="M"><!-- por defecto checked-->
                      <span> Masculino </span>
                    </label>
                    <label class="miradio ">
                      <input type="radio" id="femenino" class="form-control sexo validacion"  name="sexo_user" value="F">
                      <span>Femenino </span>
                    </label>
                  </div>
                  <label  class="col-sm-2 control-label">Imágen</label>
                  <div class="col-sm-4">
                    <input type="file" data-target="preview_image" class="file-input" id="imagen_user" accept="image/*"  name="imagen_user" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" />
                      <div class="bootstrap-filestyle input-group" data-toggle="tooltip" data-placement="right" title="No obligatorio" ><span class="group-span-filestyle " tabindex="0"><label for="imagen_user" class="btn btn-primary "><span class="glyphicon glyphicon-folder-open "></span>&ensp;Escoger Imágen</label>
                      </span>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                <label  class="col-sm-2 control-label">Tipo de Rol</label>
                  <div class="col-sm-4">
                    <select class="form-control"id="tipousuario_datos" name="">
                      
                    </select>
                  </div>
                  <label  class="col-sm-2 control-label">Otracosa</label>
                  <div class="col-sm-4">
                    <input type="password" name="" class="form-control validacion" value="" id="" placeholder="password" maxlength="50">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="button" onclick="registrar_usuario()" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
         <div class="col-md-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Otros datos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="otraforma">
            <p id="respuesta"></p>
              <div class="box-body">
                <div class="form-group">
                  <label>Imágen de Usuario</label>
                    </div>
                    <br>
                    <img id="preview_image" class="imagenpreview" width="170" src="site_media/img/avatar.png" alt="imagen" />

                </div>
              </div>
            </form>
          </div>

        </div>
    </div><!--row-->

</section>
    <!-- /.content -->


<script src="html/javascript/reg_usuario.js"></script>
<script src="html/javascript/tipo_usuario.js"></script>

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
