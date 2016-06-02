<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");


// HTMLSP
function h($str){
	return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

// Return
$re = "\r\n";
$re2 = "\r\n\r\n";

if (isset($_POST['submit_contact'])) {

    $mail       = $_POST['staffmail'];
    $name       = $_POST['staffname'];
    $toname     = $_POST['staffto'];
    $title 		= $_POST['subject'];
    $msg        = $_POST['staffoffer'];

	$to      = 'k.ogata@ryukoshanw.co.jp';
	$subject = 'RNWポータルサイトから投稿がありました。';
	$message = '【TITLE】'.$re.$title.$re2.'【FROM】'.$re.$mail.$re2.'【TO】'.$re.$toname.$re2.'【NAME】'.$re.$name.$re2.'【MESSAGE】'.$re.$msg;
	$headers = 'From: info@ryukoshanw.co.jp' . "\r\n";
	$headers .= 'Cc: h.ishimaru@ryukoshanw.co.jp' . "\r\n";
	$headers .= 'Cc: omi@ryukoshanw.co.jp' . "\r\n";

	mb_send_mail($to, $subject, $message, $headers);

	header("Location:http://www.ryukoshanw.co.jp/staff_only/contents/contact.php?send=ok");

}