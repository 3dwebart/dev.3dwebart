$(document).ready(function() {
	var loginID = $('.login-id').val();
	var loginPW = $('.login-pw').val();
	$('.member-login-btn').click(function() {
		if($('.login-id').val() == '' && $('.login-pw').val() != '') {
			alert('아이디를 입력하세요.')
		} else if($('.login-id').val() != '' && $('.login-pw').val() == '') {
			alert('비밀번호를 입력하세요.');
		} else if($('.login-id').val() == '' && $('.login-pw').val() == '') {
			alert('아이디와 비밀번호를 입력하세요.');
		} else {
			//$('.member-sign').attr('action', '<?php echo($members_home);?>/login_ok.php');
			$('.member-sign').attr('method', 'post');
			$('.member-sign').submit();
		}
	});
	
	$('.login-id').keypress(function (e) {
		if (e.which == 13) {
			if($(this).val() == '' && $('.login-pw').val() != '') {
				alert('아이디를 입력하세요.')
			} else if($(this).val() != '' && $('.login-pw').val() == '') {
				alert('비밀번호를 입력하세요.');
			} else if($(this).val() == '' && $('.login-pw').val() == '') {
				alert('아이디와 비밀번호를 입력하세요.');
			} else {
				//$('.member-sign').attr('action', '<?php echo($members_home);?>/login_ok.php');
				$('.member-sign').attr('method', 'post');
				$('.member-sign').submit();
			}
		}
	});
	
	$('.login-pw').keypress(function (e) {
		if (e.which == 13) {
			if($('.login-id').val() == '' && $(this).val() != '') {
				alert('아이디를 입력하세요.')
			} else if($('.login-id').val() != '' && $(this).val() == '') {
				alert('비밀번호를 입력하세요.');
			} else if($('.login-id').val() == '' && $(this).val() == '') {
				alert('아이디와 비밀번호를 입력하세요.');
			} else {
				//$('.member-sign').attr('action', '<?php echo($members_home);?>/login_ok.php');
				$('.member-sign').attr('method', 'post');
				$('.member-sign').submit();
			}
		}
	});
	
	$('.member-join-btn').click(function() {
		if($(this).val() != '' && $('.join-pw').val() != '' && $('.join-pw-re').val() != '') {
			//$('.member-sign').attr('action', '<?php echo($members_home);?>/join_ok.php');
			$('.member-sign').attr('method', 'post');
			$('.member-sign').submit();
		} else {
			if($(this).val() == '') {
				alert('아이디를 입력하세요.')
			} else if($('.join-pw').val() == '') {
				alert('비밀번호를 입력하세요.');
			} else if($('.join-pw-re').val() == '') {
				alert('비밀번호를 확인을 입력하세요.');
			} else {
				alert('아이디 / 비밀번호 / 비밀번호 확인을 확인하세요.');
			}
		}
	});
	
	$('.join-id').keypress(function (e) {
		if (e.which == 13) {
			if($(this).val() != '' && $('.join-pw').val() != '' && $('.join-pw-re').val() != '') {
				//$('.member-sign').attr('action', '<?php echo($members_home);?>/join_ok.php');
				$('.member-sign').attr('method', 'post');
				$('.member-sign').submit();
			} else {
				if($(this).val() == '') {
					alert('아이디를 입력하세요.')
				} else if($('.join-pw').val() == '') {
					alert('비밀번호를 입력하세요.');
				} else if($('.join-pw-re').val() == '') {
					alert('비밀번호를 확인을 입력하세요.');
				} else if($('.join-pw').val() != $('.join-pw-re').val()) {
					alert('비밀번호와 비밀번호 확인란이 맞지 않습니다.')
				} else {
					alert('아이디 / 비밀번호 / 비밀번호 확인을 확인하세요.');
				}
			}
		}
	});

	$('.join-pw').keypress(function (e) {
		if (e.which == 13) {
			if($(this).val() != '' && $('.join-pw').val() != '' && $('.join-pw-re').val() != '') {
				//$('.member-sign').attr('action', '<?php echo($members_home);?>/join_ok.php');
				$('.member-sign').attr('method', 'post');
				$('.member-sign').submit();
			} else {
				if($('.join-id').val() == '') {
					alert('아이디를 입력하세요.')
				} else if($(this).val() == '') {
					alert('비밀번호를 입력하세요.');
				} else if($('.join-pw-re').val() == '') {
					alert('비밀번호를 확인을 입력하세요.');
				} else if($(this).val() != $('.join-pw-re').val()) {
					alert('비밀번호와 비밀번호 확인란이 맞지 않습니다.')
				} else {
					alert('아이디 / 비밀번호 / 비밀번호 확인을 확인하세요.');
				}
			}
		}
	});
	
	$('.join-pw-re').keypress(function (e) {
		if (e.which == 13) {
			if($(this).val() != '' && $('.join-pw').val() != '' && $('.join-pw-re').val() != '') {
				//$('.member-sign').attr('action', '<?php echo($members_home);?>/join_ok.php');
				$('.member-sign').attr('method', 'post');
				$('.member-sign').submit();
			} else {
				if($('.join-id').val() == '') {
					alert('아이디를 입력하세요.')
				} else if($('.join-pw').val() == '') {
					alert('비밀번호를 입력하세요.');
				} else if($(this).val() == '') {
					alert('비밀번호를 확인을 입력하세요.');
				} else if($('.join-pw').val() != $(this).val()) {
					alert('비밀번호와 비밀번호 확인란이 맞지 않습니다.')
				} else {
					alert('아이디 / 비밀번호 / 비밀번호 확인을 확인하세요.');
				}
			}
		}
	});
});