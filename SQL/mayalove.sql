SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP DATABASE IF EXISTS `mayalove`;
CREATE DATABASE `mayalove`;
USE `mayalove`;

-- Google login
DROP TABLE IF EXISTS `google_users`;
CREATE TABLE IF NOT EXISTS `google_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `google_id` varchar(60) NOT NULL,
  `google_name` varchar(60) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `google_link` varchar(150) NOT NULL,
  `google_picture_link` varchar(200) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id`          INT           NOT NULL AUTO_INCREMENT                COMMENT '일련번호',
  `language`    char(2)       NOT NULL                               COMMENT '언어',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET `UTF8` COMMENT='언어';

INSERT INTO language (language) VALUES ('en');
INSERT INTO language (language) VALUES ('ko');

CREATE TABLE IF NOT EXISTS `popup` (
  `po_id`          INT           NOT NULL AUTO_INCREMENT                COMMENT '일련번호',
  `member_id`      INT           NOT NULL                               COMMENT '회원 번호',
  `po_subject`     VARCHAR(255)  NOT NULL                               COMMENT '팝업 제목',
  `po_start`       DATETIME      NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '팝업 시작일시',
  `po_end`         DATETIME      NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '팝업 종료일시',
  `po_file`        VARCHAR(255)      NULL                               COMMENT '팝업 이미지 파일 링크',
  `po_top`         INT           NOT NULL DEFAULT '0'                   COMMENT '팝업 상단 포지션',
  `po_left`        INT           NOT NULL DEFAULT '0'                   COMMENT '팝업 좌측 포지션',
  `po_link`        VARCHAR(255)      NULL                               COMMENT '팝업 링크',
  `po_link_target` VARCHAR(255)      NULL                               COMMENT '팝업 링크 타겟',
  `po_map_use`     TINYINT(4)        NULL DEFAULT '0'                   COMMENT '팝업 이미지맵 사용 여부',
  `po_map_name`    VARCHAR(255)      NULL                               COMMENT '팝업 이미지맵 이름',
  `po_map_code`    TEXT              NULL                               COMMENT '팝업 이미지맵 코드',
  `reg_date`       DATETIME      NOT NULL                               COMMENT '가입일시',
  `edit_date`      DATETIME      NOT NULL                               COMMENT '변경일시',
  PRIMARY KEY (`po_id`)
) ENGINE = InnoDB DEFAULT CHARSET `UTF8` COMMENT='팝업관리';

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
    `id`          INT             NOT NULL     AUTO_INCREMENT    COMMENT '일련번호',
    `user_level`  INT             NOT NULL     COMMENT '회원 권한',
    `is_admin`    VARCHAR(10)     NOT NULL     COMMENT '관리자 체크',
    `user_id`     VARCHAR(20)     NOT NULL     COMMENT '아이디',
    `user_pw`     VARCHAR(150)    NOT NULL     COMMENT '비밀번호',
    `user_name`   VARCHAR(10)     NOT NULL     COMMENT '이름',
    `user_nic`    VARCHAR(20)     NOT NULL     COMMENT '닉네임',
    `email`       VARCHAR(150)    NOT NULL     COMMENT '이메일',
    `tel`         VARCHAR(20)     NOT NULL     COMMENT '연락처',
    `reg_date`    DATETIME        NOT NULL     COMMENT '가입일시',
    `edit_date`   DATETIME        NOT NULL     COMMENT '변경일시',
    PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET `UTF8` COMMENT='회원정보';

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
	`id`          INT             NOT NULL    AUTO_INCREMENT    COMMENT '일련번호',
    `adm_level`   INT             NOT NULL     COMMENT '관리자 권한',
    `is_admin`    VARCHAR(10)     NOT NULL     COMMENT '관리자 체크',
    `adm_id`      VARCHAR(20)     NOT NULL     COMMENT '아이디',
	`adm_pw`      VARCHAR(150)    NOT NULL     COMMENT '비밀번호',
	`adm_name`    VARCHAR(10)     NOT NULL     COMMENT '이름',
	`adm_nic`     VARCHAR(20)     NOT NULL     COMMENT '닉네임',
	`email`       VARCHAR(150)    NOT NULL     COMMENT '이메일',
	`tel`         VARCHAR(20)     NOT NULL     COMMENT '연락처',
	`reg_date`    DATETIME        NOT NULL     COMMENT '가입일시',
	`edit_date`   DATETIME        NOT NULL     COMMENT '변경일시',
	PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET `UTF8`;

