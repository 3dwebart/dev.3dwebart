<?php include_once('./header_ui.php'); ?>
<?php
	$this_url = post('this_url');
	echo($this_url)
?>
<script>
	$(document).ready(function() {
		$('.lang-ko').click(function() {
			$('.language-pack').val('ko');
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($this_url); ?>');
			$('.myform').submit();
		});
		$('.lang-cn').click(function() {
			$('.language-pack').val('cn');
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($this_url); ?>');
			$('.myform').submit();
		});
		$('.lang-jp').click(function() {
			$('.language-pack').val('jp');
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($this_url); ?>');
			$('.myform').submit();
		});
		$('.lang-en').click(function() {
			$('.language-pack').val('en');
			$('.myform').attr('method', 'post');
			$('.myform').attr('action', '<?php echo($this_url); ?>');
			$('.myform').submit();
		});
	});
</script>
<input type="hidden" class="language-pack" name="lang" value="<?php echo($lang); ?>" />0
<div class="container">
	<button type="submit" class="lang-btn lang-en col-md-2 col-ms-3 col-xs-4 all-padding10"><img src="img/langpack-en.png" alt="<?php echo($strings['langKR']); ?>" class="img-responsive" /></button>
	<button type="submit" class="lang-btn lang-cn col-md-2 col-ms-3 col-xs-4 all-padding10"><img src="img/langpack-cn.png" alt="<?php echo($strings['langCN']); ?>" class="img-responsive" /></button>
	<button type="submit" class="lang-btn lang-jp col-md-2 col-ms-3 col-xs-4 all-padding10"><img src="img/langpack-jp.png" alt="<?php echo($strings['langJP']); ?>" class="img-responsive" /></button>
	<button type="submit" class="lang-btn lang-ko col-md-2 col-ms-3 col-xs-4 all-padding10"><img src="img/langpack-ko.png" alt="<?php echo($strings['langEN']); ?>" class="img-responsive" /></button>
</div>
<?php include_once('./footer_ui.php');?>