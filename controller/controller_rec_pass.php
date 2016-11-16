<?php
include '../core/models/model_conexion.php';
require('../core/bin/funciones/rec_pass_template.php');

$email_rec = $_POST['emaill'];
$email_rec2 = trim($email_rec);
if (!empty($email_rec2)) {
  $db = new Conexion2;
  $sql = $db->query("SELECT p.nombre, p.ape_paterno, u.password, p.email FROM usuarios u INNER JOIN persona p on u.id_usuario = p.id_persona WHERE  p.email= '$email_rec2' LIMIT 1 ");
  if ($db->rows($sql) > 0) {
    $data = $db->recorrer($sql);
    $nombre = $data[0];
    $apellido_pat = $data[1];
    $gato_pass = $data[2];
    $nombre_completo = $nombre.' '.$apellido_pat;

    //echo "Se te envio un correo ".$nombre_completo;
    /*************** PHP MAILER ******************/
    /*Lo primero es añadir al script la clase phpmailer desde la ubicación en que esté*/
    //require '../phpmailer/class.phpmailer.php';
    //require '../phpmailer/class.smtp.php';
    require '../phpmailer/PHPMailerAutoload.php';
    //Crear una instancia de PHPMailer
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Definir que vamos a usar SMTP
    $mail->IsSMTP();
    //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
    // 0 = off (producción)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug  = 0;
    //Ahora definimos gmail como servidor que aloja nuestro SMTP
    $mail->Host       = 'smtp.gmail.com';
    //El puerto será el 587 ya que usamos encriptación TLS
    $mail->Port       = 587;
    //Definmos la seguridad como TLS
    $mail->SMTPSecure = 'tls';
    //Tenemos que usar gmail autenticados, así que esto a TRUE
    $mail->SMTPAuth   = true;
    //Definimos la cuenta que vamos a usar. Dirección completa de la misma
    $mail->Username   = "miemail@gmail.com";
    //Introducimos nuestra contraseña de gmail
    $mail->Password   = "contraseñaaqui";
    //Definimos el remitente (dirección y, opcionalmente, nombre)
    $mail->SetFrom($email_rec2, 'Repositorio - contraseña olvidada');
    //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
    $mail->AddAddress($email_rec2, $nombre_completo);
    //Definimos el tema del email
    $mail->Subject = 'Recuperar Contraseña';
    //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
    $mail->MsgHTML(pass_lost_template($nombre_completo,$gato_pass));
    //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
    $mail->AltBody = 'Al parecer olvidaste tu contraseña por aca';
    //Enviamos el correo
    if(!$mail->Send()) {
      echo "Error aqui: " . $mail->ErrorInfo;
    } else {
      echo "Revisa tu correo Electronico";
    }


  /*************** PHP MAILER ******************/

  }else{

    echo "El email <strong>".$email_rec2."</strong> no se ecuentra en el sistema";

  }

}else{
  echo '<div class="alert alert-dismissible alert-danger">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
     <p> Ingresa Tu email</p>
     </div>';
}
$db->liberar($sql);
$db->close();




 ?>
