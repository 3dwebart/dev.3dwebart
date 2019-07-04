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
			$('.member-add-btn').click(function() {
				$('.MyForm').attr('method', 'post');
				$('.MyForm').attr('action', 'adm_member_add_ok.php');
				$('.MyForm').submit();
			});
		});
	</script>
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- 가입폼 시작 -->
			<fieldset>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="user_level">사용자 권한</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<select name="user_level" id="user_level" class="form-control">
							<option value="1">레벨 1</option>
							<option value="2">레벨 2</option>
							<option value="3">레벨 3</option>
							<option value="4">레벨 4</option>
							<option value="5" selected="">레벨 5</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="user_id">아이디</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="user_id" id="user_id" class="form-control" placeholder="아이디" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="user_pw">비밀번호</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="password" name="user_pw" id="user_pw" class="form-control" placeholder="비밀번호" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="user_pw_re">비밀번호 확인</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="password" name="user_pw_re" id="user_pw_re" class="form-control" placeholder="비밀번호 확인" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="user_name">이름</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="이름" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="user_nic">닉네임</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="text" name="user_nic" id="user_nic" class="form-control" placeholder="닉네임" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="email">이메일</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="email" name="email" id="email" class="form-control" placeholder="이메일" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 alert alert-success">
						<label for="tel">연락처</label>
					</div>
					<div class="col-md-10 alert alert-default">
						<input type="tel" name="tel" id="tel" class="form-control" placeholder="연락처" />
					</div>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary member-add-btn">가입하기</button>
					<button type="reset" class="btn btn-danger">다시작성</button>
				</div>
			</fieldset>
			<!-- 가입폼 끝 -->
		</div>
	</div>
<?php include_once('footer_ui.php'); ?>