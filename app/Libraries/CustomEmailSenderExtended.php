<?php

namespace App\Libraries;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class CustomEmailSenderExtended {
    public function sendEmail(array $emailData) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $emailData['smtphost'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $emailData['username'];                     //SMTP username
            $mail->Password   = $emailData['password'];                               //SMTP password
        
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($emailData['from'], $emailData['organization']);
            $mail->addAddress($emailData['to'], $emailData['toname']);     //Add a recipient
            // $mail->addAddress('ajoladunni@futa.edu.ng', 'Abimbola');               //Name is optional
            $mail->addReplyTo($emailData['from'], $emailData['organization']);
            if($emailData['cc'] != ''){
                $mail->addCC($emailData['cc'], $emailData['ccname']);
            }
            // $mail->addBCC('something@gmail.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $emailData['subject'];
            $mail->Body    = $emailData['body'];
            $mail->AltBody = strip_tags($emailData['body']);

            // Send it
            $mail->send();
            return 1;
        } catch (Exception $e) {
            return "Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
