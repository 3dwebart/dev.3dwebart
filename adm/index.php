<?php
	include_once('./header_ui.php');

	/* 스킨 설정 Start */
	$path = $member_skin_dir; // 오픈하고자 하는 폴더 
	$entrys = array(); // 폴더내의 정보를 저장하기 위한 배열 
	$dirs = dir($path); // 오픈하기 
	while(false !== ($entry = $dirs->read())){ // 읽기 
		if(($entry != '.') && ($entry != '..')) { 
			if(is_dir($path.'/'.$entry)) { // 폴더이면 
				$entrys['dir'][] = $entry; 
			} 
			else { // 파일이면 
				$entrys['file'][] = $entry; 
			} 
		} 
	} 
	$dirs->close(); // 닫기

	$dircnt = count($entrys['dir']); // 폴더 수 
	$filecnt = count($entrys['file']); // 파일 수 

	var_export($entrys);
	/* 스킨 설정 End */

	$sql = "SELECT member_skin, homepage, homepage_ess, address, address_ess, 
  tel, tel_ess, fax, fax_ess, sign, sign_ess, 
  self_intro, self_intro_ess, user_level, 
  image_use, image_level, image_size, image_width, image_height, 
  id_nic_ban, 
  terms, 
  policy FROM member_config";
  $result = $db -> query($sql);

  $row = $db -> fetch_assoc();
?>
<link rel="stylesheet" href="<?php echo($site_home.'/assets/admin/layout/css/member-setting.css'); ?>">
<style>
	.member-ok {
		margin: 0 auto;
	}

	textarea[name="terms"] {
		width: 100% !important;
	}
</style>
<script>
	(function($) {
		jQuery('#textbox').on('keypress', function (event) {
			if(event.which == 13){
				event.preventDefault();
				jQuery('.MyForm').attr('action', 'adm_check_ok.php');
				jQuery('.MyForm').attr('method', 'post');
				jQuery('.MyForm').submit();
			}
		});

		jQuery(document).on('keydown', '.pw-form', function(event){
			if(event.which == 13){
				event.preventDefault();
				jQuery('.MyForm').attr('action', 'adm_check_ok.php');
				jQuery('.MyForm').attr('method', 'post');
				jQuery('.MyForm').submit();
			}
		});

		jQuery(document).on('click', '.AdmLoginBtn', function() {
			jQuery('.MyForm').attr('method', 'post');
			jQuery('.MyForm').attr('action', 'adm_check_ok.php');
			jQuery('.MyForm').submit();
		});

		jQuery(document).on('click', '.member-ok', function() {
			jQuery('.MyForm').attr('method', 'post');
			jQuery('.MyForm').attr('action', 'member-setting.php');
			jQuery('.MyForm').submit();
		});
	}) (jQuery);
