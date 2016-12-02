<?php
include '../core/models/model_conexion.php';
require('../core/bin/funciones/rec_pass_template.php');
session_start();
$email_rec = $_POST['emaill'];
$valor_captcha = trim($_POST['valor_captcha']);
$email_rec2 = trim($email_rec);


  if (!empty($valor_captcha) && !empty($email_rec2)) {
    if ($valor_captcha == $_SESSION['key']) {  
      enviar_datos($email_rec2);
    }else{
      echo '<div class="alert alert-dismissible alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <p> Captcha Erroneo</p>
         </div>';
    }
  }else{
    echo '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <p> Faltan Datos...</p>
       </div>';
  }  



function enviar_datos($email_rec2){
  
  $db = new Conexion2;
  $sql = $db->query("SELECT p.NomPersona,p.ApePaterno,u.Password,p.Email FROM usuario u INNER JOIN persona p on u.idPersona = p.idPersona WHERE p.Email='$email_rec2' LIMIT 1 ");
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
    $mail->Username   = "jsuproc@gmail.com";
    //Introducimos nuestra contraseña de gmail
    $mail->Password   = "c.sbakuryowolfbk";
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
      echo '<div class="alert alert-dismissible alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <p>Ocurrió un ERROR, revisa tu conección.</p>
         </div>';
    } else {
      echo '<div class="alert alert-dismissible alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <p>Correcto!.. Revisa tu correo Electrónico </p>
         </div>';
    }


  /*************** PHP MAILER ******************/

  }else{
    echo '<div class="alert alert-dismissible alert-danger">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <p> El email <strong>'.$email_rec2.' no se encuentra en el sistema </strong></p>
       </div>';

  }
  $db->liberar($sql);
  $db->close();

  
}




 ?>
