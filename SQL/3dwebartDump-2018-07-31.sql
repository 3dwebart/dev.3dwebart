-- MySQL dump 10.13  Distrib 5.6.38, for osx10.9 (x86_64)
--
-- Host: localhost    Database: 3dwebart
-- ------------------------------------------------------
-- Server version	5.6.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `adm_level` int(11) NOT NULL COMMENT '관리자 권한',
  `is_admin` varchar(10) NOT NULL COMMENT '관리자 체크',
  `adm_id` varchar(20) NOT NULL COMMENT '아이디',
  `adm_pw` varchar(150) NOT NULL COMMENT '비밀번호',
  `adm_name` varchar(10) NOT NULL COMMENT '이름',
  `adm_nic` varchar(20) NOT NULL COMMENT '닉네임',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `tel` varchar(20) NOT NULL COMMENT '연락처',
  `reg_date` datetime NOT NULL COMMENT '가입일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='관리자 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,1,'true','admin','*A4B6157319038724E3560894F7F932C8886EBFCF','최고관리자','최고관리자','3dwebart@naver.com','010-6254-6946','2016-04-25 14:37:36','2016-04-25 14:37:36');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbs_comments`
--

DROP TABLE IF EXISTS `bbs_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bbs_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bbs_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bbs_documents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='게시판 게시글의 덧글 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbs_comments`
--

