<?php

session_start();
// require_once 'mailerClass/class.php';
require_once 'admin/mailerClass/PHPMailerAutoload.php';
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "sabscustomerservice@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "ABS01016013070";
//Set who the message is to be sent from
$mail->setFrom('sabscustomerservice@gmail.com', 'ABS');
$send = false;
$content = $_SESSION['content'];
$emails = $_SESSION['emails'];
$name = $_SESSION['name'];
$phone = $_SESSION['phone'];
unset($_SESSION['emails']);
unset($_SESSION['content']);
if (isset($emails) && isset($content)) {
    $mail->addAddress('sabscustomerservice@gmail.com', 'name');
    $mail->Subject = 'ABS Company';
    $mail->Body = "Subject : " . $content . "<br> name  : " . $name . "<br> phone :" . $phone . "<br> Email ID : " . $emails . " <br> Phone No: 01010005895\"</b>";
    $mail->AltBody = 'This is a plain-text message body';
    $mail->isHTML(true);
    if (!$mail->send()) {
        $send = false;
    } else {
        $send = true;
    }
    if ($send == TRUE) {
        header('location:index.php?rt=HomePage/contact&r=1');
    } else {
        header('location:index.php?rt=HomePage/contact&r=-1');
    }
}
?>