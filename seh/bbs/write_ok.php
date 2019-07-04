<? include_once('../header.php'); ?>
<? include_once('bbs_config.php'); ?>
<?
    $writer     = post('writer');
    $movie_size = post('movie_size');
    $link       = post('link');
    $pwd        = post('pwd');
    $email      = post('email');
    $subject    = post('subject');
    $content    = post('content');

    if (!$session_id) {
        if (!$writer)   { redirect(FALSE, '작성자의 이름을 입력하세요.'); }
        if (!$pwd)      { redirect(FALSE, '비밀번호를 입력하세요.'); }
        if (!$email)    { redirect(FALSE, '이메일 주소를 입력하세요.'); }
    }

    if (!$subject)  { redirect(FALSE, '글 제목을 입력하세요.'); }
    if (!$content)  { redirect(FALSE, '글 내용을 입력하세요.'); }

    // 업로드 받기
    $file_info = do_upload('myfile', array('jpg', 'gif', 'png', 'jpeg'));

    if (!$session_id) {
        $sql = "INSERT INTO bbs_documents (
                bbs_id, writer, pwd, email, movie_size, link, subject, content, hit, reg_date, edit_date
            ) VALUES (
                %d, '%s', password('%s'), '%s', '%s', '%s', '%s', '%s', 0, now(), now()
            )";

        $result = $db -> query($sql, array($bbs_id, $writer, $pwd, $email, $movie_size, $link, $subject, $content));
    } else if ($session_user_id == 'admin') {
        $sql = "INSERT INTO bbs_documents (
                bbs_id, member_id, writer, pwd, email, movie_size, link, subject, content, hit, reg_date, edit_date
            ) VALUES (
                %d, %d, '%s', (SELECT adm_pw FROM admin WHERE admin.id=%d), 
                '%s', '%s', '%s', '%s', '%s', 0, now(), now()
            )";
        $result = $db -> query($sql, array($bbs_id, $session_id, $session_user_name, 
                       $session_id, $session_email, $movie_size, $link, $subject, $content));
    } else {
        $sql = "INSERT INTO bbs_documents (
                bbs_id, member_id, writer, pwd, email, movie_size, link, subject, content, hit, reg_date, edit_date
            ) VALUES (
                %d, %d, '%s', (SELECT user_pw FROM members WHERE members.id=%d), 
                '%s', '%s', '%s', '%s', '%s', 0, now(), now()
            )";
        $result = $db -> query($sql, array($bbs_id, $session_id, $session_user_name, 
                       $session_id, $session_email, $movie_size, $link, $subject, $content));
    }

    if (!$result) {
        redirect(FALSE, '글 작성에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    // 게시물 일련번호.
    $id = $db -> insert_id();

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

    redirect($read_url);
?>
