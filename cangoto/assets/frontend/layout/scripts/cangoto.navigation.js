$(document).ready(function() {
	/*
	$('.header .container .header-navigation .main-menu .dropdown .menu1').hover(function() {
	*/
	$('.main-menu > li').removeClass('dropdown');
	$('.header-navigation .main-menu .menu1').parent().find('li:eq(0)').addClass('top-line1');
	$('.header-navigation .main-menu .menu2').parent().find('li:eq(0)').addClass('top-line2');
	$('.header-navigation .main-menu .menu3').parent().find('li:eq(0)').addClass('top-line3');
	$('.header-navigation .main-menu .menu4').parent().find('li:eq(0)').addClass('top-line4');
	$('.menu1').hover(function() {
		$(this).addClass('main-active1');
	}, function() {
		$(this).removeClass('main-active1');
		$(this).parent().find('ul > li > a').hover(function() {
			$(this).addClass('sub-active1');
		}, function() {
			$(this).removeClass('sub-active1');
		});
	});

	$('.menu2').hover(function() {
		$(this).addClass('main-active2');
		
	}, function() {
		$(this).removeClass('main-active2');
		$(this).parent().find('ul > li > a').hover(function() {
			$(this).addClass('sub-active2');
		}, function() {
			$(this).removeClass('sub-active2');
		});
	});

	$('.menu3').hover(function() {
		$(this).addClass('main-active3');				
	}, function() {
		$(this).removeClass('main-active3');
		$(this).parent().find('ul > li > a').hover(function() {
			$(this).addClass('sub-active3');
		}, function() {
			$(this).removeClass('sub-active3');
		});
	});

	$('.menu4').hover(function() {
		$(this).addClass('main-active4');
		
	}, function() {
		$(this).removeClass('main-active4');
		$(this).parent().find('ul > li > a').hover(function() {
			$(this).addClass('sub-active4');
		}, function() {
			$(this).removeClass('sub-active4');
		});
	});
});