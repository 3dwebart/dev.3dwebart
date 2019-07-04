$(document).ready(function() {
	$('#modal-content').modal('show');
    $('#modal-content').on('shown', function() {
          $('.latest_tab_nav .latest_content div:eq(0)').show();
     });

	$('.latest_tab .latest_tab_nav div a').click(function() {
		$(this).parent().parent().find('a').removeClass('LatestTabActive');
		$(this).addClass('LatestTabActive');
		if($(this).parent().parent().find('div:eq(0) a').hasClass('LatestTabActive')) {
			$(this).parent().parent().parent().find('.latest_content div:eq(0)').show();
			$(this).parent().parent().parent().find('.latest_content div:eq(1)').hide();
			$(this).parent().parent().parent().find('.latest_content div:eq(2)').hide();
		} else if($(this).parent().parent().find('div:eq(1) a').hasClass('LatestTabActive')) {
			$(this).parent().parent().parent().find('.latest_content div:eq(0)').hide();
			$(this).parent().parent().parent().find('.latest_content div:eq(1)').show();
			$(this).parent().parent().parent().find('.latest_content div:eq(2)').hide();
		} else {
			$(this).parent().parent().parent().find('.latest_content div:eq(0)').hide();
			$(this).parent().parent().parent().find('.latest_content div:eq(1)').hide();
			$(this).parent().parent().parent().find('.latest_content div:eq(2)').show();
		}
	});
});