<?php
$inc = 'header.php';
include_once($inc);

error_reporting(E_ALL);
ini_set("display_errors", 1);

$sql = "SELECT id, bo_name FROM bbs_config";
$result = $db -> query($sql);

$id = array();
$bo_name = array();
$bo_table = array();
$bo_file = array();
$bo_comm = array();
for($i = 0; $row = $db -> fetch_assoc(); $i++) {
	$id[$i]         = $row['id'];
	$bo_name[$i]    = $row['bo_name'];
	$bo_table[$i]   = 'bo_table_'.$bo_name[$i];
	$bo_file[$i]    = $bo_table[$i].'_files';
	$bo_comm[$i]    = $bo_table[$i].'_comments';
}
for ($i=0; $i < count($id); $i++) { 
    $sql2 = "";
    $sql3 = "";
    $sql4 = "";
    /* BIGIN :: documents */
    $sql2 .= "DROP TABLE IF EXISTS `".$bo_table[$i]."`;";
    $sql2 .= "CREATE TABLE `".$bo_table[$i]."` (";
    $sql2 .= "`id` INT NOT NULL AUTO_INCREMENT COMMENT '일련번호',";
    $sql2 .= "`bbs_id` INT NOT NULL COMMENT '게시판 번호(get 인덱스)',";
    $sql2 .= "`bbs_name` VARCHAR(64) NOT NULL COMMENT '게시판 이름(get 라벨)',";
    $sql2 .= "`cate` VARCHAR(255) NOT NULL COMMENT '카테고리([|]로 구분)',";
    $sql2 .= "`notice_yn` CHAR(1) DEFAULT 'n' NOT NULL COMMENT '공지글 여부',";
    $sql2 .= "`notice_yn_text` VARCHAR(64) DEFAULT NULL NULL COMMENT '공지글 입력(ex : 이벤트)',";
    $sql2 .= "`member_id` INT NOT NULL COMMENT '회원 번호', ";
    $sql2 .= "`writer` VARCHAR(50) NOT NULL COMMENT '작성자 이름',";
    $sql2 .= "`pwd` VARCHAR(150) NOT NULL COMMENT '비밀번호',";
    $sql2 .= "`email` VARCHAR(150) NOT NULL COMMENT '이메일',";
    $sql2 .= "`movie_size` VARCHAR(10) DEFAULT NULL NULL COMMENT '유투브 동영상 화면비울(wide, vga)',";
    $sql2 .= "`movie_id` VARCHAR(30) DEFAULT NULL NULL COMMENT '유투브 동영상 ID',";
    $sql2 .= "`link` VARCHAR(50) DEFAULT NULL NULL COMMENT '링크(http://)',";
    $sql2 .= "`html` CHAR(1) DEFAULT 'n' NOT NULL COMMENT 'HTML 사용',";
    $sql2 .= "`subject` VARCHAR(512) NOT NULL COMMENT '글 제목',";
    $sql2 .= "`content` TEXT NOT NULL COMMENT '글 내용',";
    $sql2 .= "`img_align` CHAR(6) DEFAULT 'left' NOT NULL COMMENT '이미지 좌우정렬',";
    $sql2 .= "`img_pos` CHAR(1) DEFAULT 'b' NOT NULL COMMENT '본문 기준 이미지 위치',";
    $sql2 .= "`hit` INT NOT NULL COMMENT '조회수',";
    $sql2 .= "`reg_date` DATETIME NOT NULL COMMENT '작성일시',";
    $sql2 .= "`edit_date` DATETIME NOT NULL COMMENT '변경일시',";
    $sql2 .= "PRIMARY KEY(`id`),";
    $sql2 .= "FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)";
    $sql2 .= ") ENGINE=InnoDB DEFAULT CHARSET `UTF8`;";
    $res2 = $db -> query($sql2);
    /* END :: documents */
    /* BIGIN :: files */
    $sql3 .= "DROP TABLE IF EXISTS `".$bo_file[$i]."`;";
    $sql3 .= "CREATE TABLE `".$bo_file[$i]."` (";
    $sql3 .= "`id` INT NOT NULL AUTO_INCREMENT COMMENT '일련번호',";
    $sql3 .= "`document_id` INT NOT NULL COMMENT '부모글 일련번호',";
    $sql3 .= "`file_kind` INT NOT NULL COMMENT '저장된 파일 분류',";
    $sql3 .= "`dir` VARCHAR(256) NOT NULL COMMENT '저정된 폴더',";
    $sql3 .= "`file_name` VARCHAR(256) NOT NULL COMMENT '저장된 파일이름',";
    $sql3 .= "`file_type` VARCHAR(20) NOT NULL COMMENT '파일형식',";
    $sql3 .= "`file_size` INT NOT NULL COMMENT '파일크기',";
    $sql3 .= "`origin_name` VARCHAR(256) NOT NULL COMMENT '원본파일명',";
    $sql3 .= "`full_path` VARCHAR(256) NOT NULL COMMENT '전체경로',";
    $sql3 .= "`reg_date` DATETIME NOT NULL COMMENT '작성일시',";
    $sql3 .= "`edit_date` DATETIME NOT NULL COMMENT '변경일시',";
    $sql3 .= "PRIMARY KEY(`id`),";
    $sql3 .= "FOREIGN KEY (`document_id`) REFERENCES `".$bo_table[$i]."` (`id`)";
    $sql3 .= ") ENGINE=InnoDB DEFAULT CHARSET `UTF8`;";
    $res3 = $db -> query($sql3);
    /* END :: files */
    /* BIGIN :: comments */
    $sql4 .= "DROP TABLE IF EXISTS `".$bo_comm[$i]."`;";
    $sql4 .= "CREATE TABLE `".$bo_comm[$i]."` (";
    $sql4 .= "`id`            INT             NOT NULL    AUTO_INCREMENT  COMMENT '일련번호',";
    $sql4 .= "`document_id`   INT             NOT NULL    COMMENT '부모글 일련번호',";
    $sql4 .= "`member_id`     INT             NOT NULL    COMMENT '회원번호',";
    $sql4 .= "`writer`        VARCHAR(50)     NOT NULL    COMMENT '작성자 이름',";
    $sql4 .= "`pwd`           VARCHAR(150)    NOT NULL    COMMENT '비밀번호',";
    $sql4 .= "`email`         VARCHAR(150)    NOT NULL    COMMENT '이메일',";
    $sql4 .= "`content`       TEXT            NOT NULL    COMMENT '글 내용',";
    $sql4 .= "`reg_date`      DATETIME        NOT NULL    COMMENT '작성일시',";
    $sql4 .= "`edit_date`     DATETIME        NOT NULL    COMMENT '변경일시',";
    $sql4 .= "PRIMARY KEY(`id`),";
    $sql4 .= "FOREIGN KEY (`document_id`) REFERENCES `".$bo_table[$i]."` (`id`)";
    $sql4 .= ") ENGINE=InnoDB DEFAULT CHARSET `UTF8`;";
    $res4 = $db -> query($sql4);
    /* END :: comments */
}
?>
