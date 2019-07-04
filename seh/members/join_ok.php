<?
    include_once('../header.php');

    // 이미 로그인 중이라면 DB 접속 해제 후 이전 페이지로 이동
    if ($session_id) {
        redirect(FALSE, '이미 로그인 하셨습니다.');
    }

    // 이전 페이지의 파라미터 받기
    $user_id = post('user_id');
    $user_pw = post('user_pw');
    $user_pw_re = post('user_pw_re');
    $user_name = post('user_name');
    $user_nic = post('user_nic');
    $email = post('email');
    $tel = post('tel');

    // 필수 입력값 존재 여부 검사하기
    if (!$user_id) { redirect(FALSE, '아이디를 입력하세요.'); }
    if (!$user_pw) { redirect(FALSE, '비밀번호를 입력하세요.'); }
    if (!$user_name) { redirect(FALSE, '이름을 입력하세요.'); }
    if (!$email) { redirect(FALSE, '이메일을 입력하세요.'); }
    if (!$tel) { redirect(FALSE, '연락처를 입력하세요.'); }

    // 비밀번호 확인
    if ($user_pw != $user_pw_re) {
        redirect(FALSE, '비밀번호 확인이 잘못되었습니다.');
    }

    // 중복가입 확인을 위한 SQL문
    $sql = "SELECT COUNT(id) FROM members WHERE user_id = '%s'";
    $result = $db -> query($sql, array($user_id));

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '회원가입에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    $row = $db -> fetch_row();

    if ($row[0] > 0) {
        redirect(FALSE, '이미 가입된 아이디 입니다.');
    }

    // 중복가입 확인을 위한 SQL문
    $sql = "SELECT COUNT(id) FROM admin WHERE adm_id = '%s'";
    $result = $db -> query($sql, array($user_id));

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '회원가입에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    $row = $db -> fetch_row();

    if ($row[0] > 0) {
        redirect(FALSE, '관리자 아이디는 사용할 수 없습니다.');
    }

    /**** 주소 입력 관련 수정 시작 ****/
    $sql = '';
    $data = array();

    // 회원 가입 처리를 위한 SQL 템플릿
    $sql = "INSERT INTO members (
                user_level, is_admin, user_id, user_pw, user_name, user_nic, email, tel, reg_date, edit_date
            ) VALUES (
                %d, '%s', '%s', password('%s'), '%s', '%s', '%s', '%s', now(), now()
            )";
    // 템플릿에 입력값 조합하기
    $data = array(5, 'false', $user_id, $user_pw, $user_name, $user_nic, $email, $tel);


    // SQL문 실행하기
    $result = $db -> query($sql, $data);

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '회원가입에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    redirect($site_home, '회원가입이 완료되었습니다. 로그인 해 주세요.');
?>
