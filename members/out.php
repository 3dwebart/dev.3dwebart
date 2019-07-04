<?
    include_once('../header.php');

    // 로그인중이 아니라면 탈퇴 불가
    if (!$session_id) {
        redirect(FALSE, '로그인한 사용자만 접근 가능합니다.');
    }

    // 탈퇴를 위한 데이터 삭제 SQL
    $sql = "DELETE FROM members WHERE id=%d";
    $result = $db -> query($sql, array($session_u_id));

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '회원탈퇴에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    // 로그아웃 처리를 위하여 세션 파괴
    session_destroy();

    redirect($site_home, '탈퇴되었습니다.');
?>
