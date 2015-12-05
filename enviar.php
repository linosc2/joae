<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aqu� va el t�tulo de la p�gina -->

</head>

<body>
<?php

$nombre = utf8_decode($_POST['nombre']);
$email = utf8_decode($_POST['email']);
$asunto = utf8_decode($_POST['asunto']);
$mensaje = utf8_decode($_POST['mensaje']);


	if ($nombre=='' || $email==''){
	
	echo "<script>alert('El llenado de los campos es obligatorio');location.href ='javascript:history.back()';</script>";
	
	}
	else {
	
	require("includes/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = "$email";
    $mail->FromName = "$nombre"; 
     $mail->AddAddress("contactos@joae.com.mx"); ///// Dirección de correo a la que llegaran los datos /////
	
///// Aquí van los datos que apareceran en el correo que reciba /////

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "CONTACTO";
    $mail->Body     = "<html><body>". 
	"<div style='width:100%; min-height:100%; margin: 0 auto;'>".
                     "<img src='http://joae.com.mx/joae.png' width='150'  height='131'><br><br>".
					 "<div style='margin:0 auto; float:inherit; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#103b63; width:100%;'>".
	"<div style='float:left; border:1px solid #103b63; margin-top:0.2%; color:#103B63; padding:5px; width:90%;'><span style='color:#600d04'>NOMBRE:</span> $nombre </div><br><br>".
	"<div style='float:left; border:1px solid #103b63; margin-top:0.2%; color:#103B63; padding:5px; width:90%;'><span style='color:#600d04'>EMAIL:</span> $email </div><br><br>".
	"<div style='float:left; border:1px solid #103b63; margin-top:0.2%; color:#103B63; padding:5px; width:90%;'><span style='color:#600d04'>ASUNTO:</span> $asunto </div><br><br>".
	"<div style='float:left; border:1px solid #103b63; margin-top:0.2%; color:#103B63; padding:5px; width:90%;'><span style='color:#600d04'>MENSAJE:</span> $mensaje </div><br><br>".
	
	"</div>".		
	"</div>".
	"</body></html>".


///// Datos del servidor SMTP /////
    $mail->IsSMTP(); 
    $mail->Host = "mail.joae.com.mx:2525";  // Servidor de Salida.
	$mail->SMTPAuth = true; 
    $mail->Username = "contactos@joae.com.mx";  // Correo Electrónico
    $mail->Password = "programadores"; // Contraseña
//// Estos son las configuraciones del servidor de salida /////

	
	if ($mail->Send())
	{
    echo "<script>alert('Tu petición ha sido enviada');location.href ='http://joae.com.mx';</script>";
	}
    else
	{
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";	
	}
	
	} 

?>

</body>
</html>