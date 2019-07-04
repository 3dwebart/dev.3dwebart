<?php
	include_once('header_ui.php');

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}
	
	// 이전 페이지의 파라미터 받기
	$bo_group_id   = post('bo_group_id');
	$bo_group_name = post('bo_group_name');

	// 필수 입력값 존재 여부 검사하기
	if (!$bo_group_id) { redirect(FALSE, '게시판 아이디를 작성하세요.'); }

	// 필수 입력값 존재 여부 검사하기
	if (!$bo_group_name) { redirect(FALSE, '게시판 이름을 작성하세요.'); }

	// 중복 게시판 확인을 위한 SQL문
	$sql = "SELECT COUNT(id) FROM bbs_group WHERE bo_group_id = '%s'";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($bo_group_id));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '그룹 정보 수정에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	$row = $db -> fetch_row();

	if ($row[0] > 0) {
		redirect(FALSE, '이미 생성된 그룹 아이디 입니다.\n 다른 이름으로 생성해 주세요.');
	}

	// 중복 게시판 확인을 위한 SQL문
	$sql = "SELECT COUNT(id) FROM bbs_group WHERE bo_group_name = '%s'";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($bo_group_name));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '그룹 정보 수정에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	$row = $db -> fetch_row();

	if ($row[0] > 0) {
		redirect(FALSE, '이미 생성된 그룹 이름 입니다.\n 다른 이름으로 생성해 주세요.');
	}

	// 게시판 생성 처리를 위한 SQL 템플릿
	$sql = "INSERT INTO bbs_group (bo_group_id, bo_group_name, reg_date, edit_date) VALUES ('%s', '%s', now(), now())";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($bo_group_id, $bo_group_name));

	$id = $db -> insert_id();

	// SQL구문 출력해 보기 (중간확인)
	// echo($sql);

	// SQL문 실행하기
	redirect($admin_home.'/adm_group_list.php', '게시판 그룹이 생성 되었습니다.');

	//$row = fetch_row();

	// SQL 구문 출력해 보기 (중간확인)
	//echo($sql);
	
	include_once('footer_ui.php');
?> 