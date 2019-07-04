<?php include_once('header_ui.php'); ?>
<?php
	// 이미 로그인 중이 아니라면 사용 불가
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	$admin_id = get('admin_id');
	
	// 데이터베이스에서 회원 정보 불러오기
	$sql = "SELECT id, adm_level, adm_id, adm_name, adm_nic, email, tel, reg_date, edit_date FROM admin WHERE id = %d";

	// SQL문 실행하기
	$result = $db -> query($sql, array($admin_id));

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
			$('edit-btn').click(function() {
				$('.MyFrom').attr('method', 'post');
				$('.MyFrom').attr('action', '<?php echo($admin_home); ?>/adm_admin_edit_ok.php');
				$('.MyFrom').submit();
			});
		});
	</script>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-header">
				<h1>관리자 정보 수정</h1>
			</div>
			<!-- 정보 수정 폼 시작 -->
			<fieldset>
				<input type="hidden" name="id" id="id" value="<?php echo($row['id']); ?>">
				<input type="hidden" name="adm_id" id="adm_id" value="<?php echo($row['adm_id']); ?>">
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="adm_level">사용자 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="adm_level" id="adm_level" class="form-control">
								<option value="1" <? if ($row['adm_level'] == 1) { ?>selected<?}?>>레벨 1</option>
								<option value="2" <? if ($row['adm_level'] == 2) { ?>selected<?}?>>레벨 2</option>
								<option value="3" <? if ($row['adm_level'] == 3) { ?>selected<?}?>>레벨 3</option>
								<option value="4" <? if ($row['adm_level'] == 4) { ?>selected<?}?>>레벨 4</option>
								<option value="5" <? if ($row['adm_level'] == 5) { ?>selected<?}?>>레벨 5</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="adm_id">아이디</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<p class="form-control-static"><?php echo($row['adm_id']); ?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="new_adm_pw">변경할 비밀번호</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="password" name="new_adm_pw" id="new_adm_pw" class="form-control" placeholder="변경할 비밀번호">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="new_adm_pw_re">변경할 비밀번호 확인</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="password" name="new_adm_pw_re" id="new_adm_pw_re" class="form-control" placeholder="변경할 비밀번호 확인">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="adm_name">이름</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="adm_name" id="adm_name" class="form-control" value="<?php echo($row['adm_name']); ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="adm_nic">닉네임</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="adm_nic" id="adm_nic" class="form-control" value="<?php echo($row['adm_nic']); ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="email">이메일</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="email" id="email" class="form-control" value="<?php echo($row['email']); ?>" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="tel">연락처</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="tel" id="tel" class="form-control" value="<?php echo($row['tel']); ?>" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="tel">가입일시</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<p class="form-control-static"><?php echo($row['reg_date']); ?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label class="label-control" for="tel">최근 변경 일시</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<p class="form-control-static"><?php echo($row['edit_date']); ?></p>
						</div>
					</div>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary edit-btn">변경하기</button>
					<button type="reset" class="btn btn-danger">다시작성</button>
					<a href="index.php" class="btn btn-info">돌아가기</a>
				</div>
			</fieldset>
		</div>
	</div>
			<!-- 정보 수정 폼 끝 -->
<?php include_once('footer_ui.php'); ?>