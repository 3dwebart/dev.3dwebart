<?php
class DB {
	// DB접속정보 설정
	private $hostname   = "localhost";
	private $database   = "mayamenual";
	private $username   = "mayamenual";
	private $password   = "Kizero4349";
	private $portnumber = 3306;
	private $charset    = "utf8";
	private $con        = FALSE;
	private $show_error = TRUE;
	private $result     = FALSE;
	
	

	/** 생성자 **/
	public function __construct($is_connect = TRUE, $is_error = TRUE) {
		$this -> show_error = $is_error;

		if ($is_connect) {
			// 객체 생성시 DB접속을 자동으로 수행한다.
			$this -> open();
		}
	}

	/** 소멸자 **/
	public function __destruct() {
		// DB 접속 해제
		$this -> close();
	}

	/** 데이터베이스에 접속한다 **/
	function open() {
		// 데이터베이스 접속 처리
		$this -> con = mysqli_connect($this -> hostname, $this -> username, $this -> password, $this -> database, $this -> portnumber);

		// 접속 결과 점검하기
		if (mysqli_connect_errno()) {
			if ($this -> show_error) {
				printf("<h1>Failed to connect to MySQL : %s</h1>", mysqli_connect_error());
			}
		}

		// 데이터베이스와의 언어 설정을 UTF8로 지정
		mysqli_set_charset($this -> con, $this -> charset);

		//echo("<h1>데이터베이스 접속 성공</h1>");

		// 접속 결과를 리턴함
		return TRUE;
	}

	/** 데이터베이스에 접속을 해제한다 **/
	function close() {
		if($this -> is_connect()) {
			mysqli_close($this -> con);
			//echo("<h1>데이터베이스 접속 해제</h1>");
		}
	}

	/** DB접속여부를 리턴한다 **/
	function is_connect() {
		if (!$this -> con) {
			return FALSE;
		}
		return TRUE;
	}

	/** 데이터베이스 SQL 실행하기 **/
	function query($sql, $params = FALSE){
		$result = TRUE;

		// 기존 쿼리 결과가 있다면 메모리에서 삭제
		if ($this -> result) {
			@mysqli_free_result($this -> result);
			unset($this -> result);
		}

		// 파라미터가 배열로 전달된 경우 배열의 각 요소에 SQL 특수문자 처리
		if (is_array($params)) {
			for ($i = 0; $i < count($params); $i++) {
				$params[$i] = mysqli_real_escape_string($this -> con, $params[$i]);
			}

			$sql = vsprintf($sql, $params);
		}

		// 쿼리실행
		$this -> result = mysqli_query($this -> con, $sql);

		// 에러체크
		if (mysqli_errno($this -> con)) {
			$result = FALSE;
			if ($this -> show_error == TRUE) {
				$error_msg = '<div style="padding: 0 20px; border: 1px solid #555; background-color: #F5F5F5;">';
				$error_msg .= '<h3>'.mysqli_error($this -> con).'</h3>';
				$error_msg .= '<p>'.$sql.'</p>';
				$error_msg .= '</div>';
				echo($error_msg);
			}
		}

		return $result;
	}

	/** 최근에 저장된 id값을 리턴한다. **/
	function insert_id() {
		return mysqli_insert_id($this -> con);
	}

	/** 최근 SQL의 영향을 받은 행 수를 리턴한다 **/
	function affected_rows() {
		return mysqli_affected_rows($this -> con);
	}

	/** 쿼리 결과의 레코드를 반환한다. --> 라벨사용 **/
	function fetch_array() {
		return mysqli_fetch_array($this -> result);
	}
	/** 쿼리 결과의 레코드를 반환한다. --> 라벨사용(라벨만) **/
	function fetch_assoc() {
		return mysqli_fetch_assoc($this -> result);
	}

	/** 쿼리 결과의 레코드를 반환한다. --> 인덱스사용 **/
	function fetch_row() {
		return mysqli_fetch_row($this -> result);
	}

	/** 쿼리 결과의 레코드 수를 반환한다. **/
	function num_rows() {
		return mysqli_num_rows($this -> result);
	}

	/** 마지막으로 사용한 조회 결과의 스캔 위치를 맨 처음으로 되돌린다. **/
	function move_first() {
		mysqli_data_seek($this -> result, 0);
	}
	/*
	mysqli_fetch_assoc() -결과 행을 연상 배열로 취득한다
	mysqli_fetch_row() -결과 행을 수치 첨자 배열로 취득한다
	mysqli_fetch_object() -결과 세트의 현재 행을 객체로 갚았다
	mysqli_query() -데이터베이스에서 쿼리를 실행하는
	mysqli_data_seek() -결과 임의의 행에 포인터를 이동하는
	*/
}
?>