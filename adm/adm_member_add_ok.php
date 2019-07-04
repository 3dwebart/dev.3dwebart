<?php
	include_once('../header.php');
	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}

	// 이전 페이지의 파라미터 받기
	$user_level = post('user_level');
	$user_id    = post('user_id');
	$user_pw    = post('user_pw');
	$user_pw_re = post('user_pw_re');
	$user_name  = post('user_name');
	$user_nic   = post('user_nic');
	$email      = post('email');
	$tel        = post('tel');

	/*
	echo('<h3>변수 출력</h3>');
	echo('<h3>user power = .'.$user_level.'</h3>');
	echo('<h3>user id = .'.$user_id.'</h3>');
	echo('<h3>user pw = .'.$user_pw.'</h3>');
	echo('<h3>user pw re = .'.$user_pw_re.'</h3>');
	echo('<h3>user name = .'.$user_name.'</h3>');
	echo('<h3>user nic = .'.$user_nic.'</h3>');
	echo('<h3>email = .'.$email.'</h3>');
	echo('<h3>tel = .'.$tel.'</h3>');
	*/


	// 필수 입력값 존재 여부 검사하기
	if (!$user_id) { redirect(FALSE, '아이디를 입력하세요.'); }
	if (!$user_pw) { redirect(FALSE, '비밀번호를 입력하세요.'); }
	if (!$user_name) { redirect(FALSE, '이름을 입력하세요.'); }
	if (!$user_nic) { redirect(FALSE, '닉네임을 입력하세요.'); }
	if (!$email) { redirect(FALSE, '이메일 입력하세요.'); }
	if (!$tel) { redirect(FALSE, '연락처를 입력하세요.'); }

	// 비밀번호 확인
	if ($user_pw != $user_pw_re) {
		redirect(FALSE, '비밀번호 확인이 잘못되었습니다.');
	}

	// 중복가입 확인을 위한 SQL문
	$sql = "SELECT COUNT(id) FROM members WHERE user_id = '%s'";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($user_id));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '회원가입에 실패했습니다. 관리자에게 문의 바랍니다.');
	}

	$row = $db -> fetch_row();

	if ($row[0] > 0) {
		redirect(FALSE, '이미 가입된 아이디 입니다.');
	}

	$sql = "SELECT adm_id FROM admin";
	$result = $db -> query($sql);
	$adm_id = $db -> fetch_array();
	

	// 관리자와 중복가입 확인을 위한 SQL문
	$sql = "SELECT adm_id FROM admin WHERE adm_id = '%s'";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($user_id));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '회원가입에 실패했습니다. 관리자에게 문의 바랍니다.');
	}

	$adm_row = $db -> fetch_row();

	if ($db -> num_rows() > 0) {
		redirect(FALSE, '이미 가입된 관리자 아이디 입니다.');
	}

	// 화원가입 처리를 위한 SQL 템플릿
	$sql = "INSERT INTO members (user_level, is_admin, user_id, user_pw, user_name, user_nic, email, tel, reg_date, edit_date) VALUES (%d, '%s', '%s', password('%s'), '%s', '%s', '%s', '%s', now(), now())";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($user_level, 'false', $user_id, $user_pw, $user_name, $user_nic, $email, $tel));

	// SQL구문 출력해 보기 (중간확인)
	// echo($sql);

	// SQL문 실행하기
	redirect($admin_home.'/adm_member_list.php', '회원가입이 완료되었습니다.');

	//$row = fetch_row();

	// SQL 구문 출력해 보기 (중간확인)
	//echo($sql);
?> 