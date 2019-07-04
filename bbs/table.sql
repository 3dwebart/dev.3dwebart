SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `bbs_config`;

CREATE TABLE `bbs_config` (
    `id`            INT             NOT NULL    AUTO_INCREMENT  COMMENT '일련번호',
    `title`         VARCHAR(50)     NOT NULL    COMMENT '게시판 이름',  
    `type`          CHAR(1)         NOT NULL    COMMENT '게시판 형태 (L,G)',
    `reg_date`      DATETIME        NOT NULL    COMMENT '작성일시',
    `edit_date`     DATETIME        NOT NULL    COMMENT '변경일시',
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET `UTF8`;

INSERT INTO bbs_config (title, type, reg_date, edit_date)
VALUES ('공지사항', 'L', now(), now());

INSERT INTO bbs_config (title, type, reg_date, edit_date)
VALUES ('갤러리', 'G', now(), now());

DROP TABLE IF EXISTS `bbs_documents`;

CREATE TABLE `bbs_documents` (
    `id`            INT             NOT NULL    AUTO_INCREMENT  COMMENT '일련번호',
    `bbs_id`		INT 			NOT NULL    COMMENT '게시판 번호',
    `member_id`     INT             NULL        COMMENT '회원 번호',
    `writer`        VARCHAR(50)     NOT NULL    COMMENT '작성자 이름',
    `pwd`           VARCHAR(150)    NOT NULL    COMMENT '비밀번호',
    `email`         VARCHAR(150)    NOT NULL    COMMENT '이메일',
    `subject`       VARCHAR(512)    NOT NULL    COMMENT '글 제목',
    `content`       TEXT            NOT NULL    COMMENT '글 내용',
    `hit`           INT             NOT NULL    COMMENT '조회수',
    `reg_date`      DATETIME        NOT NULL    COMMENT '작성일시',
    `edit_date`     DATETIME        NOT NULL    COMMENT '변경일시',
    PRIMARY KEY(`id`),
	FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET `UTF8`;



DROP TABLE IF EXISTS `bbs_comments`;

CREATE TABLE `bbs_comments` (
    `id`            INT             NOT NULL    AUTO_INCREMENT  COMMENT '일련번호',
    `document_id`   INT             NOT NULL    COMMENT '부모글 일련번호',
    `member_id`     INT             NULL        COMMENT '회원 번호',
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

SET foreign_key_checks = 1;