<?php include_once('header_ui.php'); ?>
<?
/*
$cnt = count(post('check')); // 배열로 넘어온 값의 갯수를 구한다(count 함수 배열의 갯수 구하는 함수)
for($i=0 ;$i < $cnt; $i++) {
	$sql = "delete from members where id = '$cnt[$i]'";
	$result = $db -> query($sql);
	if(!$result) {
		redirect(FALSE, '삭제가 실패했습니다. 관리자에게 문의 바랍니다.');
	}
}
*/
	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}

	$row = post('check');
	//$cnt = count(post('check'));
	//$cnt = count($check);
	$array = implode(",", $row);

	if (!$array) {
		redirect($admin_home.'/adm_member_list.php', '선택된 값이 없습니다.', FALSE);
	}

	// 그룹에 포함된 게시판 유무 검사
	$sql = "SELECT COUNT(id) FROM bbs_config WHERE id IN ($array)";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql);

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '게시판 정보 수정에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	$bbs_config_cnt = $db -> fetch_row();

	if ($bbs_config_cnt[0] > 0) {
		redirect($admin_home.'/adm_group_list.php', '먼저 게시판을 삭제 하시거나\n이 그룹에 포함된 게시판을 다른 그룹으로 이동해야 합니다.');
	}

	$sql = "DELETE FROM bbs_group WHERE id IN ($array)";
	$result = $db -> query($sql);

	redirect($admin_home.'/adm_group_list.php', '삭제 되었습니다.', FALSE);
	
	include_once('footer_ui.php');
?>