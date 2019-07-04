<?php
	/** 모든 게시판 관련 파일에서 참조할 파일. */
	// 1) 게시판 아이디 받기
	if($session_is_admin == 'true') {
		$sql = "SELECT adm_id, adm_level FROM admin WHERE adm_id = '%s'";
		$result = $db -> query($sql, array($session_user_id));
		$row = $db -> fetch_assoc();
		$member_level = $row['adm_level'];
		if($row['adm_id'] == 'admin') {
			$adm_chk = true;
		}else {
			$adm_chk = false;
		}
	} else {
		$sql = "SELECT user_level FROM members WHERE user_id = '%s'";
		$result = $db -> query($sql, array($session_user_id));
		$row = $db -> fetch_assoc();
		$member_level = $row['user_level'];
		$adm_chk = true;
	}
	
	if(empty($member_level)) {
		$member_level = 5;
	}
	
	if(empty($is_admin)) {
		$is_admin = 'false';
	}
	
	$bbs_id = get("bbs_id");

	if (!$bbs_id) {
		$bbs_id = post("bbs_id");
	}
	
	$bo_name = get("bo_name");

	if (!$bo_name) {
		$bo_name = post("bo_name");
	}

	if (!$bbs_id && !$bo_name) {
		redirect(FALSE, "게시판 아이디가 없습니다.");
	}

	$bo_table   = 'bo_table_'.$bo_name;
	$bo_file    = $bo_table.'_files';
	$bo_comm    = $bo_table.'_comments';

	// 2) 게시판 설정정보 로딩
	$sql = "SELECT id, cate, title, skin, l_level, r_level, w_level, d_level, sort, order_by FROM bbs_config WHERE id = %d OR bo_name = '%s'";
	$result = $db -> query($sql, array($bbs_id, $bo_name));

	if (!$result) {
		redirect(FALSE, "게시판 정보 조회에 실패했습니다.");	
	}

	if ($db -> num_rows() < 1) {
		redirect(FALSE, "존재하지 않는 게시판 입니다.");		
	}

	// 3) 게시판 설정 정보 배열변환
	$bbs_config_data = $db -> fetch_array();
	
	$cate            = $bbs_config_data['cate'];
	if($cate) {
		$tmp_cate  = explode('|', $cate);
		$cate_navi = explode(',', $tmp_cate[0]);
		$cate_name = explode(',', $tmp_cate[1]);
	}
	$list_level      = $bbs_config_data['l_level'];
	$view_level      = $bbs_config_data['r_level'];
	$write_level     = $bbs_config_data['w_level'];
	$down_level      = $bbs_config_data['d_level'];
	$sort            = $bbs_config_data['sort'];
	$order_by        = $bbs_config_data['order_by'];
	$bbs_skin        = $bbs_skin_dir.'/'.$bbs_config_data['skin'];
	$bbs_skin_path   = $bbs_skin_home.'/'.$bbs_config_data['skin'];
?>