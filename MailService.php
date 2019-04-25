<?php

class MailService {

    function __construct() {
        require_once './PHPMailer-master/PHPMailerAutoload.php';
    }

    public function sendMail($subject, $body, $target) {
        $mail = new PHPMailer();
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'matearafsh@gmail.com';                 // SMTP username
        $mail->Password = 'graduationproject';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('matearafsh@gmail.com', 'matearafshTeam');
        $mail->addAddress($target);     // Add a recipient               // Name is optional
        // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject . rand();
        $mail->Body = $body;

        if (!$mail->Send()) {
            return $mail->ErrorInfo;
        }
        /* else {
            echo 'Hello Hello heeeeeh lolololololoy';
        }*/
    }

}
