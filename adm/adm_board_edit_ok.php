<?php
	//include_once('header_ui.php');
	include_once('../header.php');
	
	// 이미 로그인 중이 아니라면 사용 불가
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 수정/생성이 가능합니다.');
	}

	// 이전 페이지의 파라미터 받기
	$board_id        = post('board_id');
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
	$chk_skin        = post('chk_skin');
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
	$top_file_upload_ok = FALSE;
	$category = FALSE;

	// 필수 입력값 존재여부 검사하기
	if (!$title) { redirect(FALSE, '게시판 이름을 작성하세요.'); }
	if (!$skin)  { redirect(FALSE, '게시판 스킨을 선택하세요.'); }

	// 비밀번호 변경 여부
	$is_password = FALSE;

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

	// 새로운 비밀번호가 입력된 경우 SQL에서 비밀번호 변경처리 필요함
	$sql = "UPDATE bbs_config 
	SET bo_group_id = %d, bo_group_name = '%s', title = '%s', skin = '%s', l_level = %d, r_level = %d, w_level = %d, d_level = %d, html_level = %d, copy_move_level = %d, edit_date = now() 
	WHERE id = %d";

	$result = $db -> query($sql, array($bo_group_id, $bo_group_name, $title, $skin, $l_level, $r_level, $w_level, $d_level, $html_level, $copy_move_level, $board_id));

	if($category != FALSE) {
		$sql = "UPDATE bbs_config SET cate = '%s' WHERE id = %d";
		$result = $db -> query($sql, array($category, $board_id));
	} else {
		$sql = "UPDATE bbs_config SET cate = null WHERE id = %d";
		$result = $db -> query($sql, array($board_id));
	}

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '게시판 정보 수정에 실패 했습니다. 관리자에게 문의 바랍니다.');
		
	}

	/****** 첨부파일 삭제 처리 ******/
	$delete_t = post('delete_t');
	$delete_b = post('delete_b');

	// 상단 삭제 대상이 지정된 경우
	if ($delete_t) {
		//$target = implode(",", $delete_t);
		$sql = "SELECT full_path FROM deco_files WHERE document_id = %d  AND file_area = 'top'";
		$result = $db -> query($sql, array($board_id));

		if ($result) {
			$row = $db -> fetch_array();
			$full_path = $row['full_path'];
			if (file_exists($full_path)) {
				unlink($full_path);
			}
		}

		$sql = "SELECT full_path FROM deco_files WHERE document_id = %d  AND file_area = 'thumb_top'";
		$result = $db -> query($sql, array($board_id));

		if ($result) {
			$row = $db -> fetch_array();
			$full_path = $row['full_path'];
			if (file_exists($full_path)) {
				unlink($full_path);
			}
		}

		$sql = "DELETE FROM deco_files WHERE document_id = %d AND file_area = 'top' OR file_area = 'thumb_top'";
		$db -> query($sql, array($board_id));
	}

	/****** 첨부파일 상단파일 처리 ******/
	// 첨부파일이 있을 때 삭제 처리 후 업로드 받기
	$sql = "SELECT full_path FROM deco_files WHERE document_id = %d AND file_area = 'top'";
	$result = $db -> query($sql, array($board_id));

	$row = $db -> fetch_array();

	if ($db -> fetch_row() > 0) {
		$full_path = $row['full_path'];
		if (file_exists($full_path)) {
			unlink($full_path);
		}
	}
	// 없으면 업로드 받기 바로 실행
	$file_info_t = do_upload('top_file', array('jpg', 'gif', 'png', 'jpeg'));

	// 첨부파일이 존재한다면?
	if (is_array($file_info_t)) {
		// 파일정보를 저장하기 위한 기본 SQL 탬플릿
		if ($db -> fetch_row() > 0) {
			$sql = "UPDATE deco_files 
				SET dir = '%s', file_name = '%s', file_type = '%s', 
					file_size = %d, origin_name = '%s', full_path = '%s', edit_date = now() 
					WHERE document_id = %d AND file_area = 'top'";
			$db -> query($sql, array(
				$file_info_t['dir'], $file_info_t['file_name'], 
				$file_info_t['file_type'], $file_info_t['file_size'], 
				$file_info_t['origin_name'], $file_info_t['full_path']
			));
		} else {
			$sql = "INSERT INTO deco_files (
				document_id, file_area, dir, file_name, file_type, file_size, origin_name, full_path, reg_date, edit_date
				) VALUES (%d, 'top', '%s', '%s', '%s', %d, '%s', '%s', now(), now())";
			if (is_array($file_info_t)) {
				$db -> query($sql, array(
					$board_id, $file_info_t['dir'], $file_info_t['file_name'], 
					$file_info_t['file_type'], $file_info_t['file_size'], 
					$file_info_t['origin_name'], $file_info_t['full_path']
				));
			}

			$top_file_upload_ok = TRUE;
		}
	}

	// 하단 삭제 대상이 지정된 경우
	if ($delete_b) {
		//$target = implode(",", $delete_t);
		$sql = "SELECT full_path FROM deco_files WHERE document_id = %d AND file_area = 'bottom'";
		$result = $db -> query($sql, array($board_id));

		if ($result) {
			$row = $db -> fetch_array();
			$full_path = $row['full_path'];
			if (file_exists($full_path)) {
				unlink($full_path);
			}
		}

		$sql = "SELECT full_path FROM deco_files WHERE document_id = %d AND file_area = 'thumb_bottom'";
		$result = $db -> query($sql, array($board_id));

		if ($result) {
			$row = $db -> fetch_array();
			$full_path = $row['full_path'];
			if (file_exists($full_path)) {
				unlink($full_path);
			}
		}

		$sql = "DELETE FROM deco_files WHERE document_id = %d AND file_area = 'bottom' OR file_area = 'thumb_bottom'";
		$db -> query($sql, array($board_id));
	}

	/****** 첨부파일 하단파일 처리 ******/
	// 첨부파일이 있을 때 삭제 처리 후 업로드 받기
	$sql = "SELECT id, full_path FROM deco_files WHERE document_id = %d AND file_area = 'bottom'";
	$result = $db -> query($sql, array($board_id));

	$row = $db -> fetch_array();

	if ($db -> fetch_row() > 0) {
		$full_path = $row['full_path'];
		if (file_exists($full_path)) {
			unlink($full_path);
		}
	}
	// 없으면 업로드 받기 바로 실행
	$file_info_b = do_upload('bottom_file', array('jpg', 'gif', 'png', 'jpeg'));
	

	// 첨부파일이 존재한다면?
	if (is_array($file_info_b)) {
		// 파일정보를 저장하기 위한 기본 SQL 탬플릿
		if ($db -> fetch_row() > 0) {
			$sql = "UPDATE deco_files 
				SET dir = '%s', file_name = '%s', file_type = '%s', 
					file_size = %d, origin_name = '%s', full_path = '%s', edit_date = now() 
					WHERE document_id = %d AND file_area = 'bottom'";
			$db -> query($sql, array(
				$file_info_b['dir'], $file_info_b['file_name'], 
				$file_info_b['file_type'], $file_info_b['file_size'], 
				$file_info_b['origin_name'], $file_info_b['full_path']
			));
		} else {
			$sql = "INSERT INTO deco_files (
				document_id, file_area, dir, file_name, file_type, file_size, origin_name, full_path, reg_date, edit_date
				) VALUES (%d, 'bottom' ,'%s', '%s', '%s', %d, '%s', '%s', now(), now())";
			if (is_array($file_info_b)) {
				$db -> query($sql, array(
					$board_id, $file_info_b['dir'], $file_info_b['file_name'], 
					$file_info_b['file_type'], $file_info_b['file_size'], 
					$file_info_b['origin_name'], $file_info_b['full_path']
				));
			}
		}
	}
	
	if($chk_count == 'y') {
		$sql = "UPDATE bbs_config SET list_count = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($list_count, $bo_group_id));
	}
	
	if($chk_skin == 'y') {
		$sql = "UPDATE bbs_config SET skin = '%s' WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($chk_skin, $bo_group_id));
	}
	
	if($chk_list == 'y') {
		$sql = "UPDATE bbs_config SET l_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($chk_list, $bo_group_id));
	}
	
	if($chk_read == 'y') {
		$sql = "UPDATE bbs_config SET r_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($chk_read, $bo_group_id));
	}
	
	if($chk_write == 'y') {
		$sql = "UPDATE bbs_config SET w_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($chk_write, $bo_group_id));
	}
	
	if($chk_down == 'y') {
		$sql = "UPDATE bbs_config SET d_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($chk_down, $bo_group_id));
	}

	if($chk_html == 'y') {
		$sql = "UPDATE bbs_config SET html_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($html_level, $bo_group_id));
	}

	if($chk_copy_move == 'y') {
		$sql = "UPDATE bbs_config SET copy_move_level = %d WHERE bo_group_id = %d";
		$result = $db -> query($sql, array($copy_move_level, $bo_group_id));
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
	redirect($admin_home.'/adm_board_edit.php?board_id='.$board_id, '게시판 정보가 수정되었습니다.', FALSE);

	include_once('footer_ui.php');
?>
