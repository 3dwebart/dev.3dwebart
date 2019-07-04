<?php
    include_once('../header.php');
    include_once('bbs_config.php');
    
    $id = post('id');
    $comment_id = post('comment_id');
    $pwd = post('pwd');

    if (!$id) { redirect(FALSE, '글 번호가 없습니다.'); }
    if (!$comment_id) { redirect(FALSE, '댓글 번호가 없습니다.'); }

    if (!$session_id) {
        // 삭제 SQL
        $sql = "DELETE FROM `%s` WHERE id=%d AND pwd=password('%s')";
        $result = $db -> query($sql, array($bo_comm, $comment_id, $pwd));
    } else {
        // 삭제 SQL
        $sql = "DELETE FROM `%s` WHERE id=%d AND member_id=%d";
        $result = $db -> query($sql, array($bo_comm, $comment_id, $session_u_id));
    }

    if (!$result) {
        redirect(FALSE, '삭제에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    if ($db -> affected_rows() < 1) {
        redirect(FALSE, '비밀번호가 맞지 않습니다.');
    }

    redirect('read.php?bbs_id='.$bbs_id.'&id='.$id, '삭제되었습니다.');
?>
