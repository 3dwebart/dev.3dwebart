<?php
	error_reporting(E_ALL);
ini_set("display_errors", 1);
	include_once('../header_ui.php');
	
	$all_search = get('all_search');
	
	$search = str_replace($all_search, "<span style='color: red'>".$all_search."</span>", $all_search);
?>
<script>
	$(document).ready(function() {
		//$('.left-area').height(function() {
			if($(this).height() > $(this).parent().parent().find('.right-area').height()) {
				$(this).parent().parent().find('.right-area').height($(this).height());
			} else {
				$(this).height($(this).parent().parent().find('.right-area').height());
			}
		//});
	});
</script>
<div class="container">
	<div class="page-header">
		<h1>전체 검색</h1>
		<h4>검색어 : <?php echo($all_search); ?></h4>
		<h4>검색어 : <?php echo($search); ?></h4>
		<!--
		<h4>검색어 : <?php echo(keywordHightlight('css', 'highlight', 'cssHTMLCSShtmlCsshTMlcSS-CSS-xss-css')); ?></h4>
		-->
	</div>
<?php
	if($session_is_admin == 'true') {
		$sql = "SELECT id, bo_group_id FROM bbs_group WHERE bo_group_id LIKE '%%%s%%'";
		$result = $db -> query($sql, array($all_search));
		
		$group_id_ctn = $db -> affected_rows();
		echo("<div class='row'>");
		echo("<div class='col-md-12'>");
		echo("<div class='col-md-6'>");
		echo('<h1>그룹 - 아이디</h1>');
		echo('<div>'.$group_id_ctn.'건</div>');
		
		if($group_id_ctn > 0) {
			echo('<hr />');
			echo("<div class='left-area'>");
			while($row = $db -> fetch_assoc()) {
				//$bo_group_name = $row['bo_group_name'];
				echo("<div>".keywordHightlight($all_search, "highlight", $row['bo_group_id']).'</div>');
				
			}
			echo("</div>");
		}
		echo("</div>");
		
		
		$sql = "SELECT id, bo_group_name FROM bbs_group WHERE bo_group_name LIKE '%%%s%%'";
		$result = $db -> query($sql, array($all_search));
		
		$group_namw_ctn = $db -> affected_rows();
		echo("<div class='col-md-6'>");
		echo('<h1>그룹 - 제목</h1>');
		echo('<div>'.$group_namw_ctn.'건</div>');
		
		if($group_namw_ctn > 0) {
			echo('<hr />');
			echo("<div class='righr-area'>");
			while($row = $db -> fetch_assoc()) {
				echo("<div>".keywordHightlight($all_search, "highlight", $row['bo_group_name']).'</div>');
			}
			echo("</div>");
		}
		echo("</div>");
		echo("</div>");
		echo("</div>");
		echo("<div class='clearfix'></div>");
		echo('<hr />');
	}
	
	$sql = "SELECT id, bo_name, title FROM bbs_config WHERE bo_name LIKE '%%%s%%' OR title LIKE '%%%s%%'";
	$result = $db -> query($sql, array($all_search, $all_search));
	
	$group_id_ctn = $db -> affected_rows();
	echo("<div class='row'>");
	echo("<div class='col-md-12'>");
	echo("<div class='col-md-6'>");
	
	echo('<h1>게시판</h1>');
	echo('<div>'.$group_id_ctn.'건</div>');
	
	if($group_id_ctn > 0) {
		echo('<hr />');
		echo("<div class='left-area'>");
		while($row = $db -> fetch_assoc()) {
			echo("<div><a href='".$bbs_home.'/index.php?bbs_id='.$row['id']."'>".keywordHightlight($all_search, "highlight", $row['title']).'</a></div>');
		}
		echo("</div>");
		echo('<hr />');
	}
	echo("</div>");
	
	$sql = "SELECT id, bbs_id, bbs_name, writer, subject, content FROM bbs_documents WHERE writer LIKE '%%%s%%' OR subject LIKE '%%%s%%' OR content LIKE '%%%s%%'";
	$result = $db -> query($sql, array($all_search, $all_search, $all_search));
	
	$group_id_ctn = $db -> affected_rows();
	
	echo("<div class='col-md-6'>");
	echo('<h1>게시물</h1>');
	echo('<div>'.$group_id_ctn.'건</div>');
	
	if($group_id_ctn > 0) {
		echo('<hr />');
		echo("<div class='righr-area'>");
		while($row = $db -> fetch_assoc()) {
			echo("<div><a href='".$bbs_home.'/read.php?bo_name='.$row['bbs_name']."&id=".$row['id'].'&all_search='.$all_search."'>".keywordHightlight($all_search, "highlight", $row['subject']).'</a></div>');
		}
		echo("</div>");
		echo('<hr />');
	}
	echo("</div>");
	echo("</div>");
	echo("</div>");
?>
	<div class="clearfix"></div>
	<hr />
</div>

<?php include_once('../footer_ui.php'); ?>