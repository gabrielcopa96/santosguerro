<?php 

// if (isset($_POST['enviar'])) {
// 	if (!empty($_POST['nombre']) && !empty($_POST['asunto']) && !empty($_POST['email']) && !empty($_POST['msg'])) {
// 		$name = $_POST['nombre'];
// 		$asunto = $_POST['asunto'];
// 		$email = $_POST['email'];
// 		$msg = $_POST['msg'];
// 		$header = "From: armysoft20@gmail.com" . "\r\n";
// 		$header.= "Reply-To: marcelocncopa@gmail.com" . "\r\n";
// 		$header.= "X-Mailer: PHP/". phpversion();
// 		$mail = @mail($email, $asunto, $msg, $header);
// 		if ($mail) {
// 			echo "<h4> Enviado Exitosamente! </h4>";
// 		}
// 	}
// }

	$destino= "armysoft20@gmail.com";
	$nombre = $_POST['nombre'];
	$correo = $_POST['email'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['msg'];

	$contenido = "Nombre: ". $nombre . "\nCorreo: " .$correo . "\nAsunto: " . $asunto . "\nMensaje: " . $mensaje;

	mail($destino, $asunto, $contenido);

	header("Location:gracias.html");

    
?>