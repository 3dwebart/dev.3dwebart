<?php
	include_once('../header_ui.php');
	include_once('bbs_config.php');
	$all_search = get('all_search');
	$bbs_id     = get('bbs_id');
	$bo_name    = get('bo_name');
    $id         = get('id');
?>

<!--
<script type="text/javascript" src="../js/lightbox.min.js"></script>
<link href="../css/lightbox.css" rel="stylesheet" />
-->

<?
	if($is_admin = 'true') {
		$sql = "SELECT adm_id, adm_level FROM admin WHERE adm_id = '%s'";
		$result = $db -> query($sql, array($session_user_id));
		
		$row = $db -> fetch_assoc();
		$_ID = $row['adm_id'];
	} else {
		$sql = "SELECT user_id, user_level FROM admin WHERE user_id = '%s'";
		$result = $db -> query($sql, array($session_user_id));
		
		$row = $db -> fetch_assoc();
		$_ID = $row['user_id'];
	}
	
	
    // 글 번호 파라미터 처리

    if (!$id) {
        redirect(FALSE, '글 번호가 없습니다.');
    }
    
    //echo('<h1>adm_chk = '.$adm_chk.'</h1>');
    // 본문 읽기
    $sql_tmpl = "SELECT id, writer, email, movie_size, movie_id, link, html, subject, content, img_align, img_pos, hit, reg_date
                 FROM `%s` WHERE (bbs_id = %d OR bbs_name = '%s') AND id = %d";
    $result = $db -> query($sql_tmpl, array($bo_table, $bbs_id, $bo_name, $id));

    if (!$result) {
        die();
        redirect(FALSE, '글 내용을 읽어오는데 실패했습니다. 관리자에게 문의해 주세요.');
    }

    if ($db -> num_rows() < 1) {
        redirect(FALSE, '존재하지 않는 글 입니다.');
    }

    $rows = $db -> fetch_array();
    // 다음 글 조회
    $next_subject = '다음 글이 없습니다.';
    $sql_tmpl = "SELECT id, subject FROM `%s`
                 WHERE (bbs_id = %d OR bbs_name = '%s') AND id > %d ORDER BY id ASC LIMIT 0, 1";
    $result = $db -> query($sql_tmpl, array($bo_table, $bbs_id, $bo_name, $id));

	if ($result != FALSE) {
		if ($db -> num_rows() > 0) {
			$next_rows = $db -> fetch_array();
			if($rows['html'] == 'y') {
				if(empty($bo_name)) {
					$next_subject = sprintf('<a href="read.php?bbs_id=%d&id=%d">%s</a>',
					$bbs_id, $next_rows['id'], keywordHightlight($all_search, "highlight", $next_rows['subject']));
				} else {
					$next_subject = sprintf('<a href="read.php?bo_name=%s&id=%d">%s</a>',
					$bo_name, $next_rows['id'], keywordHightlight($all_search, "highlight", $next_rows['subject']));
				}
				
			} else {
				if(empty($bo_name)) {
					$next_subject = sprintf('<a href="read.php?bbs_id=%d&id=%d">%s</a>',
					$bbs_id, $next_rows['id'], htmlspecialchars(keywordHightlight($all_search, "highlight", $next_rows['subject'])));
				} else {
					$next_subject = sprintf('<a href="read.php?bo_name=%s&id=%d">%s</a>',
					$bo_name, $next_rows['id'], htmlspecialchars(keywordHightlight($all_search, "highlight", $next_rows['subject'])));
				}
			}
        }
    }

    // 이전 글 조회
    $prev_subject = '이전 글이 없습니다.';
    $sql_tmpl = "SELECT id, subject FROM `%s`
                 WHERE (bbs_id = %d OR bbs_name = '%s') AND id < %d ORDER BY id DESC LIMIT 0, 1";
    $result = $db -> query($sql_tmpl, array($bo_table, $bbs_id, $bo_name, $id));

    if ($result != FALSE) {
        if ($db -> num_rows() > 0) {
            $prev_rows = $db -> fetch_array();
            if($rows['html'] == 'y') {
	            if(empty($bo_name)) {
		            $prev_subject = sprintf('<a href="read.php?bbs_id=%d&id=%d">%s</a>',
					$bbs_id, $prev_rows['id'], keywordHightlight($all_search, "highlight", $prev_rows['subject']));
	            } else {
		            $prev_subject = sprintf('<a href="read.php?bo_name=%s&id=%d">%s</a>',
					$bo_name, $prev_rows['id'], keywordHightlight($all_search, "highlight", $prev_rows['subject']));
	            }
            } else {
				if(empty($bo_name)) {
					$prev_subject = sprintf('<a href="read.php?bbs_id=%d&id=%d">%s</a>',
					$bbs_id, $prev_rows['id'], htmlspecialchars(keywordHightlight($all_search, "highlight", $prev_rows['subject'])));
				} else {
					$prev_subject = sprintf('<a href="read.php?bo_name=%s&id=%d">%s</a>',
					$bo_name, $prev_rows['id'], htmlspecialchars(keywordHightlight($all_search, "highlight", $prev_rows['subject'])));
				}
            }
        }
    }

    // 조회수 갱신
    $sql_tmpl = "UPDATE `%s` SET hit=hit+1 WHERE id=%d";
    $result = $db -> query($sql_tmpl, array($bo_table, $id));

    if (!$result) {
        redirect(FALSE, '조회수 갱신에 실패했습니다. 관리자에게 문의해 주세요.');
    }

    // 첨부파일 정보 조회
    $sql_tmpl = "SELECT id, concat(dir, file_name) as file_path,
                origin_name, file_type FROM `%s` WHERE document_id = %d";
    $files = $db -> query($sql_tmpl, array($bo_file, $id));

    //$files_validate = $db -> fetch_row();
   
    include_once($bbs_skin.'/view.php');
    
    include_once('../footer_ui.php');
?>
