<?php
	$header_path = dirname(__FILE__)."/../header.php";
	include_once($header_path);
	/** 쎄션 데이더 처리 **/
	//include_once($site_home.'session.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Maya Love</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<?php include_once('./header_css.php'); ?>

	<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		
	<script src="<?php echo($site_home); ?>/assets/admin/layout/scripts/custom.js" type="text/javascript"></script>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<form action="" method="" name="MyForm" class="MyForm" enctype="multipart/form-data" role="form">
	<?php include_once($admin_dir.'/top.php'); ?>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
	<?php include_once($admin_dir.'/side_menu.php'); ?>