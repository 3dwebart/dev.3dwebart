<?php
	include_once('../header.php');
	$url = post('chartLink');
	include_once($site_dir.'/highchart/'.$url);
	$html = '';
?>