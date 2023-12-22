<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) ||
 !isset($_POST["email"]) || 
 !isset($_POST["mensaje"]) ||
 !isset($_POST["countryCode"]) ||
 !isset($_POST["phoneNumber"]) ||
  ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];
$compay = $_POST["company"];
$countryCode = $_POST["countryCode"];
$phoneNumber = $_POST["phoneNumber"];
$fromTime = $_POST["fromTime"];
$toTime = $_POST["toTime"];
$toTime = $_POST["mensaje"];



// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "l0030391.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario ="info@juanquinu.com.ar";  // Mi cuenta de correo
$smtpClave = "9TbN*1o5qE";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@juanquinu.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //

$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "DonWeb - Ejemplo de formulario de contacto"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Formulario de ejemplo. By DonWeb<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurrió un error inesperado.";
}
