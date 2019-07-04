<?php
	include_once('header_ui.php');
	
	// 이미 로그인 중이 아니라면 사용 불가
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	$member_num = get('member_id');
	
	// 데이터베이스에서 회원 정보 불러오기
	$sql = "SELECT id, user_level, user_id, user_name, user_nic, email, tel, reg_date, edit_date FROM members WHERE id = %d";

	// SQL문 실행하기
	$result = $db -> query($sql, array($member_num));

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

	<script>
		$(function() {
			$('fieldset > div').height(function() {
				$(this).find('.col-md-2').height($(this).find('.col-md-10').height());
			});
			$('.member-edit-btn').click(function() {
				$('.MyForm').attr('method', 'post');
				$('.MyForm').attr('action', 'adm_member_edit_ok.php');
				$('.MyForm').submit();
			});
		});
	</script>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-header">
				<h1 class="alert alert-success">회원정보 수정</h1>
			</div>
			<!-- 정보 수정 폼 시작 -->
			<fieldset>
				<input type="hidden" name="id" id="id" value="<?php echo($row['id']); ?>">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo($row['user_id']); ?>">
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="user_level">사용자 권한</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<select name="user_level" id="user_level" class="form-control">
							<option value="1" <?php if ($row['user_level'] == 1) { ?>selected<?php } ?>>레벨 1</option>
							<option value="2" <?php if ($row['user_level'] == 2) { ?>selected<?php } ?>>레벨 2</option>
							<option value="3" <?php if ($row['user_level'] == 3) { ?>selected<?php } ?>>레벨 3</option>
							<option value="4" <?php if ($row['user_level'] == 4) { ?>selected<?php } ?>>레벨 4</option>
							<option value="5" <?php if ($row['user_level'] == 5) { ?>selected<?php } ?>>레벨 5</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="user_id">아이디</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="new_user_pw" id="new_user_pw" class="form-control" placeholder="아이디" value="<?php echo($row['user_id']); ?>" disabled="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="new_user_pw">변경할 비밀번호</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="password" name="new_user_pw" id="new_user_pw" class="form-control" placeholder="변경할 비밀번호">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="new_user_pw_re">변경할 비밀번호 확인</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="password" name="new_user_pw_re" id="new_user_pw_re" class="form-control" placeholder="변경할 비밀번호 확인">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="user_name">이름</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo($row['user_name']); ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="user_nic">닉네임</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="user_nic" id="user_nic" class="form-control" value="<?php echo($row['user_nic']); ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="email">이메일</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="email" id="email" class="form-control" value="<?php echo($row['email']); ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="tel">연락처</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="tel" id="tel" class="form-control" value="<?php echo($row['tel']); ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="tel">가입일시</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="tel" id="tel" class="form-control" value="<?php echo($row['reg_date']); ?>" disabled="" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label class="label-control" for="tel">최근 변경 일시</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="tel" id="tel" class="form-control" value="<?php echo($row['edit_date']); ?>" disabled="" />
					</div>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary member-edit-btn">변경하기</button>
					<button type="reset" class="btn btn-danger">다시작성</button>
					<a href="index.php" class="btn btn-info">돌아가기</a>
				</div>
			</fieldset>
			<!-- 정보 수정 폼 끝 -->
		</div>
	</div>
<?php include_once('footer_ui.php'); ?>