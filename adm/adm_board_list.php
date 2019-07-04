<?php
	include_once('header_ui.php');

	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	$sql = "SELECT id FROM bbs_group";
	$result = $db -> query($sql);

	if ($db -> fetch_row() < 10) {
		redirect($admin_home.'/adm_group_list.php', '게시판 그룹을 먼저 생성해 주세요.');
	}

	$group_id   = get('group_id');
	
	$sort       = get('sort', 'reg_date');
	$orderby    = get('orderby', 'DESC');
	// 검색어
	$search     = get('search');
	// 검색 구분
	$separation = get('separation'); // 정렬의 기준 - 예)이름으로 검색, 닉네임으로 검색 등

	$chk_del = FALSE;
	$chk_edit = FALSE;

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

	// 회원 리스트 처리를 위한 SQL 템플릿
	
	$sql = "SELECT id, bo_name, bo_group_id, title, skin, reg_date, edit_date FROM bbs_config ORDER BY %s %s";
	/*
	$sql = "SELECT id, bo_group_id, title, skin, reg_date, edit_date, bo_group_name
	 FROM bbs_config LEFT JOIN bbs_group ON bbs_config.bo_group_id=bbs_group.bo_group_id   ORDER BY %s %s";
	*/
	$result = $db -> query($sql, array($sort, $orderby));

	$row = $db -> fetch_array();
	
	$board_id   = $row['id'];
	$board_name = $row['bo_name'];

	// 실행결과 점검하기
	if (!$result) {
		redirect(FALSE, '로그인에 실패 했습니다. 관리자에게 문의 바랍니다.');
	}

	// 정렬 현재 정렬이 DESC 이면 버튼 클릭시 ASC, ASC이면 DESC로 토글
	if ($orderby == 'DESC') {
		$orderby = 'ASC';
	} else {
		$orderby = 'DESC';
	}

	/**** 페이지 구현을 위한 번수 ****/
	$list_count = 10; // 현 페이지에 보여질 글의 목록 수
	$group_count = 5; // 한 그룹에 표시할 페이지 수
	$page = get('page', 1); // 현재 페이지 번호
	$total_count = 0; // 전체 글 개수 조회

	// 검색 조건에 따른 전체 글 수 조회
	if ($search == FALSE) {
		$sql = "SELECT COUNT(id) FROM bbs_config";
		$result = $db -> query($sql);

	} else {
		if ($separation == 'BoardName') {
			$sql = "SELECT COUNT(id) FROM bbs_config 
					WHERE (id = %d OR bo_name = '%s') AND title LIKE '%%%s%%'";
			$result = $db -> query($sql, array($board_id, $board_name, $search));
		} else if ($separation == 'Boardskin') {
			$sql = "SELECT COUNT(id) FROM bbs_config 
					WHERE (id = %d OR bo_name = '%s') AND skin LIKE '%%%s%%'";
			$result = $db -> query($sql, array($board_id, $board_name, $search));
		} else if ($separation == 'ALL') {
			$sql = "SELECT COUNT(id) FROM bbs_config 
					WHERE (id = %d OR bo_name = '%s') AND title LIKE '%%%s%%' OR skin LIKE '%%%s%%'";
			$result = $db -> query($sql, array($board_id, $board_name, $search, $search));
		}
	}

	if ($result != FALSE) {
		$data = $db -> fetch_row();
		$total_count = $data[0];
	}

	/**** 페이지 구현을 위한 계산 ****/
	// 전체 페이지 수
	$total_page = intval(($total_count - 1) / $list_count) + 1;

	// 현재 페이지에 대한 오차 조절
	if ($page <= 0)          $page = 1;
	if ($page > $total_page) $page = $total_page;

	// 현재 페이징 그룹의 시작 페이지 번호
	$start_page = intval(($page - 1) / $group_count) * $group_count + 1;

	// 현재 페이징 그룹의 끝 페이지 번호
	$end_page = intval((($start_page - 1) + $group_count) / $group_count) * $group_count;

	// 끝 페이지 번호가 전체 페이지수를 초과하면 오차범위 조절
	if ($end_page > $total_page)  $end_page = $total_page;

	// 검색범의의 시작 위치
	$limit_start = ($page - 1) * $list_count;

	// 이전 그룹의 마지막 페이지
	$prev_page = 0;

	// 다음 그룹의 시작 위치
	$next_page = 0;

	if ($start_page > $group_count) {
		$prev_page = $start_page - 1;
	}

	if ($end_page < $total_page) {
		$next_page = $end_page + 1;
	}
