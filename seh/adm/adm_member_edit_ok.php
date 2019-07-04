<?php
	include_once('header_ui.php');
	
	// 이미 로그인 중이 아니라면 사용 불가
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자 로그인 후에 이용 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}

	// 이전 페이지의 파라미터 받기
	$user_num       = post('id');
	$user_level     = post('user_level');
	$new_user_pw    = post('new_user_pw');
	$new_user_pw_re = post('new_user_pw_re');
	$user_name      = post('user_name');
	$user_nic       = post('user_nic');
	$email          = post('email');
	$tel            = post('tel');

	// 필수 입력값 존재여부 검사하기
	//if (!$user_pw)   { redirect(FALSE, '현재 비밀번호를 입력하세요.'); }
	if (!$user_name) { redirect(FALSE, '이름을 입력하세요.'); }
	if (!$email)     { redirect(FALSE, '이메일을 입력하세요.'); }
	if (!$tel)       { redirect(FALSE, '전화번호를 입력하세요.'); }

	// 비밀번호 변경 여부
	$is_password = FALSE;

	// 새로운 비밀번호가 입력된 경우
	if ($new_user_pw || $new_user_pw_re) {
		$is_password = TRUE;

		// 비밀번호 확인하기
		if ($new_user_pw != $new_user_pw_re) {
			redirect(FALSE, '비밀번호 확인이 장못되었습니다.');
		}
	}

	// 처리를 위한 SQL문을 저장할 변수
	$sql = '';

	if ($is_password == TRUE) {
		// 비밀번호만 변경하는 경우
		// 새로운 비밀번호가 입력된 경우 SQL에서 비밀번호 변경처리 필요함
		$sql = "UPDATE members 
		SET user_level = %d, user_name = '%s', user_nic = '%s', user_pw = password('%s'), email = '%s', tel = '%s', edit_date = now() 
		WHERE id = %d";

		$result = $db -> query($sql, array($user_level, $user_name, $user_nic, $new_user_pw, $email, $tel, $user_num));
	} else {
		// 비밀번호를 변경하지 않는 SQL구문 설정
		$sql = "UPDATE members 
		SET user_level = %d, user_name = '%s', user_nic = '%s', email = '%s', tel = '%s', edit_date = now()
		WHERE id = %d";

		$result = $db -> query($sql, array($user_level, $user_name, $user_nic, $email, $tel, $user_num));
	}

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '회원정보 수정에 실패했습니다. 관리자에게 문의 바랍니다.');
		
	}

	// 영향을 받은 행의 수
	/*
	$num_rows =  $db -> affected_rows();
	*/

	// 수정된 행이 없다면 WHERE조건이 맞지 않는 것이므로 비밀번호가 잚못 입력된 경우
	
	if ($db -> affected_rows() < 1) {
		redirect(FALSE, '비밀번호가 맞지 않습니다.');
	}

	// 정보가 수정되었으므로, 변경된 내용으로 세션 데이터 갱신
	$_SESSION['user_name'] = $user_name;
	$_SESSION['user_nic']  = $user_nic;
	$_SESSION['email']     = $email;
	$_SESSION['tel']       = $tel;

	redirect($admin_home.'/adm_member_list.php', '회원정보가 수정되었습니다.', FALSE);

	include_once('footer_ui.php');
?>