</script>
		<?php if ($session_is_admin != 'true') { ?>
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="page-header">
					<h1>관리자 - 로그인</h1>
				</div>
				<div class="form-horizontal">
					<div class="form-group">
						<div class="col-md-2">
							<label for="adm_id" class="label-control">아이디</label>
						</div>
						<div class="col-md-10">
							<input type="text" name="adm_id" id="adm_id" class="form-control input-grey id-form" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2">
							<label for="adm_pw" class="label-control">비밀번호</label>
						</div>
						<div class="col-md-10">
							<input type="password" name="adm_pw" id="adm_pw" class="form-control input-grey pw-form" />
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary AdmLoginBtn">로그인</button>
					</div>
				</div>
			</div>
		</div>
		<?php } else { ?>
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								 Widget settings form goes here
							</div>
							<div class="modal-footer">
								<button type="button" class="btn blue">Save changes</button>
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<!-- BEGIN STYLE CUSTOMIZER -->
				<div class="theme-panel hidden-xs hidden-sm">
					<div class="toggler">
					</div>
					<div class="toggler-close">
					</div>
					<div class="theme-options">
						<div class="theme-option theme-colors clearfix">
							<span>
							THEME COLOR </span>
							<ul>
								<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
								</li>
								<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
								</li>
								<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
								</li>
								<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
								</li>
								<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
								</li>
								<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
								</li>
							</ul>
						</div>
						<div class="theme-option">
							<span>
							Layout </span>
							<select class="layout-option form-control input-sm">
								<option value="fluid" selected="selected">Fluid</option>
								<option value="boxed">Boxed</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Header </span>
							<select class="page-header-option form-control input-sm">
								<option value="fixed" selected="selected">Fixed</option>
								<option value="default">Default</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Top Menu Dropdown</span>
							<select class="page-header-top-dropdown-style-option form-control input-sm">
								<option value="light" selected="selected">Light</option>
								<option value="dark">Dark</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Sidebar Mode</span>
							<select class="sidebar-option form-control input-sm">
								<option value="fixed">Fixed</option>
								<option value="default" selected="selected">Default</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Sidebar Menu </span>
							<select class="sidebar-menu-option form-control input-sm">
								<option value="accordion" selected="selected">Accordion</option>
								<option value="hover">Hover</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Sidebar Style </span>
							<select class="sidebar-style-option form-control input-sm">
								<option value="default" selected="selected">Default</option>
								<option value="light">Light</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Sidebar Position </span>
							<select class="sidebar-pos-option form-control input-sm">
								<option value="left" selected="selected">Left</option>
								<option value="right">Right</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Footer </span>
							<select class="page-footer-option form-control input-sm">
								<option value="fixed">Fixed</option>
								<option value="default" selected="selected">Default</option>
							</select>
						</div>
					</div>
				</div>
				<!-- END STYLE CUSTOMIZER -->
				<!-- BEGIN PAGE HEADER-->
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Dashboard</a>
						</li>
					</ul>
					<div class="page-toolbar">
						<div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
							<i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
						</div>
					</div>
				</div>
				<h3 class="page-title">
				게시판 설정 <small>Board settong</small>
				</h3>
				<h3 class="page-title">
				회원설정 <small>Member setting</small>
				</h3>
				<!-- END DASHBOARD STATS -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">회원스킨</span>
									<span class="caption-helper">Member skin</span>
								</div>
								<!-- <div class="actions">
									<div class="btn-group btn-group-devided" data-toggle="buttons">
										<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
										<input type="radio" name="options" class="toggle" id="option1">New</label>
										<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
										<input type="radio" name="options" class="toggle" id="option2">Returning</label>
									</div>
								</div> -->
							</div>
							<div class="portlet-body">
								<select name="member_skin" class="form-control">
									<?php
										for($i = 0; $i < $dircnt; $i++) {
									?>
										<option value="<?php echo($entrys['dir'][$i]); ?>" <?php if($row['member_skin']== $entrys['dir'][$i]) { ?>selected=""<?php } ?>>
											<?php echo($entrys['dir'][$i]); ?>
										</option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">홈페이지</span>
									<span class="caption-helper">Homepage</span>
								</div>
								<!-- <div class="actions">
									<div class="btn-group btn-group-devided" data-toggle="buttons">
										<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
										<input type="radio" name="options" class="toggle" id="option1">New</label>
										<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
										<input type="radio" name="options" class="toggle" id="option2">Returning</label>
									</div>
								</div> -->
							</div>
							<div class="portlet-body">
								<p class="form-control-static">
									<input type="checkbox" name="homepage" value="y" <?php if($row['homepage']== 'y') { ?>checked=""<?php } ?> /> 사용
									<input type="checkbox" name="homepage_ess" value="y" <?php if($row['homepage_ess']== 'y') { ?>checked=""<?php } ?> /> 필수입력
								</p>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">주소</span>
									<span class="caption-helper">Address</span>
								</div>
								<!-- <div class="actions">
									<div class="btn-group btn-group-devided" data-toggle="buttons">
										<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
										<input type="radio" name="options" class="toggle" id="option1">New</label>
										<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
										<input type="radio" name="options" class="toggle" id="option2">Returning</label>
									</div>
								</div> -->
							</div>
							<div class="portlet-body">
								<p class="form-control-static">
									<input type="checkbox" name="address" value="y" <?php if($row['address']== 'y') { ?>checked=""<?php } ?> /> 사용
									<input type="checkbox" name="address_ess" value="y" <?php if($row['address_ess']== 'y') { ?>checked=""<?php } ?> /> 필수입력
								</p>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="clearfix visible-sm"></div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">전화번호</span>
									<span class="caption-helper">Telephone</span>
								</div>
								<!-- <div class="actions">
									<div class="btn-group btn-group-devided" data-toggle="buttons">
										<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
										<input type="radio" name="options" class="toggle" id="option1">New</label>
										<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
										<input type="radio" name="options" class="toggle" id="option2">Returning</label>
									</div>
								</div> -->
							</div>
							<div class="portlet-body">
								<p class="form-control-static">
									<input type="checkbox" name="tel" value="y" <?php if($row['tel']== 'y') { ?>checked=""<?php } ?> /> 사용
									<input type="checkbox" name="tel_ess" value="y" <?php if($row['tel_ess']== 'y') { ?>checked=""<?php } ?> /> 필수입력
								</p>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="clearfix visible-md visible-lg"></div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">팩스</span>
									<span class="caption-helper">Fax</span>
								</div>
							</div>
							<div class="portlet-body">
								<p class="form-control-static">
									<input type="checkbox" name="fax" value="y" <?php if($row['fax']== 'y') { ?>checked=""<?php } ?> /> 사용
									<input type="checkbox" name="fax_ess" value="y" <?php if($row['fax_ess']== 'y') { ?>checked=""<?php } ?> /> 필수입력
								</p>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">서명입력</span>
									<span class="caption-helper">Sign</span>
								</div>
							</div>
							<div class="portlet-body">
								<p class="form-control-static">
									<input type="checkbox" name="sign" value="y" <?php if($row['sign']== 'y') { ?>checked=""<?php } ?> /> 사용
									<input type="checkbox" name="sign_ess" value="y" <?php if($row['sign_ess']== 'y') { ?>checked=""<?php } ?> /> 필수입력
								</p>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="clearfix visible-sm"></div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">자기소개</span>
									<span class="caption-helper">Self Introduction</span>
								</div>
							</div>
							<div class="portlet-body">
								<p class="form-control-static">
									<input type="checkbox" name="self_intro" value="y" <?php if($row['self_intro']== 'y') { ?>checked=""<?php } ?> /> 사용
									<input type="checkbox" name="self_intro_ess" value="y" <?php if($row['self_intro_ess']== 'y') { ?>checked=""<?php } ?> /> 필수입력
								</p>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">회원가입시 권한</span>
									<span class="caption-helper">join the level</span>
								</div>
							</div>
							<div class="portlet-body">
								<div class="portlet-body">
								<select name="user_level" id="user_level" class="form-control">
									<?php for($i = 1; $i < 6; $i ++) { ?>
									<option value="<?php echo($i); ?>"<?php if($row['user_level'] == $i) { ?>selected=""<?php } ?>>
										<?php echo($i); ?>
									</option>
									<?php } ?>
								</select>
							</div>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="clearfix visible-md visible-lg"></div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">팩스</span>
									<span class="caption-helper">Fax</span>
								</div>
							</div>
							<div class="portlet-body">
								<p class="form-control-static">
									<input type="checkbox" name="fax" value="y" <?php if($row['fax']== 'y') { ?>checked=""<?php } ?> /> 사용
									<input type="checkbox" name="fax_ess" value="y" <?php if($row['fax_ess']== 'y') { ?>checked=""<?php } ?> /> 필수입력
								</p>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="clearfix visible-sm"></div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">회원아이콘 사용</span>
									<span class="caption-helper">Member icon use</span>
								</div>
							</div>
							<div class="portlet-body">
								<select name="image_use" id="image_use" class="form-control">
									<option value="0" <?php if($row['image_use'] == 0) { ?>selected=""<?php } ?>>미샤용</option>
									<option value="1" <?php if($row['image_use'] == 1) { ?>selected=""<?php } ?>>아이콘만 사용</option>
									<option value="2" <?php if($row['image_use'] == 2) { ?>selected=""<?php } ?>>아이콘 + 이름 사용</option>
								</select>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">회원아이콘 업로드권한</span>
									<span class="caption-helper">Member icon level</span>
								</div>
							</div>
							<div class="portlet-body">
								<select name="image_level" id="image_level" class="form-control">
								<?php for($i = 0; $i < 5; $i++) { ?>
									<option value="<?php echo($i); ?>" <?php if($row['image_level'] == $i) { ?>selected=""<?php } ?>><?php echo($i); ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">회원아이콘 최대 용량</span>
									<span class="caption-helper">Member icon size</span>
								</div>
							</div>
							<div class="portlet-body">
								<input type="text" name="image_size" class="form-control" value="<?php echo($row['image_size']); ?>" />
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="clearfix"></div>
					<div class="col-md-3 col-sm-4">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">회원아이콘 크기</span>
									<span class="caption-helper">Member icon size</span>
								</div>
							</div>
							<div class="portlet-body">
								<div class="input-group">
									<span class="input-group-addon">Width</span>
									<input type="text" name="image_width" class="form-control" value="<?php echo($row['image_width']); ?>">
									<span class="input-group-addon">Height</span>
									<input type="text" name="image_height" class="form-control" value="<?php echo($row['image_height']); ?>">
								</div>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="clearfix"></div>
					<div class="col-md-6 col-sm-12">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">아이디, 닉네임 금지단어</span>
									<span class="caption-helper">id & nicname ban</span>
								</div>
							</div>
							<div class="portlet-body">
								<textarea name="id_nic_ban" id="id_nic_ban" rows="20" class="form-control"><?php echo($row['id_nic_ban']); ?></textarea>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="col-md-6 col-sm-12">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">회원가입 약관</span>
									<span class="caption-helper">Member Join terms</span>
								</div>
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#tab_1_1" data-toggle="tab">
										terms </a>
									</li>
									<li>
										<a href="#tab_1_2" data-toggle="tab">
										preview </a>
									</li>
								</ul>
							</div>
							<div class="portlet-body">
								
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1_1">
										<textarea name="terms" id="terms" rows="20" class="form-control scroller" data-always-visible="1" data-rail-visible="0" style=""><?php echo(htmlspecialchars($row['terms'])); ?></textarea>
									</div>
									<div class="tab-pane" id="tab_1_2">
										<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
										<?php echo($row['terms']); ?>
										</div>
									</div>
								</div>
								<!--END TABS-->
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
					<div class="clearfix visible-md visible-lg"></div>


					<div class="col-md-6 col-sm-12">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-bar-chart font-green-sharp hide"></i>
									<span class="caption-subject font-green-sharp bold uppercase">개인정보 취급방침</span>
									<span class="caption-helper">Policy</span>
								</div>
							</div>
							<div class="portlet-body">
								<textarea name="policy" id="policy" rows="20" class="form-control"><?php echo($row['policy']); ?></textarea>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group text-center">
			
						<button class="btn btn-primary member-ok visible-md visible-lg">회원 설정 저장</button>
						<button class="btn btn-primary btn-block btn-lg member-ok visible-sm visible-xs">회원 설정 저장</button>
				
				</div>
			</div>
		</div>
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->
	<?php } ?>
<?php include_once('./footer_ui.php'); ?>