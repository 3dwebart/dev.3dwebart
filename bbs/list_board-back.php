<?php
	include_once('../header_ui.php');

	// 검색어
	$search = get('search');

	/**** 페이지 구현을 위한 번수 ****/
	$list_count = 10; // 현 페이지에 보여질 글의 목록 수
	$group_count = 5; // 한 그룹에 표시할 페이지 수
	$page = get('page', 1); // 현재 페이지 번호
	$total_count = 0; // 전체 글 개수 조회

	$sql_title = "SELECT title FROM bbs_config WHERE id = %d";
	$result = $db -> query($sql, array($bbs_id));

	$row = $db -> fetch_array();

	$title = $row['title'];

	// 검색 조건에 따른 전체 글 수 조회
	if ($search == FALSE) {
		$sql = "SELECT COUNT(id) FROM bbs_documents WHERE bbs_id = %d";
		$result = $db -> query($sql, array($bbs_id));

	} else {
		$sql = "SELECT COUNT(id) FROM bbs_documents 
				WHERE bbs_id = %d AND subject LIKE '%%%s%%' OR content LIKE '%%%s%%'";
		$result = $db -> query($sql, array($bbs_id, $search, $search));
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
	// 글 목록 조회하기
	if ($search == FALSE) {
		$sql = "SELECT a.id, a.subject, a.writer, a.hit, a.reg_date,
					unix_timestamp(reg_date) as timestamp,
					(SELECT COUNT(b.id) FROM bbs_comments AS `b`
					 WHERE b.document_id = a.id) AS comment_count
				FROM bbs_documents AS `a`
				WHERE a.bbs_id=%d
				ORDER BY id DESC
				LIMIT %d, %d";

		$result = $db -> query($sql, array($bbs_id, $limit_start, $list_count));
	} else {
		$sql = "SELECT a.id, a.subject, a.writer, a.hit, a.reg_date,
					unix_timestamp(reg_date) as timestamp,
					(SELECT COUNT(b.id) FROM bbs_comments AS `b`
					 WHERE b.document_id=a.id) AS comment_count
				FROM bbs_documents AS `a`
				WHERE bbs_id=%d AND subject LIKE '%%%s%%' OR content LIKE '%%%s%%'
				ORDER BY id DESC
				LIMIT %d, %d";

		$result = $db -> query($sql, array($bbs_id, $search, $search, $limit_start, $list_count));
	}

	if (!$result) {
		redirect(FALSE, '글 목록을 읽는데 실패했습니다. 관리자에게 문의해 주세요.');
	}

	// 전체 글 목록 수
	$count = $db -> num_rows();
?>
<div class="container">
<?php
	$sql = "SELECT document_id, dir, file_name, file_type, file_size, origin_name, full_path FROM deco_files WHERE document_id = %d AND file_area = 'top'";

	$result = $db -> query($sql, array($bbs_id));

	$row = $db -> fetch_array();

	if ($db -> num_rows() > 0) {

		// 썸네일 이미지의 가로 크기
		$width = 1500;
		// 썸네일 이미지의 세로 크기
		$height = 400;
		// 저장되어 있는 파일 이름
		$file_name = $row['file_name'];
		// 생성된 썸네일의 파일이름 (thumb_640x480_파일명)
		$thumb_name = sprintf("thumb_%dx%d_%s", $width, $height, $file_name);
		// 파일이 저장되어 있는 Web상의 디렉토리 경로
		$dir = $row['dir'];
		// 파일이 저장되어 있는 실제 디렉토리 경로
		$full_dir = $_SERVER['DOCUMENT_ROOT'].$dir;
		// 현재 파일이 저장되어 있는 물리적인 파일 경로
		$orgin_path = $full_dir.$file_name;
		// 썸네일이 저장될 실제 디렉토리 결로
		$thumb_path = $full_dir.$thumb_name;
		// 썸네일이 저장될 web상의 결로
		$thumb_path_web = $dir.$thumb_name;
		/** 썸네일 만들기 **/
		if (!file_exists($thumb_path)) {
			smart_resize_image($orgin_path, null, $width, $height, false, $thumb_path, false);
		
			$sql = "INSERT INTO deco_files (
				document_id, file_area, dir, file_name, file_type, file_size, origin_name, full_path, reg_date, edit_date
				) VALUES (%d, 'thumb_top', '%s', '%s', '%s', %d, '%s', '%s', now(), now())";
			$db -> query($sql, array(
				$row['document_id'], $row['dir'], $thumb_name, 
				$row['file_type'], $row['file_size'], 
				$row['origin_name'], $thumb_path
			));
		}
?>
<div>
	<img src="<?php echo($thumb_path_web); ?>" alt="<?php echo($row['origin_name']); ?>" class="img-responsive" />
</div>
<?php
	}
?>
<div class="page-header">
	<h1><?php echo($title); ?></h1>
</div>

