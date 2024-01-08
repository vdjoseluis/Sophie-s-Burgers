<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['rememberEmail'])) {

    include ('controller/querys.php');

    try {
        $mail = new PHPMailer(true);
        $recipient = $_POST["recipient"];
        $result= existsEmail($recipient);
        if ($result->num_rows > 0) {
            $dataUser="";   // Almacena la información del body para email.
            while ($row = $result->fetch_assoc()) {
                $dataUser .= "Usuario: " . $row['username'] . "\n";
                $dataUser .= "Contraseña: " . $row['password'] . "\n";
                $dataUser .= "Nombre: " . $row['firstname'] . "\n";
                $dataUser .= "Apellidos: " . $row['surname'] . "\n";
                $dataUser .= "Dirección: " . $row['address'] . "\n";
                $dataUser .= "Teléfono: " . $row['phone'] . "\n";
                $dataUser .= "Email: " . $row['email'] . "\n";
            }
        }
        // Servidor SMTP
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

        // Remitente y destinatario
        $mail->SetFrom('jlvasquez80@gmail.com', 'Sophie s Burgers');
        $mail->AddAddress($_POST["recipient"]);

        $mail->Subject = "Recordatorio de datos de acceso - Sophie's Burgers";
        $mail->Body = $dataUser;

        $mail->CharSet = 'UTF-8';
        $mail->send();
        echo "<script>alert ('Hemos enviado un email con tus datos registrados'); 
                    window.location.href = 'index.php?content=login';
              </script>"; 
    } catch (Exception $e) {
        echo "<script>alert ('Error al enviar el email o el usuario no existe');
                      window.location.href = 'index.php?content=login';
              </script>"; 
    } 
}
?>