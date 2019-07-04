<?php
	$header_path = dirname(__FILE__)."/../header.php";
	include_once($header_path);
	$nav = post('nav');
	$Navigation = array(
		0 => "file",
		1 => "Edit",
		2 => "Modify",
		3 => "Create",
		4 => "Display",
		5 => "Window",
		6 => "Assets"
	);
	if ($nav == 'Animation') {
		$Navigation[7] = 'Animate';
		$Navigation[8] = 'Geometry Cache';
		$Navigation[9] = 'Create Deformers';
		$Navigation[10] = 'Edit Deformers';
		$Navigation[11] = 'Skeleton';
		$Navigation[12] = 'Skin';
		$Navigation[13] = 'Constrain';
		$Navigation[14] = 'Chharacter';
		$Navigation[15] = 'Murcle';
		$Navigation[16] = 'Xgen';
		$Navigation[17] = 'Popeline Cache';
		$Navigation[18] = 'Bifrost';
	}
	if ($nav == 'Polygons') {
		$Navigation[7] = 'Select';
		$Navigation[8] = 'Mesh';
		$Navigation[9] = 'Edit Mesh';
		$Navigation[10] = 'Proxy';
		$Navigation[11] = 'Normals';
		$Navigation[12] = 'Color';
		$Navigation[13] = 'Create UVs';
		$Navigation[14] = 'Edit UVs';
		$Navigation[15] = 'Popeline Cache';
	}
	$Navigation[] = 'Help';
	/* Subs */
	$S1Nav = array();
	$S1Nav[0] = ['asdsadsa file1', 'file2', 'file3', 'file4', 'file5', 'file6'];
	$S1Nav[1] = ['Edit1', 'Edit2', 'Edit3', 'Edit4', 'Edit5', 'Edit6'];
	$navi = array(
		'main' => $Navigation,
		'S1Nav' => $S1Nav
	);
	
	echo json_encode($navi,JSON_UNESCAPED_UNICODE);
?>