<?php
	include_once('header_ui.php');

	$board_num   = post('id');

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}

	// 탈퇴를 위한 데이터 삭제 SQL
	$sql = "DELETE FROM bbs_config WHERE id = %d";
	$result = $db -> query($sql, array($board_num));

	// SQL구문 출력해보기 (중간 확인)
	// echo($sql);

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '회원탈퇴에 실패했습니다. 관리자에게 문의 바랍니다.');
	}
	
	$sql = "SELECT bo_name FROM bbs_config WHERE id = %d";
	$result = $db -> query($sql, array($board_num));
	$row = $db -> fetch_assoc();
	$bo_name = $row['bo_name'];
	$db -> drop_table($bo_name);

	redirect('adm_board_list.php', '게시판이 삭제 되었습니다.', FALSE);

	include_once('footer_ui.php');
?>