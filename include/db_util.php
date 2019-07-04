<?php header("Content-Type: text/html; charset=utf-8"); ?>
<?php
	/** 데이터베이스에 접속한다 **/
	if (!function_exists('db_open')) {
		function db_open() {
			// DB접속정보 설정
			$db_hostname   = "localhost";
			$db_database   = "shingwang";
			$db_username   = "root";
			$db_password   = "root";
			$db_portnumber = 3306;
			$db_charset    = "utf8";

			// 데이터베이스 접속처리
			// 호스트 이름, DB아이디, DB비밀번호, DB명, 포트번호
			$con = mysqli_connect($db_hostname, $db_username, $db_password, $db_database, $db_portnumber);

			// 접속결과 점검하기
			if (mysqli_connect_errno()) {
				printf("<h1>Failed to connect to MySQL: %s</h1>", mysqli_connect_error());
				return FALSE;
			}

			// 데이터베이스와의 언어 설정을 UTF8로 지정
			mysqli_set_charset($con, $db_charset);

			// 접속결과를 리턴함
			return $con;
		}
	}

	/** 데이터베이스에 접속을 해제한다. **/
	if (!function_exists('db_close')) {
		function db_close($con) {
			mysqli_close($con);
		}
	}
?>