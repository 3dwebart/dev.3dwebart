<?php
include_once('../header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<link href="<?php echo($site_home); ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo($site_home); ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Sctipt Start -->
<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-1.11.2.min.js"></script>
<script src="<?php echo($site_home); ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-tmpl/jquery.tmpl.min.js"></script>
<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery-tmpl/jquery.tmplPlus.min.js"></script>
<script src="<?php echo($site_home); ?>/assets/global/plugins/jquery.cookie.min.js"></script>
<!-- Script End -->
<style>
.top-nav {
	width: 100%;
	overflow-x: hidden;
}
.top-nav ul {
	margin: 0;
	padding: 0;
	list-style: none;
	background-color: #434343;
}
.top-nav ul > li {
	display: inline-block;
	float: left;
}
.top-nav ul > li > a {
	display: block;
	padding: 3px 6px;
	text-decoration: none;
	color: #b7b7b7;
	border-left: 2px solid transparent;
	border-right: 2px solid transparent;
	border-bottom: 2px solid transparent;
}
.top-nav ul > li > a:hover {
	background-color: #5c5c5c;
	border-left: 2px solid #2e2e2e;
	border-right: 2px solid #2e2e2e;
	border-bottom: 2px solid #2e2e2e;
}

.top-nav ul > li > ul.s1-nav {
	display: none;
	position: absolute;
}
.top-nav ul > li > ul.s1-nav.active {
	display: block;
	z-index: 10;
}
.top-nav ul > li > ul.s1-nav.active li {
	display: block;
	float: none;
}
.top-nav ul > li > ul.s1-nav.active li:after,
.top-nav ul > li > ul.s1-nav.active li:before
 {
 	content: '';
	display: table;
	float: none;
	clear: both;
}
</style>
</head>
<body>
<div class="top-nav">
	<ul></ul>
</div>
<div class="dropdown">
	<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="navi-name">Animation</span>
	<span class="caret"></span></button>
	<ul class="dropdown-menu dropdown-navi">
		<li><a href="#" data-part="Animation">Animation</a></li>
		<li><a href="#" data-part="Polygons">Polygons</a></li>
		<li><a href="#" data-part="sub2">Sub2</a></li>
		<li><a href="#" data-part="sub3">Sub3</a></li>
	</ul>
</div>
<script>
(function($) {
	function topNav(nav) {
		$.ajax({
			url: "main_nav.php",
			type: "post",
			data: 
				{
					'nav' : nav
				},
			dataType: "json",
			cache: false,
			timeout: 30000,
			success: function(data) {
				//debugger;
				console.log(data);
				$('.top-nav > ul').html('');
				var mainNav = '';
				console.log(data.main.length);
				console.log(data.S1Nav[0][5]);
				for(var i = 0; i < data.main.length; i++) {
					mainNav += '<li>';
					mainNav += '<a>' + data.main[i] + '</a>';
					
					console.log(data.main[i]);
					if(data.S1Nav[i] !== undefined) {
						mainNav += '<ul class="s1-nav">';
						for(var j = 0; j < data.S1Nav[i].length; j++) {
							mainNav += '<li>';
							mainNav += '<a>' + data.S1Nav[i][j] + '</a>';
							mainNav += '</li>';
							console.log(i + '==>' + data.S1Nav[i][j]);
							console.log(i + '(cnt) ==>' + data.S1Nav[i].length);
						}
						mainNav += '</ul>';
					}
					mainNav += '</li>';
					//console.log(data.main.length);
				}
				mainNav += '<div class="clearfix"></div>';
				$('.top-nav > ul').append(mainNav);
				$('.top-nav > ul > li > a').on('mouseenter', function() {
					$(this).parent().children('ul').addClass('active');
				});
				$('.top-nav > ul > li > a').on('mouseleave', function() {
					$(this).parent().children('ul').removeClass('active');
					$(this).parent().children('ul').on('mouseenter', function() {
						$(this).addClass('active');
					});
					$(this).parent().children('ul').on('mouseleave', function() {
						$(this).removeClass('active');
					});
				});
			},
			error: function(xhr, textStatus, errorThrown) {
				$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
			}
		});
	}
	topNav('Animation');
	$('.dropdown-navi li a').on('click', function() {
		var Navi = $(this).data('part');
		topNav(Navi);
		$('.navi-name').text(Navi);
	});
})(jQuery);
</script>
</body>
</html>