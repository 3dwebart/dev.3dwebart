<?php
	if($is_admin = 'true') {
		$sql = "SELECT email FROM admin";
		$result = $db -> query($sql);
	} else {
		$sql = "SELECT email FROM members WHERE user_id = '%s'";
		$result = $db -> query($sql, array($session_user_id));
	}

	$row = $db -> fetch_assoc();
?>
<script src="<?php echo($site_home); ?>/assets/global/scripts/jquery.cookie.js"></script>
<script>
	$(document).ready(function() {
		$('.language-select ul').hide();
		$('.language-select a').hover(function() {
			$(this).parent().find('ul').show();
		}, function() {
			$(this).parent().find('ul').hide();
			$(this).parent().find('ul').hover(function() {
				$(this).show();
			}, function() {
				$(this).hide();
			});
		});
		
		function ko() {
			//$(document).load("<?php echo($site_home); ?>/language/kr.php");
			//"<?php include_once($site_dir."/language/kr.php"); ?>";
			$(location).attr('href', '<?php echo($site_home); ?>/language/kr_load.php');
		}
		
		function en() {
			//$(document).load("<?php echo($site_home); ?>/language/en.php");
			//"<?php include_once($site_dir."/language/en.php"); ?>";
			$(location).attr('href', '<?php echo($site_home); ?>/language/en_load.php');
		}
		
		$('.KO').click(function() {
			ko();
			return false;
		});
		
		$('.EN').click(function() {
			en();
			return false;
		});
		
		$('.login-ok').click(function() {
			var LoginID = $('.login-id').val();
			var LoginPW = $('.login-pw').val();
			if(!LoginID) {
				alert('아이디를 입력하세요.');
			}
			
			if(!LoginPW) {
				alert('비밀번호를 입력하세요.');
			}
			$.ajax({
				url: "<?php echo($members_home); ?>/ajax.login.php",
				type: "post",
				data: 
					{
						user_id : LoginID,
						user_pw : LoginPW
					},
				dataType: "json",
				cache: false,
				timeout: 30000,
				success: function(data) {
					//debugger;
				},
				error: function(xhr, textStatus, errorThrown) {
					$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
				}
			});
		});
	});
</script>
	<input type="hidden" name="lang" value="" class="lang" />
	<!-- BEGIN TOP BAR -->
	<div class="pre-header hrader-top-bar"></div>
	<script id="headerTopBar" type="text/x-jquery-tmpl">
		<div class="container">
			<div class="row">
				<!-- BEGIN TOP BAR LEFT PART -->
				<div class="col-md-6 col-sm-6 additional-shop-info">
					<ul class="list-unstyled list-inline">
						<li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
						<li><i class="fa fa-envelope-o"></i><span><?php echo($row['email']);?></span></li>
						<li class="language-select">
							<a href="#">${language}</a>
							<ul style="display: none;">
								<li><a href="#" class="KO" lang="ko">${langKR}</a></li>
								<li><a href="#" class="EN" lang="en">${langEN}</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- END TOP BAR LEFT PART -->
				<!-- BEGIN TOP BAR MENU -->
				<?php if (!$session_user_id) { ?>
				<div class="col-md-6 col-sm-6 additional-nav">
					<ul class="list-unstyled list-inline pull-right">
						<li><a href="<?php echo($members_home); ?>/login.php" class="member-login">${login}</a></li>
						<li><a href="<?php echo($members_home); ?>/join.php">${MemberJoin}</a></li>
					</ul>
				</div>
				<?php } else { ?>
				<div class="col-md-6 col-sm-6 additional-nav">
					<ul class="list-unstyled list-inline pull-right">
						<?php if($is_admin == 'true') { ?>
						<li><a href="<?php echo($site_home); ?>/adm/">${Administrator}</a></li>
						<?php } ?>
						<li><a href="<?php echo($members_home); ?>/logout.php">${logout}</a></li>
						<li><a href="<?php echo($members_home); ?>/edit.php">${MemberEdit}</a></li>
						<?php if ($session_user_id == 'admin') { ?>
						<li><a href="<?php echo($admin_home); ?>/index.php" target="_blank">ADMIN</a></li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
				<!-- END TOP BAR MENU -->
			</div>
		</div>        
	</script>
	<!-- END TOP BAR -->
	<?php // include_once($site_dir.'/modal.tmpl.php'); ?>
