<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

error_reporting(E_ALL);

ini_set("display_errors", 1);

include_once('include/common.php');

$name    = post('name');
$tel     = post('tel');
$email   = post('email');
$tel     = post('tel');
$subject = post('subject');
$content = post('content');

if(empty($subject)) {
	$subject = '문의합니다.';
}

//die('<h1>NAME = '.$name.'</h1><h1>TEL = '.$tel.'</h1><h1>EMAIL = '.$email.'</h1>');

require 'class.phpmailer.php';

try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	//$body             = file_get_contents('contents.html');
	//$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->CharSet    = "utf8";                  // Character-set
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "mail.google.com"; // SMTP server
	$mail->Username   = "3d.web.artist@gmail.com";     // SMTP server username
	$mail->Password   = "kizero@4349";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail

	$mail->AddReplyTo("3d.web.artist@gmail.com","신청");

	$mail->From       = $email;
	$mail->FromName   = $name;

	$to = "3dwebart@naver.com";

	$mail->AddAddress($to);

	$mail->Subject  = $subject;

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($name.'<br />'.$tel.'<br />'.$email.'<br />'.$subject.'<br />'.$content);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();
	//echo 'Message has been sent.';
	redirect('index.html', '문의 내용이 성공적으로 보내졌습니다.');
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>