?>
<script>
	$(function() {
		$('.search-form').keypress(function(event){
			if(event.which == 13){
				event.preventDefault();
				$('.MyForm').attr('action', 'adm_board_list.php');
				$('.MyForm').attr('method', 'get');
				$('.MyForm').submit();
			}
		});

		$('.search-btn').click(function(){
			$('.MyForm').attr('action', 'adm_board_list.php');
			$('.MyForm').attr('method', 'get');
			$('.MyForm').submit();
		});

		$('.all_chk').change(function() {
			var is_chk = $(this).is(':checked');
			$('.checkbox').prop('checked', is_chk);
		});

		$('.chk_edit').click(function(){
			if (!$('.checkbox').is(':checked')) {
				alert('선태된 값이 없습니다.');
				return;
			} else {
				if (confirm('선택한 항목을 수정 하시겠습니까?')) {
					$('.MyForm').attr('action', 'adm_board_chk_edit_ok.php');
					$('.MyForm').attr('method', 'post');
					$('.MyForm').submit();
				}
			};
			
		});

		$('.chk_del').click(function(){
			if (!$('.checkbox').is(':checked')) {
				alert('선태된 값이 없습니다.');
				return;
			} else {
				if (confirm('선택한 항목을 삭제 하시겠습니까?')) {
					$('.MyForm').attr('action', 'adm_board_chk_del_ok.php');
					$('.MyForm').attr('method', 'post');
					$('.MyForm').submit();
				}
			};
		});

		$('.one_del').click(function(){
			if (confirm('정말로 삭제 하시겠습니까?')) {
				$('.MyForm').attr('action', 'adm_board_delete_ok.php');
				$('.MyForm').attr('method', 'post');
				$('.MyForm').submit();
			}
		});

		var helperWidth = $('.buttons').width();
		$('.question1').hover(function() {
			$(this).parent().parent().css('position', 'relative');
			$('.a1').css('position', 'absolute');
			$('.a1').css('right', helperWidth + 'px');
			$('.a1').css('display', 'inline-block');
			$('.a1').css('visibility', 'visible');
			/*
			$('.a1').css('width', '200px');
			*/
		}, function() {
			$('.a1').css('visibility', 'hidden');
			
		});

		$('.question2').hover(function() {
			$(this).parent().parent().css('position', 'relative');
			$('.a2').css('position', 'absolute');
			$('.a2').css('right', helperWidth + 'px');
			$('.a2').css('display', 'inline-block');
			/*
			$('.a2').css('width', '200px');
			*/
			$('.a2').show();
		}, function() {
			$('.a2').css('display', 'none');
			$('.a2').hide();
		});

		$('.question3').hover(function() {
			$(this).parent().parent().css('position', 'relative');
			$('.a3').css('position', 'absolute');
			$('.a3').css('right', helperWidth + 'px');
			$('.a3').css('display', 'inline-block');
			/*
			$('.a3').css('width', '200px');
			*/
			$('.a3').show();
		}, function() {
			$('.a3').css('display', 'none');
			$('.a3').hide();
		});
	});
