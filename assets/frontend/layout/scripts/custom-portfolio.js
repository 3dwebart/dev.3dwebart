(function($) {
	$('.tab-content > div').eq(0).addClass('in');
	$('.tab-content > div').eq(0).addClass('active');

	$('.block').on('click', 'a', function() {
		var data_id = $(this).data('id');
		// alert(data_id);
		// var LoginID = $('.login-id').val();
		// var LoginPW = $('.login-pw').val();
		// $.ajax({
		// 	url: "<?php echo($members_home); ?>/ajax.login.php",
		// 	type: "post",
		// 	data: 
		// 		{
		// 			user_id : LoginID,
		// 			user_pw : LoginPW
		// 		},
		// 	dataType: "json",
		// 	cache: false,
		// 	timeout: 30000,
		// 	success: function(data) {
		// 		//debugger;
		// 	},
		// 	error: function(xhr, textStatus, errorThrown) {
		// 		$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
		// 	}
		// });
		return false;
	});
})(jQuery);