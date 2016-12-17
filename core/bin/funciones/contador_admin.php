<?php 



function contar_alumnos(){
  $db = new Conexion();
  $query =$db->query("SELECT COUNT(*) as total_alumno FROM alumno");
  $resultado = mysqli_fetch_assoc($query);
  echo $resultado['total_alumno'];
  $db->liberar($query);
  $db->close();
}

function contar_tesis(){
  $db = new Conexion();
  $query =$db->query("SELECT COUNT(*) as total_tesis FROM tesis");
  $resultado = mysqli_fetch_assoc($query);
  echo $resultado['total_tesis'];
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


