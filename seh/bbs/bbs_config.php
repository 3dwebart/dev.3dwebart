<?
	/** 모든 게시판 관련 파일에서 참조할 파일. */

	// 1) 게시판 아이디 받기
	$bbs_id = get("bbs_id");

	if (!$bbs_id) {
		$bbs_id = post("bbs_id");
	}

	if (!$bbs_id) {
		redirect(FALSE, "게시판 아이디가 없습니다.");
	}

	// 2) 게시판 설정정보 로딩
	$sql = "SELECT id, title, type FROM bbs_config WHERE id = %d";
	$result = $db -> query($sql, array($bbs_id));

	if (!$result) {
		redirect(FALSE, "게시판 정보 조회에 실패했습니다.");	
	}

	if ($db -> num_rows() < 1) {
		redirect(FALSE, "존재하지 않는 게시판 입니다.");		
	}

	// 3) 게시판 설정 정보 배열변환
	$bbs_config_data = $db -> fetch_array();
?>