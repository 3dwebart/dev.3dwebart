<?php
	$cate_select = get('cate', 'package');
	$cate_1 = (int)get('cate_1');
	$cate_2 = (int)get('cate_2');
	$cate_3 = (int)get('cate_3');
	$cate_4 = (int)get('cate_4');
	$cate_5 = (int)get('cate_5');
	$cate_6 = (int)get('cate_6');
	
	$cate_num = array();
	$cate_num[0] = $cate_1;
	$cate_num[1] = $cate_2;
	$cate_num[2] = $cate_3;
	$cate_num[3] = $cate_4;
	$cate_num[4] = $cate_5;
	$cate_num[5] = $cate_6;

	if(empty($cate_select)) {
		$all_cate = true;
	} else {
		$all_cate = false;
	}
	// if($cate_1 != 1 && $cate_2 != 1 && $cate_3 != 1 && $cate_4 != 1 && $cate_5 != 1 && $cate_6 != 1) {
	// 	$all_cate = true;
	// } else {
	// 	$all_cate = false;
	// }

	$brick = 'web_app';

	$brick = '.'.$brick;

	$bo_table = 'bo_table_'.$bo_name;
	$bo_file  = $bo_table.'_files';
	$bo_comm  = $bo_table.'_comments';
	
	// if($cate_1 == 1) {
	// 	$brick = 'web_app';
	// } else if($cate_2 == 1) {
	// 	$brick = 'print';
	// } else if($cate_3 == 1) {
	// 	$brick = 'package';
	// } else if($cate_4 == 1) {
	// 	$brick = 'ci_bi_color';
	// } else if($cate_5 == 1) {
	// 	$brick = 'photo';
	// } else if($cate_6 == 1) {
	// 	$brick = 'interior';
	// } else {
	// 	$brick = '';
	// }

	/***** 데이터 조회 *****/
	// 글 목록 조회하기
	if ($search == FALSE) {
		$sql = "SELECT a.id, a.cate, a.notice_yn, a.subject, a.writer, a.hit, a.reg_date, f.dir, f.file_name, 
					unix_timestamp(a.reg_date) as timestamp,
					(SELECT COUNT(b.id) FROM `%s` AS `b`
					 WHERE b.document_id=a.id) AS comment_count
				FROM `%s` AS `a`, `%s` AS `f`
				WHERE (a.bbs_id = %d OR a.bbs_name = '%s') AND (a.id = f.document_id) AND f.file_kind = 'thumb'
				GROUP BY a.id
				ORDER BY %s %s
				LIMIT %d, %d";
		$result = $db -> query($sql, array($bo_comm, $bo_table, $bo_file, $bbs_id, $bo_name, $sort, $order_by, $limit_start, $list_count));
	} else {
		$sql = "SELECT a.id, a.cate, a.notice_yn, a.subject, a.writer, a.hit, a.reg_date, f.dir, f.file_name, 
					unix_timestamp(reg_date) as timestamp,
					(SELECT COUNT(b.id) FROM `%s` AS `b`
					 WHERE b.document_id=a.id) AS comment_count
				FROM `%s` AS `a`, `%s` AS `f`
				WHERE (a.bbs_id = %d OR a.bbs_name = '%s') AND (a.id = f.document_id) AND f.file_kind = 'thumb' AND (a.subject LIKE '%%%s%%' OR a.content LIKE '%%%s%%')
				GROUP BY a.id
				ORDER BY %s %s
				LIMIT %d, %d";
		$result = $db -> query($sql, array($bo_comm, $bo_table, $bo_file, $bbs_id, $bo_name, $search, $search,
									   $sort, $order_by, $limit_start, $list_count));
	}

	if (!$result) {
		redirect(FALSE, '글 목록을 읽는데 실패했습니다.
						관리자에게 문의해 주세요.');
	}

	// 전체 글 목록 수
	$count = $db -> num_rows();
?>
<link rel="stylesheet" href="<?php echo($bbs_skin_path); ?>/css/style.css">
<!-- <link rel="stylesheet" href="<?php echo($bbs_skin_path); ?>/css/bg.css"> -->
<style>
#filters {
	height: auto !important;
}
.remove-item {
	    pointer-events: none;
    z-index: 1;
}
</style>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo($bbs_skin_path); ?>/js/ie10-viewport-bug-workaround.js"></script>

