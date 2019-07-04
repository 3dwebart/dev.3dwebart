<?php
    include_once('./header.php');
    $id = post('id');
?>
<div class="portfolio-detail-wrap">
	<?php
		if(empty($id)) {
			redirect(false, '없는 게시물 이거나 삭제된 게시물 입니다.\n다시 확인해 주세요.');
		} else {
			$sql = "SELECT subject, content FROM bbs_documents WHERE id = %d";
			$res = $db -> query($sql, array($id));
			$row = $db -> fetch_assoc();
			$subject = $row['subject'];
			$content = $row['content'];
	?>
	<h1 class="portfolio-detail-title"><?php echo($row['subject']) ?></h1>
	<div class="col-md-5">
		<?php
			$file_sql = "SELECT CONCAT('%s', dir, file_name) AS img, 
								origin_name 
							FROM 
								bbs_files 
							WHERE 
								document_id = %d AND 
								INSTR(LOWER(file_type), LOWER('jpeg')) + 
								INSTR(LOWER(file_type), LOWER('png')) + 
								INSTR(LOWER(file_type), LOWER('gif'))";
			$file_res = $db -> query($file_sql, array($site_home, $id));
			while ($row = $db -> fetch_assoc()) {
		?>
		<img src="<?php echo($row['img']); ?>" alt="<?php echo($row['origin_name']); ?>" title="<?php echo($row['origin_name']); ?>" class="img-responsive">
		<?php
			}
		?>
	</div>
	<div class="col-md-7 portfolio-detail-info">
		<h3 class="subject"><?php echo($subject); ?></h3>
		<div class="content"><?php echo($content); ?></div>
	</div>
	<?php
		}
	?>

</div>
<link rel="stylesheet" href="<?php echo($front_css_url.'/custom-portfolio-detail.css'); ?>">