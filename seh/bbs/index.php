<? include_once('../header_ui.php'); ?>
<? include_once('bbs_config.php'); ?>
<div class="container">
<div class="page-header">
	<h1><?=$bbs_config_data['title']?></h1>
</div>
<?
	$page_title = $bbs_config_data['title'];
	if ($bbs_config_data['type'] == "general") {
		include_once("list_board.php");
	} else if ($bbs_config_data['type'] == "gallery") {
		include_once("list_gallery.php");
	} else if ($bbs_config_data['type'] == "movie") {
		include_once("list_movie.php");
	} else {
		if (!$session_adm_id) {
			redirect($site_home.'/index.php', '관리자만 사용 할 수 있습니다.');
		} else {
			include_once("list_main_slide.php");
		}
	}
?>
</div>