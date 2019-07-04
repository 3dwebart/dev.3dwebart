<? include_once('../header.php'); ?>
<? include_once('bbs_config.php'); ?>
<?

    $id = post('id');
    $writer = post('writer');
    $pwd = post('pwd');
    $email = post('email');
    $subject = post('subject');
    $content = post('content');

    if (!$id)       { redirect(FALSE, '글 번호가 없습니다.'); }

    if (!$session_id) {    
        if (!$writer)   { redirect(FALSE, '작성자의 이름을 입력하세요.'); }
        if (!$pwd)      { redirect(FALSE, '비밀번호를 입력하세요.'); }
        if (!$email)    { redirect(FALSE, '이메일 주소를 입력하세요.'); }
    }

    if (!$subject)  { redirect(FALSE, '글 제목을 입력하세요.'); }
    if (!$content)  { redirect(FALSE, '글 내용을 입력하세요.'); }


    if (!$session_id) {
        $sql = "UPDATE bbs_documents SET
                    writer='%s', email='%s', subject='%s', content='%s', edit_date=now()
                WHERE id=%d AND pwd=password('%s')";

        $result = $db -> query($sql, array($writer, $email, $subject, $content,
                                            $id, $pwd));
    } else if ($session_user_id == 'admin') {
        $sql = "UPDATE bbs_documents SET
                    writer='%s', email='%s', subject='%s', content='%s', edit_date=now()
                WHERE id=%d";

        $result = $db -> query($sql, array($session_user_name, $session_user_email, $subject, $content,
                                            $id));
    } else {
        $sql = "UPDATE bbs_documents SET
                    writer='%s', email='%s', subject='%s', content='%s', edit_date=now()
                WHERE id=%d AND member_id=%d";

        $result = $db -> query($sql, array($session_user_name, $session_use_email, $subject, $content,
                                            $id, $session_id));
    }

    if (!$result) {
        redirect(FALSE, '글 수정에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    if ($db -> affected_rows() < 1) {
        if (!$session_id) {
            redirect(FALSE, '비밀번호가 맞지 않습니다.');
        } else {
            redirect(FALSE, '다른 회원의 글을 수정할 수 없습니다.');
        }
    }

    /****** 첨부파일 삭제 처리 *******/
    $delete = post('delete');

    // 삭제대상이 지정된 경우
    if (is_array($delete)) {
        $target = implode(",", $delete);
        $sql = "SELECT full_path FROM bbs_files WHERE id IN (%s)";

        $result = $db -> query($sql, array($target));

        if ($result) {
            while ($row = $db -> fetch_array()) {
                $full_path = $row['full_path'];
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }
        }

        $sql = "DELETE FROM bbs_files WHERE id IN (%s)";
        $db -> query($sql, array($target));
    }

    /****** 첨부파일 추가 처리 *******/
    // 업로드 받기
    $file_info = do_upload('myfile', array('jpg', 'gif', 'png', 'jpeg'));

    // 첨부파일이 존재한다면?
    if (is_array($file_info)) {

        // 파일정보를 저장하기 위한 기본 SQL 탬플릿
        $sql = "INSERT INTO bbs_files (
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
                    $id, $file_info[$i]['dir'], $file_info[$i]['file_name'],
                    $file_info[$i]['file_type'], $file_info[$i]['file_size'],
                    $file_info[$i]['origin_name'], $file_info[$i]['full_path']
                ));
            }
        }

    }

    $read_url = 'read.php?bbs_id='.$bbs_id.'&id='.$id;

    redirect($read_url, '수정되었습니다.');
?>
