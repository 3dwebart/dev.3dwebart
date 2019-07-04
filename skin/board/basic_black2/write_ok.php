<?php
	include_once('../header_ui.php');
	include_once('bbs_config.php');
	include_once($site_dir.'/include/class.image.php');
	
	$bbs_id         = post('bbs_id');
	$bo_name        = post('bo_name');
	$writer         = post('writer');
	$movie_size     = post('movie_size');
	$movie_id       = post('movie_id');
	$link           = post('link');
	$pwd            = post('pwd');
	$email          = post('email');
	$subject        = post('subject');
	$content        = post('content');
	$img_align      = post('img_align');
	$img_pos        = post('img_pos');
	$notice_yn      = post('notice_yn', 'n');
	$notice_yn_text = post('notice_yn_text', '공지');
	$html           = post('html', 'n');

	if (!$session_id) {
		if (!$writer)   { redirect(FALSE, '작성자의 이름을 입력하세요.'); }
		if (!$pwd)      { redirect(FALSE, '비밀번호를 입력하세요.'); }
		if (!$email)    { redirect(FALSE, '이메일 주소를 입력하세요.'); }
	}

	if (!$subject)  { redirect(FALSE, '글 제목을 입력하세요.'); }
	
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

	if (!$content && !$_FILES['myfile']['name'][0])  { redirect(FALSE, '글 내용을 입력하서나 이미지 파일을 업로드 하세요.'); }
	
	if (!$session_id) {
		$sql = "INSERT INTO bbs_documents (
				bbs_id, bbs_name, html, writer, pwd, email, subject, content, img_align, img_pos, hit, reg_date, edit_date
			) VALUES (
				%d, '%s', '%s', '%s', password('%s'), '%s', '%s', '%s', '%s', '%s', 0, now(), now()
			)";

		$result = $db -> query($sql, array($bbs_id, $bo_name, $html, $writer, $pwd, $email, $subject, $content, $img_align, $img_pos));
	} else if ($session_is_admin == 'true') {
		$sql = "INSERT INTO bbs_documents 
					(bbs_id, bbs_name, member_id, html, writer, pwd, email, subject, content, img_align, img_pos, hit, reg_date, edit_date) 
				VALUES 
					(%d, '%s', %d, '%s', '%s', (SELECT adm_pw FROM admin WHERE admin.adm_id='%s'), '%s', '%s', '%s', '%s', '%s', 0, now(), now())";
		
		$result = $db -> query($sql, array($bbs_id, $bo_name, $session_id, $html, $session_user_name, $session_user_id, $session_email, $subject, $content, $img_align, $img_pos));
								
	} else {
		$sql = "INSERT INTO bbs_documents (
			bbs_id, bbs_name, member_id, html, writer, pwd, email, subject, content, img_align, img_pos, hit, reg_date, edit_date
		) VALUES (
			%d, '%s', %d, '%s', '%s', (SELECT user_pw FROM members WHERE members.user_id='%s'), 
			'%s', '%s', '%s', '%s', '%s', 0, now(), now()
		)";
		$result = $db -> query($sql, array($bbs_id, $bo_name, $session_id, $html, $session_user_name, $session_user_id,
								$session_email, $subject, $content, $img_align, $img_pos));
	}

	if (!$result) {
		redirect(FALSE, '글 작성에 실패했습니다. 관리자에게 문의 바랍니다.');
	}

    // 게시물 일련번호.
    $id = $db -> insert_id();

    if($notice_yn == 'y') {
		$sql = "UPDATE bbs_documents SET notice_yn = '%s', notice_yn_text = '[%s]' WHERE id = %d";
		$result = $db -> query($sql, array($notice_yn, $notice_yn_text, $id));
	} else {
		$sql = "UPDATE bbs_documents SET notice_yn = '%s', notice_yn_text = null  WHERE id = %d";
		$result = $db -> query($sql, array($notice_yn, $id));
	}
	
	if(!$movie_size) {
		$sql = "UPDATE bbs_documents SET movie_size = null WHERE id = %d";
		$result = $db -> query($sql, array($id));
	}
	
	if(!$movie_id) {
		$sql = "UPDATE bbs_documents SET movie_id = null WHERE id = %d";
		$result = $db -> query($sql, array($id));
	}
	
	if(!$link) {
		$sql = "UPDATE bbs_documents SET link = null WHERE id = %d";
		$result = $db -> query($sql, array($id));
	}

    // 첨부파일이 존재한다면?
    if (is_array($file_info)) {

        // 파일정보를 저장하기 위한 기본 SQL 탬플릿
        $sql = "INSERT INTO bbs_files (
                    document_id, file_kind, dir, file_name, file_type,
                    file_size, origin_name, full_path,
                    reg_date, edit_date
                ) VALUES (
                    %d, 'origin' '%s', '%s', '%s', %d, '%s', '%s', now(), now()
                )";

        // 업로드 된 파일의 수
        $count = count($file_info);

        // 업로드 된 파일의 수 만큼 반복
        for ($i = 0; $i < $count; $i++) {
            if (is_array($file_info[$i])) {
                $db -> query($sql, array(
                    $id, $file_info[$i]['dir'], $file_info[$i]['file_name'],
                    $file_info[$i]['file_type'], $file_info[$i]['file_size'],
                    $file_info[$i]['origin_name'], $file_info[$i]['full_path']
                ));
            }
        }
    }

    $sql = "SELECT document_id, dir, file_name, file_type, file_size, origin_name, full_path, reg_date, edit_date FROM bbs_files WHERE document_id = %d LIMIT 0, 1";
    $result = $db -> query($sql, array($id));

    $row = $db -> fetch_assoc();

    $thumb = new Image($site_dir.$row['dir'].$row['file_name']);

    $thumb->name('thumb_'.$row['file_name']);

    $thumb->width(320);

    $thumb->save();
    make_thumbnail();

    if(empty($bo_name)) {
	    $read_url = 'read.php?bbs_id='.$bbs_id.'&id='.$id;
    } else {
	    $read_url = 'read.php?bo_name='.$bo_name.'&id='.$id;
    }

    redirect($read_url);
?>
