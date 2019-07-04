$(function() {
	$(".form-horizontal").validate({
		//debug : true,
		rules : {
			writer : {
				required : true
			},
			pwd : {
				required : true,
				minlength : 4,
				maxlength : 8
			},
			email : {
				required : true,
				email : true
			}
		},

		messages : {
			writer : {
				required : "아이디는 필수입력 사항 입니다."
			},
			pwd : {
				required : "비밀번호는 필수 입력 항목 입니다.",
				minlength : "최소 {0}글자 입니다.",
				maxlength : "최소 {0}글자 입니다."
			},
			email : {
				required : "이메일을 입력해 주세요.",
				email : "이메일이 형식에 맞지 않습니다."
			}
		}
	});
});