<? include_once('../header_ui.php'); ?>
<? include_once('bbs_config.php'); ?>
<?
    $id = post('id');
    $pwd = post('pwd');

    if (!$id) {
        redirect(FALSE, '글 번호가 없습니다.');
    }

    if (!$session_id) {
        // 비밀번호 확인
        $sql = "SELECT COUNT(id) FROM bbs_documents
                WHERE id=%d AND pwd=password('%s')";
        $result = $db -> query($sql, array($id, $pwd));
    } else {
        $sql = "SELECT COUNT(id) FROM bbs_documents
                WHERE id=%d AND member_id=%d";
        $result = $db -> query($sql, array($id, $session_id));
    }

    if (!$result) {
        redirect(FALSE, '비밀번호 확인에 실패했습니다.
                        관리자에게 문의 바랍니다.');
    }

    $row = $db -> fetch_row();
    if ($row[0] < 1) {
    	redirect(FALSE, '비밀번호가 맞지 않습니다.');
    }

    // 첨부파일의 정보를 로드한다.
    $sql = "SELECT full_path FROM bbs_files WHERE document_id = %d";
    $result = $db -> query($sql, array($id));

    while ($row = $db -> fetch_array()) {
    	// 파일을 삭제한다.
    	if (file_exists($row['full_path'])) {
    		unlink($row['full_path']);
    	}
    }

    // 첨부파일의 정보를 삭제한다.
	// 첨부파일 데이터가 삭제되더라도 이미 파일이 삭제되었으므로,
	// 추가적인 에러체크를 하지 않는다.
    $sql = "DELETE FROM bbs_files WHERE document_id=%d";
    $result = $db -> query($sql, array($id));

    // 관련 댓글 일괄 삭제
    $sql = "DELETE FROM bbs_comments WHERE document_id=%d";
    $result = $db -> query($sql, array($id));

    if (!$result) {
        redirect(FALSE, '댓글 삭제에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    // 삭제 SQL
    $sql = "DELETE FROM bbs_documents WHERE id=%d";
    $result = $db -> query($sql, array($id));

    if (!$result) {
        redirect(FALSE, '삭제에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    redirect('index.php?bbs_id='.$bbs_id, '삭제되었습니다.');
?>
