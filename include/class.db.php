<?php
class DB {
	// DB접속정보 설정
	private $hostname   = "localhost";
	private $database   = "3dwebart";
	private $username   = "root";
	private $password   = "root";
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

	function create_table($table) {
		//$sql = "DROP TABLE IF EXISTS `".$table."`";
		/*
		$res = $db -> query($sql, array($table));
		*/
		$table         = 'bo_table_'.$table;
		$file_table    = $table.'_files';
		$comment_table = $table.'_comments';

		$del_sql3 = "DROP TABLE `$comment_table`";
		mysqli_query($this -> con, $del_sql3);

		$del_sql2 = "DROP TABLE `$file_table`";
		mysqli_query($this -> con, $del_sql2);

		$del_sql1 = "DROP TABLE `$table`";
		mysqli_query($this -> con, $del_sql1);

		$sql1 = "CREATE TABLE `$table` (
			`id` INT NOT NULL AUTO_INCREMENT  COMMENT '일련번호',
			`bbs_id` INT NOT NULL COMMENT '게시판 번호(get 인덱스)',
			`bbs_name` VARCHAR(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
			`cate` VARCHAR(255) NOT NULL COMMENT '카테고리(| 로 구분)',
			`notice_yn` CHAR(1) DEFAULT 'n' NOT NULL COMMENT '공지글 여부',
			`notice_yn_text` VARCHAR(64) DEFAULT NULL NULL COMMENT '공지글 입력(ex : 이벤트)',
			`member_id` INT NOT NULL COMMENT '회원 번호',
			`writer` VARCHAR(50) NOT NULL COMMENT '작성자 이름',
			`pwd`VARCHAR(150)NOT NULL COMMENT '비밀번호',
			`email` VARCHAR(150) NOT NULL COMMENT '이메일',
			`movie_size` VARCHAR(10) DEFAULT NULL NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
			`movie_id` VARCHAR(30) DEFAULT NULL NULL COMMENT '유투브 동영상 ID',
			`link` VARCHAR(50) DEFAULT NULL NULL COMMENT '링크(http://)',
			`html` CHAR(1) DEFAULT 'n' NOT NULL COMMENT 'HTML 사용',
			`subject` VARCHAR(512) NOT NULL COMMENT '글 제목',
			`content` TEXT NOT NULL COMMENT '글 내용',
			`img_align` CHAR(6) DEFAULT 'left'  NOT NULL COMMENT '이미지 좌우정렬',
			`img_pos` CHAR(1) DEFAULT 'b' NOT NULL COMMENT '본문 기준 이미지 위치',
			`hit` INT NOT NULL COMMENT '조회수',
			`reg_date` DATETIME NOT NULL COMMENT '작성일시',
			`edit_date` DATETIME NOT NULL COMMENT '변경일시',
			PRIMARY KEY(`id`),
			FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET `UTF8`";

		mysqli_query($this -> con, $sql1);
		
		$sql2 = "CREATE TABLE `$file_table` (
		    `id` INT NOT NULL AUTO_INCREMENT  COMMENT '일련번호',
		    `document_id` INT NOT NULL COMMENT '부모글 일련번호',
		    `file_kind` INT NOT NULL COMMENT '저장된 파일 분류',
		    `dir` VARCHAR(256) NOT NULL COMMENT '저정된 폴더',
		    `file_name` VARCHAR(256) NOT NULL COMMENT '저장된 파일이름',
		    `file_type` VARCHAR(20) NOT NULL COMMENT '파일형식',
		    `file_size` INT NOT NULL COMMENT '파일크기',
		    `origin_name` VARCHAR(256) NOT NULL COMMENT '원본파일명',
		    `full_path` VARCHAR(256) NOT NULL COMMENT '전체경로',
		    `reg_date` DATETIME NOT NULL COMMENT '작성일시',
		    `edit_date` DATETIME NOT NULL COMMENT '변경일시',
		    PRIMARY KEY(`id`),
			FOREIGN KEY (`document_id`) REFERENCES `$table` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET `UTF8`";
		mysqli_query($this -> con, $sql2);
		
		$sql3 = "CREATE TABLE `$comment_table` (
		    `id` INT NOT NULL AUTO_INCREMENT COMMENT '일련번호',
		    `document_id` INT NOT NULL COMMENT '부모글 일련번호',
		    `member_id` INT NOT NULL COMMENT '회원번호',
		    `writer` VARCHAR(50) NOT NULL COMMENT '작성자 이름',
		    `pwd` VARCHAR(150) NOT NULL COMMENT '비밀번호',
		    `email` VARCHAR(150) NOT NULL COMMENT '이메일',
		    `content` TEXT NOT NULL COMMENT '글 내용',
		    `reg_date` DATETIME NOT NULL COMMENT '작성일시',
		    `edit_date` DATETIME NOT NULL COMMENT '변경일시',
		    PRIMARY KEY(`id`),
			FOREIGN KEY (`document_id`) REFERENCES `$table` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET `UTF8`";
		return mysqli_query($this -> con, $sql3);
	}
	function drop_table($table) {
		$table         = 'bo_table_'.$table;
		$file_table    = $table.'_files';
		$comment_table = $table.'_comments';

		$del_sql3 = "DROP TABLE `$comment_table`";
		mysqli_query($this -> con, $del_sql3);

		$del_sql2 = "DROP TABLE `$file_table`";
		mysqli_query($this -> con, $del_sql2);

		$del_sql1 = "DROP TABLE `$table`";
		return mysqli_query($this -> con, $del_sql1);
	}
	function rename_table($table, $new_table) {
		$table                 = 'bo_table_'.$table;
		$file_table            = $table.'_files';
		$comment_table         = $table.'_comments';
		$new_table             = 'bo_table_'.$new_table;
		$new_file_table        = $new_table.'_files';
		$new_file_table_fk     = $new_file_table.'_ibfk_1';
		$new_comment_table     = $new_table.'_comments';
		$new_comment_table_fk  = $new_comment_table.'_ibfk_1';

		// 게시판 테이블 복사
		$copy_table = "CREATE TABLE `$new_table` LIKE `$table`";
		mysqli_query($this -> con, $copy_table);

		// 게시판 데이터 복사
		$copy_data = "INSERT INTO `$new_table` SELECT * FROM `$table`";
		mysqli_query($this -> con, $copy_data);

		// 게시판 파일 테이블 복사
		$copy_table = "CREATE TABLE `$new_file_table` LIKE `$file_table`";
		mysqli_query($this -> con, $copy_table);

		// 게시판 파일 데이터 복사
		$copy_data = "INSERT INTO `$new_file_table` SELECT * FROM `$file_table`";
		mysqli_query($this -> con, $copy_data);

		// 게시판 파일 테이블 외래키 삭제
		$drop_key = "ALTER TABLE `$new_file_table` DROP FOREIGN KEY ('$new_file_table_fk')";
		mysqli_query($this -> con, $drop_key);

		// 게시판 파일 테이블 외래키 생성
		$add_key = "ALTER TABLE `$new_file_table` ADD FOREIGN KEY (document_id) REFERENCES `$new_table` (id)";
		mysqli_query($this -> con, $add_key);

		// 게시판 코멘트 테이블 복사
		$copy_table = "CREATE TABLE `$new_comment_table` LIKE `$comment_table`";
		mysqli_query($this -> con, $copy_table);

		// 게시판 코멘트 데이터 복사
		$copy_data = "INSERT INTO `$new_comment_table` SELECT * FROM `$comment_table`";
		mysqli_query($this -> con, $copy_data);

		// 게시판 코멘트 테이블 외래키 삭제
		$drop_key = "ALTER TABLE `$new_comment_table` DROP FOREIGN KEY ('$new_comment_table_fk')";
		mysqli_query($this -> con, $drop_key);

		// 게시판 코멘트 테이블 외래키 생성
		$add_key = "ALTER TABLE `$new_comment_table` ADD FOREIGN KEY (document_id) REFERENCES `$new_table` (id)";
		mysqli_query($this -> con, $add_key);

		// 복사 코멘트 원본 테이블 삭제
		$del_sql3 = "DROP TABLE `$comment_table`";
		mysqli_query($this -> con, $del_sql3);

		// 복사 파일 원본 테이블 삭제
		$del_sql2 = "DROP TABLE `$file_table`";
		mysqli_query($this -> con, $del_sql2);

		// 복사 게시판 원본 테이블 삭제
		$del_sql1 = "DROP TABLE `$table`";
		return mysqli_query($this -> con, $del_sql1);
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