LOCK TABLES `bbs_comments` WRITE;
/*!40000 ALTER TABLE `bbs_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bbs_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbs_config`
--

DROP TABLE IF EXISTS `bbs_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bbs_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `list_count` int(11) NOT NULL DEFAULT '10' COMMENT '목록(리스트)에서 보여질 수',
  `bo_group_id` int(11) NOT NULL COMMENT '그룹번호',
  `bo_group_name` varchar(50) NOT NULL COMMENT '그룹이름(리스트에서 게시판 그룹 정렬값)',
  `bo_name` varchar(50) NOT NULL COMMENT '게시판 이름 (영문)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리',
  `title` varchar(50) NOT NULL COMMENT '게시판 이름 (영문/한글)',
  `type` varchar(20) NOT NULL COMMENT '게시판 형태 (grneral,gallery,movie)',
  `skin` varchar(32) NOT NULL DEFAULT 'basic' COMMENT '스킨 폴더 설정',
  `l_level` int(11) NOT NULL COMMENT '목록 보기 권한 (list)',
  `r_level` int(11) NOT NULL COMMENT '본문 보기 권한 (read)',
  `w_level` int(11) NOT NULL COMMENT '글쓰기 권한 (write)',
  `d_level` int(11) NOT NULL DEFAULT '5' COMMENT '다운로드 권한(권한보다 숫자가 높으면 파일이 안보임)',
  `html_level` int(11) NOT NULL DEFAULT '5' COMMENT 'HTML 권한',
  `copy_move_level` int(11) NOT NULL DEFAULT '1' COMMENT '게시물 복사/이동 권한',
  `sort` varchar(32) NOT NULL DEFAULT 'reg_date' COMMENT '정렬기준',
  `order_by` varchar(4) NOT NULL DEFAULT 'DESC' COMMENT '정렬순서',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bo_group_id` (`bo_group_id`),
  CONSTRAINT `bbs_config_ibfk_1` FOREIGN KEY (`bo_group_id`) REFERENCES `bbs_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='게시판 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbs_config`
--

LOCK TABLES `bbs_config` WRITE;
/*!40000 ALTER TABLE `bbs_config` DISABLE KEYS */;
INSERT INTO `bbs_config` VALUES (1,15,1,'포트폴리오','portfolio_3d',NULL,'3D 포트폴리오','general','web_gallery',5,5,1,1,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(2,15,1,'포트폴리오','portfolio_website',NULL,'website','general','web_gallery',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(3,15,1,'포트폴리오','portfolio_art',NULL,'디자인 작품','','web_gallery',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2018-01-03 13:51:16'),(4,10,2,'詩집','poetry1',NULL,'詩집 1','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(5,10,2,'詩집','poetry2',NULL,'詩집 2','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(6,10,2,'詩집','poetry3',NULL,'詩집 3','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(7,10,2,'詩집','poetry4',NULL,'詩집 4','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(8,10,2,'詩집','poetry5',NULL,'詩집 5','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(9,10,2,'詩집','poetry6',NULL,'좋은 詩 모음','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(10,10,3,'스터디','html_tag',NULL,'HTML Tag','general','html',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(11,10,3,'스터디','html_entity_code',NULL,'HTML Entity code','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(12,10,3,'스터디','html_css',NULL,'HTML/XHTML/HTML5/CSS2/CSS3','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(13,10,3,'스터디','javascript',NULL,'Javascript / jQuery','','js',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-05-08 13:30:52'),(14,10,3,'스터디','angularjs',NULL,'AngularJS','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(15,10,3,'스터디','nodejs',NULL,'NodeJS','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(16,10,3,'스터디','mysql',NULL,'MySQL','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(17,10,3,'스터디','linux',NULL,'Linux','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(18,10,3,'스터디','php_study',NULL,'php 스터디','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(19,10,3,'스터디','php_gnuboard',NULL,'그누보드 5','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(20,10,3,'스터디','php_zeroboard_xe',NULL,'제로보드 XE','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(21,10,3,'스터디','asp_aspnet',NULL,'ASP & ASP.NET','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(22,10,3,'스터디','asp_artiboard',NULL,'아티보드','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(23,10,3,'스터디','jsp',NULL,'JSP','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(24,10,3,'스터디','3d_maya_tutorial',NULL,'3D 마야 튜토리얼','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(25,10,3,'스터디','3d_maya_tip',NULL,'3D 마야 팁','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(26,10,3,'스터디','3d_maya_qna',NULL,'3D 마야 묻고 답하기','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(27,10,3,'스터디','3d_maya_portfolio',NULL,'3D 마야 포트폴리오','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(28,10,3,'스터디','3d_maya_manual',NULL,'3D 마야 메뉴얼','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 17:06:06'),(29,10,3,'스터디','ps_tutorial',NULL,'포토샵 튜토리얼','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(30,10,3,'스터디','ps_tip',NULL,'포토샵 팁','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(31,10,3,'스터디','ps_qna',NULL,'포토샵 묻고 답하기','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(32,10,3,'스터디','ps_portfolio',NULL,'포토샵 포트폴리오','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(33,10,3,'스터디','ai_tutorial',NULL,'일러스트레이터 투토리얼','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(34,10,3,'스터디','ai_tip',NULL,'일러스트레이터 팁','general','basic',5,5,5,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(35,10,3,'스터디','ai_qna',NULL,'일러스트레이터 묻고 답하기','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(36,10,3,'스터디','ai_portfolio',NULL,'일러스트레이터 포트톨리오','general','basic',5,5,1,5,1,1,'reg_date','DESC','2016-04-25 14:41:48','2016-04-25 14:41:48'),(37,15,1,'포트폴리오','portfolio','3d_maya,web,print,design,package|3D MAYA,WEB,PRINT,DESIGN,PACKAGE','포트폴리오','','basic_black',5,5,5,5,1,1,'id','DESC','2016-08-14 14:46:02','2016-08-14 16:48:27'),(38,10,5,'게시판','blog',NULL,'블로그','','basic',5,5,5,5,1,1,'id','DESC','2018-01-09 14:26:33','2018-01-09 14:26:33');
/*!40000 ALTER TABLE `bbs_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbs_documents`
--

DROP TABLE IF EXISTS `bbs_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bbs_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 get 라벨',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 허용 여부',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `explanation` varchar(512) NOT NULL COMMENT '글 내용중 설명글',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8 COMMENT='게시판 게시글 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbs_documents`
--

LOCK TABLES `bbs_documents` WRITE;
/*!40000 ALTER TABLE `bbs_documents` DISABLE KEYS */;
INSERT INTO `bbs_documents` VALUES (1,3,'portfolio_art',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사쿠라대전 아이리스 캐릭터','','사쿠라대전 아이리스 캐릭터 일러스트','left','b',128,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(2,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','기다림','','기다림이란... \r\n때론 기쁨... \r\n\r\n기다림이란... \r\n때론 슬픔... \r\n\r\n기다림이란... \r\n때론 아픔... \r\n\r\n기다림이란... \r\n때론 설레임... \r\n\r\n기다림이란... \r\n때론 허무... \r\n\r\n기다림이란... \r\n때론 초조함... \r\n\r\n기다림이란... \r\n때론 후회... \r\n\r\n기다림이란... \r\n때론 용서의 시간..','left','b',54,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(3,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','나무','','\r\n저 큰 나무에 가려진 작은 나무처럼 \r\n당신이란 그늘에 가려진 제 자신이래도 \r\n저 큰 나무가 알게 모르게 작은 나무를 \r\n여러 풍파로부터 지켜주듯이 \r\n당신도 저를 지켜주신다고 믿기에 \r\n오늘도 묵묵히 당신만을 지켜보며 \r\n커 가는 제 자신을 느낍니다 \r\n커가는 사랑과... \r\n커가는 믿음을...\r\n','left','b',50,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(4,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','나무같은 사랑','','\r\n전 당신께 \r\n나무같은 사람이 되고 싶습니다 \r\n\r\n당신이 더울 땐 \r\n그늘이 되어주고 \r\n\r\n당신이 배고플 땐 \r\n열매를 주고 \r\n\r\n당신이 쉬고싶을 땐 \r\n집이 되어주고 \r\n\r\n당신께 찬바람이 불 땐 \r\n바람막이가 되어주는 \r\n\r\n전 당신께 \r\n나무같은 사람이 되고 싶습니다\r\n','left','b',56,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(5,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','난 가끔 너를','','\r\n난 가끔 \r\n호기심에 찬 눈으로 너를 쳐다본다 \r\n넌 지금무슨 생각을 할까 \r\n\r\n난 가끔 \r\n마음속으로 네 모습을 그려본다 \r\n넌 지금 이런 모습이겠지? \r\n\r\n난 가끔 \r\n너를 생각한다 \r\n오늘은 뭐하고 있을까?\r\n','left','b',46,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(6,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','내가 하고 싶은 사랑 I','','\r\n비가 나뭇잎을 흠뻑 적시듯 \r\n내마음을 흠뻑 적셔줄 \r\n그런 사람과 사랑하고 싶다 \r\n\r\n하늘에서 흘리는 눈물을 보면서 \r\n아름답다 느끼며 \r\n내 눈에서 흐르는 눈물을 보면서 \r\n아름답다 느껴주는 \r\n그런 사람과 사랑하고 싶다 \r\n\r\n나뭇잎을 스치는 바람소리에 \r\n귀를 기울이고 \r\n내 입김만으로 \r\n내마음의 소리를 들어줄 \r\n그런 사람과 사랑하고 싶다 \r\n\r\n차가운 비를 맞으며 \r\n차가워진 몸과 마음을 \r\n따뜻하게 데워줄 \r\n그런 사람과 사랑하고 싶다\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(7,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','내가 하고 싶은 사랑 II','','\r\n햇살처럼 \r\n따뜻한 사랑을 하고싶다 \r\n그 따스함으로 \r\n마음까지 훈훈하게 녹여 줄 수 있는 사랑 \r\n\r\n얼음처럼 \r\n차가운 사랑을 하고 싶다 \r\n그 차가움으로 \r\n영원히 간직할 수 있는 사랑 \r\n\r\n유리처럼 \r\n투명한 사랑을 하고 싶다 \r\n아무런 거짓이 없는 \r\n깨끗한 사랑 \r\n\r\n돌처럼 \r\n단단한 사랑을 하고 싶다 \r\n오랜 시간이 지나도 \r\n영원히 변하지 않을 사랑\r\n','left','b',51,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(8,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','너를 보면','','\r\n너를 보면 \r\n후회를 한다 \r\n내 삶의 거짓된 순간들을... \r\n\r\n너를 보면 \r\n기쁘다 \r\n내가 살아서 널 만날 수 있음을... \r\n\r\n너를 보면 \r\n슬프다 \r\n만남이 있으면 해어짐이 있음을 잘 알기에... \r\n\r\n너를 보면 \r\n초조하다 \r\n네가 나를 떠날까봐.\r\n','left','b',54,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(9,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','너의 눈빛','','\r\n순수한 너의 눈빛 \r\n하늘에서 내려온 천사의 눈빛... \r\n\r\n유리처럼 투명한 눈빛... \r\n그 투명함에... \r\n그 너머에... \r\n모든 것이 보일 듯한 눈빛... \r\n\r\n거울처럼 맑은 눈빛... \r\n결코 거짓을 말할 수 없는... \r\n진실의 거울같은 눈빛...\r\n','left','b',50,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(10,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신에게 다 주어도','','\r\n당신에게 다 주어도 \r\n제 가슴엔 \r\n끊임없이 넘쳐나는 사랑때문에 \r\n제 자신을 주체할 수 없습니다 \r\n\r\n당신에게 다 주어도 \r\n제가 가지고 있던 \r\n모든것은 다 \r\n당신을 위한 것이였기 때문에 \r\n전혀 아깝지가 않습니다 \r\n\r\n당신에게 다 주고 \r\n당신이 뒤돌아 서신다 해도 \r\n그것이 모두 다 \r\n당신을 위한 것이라면 \r\n전 후회하지 않습니다 \r\n\r\n당신에게 다 주어도 \r\n더 주고픈 제 욕심에 \r\n전 오늘도 \r\n당신을 잡아 세웁니다\r\n','left','b',54,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(11,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신은','','\r\n당신은\r\n샘물입니다\r\n한순간이나마\r\n저의 목을 축여주시는\r\n당신은\r\n샘물입니다\r\n\r\n당신은\r\n바람입니다\r\n한순간 제 곁을 스쳐지나가고\r\n나뭇잎을 뒤흔들듯이\r\n제 마음을 뒤흔드는\r\n당신은\r\n바람입니다\r\n\r\n당신은\r\n나무입니다\r\n언제나 그 자리에 서서\r\n굳은 모습으로\r\n제가 쉴 그늘을 만들어 주지만\r\n저를 보아주시지 않는\r\n당신은\r\n나무입니다\r\n\r\n당신은\r\n산입니다\r\n우무리 목청껏 불러보아도\r\n들려오는 것은 저의 목소리뿐\r\n당신의 목소리는\r\n어디에서도 들려오지 않습니다\r\n','left','b',45,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(12,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신은 알고 있나요','','\r\n당신은 알고 있나요 \r\n제 맘속에 담긴 \r\n숨은 진실을... \r\n\r\n당신은 알고 있나요 \r\n세월이 지나도 \r\n변하지 않을 저의 마음을... \r\n\r\n당신은 알고 있나요 \r\n당신이 힘겨워할 때면 \r\n제 가슴은 찢어진다는 사실을... \r\n\r\n당신은 알고 있나요 \r\n제가 너무나도 힘겨울 때면 \r\n당신이 가장 먼저 생각난다는 사실을... \r\n\r\n당신은 알고 있나요 \r\n제가 제 자신을 주체하지 못할 만큼 \r\n당신을 사랑한다는 사실을...\r\n','left','b',47,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(13,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신의 마음','','\r\n당신의 마음 \r\n구석 구석을 살펴보고 싶슾니다 \r\n제가 들어갈 곳이 있는지... \r\n\r\n당신의 마음 \r\n구석 구석을 어루만져주고 싶습니다 \r\n당신이 슬퍼할 땐... \r\n\r\n당신의 마음 \r\n그 속에서 웃음이 느껴집니다 \r\n당신이 기뻐할 땐...\r\n','left','b',45,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(14,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','맑은 하늘 속으로','','\r\n티없이 맑은 날엔 \r\n그 파란 하늘위에 \r\n너의 해맑은 웃음이 떠오른다 \r\n\r\n그 웃음위에 \r\n내 마음도 붕 떠올라 \r\n하늘보다도 더 높은 하늘위에서 \r\n그곳을 나는 새가 되어본다\r\n','left','b',47,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(15,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑에 대한 정의','','\r\n무엇이 두려워\r\n진실을 말하지 못하나요\r\n사랑은 창피한게 아닙니다\r\n사랑은 바라지 않고 주는것...\r\n그것이 바로 사랑입니다\r\n당신은 저를 사랑하시나요?\r\n저는 당신을 사랑합니다.\r\n','left','b',48,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(16,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑은 뭘까?','','\r\n누군가 사랑을\r\n아름답다고 하면\r\n누군가는 사랑을\r\n슬프다고 합니다\r\n\r\n누군가 사랑을\r\n기쁨이라고 하면\r\n누군가는 사랑을\r\n아픔이라고 합니다\r\n\r\n왜 사랑이라는 단어하나로\r\n그 모든것을 버리고\r\n상처받고...\r\n아파하고...\r\n기뻐할까요\r\n\r\n그것은...\r\n사랑이라는 단어를\r\n그 누구도 쉽게\r\n정의 내릴수 없기 때문일겁니다\r\n','left','b',65,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(17,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑의 단계','','\r\n처음 사랑에 빠지면 집착하게 됩니다\r\n그 사람에게\r\n뭔가를 주고\r\n뭔가를 해주고 받고픈 집착\r\n\r\n그 다음엔...\r\n막연한 동경을 갖게 됩니다\r\n그 사람을 닮고 싶은\r\n그런 마음...\r\n그 사람과 비슷해지고\r\n그 사람과 사귀고 싶은\r\n막연한...\r\n집착과도 같은 동경\r\n\r\n그 다음엔...\r\n욕망이 생깁니다\r\n그 사람을 위해서\r\n오직 그 사람만을 위해서\r\n살고 싶은...\r\n그런 욕망\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(18,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','잡초와 같이','','\r\n잡초와 같이 언제 어디서나\r\n볼 수 있는 것처럼\r\n당신의 눈에 계속 밟히는\r\n그런 존제이고 싶습니다\r\n\r\n잡초가 끊임없는\r\n생명력을 지닌 것처럼\r\n끊임없는 생명력을 가진\r\n그런 사랑을 하고 싶습니다\r\n\r\n잡초와 같이 한낱 들풀이라도\r\n그것이 가진 무수한 세얼처럼\r\n당신의 곁에서 당신의 생이 다할 때까지\r\n당신을 바라보는 잡초이고 싶습니다\r\n','left','b',67,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(19,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','전 당신께','','\r\n전 당신께\r\n바람이 되고 싶습니다\r\n당신의 귓가를 맴돌며\r\n당신이 저의 말을\r\n알아듣지 못해도...\r\n\r\n전 당신께\r\n사랑한다고 속삭이고 싶습니다\r\n\r\n전 당신께\r\n흙이 되고 싶습니다\r\n언제나 당신께 밟히더라도\r\n당신이 가시는 길\r\n당신의 발을 편안하게 해주는...\r\n\r\n전 당신께\r\n흙이 되고 싶습니다\r\n\r\n전 당신께\r\n하늘이 되고 싶습니다\r\n언제나 당신만을 내려다보며\r\n당신이 좋아하는 날씨를 만들고\r\n언제나 당신을 지켜줄 수 있는...\r\n','left','b',69,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(20,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','제가 느끼는 것은','','\r\n하늘에 떠있는 태양을 보면서\r\n밝다고 느끼는 것은\r\n제 마음속에 당신이라는\r\n태양이 있기 때문입니다\r\n당신이 없다면\r\n제겐 언제나 어둠만이\r\n존재하기 때문입니다\r\n\r\n들판에 핀 꽃을 보면서\r\n아름답다고 느끼는 것은\r\n제 마음속에 당신이라는\r\n꽃이 있기 때문입니다\r\n당신이 없다면\r\n들판에 핀 꽃은 그냥 의미 없는\r\n꽃이기 때문입니다\r\n\r\n맑게 개인 하늘을 보면서\r\n푸르다 느끼는 것은\r\n제 마음속에 당신이라는\r\n하늘이 있기 때문입니다\r\n당신이 없다면\r\n하늘은 그냥\r\n하늘일 뿐이기 때문입니다\r\n','left','b',67,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(21,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','제가 느낄 때는','','\r\n제가 슬프다고 느낄 떄는\r\n당신이 제 옆에\r\n없다고 느낄 때입니다\r\n\r\n제가 기쁘다고 느낄 때는\r\n당신이 밝게\r\n웃어줄 때입니다\r\n\r\n제가 행복하다고 느낄 때는\r\n잠시 스쳐지나가는 시간이래도\r\n당신이 힘들 때\r\n제가 든든한 기둥이 되어\r\n당신이 잠시 쉬었다 갈 때입니다\r\n','left','b',64,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(22,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','표현할 수 없는 마음','','\r\n한장의 편지로\r\n제 마음을 모두\r\n표현할 수 없겠지요\r\n\r\n한 통화의 전화로\r\n제가 하고 싶었던 말들을 모두\r\n표현할 수 없겠지요\r\n\r\n사랑한다 한마디로\r\n제 사랑을 모두\r\n표현할 수 없겠지요\r\n','left','b',69,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(23,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','행복일텐데...','','\r\n이 하늘아래\r\n너와 나 단둘이만 있어도\r\n내겐 행복일텐데...\r\n\r\n다른건 모두 남에게 주어도\r\n네 마음만 네게 준다면\r\n내겐 행복일텐데...\r\n\r\n언제나 내게\r\n행복한 웃음을 지어준다면\r\n내겐 행복일텐데...\r\n\r\n내게\r\n사랑한다 한마디만 해준다면\r\n내겐 행복일텐데...\r\n','left','b',97,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(24,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','헛된 믿음, 헛된 증오, 헛된 사랑이래도...','','\r\n당신을 향한 저의 믿음이\r\n헛된 믿음 이래도\r\n전 그믿음을\r\n간직하고 싶습니다\r\n그 믿음마저 깨어진다면\r\n제 삶의 의미는\r\n사라지니까요\r\n\r\n당신을 향한 저의 증오가\r\n헛된 증오래도\r\n전 당신을 증오합니다\r\n그것은 당신을 너무나도\r\n사랑하고 있기 때문입니다\r\n그것은...\r\n사랑의 반대는 증오가 아니라...\r\n무관심이기 때문입니다\r\n\r\n당신을 향한 저의 사랑이\r\n헛된 사랑 이래도\r\n전 당신을 사랑합니다\r\n당신을 향한 저의 사랑은\r\n어떠한 거짓도...\r\n어떠한 욕심도 없는\r\n당신을 향한 저의 끝없는\r\n순수한 사랑이니까요...\r\n','left','b',66,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(25,4,'poetry1',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','혼자 한 고백','','\r\n까만 실같은 머리카락\r\n그리고...\r\n맑은 유리구슬같은 눈\r\n그 맑은 눈동자속에 고인\r\n이슬을 한 방울도\r\n보고싶지 않아서\r\n오늘도...\r\n홀로 삭이는 말\r\n사랑해...\r\n그리고\r\n미안해...\r\n','left','b',95,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(26,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신께 보매는 메세지','','\r\n세상에 아무리 지치더라도... \r\n세상이 아무리 힘들어도... \r\n우리가 해야 할 일들은 \r\n너무나도 많습니다 \r\n우리가 할 수 있는 일들은 \r\n너무나도 많습니다 \r\n아무리 아파도... \r\n아무리 슬퍼도... \r\n아무리 지쳐도... \r\n쓰러지지 않을 마음만 있다면 \r\n다시 일어서고 \r\n언제고 다시 나아갈 수 있습니다\r\n','left','b',49,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(27,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신은 언제나','','\r\n당신은 언제나 주기만 했죠... \r\n당신은 언제나 다 바쳤죠... \r\n그래서 그 사람 떠났을 때 \r\n당신안에 남아있던 그 모든 것들이 \r\n다 사라졌죠... \r\n이젠 제가 드릴게요 \r\n이제 당신것이 없다면 \r\n제 것으로 채우세요... \r\n당신은 이제 아무에게도... \r\n저에게도... \r\n주지말고 받기만 해요...\r\n','left','b',71,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(28,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑은... I','','\r\n사랑은... \r\n인내가 필요합니다 \r\n사랑을 위해서... \r\n기다릴 줄 아는 그런 인내... \r\n\r\n사랑은... \r\n끈기가 필요합니다 \r\n지쳐 쓰러지더라도 \r\n다시 일어설 줄 아는 그런 끈기... \r\n\r\n사랑은... \r\n용기가 필요합니다 \r\n사랑하는 이에게 다가설 줄 아는 용기... \r\n그리고 모든것을 다 바칠 줄 아는 그런 용기...\r\n','left','b',63,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(29,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑은... II','','\r\n사랑은... \r\n그렇게도 힘든 것인가요... \r\n사랑을 할 때도 \r\n사랑을 말할 때도 \r\n사랑하는 이에게 \r\n솔직한 말을 들을 때도...\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(30,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑을 하려면','','\r\n사랑을 하려면 \r\n솔직해야 합니다 \r\n\r\n사랑을 하려면 \r\n들을 줄 알아야 합니다 \r\n\r\n사랑을 하려면 \r\n말할 줄 알아야 합니다 \r\n\r\n사랑을 하려면 \r\n믿을 줄 알아야 합니다 \r\n\r\n사랑을 하려면 \r\n노력할 줄 알아야 합니다\r\n','left','b',62,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(31,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑을 하면 시인이 됩니다','','\r\n사랑을 하면 \r\n아름다운 시인이 됩니다 \r\n사랑하는 이가 행복해 할 때면 \r\n세상 모든 사물이 아름다워 보이기에... \r\n\r\n사랑을 하면 \r\n항상 웃음짓는 시인이 됩니다 \r\n사랑하는 이가 미소지을 때면 \r\n왠지 기분이 좋아 저절로 웃음이 지어집니다... \r\n\r\n사랑을 하면 \r\n슬픈 시인이 됩니다 \r\n사랑하는 이의 눈에 슬픔이 가득할 때면 \r\n세상 모든 일들이 모두 다 슬퍼 보이기에...\r\n','left','b',66,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(32,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑을 하면 왜...?','','\r\n사랑을 하면 왜 주기만 하는 걸까... \r\n아무런 미련 없이... \r\n아무런 대가 없이... \r\n아무런 후회 없이... \r\n\r\n사랑을 하면 왜 아픈 걸까... \r\n아무런 상처 없이... \r\n아무런 병도 없이... \r\n\r\n사랑을 하면 왜 기쁜 걸까... \r\n아무런 받은 것 없이... \r\n그냥... \r\n보기만 해도...\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(33,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑이 떠나버린 사람의 가슴속에 남는 것','','\r\n사랑이 떠나버린 사람의 \r\n가슴속에 남는 것은... \r\n그 사람과의 추억과 \r\n짙은 허무... \r\n그리고... \r\n진득한 슬픔입니다\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(34,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑이란 이름으로','','\r\n사랑이란 이름으로 \r\n당신을 소유하고싶지 않습니다 \r\n그저 당신만을 지켜보며 \r\n그저 당신만을 가슴속에 \r\n담아두고 싶습니다 \r\n당장 채워지지 않을 만큼 \r\n저의 사랑은 크지만 \r\n그것이 당신을 향한 \r\n저의 마음이기 때문입니다 \r\n\r\n사랑이란 이름으로 \r\n당신을 웃게 하고 싶습니다 \r\n그저 당신이 저를 보며 \r\n당신의 텅빈 가슴속에 \r\n웃음이 넘쳐난다면 \r\n그것만으로도 \r\n저는 행복할 수 있기 때문입니다 \r\n\r\n사랑이란 이름으로 \r\n당신이 눈물을 보인다면 \r\n\r\n저는 그런 당신을 보며 \r\n제 가슴속에 일어나는 작은 파문들을 \r\n주체하지 못할 것입니다 \r\n당신의 눈물은 \r\n한 여름에 내리는 소나기보다도 \r\n더 많은 물들을 \r\n제 가슴에 뿌려놓기 때문입니다\r\n','left','b',74,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(35,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','용기와 힘','','\r\n사랑을 용기라 하면 \r\n웃음은 힘입니다 \r\n\r\n슬픔을 고뇌라 하면 \r\n고독은 외로움입니다 \r\n\r\n희망을 욕망이라 하면 \r\n좌절은 고통이라 하겠지요 \r\n\r\n용기를 잃으면 \r\n고뇌와 외로움, 고통이 \r\n한꺼번에 밀려오겠지만 \r\n\r\n자신을 지탱해줄 힘이 있다면 \r\n용기는 언제든 다시 살아날 것입니다\r\n','left','b',69,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(36,5,'poetry2',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','친구','','\r\n언젠가... \r\n친구에게 물었죠 \r\n사랑은 뭘까... \r\n친구는 이렇게 말했습니다 \r\n세상엔... \r\n좋아하는 것과... \r\n사랑하는 것이 있는데... \r\n좋아하는 것은 \r\n그 사람이 예쁘기 때문에... \r\n그 사람의 성격이 좋아서... \r\n그렇게 좋은 것은 \r\n그냥 좋은 거라고... \r\n사랑은... \r\n아무 이유없이 좋은 거라고... \r\n그냥... \r\n그 사람이 있으므로 해서 좋은 거라고... \r\n사랑엔... \r\n조건이 없는가 봅니다\r\n','left','b',63,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(37,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','희망... ','','\r\n그 작은 단어 하나로 \r\n\r\n전 당신을 기다렸습니다 \r\n\r\n절망과 사랑의 슬픔을 안은 채로 \r\n\r\n전 오늘도... \r\n\r\n당신을 기다렸습니다 \r\n\r\n당신을 기다리며... \r\n\r\n전 오늘도... \r\n\r\n하얀 백지위에 \r\n\r\n까만 글들을 채워 넣습니다 \r\n\r\n그 글들위에 저의 마음을 얹어서...\r\n','left','b',46,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(38,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','너무나도 지쳐버린 당신','','\r\n기다림에 지쳐버린 \r\n당신을 보면 \r\n그 기다림으로 인해 \r\n당신의 마음이 \r\n사막의 황무지보다도 \r\n더 황폐해 질까봐 두렵습니다 \r\n\r\n슬픔에 지쳐버린 \r\n당신을 보면 \r\n당신의 그 슬픔이 \r\n저로 인해서 \r\n기쁨이 될 수 있게 해 달라고 \r\n기도해 봅니다 \r\n\r\n눈물에 지쳐버린 \r\n당신을 보면 \r\n당신의 그 눈물을 \r\n제가 대신 \r\n흘리게 해달라고 \r\n기도해 봅니다 \r\n\r\n사랑에 지쳐버린 \r\n당신을 보면 \r\n당신의 지쳐버린 사랑이 \r\n저로인해 다시 \r\n활력을 얻을 수 있게 해달라고 \r\n기도해봅니다 \r\n\r\n너무나도 지쳐버린 \r\n당신을 보면 \r\n저로 인해서 \r\n당신의 마음만이라도 \r\n따뜻하고 편안하게 해달라고 \r\n기도해 봅니다\r\n','left','b',48,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(39,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','노을','','\r\n하늘은 태양을 쉬게 하려고 붉게 만들고... \r\n태양은 밤을 만들기 위해 \r\n노을을 만들고 있습니다 \r\n\r\n제가 바라보고 있는 하늘의 노을은 \r\n제가 바라보고 있는 노을의 색깔과 의미는 \r\n내일의 황혼의 새벽을 만들기 위해 \r\n잠시 쉬어가는 노을입니다 \r\n\r\n당신이 바라보는... \r\n당신이 바라보고 있다면... \r\n당신의 노을은 어떤 색깔과 어떤 의미를 \r\n부여하과 있나요 \r\n\r\n당신도 제가 바라보고 있는 \r\n저 노을처럼 \r\n내일의 황혼의 새벽을 만들기 위해 \r\n잠시 휴식하는 것인가요... \r\n\r\n아니면... \r\n오늘의 생을 마감하고 \r\n세상 저 너머로 가버린... \r\n그런 노을인가요...\r\n','left','b',43,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(40,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','눈물','','\r\n어두운 하늘에 떠 있는 \r\n수많은 별들이 \r\n하늘의 눈물이라면 \r\n\r\n어두운 밥바다에 몰아치는 파도는 \r\n바다가 흘리는 \r\n눈물이겠지요 \r\n\r\n그 바다의 눈물에 젖어버린 \r\n모래를 밟으며 \r\n\r\n당신의 슬픔에 가득찬 얼굴과 \r\n당신의 눈가에 고였던 \r\n슬픈 물망울을 떠올려 봅니다 \r\n\r\n밤새 흐느껴울던 하늘은 \r\n시간이 흐르면 \r\n밝게 웃는 태양이 떠오르고 \r\n\r\n밤새 흐느껴울던 파도는 \r\n시간이 흐르면 \r\n기쁨의 눈물을 흘리겠지요 \r\n\r\n당신의 얼굴도 \r\n당신의 눈물도 \r\n밝게 웃는 얼굴과 \r\n기쁨의 눈물로만 채워졌으면 합니다....\r\n','left','b',45,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(41,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신의 마음','','\r\n한 사람으로 인해 \r\n다친 당신의 마음 \r\n그것으로 인해 \r\n괴로운 당신의 마음이 \r\n너무나도 잘 느껴집니다 \r\n이젠 웃으세요 \r\n당신의 아름다운 웃음을 \r\n보여주세요 \r\n당신이 바라보는 세상이\r\n아름답지 않다 하여도 웃으세요\r\n아름다운 그 웃음으로 당신의 마음을 정화 시켜 주세요\r\n','left','b',52,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(42,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신이 느껴질 때면','','\r\n제 눈에 당신의 슬픔이 느껴질 때면 \r\n당신의 슬픔을 제가 나눠갖고 싶습니다 \r\n\r\n제 손끝에 당신의 눈물이 느껴질 때면 \r\n제 눈에도 눈물이 고입니다 \r\n\r\n제 코끝에 당신의 향기가 느껴질 때면 \r\n그 향기를 작은 병에 담아두고 싶습니다 \r\n\r\n제 입술에 당신의 촉촉한 입술이 느껴질 때면 \r\n그 촉촉함을 영원히 간직하고 싶습니다 \r\n\r\n제 맘속에 당신의 사랑이 느껴질 때면 \r\n당신의 그 사랑이 바로 저였으면...합니다...\r\n','left','b',48,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(43,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신이 좋아하는','','\r\n창가에 당신이 좋아하는 비가 내릴 때면 \r\n전 창문을 뚫어지게 쳐다봅니다 \r\n그곳에 당신이 서있을것만 같아서.... \r\n\r\n당신이 좋아하는 나무앞에 서있을 때면 \r\n전 그 나무를 오래도록 쳐다봅니다 \r\n그 나무앞에 당신이 언젠가 나타날것 같아서.... \r\n\r\n당신이 좋아하는 하늘을 바라볼 때면 \r\n전 시선을 바닥으로 돌립니다 \r\n흐르는 눈물을 주체하지 못할 것 같아서...\r\n','left','b',45,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(44,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','떠나시려는 당신','','\r\n세상의 단 하나뿐인 사랑 \r\n이세상에 존제하는 무수한 당신가운데 나만의 당신 \r\n\r\n당신이 있기에 \r\n제가 있습니다 \r\n\r\n이제 당신은 저먼 곳으로 \r\n떠나시려 하네요 \r\n\r\n어찌하여 당신은 그리 먼 곳으로 \r\n떠나시려 하네요 \r\n\r\n어찌하여 제가 볼 수 없는 곳으로 \r\n가려 하네요 \r\n\r\n어찌하여 제 가슴에 \r\n슬픔으로 채우려 하네요\r\n','left','b',59,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(45,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','마지막 웃음','','\r\n당신의 마지막 뒷모습이 \r\n앚혀지지 않아 \r\n오늘도 술로 삭입니다 \r\n당신의 마지막 모습처럼 \r\n어제나 웃어주세요 \r\n혼자한 사랑이래도 \r\n전 괜찮습니다 \r\n저를 위해 울지말고 \r\n저를 위해 웃어 주세요...\r\n','left','b',63,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(46,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','무심한 사랑','','\r\n하얀 담배연기속에 그려진 \r\n당신의 모습... \r\n그 연기와 같이... \r\n한순간에 나타났다가 \r\n한순간에 사라져버린 사랑 \r\n계속 연기를 뿜어 \r\n당신의 모습을 그려보지만 \r\n당신은 매정하게... \r\n또다시 사라져가는군요...\r\n','left','b',64,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(47,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','방황','','\r\n새야... \r\n새야... \r\n\r\n길잃고 방황하는 \r\n비에 젖은 작은 새야 \r\n\r\n너의 집은 어디이기에 \r\n이리도 헤매인단 말이니 \r\n\r\n나 몸돌아갈 곳은 있지만 \r\n마음갈 곳은 없단다... \r\n\r\n갈 곳 없는 너와 나... \r\n어쩜 이리도 같단 말이니... \r\n\r\n구슬프게 울어도... \r\n소리내어 울어도... \r\n\r\n갈 곳 없는 너와 나... \r\n\r\n이젠 지친 몸을 이끌고... \r\n보금자리 찾아 보자꾸나...\r\n','left','b',67,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(48,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','별','','\r\n밤하늘 가득한 \r\n수많은 별들... \r\n\r\n그렇게 많은 별들중에 \r\n당신의 별과 \r\n제 별을 찾아봅니다 \r\n\r\n그렇게 멀게 보이지 않듯이 \r\n손에 잡힐 듯 \r\n손에 잡히지 않는 별들 \r\n\r\n그게 바로... \r\n당신과 제 별일까요... \r\n\r\n그게 바로 \r\n당신과 저일까요... \r\n\r\n그게 바로... \r\n우리사랑일까요...\r\n','left','b',57,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(49,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신은 혼자가 아닙니다','','\r\n상처입은 영혼처럼... \r\n슬픈 영혼처럼... \r\n그렇게 아파하지 마세요... \r\n그렇게 슬퍼하지 말세요... \r\n당신은 혼자가 아닙니다 \r\n당신은 당신만의 당신이 아닙니다 \r\n당신의 어머니의 당신... \r\n당신의 친구의 당신... \r\n당신이 사랑하는 모든 것의 당신... \r\n당신은 그렇게 복수의 당신입니다 \r\n그 모든 상처를 딛고... \r\n그 모든 슬픔을 딛고... \r\n좀더 높은 곳에서 \r\n세상을 내려다 보세요 \r\n당신을 알고 있는 이들이 많지 않습니까 \r\n당신이 알고 있는 이들이 많지 않습니까 \r\n당신을 사랑하는 이들이 많지 않습니까 \r\n세상은 아직 아름답지요?\r\n','left','b',65,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(50,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','세상에서 가장 무서운 것','','\r\n험난한 세상에 \r\n나홀로 남았다... \r\n\r\n세상에서 가장 무서운 것은... \r\n이 세상속에서 따돌림당하는 것도 아니고... \r\n\r\n누군가에게 \r\n물신나게 맞는 것도 아니고... \r\n\r\n언젠가 하번은 찾아오는 \r\n죽음도 아닌... \r\n\r\n바로 내가나를 버리는 것임을... \r\n내가 잘 알기에... \r\n\r\n홀로 남겨진 세상속에서... \r\n나를 잃지 않고... \r\n\r\n꿋꿋하게 살아가련다... \r\n떠나간 내 사랑이여...\r\n','left','b',64,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(51,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','왜이리도 슬픈지요','','\r\n당신이 좋아하던 \r\n의자에 앉아 \r\n당신을 그려봅니다 \r\n왜 이리도 슬픈지요 \r\n당신이 그자리에 없다는 사실이 \r\n왜 이리도 슬픈지요 \r\n\r\n당신이 좋아하던 \r\n그 비가 내릴 때면 \r\n당신의 두 눈에 흘러내리던 \r\n그 눈물이 생각납니다 \r\n왜 이리도 슬픈지요 \r\n왜 그리도 슬퍼했는지요 \r\n\r\n날씨가 화창한 날엔 \r\n당신이 좋아하던 그 길을 \r\n저도 모르게 걷습니다 \r\n왜 이리도 슬픈지요 \r\n당신과 함께 걷지 못한다는 사실이 \r\n왜 이리도 아쉬운지요 \r\n\r\n편한 잠을 못 이루는 날엔 \r\n당신이 가장 먼저 생각납니다 \r\n왜 이리도 슬픈지요 \r\n당신을 끝내 못지켜줬다는 사실이 \r\n왜 이리도 안타까운지요\r\n','left','b',59,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(52,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','이런게 사랑일까요...','','\r\n순간순간이 버겁습니다 \r\n예전엔 이러지 않았었는데 \r\n당신을 사랑한 순간부터 \r\n당신을 좀 더 알게 된 순간부터 \r\n언제나 당신이 보고싶고 \r\n하루에도 수십번씩 \r\n당신만을 생각합니다 \r\n당신의 전화라도 없는 날엔 \r\n불안한 마음 감출 길이 없습니다 \r\n이런게 사랑일까요...\r\n','left','b',59,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(53,6,'poetry3',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','제가 느끼는 것은 II','','\r\n제 어깨위에 얹혀진 당신의 머리보다 \r\n제가 무겁게 느끼는 것은 \r\n당신의 세월에 데한 \r\n당신의 무거운 한숨입니다 \r\n\r\n제 팔에 안긴 당신의 허리보다 \r\n제가 힘겹게 느끼는 것은 \r\n허물어질 듯한 당신의 모습과 \r\n당신의 힘겨워하는 모습들 입니다 \r\n\r\n제 입술위에 얹혀진 당신의 입술보다 \r\n제가 허무하게 느끼는 것은 \r\n당신의 표정에서 볼 수 있는 \r\n당신의 인생에 데한 당신의 허탈함 때문입니다 \r\n\r\n제 맘속에 들어와 있는 당신보다 \r\n제가 두렵게 느끼는 것은 \r\n언제 부서질지 모르는 당신의 마음이 \r\n너무나도 잘 느껴지기 때문입니다\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(54,7,'poetry4',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','거짓','','\r\n거짓된 말...\r\n거짓된 행동...\r\n거짓된 삶...\r\n\r\n하늘만이 아는...\r\n그래도...\r\n거짓되지 않은 마음...\r\n\r\n사랑한다 한마디 못하고...\r\n또 거짓된 행동과...\r\n거짓된 말들...\r\n\r\n오늘도 하루해가 가고 있지만\r\n내게 남은건\r\n거짓과 후회의 반복뿐...\r\n\r\n조금이라도...\r\n너의 진심을 알 수 있다면...\r\n더 이상 거짓되지 않을 수 있을텐데...\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(55,7,'poetry4',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','꿈','','\r\n사람은\r\n누구나 꿈을 꿉니다\r\n\r\n어떤 사람은...\r\n세계에서 제일 가는 부자...\r\n\r\n어떤 사람은...\r\n세계에서 제일 멋있는 사람...\r\n\r\n어떤 사람은...\r\n세상에서 제일 성공한 사람...\r\n\r\n저의 꿈은...\r\n혼자한 사랑이래도...\r\n가슴속 싶은곳에 간직할 수 있는 사랑...\r\n바로 당신과 함께하는것...\r\n','left','b',57,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(56,7,'poetry4',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신은 아마 모르실겁니다','','\r\n당신은 아마 모르실겁니다 \r\n제가 당신을 못 잊을 것이라는걸... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 아파할 때 저또한 너무나도 아팠던 것을... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 세상을 등진날 전 사람을 등졌다는 사실을... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 그렇게 세상을 떠나면 전 세상과의 문을 닫을 거라는것을... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 당신을 버렸어도 전 당신을 버릴 수 없다는것을... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 제가 잃어버렸던 수많은 감정들과 사랑을 일깨워 주셨던것을... \r\n\r\n그리고... \r\n그 감정들 때문에 당신앞에선 덤덤한 척 \r\n당신이 슬퍼할 때도 아무렇지 않은 척했지만 \r\n사실은 눈물을 많이 흘렸다는 사실을... \r\n\r\n당신은 아마 모르실겁니다 \r\n제가 얼마만큼 당신을 사랑하는지...\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(57,7,'poetry4',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신을 알기까지','','\r\n당신을 알기 전엔 \r\n전 세상이 두려워 \r\n제 안에 저를 가뒀습니다 \r\n\r\n당신을 알기 전엔 \r\n전 사랑하는 것을 \r\n두려워했습니다 \r\n\r\n당신을 알기 전엔 \r\n제 아네 감추어진 \r\n감정들의 정체가 궁금했습니다 \r\n\r\n당신을 알고 난 뒤에야 \r\n제 눈은 아름다운 세상에 \r\n눈을 떴고... \r\n\r\n당신을 알고 난 뒤에야 \r\n제 안에 깊숙히 숨어있던 \r\n제 자신도 몰랐던 \r\n감정들을 알게 되었습니다 \r\n\r\n당신이 제겐 \r\n너무나도 커다란 존제이고 \r\n당신이 제겐 사랑임을 알게 되었습니다\r\n','left','b',51,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(58,7,'poetry4',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신의 존재','','\r\n당신의 이름 석자는 \r\n제 삶의 \r\n커다란 의미입니다 \r\n\r\n혹시라도 \r\n같은 이름의 사람이라해도 \r\n그것은 의미가 없습니다 \r\n\r\n당신의 모습은 \r\n제 삶의 \r\n커다람 원의 중심입니다 \r\n\r\n혹시라도 \r\n당신과 비슷한 사람을 보게 되더라도 \r\n그것은 당신이 아니기에 의미가 없습니다 \r\n\r\n당신의 한숨은 \r\n제 삶의 \r\n커다란 회오리입니다 \r\n\r\n혹시라도 \r\n당신이 한숨을 내쉴때면 \r\n제 삶은 그 횡리에 실려 날아가 버릴것 같습니다 \r\n\r\n당신의 눈물은 \r\n제 삶의 \r\n커다란 파도입니다 \r\n\r\n혹시라도 \r\n당신이 눈물을 흘리신다면 \r\n제 가슴에 성난 파도가 몰아칠 것 같습니다\r\n','left','b',56,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(59,7,'poetry4',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑...','','\r\n사랑... \r\n너무 어렵게 생각하지 말아요... \r\n아무것도 없는 자만이 \r\n최선을 다할 수 있고 \r\n노력하는 자만이 \r\n무언가를 얻을 수 있듯이 \r\n사랑도... \r\n최선을 다하고... \r\n노력한다면... \r\n그리고... \r\n있는 그대로를 사랑할 수 있다면... \r\n그걸로 아름다운 것이 아닐까요...\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(60,7,'poetry4',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','저란 사람은...','','\r\n전 아주 슬픈 사람입니다 \r\n당신의 슬픔을 잘 아는데... \r\n당신의 아픔을 잘 아는데... \r\n당신을 위해 해줄 수 있는 일이 \r\n제겐 아무것도 없기 때문에... \r\n\r\n전 아주 기쁜 사람입니다 \r\n그래도 당신이 절 믿어 주고 \r\n저로인해 웃음지어주고 \r\n아무것도 없는 제가 \r\n당신을 사랑할 수 있게 해주시니까요... \r\n\r\n전 그래도... \r\n행복한 사람입니다 \r\n당신의 마음속 한구석이라도 \r\n제가 비비고 들어갈 곳이 \r\n있다는 사실은...\r\n','left','b',61,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(61,7,'poetry4',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','제 마음속에','','\r\n제 마음속에 \r\n미움과 분노가 쌓일 때면 \r\n당신을 생각하며 \r\n미움과 분노를 삭입니다 \r\n\r\n제 마음속에 \r\n슬픔이 쌓일 때면 \r\n저보다 더 슬퍼할 당신을 생각하며 \r\n슬픔을 삭입니다 \r\n\r\n제 마음속에 \r\n기쁨이 쌓일 때면 \r\n당신이 밝게 웃어줬을 때를 생각하며 \r\n기분이 좋아져 저도모르게 웃음짓습니다 \r\n\r\n제 마음속에 \r\n사랑이 커갈 때면 \r\n당신이 제게 주신것들을 생각하며 \r\n홀로 거리로 나옵니다\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(62,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','산다는건','','\r\n아무리 지쳐 쓰러져도...\r\n힘들다 말할까...\r\n\r\n아무리 괴로워도...\r\n아프다 말할까...\r\n\r\n누구에게도...\r\n그 누구도...\r\n\r\n삶을 대신 살아주진 않는다...\r\n산다는건 그런것...\r\n\r\n그저 아프지않고...\r\n지쳐 쓰러지지 않길바래야지...\r\n\r\n고단한 이 한 몸뚱아리...\r\n항상 미소지어 아픔을 잊어야지...\r\n\r\n그게 삶인데...\r\n그게 삶인걸...\r\n','left','b',49,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(63,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','슬프도록 아름다운','','\r\n슬픈 두눈을 들어 하늘을 보라 \r\n눈물이 흐르려 할 땐 \r\n음악처럼 흐르는 바람에 \r\n귀를 기울이고... \r\n몸을 내맡겨 보라 \r\n그러다 쓰러지면... \r\n다시 일어서고... \r\n다시 일어서고... \r\n바람이 눈물을 말려 \r\n눈물이 마를 때쯤 비로소 \r\n슬프도록 아름다운 미소... \r\n그대 입술위에 걸릴테니...\r\n','left','b',50,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(64,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','시계','','\r\n시간은 왜 우리를 갈라놓았을 까요... \r\n우릴 갈라놓은 시간이 우릴 돌아볼 틈도 없게... \r\n우릴 돌아 보지도 않고 앞으로만 가네요... \r\n당신의 시간과... \r\n저의 시간이 같았다면... \r\n우린 서로 사랑할 수 있었을 텐데... \r\n멈춰버린 당신의 시계를... \r\n제가 돌릴 수 있었을 텐데... \r\n이제 당신의 그 아름답던 미소마저 지워져... \r\n당신의 슬픔밖에 볼 수 없지만... \r\n당신의 그 슬픔마저도 사랑해 버린 저는... \r\n당신의 멈춰버린 시계를 보며... \r\n눈물이 흐르는 제 눈가로... \r\n손을 뻗어 봅니다... \r\n이 눈물마저... \r\n멈출 수 있다면...\r\n','left','b',46,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(65,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신의 미소','','\r\n당신의 미소는... \r\n그 미소하나로... \r\n저를 기쁘게 합니다 \r\n\r\n당신이 기뻐 웃으실 땐... \r\n세상을 다 가진 듯한 기쁨이 \r\n제 안에 충만하기 때문입니다 \r\n\r\n당신의 미소는... \r\n그 미소하나로... \r\n저를 감동시킵니다 \r\n\r\n제가 슬프거나 힘들 땐... \r\n당신의 아름다운 미소가 \r\n제겐 힘이 되기 때문입니다 \r\n\r\n당신의 미소는... \r\n그 미소하나로... \r\n포근하게 합니다 \r\n\r\n당신의 그 감싸주듯 웃는... \r\n그 미소가 제겐... \r\n따스한 봄을 연상케 하기에… \r\n\r\n당신의 미소는... \r\n그 미소하나로... \r\n저를 슬프게 합니다 \r\n\r\n당신의 눈이 슬픔을 띠고 미소지으실 땐... \r\n제 안에 폭풍과도 같은 파도가 \r\n휘몰아치기 때문입니다\r\n','left','b',49,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(66,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','당신은...','','\r\n당신은 \r\n제겐 행복입니다 \r\n언제 부터인가... \r\n전... \r\n제가 아닌 다른 사람에게 \r\n제 자신에게도 할 수 없었던... \r\n것들을 하고 싶었고... \r\n제가 아닌 다른 사람이... \r\n저로 인해 \r\n기뻐하고... \r\n상처받고... \r\n슬퍼할 수 있음을... \r\n알았습니다 \r\n당신의 사랑이 비록... \r\n제 사랑이 아닐지라도... \r\n전 당신을 사랑합니다 \r\n당신의 마음을 제가 가질 수 없다 해도... \r\n전 당신을 사랑합니다...\r\n','left','b',50,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(67,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','내안에 당신이 있습니다','','\r\n내안에 당신이 있습니다 \r\n새벽의 이슬을 머금은 듯한 \r\n당신의 눈동자는 \r\n아직 내안에 있습니다 \r\n\r\n내안에 당신이 있습니다 \r\n당신의 그 고운 목소리와 \r\n아름다운 당신의 모습은 \r\n아직 내안에 있습니다 \r\n\r\n내안에 당신이 있습니다 \r\n당신이 제곁에서 멀리 떠나버렸지만... \r\n당신의 향기가 남아 \r\n시리도록 아프게 \r\n아직 내안에 있습니다\r\n','left','b',48,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(68,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','내 사랑은...','','\r\n내 사랑은... \r\n슾픈 눈물로 하루를 적신다... \r\n\r\n내 사랑은... \r\n언제나 내 가슴속에서 살아 숨쉰다... \r\n\r\n내 사랑은... \r\n영원하다... \r\n\r\n내 사랑은... \r\n비록 내 곁을 떠났지만... \r\n\r\n내 사랑은... \r\n영원하다... \r\n\r\n내 사랑은... \r\n그래서 더 힘들다...\r\n','left','b',51,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(69,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑한 후에...','','\r\n사랑은... \r\n멀어져 이별이 되고... \r\n\r\n\r\n이별은... \r\n아쉬움이 되어 눈물로 흐르고... \r\n\r\n\r\n아쉬움은... \r\n그리움을 만들고... \r\n\r\n\r\n그리움은... \r\n텅 비어버린 가슴속에 시린 아픔을 남기고... \r\n\r\n\r\n텅 비어버린 가슴속에 남은것은... \r\n당신의 발자국 입니다...\r\n','left','b',57,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(70,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','꽃','','\r\n슬픔은 \r\n다음에 필 \r\n기쁨이란 이름의 꽃을 \r\n피우기위한 눈물이다 \r\n\r\n눈물은 \r\n가슴속에 피어난 \r\n그리움이란 이름의 상처를 \r\n씻어내리기 위한 단비다 \r\n\r\n아픔은 \r\n다음에 쉽게 꺾이지 않도록 \r\n웃음이란 이름의 줄기를 \r\n단단하게 만들기 위한 작은 상처다 \r\n\r\n이별은 \r\n사랑이란 이름의 꽃의 시듦이 아니라 \r\n새로운 사랑을 활짝 피우기 위해 \r\n아름답게 퍼지는 사랑의 꽃씨다\r\n','left','b',63,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(71,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','상처','','\r\n사랑하는 사람이 있습니다 \r\n\r\n항상 아프지 않았으면... \r\n하는 사람이 있습니다 \r\n\r\n항상 밝게 웃음지었으면... \r\n하는 사람이 있습니다 \r\n\r\n항상 가습에 상처 받지 않았으면... \r\n하는 사람이 있습나다 \r\n\r\n이 사람의 아프고... \r\n이 사람의 슬프고... \r\n이 사람의 가슴 깊은 곳의 상처가... \r\n저를 가습아프게 하는것은... \r\n\r\n사람이 사람을 아프게 하고... \r\n사람이 사람을 슬프게 하고... \r\n사람이 사람을 상처 입히는 것이... \r\n\r\n가장 사랑하는 사람이 가장 아프게 하고... \r\n가장 사랑하는 사람이 가장 슬프게 하고... \r\n가장 사랑하는 사람이 가장 상처받게 한다는것을... \r\n알게 되었기 때문입니다...\r\n','left','b',60,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(72,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','추억','','\r\n짧은 추억하나... \r\n그리고... \r\n작은 슬픔하나... \r\n다른건 모두 잊었는데 \r\n슬픔만이 내가슴속에 남아있다 \r\n하지만 버릴 수 없다 \r\n그토록 날 지탱해준 당신인데... \r\n내게 남은건 이거 하나뿐인데... \r\n언젠가 잊게 되는 날이면... \r\n내모습 달라지겠지... \r\n더 이상 아파하지 않아도 되겠지... \r\n하지만 지금은... \r\n영원히 잠들고 싶다 \r\n영원히 꿈꾸고 싶다 \r\n그 꿈속에서 당신을 만나 수 있다면...\r\n','left','b',56,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(73,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑 그리고 이별','','\r\n사랑하려 할 땐 \r\n그렇게도 힘들게 만나서 \r\n\r\n이별 하려 할 땐 \r\n한순간에 헤어지는데 \r\n\r\n사랑할 때는 \r\n느끼지 못했던 사랑안의 사랑이 \r\n\r\n이별 후엔 \r\n너무 크게 느껴져 더 아프다 \r\n\r\n사랑을 할 때는 \r\n눈으로는 울어도 \r\n가슴으로 웃음 짓지만 \r\n\r\n이별 후에는 \r\n눈으로는 웃음짓고 \r\n가슴으로 눈물 짓는다\r\n','left','b',62,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(74,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','사랑아...','','\r\n사랑아... \r\n너는 내 눈물을 좋아하는구나... \r\n\r\n너와 함께 할때면... \r\n난 행복해서 울고... \r\n\r\n네가 먼곳에 있을땐... \r\n난 외로워서 울고... \r\n\r\n네가 안보이면... \r\n난 기다림에 지쳐 울고... \r\n\r\n너와 이별하고 난 지금은... \r\n그리움에 눈물 흘린다 \r\n\r\n사랑아... \r\n너는 내 눈물을 좋아하는구나...\r\n','left','b',61,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(75,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','내 가슴에 품을 수 없는 너','','\r\n마음을 담을 수 있는 그릇이 있다면 얼마나 좋을까? \r\n이 마음을 담아 보여줄 수 있을텐데.. \r\n\r\n사랑이란 언제나 \r\n해피엔딩이 될 수 없을을... \r\n\r\n이 작은 가슴에 \r\n너를 품어보고 싶다... \r\n\r\n네게 한 남자로서 다가갈 수 없다면 \r\n떨어지지 않는 발걸음... \r\n돌려야 하겠지... \r\n\r\n눈물로 이별하지 말고 \r\n웃으면서 이별하자... \r\n\r\n지금은... \r\n최소한 지금은... \r\n\r\n다시 사랑할 수 없을까봐 \r\n가슴졸이지 말자...\r\n','left','b',62,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(76,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','녹슨 철문','','\r\n내 가슴엔 \r\n녹슨 철문하나가 있다 \r\n\r\n너무나도 오랜시간 \r\n열지 않았던 녹슨 철문... \r\n\r\n너무나도... \r\n너무나도 오랜 기라림 끝에 손님이 찾아왔다 \r\n\r\n설레이는 가슴을 안고 \r\n힘껏 철문을 열었다 \r\n\r\n철문안에는 \r\n선물로 가득 채워 넣었다 \r\n\r\n하지만 손님은... \r\n그냥 손님일 뿐이었나보다 \r\n\r\n오래 머물지도 않고 \r\n오래 함께 하지도 못한채 떠나 버렸다 \r\n\r\n이제 다시... \r\n문을 닫아야 할 때인가보다... \r\n\r\n문을 힘껏 닫는다... \r\n녹슨 철문은 쉽게 닫히지 않는다 \r\n\r\n그 사람이 떠나간 곳을 \r\n망연히 바라본다 \r\n\r\n이제 오지 않을것임을 알면서도 \r\n오랫동안 돌아본다 \r\n\r\n쉽사리 떨어지지 않는 발걸음 뒤로 돌린다 \r\n떨어지는 눈물은 닦지 않는다 \r\n\r\n뒤로 돌아본 곳에는... \r\n아무것도 없는 텅빈 공간... \r\n\r\n남아있는것은 온통... \r\n그녀의 발자욱뿐... \r\n\r\n이제 녹슨 철문에... \r\n기름칠을 해야겠다 \r\n\r\n이제 언제 열리게 될지 모를... \r\n녹슨 철문에...\r\n','left','b',66,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(77,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','시간의 엇갈림','','\r\n내 시간은 멈춰 있는데 \r\n세상의 시간은 그렇게도 계속 흘러간다 \r\n\r\n그 사람은 아이를 낳고 \r\n어느덧 아이가 성년이 되고 \r\n\r\n성년은 또 아이를 낳고 \r\n그사람은 할머니가 되어 가겠지... \r\n\r\n내 죽어버린 심장은 \r\n언제쯤 다시 살아날까 \r\n\r\n언제 내가 다시 \r\n살아있음을 느끼게 될까\r\n','left','b',86,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(78,8,'poetry5',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','오지 않을 사람은 오지 않는다','','\r\n아무리 외로움에 몸서리쳐도...\r\n오지 않을 사람은 오지 않는다\r\n\r\n이제는 잊어야지 하면서도…\r\n음악을 들으면 그 사람 생각이 나고\r\n\r\n귀를 막고 주위를 둘러보면…\r\n보이는 아름다운 장소들…\r\n\r\n이곳에 그 사람과 함꼐 왔으면 하며\r\n떠오르는 그 얼굴…\r\n\r\n귀를 막고 눈을 감아도…\r\n각인되어 떠오르는 얼굴…\r\n\r\n숨을 참고 참아봐도…\r\n가슴은 터져버릴 듯 아프기만 하다\r\n\r\n눈을 떠도 보이지 않는다\r\n이제 눈물이 시야를 막는다\r\n\r\n비라도 내린다면 눈물을 감춰줄텐데 하며\r\n피식 웃어봐도\r\n\r\n아파서 우는 가슴의 통증은\r\n나락속에 홀로 서 있는 듯 하다\r\n \r\n잊을 사람은 잊어야 한다\r\n오지 않을 사람은 오지 않는다\r\n','left','b',68,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(79,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 편지 - 김남주 -','','\r\n그대만큼 사랑스러운 사람릉 본 일이 없다.\r\n그대만큼 나를 외롭게 한 이도 없었다.\r\n이 생각을 하면 내가 꼭 울게 된다.\r\n\r\n\r\n그재만큼 나를 정직하게 해준 이가 없었다.\r\n내 안을 비추는 그대는 제일로 영롱한 거울 그대의 깊이를\r\n다 지나가면 글썽이는 눈매의 내가 있다 나의 시작이다\r\n\r\n\r\n그대에게 매일 편지를 쓴다.\r\n한 구절 쓰면 한구절을 와서 읽는 그대\r\n그래서 이 편지는 한번도 부치지 않는다.\r\n','left','b',53,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(80,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 홀로서기 - 서정윤 -','','\r\n【[서정윤]홀로서기 】\r\n\r\n--둘이 만나 서는 게 아니라 \r\n\r\n홀로 선 둘이가 만나는 것이다--\r\n\r\n\r\n1\r\n\r\n기다림은\r\n\r\n만남을 목적으로 하지 않아도\r\n\r\n좋다.\r\n\r\n가슴이 아프면\r\n\r\n아픈 채로,\r\n\r\n바람이 불면\r\n\r\n고개를 높이 쳐들면서, 날리는\r\n\r\n아득한 미소.\r\n\r\n어디엔가 있을\r\n\r\n나의 한 쪽을 위해\r\n\r\n헤매이던 숱한 방황의 날들.\r\n\r\n태어나면서 이미\r\n\r\n누군가가 정해졌었다면,\r\n\r\n이제는 그를\r\n\r\n만나고 싶다.\r\n\r\n\r\n2\r\n\r\n홀로 선다는 건\r\n\r\n가슴을 치며 우는 것보다\r\n\r\n더 어렵지만\r\n\r\n자신을 옭아맨 동아줄,\r\n\r\n그 아득한 끝에서 대롱이며\r\n\r\n그래도 멀리,\r\n\r\n멀리 하늘을 우러르는\r\n\r\n이 작은 가슴.\r\n\r\n누군가를 열심히 갈구해도\r\n\r\n아무도\r\n\r\n나의 가슴을 채워줄 수 없고\r\n\r\n결국은\r\n\r\n홀로 살아간다는 걸\r\n\r\n한겨울의 눈발처럼 만났을 때\r\n\r\n나는\r\n\r\n또다시 쓰러져 있었다.\r\n\r\n\r\n3\r\n\r\n지우고 싶다\r\n\r\n이 표정없는 얼굴을\r\n\r\n버리고 싶다\r\n\r\n아무도\r\n\r\n나의 아픔을 돌아보지 않고\r\n\r\n오히려 수렁 속으로\r\n\r\n깊은 수렁 속으로\r\n\r\n밀어 넣고 있는데\r\n\r\n내 손엔 아무것도 없으니\r\n\r\n미소를 지으며\r\n\r\n체념할 수밖에......\r\n\r\n위태위태하게 부여잡고 있던 것들이\r\n\r\n산산이 부서져 버린 어느날, 나는\r\n\r\n허전한 뒷모습을 보이며\r\n\r\n돌아서고 있었다.\r\n\r\n\r\n4\r\n\r\n누군가가\r\n\r\n나를 향해 다가오면\r\n\r\n나는 <움찔> 뒤로 물러난다.\r\n\r\n그러다가 그가\r\n\r\n나에게서 멀어져 갈 땐\r\n\r\n발을 동동 구르며 손짓을 한다.\r\n\r\n\r\n만날 때 이미\r\n\r\n헤어질 준비를 하는 우리는,\r\n\r\n아주 냉담하게 돌아설 수 있지만\r\n\r\n시간이 지나면 지날수록\r\n\r\n아파오는 가슴 한 구석의 나무는\r\n\r\n심하게 흔들리고 있다.\r\n\r\n\r\n떠나는 사람은 잡을 수 없고\r\n\r\n떠날 사람을 잡는 것만큼\r\n\r\n자신이 초라할 수 없다.\r\n\r\n떠날 사람은 보내어야 한다\r\n\r\n하늘이 무너지는 아픔일지라도.\r\n\r\n\r\n5\r\n\r\n나를 지켜야 한다\r\n\r\n누군가가 나를 차지하려 해도\r\n\r\n그 허전한 아픔을\r\n\r\n또다시 느끼지 않기 위해\r\n\r\n마음의 창을 꼭꼭 닫아야 한다.\r\n\r\n수많은 시행착오를 거쳐\r\n\r\n얻은 이 절실한 결론을\r\n\r\n<이번에는>\r\n\r\n<이번에는>하며 어겨보아도\r\n\r\n결국 인간에게서는\r\n\r\n더이상 바랄 수 없음을 깨달은 날\r\n\r\n나는 비록 공허한 웃음이지만\r\n\r\n웃음을 웃을 수 있었다.\r\n\r\n\r\n아무도 대신 죽어주지 않는\r\n\r\n나의 삶,\r\n\r\n좀더 열심히 살아야겠다.\r\n\r\n\r\n6\r\n\r\n나의 전부를 벗고\r\n\r\n알몸뚱이로 모두를 대하고 싶다.\r\n\r\n그것조차\r\n\r\n가면이라고 말할지라도\r\n\r\n변명하지 않으며 살고 싶다.\r\n\r\n말로써 행동을 만들지 않고\r\n\r\n행동으로 말할 수 있을 때까지\r\n\r\n나는 혼자가 되리라.\r\n\r\n그 끝없는 고독과의 투쟁을\r\n\r\n혼자의 힘으로 견디어야 한다.\r\n\r\n부리에,\r\n\r\n발톱에 피가 맺혀도\r\n\r\n아무도 도와주지 않는다.\r\n\r\n\r\n숱한 불면의 밤을 새우며\r\n\r\n<홀로서기>를 익혀야 한다.\r\n\r\n\r\n7\r\n\r\n죽음이\r\n\r\n인생의 종말이 아니기에\r\n\r\n이 추한 모습을 보이면서도\r\n\r\n살아 있다.\r\n\r\n나의 얼굴에 대해\r\n\r\n내가\r\n\r\n책임질 수 있을 때까지\r\n\r\n홀로임을 느껴야 한다.\r\n\r\n\r\n그리고\r\n\r\n어딘가에서\r\n\r\n홀로 서고 있을, 그 누군가를 위해\r\n\r\n촛불을 들자.\r\n\r\n허전한 가슴을 메울 수는 없지만\r\n\r\n<이것이다>하며\r\n\r\n살아가고 싶다.\r\n\r\n누구보다도 열심히 사랑을 하자.\r\n','left','b',58,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(81,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 우연 - 김수연 -','','\r\n운명은 문득 생각지 않게 몰고간다\r\n우연히 한 자리에 않았다가\r\n영원히 때칠 수 없는\r\n질긴 밧줄로 메어진다\r\n\r\n스쳐 지나치지 못하고\r\n강하게 이끌리는\r\n고뇌의 산실이 되어\r\n\r\n꿈을 채우고\r\n그리움을 채우고\r\n안타까움을 갖게 하고\r\n깊은 그리움과 만족하고\r\n자랑스러운 깃발이 된다.\r\n','left','b',57,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(82,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 아직도 사랑한다는 말에 -서정윤-','','\r\n사랑한다는 말로도 \r\n다 전할수 없는 \r\n내 마음을 \r\n이렇게 노을에다 그립니다. \r\n\r\n사랑의 고통이 아무리 클지라도 \r\n결국 사랑할 수 밖에, \r\n\r\n다른 어떤 것으로도 \r\n대신할 수 없는 우리 삶이기에 \r\n내 몸과 마음을 태워 \r\n이 저녁 밝혀드립니다. \r\n\r\n다시 하나가 되는 게 \r\n그다지 두려울지라도 \r\n목숨 붙어 있는 지금은 \r\n그대에게 내 사랑 \r\n전하고 싶어요.. \r\n\r\n아직도 사랑한다는 말에 \r\n익숙하지 못하기에 \r\n붉은 노을 한 편 적어 \r\n그대의 창에 보냅니다.\r\n','left','b',52,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(83,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 하늘처럼 맑은 사람이 되고 싶다 -서정윤-    ','','\r\n햇살같이 가벼운 몸으로 \r\n맑은 하늘을 거닐며 \r\n바람처럼 살고 싶다 \r\n\r\n언제 어디서나 \r\n흔적없이 사라질 수 있는 \r\n바람의 뒷모습이고 싶다 \r\n\r\n하늘을 보며 \r\n땅을 보며 \r\n그리고 살고 싶다 \r\n\r\n길 위에 떠 있는 하늘 \r\n어디엔가 그리운 얼굴이 숨어 있다 \r\n\r\n깃털처럼 가볍게 만나는 \r\n신의 모습이 \r\n인간의 소리들로 지쳐 있다 \r\n\r\n불기둥과 구름기둥을 앞세우고 \r\n알타이 산맥을 넘어 \r\n약속의 땅에 동굴을 파던 때부터 \r\n끈질기게 이어져 오던 사랑의 땅 \r\n\r\n눈물의 땅에서 \r\n이제는 바다처럼 조용히 \r\n자신의 일을 하고 싶다 \r\n\r\n맑은 눈으로 \r\n이 땅을 지켜야지\r\n','left','b',65,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(84,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 눈물을 아시나요 -서정윤-','','\r\n차가운 눈빛으로\r\n사치스런 외로움으로\r\n\r\n애써 외면하려 했던 리듬들이\r\n나를 흔들고 있어요.\r\n\r\n기와지붕 미끄러진 바람이\r\n생의 남은 조각들을\r\n머리 속에 어질러 놓으면\r\n\r\n느껴지던 그 꽃잎의 붉은 빛 눈물\r\n입 안으로 웅얼거리며 따라하던\r\n사슴 무리의 울음소리\r\n\r\n찾아보려 고개를 돌려도\r\n눈앞에서 사라지는 그대여\r\n눈물을 아시나요.\r\n\r\n얼룩이 다시 꽃으로 피는\r\n밀려 가면서 내가 할 수 있는 건\r\n노래 부르기밖에 없어라.\r\n','left','b',59,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(85,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 창가에서 -서정윤-','','\r\n어느날\r\n불현듯 눈물이 날 때가 있다\r\n누구를 향한것도 아닌채\r\n다시 쓸쓸해진다\r\n\r\n기쁨들로 인해\r\n혼자일 수 밖에 없는 날\r\n슬픔은 눈물들로 인해\r\n더욱 구차해 질 수 있기에\r\n노래를 불러도\r\n가슴속 상처가 아려서\r\n다시 되풀이되고\r\n\r\n내가 넘어야 할 언덕은\r\n이럴수록 자꾸 높아지는데\r\n어디쯤에서\r\n쉼표를 찍어야 할지\r\n마침표가 먼저 나오려 한다\r\n','left','b',58,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(86,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 여분의 죄 -서정윤-','','\r\n슬프지 말아야 하리라\r\n꽃이 지려 꽃잎이 떨어지고\r\n울먹이는 하늘로 맨손을 흔들면\r\n우리들의 가슴엔\r\n어느새 \r\n얼룩진 인생이 걸려 있다.\r\n\r\n\r\n화려하지 않아도 좋다\r\n그렇다고 \r\n슬플 필요도 없다\r\n삶은 \r\n그렇게 그렇게 끝이 나고\r\n우리들의 그림자도\r\n아득한 풍경으로 그려지는데\r\n이제, 어둠은 사라지면\r\n어둠은 빛에 살아 남아\r\n우리에게 그림자를 찾아준다\r\n\r\n아침 노을이 저녁 노을이다\r\n꽃은 언젠가 져야 하지만\r\n노을이 흩어지는 하늘쯤에서\r\n다정한 사람을 떠나 보낸 쓸쓸함과\r\n슬픈 소원을 가지는 우리는\r\n사랑할 수도 미워할 수도 없는\r\n그 어느 누구를 위해\r\n조용한 기도를 하자.\r\n\r\n가장 슬픈건\r\n슬퍼할 수조차 없는 마음이다\r\n열린 하늘의 밤은\r\n이제 열리는\r\n아침 하늘에 의해 닫혀지고\r\n여분의 죄값으로\r\n언젠가\r\n우리에게 밤을 다오\r\n생존을 위해 그림자를 가지고\r\n생존을 위해 시간은 흘러가고\r\n생존을 위해 인간이 되자\r\n인생의 약속은 지켜야 한다\r\n','left','b',53,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(87,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 사랑한다는 것으로 -서정윤-','','\r\n사랑한다는 것으로\r\n새의 날개를 꺾어\r\n너의 곁에 두려 하지 말고 \r\n가슴에 작은 보금자리를 만들어\r\n종일 지친 날개를 쉬고 다시 날아갈\r\n힘을 줄 수 있어야 하리라.\r\n','left','b',58,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(88,9,'poetry6',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','- 그대 -김수연-','','\r\n가까운 듯 멀게 느껴지는\r\n안타까운 이\r\n\r\n메스꺼움처럼 울렁이게 하는\r\n그리운 이\r\n\r\n너무 늦어 찾아온\r\n시리도록 아리운\r\n눈물겨운 이\r\n\r\n두 손 가슴에 모두어 잡고\r\n마음 조바심케 하는\r\n애달픈이\r\n\r\n시간과 공간을 초월하여\r\n마음의 여백에 색체로 그려낼\r\n따사로운 이\r\n','left','b',52,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(89,10,'html_tag',NULL,'n',NULL,1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','&lt;A&gt;...&lt;/A&gt;\r\n         ','','\r\n            <h5 class=\"col-md-12 alert alert-danger\">&lt;A&gt;링크 제목글 또는 이미지&lt;/A&gt;</h5>\r\n            <div class=\"contentsd-explanation\">\r\n             <ul class=\"right-padding-20\">\r\n               <li class=\"col-md-12\">\r\n                  <img src=\"/assets/frontend/layout/img/html.jpg\" class=\"img-responsive\" />\r\n               </li>\r\n               <h4 class=\"col-md-3 alert alert-info text-center\">\r\n                  속성\r\n                </h4>\r\n               <h4 class=\"col-md-9 alert alert-info text-center\">\r\n                  설명\r\n                </h4>\r\n             </ul>\r\n             <ul class=\"right-padding-20\">\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    href=\"URL\"\r\n                  </div>\r\n                  <div class=\"col-md-9\">\r\n                    하이퍼링크로 호출되는 파일\r\n                  </div>\r\n                </li>\r\n               \r\n                <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    name=\"이름\"\r\n                 </div>\r\n                  <div class=\"col-md-9\">\r\n                    중간 부분을 지정하기 위한 html 도큐먼트 부분 명명. 이 이름은 또 다른 &lt;A&gt;태그의 href= 속성에 사용될 수 있다.\r\n                 </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    target=\"\"\r\n                 </div>\r\n                  <div class=\"col-md-9\">\r\n                    \"프레임 이름 또는 윈도우\"<br />\r\n                   프레임과 함께 사용되는 파일이 디스플레이되어야 할 프레임이나 윈도우를 나타냄\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    _blank\r\n                  </div>\r\n                  <div class=\"col-md-9\">\r\n                    새창 띄우기\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    _parent\r\n                 </div>\r\n                  <div class=\"col-md-9\">\r\n                    프레임에서 바로 전 창으로 돌아감\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    _self\r\n                 </div>\r\n                  <div class=\"col-md-9\">\r\n                    현제 창 또는 현제 프레임\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    _top\r\n                  </div>\r\n                  <div class=\"col-md-9\">\r\n                    프레임으로 제작시 가장 최상위 창이 바뀜\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-12 note note-default non-bottom-margin\">\r\n                   위 그림에서 보면 left.html과 content.html 파일이 bottom.html 파일안에서 돌아가고 bottom.html과 top.html은 index.html안에서 돌아간다\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-12 note note-default non-bottom-margin\">\r\n                   _parent와 _top은 이런 식의 프레임 홈페이지에 많이 쓰이는데 _parent는 한단계 전, _top은 최상의의 파일을 바꿔준다.<br />\r\n                   즉 초록색 안에서 _parent를 타겟으로 지정하면 bottom.html 전체가 바뀌게 되고 똑같이 초록색 안이지만 _top을 타겟으로 지정하면 index.html 전체가 바뀌게 된다.\r\n                 </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    사용 예\r\n                  </div>\r\n                  <div class=\"col-md-9\">\r\n                    &lt;A href=\"http://www.naver.com\" target=\"_balnk\"&gt;네이버 새창&lt;/A&gt;<br />\r\n                   &lt;A href=\"http://www.naver.com\" target=\"_self\"&gt;네이버 현제창&lt;/A&gt;<br /><br />\r\n                   \r\n                    &lt;A name=\"gogo\" target=\"_self\"&gt;책갈피&lt;/A&gt;<br />\r\n                   &lt;A href=\"#gogo\" target=\"_self\"&gt;클릭하면 책갈피로 이동합니다&lt;/A&gt;\r\n                  </div>\r\n                </li>\r\n             </ul>\r\n           </div>\r\n          ','left','b',193,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(90,10,'html_tag',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'y','&lt;APPLET&gt;...&lt;/APPLET&gt;','','<div class=\"row\">\r\n<h5 class=\"col-md-12 alert alert-danger\">페이지에 자바 애플릿을 삽입</h5>\r\n<div class=\"contentsd-explanation\">\r\n<ul class=\"right-padding-20\">\r\n<h4 class=\"col-md-3 alert alert-info text-center\">속성 </h4>         <h4 class=\"col-md-9 alert alert-info text-center\">설명</h4>         <li class=\"col-md-12\">            <div class=\"col-md-3\">align=\"\"</div>          <div class=\"col-md-9\">            \"left\" , \"right\" , \"top\" , \"middle\" \"bottom\"<br />                    에플릿의 출력 내용이 윈도우에 정렬되는 상태          </div>\r\n</li>\r\n<li class=\"col-md-12\">                 <div class=\"col-md-3\">\r\nlt=\"텍스트\"\r\n</div>\r\n<div class=\"col-md-9\">\r\n애플릿이 제대로 로드되지 않을 경우에 표시되는 텍스트\r\n</div>\r\n</li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\ncode=\"URL\"\r\n</div>\r\n<div class=\"col-md-9\">\r\n자바 애플릿의 이름\r\n</div>\r\n</li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\ncodebase=\"URL\"\r\n</div>\r\n<div class=\"col-md-9\">\r\n에플릿이 저장되어 있는 디렉토리\r\n</div>\r\n</li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\nheight=수치,width=수치\r\n</div>\r\n<div class=\"col-md-9\">\r\n애플릿의 출력 내용의 가로와 세로의 크기(pixel 딘위 - ex : width: 300 height: 200 - 가로 300픽셀 세로 200픽셀)               </div>              </li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\nhspace=수치, vspace=수치\r\n</div>\r\n<div class=\"col-md-9\">\r\n애플릿과 그 주변 텍스트 사이의 가로와 세로 공간으로, 픽셀값으로 나타냄\r\n</div>\r\n</li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\nname=명칭\r\n</div>\r\n<div class=\"col-md-9\">\r\n페이지상의 다른 에플릿들이 이 에플릿을 참조할 수 있는 이름\r\n</div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n','left','b',136,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(91,3,'portfolio_art',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','',NULL,NULL,NULL,'n','test','','test','right','b',4,'2016-05-02 16:58:22','2016-05-02 16:58:22'),(92,3,'portfolio_art',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','',NULL,NULL,NULL,'n','test2','','ㅇㄴㅇ','right','b',32,'2016-05-03 14:15:06','2016-05-03 14:15:06'),(93,13,'javascript',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','jQuery 시작하기 1편 - jQuery 파일 불러오기','','text:jQuery 를 사용하기 앞서 작업을 위한 폴더를 만들어보자\r\n폴더 이름은 jquery-study 라는 폴더를 만들었다.\r\n이제 이 안에 html 문서를 생성하자\r\nindex.html 이라는 문서를 생성하고 그 안으로 들어가서 코딩을 시작해 본다.\r\n에디터를 열고 index.html 파일을 열어보자.\r\n\r\n*** 참고 \r\n기본 코딩에 대한 팁(?)\r\n모든 언어는 HTML 포함 여는 곳이 있으면 닫는 곳 있다.\r\n물론 HTML은 그렇지 않은 태그문(예를 들면 img, br)이 존재하지만 기본적으로는 그렇다.\r\n항상 바깥쪽을 열고 닫기를 먼저 하고 안으로 들어와 열고 닫기를 잘 해줘야 나중에 햇갈리거나 괄호가 꼬이는것을 방지할 수 있다.\r\n\r\njQuery 를 사용하기 위해서는 기본적으로 jQuery js 문서를 로드하여야 한다.\r\njQuery 문서를 로드하는 방법은 script 태그로 외부 jQuery js 문서를 로드해야 한다.\r\n1. 외부 사이트에서 직접 불러오는 방법-|-\r\ncode:&lt;script type=“text/javascript” src=“http://code.jquery.com/jquery.min.js”&gt;&lt;/script&gt;-|-\r\ntext:2. 내 사이트 내에 js문서를 저장하여 불러오는 방법-|-\r\ncode:&lt;script type=“text/javascript” src=“만든 폴더/jquery.min.js”&gt;&lt;/script&gt;-|-\r\ntext:먼저 jQuery 문서를 다운로드 한다.\r\njQuery 문서를 다운로드 하는 곳-|-\r\nlinkUrl:https://jquery.com/download/-|-\r\ntext:이 사이트에서 보면 \r\nDownload the compressed, production jQuery 1.11.3\r\nDownload the uncompressed, development jQuery 1.11.3\r\n위 두가지중에 하나로 사용한다.(버전은 업그레이드 되었을 시 바뀔 수도 있다.)-|-\r\n\r\ntext:Download the compressed, production jQuery 1.11.3 : 이 js 파일은 내용이 압축된 파일이다.\r\n일반적인 프론트 엔드 개발자 및 퍼블리셔가 많이 사용하는 파일.\r\nDownload the uncompressed, development jQuery 1.11.3 : 이 js 파일은 개발자가 변경 가능하도록 압축되지 않은 파일이다.\r\n기본적으로 두가지 파일 모두 내용은 동일하다.\r\njQuery 파일 또는 jQuery 플러그인 파일은 개발자 버전인지 아니면 압축 파일인지를 알기 쉽도록 파일 이름에 규칙이 있다.\r\njQuery js -|-\r\n\r\ntext:파일의 예)\r\njquery.min.js 파일 : 압축된 파일\r\njquery.js 파일 : 압축되지 않은 개발자 버전의 파일-|-\r\n\r\ntext:jQuery 를 개발할 것이 아니므로 Download the compressed, production jQuery 1.11.3 을 다운로드 해보자\r\n&lt;a href=\"https://jquery.com/download/\" target=\"_blank\"&gt;https://jquery.com/download/&lt;/a&gt; 에서 Download the compressed, production jQuery 1.11.3 이라는 곳을 클릭하면 query-1.11.3.min.js 파일을 다운로드 할 수 있다\r\n브라우저에 따라 다운 로드 하려는 문서가 다운로드가 되지 않고 웹 페이지처럼 뜨는 경우가 있는데 당황하지 말고 저장 (윈도우 : Ctrl + s, 맥 : Command + s)하면 된다-|-\r\n\r\ntext:이제 다운 받은 jquery 문서를 앞으로  jquery-study 폴더안에 js 라는 폴더를 생성하고 그 안에 다운받은 jquery js 문서를 넣고 로드 해보자\r\n방식은 외부 사이트에서 직접 로드하는 방식과 동일하다.-|-\r\ncode:&lt;script type=“text/javascript” src=“js/jquery-1.11.3.min.js”&gt;&lt;/script&gt;-|-\r\ntext:앞서 하는 로드 방식과 다른점이 있을까?-|-\r\n\r\ntext:있다.\r\n첫번째 방법으로 로드하는 경우 간혹 가다가 웹 속도가 느린곳에서는 외부 로드가 잘 이루어 지지 않아 사이트가 초반에 단 몇초간이라도 정상작동이 되지 않는 경우가 발생할 수 있다.\r\n','right','b',137,'2016-05-08 13:51:27','2016-05-08 18:11:21'),(94,13,'javascript',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','jQuery 시작하기 2편 - 시작과 끝','','text:처음에 한데로 jquery를 불러왔다면 이제는 웹 문서내에 사용하기 위해 jquery를 선언하고 사용해보자.\r\n선언하는 방법은 4가지 방법이 있다.-|-\r\n\r\n\r\ntext:jQuery 선언방식 1-|-\r\n\r\ncode:(function() {\r\n	실행될 내용\r\n}) (jQuery);-|-\r\n\r\ntext:jQuery 선언방식 2-|-\r\ncode:jQuery(document).ready(function() {\r\n	실행될 내용\r\n});-|-\r\n\r\ntext:jQuery 선언방식 3-|-\r\ncode:$(document).ready(function() {\r\n	실행될 내용\r\n});-|-\r\n\r\ntext:jQuery 선언방식 4-|-\r\ncode:$(function() {\r\n	실행될 내용\r\n});-|-\r\n\r\ntext:위 4가지 방식 모두 정상적으로 동작한다.\r\n위 jQuery 안에 동작할 내용을 작성한다.\r\n위 내용을 설명하자면 웹 브라우저가 실행되고 브라우저 내에 html 문서가 모두 로드 된 다음에 안의 내용이 실행되는 방식이다.\r\njQuery는 기본적으로 함수로 시작해서 ( $(function() { …  함수가 끝나는 부분 ( }); )에서 끝이난다.\r\n함수로 감싸는 이유는 한번 사용하고 버릴게 아니라 브라우저 내에서 동작하는 페이지내에 있는 jQuery 를 여러번 재활용해서 사용 할 수 있도록 하기 위해서이다.\r\n','right','b',17,'2016-05-08 18:18:22','2016-05-08 18:26:35'),(95,37,'portfolio','3d_maya','n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','',NULL,NULL,NULL,'n','테스트','','','dsdsds','r',0,'2017-03-11 15:40:53','2017-03-11 15:40:53'),(96,37,'portfolio','3d_maya','n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:46:52','2017-03-11 15:46:52'),(97,37,'portfolio','web,print','n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:49:34','2017-03-11 15:49:34'),(98,37,'portfolio','web,print','n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:50:31','2017-03-11 15:50:31'),(99,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:52:39','2017-03-11 15:52:39'),(100,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:54:51','2017-03-11 15:54:51'),(101,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:55:00','2017-03-11 15:55:00'),(102,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:55:01','2017-03-11 15:55:01'),(103,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:55:14','2017-03-11 15:55:14'),(104,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:59:09','2017-03-11 15:59:09'),(105,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:59:37','2017-03-11 15:59:37'),(106,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:00:59','2017-03-11 16:00:59'),(107,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:02:58','2017-03-11 16:02:58'),(108,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:04:08','2017-03-11 16:04:08'),(109,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:05:13','2017-03-11 16:05:13'),(110,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:10:44','2017-03-11 16:10:44'),(111,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:13:17','2017-03-11 16:13:17'),(112,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:13:39','2017-03-11 16:13:39'),(113,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:14:44','2017-03-11 16:14:44'),(114,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:15:39','2017-03-11 16:15:39'),(115,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:16:40','2017-03-11 16:16:40'),(116,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:23:01','2017-03-11 16:23:01'),(117,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:24:33','2017-03-11 16:24:33'),(118,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:24:36','2017-03-11 16:24:36'),(119,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:24:48','2017-03-11 16:24:48'),(120,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:33:21','2017-03-11 16:33:21'),(121,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:36:49','2017-03-11 16:36:49'),(122,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:37:21','2017-03-11 16:37:21'),(123,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:40:48','2017-03-11 16:40:48'),(124,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:41:46','2017-03-11 16:41:46'),(125,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:42:35','2017-03-11 16:42:35'),(126,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:47:58','2017-03-11 16:47:58'),(127,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:00:38','2017-03-11 17:00:38'),(128,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:02:03','2017-03-11 17:02:03'),(129,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:05:43','2017-03-11 17:05:43'),(130,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:07:59','2017-03-11 17:07:59'),(131,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:11:33','2017-03-11 17:11:33'),(132,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:15:39','2017-03-11 17:15:39'),(133,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:21:31','2017-03-11 17:21:31'),(134,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:22:30','2017-03-11 17:22:30'),(135,37,'portfolio',NULL,'n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:23:39','2017-03-11 17:23:39'),(136,37,'portfolio','3d_maya,web,print','n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','테스트','','SADDDSA\r\nDASSA\r\nDSDD\r\nSSDASA\r\nDSAS','right','b',0,'2017-03-11 17:55:17','2017-03-11 17:55:17');
/*!40000 ALTER TABLE `bbs_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbs_files`
--

DROP TABLE IF EXISTS `bbs_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bbs_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` varchar(20) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bbs_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bbs_documents` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COMMENT='게시판 게시글의 파일 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbs_files`
--

LOCK TABLES `bbs_files` WRITE;
/*!40000 ALTER TABLE `bbs_files` DISABLE KEYS */;
INSERT INTO `bbs_files` VALUES (1,1,'','/attach/20160418/','1460955179.zip','application/zip',712472,'iris.zip','/home/hosting_users/mayamenual/www/attach/20160418/1460955179.zip','2016-04-25 14:50:26','2016-04-25 14:50:26'),(2,1,'','/attach/20160418/','1460955179.png','image/png',67872,'iris.png','/home/hosting_users/mayamenual/www/attach/20160418/1460955179.png','2016-04-25 14:50:26','2016-04-25 14:50:26'),(3,92,'','/attach/20160503/','1462252506.gif','image/gif',115255,'_copy.gif','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20160503/1462252506.gif','2016-05-03 14:15:06','2016-05-03 14:15:06'),(4,92,'','/attach/20160503/','1462252506.jpg','image/jpeg',5806812,'_DSF7551.JPG','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20160503/1462252506.jpg','2016-05-03 14:15:06','2016-05-03 14:15:06'),(5,92,'','/attach/20160503/','1462252506.png','image/png',2290,'_tb2_on.png','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20160503/1462252506.png','2016-05-03 14:15:06','2016-05-03 14:15:06'),(6,92,'','/attach/20160503/','1462252506.jpeg','image/jpeg',54747,'01.jpeg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20160503/1462252506.jpeg','2016-05-03 14:15:06','2016-05-03 14:15:06'),(7,96,'origin','/attach/20170311/','1489214812.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214812.jpg','2017-03-11 15:46:52','2017-03-11 15:46:52'),(8,96,'origin','/attach/20170311/','1489214812_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214812_1.jpg','2017-03-11 15:46:52','2017-03-11 15:46:52'),(9,96,'origin','/attach/20170311/','1489214812_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214812_2.jpg','2017-03-11 15:46:52','2017-03-11 15:46:52'),(10,96,'origin','/attach/20170311/','1489214812_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214812_3.jpg','2017-03-11 15:46:52','2017-03-11 15:46:52'),(11,96,'origin','/attach/20170311/','1489214812_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214812_4.jpg','2017-03-11 15:46:52','2017-03-11 15:46:52'),(12,97,'origin','/attach/20170311/','1489214974.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214974.jpg','2017-03-11 15:49:34','2017-03-11 15:49:34'),(13,97,'origin','/attach/20170311/','1489214974_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214974_1.jpg','2017-03-11 15:49:34','2017-03-11 15:49:34'),(14,97,'origin','/attach/20170311/','1489214974_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214974_2.jpg','2017-03-11 15:49:34','2017-03-11 15:49:34'),(15,97,'origin','/attach/20170311/','1489214974_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214974_3.jpg','2017-03-11 15:49:34','2017-03-11 15:49:34'),(16,97,'origin','/attach/20170311/','1489214974_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489214974_4.jpg','2017-03-11 15:49:34','2017-03-11 15:49:34'),(17,98,'origin','/attach/20170311/','1489215031.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215031.jpg','2017-03-11 15:50:31','2017-03-11 15:50:31'),(18,98,'origin','/attach/20170311/','1489215031_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215031_1.jpg','2017-03-11 15:50:31','2017-03-11 15:50:31'),(19,98,'origin','/attach/20170311/','1489215031_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215031_2.jpg','2017-03-11 15:50:31','2017-03-11 15:50:31'),(20,98,'origin','/attach/20170311/','1489215031_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215031_3.jpg','2017-03-11 15:50:31','2017-03-11 15:50:31'),(21,98,'origin','/attach/20170311/','1489215031_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215031_4.jpg','2017-03-11 15:50:31','2017-03-11 15:50:31'),(22,104,'origin','/attach/20170311/','1489215549.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215549.jpg','2017-03-11 15:59:09','2017-03-11 15:59:09'),(23,104,'origin','/attach/20170311/','1489215549_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215549_1.jpg','2017-03-11 15:59:09','2017-03-11 15:59:09'),(24,104,'origin','/attach/20170311/','1489215549_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215549_2.jpg','2017-03-11 15:59:09','2017-03-11 15:59:09'),(25,104,'origin','/attach/20170311/','1489215549_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215549_3.jpg','2017-03-11 15:59:09','2017-03-11 15:59:09'),(26,104,'origin','/attach/20170311/','1489215549_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215549_4.jpg','2017-03-11 15:59:09','2017-03-11 15:59:09'),(27,105,'origin','/attach/20170311/','1489215577.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215577.jpg','2017-03-11 15:59:37','2017-03-11 15:59:37'),(28,105,'origin','/attach/20170311/','1489215577_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215577_1.jpg','2017-03-11 15:59:37','2017-03-11 15:59:37'),(29,105,'origin','/attach/20170311/','1489215577_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215577_2.jpg','2017-03-11 15:59:37','2017-03-11 15:59:37'),(30,105,'origin','/attach/20170311/','1489215577_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215577_3.jpg','2017-03-11 15:59:37','2017-03-11 15:59:37'),(31,105,'origin','/attach/20170311/','1489215577_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215577_4.jpg','2017-03-11 15:59:37','2017-03-11 15:59:37'),(32,106,'origin','/attach/20170311/','1489215659.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215659.jpg','2017-03-11 16:00:59','2017-03-11 16:00:59'),(33,106,'origin','/attach/20170311/','1489215659_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215659_1.jpg','2017-03-11 16:00:59','2017-03-11 16:00:59'),(34,106,'origin','/attach/20170311/','1489215659_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215659_2.jpg','2017-03-11 16:00:59','2017-03-11 16:00:59'),(35,106,'origin','/attach/20170311/','1489215659_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215659_3.jpg','2017-03-11 16:00:59','2017-03-11 16:00:59'),(36,106,'origin','/attach/20170311/','1489215659_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215659_4.jpg','2017-03-11 16:00:59','2017-03-11 16:00:59'),(37,107,'origin','/attach/20170311/','1489215778.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215778.jpg','2017-03-11 16:02:58','2017-03-11 16:02:58'),(38,107,'origin','/attach/20170311/','1489215778_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215778_1.jpg','2017-03-11 16:02:58','2017-03-11 16:02:58'),(39,107,'origin','/attach/20170311/','1489215778_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215778_2.jpg','2017-03-11 16:02:58','2017-03-11 16:02:58'),(40,107,'origin','/attach/20170311/','1489215778_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215778_3.jpg','2017-03-11 16:02:58','2017-03-11 16:02:58'),(41,107,'origin','/attach/20170311/','1489215778_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215778_4.jpg','2017-03-11 16:02:58','2017-03-11 16:02:58'),(42,108,'origin','/attach/20170311/','1489215848.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215848.jpg','2017-03-11 16:04:08','2017-03-11 16:04:08'),(43,108,'origin','/attach/20170311/','1489215848_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215848_1.jpg','2017-03-11 16:04:08','2017-03-11 16:04:08'),(44,108,'origin','/attach/20170311/','1489215848_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215848_2.jpg','2017-03-11 16:04:08','2017-03-11 16:04:08'),(45,108,'origin','/attach/20170311/','1489215848_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215848_3.jpg','2017-03-11 16:04:08','2017-03-11 16:04:08'),(46,108,'origin','/attach/20170311/','1489215848_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215848_4.jpg','2017-03-11 16:04:08','2017-03-11 16:04:08'),(47,109,'origin','/attach/20170311/','1489215912.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215912.jpg','2017-03-11 16:05:13','2017-03-11 16:05:13'),(48,109,'origin','/attach/20170311/','1489215912_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215912_1.jpg','2017-03-11 16:05:13','2017-03-11 16:05:13'),(49,109,'origin','/attach/20170311/','1489215913.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215913.jpg','2017-03-11 16:05:13','2017-03-11 16:05:13'),(50,109,'origin','/attach/20170311/','1489215913_1.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215913_1.jpg','2017-03-11 16:05:13','2017-03-11 16:05:13'),(51,109,'origin','/attach/20170311/','1489215913_2.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489215913_2.jpg','2017-03-11 16:05:13','2017-03-11 16:05:13'),(52,110,'origin','/attach/20170311/','1489216244.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216244.jpg','2017-03-11 16:10:44','2017-03-11 16:10:44'),(53,110,'origin','/attach/20170311/','1489216244_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216244_1.jpg','2017-03-11 16:10:44','2017-03-11 16:10:44'),(54,110,'origin','/attach/20170311/','1489216244_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216244_2.jpg','2017-03-11 16:10:44','2017-03-11 16:10:44'),(55,110,'origin','/attach/20170311/','1489216244_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216244_3.jpg','2017-03-11 16:10:44','2017-03-11 16:10:44'),(56,110,'origin','/attach/20170311/','1489216244_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216244_4.jpg','2017-03-11 16:10:44','2017-03-11 16:10:44'),(57,111,'origin','/attach/20170311/','1489216397.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216397.jpg','2017-03-11 16:13:17','2017-03-11 16:13:17'),(58,111,'origin','/attach/20170311/','1489216397_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216397_1.jpg','2017-03-11 16:13:17','2017-03-11 16:13:17'),(59,111,'origin','/attach/20170311/','1489216397_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216397_2.jpg','2017-03-11 16:13:17','2017-03-11 16:13:17'),(60,111,'origin','/attach/20170311/','1489216397_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216397_3.jpg','2017-03-11 16:13:17','2017-03-11 16:13:17'),(61,111,'origin','/attach/20170311/','1489216397_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216397_4.jpg','2017-03-11 16:13:17','2017-03-11 16:13:17'),(62,112,'origin','/attach/20170311/','1489216419.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216419.jpg','2017-03-11 16:13:39','2017-03-11 16:13:39'),(63,112,'origin','/attach/20170311/','1489216419_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216419_1.jpg','2017-03-11 16:13:39','2017-03-11 16:13:39'),(64,112,'origin','/attach/20170311/','1489216419_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216419_2.jpg','2017-03-11 16:13:39','2017-03-11 16:13:39'),(65,112,'origin','/attach/20170311/','1489216419_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216419_3.jpg','2017-03-11 16:13:39','2017-03-11 16:13:39'),(66,112,'origin','/attach/20170311/','1489216419_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216419_4.jpg','2017-03-11 16:13:39','2017-03-11 16:13:39'),(67,113,'origin','/attach/20170311/','1489216484.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216484.jpg','2017-03-11 16:14:44','2017-03-11 16:14:44'),(68,113,'origin','/attach/20170311/','1489216484_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216484_1.jpg','2017-03-11 16:14:44','2017-03-11 16:14:44'),(69,113,'origin','/attach/20170311/','1489216484_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216484_2.jpg','2017-03-11 16:14:44','2017-03-11 16:14:44'),(70,113,'origin','/attach/20170311/','1489216484_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216484_3.jpg','2017-03-11 16:14:44','2017-03-11 16:14:44'),(71,113,'origin','/attach/20170311/','1489216484_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216484_4.jpg','2017-03-11 16:14:44','2017-03-11 16:14:44'),(72,114,'origin','/attach/20170311/','1489216539.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216539.jpg','2017-03-11 16:15:39','2017-03-11 16:15:39'),(73,114,'origin','/attach/20170311/','1489216539_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216539_1.jpg','2017-03-11 16:15:39','2017-03-11 16:15:39'),(74,114,'origin','/attach/20170311/','1489216539_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216539_2.jpg','2017-03-11 16:15:39','2017-03-11 16:15:39'),(75,114,'origin','/attach/20170311/','1489216539_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216539_3.jpg','2017-03-11 16:15:39','2017-03-11 16:15:39'),(76,114,'origin','/attach/20170311/','1489216539_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216539_4.jpg','2017-03-11 16:15:39','2017-03-11 16:15:39'),(77,115,'origin','/attach/20170311/','1489216600.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216600.jpg','2017-03-11 16:16:40','2017-03-11 16:16:40'),(78,115,'origin','/attach/20170311/','1489216600_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216600_1.jpg','2017-03-11 16:16:40','2017-03-11 16:16:40'),(79,115,'origin','/attach/20170311/','1489216600_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216600_2.jpg','2017-03-11 16:16:40','2017-03-11 16:16:40'),(80,115,'origin','/attach/20170311/','1489216600_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216600_3.jpg','2017-03-11 16:16:40','2017-03-11 16:16:40'),(81,115,'origin','/attach/20170311/','1489216600_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216600_4.jpg','2017-03-11 16:16:40','2017-03-11 16:16:40'),(82,116,'origin','/attach/20170311/','1489216981.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216981.jpg','2017-03-11 16:23:01','2017-03-11 16:23:01'),(83,116,'origin','/attach/20170311/','1489216981_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216981_1.jpg','2017-03-11 16:23:01','2017-03-11 16:23:01'),(84,116,'origin','/attach/20170311/','1489216981_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216981_2.jpg','2017-03-11 16:23:01','2017-03-11 16:23:01'),(85,116,'origin','/attach/20170311/','1489216981_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216981_3.jpg','2017-03-11 16:23:01','2017-03-11 16:23:01'),(86,116,'origin','/attach/20170311/','1489216981_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489216981_4.jpg','2017-03-11 16:23:01','2017-03-11 16:23:01'),(87,117,'origin','/attach/20170311/','1489217073.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217073.jpg','2017-03-11 16:24:33','2017-03-11 16:24:33'),(88,117,'origin','/attach/20170311/','1489217073_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217073_1.jpg','2017-03-11 16:24:33','2017-03-11 16:24:33'),(89,117,'origin','/attach/20170311/','1489217073_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217073_2.jpg','2017-03-11 16:24:33','2017-03-11 16:24:33'),(90,117,'origin','/attach/20170311/','1489217073_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217073_3.jpg','2017-03-11 16:24:33','2017-03-11 16:24:33'),(91,117,'origin','/attach/20170311/','1489217073_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217073_4.jpg','2017-03-11 16:24:33','2017-03-11 16:24:33'),(92,118,'origin','/attach/20170311/','1489217075.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217075.jpg','2017-03-11 16:24:36','2017-03-11 16:24:36'),(93,118,'origin','/attach/20170311/','1489217075_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217075_1.jpg','2017-03-11 16:24:36','2017-03-11 16:24:36'),(94,118,'origin','/attach/20170311/','1489217076.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217076.jpg','2017-03-11 16:24:36','2017-03-11 16:24:36'),(95,118,'origin','/attach/20170311/','1489217076_1.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217076_1.jpg','2017-03-11 16:24:36','2017-03-11 16:24:36'),(96,118,'origin','/attach/20170311/','1489217076_2.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217076_2.jpg','2017-03-11 16:24:36','2017-03-11 16:24:36'),(97,119,'origin','/attach/20170311/','1489217088.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217088.jpg','2017-03-11 16:24:48','2017-03-11 16:24:48'),(98,119,'origin','/attach/20170311/','1489217088_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217088_1.jpg','2017-03-11 16:24:48','2017-03-11 16:24:48'),(99,119,'origin','/attach/20170311/','1489217088_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217088_2.jpg','2017-03-11 16:24:48','2017-03-11 16:24:48'),(100,119,'origin','/attach/20170311/','1489217088_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217088_3.jpg','2017-03-11 16:24:48','2017-03-11 16:24:48'),(101,119,'origin','/attach/20170311/','1489217088_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217088_4.jpg','2017-03-11 16:24:48','2017-03-11 16:24:48'),(102,120,'origin','/attach/20170311/','1489217601.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217601.jpg','2017-03-11 16:33:21','2017-03-11 16:33:21'),(103,120,'origin','/attach/20170311/','1489217601_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217601_1.jpg','2017-03-11 16:33:21','2017-03-11 16:33:21'),(104,120,'origin','/attach/20170311/','1489217601_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217601_2.jpg','2017-03-11 16:33:21','2017-03-11 16:33:21'),(105,120,'origin','/attach/20170311/','1489217601_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217601_3.jpg','2017-03-11 16:33:21','2017-03-11 16:33:21'),(106,120,'origin','/attach/20170311/','1489217601_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217601_4.jpg','2017-03-11 16:33:21','2017-03-11 16:33:21'),(107,121,'origin','/attach/20170311/','1489217808.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217808.jpg','2017-03-11 16:36:49','2017-03-11 16:36:49'),(108,121,'origin','/attach/20170311/','1489217808_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217808_1.jpg','2017-03-11 16:36:49','2017-03-11 16:36:49'),(109,121,'origin','/attach/20170311/','1489217808_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217808_2.jpg','2017-03-11 16:36:49','2017-03-11 16:36:49'),(110,121,'origin','/attach/20170311/','1489217808_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217808_3.jpg','2017-03-11 16:36:49','2017-03-11 16:36:49'),(111,121,'origin','/attach/20170311/','1489217809.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217809.jpg','2017-03-11 16:36:49','2017-03-11 16:36:49'),(112,122,'origin','/attach/20170311/','1489217841.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217841.jpg','2017-03-11 16:37:21','2017-03-11 16:37:21'),(113,122,'origin','/attach/20170311/','1489217841_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217841_1.jpg','2017-03-11 16:37:21','2017-03-11 16:37:21'),(114,122,'origin','/attach/20170311/','1489217841_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217841_2.jpg','2017-03-11 16:37:21','2017-03-11 16:37:21'),(115,122,'origin','/attach/20170311/','1489217841_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217841_3.jpg','2017-03-11 16:37:21','2017-03-11 16:37:21'),(116,122,'origin','/attach/20170311/','1489217841_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489217841_4.jpg','2017-03-11 16:37:21','2017-03-11 16:37:21'),(117,123,'origin','/attach/20170311/','1489218048.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218048.jpg','2017-03-11 16:40:48','2017-03-11 16:40:48'),(118,123,'origin','/attach/20170311/','1489218048_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218048_1.jpg','2017-03-11 16:40:48','2017-03-11 16:40:48'),(119,123,'origin','/attach/20170311/','1489218048_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218048_2.jpg','2017-03-11 16:40:48','2017-03-11 16:40:48'),(120,123,'origin','/attach/20170311/','1489218048_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218048_3.jpg','2017-03-11 16:40:48','2017-03-11 16:40:48'),(121,123,'origin','/attach/20170311/','1489218048_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218048_4.jpg','2017-03-11 16:40:48','2017-03-11 16:40:48'),(122,124,'origin','/attach/20170311/','1489218106.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218106.jpg','2017-03-11 16:41:46','2017-03-11 16:41:46'),(123,124,'origin','/attach/20170311/','1489218106_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218106_1.jpg','2017-03-11 16:41:46','2017-03-11 16:41:46'),(124,124,'origin','/attach/20170311/','1489218106_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218106_2.jpg','2017-03-11 16:41:46','2017-03-11 16:41:46'),(125,124,'origin','/attach/20170311/','1489218106_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218106_3.jpg','2017-03-11 16:41:46','2017-03-11 16:41:46'),(126,124,'origin','/attach/20170311/','1489218106_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218106_4.jpg','2017-03-11 16:41:46','2017-03-11 16:41:46'),(127,125,'origin','/attach/20170311/','1489218155.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218155.jpg','2017-03-11 16:42:35','2017-03-11 16:42:35'),(128,125,'origin','/attach/20170311/','1489218155_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218155_1.jpg','2017-03-11 16:42:35','2017-03-11 16:42:35'),(129,125,'origin','/attach/20170311/','1489218155_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218155_2.jpg','2017-03-11 16:42:35','2017-03-11 16:42:35'),(130,125,'origin','/attach/20170311/','1489218155_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218155_3.jpg','2017-03-11 16:42:35','2017-03-11 16:42:35'),(131,125,'origin','/attach/20170311/','1489218155_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218155_4.jpg','2017-03-11 16:42:35','2017-03-11 16:42:35'),(132,126,'origin','/attach/20170311/','1489218478.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218478.jpg','2017-03-11 16:47:58','2017-03-11 16:47:58'),(133,126,'origin','/attach/20170311/','1489218478_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218478_1.jpg','2017-03-11 16:47:58','2017-03-11 16:47:58'),(134,126,'origin','/attach/20170311/','1489218478_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218478_2.jpg','2017-03-11 16:47:58','2017-03-11 16:47:58'),(135,126,'origin','/attach/20170311/','1489218478_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218478_3.jpg','2017-03-11 16:47:58','2017-03-11 16:47:58'),(136,126,'origin','/attach/20170311/','1489218478_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489218478_4.jpg','2017-03-11 16:47:58','2017-03-11 16:47:58'),(137,127,'origin','/attach/20170311/','1489219238.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219238.jpg','2017-03-11 17:00:38','2017-03-11 17:00:38'),(138,127,'origin','/attach/20170311/','1489219238_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219238_1.jpg','2017-03-11 17:00:38','2017-03-11 17:00:38'),(139,127,'origin','/attach/20170311/','1489219238_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219238_2.jpg','2017-03-11 17:00:38','2017-03-11 17:00:38'),(140,127,'origin','/attach/20170311/','1489219238_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219238_3.jpg','2017-03-11 17:00:38','2017-03-11 17:00:38'),(141,127,'origin','/attach/20170311/','1489219238_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219238_4.jpg','2017-03-11 17:00:38','2017-03-11 17:00:38'),(142,128,'origin','/attach/20170311/','1489219323.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219323.jpg','2017-03-11 17:02:03','2017-03-11 17:02:03'),(143,128,'origin','/attach/20170311/','1489219323_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219323_1.jpg','2017-03-11 17:02:03','2017-03-11 17:02:03'),(144,128,'origin','/attach/20170311/','1489219323_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219323_2.jpg','2017-03-11 17:02:03','2017-03-11 17:02:03'),(145,128,'origin','/attach/20170311/','1489219323_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219323_3.jpg','2017-03-11 17:02:03','2017-03-11 17:02:03'),(146,128,'origin','/attach/20170311/','1489219323_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219323_4.jpg','2017-03-11 17:02:03','2017-03-11 17:02:03'),(147,129,'origin','/attach/20170311/','1489219543.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219543.jpg','2017-03-11 17:05:43','2017-03-11 17:05:43'),(148,129,'origin','/attach/20170311/','1489219543_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219543_1.jpg','2017-03-11 17:05:43','2017-03-11 17:05:43'),(149,129,'origin','/attach/20170311/','1489219543_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219543_2.jpg','2017-03-11 17:05:43','2017-03-11 17:05:43'),(150,129,'origin','/attach/20170311/','1489219543_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219543_3.jpg','2017-03-11 17:05:43','2017-03-11 17:05:43'),(151,129,'origin','/attach/20170311/','1489219543_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219543_4.jpg','2017-03-11 17:05:43','2017-03-11 17:05:43'),(152,130,'origin','/attach/20170311/','1489219679.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219679.jpg','2017-03-11 17:07:59','2017-03-11 17:07:59'),(153,130,'origin','/attach/20170311/','1489219679_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219679_1.jpg','2017-03-11 17:07:59','2017-03-11 17:07:59'),(154,130,'origin','/attach/20170311/','1489219679_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219679_2.jpg','2017-03-11 17:07:59','2017-03-11 17:07:59'),(155,130,'origin','/attach/20170311/','1489219679_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219679_3.jpg','2017-03-11 17:07:59','2017-03-11 17:07:59'),(156,130,'origin','/attach/20170311/','1489219679_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219679_4.jpg','2017-03-11 17:07:59','2017-03-11 17:07:59'),(157,131,'origin','/attach/20170311/','1489219893.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219893.jpg','2017-03-11 17:11:33','2017-03-11 17:11:33'),(158,131,'origin','/attach/20170311/','1489219893_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219893_1.jpg','2017-03-11 17:11:33','2017-03-11 17:11:33'),(159,131,'origin','/attach/20170311/','1489219893_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219893_2.jpg','2017-03-11 17:11:33','2017-03-11 17:11:33'),(160,131,'origin','/attach/20170311/','1489219893_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219893_3.jpg','2017-03-11 17:11:33','2017-03-11 17:11:33'),(161,131,'origin','/attach/20170311/','1489219893_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489219893_4.jpg','2017-03-11 17:11:33','2017-03-11 17:11:33'),(162,132,'origin','/attach/20170311/','1489220139.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220139.jpg','2017-03-11 17:15:39','2017-03-11 17:15:39'),(163,132,'origin','/attach/20170311/','1489220139_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220139_1.jpg','2017-03-11 17:15:39','2017-03-11 17:15:39'),(164,132,'origin','/attach/20170311/','1489220139_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220139_2.jpg','2017-03-11 17:15:39','2017-03-11 17:15:39'),(165,132,'origin','/attach/20170311/','1489220139_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220139_3.jpg','2017-03-11 17:15:39','2017-03-11 17:15:39'),(166,132,'origin','/attach/20170311/','1489220139_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220139_4.jpg','2017-03-11 17:15:39','2017-03-11 17:15:39'),(167,133,'origin','/attach/20170311/','1489220491.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220491.jpg','2017-03-11 17:21:31','2017-03-11 17:21:31'),(168,133,'origin','/attach/20170311/','1489220491_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220491_1.jpg','2017-03-11 17:21:31','2017-03-11 17:21:31'),(169,133,'origin','/attach/20170311/','1489220491_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220491_2.jpg','2017-03-11 17:21:31','2017-03-11 17:21:31'),(170,133,'origin','/attach/20170311/','1489220491_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220491_3.jpg','2017-03-11 17:21:31','2017-03-11 17:21:31'),(171,133,'origin','/attach/20170311/','1489220491_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220491_4.jpg','2017-03-11 17:21:31','2017-03-11 17:21:31'),(172,134,'origin','/attach/20170311/','1489220550.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220550.jpg','2017-03-11 17:22:30','2017-03-11 17:22:30'),(173,134,'origin','/attach/20170311/','1489220550_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220550_1.jpg','2017-03-11 17:22:30','2017-03-11 17:22:30'),(174,134,'origin','/attach/20170311/','1489220550_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220550_2.jpg','2017-03-11 17:22:30','2017-03-11 17:22:30'),(175,134,'origin','/attach/20170311/','1489220550_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220550_3.jpg','2017-03-11 17:22:30','2017-03-11 17:22:30'),(176,134,'origin','/attach/20170311/','1489220550_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220550_4.jpg','2017-03-11 17:22:30','2017-03-11 17:22:30'),(177,135,'origin','/attach/20170311/','1489220619.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220619.jpg','2017-03-11 17:23:39','2017-03-11 17:23:39'),(178,135,'origin','/attach/20170311/','1489220619_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220619_1.jpg','2017-03-11 17:23:39','2017-03-11 17:23:39'),(179,135,'origin','/attach/20170311/','1489220619_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220619_2.jpg','2017-03-11 17:23:39','2017-03-11 17:23:39'),(180,135,'origin','/attach/20170311/','1489220619_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220619_3.jpg','2017-03-11 17:23:39','2017-03-11 17:23:39'),(181,135,'origin','/attach/20170311/','1489220619_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489220619_4.jpg','2017-03-11 17:23:39','2017-03-11 17:23:39'),(182,135,'thumb','/attach/20170311/Thumbnail/','1489220619.jpg','image/jpeg',4083,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/Thumbnail/1489220619.jpg','2017-03-11 17:23:41','2017-03-11 17:23:41'),(188,136,'origin','/attach/20170311/','1489222517.jpg','image/jpeg',1299525,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489222517.jpg','2017-03-11 17:55:17','2017-03-11 17:55:17'),(189,136,'origin','/attach/20170311/','1489222517_1.jpg','image/jpeg',927440,'12-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489222517_1.jpg','2017-03-11 17:55:17','2017-03-11 17:55:17'),(190,136,'origin','/attach/20170311/','1489222517_2.jpg','image/jpeg',1678392,'13-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489222517_2.jpg','2017-03-11 17:55:17','2017-03-11 17:55:17'),(191,136,'origin','/attach/20170311/','1489222517_3.jpg','image/jpeg',890403,'14-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489222517_3.jpg','2017-03-11 17:55:17','2017-03-11 17:55:17'),(192,136,'origin','/attach/20170311/','1489222517_4.jpg','image/jpeg',1247593,'15-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/1489222517_4.jpg','2017-03-11 17:55:17','2017-03-11 17:55:17'),(193,136,'thumb','/attach/20170311/Thumbnail/','1489222517.jpg','image/jpeg',4083,'11-min.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20170311/Thumbnail/1489222517.jpg','2017-03-11 17:55:18','2017-03-11 17:55:18');
/*!40000 ALTER TABLE `bbs_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbs_group`
--

DROP TABLE IF EXISTS `bbs_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bbs_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bo_group_id` varchar(50) NOT NULL COMMENT '게시판 그룹 이름 (영문)',
  `bo_group_name` varchar(50) NOT NULL COMMENT '게시판 그룹 이름 (영문/한글)',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='게시판 메인 그룹 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbs_group`
--

LOCK TABLES `bbs_group` WRITE;
/*!40000 ALTER TABLE `bbs_group` DISABLE KEYS */;
INSERT INTO `bbs_group` VALUES (1,'fortpolio','포트폴리오','2016-04-25 14:39:01','2016-04-25 14:39:01'),(2,'poetry','詩집','2016-04-25 14:39:01','2016-04-25 14:39:01'),(3,'study','스터디','2016-04-25 14:39:01','2016-04-25 14:39:01'),(4,'pds','자료실','2016-04-25 14:39:01','2016-04-25 14:39:01'),(5,'bbs','게시판','2016-04-25 14:39:01','2016-04-25 14:39:01'),(6,'secret_bbs','비밀자료실','2016-04-25 14:39:01','2016-04-25 14:39:01');
/*!40000 ALTER TABLE `bbs_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_manual`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_manual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_manual` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_3d_maya_manual_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_manual`
--

LOCK TABLES `bo_table_3d_maya_manual` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_manual` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_manual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_manual_comments`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_manual_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_manual_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_manual_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_manual` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_manual_comments`
--

LOCK TABLES `bo_table_3d_maya_manual_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_manual_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_manual_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_manual_files`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_manual_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_manual_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_manual_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_manual` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_manual_files`
--

LOCK TABLES `bo_table_3d_maya_manual_files` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_manual_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_manual_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_portfolio`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_3d_maya_portfolio_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_portfolio`
--

LOCK TABLES `bo_table_3d_maya_portfolio` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_portfolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_portfolio_comments`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_portfolio_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_portfolio_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_portfolio_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_portfolio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_portfolio_comments`
--

LOCK TABLES `bo_table_3d_maya_portfolio_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_portfolio_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_portfolio_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_portfolio_files`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_portfolio_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_portfolio_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_portfolio_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_portfolio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_portfolio_files`
--

LOCK TABLES `bo_table_3d_maya_portfolio_files` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_portfolio_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_portfolio_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_qna`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_qna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_qna` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_3d_maya_qna_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_qna`
--

LOCK TABLES `bo_table_3d_maya_qna` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_qna` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_qna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_qna_comments`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_qna_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_qna_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_qna_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_qna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_qna_comments`
--

LOCK TABLES `bo_table_3d_maya_qna_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_qna_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_qna_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_qna_files`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_qna_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_qna_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_qna_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_qna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_qna_files`
--

LOCK TABLES `bo_table_3d_maya_qna_files` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_qna_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_qna_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_tip`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_tip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_tip` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_3d_maya_tip_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_tip`
--

LOCK TABLES `bo_table_3d_maya_tip` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_tip` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_tip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_tip_comments`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_tip_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_tip_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_tip_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_tip` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_tip_comments`
--

LOCK TABLES `bo_table_3d_maya_tip_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_tip_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_tip_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_tip_files`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_tip_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_tip_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_tip_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_tip` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_tip_files`
--

LOCK TABLES `bo_table_3d_maya_tip_files` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_tip_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_tip_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_tutorial`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_tutorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_3d_maya_tutorial_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_tutorial`
--

LOCK TABLES `bo_table_3d_maya_tutorial` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_tutorial` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_tutorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_tutorial_comments`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_tutorial_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_tutorial_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_tutorial_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_tutorial` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_tutorial_comments`
--

LOCK TABLES `bo_table_3d_maya_tutorial_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_tutorial_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_tutorial_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_3d_maya_tutorial_files`
--

DROP TABLE IF EXISTS `bo_table_3d_maya_tutorial_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_3d_maya_tutorial_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_3d_maya_tutorial_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_3d_maya_tutorial` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_3d_maya_tutorial_files`
--

LOCK TABLES `bo_table_3d_maya_tutorial_files` WRITE;
/*!40000 ALTER TABLE `bo_table_3d_maya_tutorial_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_3d_maya_tutorial_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_portfolio`
--

DROP TABLE IF EXISTS `bo_table_ai_portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_ai_portfolio_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_portfolio`
--

LOCK TABLES `bo_table_ai_portfolio` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_portfolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_portfolio_comments`
--

DROP TABLE IF EXISTS `bo_table_ai_portfolio_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_portfolio_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ai_portfolio_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ai_portfolio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_portfolio_comments`
--

LOCK TABLES `bo_table_ai_portfolio_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_portfolio_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_portfolio_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_portfolio_files`
--

DROP TABLE IF EXISTS `bo_table_ai_portfolio_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_portfolio_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ai_portfolio_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ai_portfolio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_portfolio_files`
--

LOCK TABLES `bo_table_ai_portfolio_files` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_portfolio_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_portfolio_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_qna`
--

DROP TABLE IF EXISTS `bo_table_ai_qna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_qna` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_ai_qna_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_qna`
--

LOCK TABLES `bo_table_ai_qna` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_qna` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_qna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_qna_comments`
--

DROP TABLE IF EXISTS `bo_table_ai_qna_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_qna_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ai_qna_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ai_qna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_qna_comments`
--

LOCK TABLES `bo_table_ai_qna_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_qna_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_qna_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_qna_files`
--

DROP TABLE IF EXISTS `bo_table_ai_qna_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_qna_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ai_qna_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ai_qna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_qna_files`
--

LOCK TABLES `bo_table_ai_qna_files` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_qna_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_qna_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_tip`
--

DROP TABLE IF EXISTS `bo_table_ai_tip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_tip` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_ai_tip_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_tip`
--

LOCK TABLES `bo_table_ai_tip` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_tip` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_tip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_tip_comments`
--

DROP TABLE IF EXISTS `bo_table_ai_tip_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_tip_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ai_tip_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ai_tip` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_tip_comments`
--

LOCK TABLES `bo_table_ai_tip_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_tip_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_tip_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_tip_files`
--

DROP TABLE IF EXISTS `bo_table_ai_tip_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_tip_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ai_tip_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ai_tip` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_tip_files`
--

LOCK TABLES `bo_table_ai_tip_files` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_tip_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_tip_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_tutorial`
--

DROP TABLE IF EXISTS `bo_table_ai_tutorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_ai_tutorial_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_tutorial`
--

LOCK TABLES `bo_table_ai_tutorial` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_tutorial` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_tutorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_tutorial_comments`
--

DROP TABLE IF EXISTS `bo_table_ai_tutorial_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_tutorial_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ai_tutorial_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ai_tutorial` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_tutorial_comments`
--

LOCK TABLES `bo_table_ai_tutorial_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_tutorial_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_tutorial_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ai_tutorial_files`
--

DROP TABLE IF EXISTS `bo_table_ai_tutorial_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ai_tutorial_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ai_tutorial_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ai_tutorial` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ai_tutorial_files`
--

LOCK TABLES `bo_table_ai_tutorial_files` WRITE;
/*!40000 ALTER TABLE `bo_table_ai_tutorial_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ai_tutorial_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_angularjs`
--

DROP TABLE IF EXISTS `bo_table_angularjs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_angularjs` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_angularjs_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_angularjs`
--

LOCK TABLES `bo_table_angularjs` WRITE;
/*!40000 ALTER TABLE `bo_table_angularjs` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_angularjs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_angularjs_comments`
--

DROP TABLE IF EXISTS `bo_table_angularjs_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_angularjs_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_angularjs_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_angularjs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_angularjs_comments`
--

LOCK TABLES `bo_table_angularjs_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_angularjs_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_angularjs_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_angularjs_files`
--

DROP TABLE IF EXISTS `bo_table_angularjs_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_angularjs_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_angularjs_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_angularjs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_angularjs_files`
--

LOCK TABLES `bo_table_angularjs_files` WRITE;
/*!40000 ALTER TABLE `bo_table_angularjs_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_angularjs_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_asp_artiboard`
--

DROP TABLE IF EXISTS `bo_table_asp_artiboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_asp_artiboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_asp_artiboard_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_asp_artiboard`
--

LOCK TABLES `bo_table_asp_artiboard` WRITE;
/*!40000 ALTER TABLE `bo_table_asp_artiboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_asp_artiboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_asp_artiboard_comments`
--

DROP TABLE IF EXISTS `bo_table_asp_artiboard_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_asp_artiboard_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_asp_artiboard_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_asp_artiboard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_asp_artiboard_comments`
--

LOCK TABLES `bo_table_asp_artiboard_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_asp_artiboard_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_asp_artiboard_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_asp_artiboard_files`
--

DROP TABLE IF EXISTS `bo_table_asp_artiboard_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_asp_artiboard_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_asp_artiboard_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_asp_artiboard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_asp_artiboard_files`
--

LOCK TABLES `bo_table_asp_artiboard_files` WRITE;
/*!40000 ALTER TABLE `bo_table_asp_artiboard_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_asp_artiboard_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_asp_aspnet`
--

DROP TABLE IF EXISTS `bo_table_asp_aspnet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_asp_aspnet` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_asp_aspnet_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_asp_aspnet`
--

LOCK TABLES `bo_table_asp_aspnet` WRITE;
/*!40000 ALTER TABLE `bo_table_asp_aspnet` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_asp_aspnet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_asp_aspnet_comments`
--

DROP TABLE IF EXISTS `bo_table_asp_aspnet_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_asp_aspnet_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_asp_aspnet_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_asp_aspnet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_asp_aspnet_comments`
--

LOCK TABLES `bo_table_asp_aspnet_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_asp_aspnet_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_asp_aspnet_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_asp_aspnet_files`
--

DROP TABLE IF EXISTS `bo_table_asp_aspnet_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_asp_aspnet_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_asp_aspnet_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_asp_aspnet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_asp_aspnet_files`
--

LOCK TABLES `bo_table_asp_aspnet_files` WRITE;
/*!40000 ALTER TABLE `bo_table_asp_aspnet_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_asp_aspnet_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_blog`
--

DROP TABLE IF EXISTS `bo_table_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) NOT NULL COMMENT '카테고리(| 로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_blog_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_blog`
--

LOCK TABLES `bo_table_blog` WRITE;
/*!40000 ALTER TABLE `bo_table_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_blog_comments`
--

DROP TABLE IF EXISTS `bo_table_blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_blog_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_blog_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_blog` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_blog_comments`
--

LOCK TABLES `bo_table_blog_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_blog_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_blog_files`
--

DROP TABLE IF EXISTS `bo_table_blog_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_blog_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_blog_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_blog` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_blog_files`
--

LOCK TABLES `bo_table_blog_files` WRITE;
/*!40000 ALTER TABLE `bo_table_blog_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_blog_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_css`
--

DROP TABLE IF EXISTS `bo_table_html_css`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_css` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_html_css_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_css`
--

LOCK TABLES `bo_table_html_css` WRITE;
/*!40000 ALTER TABLE `bo_table_html_css` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_html_css` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_css_comments`
--

DROP TABLE IF EXISTS `bo_table_html_css_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_css_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_html_css_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_html_css` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_css_comments`
--

LOCK TABLES `bo_table_html_css_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_html_css_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_html_css_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_css_files`
--

DROP TABLE IF EXISTS `bo_table_html_css_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_css_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_html_css_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_html_css` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_css_files`
--

LOCK TABLES `bo_table_html_css_files` WRITE;
/*!40000 ALTER TABLE `bo_table_html_css_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_html_css_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_entity_code`
--

DROP TABLE IF EXISTS `bo_table_html_entity_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_entity_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_html_entity_code_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_entity_code`
--

LOCK TABLES `bo_table_html_entity_code` WRITE;
/*!40000 ALTER TABLE `bo_table_html_entity_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_html_entity_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_entity_code_comments`
--

DROP TABLE IF EXISTS `bo_table_html_entity_code_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_entity_code_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_html_entity_code_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_html_entity_code` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_entity_code_comments`
--

LOCK TABLES `bo_table_html_entity_code_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_html_entity_code_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_html_entity_code_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_entity_code_files`
--

DROP TABLE IF EXISTS `bo_table_html_entity_code_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_entity_code_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_html_entity_code_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_html_entity_code` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_entity_code_files`
--

LOCK TABLES `bo_table_html_entity_code_files` WRITE;
/*!40000 ALTER TABLE `bo_table_html_entity_code_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_html_entity_code_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_tag`
--

DROP TABLE IF EXISTS `bo_table_html_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_html_tag_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_tag`
--

LOCK TABLES `bo_table_html_tag` WRITE;
/*!40000 ALTER TABLE `bo_table_html_tag` DISABLE KEYS */;
INSERT INTO `bo_table_html_tag` VALUES (1,10,'html_tag',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','&lt;A&gt;...&lt;/A&gt;\r\n         ','\r\n            <h5 class=\"col-md-12 alert alert-danger\">&lt;A&gt;링크 제목글 또는 이미지&lt;/A&gt;</h5>\r\n            <div class=\"contentsd-explanation\">\r\n             <ul class=\"right-padding-20\">\r\n               <li class=\"col-md-12\">\r\n                  <img src=\"/assets/frontend/layout/img/html.jpg\" class=\"img-responsive\" />\r\n               </li>\r\n               <h4 class=\"col-md-3 alert alert-info text-center\">\r\n                  속성\r\n                </h4>\r\n               <h4 class=\"col-md-9 alert alert-info text-center\">\r\n                  설명\r\n                </h4>\r\n             </ul>\r\n             <ul class=\"right-padding-20\">\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    href=\"URL\"\r\n                  </div>\r\n                  <div class=\"col-md-9\">\r\n                    하이퍼링크로 호출되는 파일\r\n                  </div>\r\n                </li>\r\n               \r\n                <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    name=\"이름\"\r\n                 </div>\r\n                  <div class=\"col-md-9\">\r\n                    중간 부분을 지정하기 위한 html 도큐먼트 부분 명명. 이 이름은 또 다른 &lt;A&gt;태그의 href= 속성에 사용될 수 있다.\r\n                 </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    target=\"\"\r\n                 </div>\r\n                  <div class=\"col-md-9\">\r\n                    \"프레임 이름 또는 윈도우\"<br />\r\n                   프레임과 함께 사용되는 파일이 디스플레이되어야 할 프레임이나 윈도우를 나타냄\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    _blank\r\n                  </div>\r\n                  <div class=\"col-md-9\">\r\n                    새창 띄우기\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    _parent\r\n                 </div>\r\n                  <div class=\"col-md-9\">\r\n                    프레임에서 바로 전 창으로 돌아감\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    _self\r\n                 </div>\r\n                  <div class=\"col-md-9\">\r\n                    현제 창 또는 현제 프레임\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    _top\r\n                  </div>\r\n                  <div class=\"col-md-9\">\r\n                    프레임으로 제작시 가장 최상위 창이 바뀜\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-12 note note-default non-bottom-margin\">\r\n                   위 그림에서 보면 left.html과 content.html 파일이 bottom.html 파일안에서 돌아가고 bottom.html과 top.html은 index.html안에서 돌아간다\r\n                  </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-12 note note-default non-bottom-margin\">\r\n                   _parent와 _top은 이런 식의 프레임 홈페이지에 많이 쓰이는데 _parent는 한단계 전, _top은 최상의의 파일을 바꿔준다.<br />\r\n                   즉 초록색 안에서 _parent를 타겟으로 지정하면 bottom.html 전체가 바뀌게 되고 똑같이 초록색 안이지만 _top을 타겟으로 지정하면 index.html 전체가 바뀌게 된다.\r\n                 </div>\r\n                </li>\r\n               <li class=\"col-md-12\">\r\n                  <div class=\"col-md-3\">\r\n                    사용 예\r\n                  </div>\r\n                  <div class=\"col-md-9\">\r\n                    &lt;A href=\"http://www.naver.com\" target=\"_balnk\"&gt;네이버 새창&lt;/A&gt;<br />\r\n                   &lt;A href=\"http://www.naver.com\" target=\"_self\"&gt;네이버 현제창&lt;/A&gt;<br /><br />\r\n                   \r\n                    &lt;A name=\"gogo\" target=\"_self\"&gt;책갈피&lt;/A&gt;<br />\r\n                   &lt;A href=\"#gogo\" target=\"_self\"&gt;클릭하면 책갈피로 이동합니다&lt;/A&gt;\r\n                  </div>\r\n                </li>\r\n             </ul>\r\n           </div>\r\n          ','left','b',193,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(2,10,'html_tag',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','&lt;APPLET&gt;...&lt;/APPLET&gt;','<div class=\"row\">\r\n<h5 class=\"col-md-12 alert alert-danger\">페이지에 자바 애플릿을 삽입</h5>\r\n<div class=\"contentsd-explanation\">\r\n<ul class=\"right-padding-20\">\r\n<h4 class=\"col-md-3 alert alert-info text-center\">속성 </h4>         <h4 class=\"col-md-9 alert alert-info text-center\">설명</h4>         <li class=\"col-md-12\">            <div class=\"col-md-3\">align=\"\"</div>          <div class=\"col-md-9\">            \"left\" , \"right\" , \"top\" , \"middle\" \"bottom\"<br />                    에플릿의 출력 내용이 윈도우에 정렬되는 상태          </div>\r\n</li>\r\n<li class=\"col-md-12\">                 <div class=\"col-md-3\">\r\nlt=\"텍스트\"\r\n</div>\r\n<div class=\"col-md-9\">\r\n애플릿이 제대로 로드되지 않을 경우에 표시되는 텍스트\r\n</div>\r\n</li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\ncode=\"URL\"\r\n</div>\r\n<div class=\"col-md-9\">\r\n자바 애플릿의 이름\r\n</div>\r\n</li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\ncodebase=\"URL\"\r\n</div>\r\n<div class=\"col-md-9\">\r\n에플릿이 저장되어 있는 디렉토리\r\n</div>\r\n</li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\nheight=수치,width=수치\r\n</div>\r\n<div class=\"col-md-9\">\r\n애플릿의 출력 내용의 가로와 세로의 크기(pixel 딘위 - ex : width: 300 height: 200 - 가로 300픽셀 세로 200픽셀)               </div>              </li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\nhspace=수치, vspace=수치\r\n</div>\r\n<div class=\"col-md-9\">\r\n애플릿과 그 주변 텍스트 사이의 가로와 세로 공간으로, 픽셀값으로 나타냄\r\n</div>\r\n</li>\r\n<li class=\"col-md-12\">\r\n<div class=\"col-md-3\">\r\nname=명칭\r\n</div>\r\n<div class=\"col-md-9\">\r\n페이지상의 다른 에플릿들이 이 에플릿을 참조할 수 있는 이름\r\n</div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n','left','b',136,'2016-04-25 14:49:39','2016-04-25 14:49:39');
/*!40000 ALTER TABLE `bo_table_html_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_tag_comments`
--

DROP TABLE IF EXISTS `bo_table_html_tag_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_tag_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_html_tag_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_html_tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_tag_comments`
--

LOCK TABLES `bo_table_html_tag_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_html_tag_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_html_tag_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_html_tag_files`
--

DROP TABLE IF EXISTS `bo_table_html_tag_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_html_tag_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_html_tag_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_html_tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_html_tag_files`
--

LOCK TABLES `bo_table_html_tag_files` WRITE;
/*!40000 ALTER TABLE `bo_table_html_tag_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_html_tag_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_javascript`
--

DROP TABLE IF EXISTS `bo_table_javascript`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_javascript` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_javascript_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_javascript`
--

LOCK TABLES `bo_table_javascript` WRITE;
/*!40000 ALTER TABLE `bo_table_javascript` DISABLE KEYS */;
INSERT INTO `bo_table_javascript` VALUES (1,13,'javascript',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','jQuery 시작하기 1편 - jQuery 파일 불러오기','text:jQuery 를 사용하기 앞서 작업을 위한 폴더를 만들어보자\r\n폴더 이름은 jquery-study 라는 폴더를 만들었다.\r\n이제 이 안에 html 문서를 생성하자\r\nindex.html 이라는 문서를 생성하고 그 안으로 들어가서 코딩을 시작해 본다.\r\n에디터를 열고 index.html 파일을 열어보자.\r\n\r\n*** 참고 \r\n기본 코딩에 대한 팁(?)\r\n모든 언어는 HTML 포함 여는 곳이 있으면 닫는 곳 있다.\r\n물론 HTML은 그렇지 않은 태그문(예를 들면 img, br)이 존재하지만 기본적으로는 그렇다.\r\n항상 바깥쪽을 열고 닫기를 먼저 하고 안으로 들어와 열고 닫기를 잘 해줘야 나중에 햇갈리거나 괄호가 꼬이는것을 방지할 수 있다.\r\n\r\njQuery 를 사용하기 위해서는 기본적으로 jQuery js 문서를 로드하여야 한다.\r\njQuery 문서를 로드하는 방법은 script 태그로 외부 jQuery js 문서를 로드해야 한다.\r\n1. 외부 사이트에서 직접 불러오는 방법-|-\r\ncode:&lt;script type=“text/javascript” src=“http://code.jquery.com/jquery.min.js”&gt;&lt;/script&gt;-|-\r\ntext:2. 내 사이트 내에 js문서를 저장하여 불러오는 방법-|-\r\ncode:&lt;script type=“text/javascript” src=“만든 폴더/jquery.min.js”&gt;&lt;/script&gt;-|-\r\ntext:먼저 jQuery 문서를 다운로드 한다.\r\njQuery 문서를 다운로드 하는 곳-|-\r\nlinkUrl:https://jquery.com/download/-|-\r\ntext:이 사이트에서 보면 \r\nDownload the compressed, production jQuery 1.11.3\r\nDownload the uncompressed, development jQuery 1.11.3\r\n위 두가지중에 하나로 사용한다.(버전은 업그레이드 되었을 시 바뀔 수도 있다.)-|-\r\n\r\ntext:Download the compressed, production jQuery 1.11.3 : 이 js 파일은 내용이 압축된 파일이다.\r\n일반적인 프론트 엔드 개발자 및 퍼블리셔가 많이 사용하는 파일.\r\nDownload the uncompressed, development jQuery 1.11.3 : 이 js 파일은 개발자가 변경 가능하도록 압축되지 않은 파일이다.\r\n기본적으로 두가지 파일 모두 내용은 동일하다.\r\njQuery 파일 또는 jQuery 플러그인 파일은 개발자 버전인지 아니면 압축 파일인지를 알기 쉽도록 파일 이름에 규칙이 있다.\r\njQuery js -|-\r\n\r\ntext:파일의 예)\r\njquery.min.js 파일 : 압축된 파일\r\njquery.js 파일 : 압축되지 않은 개발자 버전의 파일-|-\r\n\r\ntext:jQuery 를 개발할 것이 아니므로 Download the compressed, production jQuery 1.11.3 을 다운로드 해보자\r\n&lt;a href=\"https://jquery.com/download/\" target=\"_blank\"&gt;https://jquery.com/download/&lt;/a&gt; 에서 Download the compressed, production jQuery 1.11.3 이라는 곳을 클릭하면 query-1.11.3.min.js 파일을 다운로드 할 수 있다\r\n브라우저에 따라 다운 로드 하려는 문서가 다운로드가 되지 않고 웹 페이지처럼 뜨는 경우가 있는데 당황하지 말고 저장 (윈도우 : Ctrl + s, 맥 : Command + s)하면 된다-|-\r\n\r\ntext:이제 다운 받은 jquery 문서를 앞으로  jquery-study 폴더안에 js 라는 폴더를 생성하고 그 안에 다운받은 jquery js 문서를 넣고 로드 해보자\r\n방식은 외부 사이트에서 직접 로드하는 방식과 동일하다.-|-\r\ncode:&lt;script type=“text/javascript” src=“js/jquery-1.11.3.min.js”&gt;&lt;/script&gt;-|-\r\ntext:앞서 하는 로드 방식과 다른점이 있을까?-|-\r\n\r\ntext:있다.\r\n첫번째 방법으로 로드하는 경우 간혹 가다가 웹 속도가 느린곳에서는 외부 로드가 잘 이루어 지지 않아 사이트가 초반에 단 몇초간이라도 정상작동이 되지 않는 경우가 발생할 수 있다.\r\n','right','b',142,'2016-05-08 13:51:27','2016-05-08 18:11:21'),(2,13,'javascript',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','jQuery 시작하기 2편 - 시작과 끝','text:처음에 한데로 jquery를 불러왔다면 이제는 웹 문서내에 사용하기 위해 jquery를 선언하고 사용해보자.\r\n선언하는 방법은 4가지 방법이 있다.-|-\r\n\r\n\r\ntext:jQuery 선언방식 1-|-\r\n\r\ncode:(function() {\r\n	실행될 내용\r\n}) (jQuery);-|-\r\n\r\ntext:jQuery 선언방식 2-|-\r\ncode:jQuery(document).ready(function() {\r\n	실행될 내용\r\n});-|-\r\n\r\ntext:jQuery 선언방식 3-|-\r\ncode:$(document).ready(function() {\r\n	실행될 내용\r\n});-|-\r\n\r\ntext:jQuery 선언방식 4-|-\r\ncode:$(function() {\r\n	실행될 내용\r\n});-|-\r\n\r\ntext:위 4가지 방식 모두 정상적으로 동작한다.\r\n위 jQuery 안에 동작할 내용을 작성한다.\r\n위 내용을 설명하자면 웹 브라우저가 실행되고 브라우저 내에 html 문서가 모두 로드 된 다음에 안의 내용이 실행되는 방식이다.\r\njQuery는 기본적으로 함수로 시작해서 ( $(function() { …  함수가 끝나는 부분 ( }); )에서 끝이난다.\r\n함수로 감싸는 이유는 한번 사용하고 버릴게 아니라 브라우저 내에서 동작하는 페이지내에 있는 jQuery 를 여러번 재활용해서 사용 할 수 있도록 하기 위해서이다.\r\n','right','b',21,'2016-05-08 18:18:22','2016-05-08 18:26:35');
/*!40000 ALTER TABLE `bo_table_javascript` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_javascript_comments`
--

DROP TABLE IF EXISTS `bo_table_javascript_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_javascript_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_javascript_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_javascript` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_javascript_comments`
--

LOCK TABLES `bo_table_javascript_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_javascript_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_javascript_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_javascript_files`
--

DROP TABLE IF EXISTS `bo_table_javascript_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_javascript_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_javascript_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_javascript` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_javascript_files`
--

LOCK TABLES `bo_table_javascript_files` WRITE;
/*!40000 ALTER TABLE `bo_table_javascript_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_javascript_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_jsp`
--

DROP TABLE IF EXISTS `bo_table_jsp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_jsp` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_jsp_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_jsp`
--

LOCK TABLES `bo_table_jsp` WRITE;
/*!40000 ALTER TABLE `bo_table_jsp` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_jsp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_jsp_comments`
--

DROP TABLE IF EXISTS `bo_table_jsp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_jsp_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_jsp_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_jsp` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_jsp_comments`
--

LOCK TABLES `bo_table_jsp_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_jsp_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_jsp_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_jsp_files`
--

DROP TABLE IF EXISTS `bo_table_jsp_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_jsp_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_jsp_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_jsp` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_jsp_files`
--

LOCK TABLES `bo_table_jsp_files` WRITE;
/*!40000 ALTER TABLE `bo_table_jsp_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_jsp_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_linux`
--

DROP TABLE IF EXISTS `bo_table_linux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_linux` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_linux_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_linux`
--

LOCK TABLES `bo_table_linux` WRITE;
/*!40000 ALTER TABLE `bo_table_linux` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_linux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_linux_comments`
--

DROP TABLE IF EXISTS `bo_table_linux_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_linux_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_linux_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_linux` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_linux_comments`
--

LOCK TABLES `bo_table_linux_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_linux_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_linux_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_linux_files`
--

DROP TABLE IF EXISTS `bo_table_linux_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_linux_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_linux_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_linux` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_linux_files`
--

LOCK TABLES `bo_table_linux_files` WRITE;
/*!40000 ALTER TABLE `bo_table_linux_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_linux_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_mysql`
--

DROP TABLE IF EXISTS `bo_table_mysql`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_mysql` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_mysql_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_mysql`
--

LOCK TABLES `bo_table_mysql` WRITE;
/*!40000 ALTER TABLE `bo_table_mysql` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_mysql` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_mysql_comments`
--

DROP TABLE IF EXISTS `bo_table_mysql_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_mysql_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_mysql_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_mysql` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_mysql_comments`
--

LOCK TABLES `bo_table_mysql_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_mysql_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_mysql_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_mysql_files`
--

DROP TABLE IF EXISTS `bo_table_mysql_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_mysql_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_mysql_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_mysql` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_mysql_files`
--

LOCK TABLES `bo_table_mysql_files` WRITE;
/*!40000 ALTER TABLE `bo_table_mysql_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_mysql_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_nodejs`
--

DROP TABLE IF EXISTS `bo_table_nodejs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_nodejs` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_nodejs_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_nodejs`
--

LOCK TABLES `bo_table_nodejs` WRITE;
/*!40000 ALTER TABLE `bo_table_nodejs` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_nodejs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_nodejs_comments`
--

DROP TABLE IF EXISTS `bo_table_nodejs_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_nodejs_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_nodejs_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_nodejs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_nodejs_comments`
--

LOCK TABLES `bo_table_nodejs_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_nodejs_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_nodejs_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_nodejs_files`
--

DROP TABLE IF EXISTS `bo_table_nodejs_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_nodejs_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_nodejs_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_nodejs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_nodejs_files`
--

LOCK TABLES `bo_table_nodejs_files` WRITE;
/*!40000 ALTER TABLE `bo_table_nodejs_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_nodejs_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_gnuboard`
--

DROP TABLE IF EXISTS `bo_table_php_gnuboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_gnuboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_php_gnuboard_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_gnuboard`
--

LOCK TABLES `bo_table_php_gnuboard` WRITE;
/*!40000 ALTER TABLE `bo_table_php_gnuboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_gnuboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_gnuboard_comments`
--

DROP TABLE IF EXISTS `bo_table_php_gnuboard_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_gnuboard_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_php_gnuboard_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_php_gnuboard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_gnuboard_comments`
--

LOCK TABLES `bo_table_php_gnuboard_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_php_gnuboard_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_gnuboard_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_gnuboard_files`
--

DROP TABLE IF EXISTS `bo_table_php_gnuboard_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_gnuboard_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_php_gnuboard_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_php_gnuboard` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_gnuboard_files`
--

LOCK TABLES `bo_table_php_gnuboard_files` WRITE;
/*!40000 ALTER TABLE `bo_table_php_gnuboard_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_gnuboard_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_study`
--

DROP TABLE IF EXISTS `bo_table_php_study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_study` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_php_study_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_study`
--

LOCK TABLES `bo_table_php_study` WRITE;
/*!40000 ALTER TABLE `bo_table_php_study` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_study_comments`
--

DROP TABLE IF EXISTS `bo_table_php_study_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_study_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_php_study_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_php_study` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_study_comments`
--

LOCK TABLES `bo_table_php_study_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_php_study_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_study_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_study_files`
--

DROP TABLE IF EXISTS `bo_table_php_study_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_study_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_php_study_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_php_study` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_study_files`
--

LOCK TABLES `bo_table_php_study_files` WRITE;
/*!40000 ALTER TABLE `bo_table_php_study_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_study_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_zeroboard_xe`
--

DROP TABLE IF EXISTS `bo_table_php_zeroboard_xe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_zeroboard_xe` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_php_zeroboard_xe_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_zeroboard_xe`
--

LOCK TABLES `bo_table_php_zeroboard_xe` WRITE;
/*!40000 ALTER TABLE `bo_table_php_zeroboard_xe` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_zeroboard_xe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_zeroboard_xe_comments`
--

DROP TABLE IF EXISTS `bo_table_php_zeroboard_xe_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_zeroboard_xe_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_php_zeroboard_xe_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_php_zeroboard_xe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_zeroboard_xe_comments`
--

LOCK TABLES `bo_table_php_zeroboard_xe_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_php_zeroboard_xe_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_zeroboard_xe_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_php_zeroboard_xe_files`
--

DROP TABLE IF EXISTS `bo_table_php_zeroboard_xe_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_php_zeroboard_xe_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_php_zeroboard_xe_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_php_zeroboard_xe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_php_zeroboard_xe_files`
--

LOCK TABLES `bo_table_php_zeroboard_xe_files` WRITE;
/*!40000 ALTER TABLE `bo_table_php_zeroboard_xe_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_php_zeroboard_xe_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry1`
--

DROP TABLE IF EXISTS `bo_table_poetry1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry1` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_poetry1_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry1`
--

LOCK TABLES `bo_table_poetry1` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry1` DISABLE KEYS */;
INSERT INTO `bo_table_poetry1` VALUES (1,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','기다림','기다림이란... \r\n때론 기쁨... \r\n\r\n기다림이란... \r\n때론 슬픔... \r\n\r\n기다림이란... \r\n때론 아픔... \r\n\r\n기다림이란... \r\n때론 설레임... \r\n\r\n기다림이란... \r\n때론 허무... \r\n\r\n기다림이란... \r\n때론 초조함... \r\n\r\n기다림이란... \r\n때론 후회... \r\n\r\n기다림이란... \r\n때론 용서의 시간..','left','b',55,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(2,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','나무','\r\n저 큰 나무에 가려진 작은 나무처럼 \r\n당신이란 그늘에 가려진 제 자신이래도 \r\n저 큰 나무가 알게 모르게 작은 나무를 \r\n여러 풍파로부터 지켜주듯이 \r\n당신도 저를 지켜주신다고 믿기에 \r\n오늘도 묵묵히 당신만을 지켜보며 \r\n커 가는 제 자신을 느낍니다 \r\n커가는 사랑과... \r\n커가는 믿음을...\r\n','left','b',50,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(3,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','나무같은 사랑','\r\n전 당신께 \r\n나무같은 사람이 되고 싶습니다 \r\n\r\n당신이 더울 땐 \r\n그늘이 되어주고 \r\n\r\n당신이 배고플 땐 \r\n열매를 주고 \r\n\r\n당신이 쉬고싶을 땐 \r\n집이 되어주고 \r\n\r\n당신께 찬바람이 불 땐 \r\n바람막이가 되어주는 \r\n\r\n전 당신께 \r\n나무같은 사람이 되고 싶습니다\r\n','left','b',56,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(4,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','난 가끔 너를','\r\n난 가끔 \r\n호기심에 찬 눈으로 너를 쳐다본다 \r\n넌 지금무슨 생각을 할까 \r\n\r\n난 가끔 \r\n마음속으로 네 모습을 그려본다 \r\n넌 지금 이런 모습이겠지? \r\n\r\n난 가끔 \r\n너를 생각한다 \r\n오늘은 뭐하고 있을까?\r\n','left','b',46,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(5,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','내가 하고 싶은 사랑 I','\r\n비가 나뭇잎을 흠뻑 적시듯 \r\n내마음을 흠뻑 적셔줄 \r\n그런 사람과 사랑하고 싶다 \r\n\r\n하늘에서 흘리는 눈물을 보면서 \r\n아름답다 느끼며 \r\n내 눈에서 흐르는 눈물을 보면서 \r\n아름답다 느껴주는 \r\n그런 사람과 사랑하고 싶다 \r\n\r\n나뭇잎을 스치는 바람소리에 \r\n귀를 기울이고 \r\n내 입김만으로 \r\n내마음의 소리를 들어줄 \r\n그런 사람과 사랑하고 싶다 \r\n\r\n차가운 비를 맞으며 \r\n차가워진 몸과 마음을 \r\n따뜻하게 데워줄 \r\n그런 사람과 사랑하고 싶다\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(6,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','내가 하고 싶은 사랑 II','\r\n햇살처럼 \r\n따뜻한 사랑을 하고싶다 \r\n그 따스함으로 \r\n마음까지 훈훈하게 녹여 줄 수 있는 사랑 \r\n\r\n얼음처럼 \r\n차가운 사랑을 하고 싶다 \r\n그 차가움으로 \r\n영원히 간직할 수 있는 사랑 \r\n\r\n유리처럼 \r\n투명한 사랑을 하고 싶다 \r\n아무런 거짓이 없는 \r\n깨끗한 사랑 \r\n\r\n돌처럼 \r\n단단한 사랑을 하고 싶다 \r\n오랜 시간이 지나도 \r\n영원히 변하지 않을 사랑\r\n','left','b',51,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(7,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','너를 보면','\r\n너를 보면 \r\n후회를 한다 \r\n내 삶의 거짓된 순간들을... \r\n\r\n너를 보면 \r\n기쁘다 \r\n내가 살아서 널 만날 수 있음을... \r\n\r\n너를 보면 \r\n슬프다 \r\n만남이 있으면 해어짐이 있음을 잘 알기에... \r\n\r\n너를 보면 \r\n초조하다 \r\n네가 나를 떠날까봐.\r\n','left','b',54,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(8,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','너의 눈빛','\r\n순수한 너의 눈빛 \r\n하늘에서 내려온 천사의 눈빛... \r\n\r\n유리처럼 투명한 눈빛... \r\n그 투명함에... \r\n그 너머에... \r\n모든 것이 보일 듯한 눈빛... \r\n\r\n거울처럼 맑은 눈빛... \r\n결코 거짓을 말할 수 없는... \r\n진실의 거울같은 눈빛...\r\n','left','b',50,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(9,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신에게 다 주어도','\r\n당신에게 다 주어도 \r\n제 가슴엔 \r\n끊임없이 넘쳐나는 사랑때문에 \r\n제 자신을 주체할 수 없습니다 \r\n\r\n당신에게 다 주어도 \r\n제가 가지고 있던 \r\n모든것은 다 \r\n당신을 위한 것이였기 때문에 \r\n전혀 아깝지가 않습니다 \r\n\r\n당신에게 다 주고 \r\n당신이 뒤돌아 서신다 해도 \r\n그것이 모두 다 \r\n당신을 위한 것이라면 \r\n전 후회하지 않습니다 \r\n\r\n당신에게 다 주어도 \r\n더 주고픈 제 욕심에 \r\n전 오늘도 \r\n당신을 잡아 세웁니다\r\n','left','b',54,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(10,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신은','\r\n당신은\r\n샘물입니다\r\n한순간이나마\r\n저의 목을 축여주시는\r\n당신은\r\n샘물입니다\r\n\r\n당신은\r\n바람입니다\r\n한순간 제 곁을 스쳐지나가고\r\n나뭇잎을 뒤흔들듯이\r\n제 마음을 뒤흔드는\r\n당신은\r\n바람입니다\r\n\r\n당신은\r\n나무입니다\r\n언제나 그 자리에 서서\r\n굳은 모습으로\r\n제가 쉴 그늘을 만들어 주지만\r\n저를 보아주시지 않는\r\n당신은\r\n나무입니다\r\n\r\n당신은\r\n산입니다\r\n우무리 목청껏 불러보아도\r\n들려오는 것은 저의 목소리뿐\r\n당신의 목소리는\r\n어디에서도 들려오지 않습니다\r\n','left','b',45,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(11,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신은 알고 있나요','\r\n당신은 알고 있나요 \r\n제 맘속에 담긴 \r\n숨은 진실을... \r\n\r\n당신은 알고 있나요 \r\n세월이 지나도 \r\n변하지 않을 저의 마음을... \r\n\r\n당신은 알고 있나요 \r\n당신이 힘겨워할 때면 \r\n제 가슴은 찢어진다는 사실을... \r\n\r\n당신은 알고 있나요 \r\n제가 너무나도 힘겨울 때면 \r\n당신이 가장 먼저 생각난다는 사실을... \r\n\r\n당신은 알고 있나요 \r\n제가 제 자신을 주체하지 못할 만큼 \r\n당신을 사랑한다는 사실을...\r\n','left','b',47,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(12,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신의 마음','\r\n당신의 마음 \r\n구석 구석을 살펴보고 싶슾니다 \r\n제가 들어갈 곳이 있는지... \r\n\r\n당신의 마음 \r\n구석 구석을 어루만져주고 싶습니다 \r\n당신이 슬퍼할 땐... \r\n\r\n당신의 마음 \r\n그 속에서 웃음이 느껴집니다 \r\n당신이 기뻐할 땐...\r\n','left','b',45,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(13,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','맑은 하늘 속으로','\r\n티없이 맑은 날엔 \r\n그 파란 하늘위에 \r\n너의 해맑은 웃음이 떠오른다 \r\n\r\n그 웃음위에 \r\n내 마음도 붕 떠올라 \r\n하늘보다도 더 높은 하늘위에서 \r\n그곳을 나는 새가 되어본다\r\n','left','b',47,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(14,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑에 대한 정의','\r\n무엇이 두려워\r\n진실을 말하지 못하나요\r\n사랑은 창피한게 아닙니다\r\n사랑은 바라지 않고 주는것...\r\n그것이 바로 사랑입니다\r\n당신은 저를 사랑하시나요?\r\n저는 당신을 사랑합니다.\r\n','left','b',48,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(15,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑은 뭘까?','\r\n누군가 사랑을\r\n아름답다고 하면\r\n누군가는 사랑을\r\n슬프다고 합니다\r\n\r\n누군가 사랑을\r\n기쁨이라고 하면\r\n누군가는 사랑을\r\n아픔이라고 합니다\r\n\r\n왜 사랑이라는 단어하나로\r\n그 모든것을 버리고\r\n상처받고...\r\n아파하고...\r\n기뻐할까요\r\n\r\n그것은...\r\n사랑이라는 단어를\r\n그 누구도 쉽게\r\n정의 내릴수 없기 때문일겁니다\r\n','left','b',65,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(16,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑의 단계','\r\n처음 사랑에 빠지면 집착하게 됩니다\r\n그 사람에게\r\n뭔가를 주고\r\n뭔가를 해주고 받고픈 집착\r\n\r\n그 다음엔...\r\n막연한 동경을 갖게 됩니다\r\n그 사람을 닮고 싶은\r\n그런 마음...\r\n그 사람과 비슷해지고\r\n그 사람과 사귀고 싶은\r\n막연한...\r\n집착과도 같은 동경\r\n\r\n그 다음엔...\r\n욕망이 생깁니다\r\n그 사람을 위해서\r\n오직 그 사람만을 위해서\r\n살고 싶은...\r\n그런 욕망\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(17,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','잡초와 같이','\r\n잡초와 같이 언제 어디서나\r\n볼 수 있는 것처럼\r\n당신의 눈에 계속 밟히는\r\n그런 존제이고 싶습니다\r\n\r\n잡초가 끊임없는\r\n생명력을 지닌 것처럼\r\n끊임없는 생명력을 가진\r\n그런 사랑을 하고 싶습니다\r\n\r\n잡초와 같이 한낱 들풀이라도\r\n그것이 가진 무수한 세얼처럼\r\n당신의 곁에서 당신의 생이 다할 때까지\r\n당신을 바라보는 잡초이고 싶습니다\r\n','left','b',67,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(18,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','전 당신께','\r\n전 당신께\r\n바람이 되고 싶습니다\r\n당신의 귓가를 맴돌며\r\n당신이 저의 말을\r\n알아듣지 못해도...\r\n\r\n전 당신께\r\n사랑한다고 속삭이고 싶습니다\r\n\r\n전 당신께\r\n흙이 되고 싶습니다\r\n언제나 당신께 밟히더라도\r\n당신이 가시는 길\r\n당신의 발을 편안하게 해주는...\r\n\r\n전 당신께\r\n흙이 되고 싶습니다\r\n\r\n전 당신께\r\n하늘이 되고 싶습니다\r\n언제나 당신만을 내려다보며\r\n당신이 좋아하는 날씨를 만들고\r\n언제나 당신을 지켜줄 수 있는...\r\n','left','b',69,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(19,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','제가 느끼는 것은','\r\n하늘에 떠있는 태양을 보면서\r\n밝다고 느끼는 것은\r\n제 마음속에 당신이라는\r\n태양이 있기 때문입니다\r\n당신이 없다면\r\n제겐 언제나 어둠만이\r\n존재하기 때문입니다\r\n\r\n들판에 핀 꽃을 보면서\r\n아름답다고 느끼는 것은\r\n제 마음속에 당신이라는\r\n꽃이 있기 때문입니다\r\n당신이 없다면\r\n들판에 핀 꽃은 그냥 의미 없는\r\n꽃이기 때문입니다\r\n\r\n맑게 개인 하늘을 보면서\r\n푸르다 느끼는 것은\r\n제 마음속에 당신이라는\r\n하늘이 있기 때문입니다\r\n당신이 없다면\r\n하늘은 그냥\r\n하늘일 뿐이기 때문입니다\r\n','left','b',67,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(20,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','제가 느낄 때는','\r\n제가 슬프다고 느낄 떄는\r\n당신이 제 옆에\r\n없다고 느낄 때입니다\r\n\r\n제가 기쁘다고 느낄 때는\r\n당신이 밝게\r\n웃어줄 때입니다\r\n\r\n제가 행복하다고 느낄 때는\r\n잠시 스쳐지나가는 시간이래도\r\n당신이 힘들 때\r\n제가 든든한 기둥이 되어\r\n당신이 잠시 쉬었다 갈 때입니다\r\n','left','b',64,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(21,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','표현할 수 없는 마음','\r\n한장의 편지로\r\n제 마음을 모두\r\n표현할 수 없겠지요\r\n\r\n한 통화의 전화로\r\n제가 하고 싶었던 말들을 모두\r\n표현할 수 없겠지요\r\n\r\n사랑한다 한마디로\r\n제 사랑을 모두\r\n표현할 수 없겠지요\r\n','left','b',69,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(22,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','행복일텐데...','\r\n이 하늘아래\r\n너와 나 단둘이만 있어도\r\n내겐 행복일텐데...\r\n\r\n다른건 모두 남에게 주어도\r\n네 마음만 네게 준다면\r\n내겐 행복일텐데...\r\n\r\n언제나 내게\r\n행복한 웃음을 지어준다면\r\n내겐 행복일텐데...\r\n\r\n내게\r\n사랑한다 한마디만 해준다면\r\n내겐 행복일텐데...\r\n','left','b',97,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(23,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','헛된 믿음, 헛된 증오, 헛된 사랑이래도...','\r\n당신을 향한 저의 믿음이\r\n헛된 믿음 이래도\r\n전 그믿음을\r\n간직하고 싶습니다\r\n그 믿음마저 깨어진다면\r\n제 삶의 의미는\r\n사라지니까요\r\n\r\n당신을 향한 저의 증오가\r\n헛된 증오래도\r\n전 당신을 증오합니다\r\n그것은 당신을 너무나도\r\n사랑하고 있기 때문입니다\r\n그것은...\r\n사랑의 반대는 증오가 아니라...\r\n무관심이기 때문입니다\r\n\r\n당신을 향한 저의 사랑이\r\n헛된 사랑 이래도\r\n전 당신을 사랑합니다\r\n당신을 향한 저의 사랑은\r\n어떠한 거짓도...\r\n어떠한 욕심도 없는\r\n당신을 향한 저의 끝없는\r\n순수한 사랑이니까요...\r\n','left','b',66,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(24,4,'poetry1',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','혼자 한 고백','\r\n까만 실같은 머리카락\r\n그리고...\r\n맑은 유리구슬같은 눈\r\n그 맑은 눈동자속에 고인\r\n이슬을 한 방울도\r\n보고싶지 않아서\r\n오늘도...\r\n홀로 삭이는 말\r\n사랑해...\r\n그리고\r\n미안해...\r\n','left','b',95,'2016-04-25 14:44:30','2016-04-25 14:44:30');
/*!40000 ALTER TABLE `bo_table_poetry1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry1_comments`
--

DROP TABLE IF EXISTS `bo_table_poetry1_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry1_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry1_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry1_comments`
--

LOCK TABLES `bo_table_poetry1_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry1_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry1_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry1_files`
--

DROP TABLE IF EXISTS `bo_table_poetry1_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry1_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry1_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry1_files`
--

LOCK TABLES `bo_table_poetry1_files` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry1_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry1_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry2`
--

DROP TABLE IF EXISTS `bo_table_poetry2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry2` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_poetry2_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry2`
--

LOCK TABLES `bo_table_poetry2` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry2` DISABLE KEYS */;
INSERT INTO `bo_table_poetry2` VALUES (1,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신께 보매는 메세지','\r\n세상에 아무리 지치더라도... \r\n세상이 아무리 힘들어도... \r\n우리가 해야 할 일들은 \r\n너무나도 많습니다 \r\n우리가 할 수 있는 일들은 \r\n너무나도 많습니다 \r\n아무리 아파도... \r\n아무리 슬퍼도... \r\n아무리 지쳐도... \r\n쓰러지지 않을 마음만 있다면 \r\n다시 일어서고 \r\n언제고 다시 나아갈 수 있습니다\r\n','left','b',49,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(2,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신은 언제나','\r\n당신은 언제나 주기만 했죠... \r\n당신은 언제나 다 바쳤죠... \r\n그래서 그 사람 떠났을 때 \r\n당신안에 남아있던 그 모든 것들이 \r\n다 사라졌죠... \r\n이젠 제가 드릴게요 \r\n이제 당신것이 없다면 \r\n제 것으로 채우세요... \r\n당신은 이제 아무에게도... \r\n저에게도... \r\n주지말고 받기만 해요...\r\n','left','b',71,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(3,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑은... I','\r\n사랑은... \r\n인내가 필요합니다 \r\n사랑을 위해서... \r\n기다릴 줄 아는 그런 인내... \r\n\r\n사랑은... \r\n끈기가 필요합니다 \r\n지쳐 쓰러지더라도 \r\n다시 일어설 줄 아는 그런 끈기... \r\n\r\n사랑은... \r\n용기가 필요합니다 \r\n사랑하는 이에게 다가설 줄 아는 용기... \r\n그리고 모든것을 다 바칠 줄 아는 그런 용기...\r\n','left','b',63,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(4,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑은... II','\r\n사랑은... \r\n그렇게도 힘든 것인가요... \r\n사랑을 할 때도 \r\n사랑을 말할 때도 \r\n사랑하는 이에게 \r\n솔직한 말을 들을 때도...\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(5,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑을 하려면','\r\n사랑을 하려면 \r\n솔직해야 합니다 \r\n\r\n사랑을 하려면 \r\n들을 줄 알아야 합니다 \r\n\r\n사랑을 하려면 \r\n말할 줄 알아야 합니다 \r\n\r\n사랑을 하려면 \r\n믿을 줄 알아야 합니다 \r\n\r\n사랑을 하려면 \r\n노력할 줄 알아야 합니다\r\n','left','b',62,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(6,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑을 하면 시인이 됩니다','\r\n사랑을 하면 \r\n아름다운 시인이 됩니다 \r\n사랑하는 이가 행복해 할 때면 \r\n세상 모든 사물이 아름다워 보이기에... \r\n\r\n사랑을 하면 \r\n항상 웃음짓는 시인이 됩니다 \r\n사랑하는 이가 미소지을 때면 \r\n왠지 기분이 좋아 저절로 웃음이 지어집니다... \r\n\r\n사랑을 하면 \r\n슬픈 시인이 됩니다 \r\n사랑하는 이의 눈에 슬픔이 가득할 때면 \r\n세상 모든 일들이 모두 다 슬퍼 보이기에...\r\n','left','b',66,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(7,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑을 하면 왜...?','\r\n사랑을 하면 왜 주기만 하는 걸까... \r\n아무런 미련 없이... \r\n아무런 대가 없이... \r\n아무런 후회 없이... \r\n\r\n사랑을 하면 왜 아픈 걸까... \r\n아무런 상처 없이... \r\n아무런 병도 없이... \r\n\r\n사랑을 하면 왜 기쁜 걸까... \r\n아무런 받은 것 없이... \r\n그냥... \r\n보기만 해도...\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(8,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑이 떠나버린 사람의 가슴속에 남는 것','\r\n사랑이 떠나버린 사람의 \r\n가슴속에 남는 것은... \r\n그 사람과의 추억과 \r\n짙은 허무... \r\n그리고... \r\n진득한 슬픔입니다\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(9,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑이란 이름으로','\r\n사랑이란 이름으로 \r\n당신을 소유하고싶지 않습니다 \r\n그저 당신만을 지켜보며 \r\n그저 당신만을 가슴속에 \r\n담아두고 싶습니다 \r\n당장 채워지지 않을 만큼 \r\n저의 사랑은 크지만 \r\n그것이 당신을 향한 \r\n저의 마음이기 때문입니다 \r\n\r\n사랑이란 이름으로 \r\n당신을 웃게 하고 싶습니다 \r\n그저 당신이 저를 보며 \r\n당신의 텅빈 가슴속에 \r\n웃음이 넘쳐난다면 \r\n그것만으로도 \r\n저는 행복할 수 있기 때문입니다 \r\n\r\n사랑이란 이름으로 \r\n당신이 눈물을 보인다면 \r\n\r\n저는 그런 당신을 보며 \r\n제 가슴속에 일어나는 작은 파문들을 \r\n주체하지 못할 것입니다 \r\n당신의 눈물은 \r\n한 여름에 내리는 소나기보다도 \r\n더 많은 물들을 \r\n제 가슴에 뿌려놓기 때문입니다\r\n','left','b',74,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(10,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','용기와 힘','\r\n사랑을 용기라 하면 \r\n웃음은 힘입니다 \r\n\r\n슬픔을 고뇌라 하면 \r\n고독은 외로움입니다 \r\n\r\n희망을 욕망이라 하면 \r\n좌절은 고통이라 하겠지요 \r\n\r\n용기를 잃으면 \r\n고뇌와 외로움, 고통이 \r\n한꺼번에 밀려오겠지만 \r\n\r\n자신을 지탱해줄 힘이 있다면 \r\n용기는 언제든 다시 살아날 것입니다\r\n','left','b',69,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(11,5,'poetry2',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','친구','\r\n언젠가... \r\n친구에게 물었죠 \r\n사랑은 뭘까... \r\n친구는 이렇게 말했습니다 \r\n세상엔... \r\n좋아하는 것과... \r\n사랑하는 것이 있는데... \r\n좋아하는 것은 \r\n그 사람이 예쁘기 때문에... \r\n그 사람의 성격이 좋아서... \r\n그렇게 좋은 것은 \r\n그냥 좋은 거라고... \r\n사랑은... \r\n아무 이유없이 좋은 거라고... \r\n그냥... \r\n그 사람이 있으므로 해서 좋은 거라고... \r\n사랑엔... \r\n조건이 없는가 봅니다\r\n','left','b',63,'2016-04-25 14:44:30','2016-04-25 14:44:30');
/*!40000 ALTER TABLE `bo_table_poetry2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry2_comments`
--

DROP TABLE IF EXISTS `bo_table_poetry2_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry2_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry2_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry2_comments`
--

LOCK TABLES `bo_table_poetry2_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry2_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry2_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry2_files`
--

DROP TABLE IF EXISTS `bo_table_poetry2_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry2_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry2_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry2_files`
--

LOCK TABLES `bo_table_poetry2_files` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry2_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry2_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry3`
--

DROP TABLE IF EXISTS `bo_table_poetry3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry3` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_poetry3_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry3`
--

LOCK TABLES `bo_table_poetry3` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry3` DISABLE KEYS */;
INSERT INTO `bo_table_poetry3` VALUES (1,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','희망... ','\r\n그 작은 단어 하나로 \r\n\r\n전 당신을 기다렸습니다 \r\n\r\n절망과 사랑의 슬픔을 안은 채로 \r\n\r\n전 오늘도... \r\n\r\n당신을 기다렸습니다 \r\n\r\n당신을 기다리며... \r\n\r\n전 오늘도... \r\n\r\n하얀 백지위에 \r\n\r\n까만 글들을 채워 넣습니다 \r\n\r\n그 글들위에 저의 마음을 얹어서...\r\n','left','b',46,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(2,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','너무나도 지쳐버린 당신','\r\n기다림에 지쳐버린 \r\n당신을 보면 \r\n그 기다림으로 인해 \r\n당신의 마음이 \r\n사막의 황무지보다도 \r\n더 황폐해 질까봐 두렵습니다 \r\n\r\n슬픔에 지쳐버린 \r\n당신을 보면 \r\n당신의 그 슬픔이 \r\n저로 인해서 \r\n기쁨이 될 수 있게 해 달라고 \r\n기도해 봅니다 \r\n\r\n눈물에 지쳐버린 \r\n당신을 보면 \r\n당신의 그 눈물을 \r\n제가 대신 \r\n흘리게 해달라고 \r\n기도해 봅니다 \r\n\r\n사랑에 지쳐버린 \r\n당신을 보면 \r\n당신의 지쳐버린 사랑이 \r\n저로인해 다시 \r\n활력을 얻을 수 있게 해달라고 \r\n기도해봅니다 \r\n\r\n너무나도 지쳐버린 \r\n당신을 보면 \r\n저로 인해서 \r\n당신의 마음만이라도 \r\n따뜻하고 편안하게 해달라고 \r\n기도해 봅니다\r\n','left','b',48,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(3,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','노을','\r\n하늘은 태양을 쉬게 하려고 붉게 만들고... \r\n태양은 밤을 만들기 위해 \r\n노을을 만들고 있습니다 \r\n\r\n제가 바라보고 있는 하늘의 노을은 \r\n제가 바라보고 있는 노을의 색깔과 의미는 \r\n내일의 황혼의 새벽을 만들기 위해 \r\n잠시 쉬어가는 노을입니다 \r\n\r\n당신이 바라보는... \r\n당신이 바라보고 있다면... \r\n당신의 노을은 어떤 색깔과 어떤 의미를 \r\n부여하과 있나요 \r\n\r\n당신도 제가 바라보고 있는 \r\n저 노을처럼 \r\n내일의 황혼의 새벽을 만들기 위해 \r\n잠시 휴식하는 것인가요... \r\n\r\n아니면... \r\n오늘의 생을 마감하고 \r\n세상 저 너머로 가버린... \r\n그런 노을인가요...\r\n','left','b',43,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(4,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','눈물','\r\n어두운 하늘에 떠 있는 \r\n수많은 별들이 \r\n하늘의 눈물이라면 \r\n\r\n어두운 밥바다에 몰아치는 파도는 \r\n바다가 흘리는 \r\n눈물이겠지요 \r\n\r\n그 바다의 눈물에 젖어버린 \r\n모래를 밟으며 \r\n\r\n당신의 슬픔에 가득찬 얼굴과 \r\n당신의 눈가에 고였던 \r\n슬픈 물망울을 떠올려 봅니다 \r\n\r\n밤새 흐느껴울던 하늘은 \r\n시간이 흐르면 \r\n밝게 웃는 태양이 떠오르고 \r\n\r\n밤새 흐느껴울던 파도는 \r\n시간이 흐르면 \r\n기쁨의 눈물을 흘리겠지요 \r\n\r\n당신의 얼굴도 \r\n당신의 눈물도 \r\n밝게 웃는 얼굴과 \r\n기쁨의 눈물로만 채워졌으면 합니다....\r\n','left','b',45,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(5,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신의 마음','\r\n한 사람으로 인해 \r\n다친 당신의 마음 \r\n그것으로 인해 \r\n괴로운 당신의 마음이 \r\n너무나도 잘 느껴집니다 \r\n이젠 웃으세요 \r\n당신의 아름다운 웃음을 \r\n보여주세요 \r\n당신이 바라보는 세상이\r\n아름답지 않다 하여도 웃으세요\r\n아름다운 그 웃음으로 당신의 마음을 정화 시켜 주세요\r\n','left','b',52,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(6,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신이 느껴질 때면','\r\n제 눈에 당신의 슬픔이 느껴질 때면 \r\n당신의 슬픔을 제가 나눠갖고 싶습니다 \r\n\r\n제 손끝에 당신의 눈물이 느껴질 때면 \r\n제 눈에도 눈물이 고입니다 \r\n\r\n제 코끝에 당신의 향기가 느껴질 때면 \r\n그 향기를 작은 병에 담아두고 싶습니다 \r\n\r\n제 입술에 당신의 촉촉한 입술이 느껴질 때면 \r\n그 촉촉함을 영원히 간직하고 싶습니다 \r\n\r\n제 맘속에 당신의 사랑이 느껴질 때면 \r\n당신의 그 사랑이 바로 저였으면...합니다...\r\n','left','b',48,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(7,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신이 좋아하는','\r\n창가에 당신이 좋아하는 비가 내릴 때면 \r\n전 창문을 뚫어지게 쳐다봅니다 \r\n그곳에 당신이 서있을것만 같아서.... \r\n\r\n당신이 좋아하는 나무앞에 서있을 때면 \r\n전 그 나무를 오래도록 쳐다봅니다 \r\n그 나무앞에 당신이 언젠가 나타날것 같아서.... \r\n\r\n당신이 좋아하는 하늘을 바라볼 때면 \r\n전 시선을 바닥으로 돌립니다 \r\n흐르는 눈물을 주체하지 못할 것 같아서...\r\n','left','b',45,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(8,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','떠나시려는 당신','\r\n세상의 단 하나뿐인 사랑 \r\n이세상에 존제하는 무수한 당신가운데 나만의 당신 \r\n\r\n당신이 있기에 \r\n제가 있습니다 \r\n\r\n이제 당신은 저먼 곳으로 \r\n떠나시려 하네요 \r\n\r\n어찌하여 당신은 그리 먼 곳으로 \r\n떠나시려 하네요 \r\n\r\n어찌하여 제가 볼 수 없는 곳으로 \r\n가려 하네요 \r\n\r\n어찌하여 제 가슴에 \r\n슬픔으로 채우려 하네요\r\n','left','b',59,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(9,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','마지막 웃음','\r\n당신의 마지막 뒷모습이 \r\n앚혀지지 않아 \r\n오늘도 술로 삭입니다 \r\n당신의 마지막 모습처럼 \r\n어제나 웃어주세요 \r\n혼자한 사랑이래도 \r\n전 괜찮습니다 \r\n저를 위해 울지말고 \r\n저를 위해 웃어 주세요...\r\n','left','b',63,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(10,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','무심한 사랑','\r\n하얀 담배연기속에 그려진 \r\n당신의 모습... \r\n그 연기와 같이... \r\n한순간에 나타났다가 \r\n한순간에 사라져버린 사랑 \r\n계속 연기를 뿜어 \r\n당신의 모습을 그려보지만 \r\n당신은 매정하게... \r\n또다시 사라져가는군요...\r\n','left','b',64,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(11,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','방황','\r\n새야... \r\n새야... \r\n\r\n길잃고 방황하는 \r\n비에 젖은 작은 새야 \r\n\r\n너의 집은 어디이기에 \r\n이리도 헤매인단 말이니 \r\n\r\n나 몸돌아갈 곳은 있지만 \r\n마음갈 곳은 없단다... \r\n\r\n갈 곳 없는 너와 나... \r\n어쩜 이리도 같단 말이니... \r\n\r\n구슬프게 울어도... \r\n소리내어 울어도... \r\n\r\n갈 곳 없는 너와 나... \r\n\r\n이젠 지친 몸을 이끌고... \r\n보금자리 찾아 보자꾸나...\r\n','left','b',67,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(12,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','별','\r\n밤하늘 가득한 \r\n수많은 별들... \r\n\r\n그렇게 많은 별들중에 \r\n당신의 별과 \r\n제 별을 찾아봅니다 \r\n\r\n그렇게 멀게 보이지 않듯이 \r\n손에 잡힐 듯 \r\n손에 잡히지 않는 별들 \r\n\r\n그게 바로... \r\n당신과 제 별일까요... \r\n\r\n그게 바로 \r\n당신과 저일까요... \r\n\r\n그게 바로... \r\n우리사랑일까요...\r\n','left','b',57,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(13,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신은 혼자가 아닙니다','\r\n상처입은 영혼처럼... \r\n슬픈 영혼처럼... \r\n그렇게 아파하지 마세요... \r\n그렇게 슬퍼하지 말세요... \r\n당신은 혼자가 아닙니다 \r\n당신은 당신만의 당신이 아닙니다 \r\n당신의 어머니의 당신... \r\n당신의 친구의 당신... \r\n당신이 사랑하는 모든 것의 당신... \r\n당신은 그렇게 복수의 당신입니다 \r\n그 모든 상처를 딛고... \r\n그 모든 슬픔을 딛고... \r\n좀더 높은 곳에서 \r\n세상을 내려다 보세요 \r\n당신을 알고 있는 이들이 많지 않습니까 \r\n당신이 알고 있는 이들이 많지 않습니까 \r\n당신을 사랑하는 이들이 많지 않습니까 \r\n세상은 아직 아름답지요?\r\n','left','b',65,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(14,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','세상에서 가장 무서운 것','\r\n험난한 세상에 \r\n나홀로 남았다... \r\n\r\n세상에서 가장 무서운 것은... \r\n이 세상속에서 따돌림당하는 것도 아니고... \r\n\r\n누군가에게 \r\n물신나게 맞는 것도 아니고... \r\n\r\n언젠가 하번은 찾아오는 \r\n죽음도 아닌... \r\n\r\n바로 내가나를 버리는 것임을... \r\n내가 잘 알기에... \r\n\r\n홀로 남겨진 세상속에서... \r\n나를 잃지 않고... \r\n\r\n꿋꿋하게 살아가련다... \r\n떠나간 내 사랑이여...\r\n','left','b',64,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(15,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','왜이리도 슬픈지요','\r\n당신이 좋아하던 \r\n의자에 앉아 \r\n당신을 그려봅니다 \r\n왜 이리도 슬픈지요 \r\n당신이 그자리에 없다는 사실이 \r\n왜 이리도 슬픈지요 \r\n\r\n당신이 좋아하던 \r\n그 비가 내릴 때면 \r\n당신의 두 눈에 흘러내리던 \r\n그 눈물이 생각납니다 \r\n왜 이리도 슬픈지요 \r\n왜 그리도 슬퍼했는지요 \r\n\r\n날씨가 화창한 날엔 \r\n당신이 좋아하던 그 길을 \r\n저도 모르게 걷습니다 \r\n왜 이리도 슬픈지요 \r\n당신과 함께 걷지 못한다는 사실이 \r\n왜 이리도 아쉬운지요 \r\n\r\n편한 잠을 못 이루는 날엔 \r\n당신이 가장 먼저 생각납니다 \r\n왜 이리도 슬픈지요 \r\n당신을 끝내 못지켜줬다는 사실이 \r\n왜 이리도 안타까운지요\r\n','left','b',59,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(16,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','이런게 사랑일까요...','\r\n순간순간이 버겁습니다 \r\n예전엔 이러지 않았었는데 \r\n당신을 사랑한 순간부터 \r\n당신을 좀 더 알게 된 순간부터 \r\n언제나 당신이 보고싶고 \r\n하루에도 수십번씩 \r\n당신만을 생각합니다 \r\n당신의 전화라도 없는 날엔 \r\n불안한 마음 감출 길이 없습니다 \r\n이런게 사랑일까요...\r\n','left','b',59,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(17,6,'poetry3',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','제가 느끼는 것은 II','\r\n제 어깨위에 얹혀진 당신의 머리보다 \r\n제가 무겁게 느끼는 것은 \r\n당신의 세월에 데한 \r\n당신의 무거운 한숨입니다 \r\n\r\n제 팔에 안긴 당신의 허리보다 \r\n제가 힘겹게 느끼는 것은 \r\n허물어질 듯한 당신의 모습과 \r\n당신의 힘겨워하는 모습들 입니다 \r\n\r\n제 입술위에 얹혀진 당신의 입술보다 \r\n제가 허무하게 느끼는 것은 \r\n당신의 표정에서 볼 수 있는 \r\n당신의 인생에 데한 당신의 허탈함 때문입니다 \r\n\r\n제 맘속에 들어와 있는 당신보다 \r\n제가 두렵게 느끼는 것은 \r\n언제 부서질지 모르는 당신의 마음이 \r\n너무나도 잘 느껴지기 때문입니다\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30');
/*!40000 ALTER TABLE `bo_table_poetry3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry3_comments`
--

DROP TABLE IF EXISTS `bo_table_poetry3_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry3_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry3_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry3` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry3_comments`
--

LOCK TABLES `bo_table_poetry3_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry3_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry3_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry3_files`
--

DROP TABLE IF EXISTS `bo_table_poetry3_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry3_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry3_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry3` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry3_files`
--

LOCK TABLES `bo_table_poetry3_files` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry3_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry3_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry4`
--

DROP TABLE IF EXISTS `bo_table_poetry4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry4` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_poetry4_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry4`
--

LOCK TABLES `bo_table_poetry4` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry4` DISABLE KEYS */;
INSERT INTO `bo_table_poetry4` VALUES (1,7,'poetry4',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','거짓','\r\n거짓된 말...\r\n거짓된 행동...\r\n거짓된 삶...\r\n\r\n하늘만이 아는...\r\n그래도...\r\n거짓되지 않은 마음...\r\n\r\n사랑한다 한마디 못하고...\r\n또 거짓된 행동과...\r\n거짓된 말들...\r\n\r\n오늘도 하루해가 가고 있지만\r\n내게 남은건\r\n거짓과 후회의 반복뿐...\r\n\r\n조금이라도...\r\n너의 진심을 알 수 있다면...\r\n더 이상 거짓되지 않을 수 있을텐데...\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(2,7,'poetry4',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','꿈','\r\n사람은\r\n누구나 꿈을 꿉니다\r\n\r\n어떤 사람은...\r\n세계에서 제일 가는 부자...\r\n\r\n어떤 사람은...\r\n세계에서 제일 멋있는 사람...\r\n\r\n어떤 사람은...\r\n세상에서 제일 성공한 사람...\r\n\r\n저의 꿈은...\r\n혼자한 사랑이래도...\r\n가슴속 싶은곳에 간직할 수 있는 사랑...\r\n바로 당신과 함께하는것...\r\n','left','b',57,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(3,7,'poetry4',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신은 아마 모르실겁니다','\r\n당신은 아마 모르실겁니다 \r\n제가 당신을 못 잊을 것이라는걸... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 아파할 때 저또한 너무나도 아팠던 것을... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 세상을 등진날 전 사람을 등졌다는 사실을... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 그렇게 세상을 떠나면 전 세상과의 문을 닫을 거라는것을... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 당신을 버렸어도 전 당신을 버릴 수 없다는것을... \r\n\r\n당신은 아마 모르실겁니다 \r\n당신이 제가 잃어버렸던 수많은 감정들과 사랑을 일깨워 주셨던것을... \r\n\r\n그리고... \r\n그 감정들 때문에 당신앞에선 덤덤한 척 \r\n당신이 슬퍼할 때도 아무렇지 않은 척했지만 \r\n사실은 눈물을 많이 흘렸다는 사실을... \r\n\r\n당신은 아마 모르실겁니다 \r\n제가 얼마만큼 당신을 사랑하는지...\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(4,7,'poetry4',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신을 알기까지','\r\n당신을 알기 전엔 \r\n전 세상이 두려워 \r\n제 안에 저를 가뒀습니다 \r\n\r\n당신을 알기 전엔 \r\n전 사랑하는 것을 \r\n두려워했습니다 \r\n\r\n당신을 알기 전엔 \r\n제 아네 감추어진 \r\n감정들의 정체가 궁금했습니다 \r\n\r\n당신을 알고 난 뒤에야 \r\n제 눈은 아름다운 세상에 \r\n눈을 떴고... \r\n\r\n당신을 알고 난 뒤에야 \r\n제 안에 깊숙히 숨어있던 \r\n제 자신도 몰랐던 \r\n감정들을 알게 되었습니다 \r\n\r\n당신이 제겐 \r\n너무나도 커다란 존제이고 \r\n당신이 제겐 사랑임을 알게 되었습니다\r\n','left','b',51,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(5,7,'poetry4',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신의 존재','\r\n당신의 이름 석자는 \r\n제 삶의 \r\n커다란 의미입니다 \r\n\r\n혹시라도 \r\n같은 이름의 사람이라해도 \r\n그것은 의미가 없습니다 \r\n\r\n당신의 모습은 \r\n제 삶의 \r\n커다람 원의 중심입니다 \r\n\r\n혹시라도 \r\n당신과 비슷한 사람을 보게 되더라도 \r\n그것은 당신이 아니기에 의미가 없습니다 \r\n\r\n당신의 한숨은 \r\n제 삶의 \r\n커다란 회오리입니다 \r\n\r\n혹시라도 \r\n당신이 한숨을 내쉴때면 \r\n제 삶은 그 횡리에 실려 날아가 버릴것 같습니다 \r\n\r\n당신의 눈물은 \r\n제 삶의 \r\n커다란 파도입니다 \r\n\r\n혹시라도 \r\n당신이 눈물을 흘리신다면 \r\n제 가슴에 성난 파도가 몰아칠 것 같습니다\r\n','left','b',56,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(6,7,'poetry4',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑...','\r\n사랑... \r\n너무 어렵게 생각하지 말아요... \r\n아무것도 없는 자만이 \r\n최선을 다할 수 있고 \r\n노력하는 자만이 \r\n무언가를 얻을 수 있듯이 \r\n사랑도... \r\n최선을 다하고... \r\n노력한다면... \r\n그리고... \r\n있는 그대로를 사랑할 수 있다면... \r\n그걸로 아름다운 것이 아닐까요...\r\n','left','b',58,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(7,7,'poetry4',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','저란 사람은...','\r\n전 아주 슬픈 사람입니다 \r\n당신의 슬픔을 잘 아는데... \r\n당신의 아픔을 잘 아는데... \r\n당신을 위해 해줄 수 있는 일이 \r\n제겐 아무것도 없기 때문에... \r\n\r\n전 아주 기쁜 사람입니다 \r\n그래도 당신이 절 믿어 주고 \r\n저로인해 웃음지어주고 \r\n아무것도 없는 제가 \r\n당신을 사랑할 수 있게 해주시니까요... \r\n\r\n전 그래도... \r\n행복한 사람입니다 \r\n당신의 마음속 한구석이라도 \r\n제가 비비고 들어갈 곳이 \r\n있다는 사실은...\r\n','left','b',61,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(8,7,'poetry4',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','제 마음속에','\r\n제 마음속에 \r\n미움과 분노가 쌓일 때면 \r\n당신을 생각하며 \r\n미움과 분노를 삭입니다 \r\n\r\n제 마음속에 \r\n슬픔이 쌓일 때면 \r\n저보다 더 슬퍼할 당신을 생각하며 \r\n슬픔을 삭입니다 \r\n\r\n제 마음속에 \r\n기쁨이 쌓일 때면 \r\n당신이 밝게 웃어줬을 때를 생각하며 \r\n기분이 좋아져 저도모르게 웃음짓습니다 \r\n\r\n제 마음속에 \r\n사랑이 커갈 때면 \r\n당신이 제게 주신것들을 생각하며 \r\n홀로 거리로 나옵니다\r\n','left','b',60,'2016-04-25 14:44:30','2016-04-25 14:44:30');
/*!40000 ALTER TABLE `bo_table_poetry4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry4_comments`
--

DROP TABLE IF EXISTS `bo_table_poetry4_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry4_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry4_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry4` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry4_comments`
--

LOCK TABLES `bo_table_poetry4_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry4_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry4_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry4_files`
--

DROP TABLE IF EXISTS `bo_table_poetry4_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry4_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry4_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry4` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry4_files`
--

LOCK TABLES `bo_table_poetry4_files` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry4_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry4_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry5`
--

DROP TABLE IF EXISTS `bo_table_poetry5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry5` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_poetry5_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry5`
--

LOCK TABLES `bo_table_poetry5` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry5` DISABLE KEYS */;
INSERT INTO `bo_table_poetry5` VALUES (1,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','산다는건','\r\n아무리 지쳐 쓰러져도...\r\n힘들다 말할까...\r\n\r\n아무리 괴로워도...\r\n아프다 말할까...\r\n\r\n누구에게도...\r\n그 누구도...\r\n\r\n삶을 대신 살아주진 않는다...\r\n산다는건 그런것...\r\n\r\n그저 아프지않고...\r\n지쳐 쓰러지지 않길바래야지...\r\n\r\n고단한 이 한 몸뚱아리...\r\n항상 미소지어 아픔을 잊어야지...\r\n\r\n그게 삶인데...\r\n그게 삶인걸...\r\n','left','b',49,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(2,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','슬프도록 아름다운','\r\n슬픈 두눈을 들어 하늘을 보라 \r\n눈물이 흐르려 할 땐 \r\n음악처럼 흐르는 바람에 \r\n귀를 기울이고... \r\n몸을 내맡겨 보라 \r\n그러다 쓰러지면... \r\n다시 일어서고... \r\n다시 일어서고... \r\n바람이 눈물을 말려 \r\n눈물이 마를 때쯤 비로소 \r\n슬프도록 아름다운 미소... \r\n그대 입술위에 걸릴테니...\r\n','left','b',50,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(3,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','시계','\r\n시간은 왜 우리를 갈라놓았을 까요... \r\n우릴 갈라놓은 시간이 우릴 돌아볼 틈도 없게... \r\n우릴 돌아 보지도 않고 앞으로만 가네요... \r\n당신의 시간과... \r\n저의 시간이 같았다면... \r\n우린 서로 사랑할 수 있었을 텐데... \r\n멈춰버린 당신의 시계를... \r\n제가 돌릴 수 있었을 텐데... \r\n이제 당신의 그 아름답던 미소마저 지워져... \r\n당신의 슬픔밖에 볼 수 없지만... \r\n당신의 그 슬픔마저도 사랑해 버린 저는... \r\n당신의 멈춰버린 시계를 보며... \r\n눈물이 흐르는 제 눈가로... \r\n손을 뻗어 봅니다... \r\n이 눈물마저... \r\n멈출 수 있다면...\r\n','left','b',46,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(4,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신의 미소','\r\n당신의 미소는... \r\n그 미소하나로... \r\n저를 기쁘게 합니다 \r\n\r\n당신이 기뻐 웃으실 땐... \r\n세상을 다 가진 듯한 기쁨이 \r\n제 안에 충만하기 때문입니다 \r\n\r\n당신의 미소는... \r\n그 미소하나로... \r\n저를 감동시킵니다 \r\n\r\n제가 슬프거나 힘들 땐... \r\n당신의 아름다운 미소가 \r\n제겐 힘이 되기 때문입니다 \r\n\r\n당신의 미소는... \r\n그 미소하나로... \r\n포근하게 합니다 \r\n\r\n당신의 그 감싸주듯 웃는... \r\n그 미소가 제겐... \r\n따스한 봄을 연상케 하기에… \r\n\r\n당신의 미소는... \r\n그 미소하나로... \r\n저를 슬프게 합니다 \r\n\r\n당신의 눈이 슬픔을 띠고 미소지으실 땐... \r\n제 안에 폭풍과도 같은 파도가 \r\n휘몰아치기 때문입니다\r\n','left','b',49,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(5,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','당신은...','\r\n당신은 \r\n제겐 행복입니다 \r\n언제 부터인가... \r\n전... \r\n제가 아닌 다른 사람에게 \r\n제 자신에게도 할 수 없었던... \r\n것들을 하고 싶었고... \r\n제가 아닌 다른 사람이... \r\n저로 인해 \r\n기뻐하고... \r\n상처받고... \r\n슬퍼할 수 있음을... \r\n알았습니다 \r\n당신의 사랑이 비록... \r\n제 사랑이 아닐지라도... \r\n전 당신을 사랑합니다 \r\n당신의 마음을 제가 가질 수 없다 해도... \r\n전 당신을 사랑합니다...\r\n','left','b',50,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(6,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','내안에 당신이 있습니다','\r\n내안에 당신이 있습니다 \r\n새벽의 이슬을 머금은 듯한 \r\n당신의 눈동자는 \r\n아직 내안에 있습니다 \r\n\r\n내안에 당신이 있습니다 \r\n당신의 그 고운 목소리와 \r\n아름다운 당신의 모습은 \r\n아직 내안에 있습니다 \r\n\r\n내안에 당신이 있습니다 \r\n당신이 제곁에서 멀리 떠나버렸지만... \r\n당신의 향기가 남아 \r\n시리도록 아프게 \r\n아직 내안에 있습니다\r\n','left','b',48,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(7,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','내 사랑은...','\r\n내 사랑은... \r\n슾픈 눈물로 하루를 적신다... \r\n\r\n내 사랑은... \r\n언제나 내 가슴속에서 살아 숨쉰다... \r\n\r\n내 사랑은... \r\n영원하다... \r\n\r\n내 사랑은... \r\n비록 내 곁을 떠났지만... \r\n\r\n내 사랑은... \r\n영원하다... \r\n\r\n내 사랑은... \r\n그래서 더 힘들다...\r\n','left','b',51,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(8,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑한 후에...','\r\n사랑은... \r\n멀어져 이별이 되고... \r\n\r\n\r\n이별은... \r\n아쉬움이 되어 눈물로 흐르고... \r\n\r\n\r\n아쉬움은... \r\n그리움을 만들고... \r\n\r\n\r\n그리움은... \r\n텅 비어버린 가슴속에 시린 아픔을 남기고... \r\n\r\n\r\n텅 비어버린 가슴속에 남은것은... \r\n당신의 발자국 입니다...\r\n','left','b',57,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(9,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','꽃','\r\n슬픔은 \r\n다음에 필 \r\n기쁨이란 이름의 꽃을 \r\n피우기위한 눈물이다 \r\n\r\n눈물은 \r\n가슴속에 피어난 \r\n그리움이란 이름의 상처를 \r\n씻어내리기 위한 단비다 \r\n\r\n아픔은 \r\n다음에 쉽게 꺾이지 않도록 \r\n웃음이란 이름의 줄기를 \r\n단단하게 만들기 위한 작은 상처다 \r\n\r\n이별은 \r\n사랑이란 이름의 꽃의 시듦이 아니라 \r\n새로운 사랑을 활짝 피우기 위해 \r\n아름답게 퍼지는 사랑의 꽃씨다\r\n','left','b',63,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(10,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','상처','\r\n사랑하는 사람이 있습니다 \r\n\r\n항상 아프지 않았으면... \r\n하는 사람이 있습니다 \r\n\r\n항상 밝게 웃음지었으면... \r\n하는 사람이 있습니다 \r\n\r\n항상 가습에 상처 받지 않았으면... \r\n하는 사람이 있습나다 \r\n\r\n이 사람의 아프고... \r\n이 사람의 슬프고... \r\n이 사람의 가슴 깊은 곳의 상처가... \r\n저를 가습아프게 하는것은... \r\n\r\n사람이 사람을 아프게 하고... \r\n사람이 사람을 슬프게 하고... \r\n사람이 사람을 상처 입히는 것이... \r\n\r\n가장 사랑하는 사람이 가장 아프게 하고... \r\n가장 사랑하는 사람이 가장 슬프게 하고... \r\n가장 사랑하는 사람이 가장 상처받게 한다는것을... \r\n알게 되었기 때문입니다...\r\n','left','b',60,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(11,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','추억','\r\n짧은 추억하나... \r\n그리고... \r\n작은 슬픔하나... \r\n다른건 모두 잊었는데 \r\n슬픔만이 내가슴속에 남아있다 \r\n하지만 버릴 수 없다 \r\n그토록 날 지탱해준 당신인데... \r\n내게 남은건 이거 하나뿐인데... \r\n언젠가 잊게 되는 날이면... \r\n내모습 달라지겠지... \r\n더 이상 아파하지 않아도 되겠지... \r\n하지만 지금은... \r\n영원히 잠들고 싶다 \r\n영원히 꿈꾸고 싶다 \r\n그 꿈속에서 당신을 만나 수 있다면...\r\n','left','b',56,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(12,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑 그리고 이별','\r\n사랑하려 할 땐 \r\n그렇게도 힘들게 만나서 \r\n\r\n이별 하려 할 땐 \r\n한순간에 헤어지는데 \r\n\r\n사랑할 때는 \r\n느끼지 못했던 사랑안의 사랑이 \r\n\r\n이별 후엔 \r\n너무 크게 느껴져 더 아프다 \r\n\r\n사랑을 할 때는 \r\n눈으로는 울어도 \r\n가슴으로 웃음 짓지만 \r\n\r\n이별 후에는 \r\n눈으로는 웃음짓고 \r\n가슴으로 눈물 짓는다\r\n','left','b',62,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(13,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사랑아...','\r\n사랑아... \r\n너는 내 눈물을 좋아하는구나... \r\n\r\n너와 함께 할때면... \r\n난 행복해서 울고... \r\n\r\n네가 먼곳에 있을땐... \r\n난 외로워서 울고... \r\n\r\n네가 안보이면... \r\n난 기다림에 지쳐 울고... \r\n\r\n너와 이별하고 난 지금은... \r\n그리움에 눈물 흘린다 \r\n\r\n사랑아... \r\n너는 내 눈물을 좋아하는구나...\r\n','left','b',61,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(14,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','내 가슴에 품을 수 없는 너','\r\n마음을 담을 수 있는 그릇이 있다면 얼마나 좋을까? \r\n이 마음을 담아 보여줄 수 있을텐데.. \r\n\r\n사랑이란 언제나 \r\n해피엔딩이 될 수 없을을... \r\n\r\n이 작은 가슴에 \r\n너를 품어보고 싶다... \r\n\r\n네게 한 남자로서 다가갈 수 없다면 \r\n떨어지지 않는 발걸음... \r\n돌려야 하겠지... \r\n\r\n눈물로 이별하지 말고 \r\n웃으면서 이별하자... \r\n\r\n지금은... \r\n최소한 지금은... \r\n\r\n다시 사랑할 수 없을까봐 \r\n가슴졸이지 말자...\r\n','left','b',62,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(15,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','녹슨 철문','\r\n내 가슴엔 \r\n녹슨 철문하나가 있다 \r\n\r\n너무나도 오랜시간 \r\n열지 않았던 녹슨 철문... \r\n\r\n너무나도... \r\n너무나도 오랜 기라림 끝에 손님이 찾아왔다 \r\n\r\n설레이는 가슴을 안고 \r\n힘껏 철문을 열었다 \r\n\r\n철문안에는 \r\n선물로 가득 채워 넣었다 \r\n\r\n하지만 손님은... \r\n그냥 손님일 뿐이었나보다 \r\n\r\n오래 머물지도 않고 \r\n오래 함께 하지도 못한채 떠나 버렸다 \r\n\r\n이제 다시... \r\n문을 닫아야 할 때인가보다... \r\n\r\n문을 힘껏 닫는다... \r\n녹슨 철문은 쉽게 닫히지 않는다 \r\n\r\n그 사람이 떠나간 곳을 \r\n망연히 바라본다 \r\n\r\n이제 오지 않을것임을 알면서도 \r\n오랫동안 돌아본다 \r\n\r\n쉽사리 떨어지지 않는 발걸음 뒤로 돌린다 \r\n떨어지는 눈물은 닦지 않는다 \r\n\r\n뒤로 돌아본 곳에는... \r\n아무것도 없는 텅빈 공간... \r\n\r\n남아있는것은 온통... \r\n그녀의 발자욱뿐... \r\n\r\n이제 녹슨 철문에... \r\n기름칠을 해야겠다 \r\n\r\n이제 언제 열리게 될지 모를... \r\n녹슨 철문에...\r\n','left','b',66,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(16,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','시간의 엇갈림','\r\n내 시간은 멈춰 있는데 \r\n세상의 시간은 그렇게도 계속 흘러간다 \r\n\r\n그 사람은 아이를 낳고 \r\n어느덧 아이가 성년이 되고 \r\n\r\n성년은 또 아이를 낳고 \r\n그사람은 할머니가 되어 가겠지... \r\n\r\n내 죽어버린 심장은 \r\n언제쯤 다시 살아날까 \r\n\r\n언제 내가 다시 \r\n살아있음을 느끼게 될까\r\n','left','b',86,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(17,8,'poetry5',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','오지 않을 사람은 오지 않는다','\r\n아무리 외로움에 몸서리쳐도...\r\n오지 않을 사람은 오지 않는다\r\n\r\n이제는 잊어야지 하면서도…\r\n음악을 들으면 그 사람 생각이 나고\r\n\r\n귀를 막고 주위를 둘러보면…\r\n보이는 아름다운 장소들…\r\n\r\n이곳에 그 사람과 함꼐 왔으면 하며\r\n떠오르는 그 얼굴…\r\n\r\n귀를 막고 눈을 감아도…\r\n각인되어 떠오르는 얼굴…\r\n\r\n숨을 참고 참아봐도…\r\n가슴은 터져버릴 듯 아프기만 하다\r\n\r\n눈을 떠도 보이지 않는다\r\n이제 눈물이 시야를 막는다\r\n\r\n비라도 내린다면 눈물을 감춰줄텐데 하며\r\n피식 웃어봐도\r\n\r\n아파서 우는 가슴의 통증은\r\n나락속에 홀로 서 있는 듯 하다\r\n \r\n잊을 사람은 잊어야 한다\r\n오지 않을 사람은 오지 않는다\r\n','left','b',68,'2016-04-25 14:49:39','2016-04-25 14:49:39');
/*!40000 ALTER TABLE `bo_table_poetry5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry5_comments`
--

DROP TABLE IF EXISTS `bo_table_poetry5_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry5_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry5_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry5` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry5_comments`
--

LOCK TABLES `bo_table_poetry5_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry5_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry5_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry5_files`
--

DROP TABLE IF EXISTS `bo_table_poetry5_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry5_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry5_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry5` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry5_files`
--

LOCK TABLES `bo_table_poetry5_files` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry5_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry5_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry6`
--

DROP TABLE IF EXISTS `bo_table_poetry6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry6` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_poetry6_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry6`
--

LOCK TABLES `bo_table_poetry6` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry6` DISABLE KEYS */;
INSERT INTO `bo_table_poetry6` VALUES (1,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 편지 - 김남주 -','\r\n그대만큼 사랑스러운 사람릉 본 일이 없다.\r\n그대만큼 나를 외롭게 한 이도 없었다.\r\n이 생각을 하면 내가 꼭 울게 된다.\r\n\r\n\r\n그재만큼 나를 정직하게 해준 이가 없었다.\r\n내 안을 비추는 그대는 제일로 영롱한 거울 그대의 깊이를\r\n다 지나가면 글썽이는 눈매의 내가 있다 나의 시작이다\r\n\r\n\r\n그대에게 매일 편지를 쓴다.\r\n한 구절 쓰면 한구절을 와서 읽는 그대\r\n그래서 이 편지는 한번도 부치지 않는다.\r\n','left','b',53,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(2,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 홀로서기 - 서정윤 -','\r\n【[서정윤]홀로서기 】\r\n\r\n--둘이 만나 서는 게 아니라 \r\n\r\n홀로 선 둘이가 만나는 것이다--\r\n\r\n\r\n1\r\n\r\n기다림은\r\n\r\n만남을 목적으로 하지 않아도\r\n\r\n좋다.\r\n\r\n가슴이 아프면\r\n\r\n아픈 채로,\r\n\r\n바람이 불면\r\n\r\n고개를 높이 쳐들면서, 날리는\r\n\r\n아득한 미소.\r\n\r\n어디엔가 있을\r\n\r\n나의 한 쪽을 위해\r\n\r\n헤매이던 숱한 방황의 날들.\r\n\r\n태어나면서 이미\r\n\r\n누군가가 정해졌었다면,\r\n\r\n이제는 그를\r\n\r\n만나고 싶다.\r\n\r\n\r\n2\r\n\r\n홀로 선다는 건\r\n\r\n가슴을 치며 우는 것보다\r\n\r\n더 어렵지만\r\n\r\n자신을 옭아맨 동아줄,\r\n\r\n그 아득한 끝에서 대롱이며\r\n\r\n그래도 멀리,\r\n\r\n멀리 하늘을 우러르는\r\n\r\n이 작은 가슴.\r\n\r\n누군가를 열심히 갈구해도\r\n\r\n아무도\r\n\r\n나의 가슴을 채워줄 수 없고\r\n\r\n결국은\r\n\r\n홀로 살아간다는 걸\r\n\r\n한겨울의 눈발처럼 만났을 때\r\n\r\n나는\r\n\r\n또다시 쓰러져 있었다.\r\n\r\n\r\n3\r\n\r\n지우고 싶다\r\n\r\n이 표정없는 얼굴을\r\n\r\n버리고 싶다\r\n\r\n아무도\r\n\r\n나의 아픔을 돌아보지 않고\r\n\r\n오히려 수렁 속으로\r\n\r\n깊은 수렁 속으로\r\n\r\n밀어 넣고 있는데\r\n\r\n내 손엔 아무것도 없으니\r\n\r\n미소를 지으며\r\n\r\n체념할 수밖에......\r\n\r\n위태위태하게 부여잡고 있던 것들이\r\n\r\n산산이 부서져 버린 어느날, 나는\r\n\r\n허전한 뒷모습을 보이며\r\n\r\n돌아서고 있었다.\r\n\r\n\r\n4\r\n\r\n누군가가\r\n\r\n나를 향해 다가오면\r\n\r\n나는 <움찔> 뒤로 물러난다.\r\n\r\n그러다가 그가\r\n\r\n나에게서 멀어져 갈 땐\r\n\r\n발을 동동 구르며 손짓을 한다.\r\n\r\n\r\n만날 때 이미\r\n\r\n헤어질 준비를 하는 우리는,\r\n\r\n아주 냉담하게 돌아설 수 있지만\r\n\r\n시간이 지나면 지날수록\r\n\r\n아파오는 가슴 한 구석의 나무는\r\n\r\n심하게 흔들리고 있다.\r\n\r\n\r\n떠나는 사람은 잡을 수 없고\r\n\r\n떠날 사람을 잡는 것만큼\r\n\r\n자신이 초라할 수 없다.\r\n\r\n떠날 사람은 보내어야 한다\r\n\r\n하늘이 무너지는 아픔일지라도.\r\n\r\n\r\n5\r\n\r\n나를 지켜야 한다\r\n\r\n누군가가 나를 차지하려 해도\r\n\r\n그 허전한 아픔을\r\n\r\n또다시 느끼지 않기 위해\r\n\r\n마음의 창을 꼭꼭 닫아야 한다.\r\n\r\n수많은 시행착오를 거쳐\r\n\r\n얻은 이 절실한 결론을\r\n\r\n<이번에는>\r\n\r\n<이번에는>하며 어겨보아도\r\n\r\n결국 인간에게서는\r\n\r\n더이상 바랄 수 없음을 깨달은 날\r\n\r\n나는 비록 공허한 웃음이지만\r\n\r\n웃음을 웃을 수 있었다.\r\n\r\n\r\n아무도 대신 죽어주지 않는\r\n\r\n나의 삶,\r\n\r\n좀더 열심히 살아야겠다.\r\n\r\n\r\n6\r\n\r\n나의 전부를 벗고\r\n\r\n알몸뚱이로 모두를 대하고 싶다.\r\n\r\n그것조차\r\n\r\n가면이라고 말할지라도\r\n\r\n변명하지 않으며 살고 싶다.\r\n\r\n말로써 행동을 만들지 않고\r\n\r\n행동으로 말할 수 있을 때까지\r\n\r\n나는 혼자가 되리라.\r\n\r\n그 끝없는 고독과의 투쟁을\r\n\r\n혼자의 힘으로 견디어야 한다.\r\n\r\n부리에,\r\n\r\n발톱에 피가 맺혀도\r\n\r\n아무도 도와주지 않는다.\r\n\r\n\r\n숱한 불면의 밤을 새우며\r\n\r\n<홀로서기>를 익혀야 한다.\r\n\r\n\r\n7\r\n\r\n죽음이\r\n\r\n인생의 종말이 아니기에\r\n\r\n이 추한 모습을 보이면서도\r\n\r\n살아 있다.\r\n\r\n나의 얼굴에 대해\r\n\r\n내가\r\n\r\n책임질 수 있을 때까지\r\n\r\n홀로임을 느껴야 한다.\r\n\r\n\r\n그리고\r\n\r\n어딘가에서\r\n\r\n홀로 서고 있을, 그 누군가를 위해\r\n\r\n촛불을 들자.\r\n\r\n허전한 가슴을 메울 수는 없지만\r\n\r\n<이것이다>하며\r\n\r\n살아가고 싶다.\r\n\r\n누구보다도 열심히 사랑을 하자.\r\n','left','b',58,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(3,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 우연 - 김수연 -','\r\n운명은 문득 생각지 않게 몰고간다\r\n우연히 한 자리에 않았다가\r\n영원히 때칠 수 없는\r\n질긴 밧줄로 메어진다\r\n\r\n스쳐 지나치지 못하고\r\n강하게 이끌리는\r\n고뇌의 산실이 되어\r\n\r\n꿈을 채우고\r\n그리움을 채우고\r\n안타까움을 갖게 하고\r\n깊은 그리움과 만족하고\r\n자랑스러운 깃발이 된다.\r\n','left','b',57,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(4,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 아직도 사랑한다는 말에 -서정윤-','\r\n사랑한다는 말로도 \r\n다 전할수 없는 \r\n내 마음을 \r\n이렇게 노을에다 그립니다. \r\n\r\n사랑의 고통이 아무리 클지라도 \r\n결국 사랑할 수 밖에, \r\n\r\n다른 어떤 것으로도 \r\n대신할 수 없는 우리 삶이기에 \r\n내 몸과 마음을 태워 \r\n이 저녁 밝혀드립니다. \r\n\r\n다시 하나가 되는 게 \r\n그다지 두려울지라도 \r\n목숨 붙어 있는 지금은 \r\n그대에게 내 사랑 \r\n전하고 싶어요.. \r\n\r\n아직도 사랑한다는 말에 \r\n익숙하지 못하기에 \r\n붉은 노을 한 편 적어 \r\n그대의 창에 보냅니다.\r\n','left','b',52,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(5,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 하늘처럼 맑은 사람이 되고 싶다 -서정윤-    ','\r\n햇살같이 가벼운 몸으로 \r\n맑은 하늘을 거닐며 \r\n바람처럼 살고 싶다 \r\n\r\n언제 어디서나 \r\n흔적없이 사라질 수 있는 \r\n바람의 뒷모습이고 싶다 \r\n\r\n하늘을 보며 \r\n땅을 보며 \r\n그리고 살고 싶다 \r\n\r\n길 위에 떠 있는 하늘 \r\n어디엔가 그리운 얼굴이 숨어 있다 \r\n\r\n깃털처럼 가볍게 만나는 \r\n신의 모습이 \r\n인간의 소리들로 지쳐 있다 \r\n\r\n불기둥과 구름기둥을 앞세우고 \r\n알타이 산맥을 넘어 \r\n약속의 땅에 동굴을 파던 때부터 \r\n끈질기게 이어져 오던 사랑의 땅 \r\n\r\n눈물의 땅에서 \r\n이제는 바다처럼 조용히 \r\n자신의 일을 하고 싶다 \r\n\r\n맑은 눈으로 \r\n이 땅을 지켜야지\r\n','left','b',65,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(6,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 눈물을 아시나요 -서정윤-','\r\n차가운 눈빛으로\r\n사치스런 외로움으로\r\n\r\n애써 외면하려 했던 리듬들이\r\n나를 흔들고 있어요.\r\n\r\n기와지붕 미끄러진 바람이\r\n생의 남은 조각들을\r\n머리 속에 어질러 놓으면\r\n\r\n느껴지던 그 꽃잎의 붉은 빛 눈물\r\n입 안으로 웅얼거리며 따라하던\r\n사슴 무리의 울음소리\r\n\r\n찾아보려 고개를 돌려도\r\n눈앞에서 사라지는 그대여\r\n눈물을 아시나요.\r\n\r\n얼룩이 다시 꽃으로 피는\r\n밀려 가면서 내가 할 수 있는 건\r\n노래 부르기밖에 없어라.\r\n','left','b',59,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(7,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 창가에서 -서정윤-','\r\n어느날\r\n불현듯 눈물이 날 때가 있다\r\n누구를 향한것도 아닌채\r\n다시 쓸쓸해진다\r\n\r\n기쁨들로 인해\r\n혼자일 수 밖에 없는 날\r\n슬픔은 눈물들로 인해\r\n더욱 구차해 질 수 있기에\r\n노래를 불러도\r\n가슴속 상처가 아려서\r\n다시 되풀이되고\r\n\r\n내가 넘어야 할 언덕은\r\n이럴수록 자꾸 높아지는데\r\n어디쯤에서\r\n쉼표를 찍어야 할지\r\n마침표가 먼저 나오려 한다\r\n','left','b',58,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(8,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 여분의 죄 -서정윤-','\r\n슬프지 말아야 하리라\r\n꽃이 지려 꽃잎이 떨어지고\r\n울먹이는 하늘로 맨손을 흔들면\r\n우리들의 가슴엔\r\n어느새 \r\n얼룩진 인생이 걸려 있다.\r\n\r\n\r\n화려하지 않아도 좋다\r\n그렇다고 \r\n슬플 필요도 없다\r\n삶은 \r\n그렇게 그렇게 끝이 나고\r\n우리들의 그림자도\r\n아득한 풍경으로 그려지는데\r\n이제, 어둠은 사라지면\r\n어둠은 빛에 살아 남아\r\n우리에게 그림자를 찾아준다\r\n\r\n아침 노을이 저녁 노을이다\r\n꽃은 언젠가 져야 하지만\r\n노을이 흩어지는 하늘쯤에서\r\n다정한 사람을 떠나 보낸 쓸쓸함과\r\n슬픈 소원을 가지는 우리는\r\n사랑할 수도 미워할 수도 없는\r\n그 어느 누구를 위해\r\n조용한 기도를 하자.\r\n\r\n가장 슬픈건\r\n슬퍼할 수조차 없는 마음이다\r\n열린 하늘의 밤은\r\n이제 열리는\r\n아침 하늘에 의해 닫혀지고\r\n여분의 죄값으로\r\n언젠가\r\n우리에게 밤을 다오\r\n생존을 위해 그림자를 가지고\r\n생존을 위해 시간은 흘러가고\r\n생존을 위해 인간이 되자\r\n인생의 약속은 지켜야 한다\r\n','left','b',53,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(9,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 사랑한다는 것으로 -서정윤-','\r\n사랑한다는 것으로\r\n새의 날개를 꺾어\r\n너의 곁에 두려 하지 말고 \r\n가슴에 작은 보금자리를 만들어\r\n종일 지친 날개를 쉬고 다시 날아갈\r\n힘을 줄 수 있어야 하리라.\r\n','left','b',58,'2016-04-25 14:49:39','2016-04-25 14:49:39'),(10,9,'poetry6',NULL,'n','',1,'admin','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','- 그대 -김수연-','\r\n가까운 듯 멀게 느껴지는\r\n안타까운 이\r\n\r\n메스꺼움처럼 울렁이게 하는\r\n그리운 이\r\n\r\n너무 늦어 찾아온\r\n시리도록 아리운\r\n눈물겨운 이\r\n\r\n두 손 가슴에 모두어 잡고\r\n마음 조바심케 하는\r\n애달픈이\r\n\r\n시간과 공간을 초월하여\r\n마음의 여백에 색체로 그려낼\r\n따사로운 이\r\n','left','b',52,'2016-04-25 14:49:39','2016-04-25 14:49:39');
/*!40000 ALTER TABLE `bo_table_poetry6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry6_comments`
--

DROP TABLE IF EXISTS `bo_table_poetry6_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry6_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry6_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry6` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry6_comments`
--

LOCK TABLES `bo_table_poetry6_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry6_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry6_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_poetry6_files`
--

DROP TABLE IF EXISTS `bo_table_poetry6_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_poetry6_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_poetry6_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_poetry6` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_poetry6_files`
--

LOCK TABLES `bo_table_poetry6_files` WRITE;
/*!40000 ALTER TABLE `bo_table_poetry6_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_poetry6_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio`
--

DROP TABLE IF EXISTS `bo_table_portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_portfolio_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio`
--

LOCK TABLES `bo_table_portfolio` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio` DISABLE KEYS */;
INSERT INTO `bo_table_portfolio` VALUES (1,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','','','','','n','테스트','','dsdsds','r',0,'2017-03-11 15:40:53','2017-03-11 15:40:53'),(2,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:46:52','2017-03-11 15:46:52'),(3,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:49:34','2017-03-11 15:49:34'),(4,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:50:31','2017-03-11 15:50:31'),(5,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:52:39','2017-03-11 15:52:39'),(6,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:54:51','2017-03-11 15:54:51'),(7,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:55:00','2017-03-11 15:55:00'),(8,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:55:01','2017-03-11 15:55:01'),(9,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:55:14','2017-03-11 15:55:14'),(10,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:59:09','2017-03-11 15:59:09'),(11,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 15:59:37','2017-03-11 15:59:37'),(12,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:00:59','2017-03-11 16:00:59'),(13,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:02:58','2017-03-11 16:02:58'),(14,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:04:08','2017-03-11 16:04:08'),(15,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:05:13','2017-03-11 16:05:13'),(16,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:10:44','2017-03-11 16:10:44'),(17,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:13:17','2017-03-11 16:13:17'),(18,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:13:39','2017-03-11 16:13:39'),(19,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:14:44','2017-03-11 16:14:44'),(20,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:15:39','2017-03-11 16:15:39'),(21,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:16:40','2017-03-11 16:16:40'),(22,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:23:01','2017-03-11 16:23:01'),(23,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:24:33','2017-03-11 16:24:33'),(24,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:24:36','2017-03-11 16:24:36'),(25,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:24:48','2017-03-11 16:24:48'),(26,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:33:21','2017-03-11 16:33:21'),(27,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:36:49','2017-03-11 16:36:49'),(28,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:37:21','2017-03-11 16:37:21'),(29,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:40:48','2017-03-11 16:40:48'),(30,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:41:46','2017-03-11 16:41:46'),(31,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:42:35','2017-03-11 16:42:35'),(32,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','dsdsdssadd\r\nsdasdsad34245\r\n43434\r\n543\r\n6543645654','right','b',0,'2017-03-11 16:47:58','2017-03-11 16:47:58'),(33,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:00:38','2017-03-11 17:00:38'),(34,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:02:03','2017-03-11 17:02:03'),(35,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:05:43','2017-03-11 17:05:43'),(36,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:07:59','2017-03-11 17:07:59'),(37,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:11:33','2017-03-11 17:11:33'),(38,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:15:39','2017-03-11 17:15:39'),(39,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:21:31','2017-03-11 17:21:31'),(40,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:22:30','2017-03-11 17:22:30'),(41,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','eqwqeewq\r\n213323232\r\n324343\r\n4343\r\n432\r\n423432432','right','b',0,'2017-03-11 17:23:39','2017-03-11 17:23:39'),(42,37,'portfolio',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','n','테스트','SADDDSA\r\nDASSA\r\nDSDD\r\nSSDASA\r\nDSAS','right','b',0,'2017-03-11 17:55:17','2017-03-11 17:55:17');
/*!40000 ALTER TABLE `bo_table_portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_3d`
--

DROP TABLE IF EXISTS `bo_table_portfolio_3d`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_3d` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_portfolio_3d_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_3d`
--

LOCK TABLES `bo_table_portfolio_3d` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_3d` DISABLE KEYS */;
INSERT INTO `bo_table_portfolio_3d` VALUES (1,1,'portfolio_3d','','n',NULL,1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com',NULL,NULL,NULL,'n','3d maya modeling','.','right','b',1,'2018-01-06 16:01:03','2018-01-06 16:01:03');
/*!40000 ALTER TABLE `bo_table_portfolio_3d` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_3d_comments`
--

DROP TABLE IF EXISTS `bo_table_portfolio_3d_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_3d_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_portfolio_3d_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_portfolio_3d` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_3d_comments`
--

LOCK TABLES `bo_table_portfolio_3d_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_3d_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_portfolio_3d_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_3d_files`
--

DROP TABLE IF EXISTS `bo_table_portfolio_3d_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_3d_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_portfolio_3d_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_portfolio_3d` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_3d_files`
--

LOCK TABLES `bo_table_portfolio_3d_files` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_3d_files` DISABLE KEYS */;
INSERT INTO `bo_table_portfolio_3d_files` VALUES (2,1,0,'/attach/20180106/','1515222063.jpg','image/jpeg',792046,'black_secret.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20180106/1515222063.jpg','2018-01-06 16:01:03','2018-01-06 16:01:03'),(3,1,0,'/attach/20180106/Thumbnail/','1515222063.jpg','image/jpeg',2617,'black_secret.jpg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20180106/Thumbnail/1515222063.jpg','2018-01-06 16:01:04','2018-01-06 16:01:04');
/*!40000 ALTER TABLE `bo_table_portfolio_3d_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_art`
--

DROP TABLE IF EXISTS `bo_table_portfolio_art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_portfolio_art_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_art`
--

LOCK TABLES `bo_table_portfolio_art` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_art` DISABLE KEYS */;
INSERT INTO `bo_table_portfolio_art` VALUES (1,3,'portfolio_art',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','3dwebart@naver.com','','','','y','사쿠라대전 아이리스 캐릭터','사쿠라대전 아이리스 캐릭터 일러스트','left','b',128,'2016-04-25 14:44:30','2016-04-25 14:44:30'),(2,3,'portfolio_art',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','','','','','n','test','test','right','b',4,'2016-05-02 16:58:22','2016-05-02 16:58:22'),(3,3,'portfolio_art',NULL,'n','',1,'최고관리자','*A4B6157319038724E3560894F7F932C8886EBFCF','','','','','n','test2','ㅇㄴㅇ','right','b',32,'2016-05-03 14:15:06','2016-05-03 14:15:06');
/*!40000 ALTER TABLE `bo_table_portfolio_art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_art_comments`
--

DROP TABLE IF EXISTS `bo_table_portfolio_art_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_art_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_portfolio_art_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_portfolio_art` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_art_comments`
--

LOCK TABLES `bo_table_portfolio_art_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_art_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_portfolio_art_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_art_files`
--

DROP TABLE IF EXISTS `bo_table_portfolio_art_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_art_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_portfolio_art_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_portfolio_art` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_art_files`
--

LOCK TABLES `bo_table_portfolio_art_files` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_art_files` DISABLE KEYS */;
INSERT INTO `bo_table_portfolio_art_files` VALUES (1,1,0,'/attach/20160418/','1460955179.zip','application/zip',712472,'iris.zip','/home/hosting_users/mayamenual/www/attach/20160418/1460955179.zip','2016-04-25 14:50:26','2016-04-25 14:50:26'),(2,1,0,'/attach/20160418/','1460955179.png','image/png',67872,'iris.png','/home/hosting_users/mayamenual/www/attach/20160418/1460955179.png','2016-04-25 14:50:26','2016-04-25 14:50:26'),(3,3,0,'/attach/20160503/','1462252506.gif','image/gif',115255,'_copy.gif','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20160503/1462252506.gif','2016-05-03 14:15:06','2016-05-03 14:15:06'),(4,3,0,'/attach/20160503/','1462252506.png','image/png',2290,'_tb2_on.png','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20160503/1462252506.png','2016-05-03 14:15:06','2016-05-03 14:15:06'),(5,3,0,'/attach/20160503/','1462252506.jpeg','image/jpeg',54747,'01.jpeg','/Users/ParkKH/Desktop/web-develope/my-website/3dwebart/attach/20160503/1462252506.jpeg','2016-05-03 14:15:06','2016-05-03 14:15:06');
/*!40000 ALTER TABLE `bo_table_portfolio_art_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_comments`
--

DROP TABLE IF EXISTS `bo_table_portfolio_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_portfolio_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_portfolio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_comments`
--

LOCK TABLES `bo_table_portfolio_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_portfolio_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_files`
--

DROP TABLE IF EXISTS `bo_table_portfolio_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_portfolio_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_portfolio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_files`
--

LOCK TABLES `bo_table_portfolio_files` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_portfolio_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_website`
--

DROP TABLE IF EXISTS `bo_table_portfolio_website`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_portfolio_website_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_website`
--

LOCK TABLES `bo_table_portfolio_website` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_website` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_portfolio_website` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_website_comments`
--

DROP TABLE IF EXISTS `bo_table_portfolio_website_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_website_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_portfolio_website_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_portfolio_website` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_website_comments`
--

LOCK TABLES `bo_table_portfolio_website_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_website_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_portfolio_website_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_portfolio_website_files`
--

DROP TABLE IF EXISTS `bo_table_portfolio_website_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_portfolio_website_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_portfolio_website_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_portfolio_website` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_portfolio_website_files`
--

LOCK TABLES `bo_table_portfolio_website_files` WRITE;
/*!40000 ALTER TABLE `bo_table_portfolio_website_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_portfolio_website_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_portfolio`
--

DROP TABLE IF EXISTS `bo_table_ps_portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_ps_portfolio_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_portfolio`
--

LOCK TABLES `bo_table_ps_portfolio` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_portfolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_portfolio_comments`
--

DROP TABLE IF EXISTS `bo_table_ps_portfolio_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_portfolio_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ps_portfolio_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ps_portfolio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_portfolio_comments`
--

LOCK TABLES `bo_table_ps_portfolio_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_portfolio_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_portfolio_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_portfolio_files`
--

DROP TABLE IF EXISTS `bo_table_ps_portfolio_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_portfolio_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ps_portfolio_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ps_portfolio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_portfolio_files`
--

LOCK TABLES `bo_table_ps_portfolio_files` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_portfolio_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_portfolio_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_qna`
--

DROP TABLE IF EXISTS `bo_table_ps_qna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_qna` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_ps_qna_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_qna`
--

LOCK TABLES `bo_table_ps_qna` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_qna` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_qna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_qna_comments`
--

DROP TABLE IF EXISTS `bo_table_ps_qna_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_qna_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ps_qna_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ps_qna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_qna_comments`
--

LOCK TABLES `bo_table_ps_qna_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_qna_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_qna_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_qna_files`
--

DROP TABLE IF EXISTS `bo_table_ps_qna_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_qna_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ps_qna_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ps_qna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_qna_files`
--

LOCK TABLES `bo_table_ps_qna_files` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_qna_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_qna_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_tip`
--

DROP TABLE IF EXISTS `bo_table_ps_tip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_tip` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_ps_tip_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_tip`
--

LOCK TABLES `bo_table_ps_tip` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_tip` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_tip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_tip_comments`
--

DROP TABLE IF EXISTS `bo_table_ps_tip_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_tip_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ps_tip_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ps_tip` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_tip_comments`
--

LOCK TABLES `bo_table_ps_tip_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_tip_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_tip_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_tip_files`
--

DROP TABLE IF EXISTS `bo_table_ps_tip_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_tip_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ps_tip_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ps_tip` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_tip_files`
--

LOCK TABLES `bo_table_ps_tip_files` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_tip_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_tip_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_tutorial`
--

DROP TABLE IF EXISTS `bo_table_ps_tutorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `bbs_id` int(11) NOT NULL COMMENT '게시판 번호(get 인덱스)',
  `bbs_name` varchar(64) NOT NULL COMMENT '게시판 이름(get 라벨)',
  `cate` varchar(255) DEFAULT NULL COMMENT '카테고리("|"로 구분)',
  `notice_yn` char(1) NOT NULL DEFAULT 'n' COMMENT '공지글 여부',
  `notice_yn_text` varchar(64) DEFAULT NULL COMMENT '공지글 입력(ex : 이벤트)',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `movie_size` varchar(10) DEFAULT NULL COMMENT '유투브 동영상 화면비울(wide, vga)',
  `movie_id` varchar(30) DEFAULT NULL COMMENT '유투브 동영상 ID',
  `link` varchar(50) DEFAULT NULL COMMENT '링크(http://)',
  `html` char(1) NOT NULL DEFAULT 'n' COMMENT 'HTML 사용',
  `subject` varchar(512) NOT NULL COMMENT '글 제목',
  `content` text NOT NULL COMMENT '글 내용',
  `img_align` char(6) NOT NULL DEFAULT 'left' COMMENT '이미지 좌우정렬',
  `img_pos` char(1) NOT NULL DEFAULT 'b' COMMENT '본문 기준 이미지 위치',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `bbs_id` (`bbs_id`),
  CONSTRAINT `bo_table_ps_tutorial_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_tutorial`
--

LOCK TABLES `bo_table_ps_tutorial` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_tutorial` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_tutorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_tutorial_comments`
--

DROP TABLE IF EXISTS `bo_table_ps_tutorial_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_tutorial_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원번호',
  `writer` varchar(50) NOT NULL COMMENT '작성자 이름',
  `pwd` varchar(150) NOT NULL COMMENT '비밀번호',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `content` text NOT NULL COMMENT '글 내용',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ps_tutorial_comments_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ps_tutorial` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_tutorial_comments`
--

LOCK TABLES `bo_table_ps_tutorial_comments` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_tutorial_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_tutorial_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bo_table_ps_tutorial_files`
--

DROP TABLE IF EXISTS `bo_table_ps_tutorial_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bo_table_ps_tutorial_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_kind` int(11) NOT NULL COMMENT '저장된 파일 분류',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `bo_table_ps_tutorial_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bo_table_ps_tutorial` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_table_ps_tutorial_files`
--

LOCK TABLES `bo_table_ps_tutorial_files` WRITE;
/*!40000 ALTER TABLE `bo_table_ps_tutorial_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `bo_table_ps_tutorial_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deco_files`
--

DROP TABLE IF EXISTS `deco_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deco_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `document_id` int(11) NOT NULL COMMENT '부모글 일련번호',
  `file_area` varchar(20) NOT NULL COMMENT '파일 위치',
  `dir` varchar(256) NOT NULL COMMENT '저정된 폴더',
  `file_name` varchar(256) NOT NULL COMMENT '저장된 파일이름',
  `file_type` varchar(20) NOT NULL COMMENT '파일형식',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `origin_name` varchar(256) NOT NULL COMMENT '원본파일명',
  `full_path` varchar(256) NOT NULL COMMENT '전체경로',
  `reg_date` datetime NOT NULL COMMENT '작성일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `document_id` (`document_id`),
  CONSTRAINT `deco_files_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `bbs_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='게시판 상단 및 하단 이미지 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deco_files`
--

LOCK TABLES `deco_files` WRITE;
/*!40000 ALTER TABLE `deco_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `deco_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `language` char(2) NOT NULL COMMENT '언어종류',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='언어 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'en'),(2,'ko');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_config`
--

DROP TABLE IF EXISTS `member_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `member_skin` varchar(32) NOT NULL COMMENT '회원 스킨',
  `homepage` char(1) NOT NULL COMMENT '홈페이지 입력 보이기',
  `homepage_ess` char(1) NOT NULL COMMENT '홈페이지 필수입력 여부',
  `address` char(1) NOT NULL COMMENT '주소 입력 보이기',
  `address_ess` char(1) NOT NULL COMMENT '주소 필수입력 여부',
  `tel` char(1) NOT NULL COMMENT '전화번호 입력 보이기',
  `tel_ess` char(1) NOT NULL COMMENT '전화번호 필수입력 여부',
  `fax` char(1) NOT NULL COMMENT '팩스번호 입력 보이기',
  `fax_ess` char(1) NOT NULL COMMENT '팩스번호 필수입력 여부',
  `sign` char(1) NOT NULL COMMENT '서명 압력 보이기',
  `sign_ess` char(1) NOT NULL COMMENT '서명 필수입력 여부',
  `self_intro` char(1) NOT NULL COMMENT '지기소개 입력 보이기',
  `self_intro_ess` char(1) NOT NULL COMMENT '지기소개 필수입력 야부',
  `user_level` int(11) NOT NULL COMMENT '회원가입시 권한',
  `image_use` int(11) NOT NULL COMMENT '회원 아이콘 사용여부 0:미사용, 1:아이콘만 사용, 2:아이콘+이름 사용',
  `image_level` int(11) NOT NULL COMMENT '회원 아이콘 업로드 권한',
  `image_size` int(11) NOT NULL COMMENT '회원 아이콘 최대 용량',
  `image_width` int(11) NOT NULL COMMENT '회원 아이콘 이미지 가로 사이즈',
  `image_height` int(11) NOT NULL COMMENT '회원 아이콘 이미지 세로 사이즈',
  `id_nic_ban` text NOT NULL COMMENT '아이디, 닉네임 금지단어(, 로 구분)',
  `terms` text NOT NULL COMMENT '회원가입 약관',
  `policy` text NOT NULL COMMENT '개인정보 취급방침',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='회원 설정 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_config`
--

LOCK TABLES `member_config` WRITE;
/*!40000 ALTER TABLE `member_config` DISABLE KEYS */;
INSERT INTO `member_config` VALUES (1,'basic','n','n','n','n','y','y','n','n','n','n','n','n',4,0,4,5000,30,30,'admin,administrator,관리자,운영자,어드민,주인장,webmaster,웹마스터,sysop,시삽,시샵,manager,매니저,메니저,root,루트,su,guest,방문객','<div class=\"terms\">\r\n  <ul>\r\n    <h2>제1장 총칙</h2>\r\n\r\n    <li>\r\n      <span class=\"title\">제1조(목적)</span>\r\n\r\n      이 약관은 회사가 온라인으로 제공하는 디지털콘텐츠(이하 \"콘텐츠\"라고 한다) 및 제반서비스의 이용과 관련하여 회사와 이용자와의 권리, 의무 및 책임사항 등을 규정함을 목적으로 합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제2조(정의)</span>\r\n\r\n      이 약관에서 사용하는 용어의 정의는 다음과 같습니다.\r\n\r\n      <ol>\r\n        <li>\r\n          \"회사\"라 함은 \"콘텐츠\" 산업과 관련된 경제활동을 영위하는 자로서 콘텐츠 및 제반서비스를 제공하는 자를 말합니다.\r\n\r\n        </li>\r\n        <li>\r\n          \"이용자\"라 함은 \"회사\"의 사이트에 접속하여 이 약관에 따라 \"회사\"가 제공하는 \"콘텐츠\" 및 제반서비스를 이용하는 회원 및 비회원을 말합니다.\r\n\r\n        </li>\r\n        <li>\r\n          \"회원\"이라 함은 \"회사\"와 이용계약을 체결하고 \"이용자\" 아이디(ID)를 부여받은 \"이용자\"로서 \"회사\"의 정보를 지속적으로 제공받으며 \"회사\"가 제공하는 서비스를 지속적으로 이용할 수 있는 자를 말합니다.\r\n\r\n        </li>\r\n        <li>\r\n          \"비회원\"이라 함은 \"회원\"이 아니면서 \"회사\"가 제공하는 서비스를 이용하는 자를 말합니다.\r\n\r\n        </li>\r\n        <li>\r\n          \"콘텐츠\"라 함은 정보통신망이용촉진 및 정보보호 등에 관한 법률 제2조 제1항 제1호의 규정에 의한 정보통신망에서 사용되는 부호·문자·음성·음향·이미지 또는 영상 등으로 표현된 자료 또는 정보로서, 그 보존 및 이용에 있어서 효용을 높일 수 있도록 전자적 형태로 제작 또는 처리된 것을 말합니다.\r\n\r\n        </li>\r\n        <li>\r\n          \"아이디(ID)\"라 함은 \"회원\"의 식별과 서비스이용을 위하여 \"회원\"이 정하고 \"회사\"가 승인하는 문자 또는 숫자의 조합을 말합니다.\r\n\r\n        </li>\r\n        <li>\r\n          \"비밀번호(PASSWORD)\"라 함은 \"회원\"이 부여받은 \"아이디\"와 일치되는 \"회원\"임을 확인하고 비밀보호를 위해 \"회원\" 자신이 정한 문자 또는 숫자의 조합을 말합니다.\r\n\r\n        </li>\r\n      </ol>\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제3조(신원정보 등의 제공)</span>\r\n\r\n      \"회사\"는 이 약관의 내용, 상호, 대표자 성명, 영업소 소재지 주소(소비자의 불만을 처리할 수 있는 곳의 주소를 포함), 전화번호, 모사전송번호, 전자우편주소, 사업자등록번호, 통신판매업 신고번호 및 개인정보관리책임자 등을 이용자가 쉽게 알 수 있도록 온라인 서비스초기화면에 게시합니다. 다만, 약관은 이용자가 연결화면을 통하여 볼 수 있도록 할 수 있습니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제4조(약관의 게시 등)</span><br />\r\n\r\n      ① \"회사\"는 이 약관을 \"회원\"이 그 전부를 인쇄할 수 있고 거래과정에서 해당 약관의 내용을 확인할 수 있도록 기술적 조치를 취합니다.<br />\r\n\r\n      ② \"회사\"는 \"이용자\"가 \"회사\"와 이 약관의 내용에 관하여 질의 및 응답할 수 있도록 기술적 장치를 설치합니다.<br />\r\n\r\n      ③ \"회사\"는 \"이용자\"가 약관에 동의하기에 앞서 약관에 정하여져 있는 내용 중 청약철회, 환불조건 등과 같은 중요한 내용을 이용자가 쉽게 이해할 수 있도록 별도의 연결화면 또는 팝업화면 등을 제공하여 \"이용자\"의 확인을 구합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제5조(약관의 개정 등)</span><br />\r\n\r\n      ① \"회사\"는 온라인 디지털콘텐츠산업 발전법, 전자상거래 등에서의 소비자보호에 관한 법률, 약관의 규제에 관한 법률 등 관련법을 위배하지 않는 범위에서 이 약관을 개정할 수 있습니다.<br />\r\n\r\n      ② \"회사\"가 약관을 개정할 경우에는 적용일자 및 개정사유를 명시하여 현행약관과 함께 서비스초기화면에 그 적용일자 7일 이전부터 적용일 후 상당한 기간동안 공지하고, 기존회원에게는 개정약관을 전자우편주소로 발송합니다.<br />\r\n\r\n      ③ \"회사\"가 약관을 개정할 경우에는 개정약관 공지 후 개정약관의 적용에 대한 \"이용자\"의 동의 여부를 확인합니다. \"이용자\"가 개정약관의 적용에 동의하지 않는 경우 \"회사\" 또는 \"이용자\"는 콘텐츠 이용계약을 해지할 수 있습니다. 이때, \"회사\"는 계약해지로 인하여 \"이용자\"가 입은 손해를 배상합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제6조(약관의 해석)</span>\r\n\r\n      이 약관에서 정하지 아니한 사항과 이 약관의 해석에 관하여는 온라인 디지털콘텐츠산업 발전법, 전자상거래 등에서의 소비자보호에 관한 법률, 약관의 규제에 관한 법률, 문화체육관광부장관이 정하는 디지털콘텐츠이용자보호지침, 기타 관계법령 또는 상관례에 따릅니다.\r\n\r\n    </li>\r\n    <h2>제2장 회원가입</h2>\r\n\r\n    <li>\r\n      <span class=\"title\">제7조(회원가입)</span><br />\r\n\r\n      ① 회원가입은 \"이용자\"가 약관의 내용에 대하여 동의를 하고 회원가입신청을 한 후 \"회사\"가 이러한 신청에 대하여 승낙함으로써 체결됩니다.<br />\r\n\r\n      ② 회원가입신청서에는 다음 사항을 기재해야 합니다. 1호 내지 3호의 사항은 필수사항이며, 그 외의 사항은 선택사항입니다.\r\n\r\n      <ol>\r\n        <li>\r\n          \"회원\"의 성명과 주민등록번호 또는 인터넷상 개인식별번호\r\n\r\n        </li>\r\n        <li>\r\n          \"아이디\"와 \"비밀번호\"\r\n\r\n        </li>\r\n        <li>\r\n          전자우편주소\r\n\r\n        </li>\r\n        <li>\r\n          이용하려는 \"콘텐츠\"의 종류\r\n\r\n        </li>\r\n        <li>\r\n          기타 \"회사\"가 필요하다고 인정하는 사항\r\n\r\n        </li>\r\n      </ol>\r\n      ③ \"회사\"는 상기 \"이용자\"의 신청에 대하여 회원가입을 승낙함을 원칙으로 합니다. 다만, \"회사\"는 다음 각 호에 해당하는 신청에 대하여는 승낙을 하지 않을 수 있습니다.\r\n\r\n      <ol>\r\n        <li>\r\n          가입신청자가 이 약관에 의하여 이전에 회원자격을 상실한 적이 있는 경우\r\n\r\n        </li>\r\n        <li>\r\n          실명이 아니거나 타인의 명의를 이용한 경우\r\n\r\n        </li>\r\n        <li>\r\n          허위의 정보를 기재하거나, 회사가 제시하는 내용을 기재하지 않은 경우\r\n\r\n        </li>\r\n        <li>\r\n          이용자의 귀책사유로 인하여 승인이 불가능하거나 기타 규정한 제반 사항을 위반하며 신청하는 경우\r\n\r\n        </li>\r\n      </ol>\r\n      ④ \"회사\"는 서비스 관련 설비의 여유가 없거나, 기술상 또는 업무상 문제가 있는 경우에는 승낙을 유보할 수 있습니다.<br />\r\n\r\n      ⑤ 제3항과 제4항에 따라 회원가입신청의 승낙을 하지 아니하거나 유보한 경우, \"회사\"는 이를 신청자에게 알려야 합니다. \"회사\"의 귀책사유 없이 신청자에게 통지할 수 없는 경우에는 예외로 합니다.<br />\r\n\r\n      ⑥ 회원가입계약의 성립 시기는 \"회사\"의 승낙이 \"이용자\"에게 도달한 시점으로 합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제8조(미성년자의 회원가입에 관한 특칙)</span><br />\r\n\r\n      ① 만 14세 미만의 \"이용자\"는 개인정보의 수집 및 이용목적에 대하여 충분히 숙지하고 부모 등 법정대리인의 동의를 얻은 후에 회원가입을 신청하고 본인의 개인정보를 제공하여야 합니다.<br />\r\n\r\n      ② 회사는 부모 등 법정대리인의 동의에 대한 확인절차를 거치지 않은 14세 미만 이용자에 대하여는 가입을 취소 또는 불허합니다.<br />\r\n\r\n      ③ 만 14세 미만 \"이용자\"의 부모 등 법정대리인은 아동에 대한 개인정보의 열람, 정정, 갱신을 요청하거나 회원가입에 대한 동의를 철회할 수 있으며, 이러한 경우에 \"회사\"는 지체 없이 필요한 조치를 취해야 합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제9조(회원정보의 변경)</span><br />\r\n\r\n      ① \"회원\"은 개인정보관리화면을 통하여 언제든지 자신의 개인정보를 열람하고 수정할 수 있습니다.<br />\r\n\r\n      ② \"회원\"은 회원가입신청 시 기재한 사항이 변경되었을 경우 온라인으로 수정을 하거나 전자우편 기타 방법으로 \"회사\"에 대하여 그 변경사항을 알려야 합니다.<br />\r\n\r\n      ③ 제2항의 변경사항을 \"회사\"에 알리지 않아 발생한 불이익에 대하여 \"회사\"는 책임지지 않습니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제10조(\"회원\"의 \"아이디\" 및 \"비밀번호\"의 관리에 대한 의무)</span><br />\r\n\r\n      ① \"회원\"의 \"아이디\"와 \"비밀번호\"에 관한 관리책임은 \"회원\"에게 있으며, 이를 제3자가 이용하도록 하여서는 안 됩니다.\r\n\r\n      ② \"회원\"은 \"아이디\" 및 \"비밀번호\"가 도용되거나 제3자에 의해 사용되고 있음을 인지한 경우에는 이를 즉시 \"회사\"에 통지하고 \"회사\"의 안내에 따라야 합니다.\r\n\r\n      ③ 제2항의 경우에 해당 \"회원\"이 \"회사\"에 그 사실을 통지하지 않거나, 통지한 경우에도 \"회사\"의 안내에 따르지 않아 발생한 불이익에 대하여 \"회사\"는 책임지지 않습니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제11조(\"회원\"에 대한 통지)</span><br />\r\n\r\n      ① \"회사\"가 \"회원\"에 대한 통지를 하는 경우 \"회원\"이 지정한 전자우편주소로 할 수 있습니다.<br />\r\n\r\n      ② \"회사\"는 \"회원\" 전체에 대한 통지의 경우 7일 이상 \"회사\"의 게시판에 게시함으로써 제1항의 통지에 갈음할 수 있습니다. 다만, \"회원\" 본인의 거래와 관련하여 중대한 영향을 미치는 사항에 대하여는 제1항의 통지를 합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제12조(회원탈퇴 및 자격 상실 등)</span><br />\r\n\r\n      ① \"회원\"은 \"회사\"에 언제든지 탈퇴를 요청할 수 있으며 \"회사\"는 즉시 회원탈퇴를 처리합니다.<br />\r\n\r\n      ② \"회원\"이 다음 각호의 사유에 해당하는 경우, \"회사\"는 회원자격을 제한 및 정지시킬 수 있습니다.\r\n\r\n      <ol>\r\n        <li>\r\n          가입신청 시에 허위내용을 등록한 경우\r\n\r\n        </li>\r\n        <li>\r\n          \"회사\"의 서비스이용대금, 기타 \"회사\"의 서비스이용에 관련하여 회원이 부담하는 채무를 기일에 이행하지 않는 경우\r\n\r\n        </li>\r\n        <li>\r\n          다른 사람의 \"회사\"의 서비스이용을 방해하거나 그 정보를 도용하는 등 전자상거래 질서를 위협하는 경우\r\n\r\n        </li>\r\n        <li>\r\n          \"회사\"를 이용하여 법령 또는 이 약관이 금지하거나 공서양속에 반하는 행위를 하는 경우\r\n\r\n        </li>\r\n      </ol>\r\n      ③ \"회사\"가 회원자격을 제한·정지시킨 후, 동일한 행위가 2회 이상 반복되거나 30일 이내에 그 사유가 시정되지 아니하는 경우 \"회사\"는 회원자격을 상실시킬 수 있습니다.<br />\r\n\r\n      ④ \"회사\"가 회원자격을 상실시키는 경우에는 회원등록을 말소합니다. 이 경우 \"회원\"에게 이를 통지하고, 회원등록 말소 전에 최소한 30일 이상의 기간을 정하여 소명할 기회를 부여합니다.\r\n\r\n    </li>\r\n    <h2>제3장 콘텐츠이용계약</h2>\r\n\r\n    <li>\r\n      <span class=\"title\">제13조(\"콘텐츠\"의 내용 등의 게시)</span><br />\r\n\r\n      ① \"회사\"는 다음 사항을 해당 \"콘텐츠\"의 이용초기화면이나 그 포장에 \"이용자\"가 알기 쉽게 표시합니다.\r\n\r\n      <ol>\r\n        <li>\r\n          \"콘텐츠\"의 명칭 또는 제호\r\n\r\n        </li>\r\n        <li>\r\n          \"콘텐츠\"의 제작 및 표시 연월일\r\n\r\n        </li>\r\n        <li>\r\n          \"콘텐츠\" 제작자의 성명(법인인 경우에는 법인의 명칭), 주소, 전화번호\r\n\r\n        </li>\r\n        <li>\r\n          \"콘텐츠\"의 내용, 이용방법, 이용료 기타 이용조건\r\n\r\n        </li>\r\n      </ol>\r\n      ② \"회사\"는 \"콘텐츠\"별 이용가능기기 및 이용에 필요한 최소한의 기술사양에 관한 정보를 계약체결과정에서 \"이용자\"에게 제공합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제14조(이용계약의 성립 등)</span><br />\r\n\r\n      ① \"이용자\"는 \"회사\"가 제공하는 다음 또는 이와 유사한 절차에 의하여 이용신청을 합니다. \"회사\"는 계약 체결 전에 각 호의 사항에 관하여 \"이용자\"가 정확하게 이해하고 실수 또는 착오 없이 거래할 수 있도록 정보를 제공합니다.\r\n\r\n      <ol>\r\n        <li>\r\n          \"콘텐츠\" 목록의 열람 및 선택\r\n\r\n        </li>\r\n        <li>\r\n          성명, 주소, 전화번호(또는 이동전화번호), 전자우편주소 등의 입력\r\n\r\n        </li>\r\n        <li>\r\n          약관내용, 청약철회가 불가능한 \"콘텐츠\"에 대해 \"회사\"가 취한 조치에 관련한 내용에 대한 확인\r\n\r\n        </li>\r\n        <li>\r\n          이 약관에 동의하고 위 제3호의 사항을 확인하거나 거부하는 표시(예, 마우스 클릭)\r\n\r\n        </li>\r\n        <li>\r\n          \"콘텐츠\"의 이용신청에 관한 확인 또는 \"회사\"의 확인에 대한 동의\r\n\r\n        </li>\r\n        <li>\r\n          결제방법의 선택\r\n\r\n        </li>\r\n      </ol>\r\n      ② \"회사\"는 \"이용자\"의 이용신청이 다음 각 호에 해당하는 경우에는 승낙하지 않거나 승낙을 유보할 수 있습니다.\r\n\r\n      <ol>\r\n        <li>\r\n          실명이 아니거나 타인의 명의를 이용한 경우\r\n\r\n        </li>\r\n        <li>\r\n          허위의 정보를 기재하거나, \"회사\"가 제시하는 내용을 기재하지 않은 경우\r\n\r\n        </li>\r\n        <li>\r\n          미성년자가 청소년보호법에 의해서 이용이 금지되는 \"콘텐츠\"를 이용하고자 하는 경우\r\n\r\n        </li>\r\n        <li>\r\n          서비스 관련 설비의 여유가 없거나, 기술상 또는 업무상 문제가 있는 경우\r\n\r\n        </li>\r\n      </ol>\r\n      ③ \"회사\"의 승낙이 제16조 제1항의 수신확인통지형태로 \"이용자\"에게 도달한 시점에 계약이 성립한 것으로 봅니다.<br />\r\n\r\n      ④ \"회사\"의 승낙의 의사표시에는 \"이용자\"의 이용신청에 대한 확인 및 서비스제공 가능여부, 이용신청의 정정·취소 등에 관한 정보 등을 포함합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제15조(미성년자 이용계약에 관한 특칙)</span><br />\r\n\r\n      \"회사\"는 만 20세 미만의 미성년이용자가 유료서비스를 이용하고자 하는 경우에 부모 등 법정 대리인의 동의를 얻거나, 계약체결 후 추인을 얻지 않으면 미성년자 본인 또는 법정대리인이 그 계약을 취소할 수 있다는 내용을 계약체결 전에 고지하는 조치를 취합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제16조(수신확인통지·이용신청 변경 및 취소)</span><br />\r\n\r\n      ① \"회사\"는 \"이용자\"의 이용신청이 있는 경우 \"이용자\"에게 수신확인통지를 합니다.<br />\r\n\r\n      ② 수신확인통지를 받은 \"이용자\"는 의사표시의 불일치 등이 있는 경우에는 수신확인통지를 받은 후 즉시 이용신청 변경 및 취소를 요청할 수 있고, \"회사\"는 서비스제공 전에 \"이용자\"의 요청이 있는 경우에는 지체 없이 그 요청에 따라 처리하여야 합니다. 다만, 이미 대금을 지불한 경우에는 청약철회 등에 관한 제27조의 규정에 따릅니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제17조(\"회사\"의 의무)</span><br />\r\n\r\n      ① \"회사\"는 법령과 이 약관이 정하는 권리의 행사와 의무의 이행을 신의에 좇아 성실하게 하여야 합니다.<br />\r\n\r\n      ② \"회사\"는 \"이용자\"가 안전하게 \"콘텐츠\"를 이용할 수 있도록 개인정보(신용정보 포함)보호를 위해 보안시스템을 갖추어야 하며 개인정보보호정책을 공시하고 준수합니다.<br />\r\n\r\n      ③ \"회사\"는 \"이용자\"가 콘텐츠이용 및 그 대금내역을 수시로 확인할 수 있도록 조치합니다.<br />\r\n\r\n      ④ \"회사\"는 콘텐츠이용과 관련하여 \"이용자\"로부터 제기된 의견이나 불만이 정당하다고 인정할 경우에는 이를 지체없이 처리합니다. 이용자가 제기한 의견이나 불만사항에 대해서는 게시판을 활용하거나 전자우편 등을 통하여 그 처리과정 및 결과를 전달합니다.<br />\r\n\r\n      ⑤ \"회사\"는 이 약관에서 정한 의무 위반으로 인하여 \"이용자\"가 입은 손해를 배상합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제18조(\"이용자\"의 의무)</span><br />\r\n\r\n      ① \"이용자\"는 다음 행위를 하여서는 안 됩니다.\r\n\r\n      <ol>\r\n        <li>\r\n          신청 또는 변경 시 허위내용의 기재\r\n\r\n        </li>\r\n        <li>\r\n          타인의 정보도용\r\n\r\n        </li>\r\n        <li>\r\n          \"회사\"에 게시된 정보의 변경\r\n\r\n        </li>\r\n        <li>\r\n          \"회사\"가 금지한 정보(컴퓨터 프로그램 등)의 송신 또는 게시\r\n\r\n        </li>\r\n        <li>\r\n          \"회사\"와 기타 제3자의 저작권 등 지적재산권에 대한 침해\r\n\r\n        </li>\r\n        <li>\r\n          \"회사\" 및 기타 제3자의 명예를 손상시키거나 업무를 방해하는 행위\r\n\r\n        </li>\r\n        <li>\r\n          외설 또는 폭력적인 말이나 글, 화상, 음향, 기타 공서양속에 반하는 정보를 \"회사\"의 사이트에 공개 또는 게시하는 행위\r\n\r\n        </li>\r\n        <li>\r\n          기타 불법적이거나 부당한 행위\r\n\r\n        </li>\r\n      </ol>\r\n      ② \"이용자\"는 관계법령, 이 약관의 규정, 이용안내 및 \"콘텐츠\"와 관련하여 공지한 주의사항, \"회사\"가 통지하는 사항 등을 준수하여야 하며, 기타 \"회사\"의 업무에 방해되는 행위를 하여서는 안 됩니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제19조(지급방법)</span><br />\r\n\r\n      \"콘텐츠\"의 이용에 대한 대금지급방법은 다음 각 호의 방법 중 가능한 방법으로 할 수 있습니다. 다만, \"회사\"는 \"이용자\"의 지급방법에 대하여 어떠한 명목의 수수료도 추가하여 징수하지 않습니다.\r\n\r\n      <ol>\r\n        <li>\r\n          폰뱅킹, 인터넷뱅킹, 메일 뱅킹 등의 각종 계좌이체\r\n\r\n        </li>\r\n        <li>\r\n          선불카드, 직불카드, 신용카드 등의 각종 카드결제\r\n\r\n        </li>\r\n        <li>\r\n          온라인무통장입금\r\n\r\n\r\n        </li>\r\n        <li>\r\n          전자화폐에 의한 결제\r\n\r\n        </li>\r\n        <li>\r\n          마일리지 등 \"회사\"가 지급한 포인트에 의한 결제\r\n\r\n        </li>\r\n        <li>\r\n          \"회사\"와 계약을 맺었거나 \"회사\"가 인정한 상품권에 의한 결제\r\n\r\n        </li>\r\n        <li>\r\n          전화 또는 휴대전화를 이용한 결제\r\n\r\n        </li>\r\n        <li>\r\n          기타 전자적 지급방법에 의한 대금지급 등\r\n\r\n        </li>\r\n      </ol>\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제20조(콘텐츠서비스의 제공 및 중단)</span><br />\r\n\r\n      ① 콘텐츠서비스는 연중무휴, 1일 24시간 제공함을 원칙으로 합니다.<br />\r\n\r\n      ② \"회사\"는 컴퓨터 등 정보통신설비의 보수점검, 교체 및 고장, 통신두절 또는 운영상 상당한 이유가 있는 경우 콘텐츠서비스의 제공을 일시적으로 중단할 수 있습니다. 이 경우 \"회사\"는 제11조[\"회원\"에 대한 통지]에 정한 방법으로 \"이용자\"에게 통지합니다. 다만, \"회사\"가 사전에 통지할 수 없는 부득이한 사유가 있는 경우 사후에 통지할 수 있습니다.<br />\r\n\r\n      ③ \"회사\"는 상당한 이유 없이 콘텐츠서비스의 제공이 일시적으로 중단됨으로 인하여 \"이용자\"가 입은 손해에 대하여 배상합니다. 다만, \"회사\"가 고의 또는 과실이 없음을 입증하는 경우에는 그러하지 아니합니다.<br />\r\n\r\n      ④ \"회사\"는 콘텐츠서비스의 제공에 필요한 경우 정기점검을 실시할 수 있으며, 정기점검시간은 서비스제공화면에 공지한 바에 따릅니다.<br />\r\n\r\n      ⑤ 사업종목의 전환, 사업의 포기, 업체 간의 통합 등의 이유로 콘텐츠서비스를 제공할 수 없게 되는 경우에는 \"회사\"는 제11조[\"회원\"에 대한 통지]에 정한 방법으로 \"이용자\"에게 통지하고 당초 \"회사\"에서 제시한 조건에 따라 \"이용자\"에게 보상합니다. 다만, \"회사\"가 보상기준 등을 고지하지 아니하거나, 고지한 보상기준이 적절하지 않은 경우에는 \"이용자\"들의 마일리지 또는 적립금 등을 현물 또는 현금으로 \"이용자\"에게 지급합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제21조(콘텐츠서비스의 변경)</span><br />\r\n\r\n      ① \"회사\"는 상당한 이유가 있는 경우에 운영상, 기술상의 필요에 따라 제공하고 있는 콘텐츠서비스를 변경할 수 있습니다.<br />\r\n\r\n      ② \"회사\"는 콘텐츠서비스의 내용, 이용방법, 이용시간을 변경할 경우에 변경사유, 변경될 콘텐츠서비스의 내용 및 제공일자 등을 그 변경 전 7일 이상 해당 콘텐츠초기화면에 게시합니다.<br />\r\n\r\n      ③ 제2항의 경우에 변경된 내용이 중대하거나 \"이용자\"에게 불리한 경우에는 \"회사\"가 해당 콘텐츠서비스를 제공받는 \"이용자\"에게 제11조[\"회원\"에 대한 통지]에 정한 방법으로 통지하고 동의를 받습니다. 이때, \"회사\"는 동의를 거절한 \"이용자\"에 대하여는 변경전 서비스를 제공합니다. 다만, 그러한 서비스 제공이 불가능할 경우 계약을 해지할 수 있습니다.<br />\r\n\r\n      ④ \"회사\"는 제1항에 의한 서비스의 변경 및 제3항에 의한 계약의 해지로 인하여 \"이용자\"가 입은 손해를 배상합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제22조(정보의 제공 및 광고의 게재)</span><br />\r\n\r\n      ① \"회사\"는 \"이용자\"가 콘텐츠이용 중 필요하다고 인정되는 다양한 정보를 공지사항이나 전자우편 등의 방법으로 \"회원\"에게 제공할 수 있습니다. 다만, \"회원\"은 언제든지 전자우편 등을 통하여 수신 거절을 할 수 있습니다.<br />\r\n\r\n      ② 제1항의 정보를 전화 및 모사전송기기에 의하여 전송하려고 하는 경우에는 \"회원\"의 사전 동의를 받아서 전송합니다.<br />\r\n\r\n      ③ \"회사\"는 \"콘텐츠\"서비스 제공과 관련하여 콘텐츠화면, 홈페이지, 전자우편 등에 광고를 게재할 수 있습니다. 광고가 게재된 전자우편 등을 수신한 \"회원\"은 수신거절을 \"회사\"에게 할 수 있습니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제23조(게시물의 삭제)</span><br />\r\n\r\n      ① \"회사\"는 게시판에 정보통신망이용촉진 및 정보보호 등에 관한 법률을 위반한 청소년유해매체물이 게시되어 있는 경우에는 이를 지체 없이 삭제 합니다. 다만, 19세 이상의 \"이용자\"만 이용할 수 있는 게시판은 예외로 합니다.<br />\r\n\r\n      ② \"회사\"가 운영하는 게시판 등에 게시된 정보로 인하여 법률상 이익이 침해된 자는 \"회사\"에게 당해 정보의 삭제 또는 반박내용의 게재를 요청할 수 있습니다. 이 경우 \"회사\"는 지체 없이 필요한 조치를 취하고 이를 즉시 신청인에게 통지합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제24조(저작권 등의 귀속)</span><br />\r\n\r\n      ① \"회사\"가 작성한 저작물에 대한 저작권 기타 지적재산권은 \"회사\"에 귀속합니다.<br />\r\n\r\n      ② \"회사\"가 제공하는 서비스 중 제휴계약에 의해 제공되는 저작물에 대한 저작권 기타 지적재산권은 해당 제공업체에 귀속합니다.<br />\r\n\r\n      ③ \"이용자\"는 \"회사\"가 제공하는 서비스를 이용함으로써 얻은 정보 중 \"회사\" 또는 제공업체에 지적재산권이 귀속된 정보를 \"회사\" 또는 제공업체의 사전승낙 없이 복제, 전송, 출판, 배포, 방송 기타 방법에 의하여 영리목적으로 이용하거나 제3자에게 이용하게 하여서는 안 됩니다.<br />\r\n\r\n      ④ \"회사\"는 약정에 따라 \"이용자\"의 저작물을 사용하는 경우 당해 \"이용자\"의 허락을 받습니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제25조(개인정보보호)</span><br />\r\n\r\n      ① \"회사\"는 제7조 제2항의 신청서기재사항 이외에 \"이용자\"의 콘텐츠이용에 필요한 최소한의 정보를 수집할 수 있습니다. 이를 위해 \"회사\"가 문의한 사항에 관해 \"이용자\"는 진실한 내용을 성실하게 고지하여야 합니다.<br />\r\n\r\n      ② \"회사\"가 \"이용자\"의 개인 식별이 가능한 \"개인정보\"를 수집하는 때에는 당해 \"이용자\"의 동의를 받습니다.<br />\r\n\r\n      ③ \"회사\"는 \"이용자\"가 이용신청 등에서 제공한 정보와 제1항에 의하여 수집한 정보를 당해 \"이용자\"의 동의 없이 목적 외로 이용하거나 제3자에게 제공할 수 없으며, 이를 위반한 경우에 모든 책임은 \"회사\"가 집니다. 다만, 다음의 경우에는 예외로 합니다.\r\n\r\n      <ol>\r\n        <li>\r\n          통계작성, 학술연구 또는 시장조사를 위하여 필요한 경우로서 특정 개인을 식별할 수 없는 형태로 제공하는 경우\r\n\r\n        </li>\r\n        <li>\r\n          \"콘텐츠\" 제공에 따른 요금정산을 위하여 필요한 경우\r\n\r\n        </li>\r\n        <li>\r\n          도용방지를 위하여 본인확인에 필요한 경우\r\n\r\n        </li>\r\n        <li>\r\n          약관의 규정 또는 법령에 의하여 필요한 불가피한 사유가 있는 경우\r\n\r\n        </li>\r\n      </ol>\r\n      ④ \"회사\"가 제2항과 제3항에 의해 \"이용자\"의 동의를 받아야 하는 경우에는 \"개인정보\"관리책임자의 신원(소속, 성명 및 전화번호 기타 연락처), 정보의 수집목적 및 이용목적, 제3자에 대한 정보제공관련사항(제공받는 자, 제공목적 및 제공할 정보의 내용)등에 관하여 정보통신망이용촉진 및 정보보호 등에 관한 법률 제22조 제2항이 규정한 사항을 명시하고 고지하여야 합니다.<br />\r\n\r\n      ⑤ \"이용자\"는 언제든지 제3항의 동의를 임의로 철회할 수 있습니다.<br />\r\n\r\n      ⑥ \"이용자\"는 언제든지 \"회사\"가 가지고 있는 자신의 \"개인정보\"에 대해 열람 및 오류의 정정을 요구할 수 있으며, \"회사\"는 이에 대해 지체 없이 필요한 조치를 취할 의무를 집니다. \"이용자\"가 오류의 정정을 요구한 경우에는 \"회사\"는 그 오류를 정정할 때까지 당해 \"개인정보\"를 이용하지 않습니다.<br />\r\n\r\n      ⑦ \"회사\"는 개인정보보호를 위하여 관리자를 한정하여 그 수를 최소화하며, 신용카드, 은행계좌 등을 포함한 \"이용자\"의 \"개인정보\"의 분실, 도난, 유출, 변조 등으로 인한 \"이용자\"의 손해에 대하여 책임을 집니다.<br />\r\n\r\n      ⑧ \"회사\" 또는 그로부터 \"개인정보\"를 제공받은 자는 \"이용자\"가 동의한 범위 내에서 \"개인정보\"를 사용할 수 있으며, 목적이 달성된 경우에는 당해 \"개인정보\"를 지체 없이 파기합니다.<br />\r\n\r\n      ⑨ \"회사\"는 정보통신망이용촉진 및 정보보호에 관한 법률 등 관계 법령이 정하는 바에 따라 \"이용자\"의 \"개인정보\"를 보호하기 위해 노력합니다. \"개인정보\"의 보호 및 사용에 대해서는 관련법령 및 \"회사\"의 개인정보보호정책이 적용됩니다.\r\n\r\n    </li>\r\n    <h2>제4장 콘텐츠이용계약의 청약철회, 계약해제·해지 및 이용제한</h2>\r\n\r\n    <li>\r\n      <span class=\"title\">제26조(\"이용자\"의 청약철회와 계약해제·해지)</span><br />\r\n\r\n      ① \"회사\"와 \"콘텐츠\"의 이용에 관한 계약을 체결한 \"이용자\"는 수신확인의 통지를 받은 날로부터 7일 이내에는 청약의 철회를 할 수 있습니다. 다만, \"회사\"가 다음 각 호중 하나의 조치를 취한 경우에는 \"이용자\"의 청약철회권이 제한될 수 있습니다.\r\n\r\n      <ol>\r\n        <li>\r\n          청약의 철회가 불가능한 \"콘텐츠\"에 대한 사실을 표시사항에 포함한 경우\r\n\r\n        </li>\r\n        <li>\r\n          시용상품을 제공한 경우\r\n\r\n        </li>\r\n        <li>\r\n          한시적 또는 일부이용 등의 방법을 제공한 경우\r\n\r\n        </li>\r\n      </ol>\r\n      ② \"이용자\"는 다음 각 호의 사유가 있을 때에는 당해 \"콘텐츠\"를 공급받은 날로부터 3월 이내 또는 그 사실을 안 날 또는 알 수 있었던 날부터 30일 이내에 콘텐츠이용계약을 해제·해지할 수 있습니다.\r\n\r\n      <ol>\r\n        <li>\r\n          이용계약에서 약정한 \"콘텐츠\"가 제공되지 않는 경우\r\n\r\n        </li>\r\n        <li>\r\n          제공되는 \"콘텐츠\"가 표시·광고 등과 상이하거나 현저한 차이가 있는 경우\r\n\r\n        </li>\r\n        <li>\r\n          기타 \"콘텐츠\"의 결함으로 정상적인 이용이 현저히 불가능한 경우\r\n\r\n        </li>\r\n      </ol>\r\n      ③ 제1항의 청약철회와 제2항의 계약해제·해지는 \"이용자\"가 전화, 전자우편 또는 모사전송으로 \"회사\"에 그 의사를 표시한 때에 효력이 발생합니다.<br />\r\n\r\n      ④ \"회사\"는 제3항에 따라 \"이용자\"가 표시한 청약철회 또는 계약해제·해지의 의사표시를 수신한 후 지체 없이 이러한 사실을 \"이용자\"에게 회신합니다.<br />\r\n\r\n      ⑤ \"이용자\"는 제2항의 사유로 계약해제·해지의 의사표시를 하기 전에 상당한 기간을 정하여 완전한 \"콘텐츠\" 혹은 서비스이용의 하자에 대한 치유를 요구할 수 있습니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제27조(\"이용자\"의 청약철회와 계약해제·해지의 효과)</span><br />\r\n\r\n      ① \"회사\"는 \"이용자\"가 청약철회의 의사표시를 한 날로부터 또는 \"이용자\"에게 계약해제·해지의 의사표시에 대하여 회신한 날로부터 3영업일 이내에 대금의 결제와 동일한 방법으로 이를 환급하여야 하며, 동일한 방법으로 환불이 불가능할 때에는 이를 사전에 고지하여야 합니다. 이 경우 \"회사\"가 \"이용자\"에게 환급을 지연한 때에는 그 지연기간에 대하여 공정거래위원회가 정하여 고시하는 지연이자율을 곱하여 산정한 지연이자를 지급합니다.<br />\r\n\r\n      ② \"회사\"가 제1항에 따라 환급할 경우에 \"이용자\"가 서비스이용으로부터 얻은 이익에 해당하는 금액을 공제하고 환급할 수 있습니다.<br />\r\n\r\n      ③ \"회사\"는 위 대금을 환급함에 있어서 \"이용자\"가 신용카드 또는 전자화폐 등의 결제수단으로 재화 등의 대금을 지급한 때에는 지체 없이 당해 결제수단을 제공한 사업자로 하여금 재화 등의 대금의 청구를 정지 또는 취소하도록 요청합니다. 다만, 제2항의 금액공제가 필요한 경우에는 그러하지 아니할 수 있습니다.<br />\r\n\r\n      ④ \"회사\", \"콘텐츠 등의 대금을 지급 받은 자\" 또는 \"이용자와 콘텐츠이용계약을 체결한 자\"가 동일인이 아닌 경우에 각자는 청약철회 또는 계약해제·해지로 인한 대금환급과 관련한 의무의 이행에 있어서 연대하여 책임을 집니다.<br />\r\n\r\n      ⑤ \"회사\"는 \"이용자\"에게 청약철회를 이유로 위약금 또는 손해배상을 청구하지 않습니다. 그러나 \"이용자\"의 계약해제·해지는 손해배상의 청구에 영향을 미치지 않습니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제28조(회사의 계약해제·해지 및 이용제한)</span><br />\r\n\r\n      ① \"회사\"는 \"이용자\"가 제12조 제2항에서 정한 행위를 하였을 경우 사전통지 없이 계약을 해제·해지하거나 또는 기간을 정하여 서비스이용을 제한할 수 있습니다.<br />\r\n\r\n      ② 제1항의 해제·해지는 \"회사\"가 자신이 정한 통지방법에 따라 \"이용자\"에게 그 의사를 표시한 때에 효력이 발생합니다.<br />\r\n\r\n      ③ \"회사\"의 해제·해지 및 이용제한에 대하여 \"이용자\"는 \"회사\"가 정한 절차에 따라 이의신청을 할 수 있습니다. 이 때 이의가 정당하다고 \"회사\"가 인정하는 경우, \"회사\"는 즉시 서비스의 이용을 재개합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제29조(회사의 계약해제·해지의 효과)</span><br />\r\n\r\n      \"이용자\"의 귀책사유에 따른 이용계약의 해제·해지의 효과는 제27조를 준용합니다. 다만, \"회사\"는 \"이용자\"에 대하여 계약해제·해지의 의사표시를 한 날로부터 7영업일 이내에 대금의 결제와 동일한 방법으로 이를 환급합니다.\r\n\r\n    </li>\r\n    <h2>제5장 과오금, 피해보상 등</h2>\r\n\r\n    <li>\r\n      <span class=\"title\">제30조(과오금)</span><br />\r\n\r\n      ① \"회사\"는 과오금이 발생한 경우 이용대금의 결제와 동일한 방법으로 과오금 전액을 환불하여야 합니다. 다만, 동일한 방법으로 환불이 불가능할 때는 이를 사전에 고지합니다.<br />\r\n\r\n      ② \"회사\"의 책임 있는 사유로 과오금이 발생한 경우 \"회사\"는 계약비용, 수수료 등에 관계없이 과오금 전액을 환불합니다. 다만, \"이용자\"의 책임 있는 사유로 과오금이 발생한 경우, \"회사\"가 과오금을 환불하는 데 소요되는 비용은 합리적인 범위 내에서 \"이용자\"가 부담하여야 합니다.<br />\r\n\r\n      ③ 회사는 \"이용자\"가 주장하는 과오금에 대해 환불을 거부할 경우에 정당하게 이용대금이 부과되었음을 입증할 책임을 집니다.<br />\r\n\r\n      ④ \"회사\"는 과오금의 환불절차를 디지털콘텐츠이용자보호지침에 따라 처리합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제31조(콘텐츠하자 등에 의한 이용자피해보상)</span><br />\r\n\r\n      \"회사\"는 콘텐츠하자 등에 의한 이용자피해보상의 기준·범위·방법 및 절차에 관한 사항을 디지털콘텐츠이용자보호지침에 따라 처리합니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제32조(면책조항)</span><br />\r\n\r\n      ① \"회사\"는 천재지변 또는 이에 준하는 불가항력으로 인하여 \"콘텐츠\"를 제공할 수 없는 경우에는 \"콘텐츠\" 제공에 관한 책임이 면제됩니다.<br />\r\n\r\n      ② \"회사\"는 \"이용자\"의 귀책사유로 인한 콘텐츠이용의 장애에 대하여는 책임을 지지 않습니다.<br />\r\n\r\n      ③ \"회사\"는 \"회원\"이 \"콘텐츠\"와 관련하여 게재한 정보, 자료, 사실의 신뢰도, 정확성 등의 내용에 관하여는 책임을 지지 않습니다.<br />\r\n\r\n      ④ \"회사\"는 \"이용자\" 상호간 또는 \"이용자\"와 제3자 간에 \"콘텐츠\"를 매개로 하여 발생한 분쟁 등에 대하여 책임을 지지 않습니다.\r\n\r\n    </li>\r\n    <li>\r\n      <span class=\"title\">제33조(분쟁의 해결)</span><br />\r\n\r\n      \"회사\"는 분쟁이 발생하였을 경우에 \"이용자\"가 제기하는 정당한 의견이나 불만을 반영하여 적절하고 신속한 조치를 취합니다. 다만, 신속한 처리가 곤란한 경우에 \"회사\"는 \"이용자\"에게 그 사유와 처리일정을 통보합니다.\r\n\r\n    </li>\r\n  </ul>\r\n</div>','');
/*!40000 ALTER TABLE `member_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원 설정 아이디',
  `skin` varchar(20) NOT NULL COMMENT '회원스킨',
  `user_level` int(11) NOT NULL COMMENT '회원 권한',
  `is_admin` varchar(10) NOT NULL COMMENT '관리자 체크',
  `user_id` varchar(20) NOT NULL COMMENT '아이디',
  `user_pw` varchar(150) NOT NULL COMMENT '비밀번호',
  `user_name` varchar(20) NOT NULL COMMENT '이름',
  `user_nic` varchar(20) DEFAULT NULL COMMENT '닉네임',
  `email` varchar(150) NOT NULL COMMENT '이메일',
  `zip` varchar(20) NOT NULL COMMENT '우편번호',
  `adrr` varchar(20) NOT NULL COMMENT '주소',
  `addr2` varchar(20) NOT NULL COMMENT '상세 주소',
  `tel` varchar(20) DEFAULT NULL COMMENT '연락처',
  `mobile` varchar(20) NOT NULL COMMENT '휴대전화',
  `fax` varchar(20) DEFAULT NULL COMMENT '연락처',
  `homepage` varchar(20) DEFAULT NULL COMMENT '홈페이지',
  `sign` varchar(20) DEFAULT NULL COMMENT '서명',
  `self_intro` text COMMENT '자기소개',
  `image` varchar(128) DEFAULT NULL COMMENT '회원아이콘',
  `last_date` datetime NOT NULL COMMENT '최종 로그인 일시',
  `reg_date` datetime NOT NULL COMMENT '가입일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `members_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_config` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='회원 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `popup`
--

DROP TABLE IF EXISTS `popup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `popup` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `member_id` int(11) NOT NULL COMMENT '회원 번호',
  `po_subject` varchar(255) NOT NULL COMMENT '팝업 제목',
  `po_start` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '팝업 시작일시',
  `po_end` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '팝업 종료일시',
  `po_file` varchar(255) DEFAULT NULL COMMENT '팝업 이미지 파일 링크',
  `po_top` int(11) NOT NULL DEFAULT '0' COMMENT '팝업 상단 포지션',
  `po_left` int(11) NOT NULL DEFAULT '0' COMMENT '팝업 좌측 포지션',
  `po_link` varchar(255) DEFAULT NULL COMMENT '팝업 링크',
  `po_link_target` varchar(255) DEFAULT NULL COMMENT '팝업 링크 타겟',
  `po_map_use` tinyint(4) DEFAULT '0' COMMENT '팝업 이미지맵 사용 여부',
  `po_map_name` varchar(255) DEFAULT NULL COMMENT '팝업 이미지맵 이름',
  `po_map_code` text COMMENT '팝업 이미지맵 코드',
  `reg_date` datetime NOT NULL COMMENT '가입일시',
  `edit_date` datetime NOT NULL COMMENT '변경일시',
  PRIMARY KEY (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='팝업 테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `popup`
--

LOCK TABLES `popup` WRITE;
/*!40000 ALTER TABLE `popup` DISABLE KEYS */;
/*!40000 ALTER TABLE `popup` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-31 14:22:17
