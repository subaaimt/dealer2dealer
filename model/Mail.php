<?php

require_once('component/PHPMailer/class.phpmailer.php');

class Mail {

    function __construct() {
        
    }

    function sendMail($to, $subject, $body, $from = '') {



//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

        $mail = new PHPMailer();

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = SMTP_HOST;      // sets GMAIL as the SMTP server
        $mail->Port = 465;    
       // $mail->SMTPDebug  = 2;  
// set the SMTP port for the GMAIL server
        $mail->Username = SMTP_USER;  // GMAIL username
        $mail->Password = SMTP_PASSWORD;            // GMAIL password
        if ($from == '')
            $mail->SetFrom(SUPPORT_EMAIL, 'Support Mail');
        else
            $mail->SetFrom($from);

        $mail->Subject = $subject;
        $mail->AddBCC(SMTP_USER);

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

        $mail->MsgHTML($body);

        $mail->AddAddress($to);

        if (!$mail->Send()) {
            return false;
        } else {
            return true;
        }
        
    }

}
