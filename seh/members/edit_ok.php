<?
    include_once('../header.php');

    // 이미 로그인 중이 아니라면 사용 불가
    if (!$session_id) {
        redirect(FALSE, '로그인 후에 이용 가능합니다.');
    }

    // 이전 페이지의 파라미터 받기
    $user_pw        = post('user_pw');
    $new_user_pw    = post('new_user_pw');
    $new_user_pw_re = post('new_user_pw_re');
    $user_name      = post('user_name');
    $user_nic      = post('user_name');
    $email          = post('email');
    $tel            = post('tel');

    // 필수 입력값 존재 여부 검사하기
    if (!$user_pw) { redirect(FALSE, '현재 비밀번호를 입력하세요.'); }
    if (!$user_name) { redirect(FALSE, '이름을 입력하세요.'); }
    if (!$email) { redirect(FALSE, '이메일을 입력하세요.'); }
    if (!$tel) { redirect(FALSE, '연락처를 입력하세요.'); }

    // 비밀번호 변경 여부
    $is_password = FALSE;

    // 새로운 비밀번호가 입력된 경우
    if ($new_user_pw || $new_user_pw_re) {
        $is_password = TRUE;

        // 비밀번호 확인하기
        if ($new_user_pw != $new_user_pw_re) {
            redirect(FALSE, '비밀번호 확인이 잘못되었습니다.');
        }
    }

    // 처리를 위한 SQL문을 저장할 변수
    $sql = '';
    $data = array();

    if ($is_password == TRUE) {
        // 새로운 비밀번호가 입력된 경우 SQL에서 비밀번호 변경처리 필요함
        $sql = "UPDATE members SET user_name = '%s', user_nic = '%s', user_pw = password('%s'), email = '%s', tel = '%s',
                    edit_date=now()
                    WHERE id = %d AND user_pw = password('%s')";

        $data = array($user_name, $user_nic, $new_user_pw, $email, $tel, $session_u_id, $user_pw);
    } else {
        // 비밀번호를 변경하지 않는 SQL구문 설정
        $sql = "UPDATE members SET user_name = '%s',  user_nic = '%s', email = '%s', tel = '%s',
                    edit_date = now()
                    WHERE id = %d AND user_pw = password('%s')";

        $data = array($user_name, $user_nic, $email, $tel, $session_u_id, $user_pw);
    }

    // SQL문 실행하기
    $result = $db -> query($sql, $data);

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '회원정보 수정에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    // 수정된 행이 없다면 WHERE조건이 맞지 않는 것이므로,
    // 비밀번호가 잘못 입력된 경우
    if ($db -> affected_rows() < 1) {
        redirect(FALSE, '비밀번호가 맞지 않습니다.');
    }

    // 정보가 수정되었으므로, 변경된 내용으로 세션 데이터 갱신
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_nic'] = $user_nic;
    $_SESSION['email'] = $email;
    $_SESSION['tel'] = $tel;

    redirect($site_home, '회원정보가 수정되었습니다.');
?>