<!-- masonry -->
<script src="<?php echo($bbs_skin_path); ?>/js/plugins/freewall/freewall.js"></script> 
<!-- 임시 탬플릿 -->


<!-- Start gallery -->

					<!-- subheader -->
					<section id="subheader" data-speed="8" data-type="background">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h1>Projects</h1>
									<ul class="crumb">
										<li><a href="index.html">Home</a></li>
										<li class="sep">/</li>
										<li>Projects</li>
									</ul>
								</div>
							</div>
						</div>
					</section>
					<div id="content" class="nopadding">
						<div class="container">

							<div class="spacer-single"></div>

							<!-- portfolio filter begin -->
							<div class="row">
								<div class="col-md-12 text-center">
									<ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
<?php
	if(is_array($cate_navi)) {
		$cate_ctn = count($cate_navi);
?>
										<!-- All cate -->
										<li><a href="#" data-filter="*" <?php if($all_cate == true) { ?>class="selected"<?php } ?>>All Projects</a></li>
<?php
		for($i = 0; $i < $cate_ctn; $i++) {
			$cate_navi[$i] = str_replace(' ', '', $cate_navi[$i]);
			$cate_number = $i + 1;
?>
										<li><a href="#" data-filter="<?php echo('.'.$cate_navi[$i]); ?>" <?php if($cate_num[$i] == 1) { ?>class="selected"<?php } ?>><?php echo($cate_name[$i]); ?></a></li>
<?php
		}
?>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
							<!-- portfolio filter close -->
						</div>
<?php
	}
?>
<!-- 글 목록 시작 -->
<!-- <section class="gallery-wrapper">   -->         
	<!-- Start gallery container -->
	<!-- <div class="gallery-container"> -->
				
					<!-- subheader close -->
<?php
	//if ($db -> num_rows() > 0) {
?>


						<div id="gallery" class="gallery full-gallery de-gallery pf_full_width pf_3_cols wow fadeInUp" data-wow-delay=".3s">
<?php
	while($row = $db -> fetch_assoc()) {
		$cate_class = str_replace(',', ' ', $row['cate']);
?>
							<!-- gallery item -->
							<div class="item <?php echo($cate_class); ?>">
								<div class="picframe">
									<a class="simple-ajax-popup-align-top" href="project-details-1.html" data-id="<?php echo($row['id']); ?>">
										<span class="overlay">
											<span class="pf_text">
												<span class="project-name"><?php echo($row['subject']); ?></span>
											</span>
										</span>
									</a>
									<img src="<?php echo($site_home.$row['dir'].$row['file_name']); ?>" alt="" />
								</div>
							</div>
<?php
	}

	// } else {
?>
	<!-- <div class="no-data">
		게시물이 없습니다.
	</div> -->
<?php
	//}
?>
					</div>
<!--     </div>
</section> -->
<div class="clearfix"></div>
<section id="call-to-action" class="call-to-action bg-color dark text-center list_search_btns" data-speed="5" data-type="background" aria-label="call-to-action">
<!--
	<div class='pull-left'>
		<input type="hidden" name="bbs_id" value="<?php echo($bbs_id); ?>" />
		<input type="hidden" name="bo_name" value="<?php echo($bo_name); ?>" />
		<div class="input-group" style="width: 200px;">
			<input type="text" name='search' class="form-control list-search-input" value="<?php echo($search); ?>" placeholder="검색어" />
			<span class="input-group-btn">
				<button class="btn btn-line-black list-search-btn" type="submit">
					<i class='fa fa-search'></i>
				</button>
			</span>
		</div>
	</div>
