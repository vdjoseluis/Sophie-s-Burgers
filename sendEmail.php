<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jlvasquez80@gmail.com';
$env = parse_ini_file('.env');
$password = $env['PASSWORD_SMTP_GMAIL'];
$mail->Password = $password;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

include ('controller/functions.php');

if (isset($_POST['rememberEmail'])) {
    try {
        $recipient = $_POST["recipient"];
        $result = existsEmail($recipient);
        if ($result->num_rows > 0) {
            $dataUser = "";   // Almacena la información del body para el email.
            while ($row = $result->fetch_assoc()) {
                $dataUser .= "Usuario: " . $row['username'] . "\n";
                $dataUser .= "Contraseña: " . $row['password'] . "\n";
                $dataUser .= "Nombre: " . $row['firstname'] . "\n";
                $dataUser .= "Apellidos: " . $row['surname'] . "\n";
                $dataUser .= "Dirección: " . $row['address'] . "\n";
                $dataUser .= "Teléfono: " . $row['phone'] . "\n";
                $dataUser .= "Email: " . $row['email'] . "\n";
            }

            // Remitente y destinatario
            $mail->SetFrom('jlvasquez80@gmail.com', 'Sophie s Burgers');
            $mail->AddAddress($_POST["recipient"]);

            // Asunto y cuerpo del mensaje
            $mail->Subject = "Recordatorio de datos de acceso - Sophie's Burgers";
            $mail->Body = $dataUser;

            $mail->CharSet = 'UTF-8';
            $mail->send();

            echo "¡ Hemos enviado un email con tus datos registrados !";
            header("Location: index.php?content=login");
            exit;
        } else {
            echo "Error al enviar el email o algún dato no es válido";
            header("Location: index.php?content=login");
            exit;
        }
    } catch (Exception $e) {
        echo "Error al enviar el email". $e->getMessage();
        header("Location: index.php");
        exit;
    } 

} elseif (isset($_POST['contactUs'])) {

    try {
        // Remitente y destinatario
        $mail->SetFrom('jlvasquez80@gmail.com', 'Sophie s Burgers');
        $mail->AddAddress($_POST["email"]); 

        // Asunto y cuerpo del mensaje
        $mail->Subject = "Respuesta a tu solicitud de contacto con Sophie s Burgers";
        $mail->Body = "Hola " .$_POST['firstname']. ", gracias por contactarnos, en breve nos comunicaremos contigo ofreciéndote la asistencia que has solicitado.";

        $mail->CharSet = 'UTF-8';
        $mail->send();

        echo "¡ Hemos enviado una respuesta a tu solicitud !";
        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        echo "Error en el envio de tu solicitud o algún dato no es válido" .$e->getMessage();
        header("Location: index.php");
        exit;    
    } 
} elseif (isset($_POST['applyJob'])) {
        try {
            // Remitente y destinatario
            $mail->SetFrom('jlvasquez80@gmail.com', 'Sophie s Burgers');
            $mail->AddAddress($_POST["email"]);

            // Asunto y cuerpo del mensaje
            $mail->Subject = "Respuesta a tu solicitud de empleo a Sophie s Burgers";
            $mail->Body = "Hola " . $_POST['firstname'] . ", estaremos encantados de que formes parte de nuestro equipo. Analizaremos tus datos y si encajas y/o consideramos oportuno, contactaremos contigo para afinar detalles. \nUn saludo y hasta pronto.";

            $mail->CharSet = 'UTF-8';
            if (checkAddress($_POST['address'])) {
                $mail->send();
            }

            echo "¡ Hemos enviado una respuesta a tu solicitud !";
            header("Location: index.php");
            exit;
        } catch (Exception $e) {
            echo "Error en el envio de tu solicitud o algún dato no es válido" . $e->getMessage();
            header("Location: index.php");
            exit;
        }
 
}
?>