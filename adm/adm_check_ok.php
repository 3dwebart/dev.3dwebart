<?php
	include_once('../header.php');

	// 이전 페이지의 파라미터 받기
	$adm_id   = post('adm_id');
	$adm_pw   = post('adm_pw');
	$this_url = post('this_url');

	
	//echo('Admin ID = '.$adm_id);
	//exit();

	// 필수 입력값 존재 여부 검사하기
	if (!$adm_id) { redirect(FALSE, '아이디를 입력하세요'); }
	if (!$adm_pw) { redirect(FALSE, '비밀번호를 입력하세요'); }

	// 로그인 처리를 위한 SQL 템플릿
	$sql = "SELECT id, adm_level, is_admin, adm_id, adm_name, adm_nic, email, tel FROM admin WHERE adm_id = '%s' AND adm_pw = password('%s')";
	$result = $db -> query($sql, array($adm_id, $adm_pw));
	
	
	// 실행결과 점검하기
	if (!$result) {
		redirect(FALSE, '로그인에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}
	/*
	if (mysqli_errno($con)) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		//db_close($con);
		redirect(FALSE, '로그인에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}
	*/

	// 조회된 결과 수 검사
	if ($db -> num_rows() < 1) {
		//db_close($con);
		redirect(FALSE, '아이디나 비밀번호가 맞지 않습니다.');
	}

	// 조회결과를 배열로 변환 --> 컬럼 이름이 배열의 라벨이 된다.
	$row = $db -> fetch_array($result);

	// 회원가입에 성공하면 세션정보를 생성한다.

	$_SESSION['id']        = $row['id'];
	$_SESSION['adm_level'] = $row['adm_level'];
	$_SESSION['is_admin']  = $row['is_admin'];
	$_SESSION['adm_id']    = $row['adm_id'];
	$_SESSION['adm_name']  = $row['adm_name'];
	$_SESSION['adm_nic']   = $row['adm_nic'];
	$_SESSION['email']     = $row['email'];
	$_SESSION['tel']       = $row['tel'];

	/*
	if ($this_url) {
		redirect($this_url, '안녕하세요'.$row['adm_name'].'님');
	} else if ($now_url) {
		redirect($now_url, '안녕하세요'.$row['adm_name'].'님');
	} else {
		*/
		redirect($admin_home.'/index.php', '안녕하세요'.$row['adm_name'].'님');
	/*
	}
	*/
?>
