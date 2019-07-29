<?php
	include_once('../header_ui.php');
	include_once('bbs_config.php');
	require_once($site_dir.'/include/Thumbnail.class.php');
	
	$bbs_id         = post('bbs_id');
	$bo_name        = post('bo_name');
	$cate_id        = post('cate_id');
	$writer         = post('writer');
	$movie_size     = post('movie_size');
	$movie_id       = post('movie_id');
	$link           = post('link');
	$pwd            = post('pwd');
	$email          = post('email');
	$subject        = post('subject');
	$ex1            = post('ex1');
	$ex2            = post('ex2');
	$content        = post('content');
	$img_align      = post('img_align');
	$img_pos        = post('img_pos');
	$notice_yn      = post('notice_yn', 'n');
	$notice_yn_text = post('notice_yn_text', '공지');
	$html           = post('html', 'n');
	$Thumbnail_path = 'Thumbnail';

	if (!$session_id) {
		if (!$writer)   { redirect(FALSE, '작성자의 이름을 입력하세요.'); }
		if (!$pwd)      { redirect(FALSE, '비밀번호를 입력하세요.'); }
		if (!$email)    { redirect(FALSE, '이메일 주소를 입력하세요.'); }
	}

	if (!$subject)  { redirect(FALSE, '글 제목을 입력하세요.'); }
	if (!$content)  { redirect(FALSE, '글 내용을 입력하세요.'); }
	if(is_array($cate_id)) {
		$category = $cate_id[0];
		if(count($cate_id) > 1) {
			for ($i=0; $i < count($cate_id); $i++) { 
				$category .= ','.$cate_id[$i];
			}
		}
	}

	$switch_content = 0;

	if(is_array($content)) {
		$switch_content = 1;
		$tmp_content = '';
		$content_arr = $content;
		$code_type    = post('code_type');
		$filePresence = post('filePresence');
		include_once('codePubJson.php');
		$content = $viewJsonCode;
		for ($i = 0; $i < count($code_type); $i++) { 
			if($i != 0) {
				$tmp_content .= chr(30);
			}
			$tmp_content .= $code_type[$i].chr(31).$filePresence[$i].chr(31).$content[$i];
		}

		$content = $tmp_content;
	}

	// 내용 보기 중 상세 내용 표시 상세보기 클릭시 팝업창에 노출
	$explanation1 = '';
	$explanation2 = '';
	if(is_array($ex1)) {
		for ($i=0; $i < count($ex1); $i++) { 
			$explanation1 .= $explanation1.'|'.$ex1;
			$explanation2 .= $explanation2.'|'.$ex2;
		}
		$explanation = $explanation1.'||'.$explanation2;
	}

	if ($movie_size && !$movie_id) { redirect(FALSE, '동영상을 사용하려면 동영상의 아이디가 필요합니다.\n아이디가 없습니다. '); }
	
	if (!$movie_size && $movie_id) { redirect(FALSE, '동영상을 사용하려면 동영상의 비율을 정해야 합니다.\n비율을 정해주세요. '); }
	
	if($bo_name) {
		$sql = "SELECT id FROM bbs_config WHERE bo_name = '%s'";
		$result = $db -> query($sql, array($bo_name));
		
		$tmp = $db -> fetch_assoc();
		
		$bbs_id = $tmp['id'];
	}
	
	if($bbs_id) {
		$sql = "SELECT bo_name FROM bbs_config WHERE id = %d";
		$result = $db -> query($sql, array($bbs_id));
		
		$tmp = $db -> fetch_assoc();
		
		$bo_name = $tmp['bo_name'];
	}
		
	// 업로드 받기
	$file_info = do_upload('myfile', array('jpg', 'gif', 'png', 'jpeg'));
	
	if (!$session_id) {
		$sql = "INSERT INTO `%s` (
				bbs_id, bbs_name, cate, html, writer, pwd, email, subject, content, img_align, img_pos, hit, reg_date, edit_date
			) VALUES (
				%d, '%s', '%s', '%s', '%s', password('%s'), '%s', '%s', '%s', '%s', '%s', 0, now(), now()
			)";

		$result = $db -> query($sql, array($bo_table, $bbs_id, $bo_name, $category, $html, $writer, $pwd, $email, $subject, $content, $img_align, $img_pos));
	} else if ($session_is_admin == 'true') {
		$sql = "INSERT INTO `%s` 
					(bbs_id, bbs_name, cate, member_id, html, writer, pwd, email, subject, content, img_align, img_pos, hit, reg_date, edit_date) 
				VALUES 
					(%d, '%s', '%s', %d, '%s', '%s', (SELECT adm_pw FROM admin WHERE admin.adm_id='%s'), '%s', '%s', '%s', '%s', '%s', 0, now(), now())";
		
		$result = $db -> query($sql, array($bo_table, $bbs_id, $bo_name, $category, $session_id, $html, $session_user_name, $session_user_id, $session_user_email, $subject, $content, $img_align, $img_pos));
								
	} else {
		$sql = "INSERT INTO `%s` (
			bbs_id, bbs_name, cate, member_id, html, writer, pwd, email, subject, content, img_align, img_pos, hit, reg_date, edit_date
		) VALUES (
			%d, '%s', '%s', %d, '%s', '%s', (SELECT user_pw FROM members WHERE members.user_id='%s'), 
			'%s', '%s', '%s', '%s', '%s', 0, now(), now()
		)";
		$result = $db -> query($sql, array($bo_table, $bbs_id, $bo_name, $category, $session_id, $html, $session_user_name, $session_user_id,
								$session_user_email, $subject, $content, $img_align, $img_pos));
	}

	if (!$result) {
		redirect(FALSE, '글 작성에 실패했습니다. 관리자에게 문의 바랍니다.');
	}

	// 게시물 일련번호.
	$id = $db -> insert_id();

	if($notice_yn == 'y') {
		$sql = "UPDATE `%s` SET notice_yn = '%s', notice_yn_text = '[%s]' WHERE id = %d";
		$result = $db -> query($sql, array($bo_table, $notice_yn, $notice_yn_text, $id));
	} else {
		$sql = "UPDATE `%s` SET notice_yn = '%s', notice_yn_text = null  WHERE id = %d";
		$result = $db -> query($sql, array($bo_table, $notice_yn, $id));
	}

	// 첨부파일이 존재한다면?
	if (is_array($file_info)) {
		// 파일정보를 저장하기 위한 기본 SQL 탬플릿
		$sql = "INSERT INTO `%s` (
					document_id, file_kind, dir, file_name, file_type,
					file_size, origin_name, full_path,
					reg_date, edit_date
				) VALUES (
					%d, '%s', '%s', '%s', '%s', %d, '%s', '%s', now(), now()
				)";

		// 업로드 된 파일의 수
		$count = count($file_info);

		// 업로드 된 파일의 수 만큼 반복
		for ($i = 0; $i < $count; $i++) {
			if (is_array($file_info[$i])) {
				$db -> query($sql, array(
					$bo_file, $id, 'origin', $file_info[$i]['dir'], $file_info[$i]['file_name'],
					$file_info[$i]['file_type'], $file_info[$i]['file_size'],
					$file_info[$i]['origin_name'], $file_info[$i]['full_path']
				));
			}
		}

		$sql = "SELECT count(id) AS cnt_file FROM bbs_files WHERE document_id = %d";
		$result = $db -> query($sql, array($id));

		$row = $db -> fetch_assoc();

		$cnt_file = $row['cnt_file'];
		if($cnt_file > 0) {
			$sql = "SELECT document_id, file_kind, dir, file_name, file_type,
							file_size, origin_name, full_path,
							reg_date, edit_date FROM `%s` WHERE document_id = %d AND file_type LIKE '%%%s%%' LIMIT 0, 1";
			$result = $db -> query($sql, array($bo_file, $id, 'image'));

			$row = $db -> fetch_assoc();

			$file_dir = $row['dir'];
			$file_name = $row['file_name'];
			$file_type = $row['file_type'];
			$origin_name = $row['origin_name'];
			$full_path = $row['full_path'];
			$thumbnail_full_path = $site_dir.$row['dir'].$Thumbnail_path.'/'.$row['file_name'];

			$row = $db -> fetch_assoc();
			$thumbnail_file = $site_dir.$file_dir.$file_name;
			$sourcefiles = Array(
				$thumbnail_file
			);

			//Thumbnail::setOption('debug', true);

			//echo('<h1>id = '.$id.'</h1><h1>dir = '.$file_dir.'</h1><h1>path = '.$thumbnail_full_path.'</h1>');

			for ($L1 = 0; $L1 < count($sourcefiles); $L1++) {
				// case 3
				// 크기를 120x120 으로 설정하고 이미지가 크기에 꽉 차도록 설정
				Thumbnail::create($sourcefiles[$L1],
					120, 120,
					SCALE_EXACT_FIT,
					Array(
						'preprocess' => Array(&$watermark, 'preprocess'),
						'postprocess' => Array(&$watermark, 'postprocess'),
						'savepath' => $site_dir.$file_dir.$Thumbnail_path.'/'.$file_name
					)
				);
			}

			echo('<h1>thumbnail_full_path = '.$thumbnail_full_path.'</h1>');

			$thumbnail_size = filesize($thumbnail_full_path);

			echo('<h1>thumbnail_size = '.$thumbnail_size.'</h1>');

			echo('<h1>id = '.$id.'</h1>');
			echo('<h1>Thumbnail_path = '.$file_dir.$Thumbnail_path.'/</h1>');
			echo('<h1>file_name = '.$file_name.'</h1>');
			echo('<h1>file_type = '.$file_type.'</h1>');
			echo('<h1>thumbnail_size = '.$thumbnail_size.'</h1>');
			echo('<h1>origin_name = '.$origin_name.'</h1>');
			echo('<h1>thumbnail_full_path = '.$file_dir.$Thumbnail_path.'</h1>');

			$sql = "INSERT INTO `%s` (
						document_id, file_kind, dir, file_name, file_type,
						file_size, origin_name, full_path,
						reg_date, edit_date
					) VALUES (
						%d, 'thumb', '%s', '%s', '%s', %d, '%s', '%s', now(), now()
					)
					";
			$result = $db -> query($sql, array($bo_file, $id, $file_dir.$Thumbnail_path.'/', $file_name, $file_type, $thumbnail_size, $origin_name, $thumbnail_full_path));
		}
	}

	if(empty($bo_name)) {
		$read_url = 'read.php?bbs_id='.$bbs_id.'&id='.$id;
	} else {
		$read_url = 'read.php?bo_name='.$bo_name.'&id='.$id;
	}

	redirect($read_url);
?>
