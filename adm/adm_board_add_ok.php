<?php
	include_once('../header.php');

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}
	
	// 이전 페이지의 파라미터 받기
	$list_count      = post('list_count');
	$chk_count       = post('chk_count');
	$bo_group_id     = post('bo_group_id');
	$bo_group_name   = post('bo_group_name');
	$bo_name         = post('bo_name');
	$cate_yn         = post('cate_yn');
	$cate_ko         = post('cate_ko');
	$cate_en         = post('cate_en');
	$title           = post('title');
	$skin            = post('skin');
	$chk_skin        = post('chk_type');
	$l_level         = post('l_level', 5);
	$chk_list        = post('chk_list');
	$r_level         = post('r_level', 5);
	$chk_read        = post('chk_read');
	$w_level         = post('w_level', 5);
	$chk_write       = post('chk_write');
	$d_level         = post('d_level', 5);
	$chk_down        = post('chk_down');
	$html_level      = post('html_level');
	$chk_html        = post('chk_html');
	$copy_move_level = post('copy_move_level');
	$chk_copy_move   = post('chk_copy_move');
	$bo_sort         = post('bo_sort');
	$bo_order_by     = post('bo_order_by');

	$category = FALSE;

	// 필수 입력값 존재 여부 검사하기
	if (!$bo_name) { redirect(FALSE, '게시판 이름을 작성하세요.'); }
	if (!$title) { redirect(FALSE, '게시판 이름을 작성하세요.'); }
	if (!$skin)  { redirect(FALSE, '게시판 스킨을 선택하세요.'); }


	// 중복 게시판 확인을 위한 SQL문
	$sql = "SELECT COUNT(id) FROM bbs_config WHERE bo_name = '%s'";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($bo_name));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '게시판 정보 수정에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	$row = $db -> fetch_row();

	if ($row[0] > 0) {
		redirect(FALSE, '이미 생성된 게시판 입니다.\n 다른 이름으로 생성해 주세요.');
	}

	// 중복 게시판 확인을 위한 SQL문
	$sql = "SELECT COUNT(id) FROM bbs_config WHERE title = '%s'";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($title));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '게시판 정보 수정에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	$row = $db -> fetch_row();

	if ($row[0] > 0) {
		redirect(FALSE, '이미 생성된 게시판 입니다.\n 다른 이름으로 생성해 주세요.');
	}

	if($cate_ko) {
		$cate_k = explode(',', $cate_ko);
	}

	if($cate_en) {
		$cate_e = explode(',', $cate_en);
	}

	if($cate_ko && $cate_en) {
		$cnt_cate_ko = count($cate_ko);
		$cnt_cate_en = count($cate_en);
	}

	if($cate_yn == 'y') {
		if(count($cate_k) == 0 && count($cate_e) == 0) {
			redirect(FALSE, '카테고리다 정의되지 않았습니다.');
		} else if(count($cate_k) != count($cate_e)) {
			redirect(FALSE, '카테고리의 영문과 한글의 갯수가 메치되지 않습니다.');
		} else {
			$category = $cate_en.'|'.$cate_ko;
		}
	}

	// 업로드 받기
	$file_info_t = do_upload('top_file');
	$file_info_b = do_upload('bottom_file');

	// 게시판 생성 처리를 위한 SQL 템플릿
	$sql = "INSERT INTO bbs_config 
				(list_count, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, d_level, html_level, copy_move_level, sort, order_by, reg_date, edit_date) 
			VALUES 
				(%d, '%s', '%s', '%s', '%s', '%s', %d, %d, %d, %d, %d, %d, '%s', '%s', now(), now())";

	// 탬플릿에 입력값 조립하기
	$result = $db -> query($sql, array($list_count, $bo_group_id, $bo_group_name, $bo_name, $title, $skin, $l_level, $r_level, $w_level, $d_level, $html_level, $copy_move_level, $bo_sort, $bo_order_by));

	$id = $db -> insert_id();

	if($category != FALSE) {
		$sql = "UPDATE bbs_config SET cate = '%s' WHERE id = %d";
		$result = $db -> query($sql, array($category, $id));
	} else {
		$sql = "UPDATE bbs_config SET cate = null WHERE id = %d";
		$result = $db -> query($sql, array($id));
	}

	// 상단파일의 첨부파일이 존재 한다면
	if ($file_info_t) {

		// 파일 정보를 저장하기 위한 기본 SQL 템플릿
		$sql = "INSERT INTO deco_files (
				document_id, file_area, dir, file_name, file_type, file_size, origin_name, 
				full_path, reg_date, edit_date
		) VALUES (%d, 'top', '%s', '%s', '%s', %d, '%s', '%s', now(), now())";
		
		if (is_array($file_info_t)) {
			$db -> query($sql, array($id, $file_info_t['dir'], $file_info_t['file_name'], 
				$file_info_t['file_type'], $file_info_t['file_size'], 
				$file_info_t['origin_name'], $file_info_t['full_path']));
		}
	}

	// 하단파일의 첨부파일이 존재 한다면
	if ($file_info_b) {

		// 파일 정보를 저장하기 위한 기본 SQL 템플릿
		$sql = "INSERT INTO deco_files (
				document_id, file_area, dir, file_name, file_type, file_size, origin_name, 
				full_path, reg_date, edit_date
		) VALUES (%d, 'bottom', '%s', '%s', '%s', %d, '%s', '%s', now(), now())";
		
		if (is_array($file_info_b)) {
			$db -> query($sql, array($id, $file_info_b['dir'], $file_info_b['file_name'], 
				$file_info_b['file_type'], $file_info_b['file_size'], 
				$file_info_b['origin_name'], $file_info_b['full_path']));
		}
	}
	
	if($chk_count == 'y') {
		$sql = "UPDATE bbs_config SET list_count = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($list_count, $bo_group_id));
	}
	
	if($chk_list == 'y') {
		$sql = "UPDATE bbs_config SET l_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($l_level, $bo_group_id));
	}
	
	if($chk_read == 'y') {
		$sql = "UPDATE bbs_config SET r_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($r_level, $bo_group_id));
	}
	
	if($chk_write == 'y') {
		$sql = "UPDATE bbs_config SET w_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($w_level, $bo_group_id));
	}
	
	if($chk_down == 'y') {
		$sql = "UPDATE bbs_config SET d_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($d_level, $bo_group_id));
	}

	if($chk_html == 'y') {
		$sql = "UPDATE bbs_config SET html_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($html_level, $bo_group_id));
	}

	if($chk_copy_move == 'y') {
		$sql = "UPDATE bbs_config SET copy_move_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($copy_move_level, $bo_group_id));
	}

	$create_db = $db -> create_table($bo_name);

	// SQL구문 출력해 보기 (중간확인)
	// echo($sql);

	// SQL문 실행하기
	redirect($admin_home.'/adm_board_list.php', '게시판이 생성 되었습니다.');

	//$row = fetch_row();

	// SQL 구문 출력해 보기 (중간확인)
	//echo($sql);
	
	include_once('footer_ui.php');
?> 