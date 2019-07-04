<?php

header("Content-Type: text/html; charset=utf-8");
include_once('../header.php');

$selLang = post('selLang');

$sql = "SELECT language FROM language WHERE language = '%s'";
$result = $db -> query($sql, array($selLang));

$row = $db -> fetch_assoc();

if ($selLang == "ko") // 한국어
{
	include_once('kr.php');
	setcookie('MyCookie', urldecode($selLang), time() + (60 * 60 * 24), '/');
}
else if ($selLang == "en") // 영어
{
	include_once('en.php');
	setcookie('MyCookie', urldecode($selLang), time() + (60 * 60 * 24), '/');
}
else // 일치하는 언어 없으면 영어로 표시
{
	if ($selLang == 'en') {
		include_once('en.php');
		$selLang = $_COOKIE['MyCookie'];
	} else {
		include_once('kr.php');
		$selLang = $_COOKIE['MyCookie'];
	}
	
}

// if($selLang == 'ko') {
// 	include_once('kr.php');
// } else {
// 	include_once('en.php');
// }
// //echo json_encode($strings, 256 );
// $_SESSION['language'] = $row['language'];
//die('<h1>session_language = '.$session_language.'</h1>');
echo json_encode($strings,JSON_UNESCAPED_UNICODE);

?>