<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'mail-content.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->CharSet = 'utf-8';
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'mikkorab@gmail.com';                     // SMTP username
    $mail->Password   = 'good365mood';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mikkorab@gmail.com', 'Михаил Кораблик');
    $mail->addAddress('mikkorab@gmail.com', 'Михаил Кораблик');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('mikkorab@gmail.com', 'Михаил Кораблик');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject; // Получаем из mail-content.php
    $mail->Body    = $content; // Получаем из mail-content.php
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    // Определяем результат выполнения
    $result = array(
        'status' => 'success'
    );
    // Переводим массив в JSON
    echo json_encode($result);

    // echo 'Message has been sent';
} catch (Exception $e) {

    // Определяем результат выполнения
    $result = array(
        'status' => 'error'
    );
    // Переводим массив в JSON
    echo json_encode($result);

    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}