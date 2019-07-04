<?php header("Content-Type: text/html; charset=utf-8"); ?>
<?php
	include_once('../../../include/common.php');
	include_once('../../../include/class.db.php');

	// 세션 유지시간 설정 - 30분
	session_cache_expire(30);

	// 세션 데이터 사용의 시작을 알림
	session_start();

	// 세선정보 가져오기 (로그인 하지 않은 경우 FALSE임)
	$session_id = get_session('id');
	$session_user_id = get_session('user_id');
	$session_user_name = get_session('user_name');
	$session_user_email = get_session('email');
	$session_user_tel = get_session('tel');

	// DB접속 및 결과 체크

	$db = new DB();
	if (!$db -> is_connect()) {
		redirect(FALSE, '데이터베이스 접속에 실패했습니다.');
	}
?>