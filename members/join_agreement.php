<?php
	include_once ('../header_ui.php');

	$sql = "SELECT terms, policy FROM member_config";
	$result = $db -> query($sql);

	$row = $db -> fetch_assoc();
?>
<link rel="stylesheet" href="<?php echo($site_home.'/assets/admin/layout/css/member-setting.css'); ?>">
<style>
	.agreement_form {
		width: 80%;
		height: 300px;
		margin: 30px auto;
		overflow-y : scroll;
		border: 1px solid #DEDEDE;
		padding: 10px;
	}

	.agreement {
		padding-left: 10%;
	}

	.btns {
		margin-bottom: 50px;
	}
</style>
<div class="clearfix"></div>
<div class="header-title"></div>
<script id="headerTitle" type="text/x-jquery-tmpl">
	<div class="page-header">
		<div class="container">
		<h1>액관동의</h1>
		</div>
	</div>
</script>
<div class="container">
	<div class="agreement_form">
		<?php echo($row['terms']); ?>
	</div>
	<div class="form-group agreement terms-agreement">
		<p class="form-control-static">
			<input type="checkbox" name="terms" id="terms">
			<label for="terms">이용약관에 동의 합니다.</label>
		</p>
	</div>
	<div class="agreement_form">
		<?php echo($row['policy']); ?>
	</div>
	<div class="form-group agreement policy-agreement">
		<p class="form-control-static">
			<input type="checkbox" name="policy" id="policy">
			<label for="policy">개인정보취급방침에 동의 합니다.</label>
		</p>
	</div>

	<div class="form-group agreement all-agreement">
		<p class="form-control-static">
			<input type="checkbox" name="all_chk" id="all_chk">
			<label for="all_chk">모두 동의</label>
		</p>
	</div>
	<div class="text-center btns">
		<button type="submit" class="btn btn-primary next-btn">다음</button>
	</div>
</div>
<script>
	(function() {
		jQuery(document).on('click', '#terms, label[for="terms"]', function() {
			if(jQuery('#terms').is(':checked') == true && jQuery('#policy').is(':checked') == true) {
				jQuery('#all_chk').prop('checked', true);
			} else {
				jQuery('#all_chk').prop('checked', false);
			}
		});
		jQuery(document).on('click', '#policy, label[for="policy"]', function() {
			if(jQuery('#terms').is(':checked') == true && jQuery('#policy').is(':checked') == true) {
				jQuery('#all_chk').prop('checked', true);
			} else {
				jQuery('#all_chk').prop('checked', false);
			}
		});
		jQuery(document).on('click', '#all_chk', function() {
			if(jQuery('#terms').is(':checked') == true && jQuery('#policy').is(':checked') == true) {
				jQuery('#terms').prop('checked', false);
				jQuery('#policy').prop('checked', false);
				jQuery('#all_chk').prop('checked', false);
			} else {
				jQuery('#terms').prop('checked', true);
				jQuery('#policy').prop('checked', true);
				jQuery('#all_chk').prop('checked', true);
			}
		});
		jQuery(document).on('click', '.next-btn', function() {
			if(jQuery('#terms').is(':checked') == false && jQuery('#policy').is(':checked') == true) {
				alert('이용약관에 동의하셔야 합니다.');
				jQuery('#terms').scrollTop(300);
				jQuery('#policy').prop('checked', true);
			} else if(jQuery('#terms').is(':checked') == true && jQuery('#policy').is(':checked') == false) {
				alert('개인정보취급방침에 동의하셔야 합니다.');
				jQuery('#policy').scrollTop(2000);
				jQuery('#terms').prop('checked', true);
			} else if(jQuery('#terms').is(':checked') == false && jQuery('#policy').is(':checked') == false) {
				alert('액관에 동의하셔야 합니다.');
				jQuery('#terms').scrollTop(300);
			} else {
				jQuery('.myform').attr('method', 'post');
				jQuery('.myform').attr('action', 'join.php');
				jQuery('.myform').submit()
			}
		});
	}) (jQuery);
</script>
<?php include_once ('../footer_ui.php'); ?>
