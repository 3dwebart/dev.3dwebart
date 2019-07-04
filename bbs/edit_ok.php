<? 
    include_once('../header.php');
    include_once('bbs_config.php');
    include_once('class.image.php');

    $id             = post('id');
	$bbs_id         = post('bbs_id');
    $bo_name        = post('bo_name');
    $writer         = post('writer');
    $pwd            = post('pwd');
    $email          = post('email');
    $movie_id       = post('movie_id');
    $movie_size     = post('movie_size');
    $link           = post('link');
    $subject        = post('subject');
    $ex1            = post('ex1');
    $ex2            = post('ex2');
    $content        = post('content');
    $img_align      = post('img_align');
    $img_pos        = post('img_pos');
    $notice_yn      = post('notice_yn', 'n');
	$notice_yn_text = post('notice_yn_text', '공지');
	$html           = post('html', 'n');

    if (!$id)       { redirect(FALSE, '글 번호가 없습니다.'); }

    if (!$session_id) {    
        if (!$writer)   { redirect(FALSE, '작성자의 이름을 입력하세요.'); }
        if (!$pwd)      { redirect(FALSE, '비밀번호를 입력하세요.'); }
        if (!$email)    { redirect(FALSE, '이메일 주소를 입력하세요.'); }
    }

    if (!$subject)  { redirect(FALSE, '글 제목을 입력하세요.'); }
    if (!$content)  { redirect(FALSE, '글 내용을 입력하세요.'); }

    $explanation = null;
    $tmp_ex1     = null;
    $tmp_ex2     = null;

    if(is_array($ex1)) {
        $tmp_ex1 = $ex1[0];
        $tmp_ex2 = $ex2[0];
        if ($ex1[1]) {
            for ($i=1; $i < count($ex1); $i++) { 
                $tmp_ex1 = $tmp_ex1.'|'.$ex1[$i];
                $tmp_ex2 = $tmp_ex2.'|'.$ex2[$i];
            }
            $explanation = $tmp_ex1.'||'.$tmp_ex2;
        }
    }


    if (!$session_user_id) {
        $sql = "UPDATE `%s` SET
                    writer='%s', email='%s', html = '%s',  subject='%s', explanation='%s' , content='%s', img_align = '%s', img_pos = '%s', edit_date=now()
                WHERE id=%d AND pwd=password('%s')";

        $result = $db -> query($sql, array($bo_table, $writer, $email, $html, $subject, $explanation, $content, $img_align, $img_pos, 
                                            $id, $pwd));
    } else if ($session_user_id == 'admin') {
        $sql = "UPDATE `%s` SET
                    writer='%s', email='%s', html = '%s', subject='%s', explanation='%s', content='%s', img_align = '%s', img_pos = '%s', edit_date=now()
                WHERE id=%d";

        $result = $db -> query($sql, array($bo_table, $session_user_name, $session_user_email, $html, $subject, $explanation, $content, $img_align, $img_pos, $id));
    } else {
        $sql = "UPDATE `%s` SET
                    writer='%s', email='%s', html = '%s', subject='%s', explanation='%s', content='%s', img_align = '%s', img_pos = '%s', edit_date=now()
                WHERE id=%d AND member_id=%d";

        $result = $db -> query($sql, array($bo_table, $session_user_name, $session_use_email, $html, $subject, $content, $img_align, $img_pos, $id, $session_id));
    }
    
    if(!$session_user_id) {
	    $sql = "SELECT pwd FROM `%s` WHERE pwd = password('%s') AND id = %d";
	    $result = $db -> query($sql, array($bo_table, $pwd, $id));
    } else if($session_is_admin == 'true') {
	    $sql = "SELECT pwd FROM `%s` WHERE pwd = (SELECT adm_pw FROM admin WHERE adm_id = '%s') AND id = %d";
	    $result = $db -> query($sql, array($bo_table, $session_user_id, $id));
    } else {
	    $sql = "SELECT pwd FROM `%s` WHERE pwd = (SELECT user_pw FROM members WHERE user_id = '%s') AND id = %d";
	    $result = $db -> query($sql, array($bo_table, $session_user_id, $id));
    }

    if ($db -> affected_rows() < 1) {
        if (!$session_user_id) {
            redirect(FALSE, '비밀번호가 맞지 않습니다.');
        } else {
            redirect(FALSE, '다른 회원의 글을 수정할 수 없습니다.');
        }
    }
    
    if($notice_yn == 'y') {
		$sql = "UPDATE `%s` SET notice_yn = '%s', notice_yn_text = '[%s]' WHERE id = %d";
		$result = $db -> query($sql, array($bo_table, $notice_yn, $notice_yn_text, $id));
	} else {
		$sql = "UPDATE `%s` SET notice_yn = '%s', notice_yn_text = null  WHERE id = %d";
		$result = $db -> query($sql, array($bo_table, $notice_yn, $id));
	}
	
	if(!$movie_size) {
		$sql = "UPDATE `%s` SET movie_size = null WHERE id = %d";
		$result = $db -> query($sql, array($bo_table, $id));
	}
	
	if(!$movie_id) {
		$sql = "UPDATE `%s` SET movie_id = null WHERE id = %d";
		$result = $db -> query($sql, array($bo_table, $id));
	}
	
	if(!$link) {
		$sql = "UPDATE `%s` SET link = null WHERE id = %d";
		$result = $db -> query($sql, array($bo_table, $id));
	}

    if (!$result) {
        redirect(FALSE, '글 수정에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    /****** 첨부파일 삭제 처리 *******/
    $delete = post('delete');

    // 삭제대상이 지정된 경우
    if (is_array($delete)) {
        $target = implode(",", $delete);
        $sql = "SELECT full_path FROM `%s` WHERE id IN (%s)";

        $result = $db -> query($sql, array($bo_file, $target));

        if ($result) {
            while ($row = $db -> fetch_array()) {
                $full_path = $row['full_path'];
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }
        }

        $sql = "DELETE FROM `%s` WHERE id IN (%s)";
        $db -> query($sql, array($bo_file, $target));
    }

    /****** 첨부파일 추가 처리 *******/
    // 업로드 받기
    $file_info = do_upload('myfile', array('jpg', 'gif', 'png', 'jpeg'));

    // 첨부파일이 존재한다면?
    if (is_array($file_info)) {

        // 파일정보를 저장하기 위한 기본 SQL 탬플릿
        $sql = "INSERT INTO `%s` (
                    document_id, dir, file_name, file_type,
                    file_size, origin_name, full_path,
                    reg_date, edit_date
                ) VALUES (
                    %d, '%s', '%s', '%s', %d, '%s', '%s', now(), now()
                )";

        // 업로드 된 파일의 수
        $count = count($file_info);

        // 업로드 된 파일의 수 만큼 반복
        for ($i = 0; $i < $count; $i++) {
            if (is_array($file_info[$i])) {
                $db -> query($sql, array(
                    $bo_file, 
                    $id, $file_info[$i]['dir'], $file_info[$i]['file_name'],
                    $file_info[$i]['file_type'], $file_info[$i]['file_size'],
                    $file_info[$i]['origin_name'], $file_info[$i]['full_path']
                ));
            }
        }

    }

    if(empty($bo_name)) {
	    $read_url = 'read.php?bbs_id='.$bbs_id.'&id='.$id;
    } else {
	    $read_url = 'read.php?bo_name='.$bo_name.'&id='.$id;
    }

    redirect($read_url, '수정되었습니다.');
?>
