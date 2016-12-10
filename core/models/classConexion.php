<?php

///http://php.net/manual/es/mysqli.construct.php

date_default_timezone_set('America/Lima');
class Conexion extends mysqli{
  public function __construct(){
    parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $this->connect_errno ? die('ERROR EN LA CONEXION A LA DB') : null;
    $this->set_charset("utf8");

  }
  public function rows($query){
    return mysqli_num_rows($query);//Obtiene el número de filas de un resultado
  }

  public function liberar($query){
    return mysqli_free_result($query);//Libera la memoria asociada a un resultado
  }

  public function recorrer($query){
    return mysqli_fetch_array($query);//Obtiene una fila de resultados como un array asociativo, numérico, o ambos
  }

}

 ?>
