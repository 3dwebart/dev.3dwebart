<?php
	include_once('../header_ui.php');
	include_once('bbs_config.php');

	// 글 번호 파라미터 처리
	$id = get('id');

	if (!$id) {
		redirect(FALSE, '글 번호가 없습니다.');
	}
?>
<style>
	.btn + .btn {
		margin-left: 0;
	}

	h3 {
		padding-top: 10px;
		padding-bottom: 10px;
	}
</style>
<div class="clearfix"></div>
<div class="container">
	<div class="col-md-offset-4 col-md-4">
		<!-- 글 번호 상태 유지 -->
		<input type='hidden' name='id' value='<?php echo($id); ?>' />
		<input type="hidden" name="bbs_id" value="<?php echo($bbs_id); ?>" />
		<input type="hidden" name="bo_name" value="<?php echo($bo_name); ?>" />
		<fieldset>
			<div class="form-group">
			<?php if (!$session_id) { ?>
				<label for='pwd'>비밀번호</label>
				<input type="password" name="pwd" id="pwd" class="form-control"/>
			<?php } else { ?>
				<h3>정말 삭제하시겠습니까?</h3>
			<?php } ?>
			</div>
			<div class="form-group">
				<button type='submit' class='btn btn-danger btn-block del-btn'>
					삭제하기</button>
				<button type='reset' class='btn btn-primary btn-block'>
					삭제취소</button>
			</div>
		</fieldset>
	</div>
</div>
<script>
	(function($) {
		jQuery(document).on('click', '.del-btn', function() {
			jQuery('.myform').attr('method', 'post');
			jQuery('.myform').attr('action', 'delete_ok.php');
			jQuery('.myform').submit();
		});
	}) (jQuery)
</script>
<?php include_once('../footer_ui.php'); ?>
