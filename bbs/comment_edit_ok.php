<?php
    include_once('../header.php');
    include_once('bbs_config.php');

    $id         = post('id');
    $comment_id = post('comment_id');
    $writer     = post('writer');
    $pwd        = post('pwd');
    $email      = post('email');
    $content    = post('content');

    if (!$id)           { redirect(FALSE, '글 번호가 없습니다.'); }
    if (!$comment_id)   { redirect(FALSE, '댓글 번호가 없습니다.'); }

    if (!$session_u_id) {
        if (!$writer)       { redirect(FALSE, '작성자의 이름을 입력하세요.'); }
        if (!$pwd)          { redirect(FALSE, '비밀번호를 입력하세요.'); }
        if (!$email)        { redirect(FALSE, '이메일 주소를 입력하세요.'); }
    }

    if (!$content)      { redirect(FALSE, '댓글 내용을 입력하세요.'); }

    if (!$session_u_id) {
        $sql = "UPDATE `%s` SET
                    writer='%s', email='%s', content='%s', edit_date=now()
                WHERE id=%d AND pwd=password('%s')";

        $result = $db -> query($sql, array($bo_comm, $writer, $email, $content,
                                            $comment_id, $pwd));
    } else {
        $sql = "UPDATE `%s` SET
                    writer='%s', email='%s', content='%s', edit_date=now()
                WHERE id=%d AND member_id=%d";

        $result = $db -> query($sql, array($bo_comm, $session_user_name, $session_email, $content, $comment_id, $session_u_id));
    }

    if (!$result) {
        redirect(FALSE, '댓글 수정에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    if ($db -> affected_rows() < 1) {
        redirect(FALSE, '비밀번호가 맞지 않습니다.');
    }

    $read_url = 'read.php?bbs_id='.$bbs_id.'&id='.$id;
    redirect($read_url, '수정되었습니다.');
?>
