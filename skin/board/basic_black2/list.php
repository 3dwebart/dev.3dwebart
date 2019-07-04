<?php
	/***** 데이터 조회 *****/
    // 글 목록 조회하기
    $bo_table = 'bo_table_'.$bo_name;
    $bo_file  = $bo_table.'_files';
    $bo_comm  = $bo_table.'_comments';
    if ($search == FALSE) {
        $sql = "SELECT a.id, a.cate, a.notice_yn, a.subject, a.writer, a.hit, a.reg_date, f.dir, f.file_name, 
                    unix_timestamp(a.reg_date) as timestamp,
                    (SELECT COUNT(b.id) FROM `%s` AS `b`
                     WHERE b.document_id=a.id AND f.file_kind = 'thumb') AS comment_count
                FROM `%s` AS `a`, `%s` AS `f`
                WHERE (a.bbs_id = %d OR a.bbs_name = '%s') AND (a.id = f.document_id) AND (f.file_kind = 'thumb')
                ORDER BY %s %s
                LIMIT %d, %d";
        $result = $db -> query($sql, array($bo_comm, $bo_table, $bo_file, $bbs_id, $bo_name, $sort, $order_by, $limit_start, $list_count));
    } else {
        $sql = "SELECT a.id, a.cate, a.notice_yn, a.subject, a.writer, a.hit, a.reg_date, f.dir, f.file_name, 
                    unix_timestamp(reg_date) as timestamp,
                    (SELECT COUNT(b.id) FROM `%s` AS `b`
                     WHERE b.document_id=a.id AND f.file_kind = 'thumb') AS comment_count
                FROM `%s` AS `a`, `%s` AS `f`
                WHERE (a.bbs_id = %d OR a.bbs_name = '%s') AND (a.id = f.document_id) AND (f.file_kind = 'thumb') AND (a.subject LIKE '%%%s%%' OR a.content LIKE '%%%s%%')
                ORDER BY %s %s
                LIMIT %d, %d";
        $result = $db -> query($sql, array($bo_comm, $bo_table, $bo_file, $bbs_id, $bo_name, $search, $search, $sort, $order_by, $limit_start, $list_count));
    }

    if (!$result) {
        redirect(FALSE, '글 목록을 읽는데 실패했습니다.
                        관리자에게 문의해 주세요.');
    }

    // 전체 글 목록 수
    $count = $db -> num_rows();
?>
<link rel="stylesheet" href="<?php echo($bbs_skin_path); ?>/style.css">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo($bbs_skin_path); ?>/js/ie10-viewport-bug-workaround.js"></script>

<!-- masonry -->
<script src="<?php echo($bbs_skin_path); ?>/js/plugins/freewall/freewall.js"></script> 
<!-- 임시 탬플릿 -->
<div class="clearfix"></div>

<!-- Start gallery -->
<div class="detail-contents col-xs-12">
<ul class="cate-nav">
<?php
    if(is_array($cate_navi)) {
        $cate_ctn = count($cate_navi);
?>
     <li class="active"><span class="filter-label">ALL</span></li>
<?php
        for($i = 0; $i < $cate_ctn; $i++) {
            $cate_navi[$i] = str_replace(' ', '', $cate_navi[$i])
?>
    <li><span class="filter-label" data-filter="<?php echo('.'.$cate_navi[$i]); ?>"><?php echo($cate_name[$i]); ?></span></li>
<?php
        }
?>
</ul>
<?php
    }
    if ($db -> num_rows() > 0) {
?>
<!-- 글 목록 시작 -->
<!-- <section class="gallery-wrapper">   -->         
    <!-- Start gallery container -->
    <!-- <div class="gallery-container"> -->
        <div id="freewall" class="free-wall">
<?php
    while($row = $db -> fetch_assoc()) {
        $cate_class = str_replace(',', ' ', $row['cate'])
?>
    <div class="brick img-wrapper <?php echo($cate_class); ?>"><a href="read.php?bo_name=<?php echo($bo_name.'&id='.$row['id']); ?>"><img src="<?php echo($site_home.$row['dir'].$row['file_name']); ?>" class="img-maxwidth" /></a></div>
<?php
    }
?>
        </div>
<!--     </div>
</section> -->
<?php
    } else {
?>
        <div class="no-data">
            자료가 없습니다.
        </div>
<?php
    }
?>
<div class="clearfix"></div>

<div class="list_search_btns">
<!-- 검색폼 + 글 쓰기 버튼 -->
    <div class='clearfix'>
        <div class='pull-left'>
            <input type="hidden" name="bbs_id" value="<?php echo($bbs_id); ?>" />
            <input type="hidden" name="bo_name" value="<?php echo($bo_name); ?>" />
            <div class="input-group" style="width: 200px;">
                <input type="text" name='search' class="form-control list-search-input" value="<?php echo($search); ?>" />
                <span class="input-group-btn">
                    <button class="btn btn-success list-search-btn" type="submit">
                        <i class='glyphicon glyphicon-search'></i>
                    </button>
                </span>
            </div>
        </div>
        <div class='pull-right'>
    		<?php if($session_user_level > $write_level) { ?>
    		&nbsp;
    		<?php } else { ?>
    		<a href="write.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>" class='btn btn-primary'>글 쓰기</a>
    		<?php } ?>
        </div>
    </div>
</div>
<!-- 페이지 번호 -->
<nav class='text-center'>
    <ul class="pagination">
        <!-- 이전 그룹 -->
<?php if ($prev_page > 0) { ?>
        <li><a href="index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&page=<?php echo($prev_page); ?>&search=<?php echo($search); ?>">
                <span aria-hidden="true">&laquo;</span></a></li>
<?php } else { ?>
        <li class='disabled'><a href="#">
                <span aria-hidden="true">&laquo;</span></a></li>
<?php } ?>

        <!-- 페이지 번호 -->
<?php
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $page) {
?>
        <li class='active'><a href="#"><?php echo($i); ?></a></li>
<?php
        } else {
?>
        <li><a href="index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&page=<?php echo($i); ?>&search=<?php echo($search); ?>"><?php echo($i); ?></a></li>
<?php
        }
    }
?>
        <!-- 다음 그룹 -->
<?php if ($next_page > 0) { ?>
        <li><a href="index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&page=<?php echo($next_page); ?>&search=<?php echo($search); ?>">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
<?php } else { ?>
        <li class='disabled'>
        	<a href="#">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
<?php } ?>
    </ul>
</nav>
</div>
<script type="text/javascript">
(function($) {
    var wall = new Freewall("#freewall");
    wall.reset({
        selector: '.brick',
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
    // wall.filter(".size23");
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
