<?php include_once('header_ui.php'); ?>
<?php
	// 이미 로그인 중이 아니라면 사용 불가
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	$board_num = get('board_id');
	
	// 데이터베이스에서 회원 정보 불러오기
	$sql = "SELECT id, bo_group_id, bo_group_name, bo_name, title, type, l_level, r_level, w_level, reg_date, edit_date FROM bbs_config WHERE id = %d";

	// SQL문 실행하기
	$result = $db -> query($sql, array($board_num));

	// 실행결과 점검하기
	if (!$result) {
		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));

		// printf('<h1>MySQL SQL Fail : %s</h1>', mysqli_error($con));
		redirect(FALSE, '회원정보를 읽어오는데 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	// 조회된 결과 수
	if ($db -> num_rows() < 1) {
		redirect(FALSE, '회원정보를 찾을 수 없습니다.');
	}

	// 조회결과를 배열로 변환 --> 컬럼이름이 배열의 라벨이 된다.
	$row = $db -> fetch_array();
?>
	<link rel="stylesheet" href="<?=$site_home?>/css/validate.css">
	<script type="text/javascript" src="<?=$site_home?>/plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?=$site_home?>/js/admin_board_validate.js"></script>
	<script>
		$(function() {
			$('fieldset > div').height(function() {
				$(this).find('.col-md-2').height($(this).find('.col-md-10').height()); 
			});
		});
	</script>
	
			<div class="page-header">
				<h1>게시판 정보 수정(<?=$row['title']?>)</h1>
			</div>
			<!-- 정보 수정 폼 시작 -->
			<form name="myform" id="myform" class="myform" method="post" action="<?=$admin_home?>/adm_board_edit_ok.php" role="form"  enctype="multipart/form-data">
				<fieldset>
					<input type="hidden" name="id" id="id" value="<?=$row['id']?>">
<?php
	// 첨부파일의 결로를 가져온다.
	$sql = "SELECT id, origin_name FROM deco_files WHERE document_id = %d AND file_area = 'top'";
	$result = $db -> query($sql, array($board_num));

	
	if ($db -> fetch_row() > 0) {
		$file_ea = true;
	} else {
		$file_ea = false;
	}

	$sql = "SELECT id, origin_name FROM deco_files WHERE document_id = %d AND file_area = 'top'";
	$result = $db -> query($sql, array($board_num));
?>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="top_file">상단 이미지</label>
						</div>
						<div class="col-md-10 alert alert-default top">
							<? if ($file_ea == true) { ?>
							<div class="col-md-8 col-sm-8 col-sx-8 left-padding-clear">
								<input type="file" name="top_file" id="top_file" class="filestyle top_file" data-buttonText="Find Top Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"  data-buttonBefore="true" data-buttonName="btn-primary">
							</div>
							<div class="col-md-4 col-sm-4 col-sx-4">
								<?php while ($files = $db -> fetch_array()) { ?>
								<script>
									$('#top_file').click(function() {
										alert('상단 이미지 선택 버튼을 누르면 자동 체크 됩니다.\n취소시에는 체크박스 해제해 주세요.\n만약 해당 이미지를 삭제 하시려면 체크 상태로 두셔도 됩니다.');
										$('.chk_t').attr('checked', true);
									});
								</script>
								<div class="radio">
									<label>
										<input type="checkbox" name="delete_t" class="chk_t" value="<?=$files['id']?>"> 
										<?=$files['origin_name']?> 삭제하기
									</label>
								</div>
								<?php } ?>
							</div>

							<? } else { ?>
							<input type="file" name="top_file" id="top_file" class="filestyle" data-buttonText="Find Top Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"  data-buttonBefore="true" data-buttonName="btn-primary">
							<? } ?>
						</div>
					</div>
<?php
	// 첨부파일의 결로를 가져온다.
	$sql = "SELECT id, origin_name FROM deco_files WHERE document_id = %d AND file_area = 'bottom'";
	$result = $db -> query($sql, array($board_num));

	if ($db -> fetch_row() > 0) {
		$file_ea = true;
	} else {
		$file_ea = false;
	}

	$sql = "SELECT id, origin_name FROM deco_files WHERE document_id = %d AND file_area = 'bottom'";
	$result = $db -> query($sql, array($board_num));
?>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="bottom_file">하단 이미지</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<? if ($file_ea == true) { ?>
							<div class="col-md-8 col-sm-8 col-sx-8 left-padding-clear">
								<input type="file" name="bottom_file" id="bottom_file" class="filestyle bottom_file" data-buttonText="Find Bottom Image"  data-buttonBefore="true" data-buttonName="btn-primary">
							</div>
							<div class="col-md-4 col-sm-4 col-sx-4">
								<?php while ($files = $db -> fetch_array()) { ?>
								<script>
									$('#bottom_file').click(function() {
										alert('하단 이미지 선택 버튼을 누르면 자동 체크 됩니다.\n 취소시에는 체크박스 해제해 주세요.\n 만약 해당 이미지를 삭제 하시려면 체크 상태로 두셔도 됩니다.');
										$('.chk_b').attr('checked', true);
									});
								</script>
								<div class="radio">
									<label>
										<input type="checkbox" name="delete_b" class="chk_b" value="<?=$files['id']?>"> 
										<?=$files['origin_name']?> 삭제하기
									</label>
								</div>
								<?php } ?>
							</div>
							<? } else { ?>
							<input type="file" name="bottom_file" id="" class="filestyle" data-buttonText="Find Bottom Image"  data-buttonBefore="true" data-buttonName="btn-primary">
							<? } ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="bo_name">게시판 제목</label>
						</div>
						<div class="col-md-10 alert alert-default">
							
						<input type="text" name="bo_name" id="bo_name" value="<?=$row['bo_name']?>"  disabled="disabled" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="title">게시판 이름</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="title" id="title" value="<?=$row['title']?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="bo_group_id">게시판 그룹</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<?
								$sql = "SELECT id, bo_group_id, bo_group_name FROM bbs_group";
								$result = $db -> query($sql);

								$tmp_array = array();
								while ($board_group = $db -> fetch_array()) {
								$tmp_array[$board_group['id']] = $board_group['bo_group_name']; 
								}
							?>

							<select name="bo_group_id" id="bo_group_id" class="form-control">
							<? foreach ($tmp_array as $k=>$v) { ?>
								<option value="<?=$k?>"<? if ($k == $row['bo_group_id']){ ?> selected<? } ?>><?=$v?></option>
							<? } ?>
							</select>
							<input type="text" value="<?=$row['bo_group_name']?>" id="bo_group_name" name="bo_group_name">
							<script>
								$("#bo_group_id").change(function () {
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
							<? /* ?>
							<?
								$sql = "SELECT id, bo_group_id, bo_group_name FROM bbs_group";
								$result = $db -> query($sql);

								$bo_group_name = array();
								$i = 0;
								while ($board_group = $db -> fetch_array()) {
									$bo_group_name[$i] = $board_group['bo_group_name'];
									$i++;
							?>
								
								<option value="<?=$board_group['id']?>" <? if ($board_group['id'] == $row['bo_group_id']){ ?>selected<? } ?>><?=$board_group['bo_group_name']?></option>
							<?
								}
							?>

							</select>
							<input type="text" value="<?=$board_group['bo_group_name']?>" id="bo_group_name" name="bo_group_name">
							<? */ ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="type">게시판 유형</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="type" id="type" class="form-control">
								<option value="general" <? if ($row['type'] == 'general') { ?>selected<?}?>>일반 게시판</option>
								<option value="gallery" <? if ($row['type'] == 'gallery') { ?>selected<?}?>>갤러리 게시판</option>
								<option value="movie" <? if ($row['type'] == 'movie') { ?>selected<?}?>>동영상 게시판</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="l_level">목록보기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="l_level" id="l_level" class="form-control">
								<? for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?=$i?> <? if ($row['l_level'] == $i) { ?>selected<?}?>><?=$i?></option>
								<? } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="r_level">본문보기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="r_level" id="r_level" class="form-control">
								<? for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?=$i?> <? if ($row['r_level'] == $i) { ?>selected<?}?>><?=$i?></option>
								<? } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="w_level">글쓰기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="w_level" id="w_level" class="form-control">
								<? for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?=$i?> <? if ($row['w_level'] == $i) { ?>selected<?}?>><?=$i?></option>
								<? } ?>
							</select>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">변경하기</button>
						<button type="reset" class="btn btn-danger">다시작성</button>
						<a href="index.php" class="btn btn-info">돌아가기</a>
					</div>
				</fieldset>
			</form>
			<!-- 정보 수정 폼 끝 -->
<?php include_once('footer_ui.php'); ?>