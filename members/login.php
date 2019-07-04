<?php
	include_once('../header_ui.php');
	include_once('./member_config.php');
	if(!empty($_SERVER['HTTP_REFERER'])) {
		$back_url = $_SERVER['HTTP_REFERER'];
	}

	include_once($member_skin.'/login.php');

	include_once('../footer_ui.php');
?>