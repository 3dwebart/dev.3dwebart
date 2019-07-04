<?php
	include_once('header_ui.php');

	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자 로그인 후에 이용 가능합니다.');
	}
	
	$sort       = get('sort', 'reg_date');
	$orderby    = get('orderby', 'DESC');
	// 검색어
	$search     = get('search');
	// 검색 구분
	$separation = get('separation'); // 정렬의 기준 - 예)이름으로 검색, 닉네임으로 검색 등

	$chk_del = FALSE;
	$chk_edit = FALSE;
?>
<?php
	// 회원 리스트 처리를 위한 SQL 템플릿
	
	$sql = "SELECT id, user_level, user_id, user_name, user_nic, email, tel, reg_date, edit_date FROM members ORDER BY %s %s";
	$result = $db -> query($sql, array($sort, $orderby));

	$row = $db -> fetch_array();
	
	$member_id = $row['id'];

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
		$sql = "SELECT COUNT(id) FROM members";
		$result = $db -> query($sql);

	} else {
		if ($separation == 'UserID') {
			$sql = "SELECT COUNT(id) FROM members 
					WHERE id = %d AND user_id LIKE '%%%s%%'";
			$result = $db -> query($sql, array($member_id, $search));
		} else if ($separation == 'NAME') {
			$sql = "SELECT COUNT(id) FROM members 
					WHERE id = %d AND user_name LIKE '%%%s%%'";
			$result = $db -> query($sql, array($member_id, $search));
		} else if ($separation == 'NIC') {
			$sql = "SELECT COUNT(id) FROM members 
					WHERE id = %d AND user_nic LIKE '%%%s%%'";
			$result = $db -> query($sql, array($member_id, $search));
		} else if ($separation == 'POWER') {
			$sql = "SELECT COUNT(id) FROM members 
					WHERE id = %d AND user_level LIKE '%%%s%%'";
			$result = $db -> query($sql, array($member_id, $search));
		} else if ($separation == 'ALL') {
			$sql = "SELECT COUNT(id) FROM members 
					WHERE id = %d AND user_id LIKE '%%%s%%' OR user_name LIKE '%%%s%%' OR user_nic LIKE '%%%s%%' OR user_level LIKE '%%%s%%'";
			$result = $db -> query($sql, array($member_id, $search, $search, $search, $search));
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
	$sql = "SELECT user_id, user_name, user_nic FROM members ORDER BY %s %s";

	$result = $db -> query($sql, array($sort, $orderby));

	$search_row = $db -> fetch_array();

	// 글 목록 조회하기
	if ($search == FALSE) {
		$sql = "SELECT id, user_level, user_id, user_name, user_nic, email, tel, reg_date, edit_date,
					unix_timestamp(reg_date) as timestamp
				FROM members
				ORDER BY %s %s
				LIMIT %d, %d";

		$result = $db -> query($sql, array($sort, $orderby, $limit_start, $list_count));
	} else {
		if ($separation == 'UserID') {
			$sql = "SELECT id, user_level, user_id, user_name, user_nic, email, tel, reg_date,
						unix_timestamp(reg_date) as timestamp
						
					FROM members
					WHERE user_id LIKE '%%%s%%'
					ORDER BY %s %s
					LIMIT %d, %d";

			$result = $db -> query($sql, array($search, $sort, $orderby, $limit_start, $list_count));
		} else if ($separation == 'NAME') {
			$sql = "SELECT id, user_level, user_id, user_name, user_nic, email, tel, reg_date,
						unix_timestamp(reg_date) as timestamp
						
					FROM members
					WHERE user_name LIKE '%%%s%%'
					ORDER BY %s %s
					LIMIT %d, %d";

			$result = $db -> query($sql, array($search, $sort, $orderby, $limit_start, $list_count));
		} else if ($separation == 'NIC') {
			$sql = "SELECT id, user_level, user_id, user_name, user_nic, email, tel, reg_date,
						unix_timestamp(reg_date) as timestamp
						
					FROM members
					WHERE user_nic LIKE '%%%s%%'
					ORDER BY %s %s
					LIMIT %d, %d";

			$result = $db -> query($sql, array($search, $sort, $orderby, $limit_start, $list_count));
		} else if ($separation == 'POWER') {
			$sql = "SELECT id, user_level, user_id, user_name, user_nic, email, tel, reg_date,
						unix_timestamp(reg_date) as timestamp
						
					FROM members
					WHERE user_level LIKE '%%%s%%'
					ORDER BY %s %s
					LIMIT %d, %d";

			$result = $db -> query($sql, array($search, $sort, $orderby, $limit_start, $list_count));
		} else if ($separation == 'ALL') {
			$sql = "SELECT id, user_level, user_id, user_name, user_nic, email, tel, reg_date,
						unix_timestamp(reg_date) as timestamp
						
					FROM members
					WHERE user_id LIKE '%%%s%%' OR user_name LIKE '%%%s%%' OR user_nic LIKE '%%%s%%' OR user_level LIKE '%%%s%%'
					ORDER BY %s %s
					LIMIT %d, %d";

			$result = $db -> query($sql, array($search, $search, $search, $search, $sort, $orderby, $limit_start, $list_count));
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
		echo("<form method='post' action='adm_member_delete_ok'>");
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
				$('.MyForm').attr('action', 'adm_member_list.php');
				$('.MyForm').attr('method', 'get');
				$('.MyForm').submit();
			}
		});

		$('.search-btn').click(function(){
			$('.MyForm').attr('action', 'adm_member_list.php');
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
					$('.MyForm').attr('action', 'adm_member_chk_edit_ok.php');
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
					$('.MyForm').attr('action', 'adm_member_chk_del_ok.php');
					$('.MyForm').attr('method', 'post');
					$('.MyForm').submit();
				}
			};
		});

		$('.one_del').click(function(){
			if (confirm('정말로 삭제 하시겠습니까?')) {
				$('.MyForm').attr('action', 'adm_member_delete_ok.php');
				$('.MyForm').attr('method', 'post');
				$('.MyForm').submit();
			}
		});
	});
