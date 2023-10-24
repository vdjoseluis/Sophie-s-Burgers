<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\PHPMailer.php'; // Reemplaza con la ruta correcta a tu archivo de autoloader de PHPMailer

if (isset($_POST["rememberEmail"])) {
    require('controller/querys.php');
    $recipient = $_POST["recipient"];

    $mensaje = $_POST["mensaje"];
    $datos = array(
        'username' => 'John',
        'password' => 'Doe'
    );

    while ($row= mysqli_fetch_assoc(existsEmail($recipient))) {
        $data = array(
            'username' => $row['username'],
            'password' => $row['password']
        );

        if ($fila['CategoryID']== $default){
            echo "<option value='". $fila['CategoryID']."' selected>". $fila['Name']."</option>";
        } else {
            echo "<option value='". $fila['CategoryID']."'>". $fila['Name']."</option>";
        }
    }	
    
    // Crea una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configura el servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Reemplaza con el servidor SMTP de tu proveedor de correo
        $mail->SMTPAuth = true;
        $mail->Username = 'jlvasquez80@gmail.com'; // Reemplaza con tu dirección de correo
        $mail->Password = 'Escorpion#007jl80'; // Reemplaza con tu contraseña
        $mail->SMTPSecure = 'ssl'; // Puede ser 'ssl' o 'tls'
        $mail->Port = 587; // Puerto SMTP, consulta con tu proveedor de correo

        // Configura el remitente y destinatario
        $mail->setFrom('jlvasquez80@gmail.com', 'Sophie s Burgers');
        $mail->addAddress($recipient);

        // Configura el asunto y el mensaje
        $mail->Subject = 'Recordatorio de datos de acceso - Sophie s Burgers';
        $mail->Body = $mensaje;

        // Envía el correo
        $mail->send();
        echo 'El correo se ha enviado con éxito a ' . $recipient;
    } catch (Exception $e) {
        echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>
