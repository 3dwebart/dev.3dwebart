<script>
jQuery(document).ready(function() {
//(function($) {
	if(jQuery.cookie('selLanguage') == 'en') {
		jQuery('.lang').val('en');
	} else if(jQuery.cookie('selLanguage') == 'ko') {
		jQuery('.lang').val('ko');
	} else {
		jQuery('.lang').val('ko');
	}

	jQuery.cookie('selLanguage', jQuery('.lang').val(), { expires: 7, path: '/', secure: false });

	var currentLoc = {findLocation : '<?php echo($app_file_cut); ?>'};

	jQuery.ajax({
		url: "<?php echo($site_home); ?>/language/lang_select.php",
		type: "post",
		data: {
			selLang: jQuery.cookie('selLanguage')
		},
		dataType: "json",
		cache: false,
		timeout: 30000,
		success: function(json) {
			jQuery('.hrader-top-bar').html('');
			jQuery('.header-title').html('');
			jQuery('.member-join-form').html('');
			jQuery("#headerTopBar").tmpl(json).appendTo(".hrader-top-bar");
			jQuery("#headerNavigation").tmpl(json).appendTo(".header-navibar");
			<?php if($app_file_cut != 'index') { ?>
				<?php if(!empty($bo_name)) { ?>
			jQuery("#headerTitle").tmpl(json).appendTo(".header-title");
				<?php } ?>
			<?php } ?>
			<?php if($app_file_cut == 'join') { ?>
			jQuery("#MemberJoinForm").tmpl(json).appendTo(".member-join-form");
			<?php } ?>
			// 포트폴리오의 탭메뉴 첮번째 메뉴 active 초기화
			$('.nav-tabs li').eq(0).addClass('active');
			$('.nav-tabs li a').on('click', function() {
				var link = $(this).data('link');
				$(this).parent().parent()
				.find('.more a')
				.attr("href", "<?php echo($bbs_home)?>/index.php?bo_name=" + link);
			});
			jQuery(".mobi-toggler").on("click", function(event) {
                //the default action of the event will not be triggered
                event.preventDefault();
                jQuery(".header").toggleClass("menuOpened");
                jQuery(".header").find(".header-navigation").toggle(300);
            });
		},
		error: function(xhr, textStatus, errorThrown) {
			jQuery("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
		}
	});

	jQuery('.hrader-top-bar').on('mouseover', '.language-select > a', function() {
		jQuery(this).parent().find('ul').show();
	}).on('mouseout', '.language-select > a', function() {
		jQuery(this).parent().find('ul').hide();
		jQuery(this).parent().find('ul').hover(function() {
			jQuery(this).show();
		}, function() {
			jQuery(this).hide();
		});
	});

	jQuery('.hrader-top-bar').on('mouseover', '.language-select > ul', function() {
		jQuery(this).show();
	}).on('mouseout', '.language-select > ul', function() {
		jQuery(this).hide();
	});

	jQuery('.hrader-top-bar').on('click', '.language-select ul li a', function() {
		if(jQuery(this).attr('lang') == 'ko') {
			jQuery('.lang').val('ko');
		} else {
			jQuery('.lang').val('en');
		}

		jQuery.cookie('selLanguage', jQuery('.lang').val(), { expires: 7, path: '/', secure: false });

		jQuery.ajax({

			url: "<?php echo($site_home); ?>/language/lang_select.php",
			type: "post",
			data: {
				selLang: jQuery.cookie('selLanguage')				},
			dataType: "json",
			cache: false,
			timeout: 30000,
			success: function(json) {
				jQuery('.hrader-top-bar').html('');
				jQuery('.header-navibar').html('');
				jQuery('.header-title').html('');
				jQuery('.member-join-form').html('');
				jQuery("#headerTopBar").tmpl(json).appendTo(".hrader-top-bar");
				jQuery("#headerNavigation").tmpl(json).appendTo(".header-navibar");
				<?php if($app_file_cut != 'index') { ?>
					<?php if(!empty($bo_name)) { ?>
				jQuery("#headerTitle").tmpl(json).appendTo(".header-title");
					<?php } ?>
				<?php } ?>
				<?php if($app_file_cut == 'join') { ?>
				jQuery("#MemberJoinForm").tmpl(json).appendTo(".member-join-form");
				<?php } ?>
			},
			error: function(xhr, textStatus, errorThrown) {
				jQuery("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
			}
		});

		return false;
	});

	jQuery('.header-title').on('click', '.no-click', function() {
		return false;
	});

	$('.main-logo').css('text-align', 'center');

	var device = check_device();
	if(device !=''){
		$('.country-select ul').css('float', 'left');
		$('.country-select ul').css('margin-left', '-10px');
		//alert(device);
	} else {
		$(window).resize(function(){
			if ($(window).width() <= 768){
				$('.country-select ul').css('float', 'left');
				$('.country-select ul').css('margin-left', '-10px');

			} else if ($(window).width() > 768) {
				$('.country-select ul').css('float', 'right');
				$('.country-select ul').css('margin-left', '0');
			}
		});
	}
//})(jQuery);
});

</script>
