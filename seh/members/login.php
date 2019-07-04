<?php include_once('../header_ui.php'); ?>
	<?php
		$now_url = post('now_url');
		// 저장된 세션 데이터가 없는 경우 로그인 폼 보여주기
		if ($session_id == FALSE) {
	?>
	<style>
	.myform {
		margin-bottom: 50px;
	}
	</style>
		<div class="container">
			<div class="page-header">
				<h1 alert alert-success>로그인</h1>
			</div>
			<!-- 로그인 폼 시작 -->
			<form name="myform"  method="post" action="<?=$members_home?>/login_ok.php" role="form" class="form-inline">
				<fieldset>
					<input type="hidden" name="now_url" value="<?=$now_url?>" />
					<div class="form-group">
						<input type="text" name="user_id" id="user_id" class="form-control" placeholder="user id">
					</div>
					<div class="form-group">
						<input type="password" name="user_pw" id="user_pw" class="form-control" placeholder="password">
					</div>
					<button type="submit" class="btn btn-primary">로그인</button>
					<a href="join.php" class="btn btn-danger">회원가입</a>
					<a href="password_reset.php" class="btn btn-info">비밀번호 재설정</a>
				</fieldset>
			</form>
			<div class="page-footer">
				<h1 alert alert-success></h1>
			</div>
			<!-- 로그인 폼 끝 -->
		</div>
	<?php
		} else {
	?>
		<div class="container">
			<div class="page-header">
				<h1>안녕하세요. <?=$session_user_name?>(<?=$session_user_id?>)님</h1>
			</div>
			<div>
				<ul>
					<li>이메일 : <?=$session_user_email?></li>
					<li>연락처 : <?=$session_user_tel?></li>
				</ul>
				<a href="logout.php" class="btn btn-primary">로그아웃</a>
				<a href="edit.php" class="btn btn-info">회원정보 수정</a>
				<a href="out.php" class="btn btn-danger">회원탈퇴</a>
			</div>
		</div>

	<?php
		}
	?>
<?php
	include_once('../footer_ui.php');
?>