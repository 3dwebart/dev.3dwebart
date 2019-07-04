<?php include_once('header_ui.php'); ?>
<?php
	// 이미 로그인 중이 아니라면 사용 불가
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	$board_num = get('board_id');
	/* 스킨 설정 Start */
	$path = $bbs_skin_dir; // 오픈하고자 하는 폴더 
	$entrys = array(); // 폴더내의 정보를 저장하기 위한 배열 
	$dirs = dir($path); // 오픈하기 
	while(false !== ($entry = $dirs->read())){ // 읽기 
		if(($entry != '.') && ($entry != '..')) { 
			if(is_dir($path.'/'.$entry)) { // 폴더이면 
				$entrys['dir'][] = $entry; 
			} 
			else { // 파일이면 
				$entrys['file'][] = $entry; 
			} 
		} 
	} 
	$dirs->close(); // 닫기

	$dircnt = count($entrys['dir']); // 폴더 수 
	$filecnt = count($entrys['file']); // 파일 수 

	// var_export($entrys);
	/* 스킨 설정 End */
	
	// 데이터베이스에서 회원 정보 불러오기
	$sql = "SELECT id, list_count, bo_group_id, bo_group_name, bo_name, cate,  title, skin, l_level, r_level, w_level, d_level, html_level, copy_move_level, sort, order_by, reg_date, edit_date FROM bbs_config WHERE id = %d";

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

	if($row['cate']) {
		$category = explode('|', $row['cate']);
	}
