<?php

class Alumno{
  private $db;
  public function __construct(){
  require_once('../core/models/model_conexion.php');
  $this->db = new Conexion2();
}


function registro_alumno($email_alumno,$dni_alumno,$nacimiento_alumno,$fecha_actual,$nombre_alumno,$nombre_usuario,
$apep_alumno,$apem_alumno,$domicilio_alumno,$telefono_alumno,$sexo_alumno,$password_alumno,$ruta_registro,$codigo_alumno,
$estado_alumno,$tipo_usuario){
  $verificar = $this->db->query("SELECT persona.Email FROM persona WHERE persona.Email = '$email_alumno' LIMIT 1");
  if ($this->db->rows($verificar) == 0) {
    $consulta = "INSERT INTO persona(NomPersona,ApePaterno,ApeMaterno,DNI,Direccion,Sexo,Telefono,FechaNacimmiento,Email)
      VALUES('$nombre_alumno','$apep_alumno','$apem_alumno','$dni_alumno','$domicilio_alumno',
      '$sexo_alumno','$telefono_alumno','$nacimiento_alumno','$email_alumno')";
    $consulta2 = "INSERT INTO alumno(idPersona,UspCodAlu)
        VALUES(LAST_INSERT_ID(),'$codigo_alumno')";
      
    if ($this->db->query($consulta)) {
      if ($this->db->query($consulta2)) {
        ///
        $valorid = $this->db->query("SELECT MAX(idPersona) FROM persona");  
        $id = $this->db->recorrer($valorid)[0];
        //echo "el id es: ".$id;  
        //
        $consulta3 = "INSERT INTO usuario(idPersona,Usuario,Password,imgUsuario,idTipoUsuario,EstadoUsuario,fecha_reg_user)
        VALUES($id,'$nombre_usuario','$password_alumno','$ruta_registro','$tipo_usuario','$estado_alumno','$fecha_actual')";
          $this->db->query($consulta3);
          
          echo '<div class="alert alert-success alert-dismissible" id="correcto">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>&nbsp;Alumno registrado correctamente
            </div>';
      }
        
    //  return true;
    }else{
      return false;
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
    $this->db->close();
  }
  
}
function modificar_alumno($id_alumno,$nom_alumno,$apep_alumno,$apem_alumno,$direccion_alumno,$telefono_alumno,$ruta_registro){
$sql = "UPDATE alumno a INNER JOIN persona p ON a.idPersona = p.idPersona INNER JOIN usuario u ON u.idPersona = a.idPersona 
SET p.NomPersona = '$nom_alumno',p.ApePaterno = '$apep_alumno', p.ApeMaterno = '$apem_alumno',u.imgUsuario = '$ruta_registro',p.Direccion = '$direccion_alumno',p.Telefono = '$telefono_alumno' WHERE a.idAlumno = $id_alumno";
  
if ($this->db->query($sql)) {
  echo '<div class="alert alert-success alert-dismissible" id="correcto">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i>&nbsp;Modificado correctamente
    </div>';
}else{
  echo '<div class="alert alert-danger alert-dismissible" id="correcto">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-times"></i>&nbsp;Ocurrio un Error
    </div>';
}
//$this->db->liberar($sql);  
$this->db->close();
}

function listar_alumno($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT a.idAlumno, p.NomPersona, p.ApePaterno, p.ApeMaterno, p.DNI, a.UspCodAlu,p.Email, p.Sexo, u.imgUsuario, p.Direccion, p.Telefono FROM alumno a INNER JOIN persona p ON a.idPersona = p.idPersona INNER JOIN usuario u ON u.idPersona = a.idPersona
     WHERE p.ApePaterno LIKE '%".$valor."%'OR p.DNI LIKE '%".$valor."%' ORDER BY a.idAlumno DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT a.idAlumno, p.NomPersona, p.ApePaterno, p.ApeMaterno, p.DNI, a.UspCodAlu,p.Email, p.Sexo, u.imgUsuario, p.Direccion, p.Telefono FROM alumno a INNER JOIN persona p ON a.idPersona = p.idPersona INNER JOIN usuario u ON u.idPersona = a.idPersona
     WHERE p.ApePaterno LIKE '%".$valor."%'OR p.DNI LIKE '%".$valor."%' ORDER BY a.idAlumno DESC";
  }
  $resultado = $this->db->query($sql);
  
  /*
  if ($this->db->rows($resultado) > 0) {
    echo "no datos ";
  }

*/
  $arreglo = array();
  while($re =$this->db->recorrer($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
    $arreglo[] = $re;
  }
  return $arreglo;
  $this->db->liberar($sql);
  $this->db->close();

}

function listar_alumno2($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT a.idAlumno, p.NomPersona, p.ApePaterno, p.ApeMaterno, p.DNI, a.UspCodAlu,p.Email, FROM alumno a INNER JOIN persona p ON a.idPersona = p.idPersona INNER JOIN usuario u ON u.idPersona = a.idPersona
     WHERE p.ApePaterno LIKE '%".$valor."%'OR p.DNI LIKE '%".$valor."%' ORDER BY a.idAlumno DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT a.idAlumno, p.NomPersona, p.ApePaterno, p.ApeMaterno, p.DNI, a.UspCodAlu,p.Email, FROM alumno a INNER JOIN persona p ON a.idPersona = p.idPersona INNER JOIN usuario u ON u.idPersona = a.idPersona
     WHERE p.ApePaterno LIKE '%".$valor."%'OR p.DNI LIKE '%".$valor."%' ORDER BY a.idAlumno DESC";
  }
  $resultado = $this->db->query($sql);
  
  /*
  if ($this->db->rows($resultado) > 0) {
    echo "no datos ";
  }

*/
  $arreglo = array();
  while($re =$resultado->fetch_array(MYSQL_NUM)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
    $arreglo[] = $re;
  }
  return $arreglo;
  $this->db->liberar($sql);
  $this->db->close();

}


}

/*
$mod_alumno = new Alumno();
if ($mod_alumno->modificar_alumno('16','mod','mod','mod','66666666','address','666666','666@gmail.com','99999','66666.png')) {
  echo "correcto";
}else{
  echo "error";
}
*/







/*
$instancia = new Alumno();
$resp = $instancia->listar_alumno("",0,1);
print_r($resp);
*/



/*
$instancia = new Alumno();
if ($instancia->registro_alumno('j3o@45gmail.com','45456756','2015/12/12','julioo','corpus','mechato','ppaoo','346456','23','M','passwordd')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}


*/
 ?>
