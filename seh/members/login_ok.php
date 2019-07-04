<?
    include_once('../header.php');

    // 이미 로그인 중이라면 DB 접속 해제 후 이전 페이지로 이동
    if ($session_id) {
        redirect(FALSE, '이미 로그인 하셨습니다.');
    }

    // 이전 페이지의 파라미터 받기
    $user_id = post('user_id');
    $user_pw = post('user_pw');
    $now_url = post('now_url');

    // 필수 입력값 존재 여부 검사하기
    if (!$user_id) { redirect(FALSE, '아이디를 입력하세요.'); }
    if (!$user_pw) { redirect(FALSE, '비밀번호를 입력하세요.'); }

    $sql = "SELECT is_admin FROM admin WHERE adm_id = '%s'";
    $result = $db -> query($sql, array($user_id));

    $rows = $db -> fetch_array();

    $admin_check = $rows['is_admin'];

    if ($admin_check == 'true') {
        $sql = "SELECT id, adm_level, is_admin, adm_id, adm_nic, adm_name, email, tel
                     FROM admin WHERE adm_id = '%s' AND adm_pw = password('%s')";
        $result = $db -> query($sql, array($user_id, $user_pw));

        // 실행결과 점검하기
        if (!$result) {
            redirect(FALSE, '로그인에 실패했습니다. 관리자에게 문의 바랍니다.');
        }

        // 조회된 결과 수 검사
        if ($db -> num_rows() < 1) {
            redirect(FALSE, '아이디나 비밀번호가 맞지 않습니다.');
        }

        // 조회결과를 배열로 변환 --> 컬럼이름이 배열의 라벨이 된다.
        $row = $db -> fetch_array();

        // 회원가입에 성공하면 세션정보를 생성한다.
        $_SESSION['id'] = $row['id'];
        $_SESSION['adm_level'] = $row['adm_level'];
        $_SESSION['is_admin']   = $row['is_admin'];
        $_SESSION['user_id'] = $row['adm_id'];
        $_SESSION['user_name'] = $row['adm_name'];
        $_SESSION['user_nic'] = $row['adm_nic'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['tel'] = $row['tel'];

        if ($now_url) {
            redirect($now_url, '안녕하세요. '.$row['adm_name'].'님');
        } else {
            redirect($site_home, '안녕하세요. '.$row['adm_name'].'님');
        }

    } else {
        // 로그인 처리를 위한 SQL
        $sql = "SELECT id, user_level, is_admin, user_id, user_nic, user_name, email, tel
                     FROM members WHERE user_id = '%s' AND user_pw = password('%s')";
        $result = $db -> query($sql, array($user_id, $user_pw));

        // 실행결과 점검하기
        if (!$result) {
            redirect(FALSE, '로그인에 실패했습니다. 관리자에게 문의 바랍니다.');
        }

        // 조회된 결과 수 검사
        if ($db -> num_rows() < 1) {
            redirect(FALSE, '아이디나 비밀번호가 맞지 않습니다.');
        }

        // 조회결과를 배열로 변환 --> 컬럼이름이 배열의 라벨이 된다.
        $row = $db -> fetch_array();

        // 회원가입에 성공하면 세션정보를 생성한다.
        $_SESSION['id']         = $row['id'];
        $_SESSION['user_level'] = $row['user_level'];
        $_SESSION['is_admin']   = $row['is_admin'];
        $_SESSION['user_id']    = $row['user_id'];
        $_SESSION['user_name']  = $row['user_name'];
        $_SESSION['user_nic']   = $row['user_nic'];
        $_SESSION['email']      = $row['email'];
        $_SESSION['tel']        = $row['tel'];

        if ($now_url) {
            redirect($now_url, '안녕하세요. '.$row['user_name'].'님');
        } else {
            redirect($site_home, '안녕하세요. '.$row['user_name'].'님');
        }
    }

        
?>
