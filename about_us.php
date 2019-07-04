<?php include_once('./header_ui.php'); ?>
<script>
	$(document).ready(function() {
		
		$('.main-logo').css('text-align', 'center');
		$('.lang-change').click(function() {
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($site_home); ?>/language_select.php');
			$('.myform').submit();
		});

		$('.lang-ko').click(function() {
			$('.language-pack').val('ko');
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($members_home); ?>/join.php');
			$('.myform').submit();
		});
		$('.lang-cn').click(function() {
			$('.language-pack').val('cn');
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($members_home); ?>/join.php');
			$('.myform').submit();
		});
		$('.lang-jp').click(function() {
			$('.language-pack').val('jp');
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($members_home); ?>/join.php');
			$('.myform').submit();
		});
		$('.lang-en').click(function() {
			$('.language-pack').val('en');
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($members_home); ?>/join.php');
			$('.myform').submit();
		});
	});
</script>
<?php
	if($now_url == '') {
		$now_url = $site_home.'/imdex.php';
	}
?>
<input type="hidden" name="this_url" value="<?php echo($now_url); ?>" />
<input type="hidden" class="language-pack" name="lang" value="<?php echo($lang); ?>" />
<div class="container">
	<div class="round-box">
		<div class="in-box">
	
			<div class="col-md-10 col-ms-10 about-us-title">
				<h1 class="text-center"><?php echo($strings['PageAboutUsTitle1']); ?></h1>
		
			</div>
			<div class="col-md-12">
				<div class="top-margin20">
					<?php echo($strings['PageAboutUsContent1']); ?>
				</div>
				<div class="top-margin20">
					<?php echo($strings['PageAboutUsContent2']); ?>
				</div>
				<div class="top-margin20">
					<?php echo($strings['PageAboutUsContent3']); ?>
				</div>
				<div class="top-margin20">
					<?php echo($strings['PageAboutUsContent4']); ?>
				</div>
				<div class="top-margin20">
					<?php echo($strings['PageAboutUsContent5']); ?>
				</div>
				<div class="top-margin20">
					<?php echo($strings['PageAboutUsContent6']); ?>
				</div>
				<div class="top-margin20">
					<?php echo($strings['PageAboutUsContent7']); ?>
				</div>
		
			</div>
			<div class="clear-fix"></div>
			<hr />
		</div>
	</div>
</div>
<?php include_once('./footer_ui.php');?>