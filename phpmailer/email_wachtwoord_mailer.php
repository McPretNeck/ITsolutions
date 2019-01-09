<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
Function mailen($email, $naam, $body, $Subject)
{
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'stambeest@gmail.com';                 // SMTP username
    $mail->Password = 'stambeest123';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-repley@stambeest.com', 'Stambeest');
    $mail->addAddress($email, $naam);               // Name is optional
    $mail->addReplyTo('stambeest@gmail.com', 'Stambeest');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $Subject;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo '<div class="container mt-2"></br><p align="Center">Uw gebruikersnaam en wachtwoord is verstuurd naar <b>'.$_POST['email'].'</b>.</p><div align="Center"><a align="Center" href="index.php">Startpagina</a></div></div>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
?>