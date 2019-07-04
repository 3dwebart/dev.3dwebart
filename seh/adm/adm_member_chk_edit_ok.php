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
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}
	
	$check      = post('check');
	$chk_cnt    = post('chk_cnt');
	$user_level = post('user_level');
	$user_name  = post('user_name');
	$user_nic   = post('user_nic');
	$email      = post('email');
	$tel        = post('tel');
	$cnt        = count($check);
	$cnt2       = count($chk_cnt);
	//$cnt = count(post('check'));
	//$array = implode(",", $row);
	if ($cnt < 0) {
		redirect($admin_home.'/adm_member_list.php', '선택된 값이 없습니다.', FALSE);
	}

	for ($i = 0; $i < $cnt; $i++) {
		for ($j=0; $j < $cnt2; $j++) {
			if ($check[$i] == $chk_cnt[$j]) {
				$sql = "UPDATE members SET user_level = %d, user_name = '%s', user_nic = '%s', email = '%s', tel = '%s' WHERE id = %d";
				$result = $db -> query($sql, array($user_level[$j], $user_name[$j], $user_nic[$j], $email[$j], $tel[$j], $chk_cnt[$j]));
			}
		}
	}
	//exit();
	redirect($admin_home.'/adm_member_list.php', '수정 되었습니다.', FALSE);
?>
<?php include_once('footer_ui.php'); ?>