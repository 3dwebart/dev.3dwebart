	<?php
		$nav1_s1 = ($app_file_cut == 'index');
		$nav1_s2 = ($app_file_cut == 'adm_admin_list');
		$nav1_s3 = ($app_file_cut == 'adm_admin_add');
		$nav1_s4 = ($app_file_cut == 'adm_admin_edit');
		
		$nav1 = ($nav1_s1 || $nav1_s2 || $nav1_s3 || $nav1_s4);

		$nav2_s1 = ($app_file_cut == 'adm_member_list');
		$nav2_s2 = ($app_file_cut == 'adm_member_add');
		$nav2_s3 = ($app_file_cut == 'adm_member_edit');

		$nav2 = ($nav2_s1 || $nav2_s2 || $nav2_s3);

		$nav3_s1 = ($app_file_cut == 'adm_group_list');
		$nav3_s2 = ($app_file_cut == 'adm_group_add');
		$nav3_s3 = ($app_file_cut == 'adm_group_edit');
		$nav3_s4 = ($app_file_cut == 'adm_board_list');
		$nav3_s5 = ($app_file_cut == 'adm_board_add');
		$nav3_s6 = ($app_file_cut == 'adm_board_edit');

		$nav3 = ($nav3_s1 || $nav3_s2 || $nav3_s3 || $nav3_s4 || $nav3_s5 || $nav3_s6);

		$nav4_s1 = ($app_file_cut == 'adm_popup_list');
		$nav4_s2 = ($app_file_cut == 'adm_popup_add');
		$nav4_s3 = ($app_file_cut == 'adm_popup_edit');

		$nav4 = ($nav4_s1 || $nav4_s2 || $nav4_s3);		
	?>
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="sidebar-toggler-wrapper">
						<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
						<div class="sidebar-toggler">
						</div>
						<!-- END SIDEBAR TOGGLER BUTTON -->
					</li>
					<li class="sidebar-search-wrapper">
						<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
						<div class="sidebar-search">
							<a href="javascript:;" class="remove">
							<i class="icon-close"></i>
							</a>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
								<button type="submit" class="btn submit Side-Menu-Search-Btn"><i class="icon-magnifier"></i></button>
								</span>
							</div>
						</div>
						<!-- END RESPONSIVE QUICK SEARCH FORM -->
					</li>
					<li class="heading">
						<h3 class="uppercase">기본설정</h3>
					</li>
					<li class="start <?php if ($nav1) { echo('active open'); } ?>">
						<a href="javascript:;">
						<i class="icon-home"></i>
						<span class="title">기본설정</span>
						<span class="selected"></span>
						<span class="arrow open"></span>
						</a>
						<ul class="sub-menu">
							<li class="<?php if ($nav1_s2 || $nav1_s3 || $nav1_s4) { echo('active open'); } ?>">
								<a href="adm_admin_list.php">
								<i class="icon-bar-chart"></i>
								관리자 설정</a>
							</li>
							<li class="<?php if ($nav1_s1) { echo('active'); } ?>">
								<a href="index.php">
								<i class="icon-bar-chart"></i>
								게시판 기본 설정</a>
							</li>
						</ul>
					</li>
					<li class="heading">
						<h3 class="uppercase">회원관리</h3>
					</li>
					<li class="<?php if ($nav2) { echo('active open'); } ?>">
						<a href="javascript:;">
						<i class="icon-users"></i>
						<span class="title">회원관리</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li class="<?php if ($nav2) { echo('active'); } ?>">
								<a href="adm_member_list.php">
								<i class="fa fa-user"></i>
								회원 관리</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-warning"></i>
								블랙리스트</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-paper-plane-o"></i>
								회원메일발송
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-mobile"></i>
								회원 일괄 문자 발송
								</a>
							</li>
						</ul>
					</li>
					<!-- END ANGULARJS LINK -->
					<li class="heading">
						<h3 class="uppercase">게시판 관리</h3>
					</li>
					<li class="<?php if ($nav3) { echo('active'); } ?>">
						<a href="javascript:;">
						<i class="icon-settings"></i>
						<span class="title">게시판 관리</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
						<?php
							$sql = "SELECT COUNT(id) FROM bbs_group";
							$result = $db -> query($sql);

							$group_count = $db -> fetch_row();
						?>
							<li class="<?php if ($nav3_s1 || $nav3_s2 || $nav3_s3) { echo('active'); } ?>">
								<a href="adm_group_list.php">
								<span class="badge badge badge-danger">
									<?php echo($group_count[0]); ?>
								</span>
								게시판 그룹 관리</a>
							</li>
						<?php
							$sql = "SELECT COUNT(id) FROM bbs_config";
							$result = $db -> query($sql);

							$group_count = $db -> fetch_row();
						?>
							<li class="<?php if ($nav3_s4 || $nav3_s5 || $nav3_s6) { echo('active'); } ?>">
								<a href="adm_board_list.php">
								<span class="badge badge badge-warning">
									<?php echo($group_count[0]); ?>
								</span>
								게시판 관리</a>
							</li>
						</ul>
					</li>
					<li class="heading">
						<h3 class="uppercase">팝업관리</h3>
					</li>
					<li class="<?php if ($nav4) { echo('active'); } ?>">
						<a href="javascript:;">
						<i class="icon-user"></i>
						<span class="title">팝업관리</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="adm_popup_list.php">
								팝업관리</a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->