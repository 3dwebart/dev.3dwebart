<?php
	include_once('header_ui.php');

	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}
	
	$sort       = get('sort', 'bo_group_name');
	$orderby    = get('orderby', 'DESC');
	// 검색어
	$search     = get('search');
	// 검색 구분
	$separation = get('separation'); // 정렬의 기준 - 예)이름으로 검색, 닉네임으로 검색 등

	$chk_del = FALSE;
	$chk_edit = FALSE;

	// 회원 리스트 처리를 위한 SQL 템플릿
	
	$sql = "SELECT id, bo_group_id, bo_group_name FROM bbs_group ORDER BY %s %s";
	$result = $db -> query($sql, array($sort, $orderby));

	$row = $db -> fetch_array();
	
	$group_id = $row['id'];

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
		$sql = "SELECT COUNT(id) FROM bbs_group";
		$result = $db -> query($sql);

	} else {
		if ($separation == 'BoardName') {
			$sql = "SELECT COUNT(id) FROM bbs_group 
					WHERE id = %d AND bbs_group LIKE '%%%s%%'";
			$result = $db -> query($sql, array($group_id, $search));
		} else {
			$sql = "SELECT COUNT(id) FROM bbs_group 
					WHERE id = %d AND bbs_group LIKE '%%%s%%' OR type LIKE '%%%s%%'";
			$result = $db -> query($sql, array($group_id, $search, $search));
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

	/**** 데이터 조회 ****/
	$sql = "SELECT bo_group_name FROM bbs_group ORDER BY %s %s";

	$result = $db -> query($sql, array($sort, $orderby));

	$search_row = $db -> fetch_array();

	// 글 목록 조회하기
	if ($search == FALSE) {
		$sql = "SELECT id, bo_group_id, bo_group_name, reg_date, edit_date,
					unix_timestamp(reg_date) as timestamp
				FROM bbs_group
				ORDER BY %s %s
				LIMIT %d, %d";

		$result = $db -> query($sql, array($sort, $orderby, $limit_start, $list_count));
	} else {
		if ($separation == 'BoardName') {
			$sql = "SELECT id, bo_group_name, edit_date,
						unix_timestamp(reg_date) as timestamp
						
					FROM bbs_group
					WHERE title LIKE '%%%s%%'
					ORDER BY %s %s
					LIMIT %d, %d";

			$result = $db -> query($sql, array($search, $sort, $orderby, $limit_start, $list_count));
		} else {
			$sql = "SELECT id, bo_group_id, bo_group_name, edit_date,
						unix_timestamp(reg_date) as timestamp
						
					FROM bbs_group
					WHERE title LIKE '%%%s%%' OR type LIKE '%%%s%%'
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
		//}
		//}

	/*
	if ($chk_del == TRUE) {
		echo("<form method='post' action='adm_group_delete_ok'>");
			if ($count > 0) {
				$i = 0;
				while ($row = $db -> fetch_array()) {
				}
			}
		echo("</form>");
	}
	*/
?>
<script>
	$(function() {
		$('.search-form').keypress(function(event){
			if(event.which == 13){
				event.preventDefault();
				$('.MyForm').attr('action', 'adm_group_list.php');
				$('.MyForm').attr('method', 'get');
				$('.MyForm').submit();
			}
		});

		$('.search-btn').click(function(){
			$('.MyForm').attr('action', 'adm_group_list.php');
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
					$('.MyForm').attr('action', 'adm_group_chk_edit_ok.php');
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
					$('.MyForm').attr('action', 'adm_group_chk_del_ok.php');
					$('.MyForm').attr('method', 'post');
					$('.MyForm').submit();
				}
			};
		});

		$('.one_del').click(function(){
			if (confirm('정말로 삭제 하시겠습니까?')) {
				$('.MyForm').attr('action', 'adm_group_delete_ok.php');
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
	<h3 class="alert alert-success">그룹관리</h3>
</div>
<table class="group-list table table-striped table-bordered table-responsive">
	<colgroup>
		<col></col>
		<col></col>
		<col></col>
		<col></col>
		<col></col>
	</colgroup>
	<thead>
		<tr>
			<th rowspan="2" valign="middle"><input name="all_chk" type="checkbox" class="checkbox all_chk"></th>
			<th class="text-center" rowspan="2" valign="top"><a href="adm_group_list.php?sort=bo_group_id	&orderby=<?php echo($orderby); ?>">게시판 그룹 아이디</a></th>
			<th class="text-center" rowspan="2" valign="top"><a href="adm_group_list.php?sort=bo_group_name&orderby=<?php echo($orderby); ?>">게시판 그룹 이름</a></th>
			<th class="text-center" rowspan="2"><a href="adm_group_list.php?sort=reg_date&orderby=<?php echo($orderby); ?>">게시판 생성일</a></th>
			<th class="text-center" rowspan="2">
				<a href="adm_group_add.php" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i>
				</a>
			</th>
		</tr>
	</thead>
	<tbody>
<?php
	if ($count > 0) {
		$i = 0;
		while ($row = $db -> fetch_array()) {
			$i++;
			$s = $i - 1;
			$group_id = $row['id'];
			$bo_group_id = $row['bo_group_id'];
?>
			<tr>
				<td>
					<input name="check[]" type="checkbox" id="<?php echo('num_chk'.$i);?>" value="<?php echo($row['id']); ?>" class="checkbox">
					<input name="chk_cnt[]" type="hidden" value="<?php echo($row['id']); ?>">
					<!-- <?php//=$i?><?php//=$row['id']); ?> -->
				</td>
				<td>
					<input type="hidden" class="form-control" name="bo_group_id[]" <?php if ($row['bo_group_id']) {?>value="<?php echo($row['bo_group_id']); ?>"<?php } ?> />
					<?php echo($row['bo_group_id'])?>
				</td>
				<td>
					<input type="text" class="form-control" name="bo_group_name[]" <?php if ($row['bo_group_name']) {?>value="<?php echo($row['bo_group_name']); ?>"<?php } ?> />
				</td>
				<td><?php echo($row['reg_date']); ?></td>
				<td class="text-center buttons">
					<div class="form-group form-inline" role="form">
						<input type="hidden" name="id" value="<?php echo($row['id']); ?>">
						<a href="<?php echo($admin_home); ?>/adm_board_list.php?group_id=<?php echo($group_id); ?>" class="btn btn-warning">
							<i class="glyphicon glyphicon-eye-open"></i>
						</a>
						<a href="adm_group_edit.php?group_id=<?php echo($group_id); ?>" class="btn btn-success">
							<i class="glyphicon glyphicon-edit"></i>
						</a>
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
			<td colspan='5' class='text-center' style='line-height: 100px;'>조회된 회원이 없습니다.</td>
		</tr>
<?php
	}
?>
		</form>
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
		
		<!--<input type="hidden" name="group_id" value="<?php echo($group_id); ?>">-->
		<div class='input-group'>
			<ul class="list-inline">
				<li>
					<select name="separation" id="separation" class="form-control">
						<option value="BoardName" <?php if ($separation == 'UserID') {?>selected<?php } ?>>아이디</option>
						<option value="BoardType" <?php if ($separation == 'NAME') {?>selected<?php } ?>>이름</option>
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
		<li>
			<a href="adm_group_list.php?group_id=<?php echo($group_id); ?>&page=<?php echo($prev_page); ?><?php if ($separation) {?>&separation=<?php echo($separation); ?><?php } ?>&search=<?php echo($search); ?>">
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
		<li><a href="adm_group_list.php?group_id=<?php echo($group_id); ?>&page=<?php echo($i); ?><?php if ($separation) {?>&separation=<?php echo($separation); ?><?php } ?>&search=<?php echo($search); ?>"><?php echo($i); ?></a></li>
	<?php
			}
		}
	?>
		<!-- 다음 그룹 -->
	<?php if ($next_page > 0) { ?>
		<li><a href="adm_group_list.php?group_id=<?php echo($group_id); ?>&page=<?php echo($next_page); ?><?php if ($separation) {?>&separation=<?php echo($separation); ?><?php } ?>&search=<?php echo($search); ?>">&raquo;</a></li>
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