<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendMail($email_details, $config){


    $mail = new PHPMailer(true);

    try {+

        $mail->SMTPDebug = 2;				
        $mail->isSMTP();											
        $mail->Host	 = $config['host'];					
        $mail->SMTPAuth = true;							
        $mail->Username = $config['username'];				
        $mail->Password = $config['password'];						
        $mail->SMTPSecure = 'tls';							
        $mail->Port	 = 587;
        $mail->setFrom($config['sender_address'], $config['sender_name']);		
        $mail->addAddress($email_details['recipient_address']);
        //$mail->addAddress('recipient2@example.com', 'Name');
        $mail->isHTML(true);								
        $mail->Subject = $email_details['subject'];
        $mail->Body = $email_details['body'];
        $mail->AltBody = $email_details['alt_body'];
        $mail->send();
        echo "Mail has been sent successfully!";
    
    } catch (Exception $e) {
    
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
    }

}




?>