</script>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-header">
				<h3 class="alert alert-success">회원관리</h3>
			</div>
			<table class="member-list table table-striped table-bordered">
				<thead>
					<tr>
						<th><input name="all_chk" type="checkbox" class="checkbox all_chk"></th>
						<th class="text-center"><a href="adm_member_list.php?sort=user_level&orderby=<?=$orderby?>">권한</a></th>
						<th class="text-center"><a href="adm_member_list.php?sort=user_id&orderby=<?=$orderby?>">아이디</a></th>
						<th class="text-center"><a href="adm_member_list.php?sort=user_name&orderby=<?=$orderby?>">이름</a></th>
						<th class="text-center"><a href="adm_member_list.php?sort=user_nic&orderby=<?=$orderby?>">닉네임</a></th>
						<th class="text-center"><a href="adm_member_list.php?sort=email&orderby=<?=$orderby?>">이메일</a></th>
						<th class="text-center"><a href="adm_member_list.php?sort=tel&orderby=<?=$orderby?>">전화번호</a></th>
						<th class="text-center"><a href="adm_member_list.php?sort=reg_date&orderby=<?=$orderby?>">가입일</a></th>
						<th class="text-center">
							<a href="adm_member_add.php" class="btn btn-primary">
								<i class="glyphicon glyphicon-plus"></i>
							</a>
						</th>
					</tr>
					<tbody>
					
			<?
				if ($count > 0) {
					$i = 0;
					while ($row = $db -> fetch_array()) {
						$i++;
						$s = $i - 1;
						$member_id = $row['id'];
			?>
						<tr>
							<td>
								<input name="check[]" type="checkbox" id="<? echo('num_chk'.$i);?>" value="<?=$row['id']?>" class="checkbox">
								<input name="chk_cnt[]" type="hidden" value="<?=$row['id']?>">
								<?//=$i?><?//=$row['id']?>
							</td>
							<td class="text-center">
								<select name="user_level[]" id="user_level" class="form-control">
									<option value=1 <? if ($row['user_level'] == 1) { ?>selected<?}?>>1</option>
									<option value=2 <? if ($row['user_level'] == 2) { ?>selected<?}?>>2</option>
									<option value=3 <? if ($row['user_level'] == 3) { ?>selected<?}?>>3</option>
									<option value=4 <? if ($row['user_level'] == 4) { ?>selected<?}?>>4</option>
									<option value=5 <? if ($row['user_level'] == 5) { ?>selected<?}?>>5</option>
								</select>
							</td>
							<td><?=$row['user_id']?></td>
							<td>
								<input type="text" class="form-control" name="user_name[]" <? if ($row['user_name']) {?>value="<?=$row['user_name']?>"<?}?> />
							</td>
							<td>
								<input type="text" class="form-control" name="user_nic[]" <? if ($row['user_nic']) {?>value="<?=$row['user_nic']?>"<?}?> />
							</td>
							<td>
								<input type="text" class="form-control" name="email[]" <? if ($row['email']) {?>value="<?=$row['email']?>"<?}?> />
							</td>
							<td>
								<input type="text" class="form-control" name="tel[]" <? if ($row['tel']) {?>value="<?=$row['tel']?>"<?}?> />
							</td>
							<td><?=$row['reg_date']?></td>
							<td class="text-center">
								<div class="form-group form-inline" role="form">
									<a href="adm_member_edit.php?member_id=<?=$member_id?>" class="btn btn-success">
										<i class="glyphicon glyphicon-ok"></i>
									</a>
									<input type="hidden" name="id" value="<?=$row['id']?>">
									<button type="submit" class="btn btn-danger one_del"><i class="glyphicon glyphicon-remove"></i></button>
								</div>
							</td>
						</tr>
			<?
					}
				} else {
			?>
					<tr>
						<td colspan='9' class='text-center' style='line-height: 100px;'>조회된 회원이 없습니다.</td>
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
					
						<!--<input type="hidden" name="member_id" value="<?=$member_id?>">-->
						<div class='input-group'>
							<ul class="list-inline">
								<li>
									<select name="separation" id="separation" class="form-control">
										<option value="UserID" <? if ($separation == 'UserID') {?>selected<?}?>>아이디</option>
										<option value="NAME" <? if ($separation == 'NAME') {?>selected<?}?>>이름</option>
										<option value="NIC" <? if ($separation == 'NIC') {?>selected<?}?>>닉네임</option>
										<option value="POWER" <? if ($separation == 'POWER') {?>selected<?}?>>권한</option>
										<option value="ALL" <? if ($separation == 'ALL') {?>selected<?}?>>전체</option>
									</select>
								</li>
								<li>
									<input type='text' name='search' class='form-control search-form' value='<?=$search?>' />
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
						<a href="adm_member_list.php?member_id=<?=$member_id?>&page=<?=$prev_page?><?if ($separation) {?>&separation=<?=$separation?><?}?>&search=<?=$search?>">
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
					<li class='active'><a href="#" onclick="return false"><?=$i?></a></li>
				<?php
						} else {
				?>
					<li><a href="adm_member_list.php?member_id=<?=$member_id?>&page=<?=$i?><?if ($separation) {?>&separation=<?=$separation?><?}?>&search=<?=$search?>"><?=$i?></a></li>
				<?php
						}
					}
				?>
					<!-- 다음 그룹 -->
				<?php if ($next_page > 0) { ?>
					<li><a href="adm_member_list.php?member_id=<?=$member_id?>&page=<?=$next_page?><?if ($separation) {?>&separation=<?=$separation?><?}?>&search=<?=$search?>">&raquo;</a></li>
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
