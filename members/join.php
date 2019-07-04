<?php include_once ('../header_ui.php'); ?>
<?php
	// 이미 로그인 중이라면 DB 접속 해제 후 이전 페이지로 이동
	if ($session_id) {
		redirect(FALSE, '이미 로그인 하셨습니다.');
	}
	
	$sql = "SELECT member_skin, homepage, homepage_ess, address, address_ess, tel, tel_ess, fax, fax_ess, sign, sign_ess, self_intro, self_intro_ess, user_level, image_use, image_level, image_size, image_width, image_height, id_nic_ban, terms, policy FROM member_config";
	$result = $db -> query($sql);

	$Country = post('Country');
?>
<link rel="stylesheet" href="<?php echo($site_home); ?>/css/bootstrap-datetimepicker.min.css">
<script type='text/javascript' src="<?php echo($site_home); ?>/js/moment-with-locales.js"></script>
<script type='text/javascript' src="<?php echo($site_home); ?>/js/bootstrap-datetimepicker.js"></script>

<?php
	echo('Country = '.$Country);
?>
<style>
	.Country > option {
		display: block;
		
		height: 26px;
		padding: 5px 10px;

	}
	
	.Country > option > div {
		display: block;
		width: 100%;
		height: 16px;
		line-height: 16px;
		margin-left: 42px;
		
		background-image: url('/img/Country.png');
		background-repeat: no-repeat;
	}
	
	.af {
		background-position: 0 0;
	}
	
	.sq {
		background-position: 0 -16px;
	}
	
	.BirthdayBtn:hover {
		cursor: pointer;
	}
</style>
<script>

</script>
<div class="container">
<div class="header-title"></div>
<script id="headerTitle" type="text/x-jquery-tmpl">
	<h1>${MemberJoin}</h1>
</script>
<div class="member-join-form"></div>
<script id="MemberJoinForm" type="text/x-jquery-tmpl">
	<!-- 가입폼 시작 -->
	<fieldset>
		<div class="form-group">
			<div class="col-xs-3">
				<h1>
					${MemberJoin}
				</h1>
			</div>
		</div>
	</fieldset>
	<!-- 가입폼 끝 -->
</script>
</div>

<?php include_once ('../footer_ui.php'); ?>
