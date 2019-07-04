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
	$cnt = count($row);
	$array = implode(",", $row);

	// 최고 관리자 `admin` 아이디 삭제 금지
	$sql = "SELECT adm_id FROM admin WHERE id = %d";
	$result = $db -> query($sql, array($array));
	
	while ($super = $db -> fetch_array()) {
	 	if ($super['adm_id'] == 'admin') {
			redirect('adm_admin_list.php', '최고 관리자는 삭제할 수 없습니다.');
		}
	 } 

	if (!$array) {
		redirect($admin_home.'/adm_admin_list.php', '선택된 값이 없습니다.', FALSE);
	}

	$sql = "DELETE FROM admin WHERE id IN ($array)";
	$result = $db -> query($sql);

	redirect($admin_home.'/adm_admin_list.php', '삭제 되었습니다.', FALSE);
	
	include_once('footer_ui.php');
?>