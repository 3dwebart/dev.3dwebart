<?php
	include_once('../header_ui.php');
	include_once('bbs_config.php');

    $bbs_id  = get('bbs_id');
    $bo_name = get('bo_name');
    
    if($bo_name) {
	    $sql = "SELECT id FROM bbs_config WHERE bo_name = '%s'";
	    $result = $db -> query($sql, array($bo_name));
	    
	    $row = $db -> fetch_assoc();
	    
	    $bbs_id = $row['id'];
    }
    
    if($bbs_id) {
	    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d";
	    $result = $db -> query($sql, array($bbs_id));
	    
	    $row = $db -> fetch_assoc();
	    
	    $bo_name = $row['bo_name'];
    }

	include_once($bbs_skin.'/write.php');
	
	include_once('../footer_ui.php');
?>
