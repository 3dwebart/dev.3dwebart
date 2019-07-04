<?php
	include_once('header_ui.php');

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 접근 가능합니다.');
	}

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

	$sql = "SELECT id, bo_group_id, bo_group_name FROM bbs_group";
	$result = $db -> query($sql);
?>
	<script>
		(function($) {
			jQuery('fieldset > div').height(function() {
				jQuery(this).find('.col-md-2').height($(this).find('.col-md-10').height());
			});

			jQuery('.file').click(function() {
				jQuery(this).attr('type', 'file');
			});
			jQuery("#top_file").on("change",function(e){
				jQuery(this).next(":checkbox").prop("checked",(jQuery(this).val()!="")?true:false);
			});
			jQuery("#bottom_file").on("change",function(e){
				jQuery(this).next(":checkbox").prop("checked",(jQuery(this).val()!="")?true:false);
			});

			jQuery(document).on('keydown', 'input, select', function (key) {
				if (key.keyCode == 13) {
					key.preventDefault();
					if(jQuery('input[name="list_count"]').val() == '') {
						alert('게시판 리스트에 나올 목록 갯수를 작성해 주세요.');
					} else {
						jQuery('.MyForm').attr('method', 'post');
						jQuery('.MyForm').attr('action', 'adm_board_add_ok.php');
						jQuery('.MyForm').submit();
					}
				}
			});

			jQuery(document).on('click', '.board-add-btn', function() {
				if(jQuery('input[name="list_count"]').val() == '') {
					alert('게시판 리스트에 나올 목록 갯수를 작성해 주세요.');
				} else {
					jQuery('.MyForm').attr('method', 'post');
					jQuery('.MyForm').attr('action', 'adm_board_add_ok.php');
					jQuery('.MyForm').submit();
				}
			});

			var category = '<div class="category">' + 
						'<div class="form-group">' + 
							'<div class="col-md-2 alert alert-success">' + 
								'<label for="cate_en">카테고리 영문</label>' + 
							'</div>' + 
							'<div class="col-md-10 alert alert-default">' + 
								'<input type="text" id="cate_en" name="cate_en" class="form-control" placeholder="카테고리의 아이디를 작성해 주세요(영어로만 작성 & ,로 구분해 주세요)">' + 
							'</div>' + 
						'</div>' + 
						'<div class="form-group">' + 
							'<div class="col-md-2 alert alert-success">' + 
								'<label for="cate_ko">카테고리 한글</label>' + 
							'</div>' + 
							'<div class="col-md-10 alert alert-default">' + 
								'<input type="text" id="cate_ko" name="cate_ko" class="form-control" placeholder="카테고리가 노출되는 문구를 작성해 주세요(한글/영문르로 작성) & ,로 구분해 주세요">' + 
							'</div>' + 
						'</div>' + 
					'</div>';

			jQuery(document).on('click', 'input[name="cate_yn"]', function() {
				if(jQuery(this).is(':checked') == true) {
					jQuery('.cate').after(category);
				} else {
					jQuery('.category').remove();
				}
			});
		}) (jQuery);
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
						<div class="clearfix"></div>
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
						<div class="clearfix"></div>
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
								<input type="text" name="list_count" id="list_count" class="form-control" value="10" placeholder="게시판 목록 갯수" />
							</div>
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
					<div class="form-group cate">
						<div class="col-md-2 alert alert-success">
							<label for="cate_yn">카테고리</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<p class="form-control-static">
								<input type="checkbox" name="cate_yn" value="y"> 사용
							</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="bo_group_id">게시판 그룹</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<?php
								$tmp_array = array();
								while ($board_group = $db -> fetch_array()) {
								$tmp_array[$board_group['id']] = $board_group['bo_group_name']; 
								}
							?>
							<select name="bo_group_id" id="bo_group_id" class="form-control">
							<?php foreach ($tmp_array as $k=>$v) { ?>
								<option value="<?php echo($k); ?>"<?php if ($k == $board_group['bo_group_id']){ ?> selected<?php } ?>><?php echo($v); ?></option>
							<?php } ?>
							</select>
							<input type="hidden" value="<?php echo($board_group['bo_group_name']); ?>" id="bo_group_name" name="bo_group_name">
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
									<option value="<?php echo($entrys['dir'][$i]); ?>">
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
							<label for="l_level">리스트 보기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="chk_list" value="y" />
								</span>
								<select name="l_level" id="l_level" class="form-control">
									<?php for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
									<option value="<?php echo($i); ?>" <?php if($i == $admin_max_level) { ?>selected<?php } ?>><?php echo($i); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="r_level">본문 보기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="chk_read" value="y" />
								</span>
								<select name="r_level" id="r_level" class="form-control">
									<?php for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
									<option value="<?php echo($i); ?>" <?php if($i == $admin_max_level) { ?>selected<?php } ?>><?php echo($i); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="w_level">글쓰기 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="chk_write" value="y" />
								</span>
								<select name="w_level" id="w_level" class="form-control">
									<?php for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
									<option value="<?php echo($i); ?>" <?php if($i == $admin_max_level) { ?>selected<?php } ?>><?php echo($i); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="d_level">다운로드 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="chk_down" value="y" />
								</span>
								<select name="d_level" id="d_level" class="form-control">
									<?php for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
									<option value="<?php echo($i); ?>" <?php if($i == $admin_max_level) { ?>selected<?php } ?>><?php echo($i); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="html_level">HTML 사용 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="chk_html" value="y" />
								</span>
								<select name="html_level" id="html_level" class="form-control">
									<?php for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
									<option value="<?php echo($i); ?>" <?php if($i == 1) { ?>selected<?php } ?>><?php echo($i); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="copy_move_level">게시물 복사/이동 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" name="chk_copy_move" value="y" />
								</span>
								<select name="copy_move_level" id="copy_move_level" class="form-control">
									<?php for ($i = 1; $i < $admin_max_level + 1; $i++) { ?>
									<option value="<?php echo($i); ?>" <?php if($i == 1) { ?>selected<?php } ?>><?php echo($i); ?></option>
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
									<input type="radio" name="bo_sort" value="id" checked=""> 게시물 작성순
									<input type="radio" name="bo_sort" value="reg_date"> 게시물 작성 날짜순
									<input type="radio" name="bo_sort" value="edit_date"> 게시물 수정 날짜순
									<input type="radio" name="bo_sort" value="subject"> 게시물 제목순
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
									<input type="radio" name="bo_order_by" value="ASC"> 순차정렬(날짜 기준일 경우 가장 최신글이 맨 뒤로 감)
									<input type="radio" name="bo_order_by" value="DESC" checked=""> 역순정렬(날짜 기준일 경우 가장 최신글이 맨 앞으로 옴)
								</p>
							</div>
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