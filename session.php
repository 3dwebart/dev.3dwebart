<?php
	// 세션 유지시간 설정 - 30분 = 30
	session_cache_expire(360);

	// session_set_cookie_params(0, "/", ".3dwebart.com");
	// ini_set('session.cookie_domain', '.3dwebart.com');

	// 세션 데이터 사용의 시작을 알림
	session_start();

	// 세선정보 가져오기 (로그인 하지 않은 경우 FALSE임)
	if (!isset($_SESSION['adm_id'])) {
		$session_id            = get_session('id');
		$session_user_level    = get_session('user_level');
		$session_is_admin      = get_session('is_admin');
		$session_user_id       = get_session('user_id');
		$session_user_name     = get_session('user_name');
		$session_user_nic      = get_session('user_nic');
		$session_user_email    = get_session('email');
		$session_user_tel      = get_session('tel');
	} else {
		$session_id            = get_session('id');
		$session_user_level    = get_session('adm_level');
		$session_is_admin      = get_session('is_admin');
		$session_user_id       = get_session('adm_id');
		$session_user_name     = get_session('adm_name');
		$session_user_nic      = get_session('adm_nic');
		$session_user_email    = get_session('email');
		$session_user_tel      = get_session('tel');
	}

	/*
	if ($find_adm) {
		$session_id          = get_session('id');
		$session_user_id        = get_session('adm_id');
		$session_user_name      = get_session('adm_name');
		$session_user_nic       = get_session('adm_nic');
		$session_user_email     = get_session('email');
		$session_user_tel       = get_session('tel');
	} else {
		$session_id          = get_session('id');
		$session_user_id       = get_session('user_id');
		$session_user_name     = get_session('user_name');
		$session_user_nic      = get_session('user_nic');
		$session_user_email    = get_session('email');
		$session_user_tel      = get_session('tel');
	}
	*/
?>