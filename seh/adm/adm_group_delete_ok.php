<?php
	include_once('header_ui.php');

	$group_num   = post('id');

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}

	$sql = "SELECT bo_group_name FROM bbs_group WHERE id =%d";

	$result = $db -> query($sql, array($group_num));

	$row = $db -> fetch_array();

	$bo_group_name = $row['bo_group_name'];

	// 그룹에 포함된 게시판 유무 검사
	$sql = "SELECT COUNT(id) FROM bbs_config WHERE id =%d";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($group_num));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '게시판 정보 수정에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	$bbs_config_cnt = $db -> fetch_row();

	if ($bbs_config_cnt[0] > 0) {
		redirect($admin_home.'/adm_group_list.php', '먼저 게시판을 삭제 하시거나\n( '.$bo_group_name.' ) 그룹에 포함된 게시판을 다른 그룹으로 이동해야 합니다.');
	}

	// 탈퇴를 위한 데이터 삭제 SQL
	$sql = "DELETE FROM bbs_group WHERE id = %d";
	$result = $db -> query($sql, array($group_num));

	// SQL구문 출력해보기 (중간 확인)
	// echo($sql);

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '회원탈퇴에 실패했습니다. 관리자에게 문의 바랍니다.');
		
	}

	redirect('adm_group_list.php', '게시판이 삭제 되었습니다.', FALSE);

	include_once('footer_ui.php');
?>