<?php

class Trabajador{
  private $db;
  public function __construct(){
  require_once('../core/models/model_conexion.php');
  $this->db = new Conexion2();
}

/*
INSERT INTO persona (`NomPersona`,`ApePaterno`,`ApeMaterno`,`DNI`,`Direccion`,`Sexo`,`Telefono`,`FechaNacimmiento`,`Email`)
VALUES ('julio','corpus','mecabt','45343231','ppao','m','34434','2014-11-11','doombakuryo@gmail.net')
*/


function registro_trabajador($email_trabajador,$dni_trabajador,$nacimiento_trabajador,$fecha_actual,$nombre_trabajador,$nombre_usuario,
$apep_trabajador,$apem_trabajador,$domicilio_trabajador,$telefono_trabajador,$sexo_trabajador,$password_trabajador,$ruta_registro,$codigo_trabajador,
$estado_trabajador,$tipo_usuario){
  $verificar = $this->db->query("SELECT persona.Email FROM persona WHERE persona.Email = '$email_trabajador' LIMIT 1");
  if ($this->db->rows($verificar) == 0) {
    $consulta = "INSERT INTO persona(NomPersona,ApePaterno,ApeMaterno,DNI,Direccion,Sexo,Telefono,FechaNacimmiento,Email)
      VALUES('$nombre_trabajador','$apep_trabajador','$apem_trabajador','$dni_trabajador','$domicilio_trabajador',
      '$sexo_trabajador','$telefono_trabajador','$nacimiento_trabajador','$email_trabajador')";
    $consulta2 = "INSERT INTO trabajador(idPersona,UspCodTra)
        VALUES(LAST_INSERT_ID(),'$codigo_trabajador')";
      
    if ($this->db->query($consulta)) {
      if ($this->db->query($consulta2)) {
        ///
        $valorid = $this->db->query("SELECT MAX(idPersona) FROM persona");  
        $id = $this->db->recorrer($valorid)[0];
        //echo "el id es: ".$id;  
        //
        $consulta3 = "INSERT INTO usuario(idPersona,Usuario,Password,imgUsuario,idTipoUsuario,EstadoUsuario,fecha_reg_user)
        VALUES($id,'$nombre_usuario','$password_trabajador','$ruta_registro','$tipo_usuario','$estado_trabajador','$fecha_actual')";
          $this->db->query($consulta3);
          
          echo '<div class="alert alert-success alert-dismissible" id="correcto">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>&nbsp;Usuario registrado correctamente
            </div>';
      }
        
    // return true;
    }else{
      return 0;
    }
    $this->db->liberar($verificar);
    $this->db->close();
  }else{
    $email_verificar = $this->db->recorrer($verificar)[0];
    if (strtolower($email_trabajador) == strtolower($email_verificar)) {
      echo '<div class="alert alert-warning alert-dismissible" id="correcto">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-times"></i>&nbsp;El email ya esta registradoop
        </div>';
    }
    $this->db->close();
  }
  
}





function listar_trabajador($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT p.idPersona, p.NomPersona, p.ApePaterno, p.ApeMaterno, p.DNI, t.UspCodTra,t.idTrabajador,p.Email, p.Sexo,p.Direccion
    FROM persona p inner JOIN trabajador t ON p.idPersona = t.idPersona WHERE p.ApePaterno LIKE '%".$valor."%' OR p.DNI LIKE '%".$valor."%' ORDER BY t.idTrabajador DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT p.idPersona, p.NomPersona, p.ApePaterno, p.ApeMaterno, p.DNI, t.UspCodTra,t.idTrabajador,p.Email, p.Sexo,p.Direccion
    FROM persona p inner JOIN trabajador t ON p.idPersona = t.idPersona WHERE p.ApePaterno LIKE '%".$valor."%' OR p.DNI LIKE '%".$valor."%' ORDER BY t.idTrabajador DESC";
  }
  $resultado = $this->db->query($sql);
  $arreglo = array();
  while($re =$this->db->recorrer($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
    $arreglo[] = $re;
  }
  return $arreglo;
  $this->db->liberar($sql);
  $this->db->close();

}






}

/*
$instancia = new Trabajador();
$resp = $instancia->listar_trabajador("",0,4);
print_r($resp);
*/


/*
$instancia = new Trabajador();
if ($instancia->registro_trabajador('doo65f4@gmail.com','45456756','2015-12-12','2016-11-26','julioo','user_nomb','corpus','mechato','ppaoo','346456','M','passwordd','html/img_server/user-default.png','1112101346','activo','1')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}

*/



 ?>
