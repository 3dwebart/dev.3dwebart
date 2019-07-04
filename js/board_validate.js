$(function() {
	$(".form-horizontal").validate({
		//debug : true,
		rules : {
			link : {
				required : false
			},
			subject : {
				required : true,
				minlength : 2
			},
			content : {
				required : true
			}
		},

		messages : {
			link : {
				required : "아이디는 필수입력 사항 입니다.",
			},
			subject : {
				required : "제목은 필수 입력 항목 입니다.",
				minlength : "최소 {0}글자 입니다."
			},
			content : {
				required : "내용은 필수 입력사항 입니다."
			}
		}
	});
});