<?php
	/***** 데이터 조회 *****/
    // 글 목록 조회하기
    $bo_table = 'bo_table_'.$bo_name;
    $bo_comm  = $bo_table.'_comments';
    if ($search == FALSE) {
        $sql = "SELECT a.id, a.notice_yn, a.subject, a.writer, a.hit, a.reg_date,
                    unix_timestamp(reg_date) as timestamp,
                    (SELECT COUNT(b.id) FROM `%s` AS `b`
                     WHERE b.document_id=a.id) AS comment_count
                FROM `%s` AS `a`
                WHERE a.bbs_id = %d OR a.bbs_name = '%s'
                ORDER BY %s %s
                LIMIT %d, %d";
        $result = $db -> query($sql, array($bo_comm, $bo_table, $bbs_id, $bo_name, $sort, $order_by, $limit_start, $list_count));
    } else {
        $sql = "SELECT a.id, a.notice_yn, a.subject, a.writer, a.hit, a.reg_date,
                    unix_timestamp(reg_date) as timestamp,
                    (SELECT COUNT(b.id) FROM `%s` AS `b`
                     WHERE b.document_id=a.id) AS comment_count
                FROM `%s` AS `a`
                WHERE (bbs_id = %d OR bbs_name = '%s') AND (subject LIKE '%%%s%%' OR content LIKE '%%%s%%')
                ORDER BY %s %s
                LIMIT %d, %d";
        $result = $db -> query($sql, array($bo_comm, $bo_table, $bbs_id, $bo_name, $search, $search, $sort, $order_by, $limit_start, $list_count));
    }

    if (!$result) {
        redirect(FALSE, '글 목록을 읽는데 실패했습니다.
                        관리자에게 문의해 주세요.');
    }

    // 전체 글 목록 수
    $count = $db -> num_rows();
?>
<script>
    $(function() {
	    $('.html-doctype').hide();
	    $('.html-base').text('Doctype 선언 보기');
        $('.list-search-btn').click(function() {
            $('.myform').attr('action', 'index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&search=<?php echo($search); ?>');
            $('.myform').attr('method', 'get');
            $('.myform').submit();
        });
        
        $('.list-search-input').live('keypress', function (e) {
			if (e.which == 13) {
				//$('.myform').attr('action', '<?php echo($bbs_home); ?>/all_search.php?' + $(this).val());
				('.myform').attr('action', 'index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&search=<?php echo($search); ?>');
	            $('.myform').attr('method', 'get');
	            $('.myform').submit();
			}
		});

        $('.write-btn').click(function() {
            $('.myform').attr('action', 'write.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>');
            $('.myform').attr('method', 'post');
            $('.myform').submit();
        });
    });
</script>
<!-- 글 목록 시작 -->
<table class='table'>
    <thead>
        <tr>
            <th class='text-center' style='width: 100px'>번호</th>
            <th class='text-center'>제목</th>
            <th class='text-center' style='width: 120px'>작성자</th>
            <th class='text-center' style='width: 100px'>조회수</th>
            <th class='text-center' style='width: 120px'>작성일</th>
        </tr>
    </thead>
    <tbody>
<?php
    if ($count > 0) {

        // 하루 전 시간. 이 시간보다 작성일시가 크면 신규 글로 간주.
        $new_time = time() - (24 * 60 * 60);
?>
<?php
	/* 공지글이 있을 경우 표시해줌 Start */
	if(is_array($notice_subject)) {
		$count_list = count($notice_subject);
		for($i = 0; $i < $count_list; $i++) {
?>
		<tr>
			<td>
				<?php
					echo($notice_text[$i]);
				?>
			</td>
			<td>
				<a href='read.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&id=<?php echo($notice_id[$i]); ?>'>
				<?php
					echo($notice_subject[$i]);
				?>
				</a>
				<?php
					
/*
					if ($row['comment_count'] > 0) {
		                printf("&nbsp;<span class='label label-info'>%d</span>",
		                    $row['comment_count']);
		            }
*/
		            if ($notice_reg_timestamp[$i] > $new_time) {
		                echo("&nbsp;<span class='label label-warning'>new</span>");
		            }
				?>
			</td>
			<td class="text-center">
				<?php echo($notice_writer[$i]); ?>
			</td>
			<td class="text-center">
				<?php echo($notice_hit[$i]); ?>
			</td>
			<td class="text-center">
				<?php echo(substr($notice_reg_date[$i], 0, 10)); ?>
			</td>
		</tr>
<?php
		}
	}
	/* 공지글이 있을 경우 표시해줌 End */
?>
<?php
		$x = $total_count - ($list_count * ($page - 1));
		
        while ($row = $db -> fetch_array()) {
?>
		<?php if($row['notice_yn'] != 'y') { ?>
        <tr>
            <td class='text-center'>
                <?php //echo($row['id']); ?>
                <?php echo($x); ?>
            </td>
            <td><a href='read.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&id=<?php echo($row['id']); ?>'>
                    <?php
	                    /*
	                    if($adm_chk == true) {
							echo($row['subject']);
	                    } else {
		                    echo(htmlspecialchars($row['subject']));
	                    }
	                    */
	                    echo($row['subject']);
					?>
				</a>
<?php
            if ($row['comment_count'] > 0) {
                printf("&nbsp;<span class='label label-info'>%d</span>",
                    $row['comment_count']);
            }
            if ($row['timestamp'] > $new_time) {
                echo("&nbsp;<span class='label label-warning'>new</span>");
            }
?>
            </td>
            <td class='text-center'>
                <?php echo(htmlspecialchars($row['writer'])); ?></td>
            <td class='text-center'><?php echo($row['hit']); ?></td>
            <td class='text-center'><?php echo(substr($row['reg_date'], 0, 10)); ?></td>
        </tr>
<?php
	        $x--;
        	}
        }
    } else {
?>
        <tr>
            <td colspan='5' class='text-center' style='line-height: 100px;'>
                조회된 글이 없습니다.</td>
        </tr>
<?php
    }
?>
    </tbody>
</table>

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
		<?php if($session_user_level < $write_level) { ?>
		&nbsp;
		<?php } else { ?>
		<a href="write.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>" class='btn btn-primary'>글 쓰기</a>
		<?php } ?>
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
