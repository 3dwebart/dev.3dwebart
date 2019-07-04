<?
	include_once('../header.php');

    // 이미 로그인 중이라면 DB 접속 해제 후 이전 페이지로 이동
    if ($session_id) {
        redirect(FALSE, '이미 로그인 하셨습니다.');
    }

    // 이전 페이지의 파라미터 받기
    $email = post('email');

    // 필수 입력값 존재 여부 검사하기
    if (!$email) { redirect(FALSE, '이메일을 입력하세요.'); }

    /******** DB에서 가입된 이메일인지 검사 *********/
    $sql = "SELECT COUNT(id) FROM members WHERE email='%s'";
    $result = $db -> query($sql, array($email));

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '이메일 확인에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    $row = $db -> fetch_row();

    if ($row[0] < 1) {
        db_close($con);
        redirect(FALSE, '가입되어 있지 않은 이메일 입니다.');
    }


    /******** DB에서 가입된 이메일인지 검사 *********/
    // 임시 비밀번호
    $new_password = get_random_string(8);

    $sql_tmpl = "UPDATE members SET
    				user_pw=password('%s'), edit_date=now()
    			 WHERE email='%s'";
    // SQL문 실행하기
    $result = $db -> query($sql, array($new_password, $email));

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '비밀번호 재설정에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    // 수정된 행이 없다면 WHERE조건이 맞지 않는 것이므로,
    // 비밀번호가 잘못 입력된 경우
    if ($db -> affected_rows() < 1) {
        redirect(FALSE, '이메일이 맞지 않습니다.');
    }

    /******* 발급된 비밀번호를 이메일로 전송하기 *********/
    $smtp="smtp.gmail.com";
    require_once($root_dir."/phpmailer/class.phpmailer.php");
    $mail=new PHPMailer(true);
    $mail->IsSMTP();
    try{
        $mail->Host=$smtp;
        $mail->SMTPAuth=true;
        $mail->Port=465;
        $mail->SMTPSecure="ssl";
        $mail->Username="totory3217@gmail.com";
        $mail->Password="duddk7856";
        $mail->SetFrom("totory3217@gmail.com");
        $mail->AddAddress($email);
        $mail->Subject="비밀번호 재설정 메일 입니다.";
        $mail->MsgHTML($new_password);
        $mail->Send();
    } catch (phpmailerException $e){
        echo $e->errorMessage();
    } catch (Exception $e){
        echo $e->getMessage();
    }

    redirect($site_home, '비밀번호를 이메일로 전달해 드렸습니다.');
?>
