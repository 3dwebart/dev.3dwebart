<link rel="stylesheet" href="<?php echo($bbs_skin_path); ?>/style.css" title="board skin" type="text/css" media="screen" charset="utf-8">
<div class="clearfix"></div>
<div class="detail-contents col-xs-12">

<div class="alert alert-info view-top-exxplanation" role="alert">
	<h3 style='margin: 0'>
		<?php if($rows['html'] == 'y') { ?>
		<h3><?php echo(keywordHightlight($all_search, "highlight", $rows['subject'])); ?></h3>
		<small>
			<?php echo($rows['writer']); ?>
			<a href='mailto:<?=$rows['email']?>'>
				<i class='glyphicon glyphicon-envelope'></i></a> /
			<?=$rows['reg_date']?> /
			hit: <?=$rows['hit']?>
		</small>
		<?php } else { ?>
		<?php echo(htmlspecialchars(keywordHightlight($all_search, "highlight", $rows['subject']))); ?>
		<small>
			<?php echo(htmlspecialchars($rows['writer'])); ?>
			<a href='mailto:<?=$rows['email']?>'>
				<i class='glyphicon glyphicon-envelope'></i></a> /
			<?=$rows['reg_date']?> /
			hit: <?=$rows['hit']?>
		</small>
		<?php } ?>
	</h3>
</div>

	<?//=nl2br(htmlspecialchars($rows['content']))?>

<?
	if ($db -> num_rows() < 1) {
		echo('');
	} else {
?>
<!-- 첨부파일 정보 출력하기 -->
<ol class="breadcrumb">
<?
	 if ($files) {
		while ($file_info = $db -> fetch_array()) {
?>
	<li><a href="<?=$file_info['file_path']?>">
			<?=$file_info['origin_name']?></a></li>
<?
		}
	}
?>
</ol>
<?
	}
?>

<!-- 내용 -->
<section style='padding: 0 10px 20px 10px'>
	<? if ($rows['movie_id']) { ?>
	<? if ($rows['movie_size'] == 'wide') { ?>
	
	<div class="embed-responsive embed-responsive-16by9">
	
	<iframe  class="embed-responsive-item" src="//www.youtube.com/embed/<?=$rows['movie_id']?>?feature=player_detailpage"></iframe>
	
	</div>
	<? } ?>
	<? if ($rows['movie_size'] == 'vga') { ?>
	
	<div class="embed-responsive embed-responsive-4by3">
	
	<iframe  class="embed-responsive-item" src="//www.youtube.com/embed/<?=$rows['movie_id']?>?feature=player_detailpage"></iframe>
	
	</div>
	<? } ?>
	<? } ?>
	<!-- 16:9 aspect ratio -->
	<!--
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="..."></iframe>
</div>
-->

<!-- 4:3 aspect ratio -->
<!--
<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="..."></iframe>
</div>
-->
<?
	$file_path = array();
	// 첨부파일이 있다면?
	if ($files) {
		$db -> move_first();
		$i = 0;
		while ($file_info = $db -> fetch_array()) {
			$file_path[$i] = $file_info['file_path'];
			$i++;
		}
?>
<h1><?php echo($file_path[0]); ?></h1>
<h1><?php echo($rows['img_pos']); ?></h1>
<h1><?php echo('text-'.$rows['img_align']); ?></h1>
<ol class="list-unstyled" style="margin: 10px auto">
<?
		if($rows['img_pos'] == 't') {
			//if (strpos($file_info['file_type'], 'image') > -1) {
?>
	<li>
		<p class="<?php echo('text-'.$rows['img_align']); ?>">
			<a href="<?php echo($file_info['file_path']); ?>" data-lightbox="roadtrip">
				<img src="<?php echo($file_path[0]); ?>"
					class="img-responsive img-thumbnail" />
			</a>
		</p>
	</li>
<?
			//}
		}
?>
</ol>
	<?php
		echo(nl2br(keywordHightlight($all_search, "highlight", $rows['content'])));
/*
		if($rows['html'] == 'y') {
			echo(nl2br(keywordHightlight($all_search, "highlight", $rows['content'])));
		} else {
			echo(nl2br(htmlspecialchars(keywordHightlight($all_search, "highlight", $rows['content']))));
			//echo(nl2br($rows['content']));
		}
*/
		
		/*
		if($adm_chk == true) {
			echo(nl2br($rows['content']));
		} else {
			echo(nl2br(htmlspecialchars($rows['content'])));
			//echo(nl2br($rows['content']));
		}
		*/
	?>


<ol class="list-unstyled" style="margin: 10px auto">
<?
		if($rows['img_pos'] == 'b') {
			//if (strpos($file_info['file_type'], 'image') > -1) {
?>

	<li>
		<p class="<?php echo('text-'.$rows['img_align']); ?>">
			<a href="<?php echo($file_info['file_path']); ?>" data-lightbox="roadtrip">
				<img src="<?php echo($file_path[0]); ?>"
					class="img-responsive img-thumbnail" />
			</a>
			
		</p>
	</li>
<?
			//}
		}
?>
</ol>
<?
	}
