<?php
	include_once('header_ui.php');

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}
?>
	<script>
		$(function() {
			$('fieldset > div').height(function() {
				$(this).find('.col-md-2').height($(this).find('.col-md-10').height());
			});
		});
		$('.join-btn').click(function(){
			$('.MyForm').attr('action', 'adm_admin_add_ok.php');
			$('.MyForm').attr('method', 'get');
			$('.MyForm').submit();
		});
	</script>
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- 가입폼 시작 -->
			<fieldset>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="adm_level">사용자 권한</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<select name="adm_level" id="adm_level" class="form-control">
								<option value="1">레벨 1</option>
								<option value="2">레벨 2</option>
								<option value="3">레벨 3</option>
								<option value="4">레벨 4</option>
								<option value="5" selected="">레벨 5</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="adm_id">아이디</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="adm_id" id="adm_id" class="form-control" placeholder="아이디" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="adm_pw">비밀번호</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="password" name="adm_pw" id="adm_pw" class="form-control" placeholder="비밀번호" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="adm_pw_re">비밀번호 확인</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="password" name="adm_pw_re" id="adm_pw_re" class="form-control" placeholder="비밀번호 확인" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="adm_name">이름</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="adm_name" id="adm_name" class="form-control" placeholder="이름" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="adm_nic">닉네임</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="text" name="adm_nic" id="adm_nic" class="form-control" placeholder="이름" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="email">이메일</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="email" name="email" id="email" class="form-control" placeholder="이메일" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<div class="col-md-2 alert alert-success">
							<label for="tel">연락처</label>
						</div>
						<div class="col-md-10 alert alert-default">
							<input type="tel" name="tel" id="tel" class="form-control" placeholder="연락처" />
						</div>
					</div>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary join-btn">가입하기</button>
					<button type="reset" class="btn btn-danger">다시작성</button>
				</div>
			</fieldset>
			<!-- 가입폼 끝 -->
<?php include_once('footer_ui.php'); ?>