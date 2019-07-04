<?php
	include_once('header_ui.php');
	
	// 이미 로그인 중이 아니라면 사용 불가
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}

	// 이전 페이지의 파라미터 받기
	$group_num     = post('id');
	$bo_group_name = post('bo_group_name');

	// 필수 입력값 존재여부 검사하기
	if (!$bo_group_name)  { redirect(FALSE, '게시판 타입을 선택하세요.'); }

	// 비밀번호 변경 여부
	$is_password = FALSE;

	// 새로운 비밀번호가 입력된 경우 SQL에서 비밀번호 변경처리 필요함
	$sql = "UPDATE bbs_group 
	SET bo_group_name = '%s', edit_date = now() 
	WHERE id = %d";

	$result = $db -> query($sql, array($bo_group_name, $group_num));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '게시판 정보 수정에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	// 둘 다 체크 안하고 파일 업로드 시도 한 경우
	/*
	if (!$delete_t && !$delete_b && $file_info_t && $file_info_b) {
		redirect()
	}
	*/
	// 둘 다 체크 안하고 파일 업로드도 안한 경우
	// 상단 파일 체크 안하고 업로드 한 경우
	// 상단 파일 체크 안하고 업로드도 안한 경우
	// 하단 파일 체크 안하고 업로드 한 경우
	// 하단 파일 체크 안하고 업로드도 안한 경우
	redirect($admin_home.'/adm_group_list.php', '게시판 정보가 수정되었습니다.', FALSE);

	include_once('footer_ui.php');
?>
