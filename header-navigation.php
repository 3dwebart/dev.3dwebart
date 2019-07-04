	<!-- BEGIN HEADER -->
	<div class="header header-navibar"></div>
	<script id="headerNavigation" type="text/x-jquery-tmpl">
		<div class="container">
			<a class="site-logo" href="<?php echo($site_home);?>/index.php"><img src="<?php echo($site_home);?>/assets/frontend/layout/img/logos/maya-logo.png" alt="3d Web Artist"></a>

			<a href="#" class="mobi-toggler"><i class="fa fa-bars"></i></a>

			<!-- BEGIN NAVIGATION -->
			<div class="header-navigation pull-right font-transform-inherit">
				<ul>
					<!-- Menu 1 Start -->
					<li>
						<a href="<?php echo($site_home); ?>/page.about.php">
							${Navi1About}
						</a>
					</li>
					<li>
						<a href="<?php echo($site_home.'/page.portfolio.php'); ?>">
							${Navi2Portfolio}
						</a>
					</li>
					<!-- Menu 1 End -->
					<!-- Menu 2 Start -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="no-click">
							{{if (Navi3CollectionOfPoems.length > 13)}}
							${Navi3CollectionOfPoems.substring(0, 14) + '...'}
							
							<span class="comment">
							<span class="title">
							${Navi3CollectionOfPoems}
							</span>
							<br />
							<span class="arrow">
							<i class="fa fa-caret-down arrow"></i>
							</span>
							</span>
							
							{{else}}
							${Navi3CollectionOfPoems}
							{{/if}}
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo($site_home); ?>/bbs/index.php?bo_name=poetry1">
									${Navi31FirstBookOfPoems}
								</a>
							</li>
							<li>
								<a href="<?php echo($site_home); ?>/bbs/index.php?bo_name=poetry2">
									${Navi32SecondBookOfPoems}
								</a>
							</li>
							<li>
								<a href="<?php echo($site_home); ?>/bbs/index.php?bo_name=poetry3">
									${Navi33ThirdBookOfPoems}
								</a>
							</li>
							<li>
								<a href="<?php echo($site_home); ?>/bbs/index.php?bo_name=poetry4">
									${Navi34FourthBookOfPoems}
								</a>
							</li>
							<li>
								<a href="<?php echo($site_home); ?>/bbs/index.php?bo_name=poetry5">
									${Navi35FifthBookOfPoems}
								</a>
							</li>
							<li>
								<a href="<?php echo($site_home); ?>/bbs/index.php?bo_name=poetry6">
									${Navi36GoodPoemsCollection}
								</a>
							</li>
						</ul>
					</li>
					<!-- Menu 2 End -->
					<!-- Menu 3 Start -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="no-click">
							${Navi4Study}
						</a>
						<ul class="dropdown-menu">
							<li class="dropdown-submenu">
								<a href="#"  class="no-click">${Navi41WebDevelopment} <i class="fa fa-angle-right"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li class="dropdown-submenu">
										<a href="#"  class="no-click">${Navi411HtmlCSS} <i class="fa fa-angle-right"></i></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=html_tag">${Navi4111HtmlTag}</a></li>
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=html_entity_code">${Navi4112HtmlEneieyCode}</a></li>
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=html_css">${Navi4113HtmlXhtml}</a></li>

										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#" class="no-click">${Navi412Javasctipt} <i class="fa fa-angle-right"></i></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=javascript">${Navi4121Javasctipt}</a></li>
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=angularjs">${Navi4123AngularJS}</a></li>
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=nodejs">${Navi4123NodeJS}</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#" class="no-click">${Navi413MySQL} <i class="fa fa-angle-right"></i></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=mysql">${Navi4131MySQL}</a></li>
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=linux">${Navi4132Linux}</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="no-click">
											${Navi414PHP}
											<i class="fa fa-angle-right"></i>
										</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=php_study">${Navi4141PHPStudy}</a></li>
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=php_gnuboard">${Navi4142GnuBoard}</a></li>
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=php_zeroboard_xe">${Navi4143ZeroBoardXE} XE</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="no-click">
											${Navi415ASPdotNET}
											<i class="fa fa-angle-right"></i>
										</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=asp_aspnet">${Navi4151ASPdotNETStudy}</a></li>
											<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=asp_artiboard">${Navi4152ArtiBoard}</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="<?php echo($bbs_home); ?>/index.php?bo_name=jsp">
											${Navi415JSP}
										</a>
									</li>
								</ul>
							</li>
							<!-- Menu 4 Start -->
							<li class="dropdown-submenu">
								<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="no-click">
									${Navi42MAYA}
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=3d_maya_tutorial">${Navi421MAYATutorial}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=3d_maya_tip">${Navi422MAYATIP}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=3d_maya_qna">${Navi423MAYAQNA}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=3d_maya_portfolio">${Navi424MAYAPortfolio}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=3d_maya_manual">${Navi424MAYAManual}</a></li>
								</ul>
							</li>
							<!-- Menu 4 End -->
							<!-- Menu 5 Start -->
							<li class="dropdown-submenu">
								<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="no-click">
									${Navi43Photoshop}
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=ps_tutorial">${Navi431PSTutorial}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=ps_tip">${Navi432PhotoshopTIP}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=ps_qna">${Navi433PhotoshopQNA}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=ps_portfolio">${Navi434PhotoshopPortfolio}</a></li>
								</ul>
							</li>
							<!-- Menu 5 End -->
							<!-- Menu 6 Start -->
							<li class="dropdown-submenu">
								<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="no-click">
									${Navi44Illust}
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=ai_tutorial">${Navi441IllustTutorial}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=ai_tip">${Navi432IllustTIP}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=ai_qna">${Navi433IllustQNA}</a></li>
									<li><a href="<?php echo($bbs_home); ?>/index.php?bo_name=ai_portfolio">${Navi434IllustPortfolio}</a></li>
								</ul>
							</li>
							<!-- Menu 6 End -->
						</ul>
					</li>
					<!-- Menu 3 End -->
					<!-- Menu 7 Start -->
					<li><a href="<?php echo($site_home); ?>/shop-index.html">${Navi5Archives}</a></li>
					<!-- Menu 7 End -->
					<!-- Menu 8 Start -->
					<li><a href="<?php echo($site_home); ?>/onepage-index.html">${Navi6NoticeBoard}</a></li>
					<!-- Menu 8 End -->
					<!-- Menu 9 Start -->
					<li><a href="<?php echo($site_home); ?>/http://keenthemes.com/preview/metronic/theme/templates/admin" target="_blank">${Navi7InformationUse}</a></li>
					<!-- Menu 9 End -->
					<!-- Menu 10 Start -->
					<li class="dropdown dropdown-megamenu">
						<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="no-click">
							${Navi8SiteMap}
						</a>
						<ul class="dropdown-menu pull-right site-map">
							<li>
								<div class="header-navigation-content">
									<div class="row">
										<div class="col-md-4 header-navigation-col">
											<h4>
												<a href="<?php echo($site_home); ?>/page.about.php">
													${Navi1About}
												</a>
											</h4>
											<h4>${Navi2Portfolio}</h4>
											<ul>
												<li><a href="<?php echo($site_home); ?>/index.html">${Navi21WorkOf3D}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">${Navi21WorkOfWebsite}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">${Navi21WorkOfArt}</a></li>
											</ul>
										</div>
										<div class="col-md-4 header-navigation-col">
											<h4>${Navi3CollectionOfPoems}</h4>
											<ul>
												<li><a href="<?php echo($site_home); ?>/index.html">${Navi31FirstBookOfPoems}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">${Navi32SecondBookOfPoems}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">${Navi33ThirdBookOfPoems}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">${Navi34FourthBookOfPoems}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">나의 ${Navi35FifthBookOfPoems}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">${Navi36GoodPoemsCollection}</a></li>
											</ul>
										</div>
										<div class="col-md-4 header-navigation-col">
											<h4>${Navi4Study}</h4>
											<ul>
												<li><a href="#" class="no-click">${Navi41WebDevelopment}</a></li>
												<li><a href="#" class="no-click">&nbsp;&nbsp;&nbsp;${Navi411HtmlCSS}</a></li>
												<li><a href="<?php echo($site_home); ?>/bbs/index.php?bbs_id=10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${Navi4111HtmlTag}</a></li>
												<li><a href="<?php echo($site_home); ?>/page.html.entity.code.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${Navi4112HtmlEneieyCode}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${Navi4113HtmlXhtml}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${Navi4114Html5}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${Navi4115CSS12}</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${Navi4116CSS3}</a></li>
											</ul>
											<h4>Clearance</h4>
											<ul>
												<li><a href="<?php echo($site_home); ?>/index.html">Jackets</a></li>
												<li><a href="<?php echo($site_home); ?>/index.html">Bottoms</a></li>
											</ul>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<!-- Menu 10 End -->
					<!-- Menu 11 - Search Start -->
					<!-- BEGIN TOP SEARCH -->
					<li class="menu-search">
						<span class="sep"></span>
						<i class="fa fa-search search-btn"></i>
						<div class="search-box">

							<div class="input-group">
								<input type="text" placeholder="Search" name="all_search" class="form-control all-search-input" value="<?php if(!empty($all_search)){echo($all_search);} ?>">
								<span class="input-group-btn">
									<button class="btn btn-primary all-search-btn" type="submit">Search</button>
								</span>
							</div>

						</div>
					</li>
					<!-- END TOP SEARCH -->
					<!-- Menu 11 - Search End -->
				</ul>
			</div>
			<!-- END NAVIGATION -->
		</div>
	</script>
	<!-- Header END -->
