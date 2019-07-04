<?php
	//$header_path = dirname(__FILE__)."../header.php";
	include_once('../header.php');
	include_once($site_home.'/include/common.php');
	$lang = "en";
	
	include_once($site_dir.'/language/en.php');
	setcookie('MyCookie', urldecode($lang), time() + (60 * 60 * 24), '/');
	
	$lang = get_cookie('MyCookie');
?>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('form').submit();
	});
</script>

<!--
<form method="post" action="javascript:history.back()">
	<input type="hidden" name="lang" value="<?php echo($lang); ?>" />
</form>
-->
<form method="post" action="javascript:history.back()">
	<input type="hidden" name="lang" value="<?php echo($lang); ?>" />
</form>
