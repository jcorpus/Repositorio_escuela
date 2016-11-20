<?php

class Alumno{
  private $db;
  public function __construct(){
  require_once('../core/models/model_conexion.php');
  $this->db = new Conexion2();
}

function registro_alumno($email_alumno,$dni_alumno,$nacimiento_alumno,$nombre_alumno,
$apep_alumno,$apem_alumno,$domicilio_alumno,$telefono_alumno,$edad_alumno,$sexo_alumno,$password_alumno){
  $verificar = $this->db->query("SELECT email FROM persona WHERE email='$email_alumno' LIMIT 1");
  if ($this->db->rows($verificar) == 0) {
    $consulta = "INSERT INTO persona(nombre,ape_paterno,ape_materno,dni,domicilio,telefono,email,
      sexo,fecha_nacimiento, edad)
      VALUES('$nombre_alumno','$apep_alumno','$apem_alumno','$dni_alumno','$domicilio_alumno',
      '$telefono_alumno','$email_alumno','$sexo_alumno','$nacimiento_alumno','$edad_alumno')";
    $consulta2 = "INSERT INTO alumno(id_persona,password)
        VALUES(LAST_INSERT_ID(),'$password_alumno')";

    if ($this->db->query($consulta)) {
        $this->db->query($consulta2);

        echo '<div class="alert alert-success alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-check"></i>&nbsp;Usuario registrado correctamente
          </div>';

      return 'ok';
    }else{
      return 0;
    }
    $this->db->liberar($verificar);
    $this->db->close();
  }else{
    $email_verificar = $this->db->recorrer($verificar)[0];
    if (strtolower($email_alumno) == strtolower($email_verificar)) {
      echo '<div class="alert alert-warning alert-dismissible" id="correcto">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-times"></i>&nbsp;El email ya esta registradoop
        </div>';
    }
  }
  $this->db->close();
}




}

/*
$instancia = new Alumno();
if ($instancia->registro_alumno('j3o@45gmail.com','45456756','2015/12/12','julioo','corpus','mechato','ppaoo','346456','23','M','passwordd')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}


*/
 ?>
