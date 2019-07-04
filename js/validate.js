$(function() {
	$(".members").validate({
		//debug : true,
		rules : {
			user_id : {
				required : true
			},
			user_pw : {
				required : true,
				minlength : 4,
				maxlength : 8
			},
			user_pw_re : {
				required : true,
				equalTo : "#pwd"
			},
			user_name : {
				required : true
			},
			user_nic : {
				required : true
			},
			email : {
				required : true,
				email : true				
			},
			tel : {
				required : true
			}
		},

		messages : {
			user_id : {
				required : "아이디는 필수입력 사항 입니다.",
			},
			user_pw : {
				required : "비밀번호는 필수 입력 항목 입니다.",
				minlength : "최소 {0}글자 입니다.",
				maxlength : "최소 {0}글자 입니다."
			},
			user_pw_re : {
				required : "비밀번호를 한번 더 입력해 주세요.",
				equalTo : "입력하신 비밀번호와 동일해야 합니다."
			},
			user_name : {
				required : "이름을 입력해 주세요."
			},
			user_nic : {
				required : "닉네임을 입력해 주세요."
			},
			email : {
				required : "이메일을 입력해 주세요.",
				email : "이메일의 형식에 맞지 않습니다."
			},
			tel : {
				required : "연락처를 입력해 주세요."
			}
		}
	});
});