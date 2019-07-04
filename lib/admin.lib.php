<?php
	$header_path = dirname(__FILE__)."/../header.php";
	include_once($header_path);
	$db -> drop_table('testdb');
	die('The End');
	/*
	$sql = "SELECT id, bo_group_id, bo_group_name, bo_name FROM bbs_config";
	$res = $db -> query($sql);
	while ($row = $db -> fetch_assoc()) {
		$db -> create_table($row['bo_name']);
	}
	*/

	// $db -> create_table('javascript');
	// $db -> create_table('angularjs');
	// $db -> create_table('nodejs');
	// $db -> create_table('mysql');
	// $db -> create_table('linux');
	// $db -> create_table('php_study');
	// $db -> create_table('php_gnuboard');
	// $db -> create_table('php_zeroboard_xe');
	// $db -> create_table('asp_aspnet');
	// $db -> create_table('asp_artiboard');
	// $db -> create_table('jsp');
	// $db -> create_table('3d_maya_tutorial');
	// $db -> create_table('3d_maya_tip');
	// $db -> create_table('3d_maya_qna');
	// $db -> create_table('3d_maya_portfolio');
	// $db -> create_table('3d_maya_manual');
	// $db -> create_table('ps_tutorial');
	// $db -> create_table('ps_tip');
	// $db -> create_table('ps_qna');
	// $db -> create_table('ps_portfolio');
	// $db -> create_table('ai_tutorial');
	// $db -> create_table('ai_tip');
	// $db -> create_table('ai_qna');
	// $db -> create_table('ai_portfolio');
	// $db -> create_table('portfolio');
	exit();

	$sql = "SELECT id, bo_group_id, bo_group_name, bo_name FROM bbs_config";
	$res = $db -> query($sql);
	$c_row = array();
	while ($row = $db -> fetch_assoc())
		$c_row[] = $row;
	foreach ($c_row as $row) {
	 	$id      = $row['id'];
	 	$bo_name = $row['bo_name'];

	 	$sql = "SELECT id,
	 				bbs_id, 
					bbs_name, 
					notice_yn, 
					notice_yn_text, 
					member_id, 
					writer, 
					pwd,
					email,
					movie_size,
					movie_id,
					link,
					html,
					subject,
					content,
					img_align,
					img_pos,
					hit,
					reg_date,
					edit_date 
				FROM bbs_documents
				WHERE bbs_name = '%s'";
		$res = $db -> query($sql, array($bo_name));
		$b_row = array();
		while ($row2 = $db -> fetch_assoc())
			$b_row[] = $row2;
		foreach ($b_row as $row2) {
			$doc_id         = $row2['id'];
			$bbs_id         = $row2['bbs_id'];
			$bbs_name       = $row2['bbs_name'];
			$notice_yn      = $row2['notice_yn'];
			$notice_yn_text = $row2['notice_yn_text'];
			$member_id      = $row2['member_id'];
			$writer         = $row2['writer'];
			$pwd            = $row2['pwd'];
			$email          = $row2['email'];
			$movie_size     = $row2['movie_size'];
			$movie_id       = $row2['movie_id'];
			$link           = $row2['link'];
			$html           = $row2['html'];
			$subject        = $row2['subject'];
			$content        = $row2['content'];
			$img_align      = $row2['img_align'];
			$img_pos        = $row2['img_pos'];
			$hit            = $row2['hit'];
			$reg_date       = $row2['reg_date'];
			$edit_date      = $row2['edit_date'];
			
			$insert_sql = "INSERT INTO bo_table_%s (
				bbs_id, 
				bbs_name, 
				notice_yn, 
				notice_yn_text, 
				member_id, 
				writer, 
				pwd,
				email,
				movie_size,
				movie_id,
				link,
				html,
				subject,
				content,
				img_align,
				img_pos,
				hit,
				reg_date,
				edit_date
			) VALUES (
				%d, 
				'%s', 
				'%s', 
				'%s', 
				%d, 
				'%s', 
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				%d,
				'%s',
				'%s'
			)";
			$insert_res = $db -> query($insert_sql, array(
				$bbs_name,
				$bbs_id, 
				$bbs_name, 
				$notice_yn, 
				$notice_yn_text, 
				$member_id, 
				$writer, 
				$pwd,
				$email,
				$movie_size,
				$movie_id,
				$link,
				$html,
				$subject,
				$content,
				$img_align,
				$img_pos,
				$hit,
				$reg_date,
				$edit_date
			));

			$sql3 = "SELECT document_id, 
					file_kind, 
					dir, 
					file_name, 
					file_type, 
					file_size, 
					origin_name,
					full_path,
					reg_date,
					edit_date 
				FROM bbs_files
				WHERE document_id = %d";
			$res3 = $db -> query($sql3, array($doc_id));
			$f_row = array();
			while ($row3 = $db -> fetch_assoc())
				$f_row[] = $row3;
			foreach ($f_row as $row3) {
				$document_id    = $row3['document_id'];
				$file_kind      = $row3['file_kind'];
				$dir            = $row3['dir'];
				$file_name      = $row3['file_name'];
				$file_type      = $row3['file_type'];
				$file_size      = $row3['file_size'];
				$origin_name    = $row3['origin_name'];
				$full_path      = $row3['full_path'];
				$reg_date       = $row2['reg_date'];
				$edit_date      = $row2['edit_date'];
				
				$insert_sql3 = "INSERT INTO bo_table_%s_files (
					document_id, 
					file_kind, 
					dir, 
					file_name, 
					file_type, 
					file_size, 
					origin_name,
					full_path,
					reg_date,
					edit_date
				) VALUES (
					%d, 
					'%s', 
					'%s', 
					'%s',  
					'%s', 
					%d,
					'%s',
					'%s',
					'%s',
					'%s',
				)";

				$insert_res3 = $db -> query($insert_sql3, array(
					$document_id,
					$file_kind, 
					$dir, 
					$file_name, 
					$file_type, 
					$file_size, 
					$origin_name, 
					$full_path,
					$reg_date,
					$edit_date
				));
			}
		}
	}

	exit();


/*

	INSERT INTO bo_table_poetry1 (
bbs_id, 
bbs_name, 
notice_yn, 
notice_yn_text, 
member_id, 
writer, 
pwd,
email,
movie_size,
movie_id,
link,
html,
subject,
content,
img_align,
img_pos,
hit,
reg_date,
edit_date
	) values ()
*/
?>