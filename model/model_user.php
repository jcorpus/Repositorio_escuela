<?php

////EJEMPLO
//http://www.apoyoti.com/clase-simple-en-php-para-conexion-a-base-de-datos-mysql/

class Usuario {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion2();
  }


  function registro_user($nombre_user,$dni_user,$apep_user,$apem_user,$domicilio_user,$telefono_user,$edad_user,
  $email_user,$sexo_user,$password_user,$nacimiento_user,$ruta_registro){
    $verificar = $this->db->query("SELECT email FROM persona WHERE email='$email_user' LIMIT 1");
    if ($this->db->rows($verificar) == 0) {
      $consulta = "INSERT INTO persona(nombre,ape_paterno,ape_materno,dni,domicilio,telefono,email,
        sexo,fecha_nacimiento, edad)
        VALUES('$nombre_user','$apep_user','$apem_user','$dni_user','$domicilio_user',
        '$telefono_user','$email_user','$sexo_user','$nacimiento_user','$edad_user')";
      $consulta2 = "INSERT INTO usuarios(id_persona,usuario,password,img_usuario)
          VALUES(LAST_INSERT_ID(),'$nombre_user','$password_user','$ruta_registro')";

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
      if (strtolower($email_user) == strtolower($email_verificar)) {
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;El email ya esta registrado
          </div>';
      }
    }
    $this->db->close();
  }

  function editar_user($nombre_user,$apep_user,$apem_user){
    $sql = $this->db->query("SELECT nombre FROM prueba WHERE nombre='$nombre_user' LIMIT 1; ");
    if ($this->db->rows($sql) == 0) {
      $consulta = "INSERT INTO prueba(nombre,ape_paterno,ape_materno)
        VALUES('$nombre_user','$apep_user','$apem_user')";
      $this->db->query($consulta);
      $this->db->close();
      $respuesta = "usuario registrado correctamente";
      echo $respuesta;

    }else{
      $usuario = $this->db->recorrer($sql)[0];
      if (strtolower($nombre_user) == strtolower($usuario)) {
        $respuesta = "EL USUARIO YA EXISTE LOL";
        echo  $respuesta;
      }
    }

  /*
    $consulta = "INSERT INTO prueba(nombre,ape_paterno,ape_materno)
      VALUES('$nombre_user','$apep_user','$apem_user')";
    $this->db->query($consulta);
    $this->db->close();
  */
  }

/*
SELECT p.id_persona, p.nombre, p.ape_paterno, p.ape_materno, p.dni, p.domicilio,p.telefono,p.email,p.sexo, p.edad, u.id_usuario, u.usuario, u.password, u.permisos, u.img_usuario FROM usuarios u INNER JOIN persona p on u.id_usuario = p.id_persona
WHERE p.ape_paterno LIKE '%k%' OR p.dni LIKE '%h%' ORDER BY p.id_persona DESC LIMIT 0,2

SELECT * FROM persona ORDER BY persona.id_persona DESC

*/

  function listar_user($valor, $inicio=FALSE,$limite=FALSE){
    if ($inicio!==FALSE && $limite!==FALSE) {
      $sql = "SELECT u.idUsuario,u.Usuario,p.NomPersona,p.ApePaterno,p.ApeMaterno,u.EstadoUsuario,u.fecha_reg_user,tp.DesTipoUsuario,p.Email FROM usuario u INNER JOIN persona p ON u.idPersona = p.idPersona INNER JOIN tipousuario tp ON u.idTipoUsuario = tp.idTipoUsuario
      WHERE u.Usuario LIKE '%".$valor."%' ORDER BY u.idUsuario DESC LIMIT $inicio,$limite";
    }else{
      $sql = "SELECT u.idUsuario,u.Usuario,p.NomPersona,p.ApePaterno,p.ApeMaterno,u.EstadoUsuario,u.fecha_reg_user,tp.DesTipoUsuario,p.Email FROM usuario u INNER JOIN persona p ON u.idPersona = p.idPersona INNER JOIN tipousuario tp ON u.idTipoUsuario = tp.idTipoUsuario
      WHERE u.Usuario LIKE '%".$valor."%' ORDER BY u.idUsuario DESC";
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

function mod_user_perfil($password_user,$id_user_perfil){
  $sql = "UPDATE usuario SET usuario.Password = '$password_user' WHERE usuario.idUsuario =$id_user_perfil";
  if ($this->db->query($sql)) {
    echo '<div class="alert alert-success alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-check"></i>&nbsp;Contraseña Modificada Correctamente.
      </div>';
  }else{
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Ocurrió un ERROR.
      </div>';
  }
  
}

/***************lista de tipo usuario***************/
function listar_tipouser(){
  $sql = "SELECT * from tipousuario where tipousuario.DesTipoUsuario !='alumno'";
  $consulta = $this->db->query($sql);
  $arreglo = array();
  if($this->db->rows($consulta) > 0){
    while($consulta_b =$this->db->recorrer($consulta)){
      $arreglo[] = $consulta_b;
    }

  }else{
    echo "no hay datos a mostrar";
  }

  $this->db->liberar($consulta);
  $this->db->close();
  return $arreglo;
}




}

/*
$instancia = new Usuario();
$resp = $instancia->listar_user("",0,1);
print_r($resp);
*/
/*
$instancia = new Usuario();
if ($instancia->registro_user('julio','45456756','corpus','mechato','ppao','456464','12','julio@gmal.com','m','julio','2015/12/12','prueba.png')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}
*/
/*

$instancia = new Usuario();

$var = $instancia->editar_user('julioo','corpus','mechato');
*/

 ?>