?>
	<script>
		$(function() {
			$('fieldset > div').height(function() {
				$(this).find('.col-md-2').height($(this).find('.col-md-10').height()); 
			});
		});
	</script>
	<input type="hidden" name="board_id" value="<?php echo($board_num); ?>" />
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-header">
				<h1>게시판 정보 수정(<?php echo($row['title']); ?>)</h1>
			</div>
			<!-- 정보 수정 폼 시작 -->
			<fieldset>
				<input type="hidden" name="id" id="id" value="<?php echo($row['id']); ?>">
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
						<?php if ($file_ea == true) { ?>
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
									<input type="checkbox" name="delete_t" class="chk_t" value="<?php echo($files['id']); ?>"> 
									<?php echo($files['origin_name']); ?> 삭제하기
								</label>
							</div>
							<?php } ?>
						</div>

						<?php } else { ?>
						<input type="file" name="top_file" id="top_file" class="filestyle" data-buttonText="Find Top Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"  data-buttonBefore="true" data-buttonName="btn-primary">
						<?php } ?>
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
						<?php if ($file_ea == true) { ?>
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
									<input type="checkbox" name="delete_b" class="chk_b" value="<?php echo($files['id']); ?>"> 
									<?php echo($files['origin_name']); ?> 삭제하기
								</label>
							</div>
							<?php } ?>
						</div>
						<?php } else { ?>
						<input type="file" name="bottom_file" id="" class="filestyle" data-buttonText="Find Bottom Image"  data-buttonBefore="true" data-buttonName="btn-primary">
						<?php } ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="bo_name">게시판 목록 수</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="chk_count" value="y" />
							</span>
							<input type="text" name="list_count" id="list_count" class="form-control" value="<?php echo($row['list_count']); ?>" placeholder="게시판 목록 갯수" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="bo_name">게시판 제목</label>
					</div>
					<div class="col-md-10 alert alert-default">
						
					<input type="text" name="bo_name" id="bo_name" value="<?php echo($row['bo_name']); ?>"  disabled="disabled" class="form-control">
					</div>
				</div>
				<div class="form-group cate">
					<div class="col-md-2 alert alert-success">
						<label for="cate_yn">카테고리</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<p class="form-control-static">
							<input type="checkbox" name="cate_yn" value="y" <?php if($row['cate']) { ?>checked=""<?php } ?>> 사용
						</p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="title">게시판 이름</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="title" id="title" value="<?php echo($row['title']); ?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="bo_group_id">게시판 그룹</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<?php
							$sql = "SELECT id, bo_group_id, bo_group_name FROM bbs_group";
							$result = $db -> query($sql);

							$tmp_array = array();
							while ($board_group = $db -> fetch_array()) {
							$tmp_array[$board_group['id']] = $board_group['bo_group_name']; 
							}
						?>

						<select name="bo_group_id" id="bo_group_id" class="form-control">
						<?php foreach ($tmp_array as $k=>$v) { ?>
							<option value="<?php echo($k); ?>"<?php if ($k == $row['bo_group_id']){ ?> selected<?php } ?>><?php echo($v); ?></option>
						<?php } ?>
						</select>
						<input type="hidden" value="<?php echo($row['bo_group_name']); ?>" id="bo_group_name" name="bo_group_name">
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
						<?php /* ?>
						<?php
							$sql = "SELECT id, bo_group_id, bo_group_name FROM bbs_group";
							$result = $db -> query($sql);

							$bo_group_name = array();
							$i = 0;
							while ($board_group = $db -> fetch_array()) {
								$bo_group_name[$i] = $board_group['bo_group_name'];
								$i++;
						?>
							
							<option value="<?php=$board_group['id']); ?>" <?php if ($board_group['id'] == $row['bo_group_id']){ ?>selected<?php } ?>><?php=$board_group['bo_group_name']); ?></option>
						<?php
							}
						?>

						</select>
						<input type="text" value="<?php=$board_group['bo_group_name']); ?>" id="bo_group_name" name="bo_group_name">
						<?php */ ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="skin">게시판 스킨</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="chk_skin" value="y" />
							</span>
							<select name="skin" id="skin" class="form-control">
							<?php
								for($i = 0; $i < $dircnt; $i++) {
							?>
								<option value="<?php echo($entrys['dir'][$i]); ?>" <?php if($row['skin'] == $entrys['dir'][$i]) { ?>selected=""<?php } ?>>
									<?php echo($entrys['dir'][$i]); ?>
								</option>
							<?php
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="l_level">목록보기 권한</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="chk_list" value="y" />
							</span>
							<select name="l_level" id="l_level" class="form-control">
								<?php for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?php echo($i); ?> <?php if ($row['l_level'] == $i) { ?>selected<?php } ?>><?php echo($i); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="r_level">본문보기 권한</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="chk_read" value="y" />
							</span>
							<select name="r_level" id="r_level" class="form-control">
								<?php for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?php echo($i); ?> <?php if ($row['r_level'] == $i) { ?>selected<?php } ?>><?php echo($i); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="w_level">글쓰기 권한</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="chk_write" value="y" />
							</span>
							<select name="w_level" id="w_level" class="form-control">
								<?php for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?php echo($i); ?> <?php if ($row['w_level'] == $i) { ?>selected<?php } ?>><?php echo($i); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="d_level">다운로드 권한</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="chk_down" value="y" />
							</span>
							<select name="d_level" id="d_level" class="form-control">
								<?php for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?php echo($i); ?> <?php if ($row['d_level'] == $i) { ?>selected<?php } ?>><?php echo($i); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="html_level">HTML 사용 권한</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="chk_html" value="y" />
							</span>
							<select name="html_level" id="html_level" class="form-control">
								<?php for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?php echo($i); ?> <?php if ($row['html_level'] == $i) { ?>selected<?php } ?>><?php echo($i); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="copy_move_level">게시물 복사/이동 권한</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="chk_copy_move" value="y" />
							</span>
							<select name="copy_move_level" id="copy_move_level" class="form-control">
								<?php for ($i = 1; $i < $member_max_level + 1; $i++) { ?>
								<option value=<?php echo($i); ?> <?php if ($row['copy_move_level'] == $i) { ?>selected<?php } ?>><?php echo($i); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<h4>게시판 정렬</h4>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="copy_move_level">게시판 정렬 기준</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<p class="form-control-static">
								<input type="radio" name="bo_sort" value="id" <?php if($row['sort'] == 'id') { ?>checked=""<?php } ?>> 게시물 작성순
								<input type="radio" name="bo_sort" value="reg_date" <?php if($row['sort'] == 'reg_date') { ?>checked=""<?php } ?>> 게시물 작성 날짜순
								<input type="radio" name="bo_sort" value="edit_date" <?php if($row['sort'] == 'edit_date') { ?>checked=""<?php } ?>> 게시물 수정 날짜순
								<input type="radio" name="bo_sort" value="subject" <?php if($row['sort'] == 'subject') { ?>checked=""<?php } ?>> 게시물 제목순
							</p>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="copy_move_level">게시판 정렬 순서</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<div class="input-group">
							<p class="form-control-static">
								<input type="radio" name="bo_order_by" value="ASC" <?php if($row['order_by'] == 'ASC') { ?>checked=""<?php } ?>> 순차정렬(날짜 기준일 경우 가장 최신글이 맨 뒤로 감)
								<input type="radio" name="bo_order_by" value="DESC" <?php if($row['order_by'] == 'DESC') { ?>checked=""<?php } ?>> 역순정렬(날짜 기준일 경우 가장 최신글이 맨 앞으로 옴)
							</p>
						</div>
					</div>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary edit-ok">변경하기</button>
					<button type="reset" class="btn btn-danger">다시작성</button>
					<a href="index.php" class="btn btn-info">돌아가기</a>
				</div>
			</fieldset>
		</div>
	</div>
	
	<script>
		(function($) {
			jQuery(document).on('keydown', 'input, select', function (key) {
				if (key.keyCode == 13) {
					key.preventDefault();
					jQuery('.MyForm').attr('method', 'post');
					jQuery('.MyForm').attr('action', 'adm_board_edit_ok.php');
					jQuery('.MyForm').submit();
				}
			});
			jQuery(document).on('click', '.edit-ok', function() {
				jQuery('.MyForm').attr('method', 'post');
				jQuery('.MyForm').attr('action', 'adm_board_edit_ok.php');
				jQuery('.MyForm').submit();
			});

			var category = '<div class="category">' + 
						'<div class="form-group">' + 
							'<div class="col-md-2 alert alert-success">' + 
								'<label for="cate_en">카테고리 영문</label>' + 
							'</div>' + 
							'<div class="col-md-10 alert alert-default">' + 
								'<input type="text" id="cate_en" name="cate_en" value="<?php if($row['cate']) {echo($category[0]);} ?>" class="form-control" placeholder="카테고리의 아이디를 작성해 주세요(영어로만 작성 & ,로 구분해 주세요)">' + 
							'</div>' + 
						'</div>' + 
						'<div class="form-group">' + 
							'<div class="col-md-2 alert alert-success">' + 
								'<label for="cate_ko">카테고리 한글</label>' + 
							'</div>' + 
							'<div class="col-md-10 alert alert-default">' + 
								'<input type="text" id="cate_ko" name="cate_ko" value="<?php if($row['cate']) {echo($category[1]);} ?>" class="form-control" placeholder="카테고리가 노출되는 문구를 작성해 주세요(한글/영문르로 작성 & ,로 구분해 주세요)">' + 
							'</div>' + 
						'</div>' + 
					'</div>';

			if(jQuery('input[name="cate_yn"]').is(':checked') == true) {
				jQuery('.cate').after(category);
			} else {
				jQuery('.category').remove();
			}

			jQuery(document).on('click', 'input[name="cate_yn"]', function() {
				if(jQuery(this).is(':checked') == true) {
					jQuery('.cate').after(category);
				} else {
					jQuery('.category').remove();
				}
			});
		}) (jQuery);
	</script>
			<!-- 정보 수정 폼 끝 -->
<?php include_once('footer_ui.php'); ?>