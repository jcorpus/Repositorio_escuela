<?php


  #constantes

  session_start();

  #fecha de la pag
  define('YEAR_APLICACION', 'Derchos Reservados '.date('Y',time()).' - Repositorio');
  #constantes de conexion
  define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PASS','');
  define('DB_NAME','repositorio01');



  #estructura
  require('core/models/classConexion.php');

 ?>
