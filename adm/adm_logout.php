<?php
	include_once('header_ui.php');

	session_destroy();
	redirect($admin_home.'/index.php', '안녕히 가세요', FALSE);

	include_once('footer_ui.php');
?>