-->
	<div class='pull-right'>
		<!-- 회원의 권한이 되는지 검사 보류함 -->
		<?php // if($session_user_level > $write_level) { ?>
		<!-- 관리자 권한이 되는지 검사 -->
		<?php if($session_is_admin == 'true') { ?>
		<a href="write.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>" class='btn btn-line-black btn-big'>글 쓰기</a>
		<?php } else { ?>
		&nbsp;
		<?php } ?>
	</div>
	<div class="clearfix"></div>
	<!-- 페이지 번호 -->
	<nav class='text-center'>
		<ul class="pagination">
			<!-- 이전 그룹 -->
	<?php if ($prev_page > 0) { ?>
			<li><a href="index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&page=<?php echo($prev_page); ?>&search=<?php echo($search); ?>">
					<span aria-hidden="true">&laquo;</span></a></li>
	<?php } else { ?>
			<li class='disabled'><a href="#" class="btn btn-line-black">
					<span aria-hidden="true">&laquo;</span></a></li>
	<?php } ?>

			<!-- 페이지 번호 -->
	<?php
		for ($i = $start_page; $i <= $end_page; $i++) {
			if ($i == $page) {
	?>
			<li class='active'><a href="#" class="btn btn-line-black"><?php echo($i); ?></a></li>
	<?php
			} else {
	?>
			<li><a href="index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&page=<?php echo($i); ?>&search=<?php echo($search); ?>" class="btn btn-line-black"><?php echo($i); ?></a></li>
	<?php
			}
		}
	?>
			<!-- 다음 그룹 -->
	<?php if ($next_page > 0) { ?>
			<li><a href="index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&page=<?php echo($next_page); ?>&search=<?php echo($search); ?>" class="btn btn-line-black">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
	<?php } else { ?>
			<li class='disabled'>
				<a href="#" class="btn btn-line-black">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
	<?php } ?>
		</ul>
	</nav>

</section>
<script type="text/javascript">
(function($) {
	var brick = '<?php echo($brick); ?>';
	console.log('b = ' + brick);
	var wall = new Freewall("#filters");
	wall.filter('<?php echo($brick); ?>');
	wall.reset({
		//selector: brick,
		selector: '<?php echo($brick); ?>',
		
		animate: true,
		gutterX: 0,
		gutterY: 0,
		cellW: 250,
		cellH: 'auto',
		fixSize: 0,
		onResize: function() {
			wall.refresh();
		}
	});

	<?php if (!empty($cate_select)) { ?>
	var this_data_filter, item_class;
	// 버튼 부분
	jQuery('#filters li').each(function() {
		this_data_filter = jQuery(this).children('a').data('filter');
		if(this_data_filter == '.' + '<?php echo($cate_select) ?>') {
			jQuery(this).children('a').addClass('selected');
		} else {
			jQuery(this).removeClass('selected');
		}
	});

	// 아이템 부분
	jQuery('#gallery .item').each(function() {
		item_class = jQuery(this).hasClass('<?php echo($cate_select) ?>');
		jQuery(this).addClass('isotope-hidden');
		//alert(111);
		if(item_class == true) {
			alert(jQuery(this).index());
			jQuery(this).css({
				transform: 'translate3d(0px, 0px, 0px) scale3d(1, 1, 1)',
				opacity: 1
			});
			jQuery(this).removeClass('isotope-hidden');
		} else {
			alert('안보여야됨 = ' + jQuery(this).index());
			alert(jQuery(this).attr('class'));
			jQuery(this).css({
				transform: 'translate3d(0px, 0px, 0px) scale3d(0.001, 0.001, 1)',
				opacity: 0
			});

			jQuery(this).addClass('remove-item');
		}
	});
	<?php } ?>

	jQuery(".filter-label").click(function() {
		jQuery(this).parent().siblings().removeClass("active");
		jQuery(this).parent().siblings().find('.filter-label').removeClass("active");
		jQuery(this).parent().addClass('active');
		jQuery(this).addClass('active');
		var filter = $(this).addClass('active').data('filter');
		if (filter) {
			wall.filter(filter);
		} else {
			wall.unFilter();
		}
	});

	wall.fitWidth();

	jQuery(document).on('keydown', '.list-search-input', function (e) {
		if (e.which == 13) {
			//$('.myform').attr('action', '<?php echo($bbs_home); ?>/all_search.php?' + $(this).val());
			jQuery('.myform').attr('action', 'index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&search=<?php echo($search); ?>');
			jQuery('.myform').attr('method', 'get');
			jQuery('.myform').submit();
		}
	});

	jQuery('.write-btn').click(function() {
		jQuery('.myform').attr('action', 'write.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>');
		jQuery('.myform').attr('method', 'post');
		jQuery('.myform').submit();
	});
})(jQuery);
</script>
