<?php 



function contar_alumnos(){
  $db = new Conexion();
  $query =$db->query("SELECT COUNT(*) as total_alumno FROM alumno");
  $resultado = mysqli_fetch_assoc($query);
  echo $resultado['total_alumno'];
  $db->liberar($query);
  $db->close();
}

function contar_tesis_registradas(){
  $db = new Conexion();
  //$query =$db->query("SELECT COUNT(t.idTesis) as registrado FROM tesis t WHERE t.idEstadoPublicacion = 2");
  $query =$db->query("SELECT COUNT(t.idTesis) as registrado FROM tesis t");
  $resultado = mysqli_fetch_assoc($query);
  echo $resultado['registrado'];
  $db->liberar($query);
  $db->close();
}

function contar_tesis_publicadas(){
  $db = new Conexion();
  $query = $db->query("SELECT COUNT(t.idTesis) as publicado FROM tesis t WHERE t.idEstadoPublicacion = 1");
  $resultado = mysqli_fetch_assoc($query);
  echo $resultado['publicado'];
  $db->liberar($query);
  $db->close();
  
}

function contar_trabajadores(){
  $db = new Conexion();
  $query =$db->query("SELECT COUNT(*) as total_trabajadores FROM trabajador");
  $resultado = mysqli_fetch_assoc($query);
  echo $resultado['total_trabajadores'];
  $db->liberar($query);
  $db->close();
}

 ?>


