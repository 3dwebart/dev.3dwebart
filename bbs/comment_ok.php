<?php
    include_once('../header.php');
    include_once('bbs_config.php');

    $id = post('id');
    $writer = post('writer');
    $pwd = post('pwd');
    $email = post('email');
    $content = post('content');

    if (!$id)       { redirect(FALSE, '글 번호가 없습니다.'); }

    if (!$session_u_id) {
        if (!$writer)   { redirect(FALSE, '작성자의 이름을 입력하세요.'); }
        if (!$pwd)      { redirect(FALSE, '비밀번호를 입력하세요.'); }
        if (!$email)    { redirect(FALSE, '이메일 주소를 입력하세요.'); }
    }

    if (!$content)  { redirect(FALSE, '덧글 내용을 입력하세요.'); }

    if (!$session_u_id) {
        $sql = "INSERT INTO `%s` (
                    document_id, writer, pwd, email, content, reg_date, edit_date
                ) VALUES (
                    %d, '%s', password('%s'), '%s', '%s', now(), now()
                )";

        $result = $db -> query($sql, array($bo_comm, $id, $writer, $pwd, $email, $content));
    } else {
        $sql = "INSERT INTO `%s` (
                    document_id, member_id, writer, pwd, 
                    email, content, reg_date, edit_date
                ) VALUES (
                    %d, %d, '%s', (SELECT user_pw FROM members WHERE members.id=%d),
                    '%s', '%s', now(), now()
                )";

        $result = $db -> query($sql, array($bo_comm, $id, $session_u_id, $session_user_name, $session_u_id, $session_email, $content));
    }

    if (!$result) {
        redirect(FALSE, '덧글 작성에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    $read_url = 'read.php?bbs_id='.$bbs_id.'&id='.$id;
    redirect($read_url);
?>
