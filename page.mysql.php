<?php include_once("header_ui.php"); ?>
<script type="text/javascript">
	$(function() {
		$("li").is(":last-child").css("background", "1px solid #333");
	});
</script>
	<!-- 메인 내용 Start -->
	<div class="main">
		<div class="container">
			
			<!-- 좌측 탭메와 우측 미니 슬라이더 Start -->
			<div class="row mix-block margin-bottom-40">
				<h1 class="alert alert-warning border-warning">
					MySQL IWCL(Instruction Word Command Language)
				</h1>
				<div class="note note-info">
					<div class="alert alert-info">
						/* -------------------- MYSQL 접속하기 -------------------- */
					</div>
					<p>
						1) 명령프롬프트 실행
					</p>
					<p>
						WinKey + R
					</p>
					<p>
						cmd (엔터)
					</p>
					<p>
						2) 한글처리가 가능하도록 명령어 수행하기
					</p>
					<pre>
chcp 949</pre>
					<p>
						chcp 949 : Dos 명령어로 한글 처리 가능하게 함<br />
						맥 계열에서는 해줄 필요가 없음
					</p>
					<p>
						2) MAMP 안의 MySQL 폴더로 이동.
					</p>
					<p>
						window 사용자<br />
						cd /d "이동할경로"
					</p>
					<pre>
cd /d C:\MAMP\bin\mysql\bin<!--
					--></pre>
					<p>
						OSX 사용자<br />
						cd /d "이동할경로"
					</p>
					<pre>
cd /Applications/MAMP/Library/bin<!--
					--></pre>
					<p>
						** 맥에서는 대소문자 인식함
					</p>
					<p>
						3) MySQL 접속 명령어
					</p>
					<p>
						window 사용자)
					</p>
					<pre>
mysql -u사용자아이디 -p --default-character-set=utf8
mysql -uroot -p --default-character-set=utf8<!--
					--></pre>
					<p>
						OSX 사용자)
					</p>
					<pre>
./mysql -u사용자아이디 -p --default-character-set=utf8
	./mysql -uroot -p --default-character-set=utf8<!--
					--></pre>
					<p>
						* DBMS는 자체적으로 아이디를 관리한다.<br />
						* root --> 기본적으로 제공되는 전체 관리자 계정.<br />
						기본적으로 암호는 root
					</p>
					<pre>
-uroot -p
Enter Password: root<!--
					--></pre>
					<div class="alert alert-info">
						/* -------------------- DB와 테이블 생성하기 -------------------- */
					</div>
					<pre>
SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP DATABASE IF EXISTS `myschool`;
CREATE DATABASE `myschool`;
USE `myschool`;

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `deptno` int(4) NOT NULL COMMENT '부서번호(학과번호)',
  `dname` varchar(16) NOT NULL COMMENT '부서명(학과명)',
  `loc` varchar(10) DEFAULT NULL COMMENT '위치',
  PRIMARY KEY (`deptno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='부서(학과) ';

BEGIN;
INSERT INTO `department` VALUES ('101', '컴퓨터공학과', '1호관'), ('102', '멀티미디어학과', '2호관'), ('201', '전자공학과', '3호관'), ('202', '기계공학과', '4호관');
COMMIT;

DROP TABLE IF EXISTS `professor`;
CREATE TABLE `professor` (
  `profno` int(11) NOT NULL COMMENT '교수번호',
  `name` varchar(10) NOT NULL COMMENT '이름 ',
  `userid` varchar(10) NOT NULL COMMENT '아이디',
  `position` varchar(20) NOT NULL COMMENT '직급 ',
  `sal` int(10) NOT NULL COMMENT '급여 ',
  `hiredate` datetime NOT NULL COMMENT '입사일',
  `comm` int(11) DEFAULT NULL COMMENT '보직수당',
  `deptno` int(11) NOT NULL COMMENT '부서번호(학과번호)',
  PRIMARY KEY (`profno`),
  KEY `deptno` (`deptno`),
  CONSTRAINT `fk_professor_department` FOREIGN KEY (`deptno`) REFERENCES `department` (`deptno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='교수 테이블';

BEGIN;
INSERT INTO `professor` VALUES ('9901', '김도훈', 'capool', '교수', '500', '1982-06-12 00:00:00', '20', '101'), ('9902', '이재우', 'sweat413', '조교수', '320', '1995-04-12 00:00:00', null, '201'), ('9903', '성연희', 'pascal', '조교수', '360', '1993-03-17 00:00:00', '15', '101'), ('9904', '염일웅', 'blue77', '전임강사', '240', '1998-10-11 00:00:00', null, '102'), ('9905', '권혁일', 'refresh', '교수', '450', '1986-02-11 00:00:00', '25', '102'), ('9906', '이만식', 'pocari', '부교수', '420', '1988-07-11 00:00:00', null, '101'), ('9907', '전은지', 'totoro', '전임강사', '210', '2001-05-11 00:00:00', null, '101'), ('9908', '남은혁', 'bird13', '부교수', '400', '1990-10-18 00:00:00', '17', '202');
COMMIT;

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `studno` int(11) NOT NULL COMMENT '학생번호',
  `name` varchar(10) NOT NULL COMMENT '이름',
  `userid` varchar(10) NOT NULL COMMENT '아이디',
  `grade` int(11) NOT NULL COMMENT '학년',
  `idnum` varchar(13) NOT NULL COMMENT '주민번호',
  `birthdate` datetime NOT NULL COMMENT '생년월일',
  `tel` varchar(13) NOT NULL COMMENT '전화번호',
  `height` int(11) NOT NULL COMMENT '키',
  `weight` int(11) NOT NULL COMMENT '몸무게',
  `deptno` int(11) NOT NULL COMMENT '학과번호',
  `profno` int(11) DEFAULT NULL COMMENT '담당교수의 일련번호',
  PRIMARY KEY (`studno`),
  KEY `profno` (`profno`),
  KEY `deptno` (`deptno`),
  CONSTRAINT `fk_student_department` FOREIGN KEY (`deptno`) REFERENCES `department` (`deptno`),
  CONSTRAINT `fk_student_professor` FOREIGN KEY (`profno`) REFERENCES `professor` (`profno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='학생테이블';

BEGIN;
INSERT INTO `student` VALUES ('10101', '전인하', 'jun123', '4', '7907021369824', '1979-07-02 00:00:00', '051)781-2158', '176', '72', '101', '9903'), ('10102', '박미경', 'ansel414', '1', '8405162123648', '1984-05-16 00:00:00', '055)261-8947', '168', '52', '101', null), ('10103', '김영균', 'mandu', '3', '8103211063421', '1981-03-21 00:00:00', '051)824-9637', '170', '88', '101', '9906'), ('10104', '지은경', 'gomo00', '2', '8004122298371', '1980-04-12 00:00:00', '055)418-9627', '161', '42', '101', '9907'), ('10105', '임유진', 'youjin12', '2', '8301212196482', '1983-01-21 00:00:00', '02)312-9838', '171', '54', '101', '9907'), ('10106', '서재진', 'seolly', '1', '8511291186273', '1985-11-29 00:00:00', '051)239-4861', '186', '72', '101', null), ('10107', '이광훈', 'huriky', '4', '8109131276431', '1981-09-13 00:00:00', '055)736-4981', '175', '92', '101', '9903'), ('10108', '류민정', 'cleansky', '2', '8108192157498', '1981-08-19 00:00:00', '055)248-3679', '162', '72', '101', '9907'), ('10201', '김진영', 'simply', '2', '8206062186327', '1982-06-06 00:00:00', '055)419-6328', '164', '48', '102', '9905'), ('10202', '오유석', 'yousuk', '4', '7709121128379', '1977-09-12 00:00:00', '051)724-9618', '177', '92', '102', '9905'), ('10203', '하나리', 'hanal', '1', '8501092378641', '1985-01-09 00:00:00', '055)296-3784', '160', '68', '102', null), ('10204', '윤진욱', 'samba7', '3', '7904021358671', '1979-04-02 00:00:00', '053)487-2698', '171', '70', '102', '9905'), ('20101', '이동훈', 'dals', '1', '8312101128467', '1983-12-10 00:00:00', '055)426-1752', '172', '64', '201', null), ('20102', '박동진', 'ping2', '1', '8511241639826', '1985-11-24 00:00:00', '051)742-6384', '182', '70', '201', null), ('20103', '김진경', 'lovely', '2', '8302282169387', '1983-02-28 00:00:00', '052)175-3941', '166', '51', '201', '9902'), ('20104', '조명훈', 'rader214', '1', '8412141254963', '1984-12-14 00:00:00', '02)785-6984', '184', '62', '201', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;<!--
					--></pre>
					<div class="alert alert-info">
						/* -------------------- 사용할 DB 선택하기 -------------------- */
					</div>
					<p>
						현재 시스템 안의 DB목록 조회
					</p>
					<pre>
SHOW databases;</pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/sh_databases.png" class="img-responsive" alt="sho databases; 결과" />
					</p>
					<p>
						특정 데이터베이스 열기
					</p>
					<pre>
USE 데이터베이스이름;<!--
					--></pre>
					<pre>
USE myschool;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/use_myschool.png" class="img-responsive" alt="use myschool; 결과" />
					</p>
					<p>
						데이터베이스 안의 테이블 목록 보기
					</p>
					<pre>
SHOW tables;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/sh_tables.png" class="img-responsive" alt="show tables; 결과" />
					</p>
					<p>
						특정 테이블의 구조를 확인
					</p>
					<pre>
DESC 테이블이름;<!--
					--></pre>
					<p>
					<p>
						학과테이블(department)의 구조 확인
					</p>
					<pre>
DESC department;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/d_department.png" class="img-responsive" alt="desc department; 결과" />
					</p>
					<ol>
						<li>deptno : 학과번호</li>
						<li>dname : 학과이름</li>
						<li>loc : 학과 위치</li>
					</ol>
					<p>
						교수테이블(professor)의 구조 확인
					</p>
					<pre>
DESC professor;</pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/d_professor.png" class="img-responsive" alt="use professor; 결과" />
					</p>
					<p>
						<ol>
							<li>profno교수번호</li>
							<li>name : 교수이름</li>
							<li>userid : 아이디</li>
							<li>position : 직위</li>
							<li>sal : 급여</li>
							<li>hiredate : 입사일</li>
							<li>comm : 보직수당</li>
							<li>deptno : 학과번호</li>
						</ol>
					</p>
					<p>
						학생 테이블의 구조를 확인
					</p>
					<pre>
DESC student;</pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/d_student.png" class="img-responsive" alt="use student; 결과" />
					</p>
					<p>
						<ol>
							<li>studno : 학생학번</li>
							<li>name : 학생이름</li>
							<li>userid : 아이디</li>
							<li>grade : 학년</li>
							<li>idnum : 주민등록번호</li>
							<li>birthdate : 입학일</li>
							<li>tel : 전화번호</li>
							<li>height : 신장(키)</li>
							<li>weight : 몸무게</li>
							<li>deptno : 학과번호</li>
							<li>profno : 교수번호(담당교수번호)</li>
						</ol>
					</p>
					<div class="alert alert-info">
						/* -------------------- SQL문의 종류 -------------------- */
					</div>
					<pre>
1) DQL (Data Query Language)
   --> 데이터 질의어
   --> 데이터를 조회하기 위해서 사용되는 구문
   --> ex) SELECT

2) DML (Data Manipulation Laguage)
   --> 데이터 조작어
   --> 데이터 변경(입력,수정,삭제)시 사용되는 구문
   --> ex) INSERT (입력), UPDATE (수정), DELETE (삭제)

3) DDL (Data Definition Language)
   --> 데이터 정의어
   --> 데이터베이스나 테이블을 생성,변경,삭제 할 경우
   --> ex) CREATE (생성), ALTER (변경) DROP (삭제)

4) TCL (Transaction Control Language)
   --> 트랜잭션 처리어
   --> ex) COMMIT (트랜잭션의 정상 종료 처리)
           ROLLBACK (트랜젝션 취소)
           BEGIN TRANS (트랜젝션 시작)<!--
					--></pre>
				</div>
				<div class="note note-danger">
					<div class="alert alert-danger">
						/* -------------------- 데이터 조회하기 -------------------- */
					</div>
 					<pre>
SELECT  * | 컬럼1이름, 컬럼2이름, ... 컬럼n이름
FROM 테이블이름;<!--
					--></pre>
					<p>
						'*' : 모든 컬럼의 데이터를 조회한다.<br />
						컬럼이름을 나열한 경우 : 원하는 데이터만 조회한다.<br />
                        순서 변경 가능.
					</p>
					<P>
						<hr class="grey-line" />
						
						학과테이블의 모든 컬럼에 저장된 데이터 조회하기
						
						<hr class="grey-line" />
					</P>
					<pre>
SELECT * FROM department;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_all_department.png" class="img-responsive" alt="SELECT * FROM department; 결과" />
					</p>
					<pre>
SELECT deptno, dname, loc FROM department;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_deptno_dname_loc_department.png" class="img-responsive" alt="SELECT deptno, dname, loc FROM department; 결과" />
					</p>
					<p>
						<hr class="grey-line" />
						ex) 학생 테이블(student)의 학생이름(name)과 학생번호(studno)를 출력하여라.
						<hr class="grey-line" />
					</p>
					<pre>
SELECT name, studno FROM student;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_studno_f_student.png" class="img-responsive" alt="SELECT name, studno FROM student; 결과" />
					</p>
					<div class="alert alert-danger">
						/* -------------------- 검색결과 중복 제거 옵션 -------------------- */
					</div>
					<pre>
SELECT DISTINCT * | column_list FROM table_name;<!--
					--></pre>
					<p>
						단일칼럼에서 DISTINCT 키워드 사용<br />
						ex) 학생 테이블에서 중복되는 행을 제외한 학과번호 출력
					</p>
					<pre>
SELECT deptno FROM student;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_deptno_f_student.png" class="img-responsive" alt="SELECT deptno FROM student; 결과" />
					</p>
					<pre>
SELECT DISTINCT deptno FROM student;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_discinct_deptno_f_student.png" class="img-responsive" alt="SELECT DISTINCT deptno FROM student; 결과" />
					</p>
					<p>
						단일칼럼에서 DISTINCT 키워드 사용<br />
						ex) 학생 테이블에서 중복되는 행을 제외한 학과번호와 학년을 출력
					</p>
					<pre>
SELECT deptno, grade FROM student;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_feptno_grade_f_student.png" class="img-responsive" alt="SELECT deptno, grade FROM student; 결과" />
					</p>
					<pre>
SELECT DISTINCT deptno, grade FROM student;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_distinct_feptno_grade_f_student.png" class="img-responsive" alt="SELECT DISTINCT deptno, grade FROM student; 결과" />
					</p>
					<div class="alert alert-danger">
						/* -------------------- 칼럼에 대한 별명 부여 -------------------- */
					</div>
					<p>
						컬럼이름과 별명사이를 공백처리 또는 AS 키워드사용
					</p>
					<p>
						ex) 부서테이블에서 부서이름 칼럼의 별명은 dept_name, 부서번호 칼럼의 별명은 DN 으로 부여하여 출력
					</p>
					<pre>
SELECT dname `dept_name`, deptno `DN` FROM department;<!--
					--></pre>
					<p>
						또는
					</p>
					<pre>
SELECT dname AS `dept_name`, deptno AS `DN` FROM department;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_dname_nic_deptno_nic_f_department.png" class="img-responsive" alt="SELECT dname AS `dept_name`, deptno AS `DN` FROM department; 결과" />
					</p>




					<p>
						ex) 학과테이블에서 학과이름 칼럼의 별명은 Department_Name, 학과번호 칼럼의 별명은 Department_Number 로 부여하여 출력
					</p>
					<pre>
SELECT dname `Department_Name`, deptno `Department_Number` FROM department;<!--
					--></pre>
					<p>
						또는
					</p>
					<pre>
SELECT dname AS `Department_Name`, deptno AS `Department_Number` FROM department;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_dname_nic_deptno_nic_depart_number_f_department.png" class="img-responsive" alt="SELECT dname AS `Department_Name`, deptno AS `Department_Number` FROM department; 결과" />
					</p>
					<p>
						ex) department 테이블을 사용하여 deptno 를 부서 , dname 부서명 , loc 를 위치로 별명을 설정하여 출력하세요.
					</p>
					<pre>
SELECT dname `부서명`, deptno `부서`, loc `위치` FROM department;<!--
					--></pre>
					<p>
						또는
					</p>
					<pre>
SELECT dname AS `부서명`, deptno AS `부서`, loc AS `위치` FROM department;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_dname_nic_deptno_nic_loc_nic_depart_number_f_department.png" class="img-responsive" alt="SELECT dname AS `부서명`, deptno AS `부서`, loc AS `위치` FROM department; 결과" />
					</p>
					<div class="alert alert-danger">
						/* -------------------- 산술연산자 사용 -------------------- */
					</div>
					<p>
						ex) 교수 테이블(professor)에서 교수이름(name), 급여(sal) 그리고 보너스를 포함한 연봉을 출력하여라.<br />
						단 보너스를 포함한 연봉은 급여*12를 한 결과에 보너스 100을 더한 값으로 계산한다.
					</p>
					<pre>
SELECT name, sal, sal*12+100 FROM professor;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_sal_sal_multiply_12_plus_100_f_professor.png" class="img-responsive" alt="SELECT name, sal, sal*12+100 FROM professor; 결과" />
					</p>
					
				</div>

				<div class="note note-warning">
					<div class="alert alert-danger">
						/* -------------------- where절을 이용한 조건 지정 -------------------- */
					</div>
					<pre>
SELECT [DISTINCT] { * | 컬럼이름 [AS `별칭`] ... }
FROM 테이블이름
[WHERE  검색조건];<!--
					--></pre>
					<p>
						ex) 학생 테이블에서 1학년 학생만 검색하여 학번, 이름, 학과 번호를 출력
					</p>
					<pre>
SELECT studno, name, deptno FROM student WHERE grade = 1;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_studno_name_deptno_f_student_w_grade_equal_1.png" class="img-responsive" alt="SELECT studno, name, deptno FROM student WHERE grade = 1; 결과" />
					</p>
					<p>
						ex) 학생테이블에서 학과번호가 101번인 학생들의 학번 , 이름, 학년을 출력하세요
					</p>
					<pre>
SELECT studno, name, grade FROM student WHERE deptno = 101;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_studno_name_grade_f_student_w_deptno_equal_101.png" class="img-responsive" alt="SELECT studno, name, grade FROM student WHERE deptno = 101; 결과" />
					</p>
					<p>
						ex) 교수테이블에서 학과번호가 101번인 교수들의 교수번호 , 이름, 급여를 출력하세요
					</p>
					<pre>
SELECT profno, name, sal FROM professor WHERE deptno = 101;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_profno_name_sal_f_professor_w_deptno_equal_101.png" class="img-responsive" alt="SELECT profno, name, sal FROM professor WHERE deptno = 101; 결과" />
					</p>
					<div class="alert alert-danger">
						/* -------------------- 연산자 의미 -------------------- */
					</div>

					<div class="row">
						<div class="col-md-2">=</div>
						<div class="col-md-10">같다</div>

						<div class="col-md-2">!= , &lt;&gt;</div>
						<div class="col-md-10">같지 않다</div>

						<div class="col-md-2">&gt;</div>
						<div class="col-md-10">크다</div>

						<div class="col-md-2">&gt;=</div>
						<div class="col-md-10">크거나 같다</div>

						<div class="col-md-2">&lt;작다</div>
						<div class="col-md-10">같다</div>

						<div class="col-md-2">&lt;=</div>
						<div class="col-md-10">작거나 같다</div>
					</div>
					<div class="alert alert-danger">
						/* -------------------- 비교 연산자를 이용한 조건 검색 -------------------- */
					</div>
					<p>
						ex) 학생 테이블에서 몸무게가 70kg 이하인 학생만 검색하여 학번, 이름, 학년, 학과번호, 몸무게를 출력
					</p>
					<pre>
SELECT studno, name, grade, deptno, weight FROM student WHERE weight &lt;= 70;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_studno_name_grade_deptno_weight_f_student_w_weight_ltequal_70.png" class="img-responsive" alt="SELECT studno, name, grade, deptno, weight FROM student WHERE weight <= 70; 결과" />
					</p>
					<p>
						ex) 학생테이블에서 키가 170 이상인 학생의 학번, 이름, 학년, 학과번호, 키를 출력하여라.
					</p>
					<pre>
SELECT studno, name, grade, deptno, height FROM student WHERE height &gt;= 170;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_studno_name_grade_deptno_height_f_student_w_height_gtequal_170.png" class="img-responsive" alt="SELECT studno, name, grade, deptno, height FROM student WHERE height >= 170; 결과" />
					</p>
					<div class="alert alert-danger">
						/* -------------------- 논리 연산자 -------------------- */
					</div>
					<pre>
AND :   모든 조건이 참 일 때 참 값을 반환 (PHP =&gt; &amp;&amp;)
OR  :   모든 조건 중 하나라도 참 일 때 참 값을 반환 (PHP =&gt; ||)
NOT :   조건과 반대되는 결과를 반환 (PHP =&gt; !)<!--
					--></pre>
					<div class="alert alert-danger">
						/* -------------------- 논리 연산자를 이용하여 조건 검색 -------------------- */
					</div>
					<p>
						ex) 학생 테이블에서 1학년이면서 몸무게가 70kg 이상인 학생만 검색하여 이름, 학년, 몸무게, 학과 번호를 출력
					</p>
					<pre>
SELECT name, grade, weight, deptno FROM student WHERE grade = 1 AND weight &gt;= 70;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_grade_weight_deptno_f_student_w_grade_equal_1_and_weight_gtequal_70.png" class="img-responsive" alt="SELECT name, grade, weight, deptno FROM student WHERE grade = 1 AND weight >=70; 결과" />
					</p>
					<p>
						ex) 학생 테이블에서 1학년 이거나 몸무게가 70kg 이상인 학생만 검색하여 이름, 학번, 학년, 몸무게, 학과 번호를 출력하여라.
					</p>
					<pre>
SELECT name, studno, grade, weight, deptno FROM student WHERE grade = 1 OR weight &gt;= 70;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_studno_grade_weight_deptno_f_student_w_gradeequal_1_or_weight_gtequal_70.png" class="img-responsive" alt="SELECT name, studno, grade, weight, deptno FROM student WHERE grade = 1 OR weight >=70; 결과" />
					</p>
				</div>

				<div class="note note-success">
					<div class="alert alert-success">
						/* -------------------- SQL연산자 (1) - BETWEEN 연산자 -------------------- */
					</div>
					<p>
						BETWEEN 연산자는 특정 칼럼의 데이터 값이 하한값 `a`와 상한값 `b`사이에 포함되는 행을 검색하기 위한 연산자이다.
					</p>
					<p>
						ex) BETWEEN 연산자를 사용하여 몸무게가 50kg에서 70kg사이인 학생의 학번, 이름, 몸무게를 출력
					</p>
					<pre>
SELECT studno, name, weight FROM student WHERE weight BETWEEN 50 AND 70;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_studno_name_weight_f_stud_w_weight_brrtween_50_and_70.png" class="img-responsive" alt="SELECT studno, name, weight FROM student WHERE weight BETWEEN 50 AND 70; 결과" />
					</p>
					<div class="alert alert-success">
						/* -------------------- SQL연산자 (2) - IN 연산자 -------------------- */
					</div>
					<p>
						IN 연산자는 특정 칼럼의 데이터 값이 a,b,c,... 값 중에 하나라도 일치하면 참이 되는 연산자이다.
					</p>
					<p>
						ex) IN 연산자를 사용하여 102번 학과와 201번 학과 학생의 이름, 학년, 학과번호를 출력
					</p>
					<pre>
SELECT name, grade, deptno FROM student WHERE deptno IN (102, 201);<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_grade_deptno_f_student_w_deptno_in_102_201.png" class="img-responsive" alt="SELECT name, grade, deptno FROM student WHERE deptno IN (102, 201); 결과" />
					</p>
					<p>
						ex) 교수테이블(professor)에서 직급이 조교수 또는 전임강사인 교수의 번호, 이름, 직급, 학과번호를 출력하여라.
					</p>
					<pre>
SELECT profno, name, position, deptno FROM professor WHERE position IN ('조교수', '전임강사');<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_profno_name_pos_deptno_f_professor_w_pos_in_subpro_teac.png" class="img-responsive" alt="SELECT profno, name, position, deptno FROM professor WHERE position IN ('조교수', '전임강사'); 결과" />
					</p>
					<div class="alert alert-success">
						/* -------------------- SQL연산자 (3) - LIKE 연산자 -------------------- */
					</div>
					<p>
						LIKE 연산자는 컬럼에 저장된 문자열 중에서 LIKE 연산자에서 지정한 문자패턴과 부분적으로 일치하면 참이 되는 연산자이다.<br />
						아래와 같은 특수문자를 이용할 수 있다.
					</p>
					<pre><!--
-->‘%’: 임의의 길이의 문자열(길이가 0인 경우도 포함)에 대한 와일드 문자로 윈도에서의 *와 동일의미 가짐.

'%김' --> '김'으로 끝나는 모든 내용.
'김%' --> '김'으로 시작하는 모든 내용
'%김%' --> 앞 뒤 구분 없이 '김'을 포함하는 모든 내용.<!--
					--></pre>
					<p>
						ex) 학생 테이블에서 성이 ‘김’씨인 학생의 이름,학년,학과번호를 출력
					</p>
					<pre>
SELECT name, grade, deptno FROM student WHERE name LIKE '김%';<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_grade_deptno_f_student_w_name_like_kim_per.png" class="img-responsive" alt="SELECT name, grade, deptno FROM student WHERE name LIKE '김%'; 결과" />
					</p>
					<p>
						ex ) 학과이름에 '공학'이라는 단어가 포함된 모든 학과의 학과번호, 이름, 위치를 출력하시오.
					</p>
					<pre>
SELECT deptno, dname, loc FROM department WHERE dname LIKE '%공학%';<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_deptno_dname_loc_f_depart_w_dname_like_per_name_per.png" class="img-responsive" alt="SELECT deptno, dname, loc FROM department WHERE dname LIKE '%공학%'; 결과" />
					</p>
					<div class="alert alert-success">
						/* -------------------- NULL 연산자 -------------------- */
					</div>
					<p>
						NULL 은 미확인 값이나 아직 적용되지 않은 값을 의미하는 것으로 0과는 다른 의미를 가진다.<br />
						예를 들어 학생 몸무게가 NULL 인 경우는 학생 몸무게가 0이 아니라 현재 조회시점에서 그 학생의 몸무게를 모른다는 의미인 것이다.<br />
						NULL 은 숫자 0이나 공백이 아니라는 점을 정확하게 이해해야 한다.
					</p>
					<p>
						ex) 교수 테이블에서 이름 ,직급, 보직 수당을 출력
					</p>
					<pre>
SELECT name, position, comm FROM professor;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_pos_comm_f_professor.png" class="img-responsive" alt="SELECT name, position, comm FROM professor; 결과" />
					</p>
					<p>
						설명: comm 칼럼의 데이터 중에서 NULL과 숫자 0은 의미가 다르다.<br />
						숫자 0은 보직수당이 하나도 없음을 의미하지만, NULL은 보직수당이 얼마인지 잘 모른다는 것을 의미한다.
					</p>
					<div class="alert alert-success">
						/* -------------------- IS NULL 연산자 / IS NOT NULL 연산자 -------------------- */
					</div>
					<p>
						- IS NULL 연산자는 칼럼 값중에서 NULL 을 포함하는 행을 검색하기 위해 사용하는 연산자이다.<br />
						- 반면 IS NOT NULL 연산자는 NULL을 포함하지 않는 행을 검색하기 위해 사용한다.
					</p>
					<p>
						ex) 교수 테이블(professor)에서 보직수당이 없는 교수의 이름, 직급, 보직수당을 출력
					</p>
					<pre>
SELECT name, position, comm FROM professor WHERE comm IS NULL;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_pos_comm_f_profe_w_comm_is_null.png" class="img-responsive" alt="SELECT name, position, comm FROM professor WHERE comm IS NULL; 결과" />
					</p>
					<p>
						ex) 교수 테이블에서 보직수당을 받고 있는 교수의 이름과 급여, 보직수당을 출력하여라.
					</p>
					<pre>
SELECT name, sal, comm FROM professor WHERE comm IS NOT NULL;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_pos_comm_f_profe_w_comm_is_not_null.png" class="img-responsive" alt="SELECT name, position, comm FROM professor WHERE comm IS NOT NULL; 결과" />
					</p>
					<p>
						** 참고: <span class="red-text bold">DB에서 NULL데이터가 많아질 수록 성능 저하</span>가 두드러진다.
					</p>
					<div class="alert alert-success">
						/* -------------------- 연산자 우선 순위 -------------------- */
					</div>
					<ol>
						<li>
							비교연산자(=,!=,&lt;&gt;,&gt;,&gt;=,&lt;,&lt;=),<br />
							SQL연산자(BETWEEN, IN, LIKE, IS NULL)
						</li>
						<li>NOT</li>
						<li>AND</li>
						<li>OR</li>
					</ol>
					<p>
						ex) 102번 학과의 학생중에서 1학년 또는 4학년 학생의 이름, 학년, 학과 번호를 출력
					</p>
					<pre>
SELECT name, grade, deptno FROM student WHERE deptno = 102 AND (grade = 4 OR grade = 1);<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_grade_deptno_f_student_w_deptno_102_and_grade_4_or_grade_1.png" class="img-responsive" alt="SELECT name, grade, deptno FROM student WHERE deptno = 102 AND (grade = 4 OR grade = 1); 결과" />
					</p>
					<p>
						ex) 102번 학과의 학생 중에서 4학년 학생이거나 소속학과에 상관없이 1학년 학생들의 이름, 학년, 학과 번호를 출력하여라.
					</p>
					<pre>
SELECT name, grade, deptno FROM student WHERE (deptno = 102 AND grade = 4) OR grade = 1;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_grade_deptno_f_student_w_deptno_102_and_grade_4_or_grade_1-2.png" class="img-responsive" alt="SELECT name, grade, deptno FROM student WHERE (deptno = 102 AND grade = 4) OR grade = 1; 결과" />
					</p>
					<div class="alert alert-success">
						/* -------------------- 집합연산자 -------------------- */
					</div>
					<pre>
UNION       두 집합에 대해 중복되는 행을 제외한 합집합
UNION ALL   두 집합에 대해 중복되는 행을 포함한 합집합<!--
					--></pre>
					<p>
						ex) 다음 두 쿼리의 결과를 비교하시오.
					</p>
					<pre>
SELECT studno, name FROM student UNION ALL SELECT studno, name FROM student;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_studno_name_f_studentunion_all_s_studno_name_f_student.png" class="img-responsive" alt="SELECT studno, name FROM student UNION ALL SELECT studno, name FROM student; 결과" />
					</p>
					
					<p>
						ex) 교수와 학생의 구별 없이 이름과 아이디를 조회하시오.
					</p>
					<pre>
SELECT name, userid FROM student UNION SELECT name, userid FROM professor;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_userid_f_studentunion_s_name_userid_f_professor.png" class="img-responsive" alt="SELECT name, userid FROM student UNION SELECT name, userid FROM professor; 결과" />
					</p>
					
				</div>

				<div class="note note-info">
					<div class="alert alert-info">
						/* -------------------- 데이터 정렬을 위한 ORDER BY -------------------- */
					</div>
					<pre>
* ORDER BY : 칼럼이나 표현식을 기준으로 출력 결과를 정렬할 때 사용

  SELECT   [DISTINCT] {* | 컬럼이름[ AS 별칭]......}
  FROM      테이블이름
  [ WHERE   검색조건 ]
  [ ORDER BY 컬럼이름 [정렬옵션] ]

* 정렬옵션
  ASC : 오름차순으로 정렬하는 경우에 사용하며 기본값임
            --> 순차 정렬 (기본값)
  DESC : 내림차순으로 정렬하는 경우에 사용하며 생략 불가능함
            --> 역순 정렬

기본적인 정렬방법
* 문자값: 알파벳순 출력, 한글은 가나다 순으로 출력됨
* 숫자값: 가장 작은 값부터 먼저 출력됨
* 날짜값: 과거의 날짜부터 출력됨<!--
					--></pre>
					<p>
						ex) 학생 테이블에서 이름을 가나다 순으로 정렬하여 이름, 학년, 전화번호를 출력
					</p>
					<pre>
SELECT name, grade, tel FROM student ORDER BY name;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_grade_tel_f_student_order_by_name.png" class="img-responsive" alt="SELECT name, grade, tel FROM student ORDER BY name; 결과" />
					</p>
					<p>
						ex) 학생 테이블에서 학년을 내림차순으로 정렬하여 이름, 학년, 주민등록번호를 출력하여라.
					</p>
					<pre>
SELECT name, grade, idnum FROM student ORDER BY grade DESC;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_grade_idnum_f_student_order_by_grade_desc.png" class="img-responsive" alt="SELECT name, grade, idnum FROM student ORDER BY grade DESC; 결과" />
					</p>
					<p>
						ex) 학생 테이블에서 101번 학과에 소속된 학생들의 이름, 학년, 학과번호를 생년월일이 빠른 순으로  출력하여라.
					</p>
					<pre>
SELECT name, grade, deptno FROM student WHERE deptno = 101 ORDER BY birthdate ASC;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_grade_deptno_f_student_w_deptno_101_order_by_birth_asc.png" class="img-responsive" alt="SELECT name, grade, deptno FROM student WHERE deptno = 101 ORDER BY birthdate ASC; 결과" />
					</p>
					<div>
						/* -------------------- 다중 칼럼 및 컬럼 위치를 이용한 정렬 -------------------- */
					</div>
					<pre>
ORDER BY 절에서 지정한 첫 번째 칼럼을 기준으로 정렬한 후 첫 번째 기준 컬럼에게 동일한 값이 있는 경우 두 번째 칼럼을 기준으로 다시 정렬한다.
이 때 각 컬럼별로 정렬 옵션은 따로 설정된다.<!--
					--></pre>
					<p>
						ex) 학생 테이블에서 모든 학생에 대해 학과번호를 오름차순으로 먼저 정렬하고, 같은 학과 학생들은 학년이 높은 순으로 다시 정렬하여 학번, 이름, 학년, 학과번호, 사용자 아이디를 출력하여라.
					</p>
					<pre>
SELECT studno, name, grade, deptno, userid FROM student ORDER BY deptno ASC, grade DESC;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_studno_name_grade_deptno_userid_f_studentorder_by_deptno_asc_grade_desc.png" class="img-responsive" alt="SELECT studno, name, grade, deptno, userid FROM student ORDER BY deptno ASC, grade DESC; 결과" />
					</p>
					<pre>
/***********************************
 LIMIT
------------------------------------
 조회 결과중에서 특정 위치의 데이터만 뽑아내는 구문.
 범위를 설정한다.

  SELECT ...
  FROM ...
  [WHERE]
  [ORDER BY]
  [HAVING]
  [GROUP BY]
  LIMIT 시작위치, 데이터수
************************************/<!--
					--></pre>
					<p>
						ex) 급여가 높은 교수의 이름과 급여를 조회.<br >
						--> 상위 3명만 추려내기
					</p>
					<pre>
SELECT name, sal FROM professor ORDER BY sal DESC LIMIT 0, 3;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_sal_f_pro_order_by_sal_desc_limit_0_3.png" class="img-responsive" alt="SELECT name, sal FROM professor ORDER BY sal DESC LIMIT 0, 3; 결과" />
					</p>
					<pre>
SELECT name, sal FROM professor ORDER BY sal DESC LIMIT 3, 3;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_sal_f_pro_order_by_sal_desc_limit_3_3.png" class="img-responsive" alt="SELECT name, sal FROM professor ORDER BY sal DESC LIMIT 3, 3; 결과" />
					</p>
					<pre>
SELECT name, sal FROM professor ORDER BY sal DESC LIMIT 6, 3;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/s_name_sal_f_pro_order_by_sal_desc_limit_6_3.png" class="img-responsive" alt="SELECT name, sal FROM professor ORDER BY sal DESC LIMIT 6, 3; 결과" />
					</p>
				</div>

				<div class="note note-danger">
					<div class="alert alert-danger">
						/* -------------------- 테이블명 변경 -------------------- */
					</div>
					<pre>
ALTER TABLE 테이블명 RENAME 바꿀 테이블 명;
					</pre>
					<div class="alert alert-danger">
						/* -------------------- 컬럼 추가 -------------------- */
					</div>
					<pre>
기존 생성한 테이블에 추가적으로 컬럼이 필요할 경우 사용하는 쿼리
ALTER TABLE [테이블명] : 컬럼을 추가할 테이블 이름
ADD COLUMN [추가할 컬럼명] : 추가 될 컬럼명
[컬럼타입] : 추가될 컬럼의 데이터 타입을 작성해준다
           ex) varchar(50)

여기까지만 하면 맨 뒤에 컬럼이 추가 된다

[컬럼위치] : AFTER, BEFORE, FIRST, LAST(기본값) - 테이블 내에서 추가될 컬럼의 위치를 잡아준다
           AFTER : 중심이 될 컬럼의 뒤에 새로운 컬럼 생성
           BEFORE : 중심이 될 컬럼의 뒤에 새로운 앞에 생성
           FIRST : 테이블 내에서 맨 앞에 컬럼 생성
           LAST : 테이블 내에서 맨 뒤에 컬럼 생성(기본값)

default [값]; : 
디폴트 부분은 char(1)로 정해서 혹시나 y,n라던가 1,2,3으로 나갈경우에 기본값이 하나의 값일때만 사용하면 된다.
문자가 들어가는 컬럼일 경우에는 따로 기본값이 안 정해져있다면 default 부분은 제외해도 가능.
그리고 컬럼위치에 해당하는 after [기존컬럼명]도 특정 순서가 있는게 아니라면 그냥 제외해도 생성(이떄는 맨 뒤에 생성).<!--
					--></pre>
					<p>
						ex) 학과 테이블(department)에서 학과명(dname) 뒤에 test라는 이름의 컬럼을 추가
					</p>
					<pre>
ALTER TABLE department add COLUMN test varchar(50) AFTER dname;<!--
					--></pre>
					<p>
						추가 전
					</p>
					<p>
						<img src="assets/frontend/layout/img/mysql/alter_t_department_add_col_test_type_after_dname_f.png" class="img-responsive" alt="ALTER TABLE department add COLUMN test varchar(50) AFTER dname; 실행 전 결과" />
					</p>
					<p>
						추가 후
					</p>
					<p>
						<img src="assets/frontend/layout/img/mysql/alter_t_department_add_col_test_type_after_dname_l.png" class="img-responsive" alt="ALTER TABLE department add COLUMN test varchar(50) AFTER dname; 실행 후 결과" />
					</p>
					<div class="alert alert-danger">
						/* -------------------- 컬럼 순서 바꾸기 -------------------- */
					</div>
					<pre>
ALTER TABLE 테이블명 MODIFY COLUMN 위치 변경할 컬럼명 자료형 AFTER 중심이 될 컬럼;
					</pre>
					<pre>
ALTER TABLE department MODIFY COLUMN test varchar(50) AFTER dname;
					</pre>
					<pre>
ALTER TABLE department MODIFY COLUMN test varchar(50) FIRST;
					</pre>
					<div class="alert alert-danger">
						/* -------------------- 컬럼 명 변경 -------------------- */
					</div>
					<pre>
생성한 컬럼의 컬럼명을 변경하는 쿼리
ALTER TABLE [테이블명] CHANGE [기존컬럼명] [변경할컬럼명] [컬럼타입];<!--
					--></pre>
					<p>
						ex) 방금 생성한 test의 컬럼이름을 columa 로 변경
					</p>
					<pre>
ALTER TABLE department CHANGE test columa varchar(50);<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/alter_t_depart_change_test_columa_type.png" class="img-responsive" alt="ALTER TABLE department CHANGE test columa varchar(50);" />
					</p>
					<div class="alert alert-danger">
						/* -------------------- 컬럼 추가 -------------------- */
					</div>
					<pre>
컬럼의 타입을 바꾸는 쿼리.
ALTER TABLE [테이블명] MODIFY [컬럼명] [변경할타입];
컬럼 타입 변경의 경우 위와같이 MODIFY 를 사용.
이 경우에는 컬럼명은 그대로인데 타입만 변경할 경우에 사용.<!--
					--></pre>
					<p>
						ex) 방금 이름변경한 columa의 데이터타입 변경
					</p>
					<pre>
ALTER TABLE department MODIFY columa varchar(100);<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/alter_t_depart_mod_columa_change_type.png" class="img-responsive" alt="ALTER TABLE department MODIFY columa varchar(100);" />
					</p>
					<div class="alert alert-danger">
						/* -------------------- 컬럼 삭제 -------------------- */
					</div>
					<pre>
필요없는 컬럼이나 잘못 생성한 컬럼을 삭제하는 쿼리
ALTER TABLE [테이블명] DROP [컬럼명];<!--
					--></pre>
					<p>
						columa 컬럼을 삭제
					</p>
					<pre>
ALTER TABLE department DROP columa;<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/alter_t_depart_drop_columa.png" class="img-responsive" alt="ALTER TABLE department MODIFY columa varchar(100);" />
					</p>
				</div>

				<div class="note note-warning">
					<div class="alert alert-danger">
						/* -------------------- 데이터 조작어 (1) - 단일 행 입력 -------------------- */
					</div>
					<pre>
INSERT INTO 테이블이름 [(컬럼이름...)]
VALUES (값1 [, 값n,…]);
* 컬럼이름을 생략한 경우 -<!--
					--></pre>
					<p>
						ex) 학생 테이블에 ‘홍길동’ 학생의 데이터 입력하기<br />
						--> 테이블 구조에서 명시하고 있는 순서대로 값을 지정한다.<br />
						--> 테이블 구조 : DESC 테이블이름<br />
						--> 숫자(int)는 홑따옴표 사용 안함.
					</p>
					<pre>
INSERT INTO student VALUES (10110,'홍길동', 'hkd85', 1, '8501011143098', '2013-10-01 11:42:30', '055)777-7777', 170, 70, 101, 9903);<!--
					--></pre>
					<p>
						<img src="assets/frontend/layout/img/mysql/ins_into_studentvalues_no_name_uid_grade_idno_borth_tel_h_w_depno_prono.png" class="img-responsive" alt="INSERT INTO student VALUES (10110,'홍길동', 'hkd85', 1, '8501011143098', '2013-10-01 11:42:30', '055)777-7777', 170, 70, 101, 9903); 결과" />
					</p>
					
					<div class="alert alert-danger">
						/* -------------------- 데이터 조작어 (2) - NULL 의 입력 -------------------- */
					</div>
					<pre>
1) 묵시적으로 NULL을 입력하는 방법
- INSERT INTO 절에서 해당 칼럼의 이름과 값을 생략.<!--
					--></pre>
					<p>
						ex) 학과테이블의 학과번호와 학과이름을 입력하고 나머지는 NULL을 입력.
					</p>
					<pre>
INSERT INTO department(deptno, dname) VALUES (300, '응용과학');<!--
					--></pre>
					<pre>
2) 명시적으로 NULL을 입력하는 방법
- VALUES 절의 칼럼값에 NULL 을 사용.<!--
					--></pre>
					<p>
						ex) 부서테이블의 부서번호와 부서이름을 입력하고 나머지는 NULL을 입력
					</p>
					<pre>
INSERT INTO department VALUES (301, '영문학과', NULL);<!--
					--></pre>
					<pre>
INSERT INTO department (deptno, dname, loc) VALUES (302, '국문학과', NULL);<!--
					--></pre>
					<div class="alert alert-danger">
						/* -------------------- 데이터 조작어 (3) - 날짜 데이터 입력 방법 -------------------- */
					</div>
					<pre>
1) 칼럼에 날짜를 입력하려면 'YYYY-MM-DD HH:MI:SS' 혹은
   'YYYY-MM-DD' 형식에 따른 날짜 데이터를 입력해야 함.<!--
					--></pre>
					<p>
						ex) 교수 테이블에서 다음의 데이터를 입력
					</p>
					<pre>
	========================
	교수번호: 9920		이름: 고길동
	아이디: gilldong		직급: 교수
	급여: 450			입사일: 2014년 01월 01일
	학과: 102번 학과
	========================<!--
					--></pre>
					<pre>
INSERT INTO professor(profno, name, userid, position, sal, hiredate, deptno) VALUES (9920, '고길동', 'gogildong', '교수', 450, '2014-01-01', 102);<!--
					--></pre>
					<pre>
2) 자동으로 현재 날짜 입력하기. --> now() 함수의 사용<!--
					--></pre>
					<p>
						ex) 교수 테이블에서 다음의 데이터를 입력
					</p>
					<pre>
	========================
	교수번호: 9921		이름: 홍길동
	아이디: hong			직급: 조교
	급여: 230 			입사일: 오늘날짜
	학과: 102번 학과
	========================<!--
					--></pre>
					<pre>
						INSERT INTO professor(profno, name, userid, position, sal, hiredate, deptno) VALUES (9921, '홍길동', 'hnog', '조교', 230, now(), 102);<!--
					--></pre>
					<div class="alert alert-danger">
						/* -------------------- 데이터 조작어 (4) - 수정 -------------------- */
						/*------------------------------------------------------------------<br />
						-- SQL Workbench에서 UPDATE관련 환경 설정이 필요함<br />
 						---------------------------------------------------------------- */
					</div>
					<pre>
- UPDATE 명령문은 테이블에 저장된 데이터를 수정하기 위한
  데이터 조작어이다.

UPDATE 테이블이름
SET 컬럼1 = 값1 [, 컬럼n=값n,…]
[WHERE condition];

* WHERE 절을 생략하면 테이블의 모든 행을 수정함
* condition : 칼럼이름, 표현식, 상수, 비교연산자로
              구성된 검색조건<!--
					--></pre>
					<p>
						ex) 교수 번호가 9903인 교수의 현재 직급을 ‘조교수’로 수정
					</p>
					<pre>
UPDATE professor SET position = '조고수', sal = 200 WHERE profno = 9903;<!--
					--></pre>
					<p>
						원래 데이터
					</p>
					<p>
						수정 테이터
					</p>
					<div class="alert alert-danger">
						/* -------------------- 데이터 조작어 (5) - 삭제 -------------------- */
					</div>
					<pre>
DELETE FROM 테이블이름
[WHERE condition];

*WHERE 절을 생략하면 테이블의 모든 행이 삭제 됨.
--> 삭제는 행 단위로 이루어진다.<!--
					--></pre>
					<p>
						ex) 학생테이블에서 학번이 20103인 학생의 데이터를 삭제
					</p>
					<pre>
DELETE FROM student WHERE studno = 20103;<!--
					--></pre>
					<p>
						삭제 전
					</p>
					<p>
						삭제 후
					</p>
					<div class="alert alert-danger">
						/* -------------------- 트렌젝션 제어 -------------------- */
					</div>
					<pre>
트랜잭션의 개념
- 관계형 데이터베이스에서 실행되는 여러 개의 SQL 명령문을 하나의
논리적인 작업 단위로 처리하는 개념으로 ALL-or-Nothing 방식으로 처리됨.
SQL> START TRANSACTION;

COMMIT 명령문
- 트랜잭션 내의 모든 SQL 명령문에 의해 변경된 작업 내용을 디스크에
영구적으로 저장하고 트랜잭션을 종료.
SQL> COMMIT;

ROLLBACK 명령문
- 트랜잭션 내의 모든 SQL 명령문에 의해 변경된 작업 내용을 전부 취소하고
트랜잭션을 종료.
SQL> ROLLBACK;<!--
					--></pre>
					<pre>
ex1)
/** (1) 트랜젝션을 시작하고 전체 데이터 삭제 */
START TRANSACTION;
DELETE FROM student;
SELECT * FROM student;

/** (2) 트랜젝션의 복구 */
ROLLBACK;
SELECT * FROM student;<!--
					--></pre>
					<pre>
ex2)
/** (1) 트랜젝션을 시작하고 전체 데이터 삭제 */
START TRANSACTION;
DELETE FROM student;
SELECT * FROM student;

/** (2) 트랜젝션의 저장 */
COMMIT;
SELECT * FROM student;<!--
					--></pre>
				</div>

				

				<div class="note note-success">
					<div class="alert alert-success">
						/* -------------------- 함수의 사용법 -------------------- */
					</div>
					<pre>
------------------------------------
SELECT 함수이름(컬럼이름) FROM 테이블이름 ...
------------------------------------<!--
					--></pre>
					<div class="alert alert-success">
						/* -------------------- 문자열 관련 함수 -------------------- */
					</div>
					<pre>
------------------------------------
SELECT 함수이름(컬럼이름) FROM 테이블이름 ...
------------------------------------<!--
					--></pre>
					<p>
						/** 1) 문자열의 좌측부터 주어진 길이만큼 잘라낸다 */
					</p>
					<pre>
SELECT LEFT(name, 1) FROM student;<!--
					--></pre>
					<pre>
SELECT CONCAT(LEFT(name, 1), '**') FROM student;<!--
					--></pre>
					<p>
						/** 2) 문자열의 우측부터 주어진 길이만큼 잘라낸다 */
					</p>
					<pre>
SELECT RIGHT(name, 1) FROM student;<!--
					--></pre>
					<p>
						/** 3) 문자열 자르기 */
					</p>
					<pre>
	(mid, substring --> 같은 기능)
	두 번째 인수: 시작 위치 (1부터 시작)
	세 번째 인수: 잘라낼 글자 수
	세 번째 인수가 지정되지 않을 경우, 끝까지 */<!--
					--></pre>
					<pre>
SELECT mid(name, 2, 1), name FROM student;<!--
					--></pre>
					<pre>
SELECT substring(name, 2, 1), name FROM student;<!--
					--></pre>
					<pre>
SELECT mid(name, 2), name FROM student;<!--
					--></pre>
					<pre>
SELECT substring(name, 2), name FROM student;<!--
					--></pre>
					<p>
						mid 와 같다.
					</p>
					<p>
						/** 4) 문자열 변경하기 --> A를 B로 ... */
					</p>
					<pre>
SELECT replace(name, '이', 'lee') FROM student;<!--
					--></pre>
					<p>
						/** 5) 문자열 합치기 */
					</p>
					<pre>
-- 이름과 학년을 합치기

SELECT CONCAT(name, grade) FROM student;<!--
					--></pre>
					<pre>
-- 이름과 공백, 학년과 '학년'이라는 문자열 결합

SELECT CONCAT(name, ' ', grade, '학년') FROM student;<!--
					--></pre>
					<p>
						/** 6) 앞뒤 공백 제거 */
					</p>
					<pre>
SELECT trim(name) FROM student;<!--
					--></pre>
					<p>
						/** 7) 앞 공백 제거 */
					</p>
					<pre>
SELECT ltrim(name) FROM student;<!--
					--></pre>
					<p>
						/** 8) 뒤 공백 제거 */
					</p>
					<pre>
SELECT rtrim(name) FROM student;<!--
					--></pre>
					<p>
						/** 9) 비밀번호 형식으로 암호화된 값으로 변환 */
					</p>
					<pre>
SELECT password(name) FROM student;<!--
					--></pre>
					<pre>
SELECT md5(name) FROM student;<!--
					--></pre>
					<p>
						/** ex) 이중 암호화 */
					</p>
					<pre>
SELECT md5(password(name)) FROM student;<!--
					--></pre>
					<p>
						-- 혹은
					</p>
					<pre>
SELECT password(md5(name)) FROM student;<!--
					--></pre>
					<p>
						-- 주의: 암호화 된 값은 다시 복호화 할 수 없습니다.
					</p>
					<p>
						/** 10) 문자열 길이 >> byte수 */
					</p>
					<pre>
SELECT length(name) FROM student;<!--
					--></pre>
					<p>
						/* 실제 들엉있는 용량을 표시 */
					</p>
					<pre>
SELECT char_length(name) FROM student;<!--
					--></pre>
					<p>
						/** 11) 문자열이 표시되는 위치를 리턴 */
					</p>
					<pre>
-- name에서 '이'가 표시되는 위치를 찾기
SELECT instr(name, '이'), name FROM student;<!--
					--></pre>
					<p>
						/** 12) 대소문자 변환 */
					</p>
					<pre>
SELECT upper(userid) FROM professor;<!--
					--></pre>
					<pre>
SELECT lower(userid) FROM professor;<!--
					--></pre>
					<div class="alert alert-success">
						/* -------------------- 현재 시스템의 날짜를 획득 -------------------- */
					</div>
					<p>
						-- 오늘 날짜 얻기
					</p>
					<pre>
						SELECT now();<!--
					--></pre>
					<p>
						-- WHERE절의 조건으로 사용할 수 있다.
					</p>
					<pre>

SELECT name FROM student WHERE birthdate &lt; now();<!--
					--></pre>
					<p>
						-- insert나 update에서 값으로 사용할 수 있다.
					</p>
					<pre>
SELECT name, birthdate FROM student WHERE studno=20101;<!--
					--></pre>
					<pre>
UPDATE student SET birthdate=now() WHERE studno=20101;<!--
					--></pre>
					<pre>
SELECT name, birthdate FROM student WHERE studno=20101;<!--
					--></pre>
					<div class="alert alert-success">
						/* -------------------- 주어진 날짜에서 원하는 부분을 추출 -------------------- */
					</div>
					<p>
						-- 날짜의 요일을 숫자로 반환한다. 1=일요일~7=토요일
					</p>
					<pre>
SELECT dayofweek(now());<!--
					--></pre>
					<pre>
SELECT dayofweek(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 날짜의 요일을 숫자로 반환한다. 0=월요일~7=일요일
					</p>
					<pre>
SELECT weekday(now());<!--
					--></pre>
					<pre>
SELECT weekday(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 년 얻기
					</p>
					<pre>
SELECT year(now());<!--
					--></pre>
					<pre>
SELECT year(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 월 얻기
					</p>
					<pre>
SELECT MONTH(now());<!--
					--></pre>
					<pre>
SELECT MONTH(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 일 얻기
					</p>
					<pre>
SELECT DayofMonth(now());<!--
					--></pre>
					<pre>
SELECT DayofMonth(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 시 얻기
					</p>
					<pre>
SELECT HOUR(now());<!--
					--></pre>
					<pre>
SELECT HOUR(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 분 얻기
					</p>
					<pre>
SELECT MINUTE(now());<!--
					--></pre>
					<pre>
SELECT MINUTE(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 초 얻기
					</p>
					<pre>
SELECT SECOND(now());<!--
					--></pre>
					<pre>
SELECT SECOND(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 해당 날짜의 요일 이름을 반환 (영문)
					</p>
					<pre>
SELECT DAYNAME(now());<!--
					--></pre>
					<pre>
SELECT DAYNAME(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 해당 날짜의 월 이름을 반환 (영문)
					</p>
					<pre>
SELECT MONTHNAME(now());<!--
					--></pre>
					<pre>
SELECT MONTHNAME(birthdate) FROM student;<!--
					--></pre>
					<p>
						-- 해당 날짜의 분기를 반환 1~4
					</p>
					<pre>
SELECT QUARTER(now());<!--
					--></pre>
					<pre>
SELECT QUARTER(birthdate) FROM student;<!--
					--></pre>
					<pre>
/** 3) 날짜 계산
  - DATE_ADD(date, INTERVAL expr type)

  [type값]
  SECOND, MINITE, HOUR, DAY, MONTH, YEAR
*/<!--
					--></pre>
					<p>
						-- 100일 후
					</p>
					<pre>
SELECT DATE_ADD(now(), INTERVAL 100 DAY);<!--
					--></pre>
					<p>
						-- 7일전
					</p>
					<pre>
SELECT DATE_ADD(now(), INTERVAL -7 DAY);<!--
					--></pre>
					<pre>
/** 4) 날짜 형식 지정
	- DATE_FORMAT(날짜데이터, 형식)

	[형식]
	달 이름		: %M
	요일이름	: %W
	YYYY형식의 년도	: %Y
	YY형식의 년도	: %y
	요일 이름의 약자: %a
	DD형식의 날짜	: %d
	D형식의 날짜	: %e
	MM형식의 월	: %m
	HH형식의 시간(24시간제)	: %H
	H형식의 시간(24시간제)	: %k
	HH형식의 시간(12시간제) : %h
	MM형식의 분	: %i
	SS형식의 초	: %s
	AM/PM		: %p
*/<!--
					--></pre>
					<pre>
SELECT DATE_FORMAT(now(), '%y년 %m월 %d일 %h시 %i분 %s초');<!--
					--></pre>
					<pre>
/** 5) Unix Timestamp
-------------------------------------------------
	1970년 1월 1일 자정부터, 현재까지 지나온 초를 의미
*/<!--
					--></pre>
					<p>
						-- 현재 시각에 대한 timestamp
					</p>
					<pre>
SELECT Unix_timestamp();<!--
					--></pre>
					<p>
						-- 특정 시각에 대한 timestamp
					</p>
					<pre>
SELECT Unix_timestamp('1992-03-14');
SELECT Unix_timestamp('1992-03-14 01:00:00');<!--
					--></pre>
					<p>
						-- 계산에도 활용할 수 있다.
					</p>
					<pre>
SELECT Unix_timestamp() - Unix_timestamp('1992-03-14');<!--
					--></pre>
					<pre>
SELECT Unix_timestamp() - Unix_timestamp(birthdate) FROM student;<!--
					--></pre>
					<pre>
SELECT ceil((Unix_timestamp() - Unix_timestamp('1982-03-14')) / (365*24*60*60));<!--
					--></pre>
					<pre>
SELECT ceil((Unix_timestamp() - Unix_timestamp(birthdate)) / (365*24*60*60)) FROM student;<!--
					--></pre>
					<p>
						-- 특정 시각으로부터 100일 후
					</p>
					<pre>
SELECT Unix_timestamp('1992-03-14 01:00:00')+(100*24*60*60);<!--
					--></pre>
					<p>
						-- timestamp를 날짜 형태로 변환
					</p>
					<pre>
SELECT from_unixtime(Unix_timestamp());<!--
					--></pre>
					<p>
						-- 계산 결과를 시각으로 변환
					</p>
					<pre>
SELECT from_unixtime(Unix_timestamp('1982-03-14 01:00:00')+(100*24*60*60));<!--
					--></pre>
					<p>
						-- 향식 맞추기
					</p>
					<pre>
SELECT DATE_FORMAT(from_unixtime(Unix_timestamp()), '%y%m%d%h%i%s');<!--
					--></pre>
					<pre>
SELECT DATE_FORMAT(from_unixtime(Unix_timestamp('1982-03-14 01:00:00')+(100*24*60*60)), '%y/%m/%d');<!--
					--></pre>
					<pre>
SELECT DATE_FORMAT(from_unixtime(Unix_timestamp('1982-03-14 01:00:00')+(100*24*60*60)), '%Y/%M/%D');<!--
					--></pre>
				</div>

				<div class="note note-info">
					<div class="alert alert-info">
						그룹함수 익히기
					</div>
					<pre>
그룹함수는 테이블의 전체 행을 하나 이상의 칼럼을 기준으로 칼럼 값에 따라
그룹화하여 그룹별로 결과를 출력하는 함수이다. 그룹 함수는 SELECT 절이나
HAVING 절에서 사용할 수 있다. 그룹함수는 그룹별로 합계, 평균, 최대, 최소,
개수 등을 구하기 위해 주로 사용한다.

SELECT   column, group_function(column)
FROM	   table
[WHERE  condition]
[GROUP BY  group_by_expression]
[HAVING  group_condition]

종류		의미
--------------------------------------------------
COUNT	행의 갯수 출력
MAX		NULL을 제외한 모든행에서 최대값 출력
MIN		NULL을 제외한 모든 행에서 최소값 출력
SUM		NULL을 제외한 모든 행의 합계
AVG		NULL을 제외한 모든 행의 평균값<!--
					--></pre>
					<div class="alert alert-info">
						COUNT 함수
					</div>
					<pre>
테이블에서 조건을 만족하는 행의 개수를 반환하는 함수
COUNT ({* |[ DISTINCT | ALL] expr} )<!--
					--></pre>
					<p>
						/** 3학년 학생들은 총 몇명인가? */
					</p>
					<pre>
SELECT studno FROM student WHERE grade = 3;<!--
					--></pre>
					<pre>
SELECT COUNT(studno) FROM student WHERE grade = 3;<!--
					--></pre>
					<p>
						ex) 101번 학과 교수중에서 보직 수당을 받는 교수를 출력
					</p>
					<pre>
SELECT comm FROM professor WHERE deptno = 101;<!--
					--></pre>
					<pre>
SELECT COUNT(comm) FROM professor WHERE deptno = 101;<!--
					--></pre>
					
					<pre>
SELECT COUNT(*) FROM professor WHERE deptno = 101;<!--
					--></pre>
					<pre>
SELECT COUNT(*) FROM professor WHERE deptno = 101 AND comm IS NOT NULL;<!--
					--></pre>
					<p>
						COUNT(*) 는 NULL을 가진 행을 포함하므로 두 문장의 결과는 다르게 나온다.
					</p>
					<div class="alert alert-info">
						AVG, SUM, MIN, MAX 함수
					</div>
					<pre>
AVG([ DISTINCT | ALL]  expr)
SUM([ DISTINCT | ALL]  expr)
expr의 데이터 타입은 NUMBER만 가능함<!--
					--></pre>
					<p>
						/** 1) 가장 월급을 많이 받는 교수는 얼마를 받는가? */
					</p>
					<pre>
SELECT MAX(sal) FROM professor;<!--
					--></pre>
					<p>
						/** 2) 가장 월급을 적게 받는 교수는 얼마를 받는가? */
					</p>
					<pre>
SELECT MIN(sal) FROM professor;<!--
					--></pre>
					<p>
						/** 3) 한달에 지급되는 교수들의 총 급여는 얼마인가? */
					</p>
					<pre>
SELECT SUM(sal) FROM professor;<!--
					--></pre>
					<p>
						/** 4) 학생들의 평균 키는 얼마인가? */
					</p>
					<pre>
SELECT AVG(height) FROM student;<!--
					--></pre>
					<p>
						ex) 101번 학과 학생들의 몸무게 평균과 합계를 출력
					</p>
					<pre>
SQL>SELECT AVG(weight), SUM(weight) FROM student WHERE deptno = 101;<!--
					--></pre>
					<p>
						ex) 101번 학과 학생들 중에서 최대 키와 최소 키를 출력하여라.
					</p>
					<pre>
mysql>SELECT MAX(height), MIN(height) FROM student WHERE deptno = 101;<!--
					--></pre>
					<div class="alert alert-info">
						데이터 그룹 생성
					</div>
					<pre>
GROUP BY 절
- 특정 칼럼 값을 기준으로 테이블의 전체 행을 그룹별로 나누기 위한 절.

사용 규칙)
  * 그룹핑 전에 WHERE절을 사용하여 그룹 대상 집합을 먼저 선택가능.
  * GROUP BY 절에는 반드시 칼럼이름이 포함되어야 하며 별명 사용 불가.
  * (그룹별로 출력 순서는 오름차순으로 정렬됨.) - 정렬필요
  * SELECT 절에서 나열된 칼럼 이름이나 표현식은 GROUP BY절에 반드시
    포함 되어야 함.
  * GROUP BY 절에 나열된 칼럼 이름은 SELECT 절에 명시하지 않아도 됨.<!--
					--></pre>
					<p>
						ex) 교수 테이블에서 학과별로 교수 수와 보직 수당을 받는 교수 수를 출력
					</p>
					<pre>
SELECT deptno, COUNT(*), COUNT(comm) FROM professor GROUP BY deptno;<!--
					--></pre>
					<p>
						ex) 학과별로 소속 교수들의 평균 급여, 최소 급여, 최대 급여를 출력하여라.
					</p>
					<pre>
SELECT deptno, AVG(sal), MIN(sal), MAX(sal) FROM professor GROUP BY deptno;<!--
					--></pre>
					<div class="alert alert-info">
						다중 칼럼을 이용한 그룹별 검색
					</div>
					<p>
						ex) 학생 테이블에서 전체 학생을 소속 학과별로 나누고, 같은 학과 학생은 다시 학년별로 그룹핑하여, 학과와 학년별로 인원수, 평균 몸무게를 출력
					</p>
					<pre>
SELECT deptno, grade, COUNT(*), AVG(weight) FROM student GROUP BY deptno, grade;<!--
					--></pre>
					<div class="alert alert-info">
						HAVING 절
					</div>
					<pre>
SELECT 명령문의 WHERE절과 비슷한 기능을 하는 것으로 GROUP BY절에서
조건 검색을 할 경우 반드시 HAVING 절을 사용해야 한다.

 SELECT 	column, group_function(column)
 FROM 		table
 [WHERE 	condition]
 [GROUP BY 	group_by_expression]
 [HAVING 	group_condition]
 [ORDER BY  	column]<!--
					--></pre>
					<p>
						ex) 학생 수가 4명 초과인 학년에 대해서 학년, 학생 수, 평균 키, 평균 몸무게를 출력. 단, 출력순서는 평균 키가 높은 순부터 내림차순으로 출력.<br />
						
					</p>
					<pre>
* HAVING 절을 사용하지 않은 경우 (학생수가 4명 이하인 경우도 출력된다.)<!--
					--></pre>
					<pre>
						SELECT grade, COUNT(*), AVG(height) avg_height, AVG(weight) FROM student GROUP BY grade ORDER BY avg_height DESC;<!--
					--></pre>
					<pre>
* HAVING 절을 사용한 경우 (학생수가 4명 이하인 경우도 출력되지 않는다.)<!--
					--></pre>
					<pre>
SELECT grade, COUNT(*), AVG(height) avg_height, AVG(weight) FROM student GROUP BY grade HAVING COUNT(8) > 4 ORDER BY avg_height DESC;<!--
					--></pre>
					<p>
						ex) 학과별로 평균 몸무게와 학생수를 출력하되 평균 몸무게의 내림차순으로 정렬하세요.
					</p>
					<pre>
SELECT deptno, AVG(weight), COUNT(studno) FROM student GROUP BY deptno ORDER BY AVG(weight) DESC;<!--
					--></pre>
					<p>
						ex) 동일 학과 내에서 같은 학년에 재학중인 학생 수가 3명 이상인 그룹의 학과 번호, 학년, 학생 수, 최대 키, 최대 몸무게를 출력하세요.
					</p>
					<pre>
SELECT deptno, grade, COUNT(*), MAX(height), MAX(weight) FROM student GROUP BY deptno, grade HAVING COUNT(*) >= 3 ORDER BY deptno;<!--
					--></pre>
					<p>
						ex) 학과별 교수 수가 2명 이하인 학과 번호, 교수 수를 출력 하세요.
					</p>
					<pre>
SELECT deptno, COUNT(*) FROM professor GROUP BY deptno HAVING COUNT(*) <= 2 ORDER BY deptno;<!--
					--></pre>
				</div>

				<div class="note note-danger">
					<div class="alert alert-danger">
						조인 (Join)
					</div>
					<pre>
조인의 개념
	두 개 이상의 테이블을 결합하여 필요한 데이터를 조회하게 하는 기능
	예를 들어 학번이 10101인 학생의 이름과 소속 학과 이름을 출력하려
	할 때 student table 과 department table을 두 번 조회 해야 하지만
	조인을 이용하면 한번에 조회가 가능하다.

조인의 종류
	카티션 곱(cartesian product, cross join), EQUI JOIN,

조인 문법
	SELECT table1.column, table2.column
	FROM  table1, table2
	WHERE condition;
<!--
					--></pre>
					<div class="alert alert-danger">
						조인 (Join)
					</div>
					<div class="alert alert-danger">
						카티션 곱 (Cartesian Product)
					</div>
					<pre>
- 두개 이상의 테이블에 대해 연결 가능한 행을 모두 결합하는 조인방법.
WHERE 절에서 조인 조건절을 생략하거나 조인 조건을 잘못 설정하여 양쪽
테이블을 연결하는 조건을 만족하는 행이 하나도 없는 경우에 발생한다.<!--
					--></pre>
					<p>
						ex) 학생 테이블과 부서 테이블을 카티션 곱을 한 결과를 출력
					</p>
					<pre>
//<!--
					--></pre>
					<pre>
위 문장을 실행하면 112개의 행이 나온다. 위 쿼리문에서 WHERE 조건이 없어서 생긴 문제이며 항상 이런 상황이 발생하지 않도록 주의해야 한다.<!--
					--></pre>
					<div class="alert alert-danger">
						EQUI JOIN
					</div>
					<pre>
- SQL 문에서 가장 많이 사용되는 조인으로 조인 대상 테이블에서 공통칼럼을 ‘=‘ 비교를 통해 같은 값을 갖는 행을 연결하여 결과를 생성하는 조인 방법임.<!--
					--></pre>
					<p>
						ex) 학생 테이블과 부서 테이블을 EQUI JOIN 하여 학번, 이름, 학과번호, 소속학과이름, 학과 위치를 출력
					</p>
					<pre>
SELECT s.studno, s.name, s.deptno, d.dname, d.loc FROM student s, department d WHERE s.deptno = d.deptno;<!--
					--></pre>
					<p>
						ex) 학생테이블과 교수테이블을 조인하여 이름, 학년,지도교수 이름,직급을 출력하세요.
					</p>
					<pre>
						SELECT s.name, s.grade, p.name, p.position FROM student s, professor p WHERE s.profno = p.profno;<!--
					--></pre>
					<div class="alert alert-danger">
						INNER JOIN
					</div>
					<pre>
- 조인하는 테이블의 ON 절의 조건이 일치하는 결과만 출력한다.<!--
					--></pre>
					<p>
ex) 학생 테이블과 부서 테이블을 INNER JOIN 하여 학번, 이름, 학과번호, 소속학과이름, 학과 위치를 출력
					</p>
					<pre>
SELECT s.studno, s.name, s.deptno, d.dname, d.loc FROM student s INNER JOIN department d ON s.deptno = d.deptno;<!--
					--></pre>
					<p>
						학생테이블과 교수테이블을 조인하여 이름, 학년,지도교수 이름,직급을 출력하세요.
    					(앞의 예제를 INNER JOIN으로 표현)
					</p>
					<pre>
SELECT s.name, s.grade, p.name, p.position FROM student s INNER JOIN professor p ON s.profno = p.profno;<!--
					--></pre>
					<div class="alert alert-danger">
						OUTER JOIN
					</div>
					<pre>
NULL에 어떤 연산을 적용시켜도 결과는 null 이 된다. 따라서 조인 조건 중 하나의 값이 NULL일 경우 값이 NULL이 되어 출력되지 않는다.<br />
하지만 결과가 NULL 일지라도 출력해야 할 경우가 발생하는데 이때 사용되는 것이 OUTER JOIN 이다.<br />
LEFT OUTER JOIN, RIGHT OUTER JOIN, FULL OUTER JOIN FULL OUTER는 성능 저하 문제 때문에 실무에서 사용하지는 않는다.<!--
					--></pre>
					<pre>
** 학생별 지도 교수의 이름을 보고자 하는 경우<!--
					--></pre>
					<p>
						1) EQUI Join
					</p>
					<pre>
					
SELECT s.name '학생이름', s.grade ` 학년`, p.name `교수이름`, p.position `직급` FROM student s, professor p WHERE s.profno = p.profno;
SELECT s.mame, p.name FROM student s, professor p WHERE s.profno = p.profno;<!--
					--></pre>
					<p>
						2) INNER Join
					</p>
					<pre>
SELECT s.name, s.grade, p.name, p.position FROM student s INNER JOIN professor p ON s.profno = p.profno;<!--
					--></pre>
					<p>
						3) LEFT OUTER Join (단, 지도교수가 없는 경우 학생의 이름만 출력하라.)
					</p>
					<pre>
SELECT s.name, s.grade, p.name, p.position FROM student s LEFT OUTER JOIN professor p ON s.profno = p.profno;<!--
					--></pre>
					<p>
						4) RIGHT OUTER Join (단, 지도교수가 없는 경우 학생의 이름만 출력하라.)
					</p>
					<pre>
SELECT s.name, s.grade, p.name, p.position FROM professor s RIGHT OUTER JOIN student p ON s.profno = p.profno;<!--
					--></pre>
				</div>

				<div class="note note-warning">
					MySQL 백업과 복원
					* 이 글에서는 mysqldump를 이용한 논리적 백업 과 복원을 위한 내용을 위주로 정리한다. (물리적 백업은 전문 DBA에게 부탁하는게 정신건강에 좋을 것 같다.)
					<div class="alert alert-danger">
						백업
					</div>
					<p>
						MySQL 데이터를 백업하는 방법은 크게 물리적 백업과 논리적 백업이 있다.
					</p>
					<ol>
						<li>
							물리적 백업
							<ul>
								<li>
									물리적 백업은 MySQL DB의 물리 파일을 백업하는 것이다.
									<ul>
										<li>
											<h4>장점</h4>
											<ul>
												<li>
													물리적 백업은 속도가 빠르며 작업이 단순하다.
												</li>
											</ul>
										</li>
										<li>
											<h4>단점</h4>
											<ul>
												<li>
													InnoDB의 물리적 파일은 상응하는 논리 백업에 비해 상당히 크다.
												</li>
												<li>
													데이터 복구시에 문제가 발생할 소지가 있으면 문제발생시 원인파악 및 해결이 어렵다.
												</li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							논리적 백업
							<ul>
								<li>
									논리적 백업은 mysqldump 혹은 기타 툴을 이용해서 SQL문을 갖는 텍스트 파일을 생성하는 것이다.
									<ul>
										<li>
											<h4>장점</h4>
											<ul>
												<li>논리적 백업은 데이터를 검토할 수 있다.</li>
												<li>복원작업이 수월하며, 물리적 백업에 비해 복원시 데이터 손상을 막아주며, 문제 발생시 원인 파악및 해결하기가 수월하다.</li>
											</ul>
										</li>
										<li>
											<h4>단점</h4>
											<ul>
												<li>백업/복원시 시스템 리소스를 더 많이 소모한다. (물리적 백업은 파일 copy만 하면 되니까!!!)</li>
												<li>부동 소수점 데이터의 백업&복원시 데이터 정확성을 잃게 될 수 있다.</li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							mysqldump 사용법
							<pre>
$ mysqldump -u[userId] -p[password] --all-databases > dump.sql  // 서버에 있는 모든 것의 논리 백업 생성<!--
							--></pre>
							<pre>
$ mysqldump -u[userId] -p[password] --databases [DB명] > dump.sql // 특정 데이터베이스만의 논리 백업 생성<!--
							--></pre>
							<pre>
$ mysqldump -u[userId] -p[password] [DB명] [테이블명]<!--
							--></pre>
							<ul>
								<li>
									기타 옵션
								</li>
							</ul>
							<pre>
-A, --all-databases : 모든 DB 덤프
-B, --databases : 특정 DB를 덤프
--opt : 버퍼링을 비확성화 하고, 많은 데이터를 덤프에 있는 소량의 SQL구문에 기록해 더효율적으로 동작하다록 한다.
--allow-keywords, --quote-names : 예약어를 사용하는 테이블을 덤프하고 복원할 수 있게 한다.
--lock-alltables : 전역적으로 일관된 백업을 만들도록 "FLUSH TABLES WITH READ LOCK"을 사용한다. 
--tab : "SELECT INTO OUTFILE"로 파일을 덤프하여, 덤프 및 복원 속도가 매우 빠르다.
-d, --no-data :  데이터는 제외하고 스키마만 덤프
-t, --no-create-info : 스키마는 제외하고<!-- 
							--></pre>
						</li>
						<li>
							dump 파일 복원 방법
							<pre>
- mysql -u [userId] -p [password] [DB명] < dump.sql
- mysql 접속한 후 아래의 명령 실행
mysql> source dump.sql<!--
	     					--></pre>
						</li>
					</ol>
				</div>

				<div class="note note-success">
					//
				</div>
				
			</div>
			<!-- 좌측 탭메와 우측 미니 슬라이더 End -->
		</div>
	</div>
	<!-- 메인 내용 End -->
	<?php include_once("footer_ui.php"); ?>

	<!-- Load javascripts at bottom, this will reduce page load time -->
	<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
	<!--[if lt IE 9]>
		<script src="assets/global/plugins/respond.min.js"></script>
	<![endif]-->
	<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
	<script src="assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
	<!-- pop up -->
	<script src="assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
	<!-- slider for products -->
	<script src="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

	<!-- BEGIN RevolutionSlider -->
	<script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
	<script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
	<script src="assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
	<!-- END RevolutionSlider -->

	<script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			Layout.init();    
			Layout.initOWL();
			RevosliderInit.initRevoSlider();
			Layout.initTwitter();
			//Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
			//Layout.initNavScrolling(); 
		});
	</script>
	<!-- END PAGE LEVEL JAVASCRIPTS -->
	<!-- 구글 웹폰트 로드 -->
	<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.10/webfont.js"></script>
	<script type="text/javascript">
		WebFont.load({

			// For google fonts
			google: {
				families: ['Droid Sans', 'Droid Serif']
			}
			// For early access or custom font
			custom: {
				families: ['Nanum Gothic'],
				urls: ['http://fonts.googleapis.com/earlyaccess/nanumgothic.css']
			}
		});
	</script>
	<!-- 구글 웹폰트 로드 -->
</body>
<!-- END BODY -->
</html>