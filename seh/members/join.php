<? include_once ('../header_ui.php'); ?>
<?
	// 이미 로그인 중이라면 DB 접속 해제 후 이전 페이지로 이동
	if ($session_id) {
		redirect(FALSE, '이미 로그인 하셨습니다.');
	}
?>
		<script src="http://dmaps.daum.net/map_js_init/postcode.js"></script>
		<script src="../js/openDaumPostcode.js"></script>

			<div class='page-header'>
				<h1>회원가입</h1>
			</div>
			<!-- 가입폼 시작 -->
			<form name="myform" method="post" action="join_ok.php" role="form">
				<fieldset>
					<div class="form-group">
						<label for='user_id'>아이디</label>
						<input type="text" name="user_id" id="user_id" class="form-control" />
					</div>
					<div class="form-group">
						<label for='user_pw'>비밀번호</label>
						<input type="password" name="user_pw" id="user_pw" class="form-control"/>
					</div>
					<div class="form-group">
						<label for='user_pw'>비밀번호 확인</label>
						<input type="password" name="user_pw_re" id="user_pw_re" class="form-control"/>
					</div>
					<div class="form-group">
						<label for='user_name'>이름</label>
						<input type="text" name="user_name" id="user_name" class="form-control"/>
					</div>
					<div class="form-group">
						<label for='user_nic'>닉네임</label>
						<input type="text" name="user_nic" id="user_nic" class="form-control"/>
					</div>
					<div class="form-group">
						<label for='email'>이메일</label>
						<input type="email" name="email" id="email" class="form-control"/>
					</div>
					<div class="form-group">
						<label for='tel'>연락처</label>
						<input type="tel" name="tel" id="tel" class="form-control"/>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">가입하기</button>
						<button type="reset" class="btn btn-danger">다시작성</button>
					</div>
				</fieldset>
			</form>
			<!-- 가입폼 끝 -->

<? include_once ('../footer_ui.php'); ?>
