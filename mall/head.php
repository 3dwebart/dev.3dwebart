<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 상단 파일 경로 지정 : 이 코드는 가능한 삭제하지 마십시오.
if ($config['cf_include_head'] && is_file(G5_PATH.'/'.$config['cf_include_head'])) {
	include_once(G5_PATH.'/'.$config['cf_include_head']);
	return; // 이 코드의 아래는 실행을 하지 않습니다.
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

if (G5_IS_MOBILE) {
	include_once(G5_MOBILE_PATH.'/head.php');
	return;
}
?>
<style>
	.navigation-bar {
		background-color: #dedede;
		height: 35px;
		line-height: 35px;
	}
</style>
<!-- 상단 시작 { -->
<div id="hd">
	<h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

	<div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

	<?php
	if(defined('_INDEX_')) { // index에서만 실행
		include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
	}
	?>
	<?/*?>
	<!-- BEGIN TOP BAR -->
	<div class="pre-header">
		<div class="container">
			<div class="row">
			<!-- BEGIN TOP BAR LEFT PART -->
				<div class="col-md-6 col-sm-6 additional-shop-info">
					<ul class="list-unstyled list-inline">
						<li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
						<li><i class="fa fa-envelope-o"></i><span>info@keenthemes.com</span></li>
					</ul>
				</div>
				<!-- END TOP BAR LEFT PART -->
				<!-- BEGIN TOP BAR MENU -->
				<div class="col-md-6 col-sm-6 additional-nav">
					<ul class="list-unstyled list-inline pull-right">
						<li><a href="page-login.html">Log In</a></li>
						<li><a href="page-reg-page.html">Registration</a></li>
					</ul>
				</div>
				<!-- END TOP BAR MENU -->
			</div>
		</div>        
	</div>
	<!-- END TOP BAR -->
	<?*/?>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#shop-navigaion" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/logo.jpg" alt="<?php echo $config['cf_title']; ?>"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="shop-navigaion">
					<ul class="nav navbar-nav">
						<li>
					<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" class="navbar-form navbar-left" role="search">
					<input type="hidden" name="sfl" value="wr_subject||wr_content">
					<input type="hidden" name="sop" value="and">
					<label for="sch_stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
						<div class="form-group">
							<div class="input-group">
								<input type="text" name="stx" maxlength="20" class="form-control" placeholder="Search" placeholder="Search">
								<span class="input-group-btn">
									<button type="submit" class="btn blue">검색</button>
								</span>
							</div>
							
								
						</div>					
					</form>
					<script>
					jQuery(document).ready(function() {
						jQuery('.main-navi .nav > li > a').addClass(function() {
							if(jQuery(this).attr('href') == '#') {
								jQuery(this).parent().addClass('dropdown');
								jQuery(this).addClass('dropdown-toggle');
								jQuery(this).attr('data-toggle', 'dropdown');
								jQuery(this).attr('role', 'button');
								jQuery(this).attr('aria-haspopup', 'true');
								jQuery(this).attr('aria-expanded', 'false');
								jQuery(this).parent().find('ul').addClass('dropdown-menu');
								jQuery(this).hover(function() {
									jQuery(this).addClass('active');
								}, function() {
									jQuery(this).removeClass('active');
									jQuery(this).parent().find('ul').hover(function() {
										jQuery(this).parent().find('a').addClass('active');
									}, function() {
										jQuery(this).parent().find('a').removeClass('active');
									});
								});

							}
						});
					});

					function fsearchbox_submit(f)
					{
						if (f.stx.value.length < 2) {
							alert("검색어는 두글자 이상 입력하십시오.");
							f.stx.select();
							f.stx.focus();
							return false;
						}

						// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
						var cnt = 0;
						for (var i=0; i<f.stx.value.length; i++) {
							if (f.stx.value.charAt(i) == ' ')
								cnt++;
						}

						if (cnt > 1) {
							alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
							f.stx.select();
							f.stx.focus();
							return false;
						}

						return true;
					}
					</script>
						</li>
						<?php /* ?>
						<li>
							<a href="#">
							<div id="text_size">
							<!-- font_resize('엘리먼트id', '제거할 class', '추가할 class'); -->
							<button id="size_down" onclick="font_resize('container', 'ts_up ts_up2', '');"><img src="<?php echo G5_URL; ?>/img/ts01.gif" alt="기본"></button>
							<button id="size_def" onclick="font_resize('container', 'ts_up ts_up2', 'ts_up');"><img src="<?php echo G5_URL; ?>/img/ts02.gif" alt="크게"></button>
							<button id="size_up" onclick="font_resize('container', 'ts_up ts_up2', 'ts_up2');"><img src="<?php echo G5_URL; ?>/img/ts03.gif" alt="더크게"></button>
							</div>
							</a>
						</li>
						<?php */ ?>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<?php if ($is_member) {  ?>
						<?php if ($is_admin) {  ?>
						<li><a href="<?php echo G5_ADMIN_URL ?>"><b>관리자</b></a></li>
						<?php }  ?>
						<li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
						<li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
						<?php } else {  ?>
						<li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
						<li><a href="<?php echo G5_BBS_URL ?>/login.php"><b>로그인</b></a></li>
						<?php }  ?>

						<li><a href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a></li>

						<li><a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a></li>
						<li><a href="<?php echo G5_BBS_URL ?>/current_connect.php">접속자 <?php echo connect(); // 현재 접속자수  ?></a></li>
						<li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
						<?php if (defined('G5_USE_SHOP') && G5_USE_SHOP) { ?>
						<li><a href="<?php echo G5_SHOP_URL ?>/">쇼핑몰</a></li>
						<?php } ?>
					</ul>
					<div class="clearfix"></div>
					<h2 class="sound_only">메인메뉴</h2>
					<div class="main-navi">
						<ul class="nav navbar-nav">
							<?php
							$sql = " select me_id, me_code, me_name, me_link, me_target, me_order, me_use, me_mobile_use
										from {$g5['menu_table']}
										where me_use = '1'
										  and length(me_code) = '2'
										order by me_order, me_id ";
							$result = sql_query($sql, false);
							$gnb_zindex = 999; // gnb_1dli z-index 값 설정용

							for ($i = 0; $row = sql_fetch_array($result); $i++) {
							?>
							<!-- <li style="z-index:<?php echo $gnb_zindex--; ?>"> -->
							<li>
								<a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
								<?php
								$sql2 = " select me_id, me_code, me_name, me_link, me_target, me_order, me_use, me_mobile_use
											from {$g5['menu_table']}
											where me_use = '1'
											  and length(me_code) = '4'
											  and substring(me_code, 1, 2) = '{$row['me_code']}'
											order by me_order, me_id ";
								$result2 = sql_query($sql2);

								for ($k = 0; $row2 = sql_fetch_array($result2); $k++) {
									if($k == 0)
										echo '<ul class="gnb_2dul">'.PHP_EOL;
								?>
									<!--
									<li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
									-->
									<li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
								<?php
								}

								if($k > 0)
									echo '</ul>'.PHP_EOL;
								?>
							</li>
							<?php
							}

							if ($i == 0) {  ?>
								<li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


	<hr>
</div>
<!-- } 상단 끝 -->

<hr>

<!-- 콘텐츠 시작 { -->
<div class="container">
	<div class="col-md-3">
		<?php echo outlogin('basic.bootstrap'); // 외부 로그인  ?>
		<!--
		<?php echo poll('basic'); // 설문조사  ?>
		-->
	</div>
	<div class="col-md-9">
		<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
