<?php
include_once("./header.php");
$sql = "SELECT * FROM bbs_config";
$res = $db -> query($sql);
$board = array();
$bo_files = array();
$bo_comments = array();
$i = 0;
while ( $row = $db -> fetch_assoc($res) ) {
	$board[$i] = 'bo_table_'.$row['bo_name'];
	$bo_files[$i] = $board[$i].'_files';
	$bo_comments[$i] = $board[$i].'_comments';
	$i++;
}
for($i = 0; $i < count($board); $i++) {

	$drop_sql = "DROP TABLE IF EXISTS `%s`";
	$drop_res = $db -> query($drop_sql, array($bo_comments[$i]));
	$drop_sql = "DROP TABLE IF EXISTS `%s`";
	$drop_res = $db -> query($drop_sql, array($bo_files[$i]));
	$drop_sql = "DROP TABLE IF EXISTS `%s`";
	$drop_res = $db -> query($drop_sql, array($board[$i]));
	
	$create_sql = "CREATE TABLE `%s` LIKE `bbs_documents`";
	$create_res = $db -> query($create_sql, array($board[$i]));
	$create_sql = "CREATE TABLE `%s` LIKE `bbs_files`";
	$create_res = $db -> query($create_sql, array($bo_files[$i]));
	$create_sql = "CREATE TABLE `%s` LIKE `bbs_comments`";
	$create_res = $db -> query($create_sql, array($bo_comments[$i]));

	echo '<h1>'.$board[$i].'</h1>';
	echo '<h1>'.$bo_files[$i].'</h1>';
	echo '<h1>'.$bo_comments[$i].'</h1>';
}
?>