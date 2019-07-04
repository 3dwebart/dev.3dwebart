<?php
	include_once('header_ui.php');

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}
?>
	<script>
		$(function() {
			$('fieldset > div').height(function() {
				$(this).find('.col-md-2').height($(this).find('.col-md-10').height());
			});

			$('.file').click(function() {
				$(this).attr('type', 'file');
			});
			$("#top_file").on("change",function(e){
				$(this).next(":checkbox").prop("checked",($(this).val()!="")?true:false);
			});
			$("#bottom_file").on("change",function(e){
				$(this).next(":checkbox").prop("checked",($(this).val()!="")?true:false);
			});

			$('.create-group-btn').click(function() {
				$('.MyForm').attr('method', 'post');
				$('.MyForm').attr('action', 'adm_group_add_ok.php');
				$('.MyForm').submit();
			});
		});



	</script>
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- 가입폼 시작 -->
				<fieldset>
					<div class="row">
						<div class="form-group">
							<div class="col-md-2 alert alert-success">
								<label for="bo_group_id">그룹 아이디(영문)</label>
							</div>
							<div class="col-md-10 alert alert-default">
								<input type="text" name="bo_group_id" id="bo_group_id" class="form-control" placeholder="그룹 아이디 - 영문으로 작성하세요 수정 불가" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-2 alert alert-success">
								<label for="bo_group_name">그룹 이름</label>
							</div>
							<div class="col-md-10 alert alert-default">
								<input type="text" name="bo_group_name" id="bo_group_name" class="form-control" placeholder="그룹 이름" />
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary create-group-btn">게시판 그룹 생성</button>
						<button type="reset" class="btn btn-danger">다시작성</button>
					</div>
				</fieldset>
			
			<!-- 가입폼 끝 -->
			</div>
			</div>
<?php include_once('footer_ui.php'); ?>