<? include_once('../header_ui.php'); ?>
<? include_once('bbs_config.php'); ?>
<?
    // 글 번호 파라미터 처리
    $id       = get('id');
    $bbs_id   = get('bbs_id');
    $bo_name  = get('bo_name');
    $bo_table = 'bo_table_'.$bo_name;

    if (!$id) {
        redirect(FALSE, '글 번호가 없습니다.');
    }

    // 본문 읽기
    $sql_tmpl = "SELECT notice_yn, notice_yn_text, writer, email, movie_size, movie_id, notice_yn, notice_yn_text, link, subject, content, img_align, img_pos
                 FROM `%s` WHERE id=%d";
    $result = $db -> query($sql_tmpl, array($bo_table, $id));

    if (!$result) {
        redirect(FALSE, '글 내용을 읽기 실패했습니다. 관리자에게 문의해 주세요.');
    }

    if ($db -> num_rows() < 1) {
        redirect(FALSE, '존재하지 않는 글 입니다.');
    }

    $rows = $db -> fetch_array();
    
    if($rows['notice_yn_text']) {
	    $notice_yn_text_tmp = str_replace("[", "", $rows['notice_yn_text']);
	    $notice_yn_text = str_replace("]", "", $notice_yn_text_tmp);
    }

    // 첨부파일의 경로를 가져온다.
    $sql = "SELECT id, origin_name FROM bbs_files WHERE document_id=%d";
    $result = $db -> query($sql, array($id));

    if (($notice_find > 0 && $session_user_id != 'admin') || ($movie_find > 0 && $session_user_id != 'admin') || ($about_sg_find > 0 && $session_user_id != 'admin')) {
        if ($now_url) {
            redirect($now_url, '글쓰기 권한이 없습니다.');
        } else {
            redirect($site_home, '글쓰기 권한이 없습니다.');
        }
    } else {
?>
<style>
	.form-group:after {
		content: '';
		display: block;
		float: none;
		clear: both;
	}
	
	.notice_text {
		display: none;
	}
</style>
<div class="clearfix"></div>
<div class="container">
    <!-- 글 번호 상태 유지 -->
    <input type='hidden' name='id' value='<?=$id?>' />
	<input type="hidden" name="bbs_id" value="<?=$bbs_id?>" />
	<input type="hidden" name="bo_name" value="<?=$bo_name?>" />

<? if (!$session_id) { ?>
    <!-- 작성자 -->
    <div class="form-group">
        <label for="writer" class="col-sm-2 control-label">작성자</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="writer" name="writer"
                value="<?=$rows['writer']?>">
        </div>
    </div>
    <!-- 비밀번호 -->
    <div class="form-group">
        <label for="pwd" class="col-sm-2 control-label">비밀번호</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="pwd" name="pwd"
                placeholder='글 작성시에 설정한 비밀번호를 입력해 주세요.'>
        </div>
    </div>
    <!-- 이메일 -->
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">이메일</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email"
                value="<?=$rows['email']?>">
        </div>
    </div>
<? } ?>

    <div class="form-group">
        <label for="notice_yn" class="col-sm-2 control-label">공지글 사용</label>
        <div class="col-sm-7">
	        <p class="form-control-static">
            	<input type="checkbox" class="" id="notice_yn" name="notice_yn" value="y" <?php if($rows['notice_yn'] == 'y') { ?>checked<?php } ?>> 사용
	        </p>
        </div>
        <label for="notice_yn" class="col-sm-3 error control-label"></label>
    </div>
    <div class="form-group notice_text">
        <label for="notice_yn_text" class="col-sm-2 control-label">공지글 사용 문구</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="notice_yn_text" name="notice_yn_text" value="<?php echo($notice_yn_text); ?>" placeholder="표기 없을시[공지] 로 표기됩니다.">
        </div>
        <label for="notice_yn" class="col-sm-3 error control-label"></label>
    </div>
    <!-- 링크 -->
    <div class="form-group">
        <label for="link" class="col-sm-2 control-label">링크</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="link" name="link"
                value="<?=$rows['link']?>">
        </div>
    </div>
    <!-- 제목 -->
    <div class="form-group">
        <label for="subject" class="col-sm-2 control-label">제목</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="subject" name="subject"
                value="<?=$rows['subject']?>">
        </div>
    </div>
    <!-- 내용 -->
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">내용</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows='10' id="content"
                name="content"><?=$rows['content']?></textarea>
        </div>
    </div>
    <!-- 첨부되어 있는 파일들 -->
    <div class="form-group">
        <label for="myfile" class="col-sm-2 control-label">첨부파일</label>
        <div class="col-sm-10">
            <input type="file" name="myfile[]" id="myfile" multiple />
<? while ($files = $db -> fetch_array()) { ?>
            <div class="radio">
            <label><input type="checkbox" name="delete[]" value="<?=$files['id']?>"> <?=$files['origin_name']?> 삭제하기</label>
            </div>
<? } ?>
        </div>
    </div>
    <div class="form-group">
        <label for="img_align" class="col-sm-2 control-label">이미지 좌우정렬</label>
        <div>
	        <p class="form-control-static">
		        <input type="radio" name="img_align" id="img_align" value="left" <?php if($rows['img_align'] == 'left') { ?>checked="" <? } ?> /> Left
		        <input type="radio" name="img_align" id="img_align" value="center" <?php if($rows['img_align'] == 'center') { ?>checked="" <? } ?> /> Center
		        <input type="radio" name="img_align" id="img_align" value="right" <?php if($rows['img_align'] == 'right') { ?>checked="" <? } ?> /> Right
	        </p>
        </div>
        <label for="img_pos" class="col-sm-2 control-label">이미지 영역(본문 기준)</label>
        <div>
	        <p class="form-control-static">
		        <input type="radio" name="img_pos" id="img_pos" value="t" <?php if($rows['img_pos'] == 't') { ?>checked="" <? } ?> /> Top
		        <input type="radio" name="img_pos" id="img_pos" value="b" <?php if($rows['img_pos'] == 'b') { ?>checked="" <? } ?> /> Bottom
	        </p>
        </div>
    </div>
    <!-- 버튼들 -->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 text-center">
            <button type="submit" class="btn btn-primary edit-ok">수정하기</button>
            <button type="reset" class="btn btn-danger">다시작성</button>
        </div>
    </div>
</div>
<? } ?>
<script>
	(function($) {
		jQuery(document).on('click', '.edit-ok', function() {
			jQuery('.myform').attr('method', 'post');
			jQuery('.myform').attr('action', 'edit_ok.php');
			jQuery('.myform').submit();
		});
		
		if(jQuery('input[name="notice_yn"]').is(":checked") == true) {
			jQuery('.notice_text').show();
		}
		
		jQuery(document).on('click', 'input[name="notice_yn"]', function() {
			jQuery('.notice_text').toggle();
		});
	}) (jQuery);
</script>
<? include_once('../footer_ui.php'); ?>
