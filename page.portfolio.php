<?php
	include_once('header_ui.php');
	$sql = "SELECT id, bo_name, title, reg_date FROM bbs_config WHERE INSTR(LOWER(bo_name), LOWER('portfolio_'))";
	$res = $db -> query($sql);
	$total_row = $db -> num_rows();
?>
<div class="header-title"></div>
<script id="headerTitle" type="text/x-jquery-tmpl">
	<div class="page-header">
		<div class="container">
			<h1>${Navi2Portfolio}</h1>
			<span class="pull-right">
					<a href="http://3dwebart">HOME</a> 
					<i class="fa fa-caret-right" aria-hidden="true"></i>
					${Navi2Portfolio}
			</span>
		</div>
	</div>
<ul class="nav nav-tabs">
<?php
	while ($row = $db -> fetch_assoc()) {
		switch ($row['bo_name']) {
			case 'portfolio_3d':
				$bo_name = 'Navi21WorkOf3D';
				break;
			case 'portfolio_website':
				$bo_name = 'Navi22WorkOfWebsite';
				break;
			case 'portfolio_art':
				$bo_name = 'Navi23WorkOfArt';
				break;
			
			default:
				# code...
				break;
		}
?>
  	<li>
		<a data-toggle="tab" href="#tabs_<?php echo($row['id']); ?>" data-link="<?php echo($row['bo_name']); ?>">
			${<?php echo($bo_name); ?>}
		</a>
	</li>
<?php
	}
?>
	<span class="more pull-right">
		<a href="<?php echo($bbs_home.'/index.php?bo_name=portfolio_3d') ?>">more</a>
	</span>
	<div class="clearfix"></div>
</ul>
</script>
<div class="tab-content">
<?php
	$sql = "SELECT id, bo_name, title, reg_date FROM bbs_config WHERE INSTR(LOWER(bo_name), LOWER('portfolio_'))";
	$res = $db -> query($sql);
	$rows = array();
	$tab_nav_cnt = 0;
	while($row = $db -> fetch_assoc())
		$rows[] = $row;
		foreach ($rows as $row) {
			$id       = $row['id'];
			$bo_name  = $row['bo_name'];
			$bo_table = 'bo_table_'.$bo_name;
			$bo_files = $bo_table.'_files';
			$title    = $row['title'];
?>

	<div id="tabs_<?php echo($id); ?>" class="tab-pane fade">
<?php
		$bo_sql = "SELECT 
					b.id, 
					b.bbs_name, 
					b.subject, 
					b.content, 
					(SELECT CONCAT(f.dir,f.file_name) 
						FROM `%s` AS f 
						WHERE 
							INSTR(LOWER(f.file_type), LOWER('jpeg')) + 
							INSTR(LOWER(f.file_type), LOWER('png')) + 
							INSTR(LOWER(f.file_type), LOWER('gif')) AND
							f.document_id = b.id LIMIT 0, 1) AS img, 
					(SELECT f.origin_name 
						FROM `%s` AS f 
						WHERE 
							INSTR(LOWER(f.file_type), LOWER('jpeg')) + 
							INSTR(LOWER(f.file_type), LOWER('png')) + 
							INSTR(LOWER(f.file_type), LOWER('gif')) AND
							f.document_id = b.id LIMIT 0, 1) AS img_alt 
					FROM `%s` AS b 
					WHERE b.bbs_name = '%s' LIMIT 0,8";
		$bo_res = $db -> query($bo_sql, array($bo_files, $bo_files, $bo_table, $bo_name));
		$bo_rows = array();
		$bo_cnt = $db -> num_rows();
		if($bo_cnt == 0) {
?>
	<div class="col-md-3">데이터가 없습니다.</div>
<?php
		} else {
			while ($bo_row = $db -> fetch_assoc())
				$bo_rows[] = $bo_row;
			foreach ($bo_rows as $bo_row) {
?>
	<div class="col-md-3">
		<div class="block">
			<?php if ($bo_row['img'] == NULL): ?>
			<img src="<?php echo($site_home.'/skin/board/web_gallery/img/no-image.png'); ?>" alt="no-image" title="no-image" class="img-responsive img-thumbnail">
			<?php else: ?>
			<img src="<?php echo($site_home.$bo_row['img']); ?>" alt="<?php echo($bo_row['subject']); ?>" title="<?php echo($bo_row['subject']); ?>" class="img-responsive img-thumbnail">
			<?php endif ?>
			<div class="mask">
				<div class="mask-content-group">
					<div class="mask-content">
						<a href="<?php echo($bbs_home.'/read.php?bo_name='.$bo_row['bbs_name'].'&amp;id='.$bo_row['id']) ?>" class="title ajax-popup-link" data-id="<?php echo($bo_row['id']); ?>"><?php echo($bo_row['subject']); ?></a>
						<span class="content"><?php echo($bo_row['content']); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
			}
		}
?>
	<div class="clearfix"></div>
	</div>

<?php
	$tab_nav_cnt++;
	}
?>
</div>
<link rel="stylesheet" href="<?php echo($front_css_url.'/custom-portfolio.css'); ?>">
<link rel="stylesheet" href="<?php echo($front_css_url.'/magnific-popup.css'); ?>">
<script src="<?php echo($front_js_url.'/custom-portfolio.js'); ?>"></script>
<script src="<?php echo($front_js_url.'/jquery.magnific-popup.js'); ?>"></script>
<script>
(function($) {
	var mainWidth = jQuery(window).width();
	jQuery('.ajax-popup-link').each(function() {
		jQuery(this).magnificPopup({
	        type: 'ajax',
	        showCloseBtn: true,
	        alignTop: true,
	        overflowY: 'scroll',
	        midClick: true,
			ajax: {
				settings: {
					url: '<?php echo($site_home); ?>/page.portfolio.details.php',
					type: 'POST',
					data: {
						id: jQuery(this).data('id')
					}
				}
			}
	    });
	});
})(jQuery);
</script>
<?php include_once('./footer_ui.php'); ?>
