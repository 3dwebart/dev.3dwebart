<?php
	$header_path = dirname(__FILE__)."/header.php";
	include_once($header_path);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>WELCOME DESIGN WORLD</title>

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
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
	<!-- Fonts END -->

	<!-- Global styles START -->
	<link href="<?php echo($site_home); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Global styles END -->

	<link href="<?php echo($site_home); ?>/assets/css/seh-sidebar.css" rel="stylesheet">
	<link href="<?php echo($site_home); ?>/assets/css/custom.css" rel="stylesheet">
	<script src="<?php echo($site_home); ?>/assets/js/jquery-1.12.0.min.js"></script>
	<script src="<?php echo($site_home); ?>/assets/js/google.font.js"></script>
	<script src="<?php echo($site_home); ?>/assets/js/bootstrap.min.js"></script>
	<!-- Theme styles END -->
</head>
<body>
	<div id="wrapper">

		<!-- Sidebar -->
		<a href="#menu-toggle" class="" id="menu-toggle">
			<span class="sr-only">Toggle navigation</span>
			<i class="fa fa-close"></i>
		</a>
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand">
					<a href="#">
						<img src="<?php echo($site_home); ?>/assets/img/logos/logo.png" alt="">
					</a>
				</li>
				<li>
					<a href="#">HOME</a>
				</li>
				<li>
					<a href="#">ABOUT</a>
				</li>
				<li>
					<a href="#">WORK</a>
				</li>
				<li>
					<a href="#">CONTACT US</a>
				</li>
			</ul>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="detail-content">
					<div>
						<img src="<?php echo($site_home); ?>/assets/img/detail.png" alt="" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->
	<!-- Menu Toggle Script -->
	<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
		$(this).toggleClass("toggled");
	});
	</script>

</body>
</html>