<!-- 글 목록 시작 -->
<table class="table">
	<thead>
		<tr>
			<th class='text-center' style='width: 100px;'>번호</th>
			<th class='text-center'>제목</th>
			<th class='text-center' style='width: 100px;'>작성자</th>
			<th class='text-center' style='width: 100px;'>조회수</th>
			<th class='text-center' style='width: 100px;'>작성일</th>
		</tr>
	</thead>
	<tbody>
	<?php
		if ($count > 0) {
			$now_time = time() - (24 * 60 * 60);

			while ($row = $db -> fetch_array()) {
	?>
		<tr>
			<td class='text-center'><?php echo($row['id']); ?></td>
			<td>
				<a href='read.php?bbs_id=<?php echo($bbs_id); ?>&id=<?php echo($row['id']); ?>'><?php echo(htmlspecialchars($row['subject'])); ?></a>
	<?php
				if ($row['comment_count'] > 0) {
					printf("&nbsp;<span class='label label-info'>%d</span>", $row['comment_count']);
				}
				if ($row['timestamp'] > $now_time) {
					echo("&nbsp;<span class='label label-warning'>new</span>");
				}
	?>
			</td>
			<td class='text-center'><?php echo(htmlspecialchars($row['writer'])); ?></td>
			<td class='text-center'><?php echo($row['hit']); ?></td>
			<td class='text-center'><?php echo(substr($row['reg_date'], 0, 10)); ?></td>
		</tr>
	<?php
			}
		} else {
	?>
		<tr>
			<td colspan='5' class='text-center' style='line-height: 100px;'>조회된 글이 없습니다.</td>
		</tr>
	<?php
		}
	?>
	</tbody>
</table>
<!-- 검색폼 + 글 쓰기 버튼 -->
<div class='clearfix'>
	<div class='pull-left'>
		<form methos='get' action='index.php' style='width: 200px;'>
			<input type="hidden" name="bbs_id" value="<?php echo($bbs_id); ?>">
			<div class='input-group'>
				<input type='text' name='search' class='form-control' value='<?php echo($search); ?>' />
				<span class='input-group-btn'>
					<button class='btn btn-success' type='submit'>
						<i class='glyphicon glyphicon-search'></i>
					</button>
				</span>
			</div>
		</form>
	</div>
	<div class='pull-right'>
		<a href='write.php?bbs_id=<?php echo($bbs_id); ?>' class='btn btn-primary'>글 쓰기</a>
	</div>
</div>
<!-- 페이지 번호 -->
<nav class='text-center'>
	<ul class="pagination">
		<!-- 이전 그룹 -->
	<?php if ($prev_page > 0) { ?>
		<li>
			<a href="index.php?bbs_id=<?php echo($bbs_id); ?>&page=<?php echo($prev_page); ?>&search=<?php echo($search); ?>">
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
		<li><a href="index.php?bbs_id=<?php echo($bbs_id); ?>&page=<?php echo($i); ?>&search=<?php echo($search); ?>"><?php echo($i); ?></a></li>
	<?php
			}
		}
	?>
		<!-- 다음 그룹 -->
	<?php if ($next_page > 0) { ?>
		<li><a href="index.php?bbs_id=<?php echo($bbs_id); ?>&page=<?php echo($next_page); ?>&search=<?php echo($search); ?>">&raquo;</a></li>
	<?php } else { ?>
		<li class='disabled'>
			<a href="#" onclick="return false">
				<span area-hidden="true">&raquo;</span>
			</a>
		</li>
	<?php } ?>
	</ul>
</nav>
<?php
	$sql = "SELECT document_id, dir, file_name, file_type, file_size, origin_name, full_path FROM deco_files WHERE document_id = %d AND file_area = 'bottom'";

	$result = $db -> query($sql, array($bbs_id));

	$row = $db -> fetch_array();

	if ($db -> num_rows() > 0) {

		// 썸네일 이미지의 가로 크기
		$width = 1500;
		// 썸네일 이미지의 세로 크기
		$height = 200;
		// 저장되어 있는 파일 이름
		$file_name = $row['file_name'];
		// 생성된 썸네일의 파일이름 (thumb_640x480_파일명)
		$thumb_name = sprintf("thumb_%dx%d_%s", $width, $height, $file_name);
		// 파일이 저장되어 있는 Web상의 디렉토리 경로
		$dir = $row['dir'];
		// 파일이 저장되어 있는 실제 디렉토리 경로
		$full_dir = $_SERVER['DOCUMENT_ROOT'].$dir;
		// 현재 파일이 저장되어 있는 물리적인 파일 경로
		$orgin_path = $full_dir.$file_name;
		// 썸네일이 저장될 실제 디렉토리 결로
		$thumb_path = $full_dir.$thumb_name;
		// 썸네일이 저장될 web상의 결로
		$thumb_path_web = $dir.$thumb_name;
		/** 썸네일 만들기 **/
		if (!file_exists($thumb_path)) {
			smart_resize_image($orgin_path, null, $width, $height, false, $thumb_path, false);

			$sql = "INSERT INTO deco_files (
				document_id, file_area, dir, file_name, file_type, file_size, origin_name, full_path, reg_date, edit_date
				) VALUES (%d, 'thumb_bottom', '%s', '%s', '%s', %d, '%s', '%s', now(), now())";
			$db -> query($sql, array(
				$row['document_id'], $row['dir'], $thumb_name, 
				$row['file_type'], $row['file_size'], 
				$row['origin_name'], $thumb_path
			));
		}
?>
<div>
	<img src="<?php echo($thumb_path_web); ?>" alt="<?php echo($row['origin_name']); ?>" class="img-responsive" />
</div>
<?php
	}
?>

</div>
<?php include_once('../footer_ui.php'); ?>