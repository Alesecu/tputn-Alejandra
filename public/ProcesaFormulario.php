<?php
require '/var/www/vendor/autoload.php'; // Asegúrate de que PHPMailer esté instalado y autoload.php esté en el directorio correcto

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $apellido = htmlspecialchars($_POST['apellido'], ENT_QUOTES, 'UTF-8');
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo 'Correo electrónico no válido.';
        exit;
    }

    // Aquí puedes almacenar el correo electrónico en una base de datos si lo deseas

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mailersend.net'; // Reemplaza con tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'MS_rug964@trial-351ndgw56o5gzqx8.mlsender.net'; // Reemplaza con tu usuario SMTP
        $mail->Password = '0Snc8DXCgymeWRRR'; // Reemplaza con tu contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Puerto TCP para conectarse; usa 465 para SSL

        // Deshabilitar la verificación del certificado SSL (solo para pruebas)
//        $mail->SMTPOptions = array(
//            'ssl' => array(
//                'verify_peer' => false,
//                'verify_peer_name' => false,
//                'allow_self_signed' => true
//            )
//        );

        // Remitente y destinatarios
        $mail->setFrom('amaldonado@trial-351ndgw56o5gzqx8.mlsender.net', 'Alejandra');
        $mail->addAddress($correo, "$nombre $apellido");

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Gracias por registrarte';
        $mail->Body    = "Hola $nombre $apellido,<br><br>Gracias por registrarte. Tu correo electrónico es $correo.<br><br>Saludos,<br>Tu equipo.";

        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Método de solicitud no válido';
}
?>
