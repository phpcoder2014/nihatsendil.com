<?php session_start(); ?>
<head>
	<meta charset="utf-8">
</head>
<?php
//ob_start();
require_once("PHPMailerAutoload.php");
$name				= $_POST['contact_name'];
$email				= $_POST['contact_email'];
$message			= $_POST['contact_message'];
$phone				= $_POST['contact_phone'];
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug 		 = 0;
$mail->SMTPAuth 		 = true;
$mail->Host 			 = "smtp.gmail.com";
$mail->SMTPSecure 		 = 'ssl';
$mail->CharSet 			 = 'UTF-8';
$mail->Port			 = 465;
$mail->Username			 = "deneme@gmail.com";
$mail->Password 		 = "password";
$mail->SetFrom($name);
$mail->Subject			 = $name;
$body 	     			 = $message;
$mail->MsgHTML($body . "<br/><br/><br/>E-posta &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;". $email . "<br/>Adı Soyadı :&nbsp;" . $name . "<br/>Telefon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;". $phone);
// hedef adresi ekle
$to = 'deneme@gmail.com';

$mail->AddAddress($to, "Yeni Bir Mesaj Var.!");
// Maili gönder
if(!$mail->Send())
{
echo "Mailer Hata: " . $mail->ErrorInfo;
}
else
{
echo 'Mesajınız başarılı bir şekilde bana ulaştı. Kısa sürede size dönüş yapacağım.';
//header('refresh: 1; url=contact.php'); 
}
//ob_end_flush();
?>

