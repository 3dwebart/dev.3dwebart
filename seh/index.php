<?php
	$header_path = dirname(__FILE__)."/header.php";
	include_once($header_path);
	
	error_reporting(E_ALL);
ini_set("display_errors", 1);
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
	<link href="<?php echo($site_home); ?>/assets/css/doc-menu.css" rel="stylesheet">
	<!-- Global styles END -->

	<link href="<?php echo($site_home); ?>/assets/css/custom.css" rel="stylesheet">
	<script src="<?php echo($site_home); ?>/assets/js/jquery-1.12.0.min.js"></script>
	<script src="<?php echo($site_home); ?>/assets/js/google.font.js"></script>
	<script src="<?php echo($site_home); ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo($site_home); ?>/assets/js/interface.js"></script>
	<!-- Theme styles END -->
</head>
<body>
<div class="col-md-3 col-xs-12 side-menus">
	<div class="logo">
		<img src="<?php echo($site_home); ?>/assets/img/logos/logo.png" alt="WELCOME DESIGN WORLD" class="img-responsive" />
	</div>
	<ul class="menus">
		<li>
			<a href="<?php echo($site_home); ?>">HOME</a>
		</li>
		<li>
			<a href="<?php echo($site_home); ?>/#">ABOUT</a>
		</li>
		<li>
			<a href="<?php echo($site_home); ?>/#">WORK</a>
		</li>
		<li>
			<a href="<?php echo($site_home); ?>/#">CONTACT US</a>
		</li>
	</ul>
</div>
<div class="detail-contents col-md-offset-3 col-md-9 col-xs-12">
	<img src="<?php echo($site_home); ?>/assets/img/detail.png" alt="" class="img-responsive">
	<!--bottom dock -->
	<div class="dock" id="dock2">
		<div class="dock-container2">
			<a class="dock-item2" href="#"><span>Home</span><img src="<?php echo($site_home); ?>/assets/img/icons/home.png" alt="home" /></a> 
			<a class="dock-item2" href="#"><span>Contact</span><img src="<?php echo($site_home); ?>/assets/img/icons/email.png" alt="contact" /></a> 
			<a class="dock-item2" href="#"><span>Portfolio</span><img src="<?php echo($site_home); ?>/assets/img/icons/portfolio.png" alt="portfolio" /></a> 
			<a class="dock-item2" href="#"><span>Music</span><img src="<?php echo($site_home); ?>/assets/img/icons/music.png" alt="music" /></a> 
			<a class="dock-item2" href="#"><span>Video</span><img src="<?php echo($site_home); ?>/assets/img/icons/video.png" alt="video" /></a> 
			<a class="dock-item2" href="#"><span>History</span><img src="<?php echo($site_home); ?>/assets/img/icons/history.png" alt="history" /></a> 
			<a class="dock-item2" href="#"><span>Calendar</span><img src="<?php echo($site_home); ?>/assets/img/icons/calendar.png" alt="calendar" /></a> 
			<a class="dock-item2" href="#"><span>Links</span><img src="<?php echo($site_home); ?>/assets/img/icons/link.png" alt="links" /></a> 
			<a class="dock-item2" href="#"><span>RSS</span><img src="<?php echo($site_home); ?>/assets/img/icons/rss.png" alt="rss" /></a> 
			<a class="dock-item2" href="#"><span>RSS2</span><img src="<?php echo($site_home); ?>/assets/img/icons/rss2.png" alt="rss" /></a>
			<a class="dock-item2" href="#"><span>RSS2</span><img src="<?php echo($site_home); ?>/assets/img/icons/rss2.png" alt="rss" /></a>
		</div>
	</div>
</div>
<script>
	(function($) {
		$('#dock2').Fisheye(
			{
				maxWidth: 60,
				items: 'a',
				itemsText: 'span',
				container: '.dock-container2',
				itemWidth: 40,
				proximity: 80,
				alignment : 'left',
				valign: 'bottom',
				halign : 'center'
			}
		)
	})(jQuery);
</script>
</body>
</html>