</script>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-header">
				<h3 class="alert alert-success">게시판 관리</h3>
			</div>
			<table class="board-list table table-striped table-bordered">
				<colgroup>
					<col></col>
					<col></col>
					<col></col>
					<col></col>
					<col></col>
					<col></col>
					<col></col>
					<col></col>
				</colgroup>
				<thead>
					<tr>
						<th rowspan="2" valign="middle"><input name="all_chk" type="checkbox" class="checkbox all_chk"></th>
					<?php if ($group_id) { ?>
						<th class="text-center" rowspan="2" valign="top"><a href="adm_board_list.php?group_id=<?php echo($group_id); ?>&sort=bo_name&orderby=<?php echo($orderby); ?>">게시판 이름</a></th>
						
						<th class="text-center" rowspan="2" valign="top"><a href="adm_board_list.php?group_id=<?php echo($group_id); ?>&sort=bo_group_name&orderby=<?php echo($orderby); ?>">게시판 그룹</a></th>
						
						<th class="text-center" rowspan="2" valign="top"><a href="adm_board_list.php?group_id=<?php echo($group_id); ?>&sort=title&orderby=<?php echo($orderby); ?>">게시판 제목</a></th>
						<th class="text-center" rowspan="2"><a href="adm_board_list.php?group_id=<?php echo($group_id); ?>&sort=skin&orderby=<?php echo($orderby); ?>">게시판 스킨</a></th>
						<th class="text-center" rowspan="2"><a href="adm_board_list.php?group_id=<?php echo($group_id); ?>&sort=reg_date&orderby=<?php echo($orderby); ?>">게시판 생성일</a></th>
					<?php } else { ?>
						<th class="text-center" rowspan="2" valign="top"><a href="adm_board_list.php?sort=bo_name&orderby=<?php echo($orderby); ?>">게시판 이름</a></th>
						
						<th class="text-center" rowspan="2" valign="top"><a href="adm_board_list.php?sort=bo_group_name&orderby=<?php echo($orderby); ?>">게시판 그룹</a></th>
						
						<th class="text-center" rowspan="2" valign="top"><a href="adm_board_list.php?sort=title&orderby=<?php echo($orderby); ?>">게시판 제목</a></th>
						<th class="text-center" rowspan="2"><a href="adm_board_list.php?sort=skin&orderby=<?php echo($orderby); ?>">게시판 스킨</a></th>
						<th class="text-center" rowspan="2"><a href="adm_board_list.php?sort=reg_date&orderby=<?php echo($orderby); ?>">게시판 생성일</a></th>
					<?php } ?>
						<th class="text-center" colspan="3">권한</th>
						<th class="text-center" rowspan="2">
							<a href="adm_board_add.php" class="btn btn-primary">
								<i class="glyphicon glyphicon-plus"></i>
							</a><br /><br />
						</th>
					</tr>
					<tr>
						<td class="text-center">
							L
							<a href="#" class="question1" onclick="return false">
								<i class="fa fa-question-circle"></i>
								<span class="a1">게시판 리스트 보기 권한 입니다.</span>
							</a>
						</td>
						<td class="text-center">
							V
							<a href="#" class="question2" onclick="return false">
								<i class="fa fa-question-circle"></i>
								<span class="a2">게시판 본문 보기 권한 입니다.</span>
							</a>
						</td>
						<td class="text-center">
							W
							<a href="#" class="question3" onclick="return false">
								<i class="fa fa-question-circle"></i>
								<span class="a3">게시판 글쓰기 권한 입니다.</span>
							</a>
						</td>
					</tr>
				</thead>
				<tbody>
			<?php
				if ($group_id) {
					/**** 데이터 조회 ****/
					$sql = "SELECT bo_group_id, bo_group_name, title, skin FROM bbs_config WHERE bo_group_id = %d ORDER BY %s %s";

					$result = $db -> query($sql, array($group_id, $sort, $orderby));

					$search_row = $db -> fetch_array();

					// 글 목록 조회하기
					if ($search == FALSE) {
						$sql = "SELECT id, bo_name, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, reg_date, edit_date,
									unix_timestamp(reg_date) as timestamp
								FROM bbs_config
								WHERE bo_group_id = %d
								ORDER BY %s %s
								LIMIT %d, %d";

						$result = $db -> query($sql, array($group_id, $sort, $orderby, $limit_start, $list_count));
					} else {
						if ($separation == 'BoardName') {
							$sql = "SELECT id, bo_name, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, reg_date, edit_date,
										unix_timestamp(reg_date) as timestamp
										
									FROM bbs_config
									WHERE bo_group_id = %d AND title LIKE '%%%s%%'
									ORDER BY %s %s
									LIMIT %d, %d";

							$result = $db -> query($sql, array($group_id, $search, $sort, $orderby, $limit_start, $list_count));
						} else if ($separation == 'BoardSkin') {
							$sql = "SELECT id, bo_name, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, reg_date, edit_date,
										unix_timestamp(reg_date) as timestamp
										
									FROM bbs_config
									WHERE bo_group_id = %d AND skin LIKE '%%%s%%'
									ORDER BY %s %s
									LIMIT %d, %d";

							$result = $db -> query($sql, array($group_id, $search, $sort, $orderby, $limit_start, $list_count));
						} else if ($separation == 'ALL') {
							$sql = "SELECT id, bo_name, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, reg_date, edit_date,
										unix_timestamp(reg_date) as timestamp
										
									FROM bbs_config
									WHERE bo_group_id = %d AND title LIKE '%%%s%%' OR skin LIKE '%%%s%%'
									ORDER BY %s %s
									LIMIT %d, %d";

							$result = $db -> query($sql, array($group_id, $search, $search, $sort, $orderby, $limit_start, $list_count));
						}
							
					}

					if (!$result) {
						redirect(FALSE, '글 목록을 읽는데 실패했습니다. 관리자에게 문의해 주세요.');
					}

					// 전체 글 목록 수
					$count = $db -> num_rows();

					
					if ($count > 0) {
						$rows = array();
						$list_cnt = 0;
						while ($row = $db -> fetch_array())
							$rows[] = $row;
						foreach($rows as $row){
							$list_cnt++;
							$board_id = $row['id'];
							$board_name = $row['bo_name'];
			?>
						<tr>
							<td>
								<input name="check[]" type="checkbox" id="<?php echo('num_chk'.$i);?>" value="<?php echo($row['id']); ?>" class="checkbox">
								<input name="chk_cnt[]" type="hidden" value="<?php echo($row['id']); ?>">
								<?php//=$i?><?php//=$row['id']); ?>
							</td>
							<td>
								<input type="hidden" class="form-control" name="bo_name[]" <?php if ($row['bo_name']) {?>value="<?php echo($row['bo_name']); ?>"<?php } ?> />
								<?php echo($row['bo_name']); ?>
							</td>
							<td>
								<select name="bo_group_id[]" id="<?php echo('bo_group_id'.$list_cnt);?>" class="form-control">
									<?php
										$sql = "SELECT id, bo_group_name FROM bbs_group";
										$result = $db -> query($sql);

										$tmp_array = array();
										while ($board_group = $db -> fetch_array())
											$tmp_array[$board_group['id']] = $board_group['bo_group_name'];
										foreach ($tmp_array as $k=>$v) {
									?>
									<option value="<?php echo($k); ?>"<?php if ($k == $row['bo_group_id']){ ?> selected<?php } ?>><?php echo($v); ?></option>
									<?php
										}
									?>
								</select>
								<input type="hidden" value="<?php echo($row['bo_group_name']); ?>" id="bo_group_name" name="bo_group_name">
							</td>
							<td>
								<input type="text" class="form-control" name="title[]" <?php if ($row['title']) {?>value="<?php echo($row['title']); ?>"<?php } ?> />
							</td>
							<td class="text-center">
								<select name="skin[]" id="skin" class="form-control">
								<?php
									for($i = 0; $i < $dircnt; $i++) {
								?>
									<option value="<?php echo($entrys['dir'][$i]); ?>" <?php if ($row['skin'] == $entrys['dir'][$i]) { ?>selected<?php } ?>>
										<?php echo($entrys['dir'][$i]); ?>
									</option>
								<?php
									}
								?>
								</select>
							</td>
							<td><?php echo($row['reg_date']); ?></td>
							<td>
								<select name="l_level[]" id="l_level" class="form-control">
								<?php for ($x = 1; $x < 6; $x++) { ?>
									<option value=<?php echo($x); ?> <?php if ($row['l_level'] == $x) { ?>selected<?php } ?>><?php echo($x); ?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								<select name="r_level[]" id="r_level" class="form-control">
								<?php for ($x = 1; $x < 6; $x++) { ?>
									<option value=<?php echo($x); ?> <?php if ($row['r_level'] == $x) { ?>selected<?php } ?>><?php echo($x); ?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								<select name="w_level[]" id="w_level" class="form-control">
								<?php for ($x = 1; $x < 6; $x++) { ?>
									<option value=<?php echo($x); ?> <?php if ($row['w_level'] == $x) { ?>selected<?php } ?>><?php echo($x); ?></option>
								<?php } ?>
								</select>
							</td>
							<td class="text-center buttons">
								<div class="form-group form-inline" role="form">
									<a href="<?php echo($bbs_home); ?>/index.php?bo_name=<?php echo($board_name); ?>" target='_blank' class="btn btn-warning">
										<i class="glyphicon glyphicon-eye-open"></i>
									</a>
									<a href="adm_board_edit.php?board_id=<?php echo($board_id); ?>" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<input type="hidden" name="id" value="<?php echo($row['id']); ?>">
									<button type="submit" class="btn btn-danger one_del">
										<i class="glyphicon glyphicon-remove"></i>
									</button>
								</div>
							</td>
						</tr>
			<?php
						$list_cnt++;
						}
					} else {
			?>
					<tr>
						<td colspan='9' class='text-center' style='line-height: 100px;'>조회된 회원이 없습니다.</td>
					</tr>
			<?php
					}
			?>
			<?php
				} else {
					/**** 데이터 조회 ****/
					$sql = "SELECT bo_group_id, title, skin FROM bbs_config ORDER BY %s %s";

					$result = $db -> query($sql, array($sort, $orderby));

					$search_row = $db -> fetch_array();

					// 글 목록 조회하기
					if ($search == FALSE) {
						$sql = "SELECT id, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, reg_date, edit_date,
									unix_timestamp(reg_date) as timestamp
								FROM bbs_config
								ORDER BY %s %s
								LIMIT %d, %d";

						$result = $db -> query($sql, array($sort, $orderby, $limit_start, $list_count));
					} else {
						if ($separation == 'BoardName') {
							$sql = "SELECT id, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, reg_date, edit_date,
										unix_timestamp(reg_date) as timestamp
										
									FROM bbs_config
									WHERE title LIKE '%%%s%%'
									ORDER BY %s %s
									LIMIT %d, %d";

							$result = $db -> query($sql, array($search, $sort, $orderby, $limit_start, $list_count));
						} else if ($separation == 'BoardSkin') {
							$sql = "SELECT id, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, reg_date, edit_date,
										unix_timestamp(reg_date) as timestamp
										
									FROM bbs_config
									WHERE skin LIKE '%%%s%%'
									ORDER BY %s %s
									LIMIT %d, %d";

							$result = $db -> query($sql, array($search, $sort, $orderby, $limit_start, $list_count));
						} else if ($separation == 'ALL') {
							$sql = "SELECT id, bo_group_id, bo_group_name, bo_name, title, skin, l_level, r_level, w_level, reg_date, edit_date,
										unix_timestamp(reg_date) as timestamp
										
									FROM bbs_config
									WHERE title LIKE '%%%s%%' OR skin LIKE '%%%s%%'
									ORDER BY %s %s
									LIMIT %d, %d";

							$result = $db -> query($sql, array($search, $search, $sort, $orderby, $limit_start, $list_count));
						}
							
					}

					if (!$result) {
						redirect(FALSE, '글 목록을 읽는데 실패했습니다. 관리자에게 문의해 주세요.');
					}

					// 전체 글 목록 수
					$count = $db -> num_rows();


					if ($count > 0) {
						$rows = array();
						$list_cnt = 0;
						while ($row = $db -> fetch_array())
							$rows[] = $row;
						foreach($rows as $row){
								$list_cnt++;
								$board_id = $row['id'];
								$board_name = $row['bo_name'];
			?>
						<tr>
							<td>
								<input name="check[]" type="checkbox" id="<?php echo('num_chk'.$i);?>" value="<?php echo($row['id']); ?>" class="checkbox">
								<input name="chk_cnt[]" type="hidden" value="<?php echo($row['id']); ?>">
								<!-- <?php//=$i?><?php//=$row['id']); ?> -->
							</td>
							<td>
								<input type="hidden" class="form-control" name="bo_name[]" <?php if ($row['bo_name']) {?>value="<?php echo($row['bo_name']); ?>"<?php } ?> />
								<?php echo($row['bo_name']); ?>
							</td>
							
							<td>
								<?php
									$sql = "SELECT id, bo_group_id, bo_group_name FROM bbs_group";
									$result = $db -> query($sql);

									$tmp_array = array();
									while ($board_group = $db -> fetch_array()) {
										$tmp_array[$board_group['id']] = $board_group['bo_group_name']; 
									}
								?>
								<select name="bo_group_id[]" id="bo_group_id" class="form-control bo_group_id<?php echo($list_cnt); ?>">
									<?php foreach ($tmp_array as $k=>$v) { ?>
									<option value="<?php echo($k); ?>"<?php if ($k == $row['bo_group_id']){ ?> selected<?php } ?>><?php echo($v); ?></option>
									<?php
										}
									?>
								</select>
								<input type="hidden" name="bo_group_name[]" value="<?php echo($row['bo_group_name']); ?>" id="bo_group_name<?php echo($list_cnt); ?>" name="bo_group_name">
								<script>
									$(".bo_group_id<?php echo($list_cnt); ?>").change(function() {
										var base_select = $('.bo_group_id<?php echo($list_cnt); ?> option').index(function() {
											if ($(this).is(':selected')) {
												$('#bo_group_name').val($('.bo_group_id<?php echo($list_cnt); ?> option').index($('.bo_group_id<?php echo($list_cnt); ?> option:selected').text()));
											};
										});

										var str = "";

										$('.bo_group_id<?php echo($list_cnt); ?> > option:selected').each(function(){
											str += $(this).text();
										});

										$('#bo_group_name<?php echo($list_cnt); ?>').val(str);
									});

									$(".bo_group_id<?php echo($list_cnt); ?>").trigger("change");
								</script>
							</td>
							
							<td>
								<input type="text" class="form-control" name="title[]" <?php if ($row['title']) {?>value="<?php echo($row['title']); ?>"<?php } ?> />
							</td>
							<td class="text-center">
								<select name="skin[]" id="skin" class="form-control">
								<?php
									for($i = 0; $i < $dircnt; $i++) {
								?>
									<option value="<?php echo($entrys['dir'][$i]); ?>" <?php if ($row['skin'] == $entrys['dir'][$i]) { ?>selected<?php } ?>>
										<?php echo($entrys['dir'][$i]); ?>
									</option>
								<?php
									}
								?>
								</select>
							</td>
							<td><?php echo($row['reg_date']); ?></td>
							<td>
								<select name="l_level[]" id="l_level" class="form-control">
								<?php for ($x = 1; $x < 6; $x++) { ?>
									<option value=<?php echo($x); ?> <?php if ($row['l_level'] == $x) { ?>selected<?php } ?>><?php echo($x); ?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								<select name="r_level[]" id="r_level" class="form-control">
								<?php for ($x = 1; $x < 6; $x++) { ?>
									<option value=<?php echo($x); ?> <?php if ($row['r_level'] == $x) { ?>selected<?php } ?>><?php echo($x); ?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								<select name="w_level[]" id="w_level" class="form-control">
								<?php for ($x = 1; $x < 6; $x++) { ?>
									<option value=<?php echo($x); ?> <?php if ($row['w_level'] == $x) { ?>selected<?php } ?>><?php echo($x); ?></option>
								<?php } ?>
								</select>
							</td>
							<td class="text-center buttons">
								<div class="form-group form-inline" role="form">
									<a href="<?php echo($bbs_home); ?>/index.php?bo_name=<?php echo($board_name); ?>" target='_blank' class="btn btn-warning">
										<i class="glyphicon glyphicon-eye-open"></i>
									</a>
									<a href="adm_board_edit.php?board_id=<?php echo($board_id); ?>" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<input type="hidden" name="id" value="<?php echo($row['id']); ?>">
									<button type="submit" class="btn btn-danger one_del">
										<i class="glyphicon glyphicon-remove"></i>
									</button>
								</div>
							</td>
						</tr>
			<?php
						}
					} else {
			?>
					<tr>
						<td colspan='10' class='text-center' style='line-height: 100px;'>조회된 회원이 없습니다.</td>
					</tr>
			<?php
					}
				}
			?>
					</tbody>
				</thead>
			</table>
			<div class="form-group text-center">
				<input type="button" class="btn btn-warning chk_edit" value="선택 수정" />
				<input type="button" class="btn btn-danger chk_del" value="선택 삭제" />
			</div>

			<!-- 검색폼 + 글 쓰기 버튼 -->
			<div class='clearfix'>
				<div class='pull-left'>
					
						<!--<input type="hidden" name="board_id" value="<?php echo($board_id); ?>">-->
						<div class='input-group'>
							<ul class="list-inline">
								<li>
									<select name="separation" id="separation" class="form-control">
										<option value="BoardName" <?php if ($separation == 'UserID') {?>selected<?php } ?>>아이디</option>
										<option value="BoardSkin" <?php if ($separation == 'NAME') {?>selected<?php } ?>>이름</option>
										<option value="ALL" <?php if ($separation == 'ALL') {?>selected<?php } ?>>전체</option>
									</select>
								</li>
								<li>
									<input type='text' name='search' class='form-control search-form' value='<?php echo($search); ?>' />
								</li>
								<li>
									<span class='input-group-btn'>
										<button class="btn btn-success search-btn" type='submit'>
											<i class='glyphicon glyphicon-search'></i>
										</button>
									</span>
								</li>
							</ul>
						</div>
					
				</div>
			</div>
			<!-- 페이지 번호 -->
			<nav class='text-center'>
				<ul class="pagination">
					<!-- 이전 그룹 -->
				<?php if ($prev_page > 0) { ?>
					<0li>
						<a href="adm_board_list.php?board_id=<?php echo($board_id); ?>&page=<?php echo($prev_page); ?><?php if ($separation) {?>&separation=<?php echo($separation); ?><?php } ?>&search=<?php echo($search); ?>">
							<span area-hidden="true">&laquo;</span>
						</a>
					</li>
				<?php } else {?>
					<li class='disabled'>
						<a href="#" onclick="return false">
							<span area-hidden="true">&laquo;</span>
						</a>
					</li>
				<?php } ?>
					<!-- 페이지 번호 -->
				<?php
					for ($i = $start_page; $i <= $end_page; $i++) { 
						if ($i == $page) {
				?>
					<li class='active'><a href="#" onclick="return false"><?php echo($i); ?></a></li>
				<?php
						} else {
				?>
					<li><a href="adm_board_list.php?board_id=<?php echo($board_id); ?>&page=<?php echo($i); ?><?php if ($separation) {?>&separation=<?php echo($separation); ?><?php } ?>&search=<?php echo($search); ?>"><?php echo($i); ?></a></li>
				<?php
						}
					}
				?>
					<!-- 다음 그룹 -->
				<?php if ($next_page > 0) { ?>
					<li><a href="adm_board_list.php?board_id=<?php echo($board_id); ?>&page=<?php echo($next_page); ?><?php if ($separation) {?>&separation=<?php echo($separation); ?><?php } ?>&search=<?php echo($search); ?>">&raquo;</a></li>
				<?php } else { ?>
					<li class='disabled'>
						<a href="#" onclick="return false">
							<span area-hidden="true">&raquo;</span>
						</a>
					</li>
				<?php } ?>
				</ul>
			</nav>
		</div>
	</div>
<?php
	include_once('footer_ui.php');
?>