	<?php
		//$Cuttent_Page = basename($_SERVER['PHP_SELF'])
		$nowFileName = basename($_SERVER['PHP_SELF']);
		$Cuttent_Page = substr_replace($nowFileName, '', -4);
	?>
	<?php include_once($site_dir."/header-color-setting.php"); ?>

	<?php include_once($site_dir."/header-top-bar.php"); ?>

	<?php include_once($site_dir."/header-navigation.php"); ?>
