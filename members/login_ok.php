<?php
	include_once('../header.php');

	// 이미 로그인 중이라면 DB 접속 해제 후 이전 페이지로 이동
	if ($session_id) {
		redirect(FALSE, '이미 로그인 하셨습니다.');
	} else {
		// 이전 페이지의 파라미터 받기
		$back_url = post('back_url');
		$prev_url = post('now_url');
		$user_id  = post('user_id');
		$user_pw  = post('user_pw');
		
		// 필수 입력값 존재 여부 검사하기
		if (!$user_id) { redirect(FALSE, '아이디를 입력하세요.'); }
		if (!$user_pw) { redirect(FALSE, '비밀번호를 입력하세요.'); }
	
		$sql = "SELECT is_admin FROM admin WHERE adm_id = '%s'";
		$result = $db -> query($sql, array($user_id));
	
		if($db -> affected_rows() > 0) {
			$admin_chk = "true";
		} else {
			$admin_chk = "false";
		}
	
		// 로그인 처리를 위한 SQL
		if($admin_chk == "true") {
			$sql = "SELECT id, adm_level, is_admin, adm_id, adm_pw, adm_name, adm_nic, email, tel FROM admin WHERE adm_id = '%s' AND adm_pw = password('%s');";
		} else {
			$sql = "SELECT id, user_level, is_admin, user_id, user_pw, user_name, user_nic, email, tel FROM User WHERE user_id = '%s' AND user_pw = password('%s')";
		}
	
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
		if($admin_chk == "true") {
			$_SESSION['id']         = $row['id'];
			$_SESSION['user_level'] = $row['adm_level'];
			$_SESSION['is_admin']   = $row['is_admin'];
			$_SESSION['user_id']    = $row['adm_id'];
			$_SESSION['user_name']  = $row['adm_name'];
			$_SESSION['user_nic']   = $row['adm_nic'];
			$_SESSION['email']      = $row['email'];
			$_SESSION['tel']        = $row['tel'];
			
			if ($back_url) {
				redirect($back_url, '안녕하세요. '.$row['adm_name'].'님');
			} else if($prev_url) {
				redirect($prev_url, '안녕하세요. '.$row['adm_name'].'님');
			} else {
				redirect($site_home, '안녕하세요. '.$row['adm_name'].'님');
			}
			return;
		} else {
			$_SESSION['id']         = $row['id'];
			$_SESSION['user_level'] = $row['user_level'];
			$_SESSION['is_admin']   = $row['is_admin'];
			$_SESSION['user_id']    = $row['user_id'];
			$_SESSION['user_name']  = $row['user_name'];
			$_SESSION['user_nic']   = $row['user_nic'];
			$_SESSION['email']      = $row['email'];
			$_SESSION['tel']        = $row['tel'];

			$tmp_sql = "UPDATE members SET last_date = now() WHERE user_id = '%s' AND user_pw = password('%s')";
			$result = $db -> query($tmp_sql, array($user_id, $user_pw));
			
			if ($back_url) {
				redirect($back_url, '안녕하세요. '.$row['user_name'].'님');
			} else if($prev_url) {
				redirect($prev_url, '안녕하세요. '.$row['user_name'].'님');
			} else {
				redirect($site_home, '안녕하세요. '.$row['user_name'].'님');
			}
		}
	}
?>

