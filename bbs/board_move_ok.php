<?php
	include_once('../header_ui.php');
	include_once('bbs_config.php');
	
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	
	$id             = post('id');
	$move           = post('move');
	$bbs_id         = post('bbs_id');
	$bo_name        = post('bo_name');

	$move_arr = explode('|', $move);

	if($bo_name) {
		$sql = "SELECT id FROM bbs_config WHERE bo_name = '%s'";
		$result = $db -> query($sql, array($bo_name));

		$row  = $db -> fetch_assoc();

		$bbs_id = $row['id'];
	}

	if($bbs_id) {
		$sql = "SELECT bo_name FROM bbs_config WHERE id = %d";
		$result = $db -> query($sql, array($bbs_id));

		$row  = $db -> fetch_assoc();

		$bo_name = $row['bo_name'];
	}

	// echo('<h1>move = '.$move_arr[0].'</h1>');
	// echo('<h1>move = '.$move_arr[1].'</h1>');
	// echo('<h1>move = '.$move.'</h1>');
	// echo('<h1>bo_name = '.$bo_name.'</h1>');
	// echo('<h1>bbs_id = '.$bbs_id.'</h1>');
	// exit();

	if (!$id)  { redirect(FALSE, '복사할 게시물 이 없습니다.'); }
	if (!$move)  { redirect(FALSE, '복사할 게시판을 선택하세요'); }
	
	$sql = "UPDATE bbs_documents SET bbs_id = %d, bbs_name = '%s', reg_date = NOW(), edit_date = NOW() WHERE id = %d";
	$result = $db -> query($sql, array($move_arr[0], $move_arr[1], $id));

	
    if(empty($bo_name)) {
	    $read_url = 'read.php?bbs_id='.$bbs_id.'&id='.$id;
    } else {
	    $read_url = 'read.php?bo_name='.$bo_name.'&id='.$id;
    }

    redirect($read_url, '게시물이 이동 되었습니다.');
?>
