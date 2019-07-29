<?php
	$header_path = dirname(__FILE__)."/header.php";
	include_once($header_path);
	/** 쎄션 데이더 처리 **/
	//include_once($site_home.'session.php');
	//echo($lang);
	//exit();
	$bbs_id = get('bbs_id');

	if(empty($session_user_level)) {
		$session_user_level = 5;
	}
?>
<!doctype html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title>3D MAYA &amp; WEB DEVELOPER &amp; WEB ARTIST GETHWRING</title>
	<!-- Head BEGIN -->

	<meta name="google-site-verification" content="String_we_ask_for">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta content="Metronic Shop UI description" name="description">
	<meta content="Metronic Shop UI keywords" name="keywords">
	<meta content="keenthemes" name="author">

	<meta property="og:site_name" content="-CUSTOMER VALUE-">
	<meta property="og:title" content="-CUSTOMER VALUE-">
	<meta property="og:description" content="-CUSTOMER VALUE-">
	<meta property="og:type" content="website">
	<meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
	<meta property="og:url" content="-CUSTOMER VALUE-">

	<link rel="shortcut icon" href="<?php echo($site_home); ?>/favicon.ico">

	<!-- Fonts START -->
	<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900|Julius+Sans+One|Tajawal:200,300,400,500,700,800,900&display=swap" rel="stylesheet">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
	<!-- Fonts END -->

	<!-- Global styles START -->
	<link href="<?php echo($site_home); ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Global styles END -->

	<!-- Page level plugin styles START -->
	<link href="<?php echo($site_home); ?>/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
	<!-- Page level plugin styles END -->

	<!-- Theme styles START -->
	<link href="<?php echo($site_home); ?>/assets/global/css/components.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/frontend/layout/css/style.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
	<link href="<?php echo($site_home); ?>/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/frontend/layout/css/themes/blue.css" rel="stylesheet" id="style-color">
	<link href="<?php echo($site_home); ?>/assets/frontend/layout/css/common.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/frontend/layout/css/custom.css" rel="stylesheet">
	<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-1.11.2.min.js"></script>
	<!-- Theme styles END -->
	<script src="<?php echo($site_home); ?>/assets/frontend/layout/scripts/common.js"></script>
	<script src="<?php echo($site_home); ?>/assets/frontend/layout/scripts/custom.js"></script>
	<script src="<?php echo($js_home); ?>/device.js"></script>
	<script src="<?php echo($site_home); ?>/js/facebook_login.js"></script>
	<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-tmpl/jquery.tmpl.min.js"></script>
	<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-tmpl/jquery.tmplPlus.min.js"></script>
	<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery.cookie.min.js"></script>
	<script src="<?php echo($site_home); ?>/js/facebook_login.js"></script>
</head>
<!-- Head END -->
<!-- Body BEGIN -->
<body class="corporate">
<form name="myform" class="myform" method="" action="" role="form" enctype="multipart/form-data">
<?php include_once($site_dir."/header.body.nav.php"); ?>
<?php include_once($site_dir."/ajax.passing.php"); ?>

