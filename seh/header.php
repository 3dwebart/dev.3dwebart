<?php
	header("Content-Type: text/html; charset=utf-8");
	/*** 경로설정 ***/
	// DOCUMENT_ROOT 폴더
	$root_dir = $_SERVER['DOCUMENT_ROOT'];
	// 웹 사이트의 ROOT 폴더
	$site_dir = $root_dir;

	// 웹 사이트의 members 폴더
	$members_dir = $site_dir."/members";
	// 웹 사이트의 bbs 폴더
	$bbs_dir = $site_dir."/bbs";
	// 웹 사이트의 bbs 폴더
	$include_dir = $site_dir."/include";
	// 웹 사이트의 adm 폴더
	$admin_dir = $site_dir."/adm";
	// 웹 사이트의 ROOT URL
	$root_home = "http://".$_SERVER['HTTP_HOST'];
	// 웹 사이트의 ROOT URL
	$site_home = "http://".$_SERVER['HTTP_HOST'];
	// 웹 사이트의 members URL
	$members_home = $site_home."/members";
	// 웹 사이트의 plugins URL
	$plugins_home = $site_home."/plugins";
	// 웹 사이트의 ja URL
	$js_home = $site_home."/js";
	// 웹 사이트의 css URL
	$css_home = $site_home."/css";
	// 웹 사이트의 bbs URL
	$bbs_home = $site_home."/bbs";
	// 웹 사이트의 incluse URL
	$include_home = $site_home."/include";
	// 웹 사이트의 incluse URL
	$admin_home = $site_home."/adm";
	// 현재 URL이 의미하는 파일 경로
	$current_file = $_SERVER['PHP_SELF'];
	// 현재 URL
	$current_url = "http//".$_SERVER['HTTP_HOST'].$current_file;

	// 사이트의 현재 주소 + 파라미터
    $now_url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	// 사이트의 ROOT URL을 제외한 프로그램 경로
	$app_path = str_replace($site_home, "", $current_url);

	// 현재 파일이름(순수 파일명)
	$p = strrpos($app_path, "/");
	$l = strlen($app_path);
	$app_file = substr($app_path, $p + 1, $l - ($p + 1));

	$app_file_full = strlen($app_file);
	$app_file_cut = substr($app_file, 0, $app_file_full - 4);

	
	$find_get = strrpos($now_url, "lang");
	$all_l = strlen($now_url);
	$find_get_var =  substr($now_url, $all_l + 1, ($find_get));
	

	// 파일이름을 제외한 경로
	$app_dir = substr($app_path, 0, $p);

	$find_adm = strstr(dirname(__FILE__).$_SERVER['PHP_SELF'], "/adm");

	/** 데이터베이스에 접속하기 윟나 정보 정의하기 **/
	include_once($site_dir.'/include/common.php');
	include_once($site_dir.'/include/class.db.php');
	include_once($site_dir.'/session.php');

	// DB접속 및 결과 체크
	$db = new DB();

	if (!$db -> is_connect()) {
		redirect(FALSE, 'epdl터베이스 접속에 실패했습니다.');
	}
?>