?>
<ol class="list-unstyled" style="margin: 10px auto">
<?
		if($file_path[1]) {
?>
	<li>
		<p class="<?php echo('text-'.$rows['img_align']); ?>">
			<a href="<?php echo($file_info['file_path']); ?>" data-lightbox="roadtrip">
				<img src="<?php echo($file_path[1]); ?>"
					class="img-responsive img-thumbnail" />
			</a>
		</p>
	</li>
<?
		}
?>
</ol>
</section>

<!-- 다음글/이전글 -->
<table class='table table-bordered'>
	<tbody>
		<tr>
			<th class='success' style='width: 100px'>다음글</th>
			<td><?=$next_subject?></td>
		</tr>
		<tr>
			<th class='success' style='width: 100px'>이전글</th>
			<td><?=$prev_subject?></td>
		</tr>
	</tbody>
</table>

<!-- 버튼들 -->
<div class='clearfix'>
	<div class='pull-right'>
		<?php if($session_user_level > $write_level) { ?>
		&nbsp;
		<?php } else { ?>
		<a data-toggle="modal" href="#move_modal" class="btn btn-primary move-btn">
			이동
		</a>
		<?php } ?>

		<?php if($session_user_level > $write_level) { ?>
		&nbsp;
		<?php } else { ?>
		<a data-toggle="modal" href="#copy_modal" class='btn btn-primary copy-btn'>복사</a>
		<?php } ?>

		<?php if($session_user_level > $list_level) { ?>
		&nbsp;
		<?php } else { ?>
		<a href='index.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>' class='btn btn-info'>목록보기</a>
		<?php } ?>

		<?php if($session_user_level > $write_level) { ?>
		&nbsp;
		<?php } else { ?>
		<a href='write.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>' class='btn btn-primary'>글쓰기</a>
		<?php } ?>

		<?php if($_ID) { ?>
		<a href='edit.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&id=<?=$id?>' class='btn btn-warning'>수정하기</a>

		<a href='delete.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&id=<?=$id?>' class='btn btn-danger'>삭제하기</a>
		<?php } ?>

	</div>
</div>

<!-- 덧글 작성 폼 -->
<hr />
<!-- 글 번호 상태 유지 -->
<input type='hidden' name='id' value='<?php echo($id); ?>' />
<input type="hidden" name="bbs_id" value="<? echo($bbs_id); ?>" />
<input type="hidden" name="bo_name" value="<? echo($bo_name); ?>" />
<fieldset>
	<div class='form-group form-inline'>
		<? if (!$session_id) { ?>
		<div class="form-group">
			<input type="text" name="writer" class="form-control"
				placeholder='작성자'/>
		</div>
		<div class="form-group">
			<input type="password" name="pwd" class="form-control"
				placeholder='비밀번호'/>
		</div>
		<div class="form-group">
			<input type="email" name="email" class="form-control"
				placeholder='이메일'/>
		</div>
		<? } ?>
	</div>
	<div class='form-group'>
		<div class="col-md-11">
			<textarea class="form-control" name='content'></textarea>
		</div>
		<div class="col-md-1">
			<button type="submit" class="btn btn-success btn-block comment-save-btn">저장</button>
		</div>
	</div>
</fieldset>

