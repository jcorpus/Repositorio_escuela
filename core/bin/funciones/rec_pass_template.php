<?php

function pass_lost_template($user,$pass_gato){

$mensaje = '
<body>
  <h2>Olvidaste tu Contraseña</h2>
  <p>Hola '.$user.' </p>
  <p>Tu clave es: '.$pass_gato.' </p>

  <footer>
    <p>Equipo de Soporte</p>
  </footer>
</body>
';
  return $mensaje;

}


 ?>
