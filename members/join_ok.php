<?php
    include_once('../header.php');

    // 이미 로그인 중이라면 DB 접속 해제 후 이전 페이지로 이동
    if ($session_id) {
        redirect(FALSE, '이미 로그인 하셨습니다.');
    }

    // 이전 페이지의 파라미터 받기
	$CurPoint = post('CurPoint', 0);
	$TrLevel = post('TrLevel', 5);
	$Gender = post('Gender');
	$Birthday = post('Birthday');
	$Country = post('Country');
	$Email = post('Email');
	$Password = post('Password');
	$Password_re = post('Password_re');
	$Fullname = post('Fullname');
	$Profile = post('Profile');
	$City = post('City');
	$UUID = post('UUID', 'PC');
	$Tel = post('Tel');
	$lang = post('lang');
	
	if ( empty($lang)) {
		$lang_cookie = get_cookie('MyCookie');
		if ( !empty($lang_cookie)) {
			$lang = $lang_cookie;
		}
	}
	
	if ($lang == "ko") // 한국어
	{
		include_once($site_dir.'/language/kr.php');
		setcookie('MyCookie', urldecode($lang), time() + (60 * 60 * 24), '/');
	}
	
	else if ($lang == "en") // 영어
	{
		include_once($site_dir.'/language/en.php');
		setcookie('MyCookie', urldecode($lang), time() + (60 * 60 * 24), '/');
	}
	else if ($lang == "cn") // 중국어
	{
		include_once($site_dir.'/language/cn.php');
		setcookie('MyCookie', urldecode($lang), time() + (60 * 60 * 24), '/');
	}
	else if ($lang == "jp") // 일본어
	{
		include_once($site_dir.'/language/jp.php');
		setcookie('MyCookie', urldecode($lang), time() + (60 * 60 * 24), '/');
	}
	else // 일치하는 언어 없으면 영어로 표시
	{
		if ($lang_cookie == 'ko') {
			include_once($site_dir.'/language/kr.php');
			$lang_cookie = $_COOKIE['MyCookie'];
		} else if ($lang == 'cn') {
			include_once($site_dir.'/language/cn.php');
			$lang_cookie = $_COOKIE['MyCookie'];
		} else if ($lang == 'jp') {
			include_once($site_dir.'/language/jp.php');
			$lang_cookie = $_COOKIE['MyCookie'];
		} else {
			include_once($site_dir.'/language/en.php');
			//echo('nothing!!');
			$lang = $_COOKIE['MyCookie'];
		}
	}
	
	//$birth = preg_replace(".", "-", $Birthday);
	//echo($Birthday);
	//exit();
	
	//echo('<h1>Lang = '.$lang.'</h1>');
	//exit();

    // 필수 입력값 존재 여부 검사하기
	if (!$Email)    { redirect(FALSE, $strings['AleryEnterYourID']); }
    if (!$Password) { redirect(FALSE, $strings['AlertPleasePutYourPassword']); }
    if (!$Fullname) { redirect(FALSE, $strings['AlertPleasPutYourName']); }
    

    // 비밀번호 확인
    if ($Password != $Password_re) {
        redirect(FALSE, '비밀번호 확인이 잘못되었습니다.');
    }

    // 중복가입 확인을 위한 SQL문
    $sql = "SELECT COUNT(_ID) FROM User WHERE Email = '%s'";
    $result = $db -> query($sql, array($Email));

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '회원가입에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    $row = $db -> fetch_row();

    if ($row[0] > 0) {
        redirect(FALSE, '이미 가입된 아이디 입니다.');
    }

    /**** 주소 입력 관련 수정 시작 ****/
    $sql = '';
    $data = array();
	/*
	if (!$Profile && !$Tel) {
		
	} else if ($Profile && !$Tel) {
		
	} else if (!$Profile && $Tel) {
		
	} else {
		
	}
	*/
    // 회원 가입 처리를 위한 SQL 템플릿
    $sql = "INSERT INTO User (
                CurPoint, TrLevel, Gender, Jointime, Birthday, Country, Email, Password, Fullname, City, Profile, Tel
            ) VALUES (
                %d, %d, %d, now(), '%s', '%s', '%s', password(md5('%s')), '%s', '%s', '%s', '%s'
            )";
    // 템플릿에 입력값 조합하기
    $data = array('', '', $Gender, $Birthday, $Country, $Email, $Password, $Fullname, $City, $Profile, $Tel);


    // SQL문 실행하기
    $result = $db -> query($sql, $data);

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '회원가입에 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    redirect($site_home, '회원가입이 완료되었습니다. 로그인 해 주세요.');
?>
