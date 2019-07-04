<?php
	include_once('header_ui.php');
	
	// 이미 로그인 중이 아니라면 사용 불가
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	$group_num = get('group_id');
	
	// 데이터베이스에서 회원 정보 불러오기
	$sql = "SELECT id, bo_group_id, bo_group_name, reg_date, edit_date FROM bbs_group WHERE id = %d";

	// SQL문 실행하기
	$result = $db -> query($sql, array($group_num));

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
	<link rel="stylesheet" href="<?php echo($site_home); ?>/css/validate.css">
	<script type="text/javascript" src="<?php echo($site_home); ?>/plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo($site_home); ?>/js/admin_board_validate.js"></script>
	<script>
		$(function() {
			$('fieldset > div').height(function() {
				$(this).find('.col-md-2').height($(this).find('.col-md-10').height()); 
			});
		});
	</script>
	
			<div class="page-header">
				<h1>게시판 그룹 정보 수정(<?php echo($row['bo_group_name']); ?>)</h1>
			</div>
			<!-- 정보 수정 폼 시작 -->
			<form name="myform" id="myform" class="myform" method="post" action="<?php echo($admin_home); ?>/adm_group_edit_ok.php" role="form"  enctype="multipart/form-data">
				<fieldset>
					<input type="hidden" name="id" id="id" value="<?php echo($row['id']); ?>">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="bo_group_id">게시판 그룹 아이디</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="hidden" name="bo_group_id" id="bo_group_id" value="<?php echo($row['bo_group_id']); ?>" class="form-control">
							<?php echo($row['bo_group_id']); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="bo_group_name">게시판 그룹 이름</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="bo_group_name" id="bo_group_name" value="<?php echo($row['bo_group_name']); ?>" class="form-control">
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