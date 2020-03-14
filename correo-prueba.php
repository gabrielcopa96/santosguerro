<?php

	$nombre = $_POST['nombre'];
	$correo = $_POST['email'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['msg'];

	$body = "Correo: " . $correo . "<br>Asunto: " . $asunto . "<br>Mensaje: " .$mensaje;

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	requiere 'PHPMailer/Exception.php';
	requiere 'PHPMailer/PHPMailer.php';
	requiere 'PHPMailer/SMTP.php';


	require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp1.example.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     // SMTP username
    $mail->Password   = 'secret';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($correo , $nombre);
    $mail->addAddress('gabrielcncopa@gmail.com');     // Add a recipient
                   // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Hola estoy enviando el correo desde el local host';
    $mail->Body    = 'Segundo correo de prueba</b>';

    $mail->send();
    echo '<script>
		alert("El mensaje se envio correctamente");
		window.history.go(-1);
    ';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}

?>