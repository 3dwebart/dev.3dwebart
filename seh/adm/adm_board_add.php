<?php
	include_once('header_ui.php');

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 접근 가능합니다.');
	}

	$sql = "SELECT id, bo_group_id, bo_group_name FROM bbs_group";
	$result = $db -> query($sql);
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

			$('.board-add-btn').click(function() {
				$('.MyForm').attr('method', 'post');
				$('.MyForm').attr('action', 'adm_board_add_ok.php');
				$('.MyForm').submit();
			});
		});



	</script>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-header">
				<h1 class="note note-warning">게시판 추가</h1>
			</div>
				<!-- 가입폼 시작 -->
			<form name="myform" method="post" action="adm_board_add_ok.php" role="form" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="top_file">상단 이미지</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="file" name="top_file" id="top_file" class="filestyle" data-buttonText="Find Top Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"  data-buttonBefore="true" data-buttonName="btn-primary">
							<!--
							<input type="file" name="myfile" id="myfile" class="filestyle" data-input="false" data-icon="false" data-buttonText="Find file" data-buttonName="btn-primary"/>
							-->
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="bottom_file">하단 이미지</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="file" name="bottom_file" id="bottom_file" class="filestyle" data-buttonText="Find Bottom Image"  data-buttonBefore="true" data-buttonName="btn-primary">
							<!--
							<input type="file" name="myfile" id="myfile" class="filestyle" data-input="false" data-icon="false" data-buttonText="Find file" data-buttonName="btn-primary"/>
							-->
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="bo_name">게시판 이름(영문)</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="bo_name" id="bo_name" class="form-control" placeholder="게시판 이름 - 영문으로 작성하세요 수정 불가" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="bo_group_id">게시판 그룹</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<?
								$tmp_array = array();
								while ($board_group = $db -> fetch_array()) {
								$tmp_array[$board_group['id']] = $board_group['bo_group_name']; 
								}
							?>
							<select name="bo_group_id" id="bo_group_id" class="form-control">
							<? foreach ($tmp_array as $k=>$v) { ?>
								<option value="<?=$k?>"<? if ($k == $board_group['bo_group_id']){ ?> selected<? } ?>><?=$v?></option>
							<? } ?>
							</select>
							<input type="hidden" value="<?=$board_group['bo_group_name']?>" id="bo_group_name" name="bo_group_name">
							<script>
								$("#bo_group_id").change(function() {
									var base_select = $('#bo_group_id option').index(function() {
										if ($(this).is(':selected')) {
											$('#bo_group_name').val($('#bo_group_id option').index($('#bo_group_id option:selected').text()));
										};
									});

									var str = "";

									$('#bo_group_id > option:selected').each(function(){
										str += $(this).text();
									});

									$('#bo_group_name').val(str);
								});

								$("#bo_group_id").trigger("change");
							</script>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="title">게시판 제목(한글/영문)</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="title" id="title" class="form-control" placeholder="게시판 이름" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="type">게시판 유형</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="type" id="type" class="form-control">
								<option value="general" selected>일반게시판</option>
								<option value="gallery">갤러리 게시판</option>
								<option value="movie">동영상 게시판</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="l_level">리스트 보기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="l_level" id="l_level" class="form-control">
								<? for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
								<option value="<?=$i?>" selected><?=$i?></option>
								<? } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="r_level">본문 보기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="r_level" id="r_level" class="form-control">
								<? for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
								<option value="<?=$i?>" selected><?=$i?></option>
								<? } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="w_level">글쓰기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="w_level" id="w_level" class="form-control">
								<? for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
								<option value="<?=$i?>" selected><?=$i?></option>
								<? } ?>
							</select>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary board-add-btn">게시판 생성</button>
						<button type="reset" class="btn btn-danger">다시작성</button>
					</div>
				</fieldset>
			</form>
			<!-- 가입폼 끝 -->
		</div>
	</div>
<?php include_once('footer_ui.php'); ?>