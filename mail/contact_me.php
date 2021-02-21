<?php



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 3;
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->Host = "smtp.office365.com";
    $mail->SMTPAuth = true;                  
    $mail->Username = "example@hotmail.com";
    $mail->Password = "secure"; 
    $mail->SMTPSecure = "tls";  
    $mail->Port = 587; //587 // 25;
    //Recipients
    $mail->setFrom('example@hotmail.com', 'Mailer');
    $mail->addAddress('secure@gmail.com', 'Reinastäd & Service');     //Add a recipient

    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email_address = $_GET['email'];
    $message = $_GET['message'];
    
    $email_subject = "Website forma de contacto:";
    $email_body = "Has recibido un nuevo mensaje de tu forma de contacto.\n\n"."Aqui los detalles:\n\nName: $name\n\nPhone: $phone\n\nEmail: $email_address\n\nMessage:\n$message";

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mensaje de forma de contacto';
    $mail->Body    = $email_body;
    $mail->AltBody = strip_tags($email_body);

    $mail->send();
    echo 'Your Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


	
			
?>