<!-- 덧글 리스트 -->
<hr />
<ul class="media-list">
<?
	$sql = "SELECT id, writer, email, content, reg_date FROM bbs_comments
			WHERE document_id=%d ORDER BY id ASC";
	$result = $db -> query($sql, array($id));

	if ($result) {
		if ($db -> num_rows() > 0) {
			while ($comments = $db -> fetch_array()) {
?>
	<li class="media" style='border-bottom: 1px dotted #ccc'>
		<div class="media-body" style='display: block;'>
			<h4 class="media-heading clearfix" style='margin-bottom: -5px;'>
				<!-- 작성자,작성일시 -->
				<div class='pull-left'>
					<?=htmlspecialchars($comments['writer'])?>
					<small>
						<a href='mailto:<?=htmlspecialchars($comments['email'])?>'>
							<i class='glyphicon glyphicon-envelope'></i></a> /
						<?=$comments['reg_date']?>
					</small>
				</div>
				<!-- 수정,삭제 버튼 -->
				<div class='pull-right'>
					<a href='comment_edit.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&id=<?=$id?>&comment_id=<?=$comments['id']?>'
						class='btn btn-default btn-sm'>
						<i class='glyphicon glyphicon-edit'></i>
					</a>
					<a href='comment_delete.php?<?php if(empty($bo_name)) { ?>bbs_id=<?php echo($bbs_id); } else { ?>bo_name=<?php echo($bo_name); } ?>&id=<?=$id?>&comment_id=<?=$comments['id']?>'
						class='btn btn-default btn-sm'>
						<i class='glyphicon glyphicon-remove'></i>
					</a>
				</div>
			</h4>
			<!-- 내용 -->
			<p>
				<?=nl2br(htmlspecialchars($comments['content']))?>
			</p>
		</div>
	</li>
<?
			}
		}
	}
?>
</ul>
</div>
<?php
	$copy_board = false;
	$move_board = false;
	$sql = "SELECT id, bo_name, title FROM bbs_config";
	$result = $db -> query($sql);
	$id_array = array();
	$bo_name_array = array();
	$bo_title_array = array();

	while ($row = $db -> fetch_assoc()) {
		$bo_id_array[] = $row['id'];
		$bo_name_array[] = $row['bo_name'];
		$bo_title_array[] = $row['title'];
	}

	$cnt_array = count($bo_title_array);

	function copy_move($copy_move, $cnt, $id_array, $name_array, $title_array) {
		if($copy_move == true) {
			$select_box = "";
			$select_box .= "<select name='' class='form-control board_cm'>";
			for($i = 0; $i < $cnt; $i++) {
				$select_box .= "<option value='".$id_array[$i]."|".$name_array[$i]."'>".$title_array[$i]."</option>";
			}
			$select_box .= "</select>";

			return $select_box;
		}
	}
?>
<!-- .modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<!-- .modal-dialog -->
	<div class="modal-dialog">
		<!-- .modal-content -->
		<div class="modal-content">
			<!-- 제목 -->
			<div class="modal-header">
				<!-- 닫기버튼 -->
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">팝업창의 제목입니다.</h4>
			</div>
			<!-- 내용 -->
			<div class="modal-body">
				<h4>팝업창의 내용 영역</h4>
				<p>
					<?php echo(copy_move(true, $cnt_array, $bo_id_array, $bo_name_array, $bo_title_array)); ?>

				</p>
			</div>
			<!-- 하단 -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-primary cm-btn">
					Save changes
				</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
	(function($) {
		jQuery(document).on('click', '.move-btn', function() {
			jQuery('.modal').attr('id', 'move_modal');
			jQuery('#move_modal').find('.modal-title').text('이동');
			jQuery('#move_modal').find('.cm-btn').text('이동');
			jQuery('.cm-btn').addClass('move-ok-btn');
			jQuery('.cm-btn').removeClass('copy-ok-btn');
			jQuery('select.board_cm').attr('name', 'move');
			jQuery(document).on('click', '.move-ok-btn', function() {
			jQuery('.myform').attr('method', 'post');
			jQuery('.myform').attr('action', 'board_move_ok.php');
				jQuery('.myform').submit();
			});
		});

		jQuery(document).on('click', '.copy-btn', function() {
			jQuery('.modal').attr('id', 'copy_modal');
			jQuery('#copy_modal').find('.modal-title').text('복사');
			jQuery('#copy_modal').find('.cm-btn').text('복사');
			jQuery('.cm-btn').removeClass('move-ok-btn');
			jQuery('.cm-btn').addClass('copy-ok-btn');
			jQuery('select.board_cm').attr('name', 'copy');
			jQuery(document).on('click', '.copy-ok-btn', function() {
				jQuery('.myform').attr('method', 'post');
				jQuery('.myform').attr('action', 'board_copy_ok.php');
				jQuery('.myform').submit();
			});
		});

		jQuery(document).on('click', '.comment-save-btn', function() {
			jQuery('.myform').attr('method', 'post');
			jQuery('.myform').attr('action', 'comment_ok.php');
			jQuery('.myform').submit();
		});
	}) (jQuery);
</script>