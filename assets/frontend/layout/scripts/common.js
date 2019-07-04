(function($) {
	jQuery('.header-navigation').on('click', '.search-btn', function() {
		jQuery(this).parent().find('.search-box').toggle();
	});

	jQuery('.header-navigation').on('click', '.all_search-btn', function(e) {
		e.preventDefault();
		jQuery('.myform').attr('action', '<?php echo($bbs_home); ?>/all_search.php?' + $('.all-search-input').val());
		jQuery('.myform').attr('method', 'get');
		jQuery('.myform').submit();
	});
	
	jQuery('.header-navigation').on('keydown', '.all-search-input', function(e2) {
		if (e2.which == 13) {
			e2.preventDefault();
			jQuery('.myform').attr('action', '<?php echo($bbs_home); ?>/all_search.php?' + $(this).val());
			jQuery('.myform').attr('method', 'get');
			jQuery('.myform').submit();
		}
	});

	jQuery('.header-navigation').on('mouseover', 'a', function() {
		jQuery(this).parent().find('span.comment').css('display', 'block');
		var commentString = jQuery(this).parent().find('span.comment').length;
		var commentWidthCalc = jQuery(this).parent().find('span.comment').length * 180;
		jQuery(this).parent().find('span.comment').width(commentWidthCalc);
	});

	jQuery('.header-navigation').on('mouseout', 'a', function() {
		jQuery(this).find('span.comment').hide();
	});

	jQuery(document).on('mouseenter', '.header-navigation > ul > li > a', function() {
		jQuery(this).parent().siblings().removeClass('active');
		jQuery(this).parent().addClass('active');
	});

	jQuery(document).on('click', '.menu-search .search-btn', function() {
		jQuery(this).parent().find('.search-box').toggleClass('active');
	});
}) (jQuery);