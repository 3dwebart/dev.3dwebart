$(function() {
	var top_files = $('.top_file').val();
	$(".myform").validate({
		debug : true,
		
		rules : {
			top_file : {
				minlength : 2
			},
			delete_t : {
				if (top_files == '') {
					required : false,
				} else {
					required : true,
				};
				equalTo : "#top_file"
			}
		},

		messages : {
			top_file : {
				minlength : "최소 {0}글자 입니다."
			},
			user_pw_re : {
				if (!($('#top_file').val()) == '') {
					required : "체크박스를 선택해 주세요",
				};
				equalTo : "입력하신 비밀번호와 동일해야 합니다."
			}
		}
	});
});