INSERT INTO admin (adm_power, is_admin, adm_id, adm_pw, adm_name, adm_nic, email, tel, reg_date, edit_date)
VALUES ( 1, 'true', 'admin', password('1234'), '최고관리자', '최고관리자', '3dwebart@naver.com', '010-6254-6946', now(), now());

DROP TABLE IF EXISTS `bbs_group`;

CREATE TABLE `bbs_group` (
    `id`            INT             NOT NULL    AUTO_INCREMENT  COMMENT '일련번호',
    `bo_group_id` VARCHAR(50)       NOT NULL    COMMENT '게시판 그룹 이름 (영문)',
    `bo_group_name` VARCHAR(50)     NOT NULL    COMMENT '게시판 그룹 이름 (영문/한글)',
    `reg_date`      DATETIME        NOT NULL    COMMENT '작성일시',
    `edit_date`     DATETIME        NOT NULL    COMMENT '변경일시',
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET `UTF8`;

DROP TABLE IF EXISTS `bbs_config`;

CREATE TABLE `bbs_config` (
    `id`              INT                                 NOT NULL AUTO_INCREMENT  COMMENT '일련번호',
    `list_count`      INT            DEFAULT 10           NOT NULL COMMENT '목록(리스트)에서 보여질 수',
    `bo_group_id`     INT                                 NOT NULL COMMENT '그룹번호',
    `bo_group_name`   VARCHAR(50)                         NOT NULL COMMENT '그룹이름(리스트에서 게시판 그룹 정렬값)',
    `bo_name`         VARCHAR(50)                         NOT NULL COMMENT '게시판 이름 (영문)',
    `cate`            varchar(255)   DEFAULT ''               NULL COMMENT '카테고리',
    `title`           VARCHAR(50)                         NOT NULL COMMENT '게시판 이름 (영문/한글)',
    `type`            VARCHAR(20)    DEFAULT 'grneral'    NOT NULL COMMENT '게시판 형태 (grneral,gallery,movie)',
    `skin`            varchar(32)    DEFAULT 'basic'      NOT NULL COMMENT '스킨 폴더 설정',
    `l_level`         INT                                 NOT NULL COMMENT '목록 보기 권한 (list)',
    `r_level`         INT                                 NOT NULL COMMENT '본문 보기 권한 (read)',
    `w_level`         INT                                 NOT NULL COMMENT '글쓰기 권한 (write)',
    `d_level`         INT                                 NOT NULL COMMENT '다운로드 권한(높으면 파일이 안보임)',
    `html_level`      INT                                 NOT NULL COMMENT 'HTML 사용 권한',
    `copy_move_level` INT(11)        DEFAULT '1'          NOT NULL COMMENT '게시물 복사/이동 권한',
    `sort`            varchar(32)    DEFAULT 'reg_date'   NOT NULL  COMMENT '정렬기준',
    `order_by`        varchar(4)     DEFAULT 'DESC'       NOT NULL COMMENT '정렬순서',
    `reg_date`        DATETIME                            NOT NULL COMMENT '작성일시',
    `edit_date`       DATETIME                            NOT NULL COMMENT '변경일시',
    PRIMARY KEY(`id`),
    FOREIGN KEY (`bo_group_id`) REFERENCES `bbs_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET `UTF8`;

DROP TABLE IF EXISTS `deco_files`;

CREATE TABLE `deco_files` (
    `id`            INT             NOT NULL    AUTO_INCREMENT  COMMENT '일련번호',
    `document_id`   INT             NOT NULL    COMMENT '부모글 일련번호',
    `file_area`     VARCHAR(20)     NOT NULL    COMMENT '파일 위치',
    `dir`           VARCHAR(256)    NOT NULL    COMMENT '저정된 폴더',
    `file_name`     VARCHAR(256)    NOT NULL    COMMENT '저장된 파일이름',
    `file_type`     VARCHAR(20)     NOT NULL    COMMENT '파일형식',
    `file_size`     INT             NOT NULL    COMMENT '파일크기',
    `origin_name`   VARCHAR(256)    NOT NULL    COMMENT '원본파일명',
    `full_path`     VARCHAR(256)    NOT NULL    COMMENT '전체경로',
    `reg_date`      DATETIME        NOT NULL    COMMENT '작성일시',
    `edit_date`     DATETIME        NOT NULL    COMMENT '변경일시',
    PRIMARY KEY(`id`),
    FOREIGN KEY (`document_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET `UTF8`;

DROP TABLE IF EXISTS `bbs_documents`;

CREATE TABLE `bbs_documents` (
    `id`               INT                             NOT NULL AUTO_INCREMENT  COMMENT '일련번호',
    `bbs_id`           INT                             NOT NULL COMMENT '게시판 번호(get 인덱스)',
    `bbs_name`         VARCHAR(64)                     NOT NULL COMMENT '게시판 이름(get 라벨)',
    `cate`             VARCHAR(255)                    NOT NULL COMMENT '카테고리("|"로 구분)',
    `notice_yn`        CHAR(1)         DEFAULT 'n'     NOT NULL COMMENT '공지글 여부',
    `notice_yn_text`   VARCHAR(64)     DEFAULT NULL        NULL COMMENT '공지글 입력(ex : 이벤트)',
    `member_id`        INT                             NOT NULL COMMENT '회원 번호', 
    `writer`           VARCHAR(50)                     NOT NULL COMMENT '작성자 이름',
    `pwd`              VARCHAR(150)                    NOT NULL COMMENT '비밀번호',
    `email`            VARCHAR(150)                    NOT NULL COMMENT '이메일',
    `movie_size`       VARCHAR(10)     DEFAULT NULL        NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
    `movie_id`         VARCHAR(30)     DEFAULT NULL        NULL COMMENT '유투브 동영상 ID',
    `link`             VARCHAR(50)     DEFAULT NULL        NULL COMMENT '링크(http://)',
    `html`             CHAR(1)         DEFAULT 'n'     NOT NULL COMMENT 'HTML 사용',
    `subject`          VARCHAR(512)                    NOT NULL COMMENT '글 제목',
    `explanation`      VARCHAR(512)    DEFAULT ''      NOT NULL COMMENT '글 내용중 설명글',
    `content`          TEXT                            NOT NULL COMMENT '글 내용',
    `img_align`        CHAR(6)         DEFAULT 'left'  NOT NULL COMMENT '이미지 좌우정렬',
    `img_pos`          CHAR(1)         DEFAULT 'b'     NOT NULL COMMENT '본문 기준 이미지 위치',
    `hit`              INT                             NOT NULL COMMENT '조회수',
    `reg_date`         DATETIME                        NOT NULL COMMENT '작성일시',
    `edit_date`        DATETIME                        NOT NULL COMMENT '변경일시',
    PRIMARY KEY(`id`),
	FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET `UTF8`;

DROP TABLE IF EXISTS `bbs_comments`;

CREATE TABLE `bbs_comments` (
    `id`            INT             NOT NULL    AUTO_INCREMENT  COMMENT '일련번호',
    `document_id`   INT             NOT NULL    COMMENT '부모글 일련번호',
    `member_id`     INT             NOT NULL    COMMENT '회원번호',
    `writer`        VARCHAR(50)     NOT NULL    COMMENT '작성자 이름',
    `pwd`           VARCHAR(150)    NOT NULL    COMMENT '비밀번호',
    `email`         VARCHAR(150)    NOT NULL    COMMENT '이메일',
    `content`       TEXT            NOT NULL    COMMENT '글 내용',
    `reg_date`      DATETIME        NOT NULL    COMMENT '작성일시',
    `edit_date`     DATETIME        NOT NULL    COMMENT '변경일시',
    PRIMARY KEY(`id`),
	FOREIGN KEY (`document_id`) REFERENCES `bbs_documents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET `UTF8`;

DROP TABLE IF EXISTS `bbs_files`;

CREATE TABLE `bbs_files` (
    `id`            INT             NOT NULL    AUTO_INCREMENT  COMMENT '일련번호',
    `document_id`   INT             NOT NULL    COMMENT '부모글 일련번호',
    `file_kind`     VARCHAR(128)    NOT NULL    COMMENT '저장된 파일 분류',
    `dir`   		VARCHAR(256)    NOT NULL    COMMENT '저정된 폴더',
    `file_name`   	VARCHAR(256)    NOT NULL    COMMENT '저장된 파일이름',
    `file_type`   	VARCHAR(20)     NOT NULL    COMMENT '파일형식',
    `file_size`   	INT             NOT NULL    COMMENT '파일크기',
    `origin_name`   VARCHAR(256)    NOT NULL    COMMENT '원본파일명',
    `full_path`   	VARCHAR(256)    NOT NULL    COMMENT '전체경로',
    `reg_date`      DATETIME        NOT NULL    COMMENT '작성일시',
    `edit_date`     DATETIME        NOT NULL    COMMENT '변경일시',
    PRIMARY KEY(`id`),
	FOREIGN KEY (`document_id`) REFERENCES `bbs_documents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET `UTF8`;

SET FOREIGN_KEY_CHECKS = 1;
