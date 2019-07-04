<?php
    include_once('../header_ui.php');
    include_once('bbs_config.php');
    // 글 번호 파라미터 처리
    $id          = get('id');
    $bbs_id      = get('bbs_id');
    $bo_name     = get('bo_name');

    if (!$id) {
        redirect(FALSE, '글 번호가 없습니다.');
    }
die();
    // 본문 읽기
    $sql_tmpl = "SELECT notice_yn, notice_yn_text, writer, email, movie_size, movie_id, notice_yn, notice_yn_text, link, html, subject, explanation, content, img_align, img_pos
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

    $explanation = $rows['explanation'];

    // 첨부파일의 경로를 가져온다.
    $sql = "SELECT id, origin_name FROM `%s` WHERE document_id=%d";
    $result = $db -> query($sql, array($bo_file, $id));


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
    <input type='hidden' name='id' value='<?php echo($id); ?>' />
	<input type="hidden" name="bbs_id" value="<?php echo($bbs_id); ?>" />
	<input type="hidden" name="bo_name" value="<?php echo($bo_name); ?>" />

<? if (!$session_id) { ?>
    <!-- 작성자 -->
    <div class="form-group">
        <label for="writer" class="col-sm-2 control-label">작성자</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="writer" name="writer"
                value="<?php echo($rows['writer']); ?>">
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
                value="<?php echo($rows['email']); ?>">
        </div>
    </div>
<?php } ?>
	<!-- 공지글 사용 -->
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
    <?php if($session_user_level < 3) { ?>
    <!-- HTML 사용 -->
    <div class="form-group">
        <label for="html" class="col-sm-2 control-label">HTML 사용</label>
        <div class="col-sm-7">
	        <p class="form-control-static">
            	<input type="checkbox" class="" id="html" name="html" value="y" <?php if($rows['html'] == 'y') { ?>checked<?php } ?>> 사용
	        </p>
        </div>
        <label for="notice_yn" class="col-sm-3 error control-label"></label>
    </div>
    <?php } ?>
    <!-- 링크 -->
    <div class="form-group">
        <label for="link" class="col-sm-2 control-label">링크</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="link" name="link"
                value="<?php echo($rows['link']); ?>">
        </div>
    </div>
    <!-- 제목 -->
    <div class="form-group">
        <label for="subject" class="col-sm-2 control-label">제목</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="subject" name="subject"
                value="<?php echo($rows['subject']); ?>">
        </div>
    </div>
    <!-- 내용 -->
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">내용</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows='10' id="content"
                name="content"><?php echo($rows['content']); ?></textarea>
        </div>
    </div>
    <!-- 첨부되어 있는 파일들 -->
    <div class="form-group">
        <label for="myfile" class="col-sm-2 control-label">첨부파일</label>
        <div class="col-sm-10">
            <input type="file" name="myfile[]" id="myfile" multiple />
<?php while ($files = $db -> fetch_array()) { ?>
            <div class="radio">
            <label><input type="checkbox" name="delete[]" value="<?php echo($files['id']); ?>"> <?php echo($files['origin_name']); ?> 삭제하기</label>
            </div>
<?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label for="img_align" class="col-sm-2 control-label">이미지 좌우정렬</label>
        <div>
	        <p class="form-control-static">
		        <input type="radio" name="img_align" id="img_align" value="left" <?php if($rows['img_align'] == 'left') { ?>checked="" <?php } ?> /> Left
		        <input type="radio" name="img_align" id="img_align" value="center" <?php if($rows['img_align'] == 'center') { ?>checked="" <?php } ?> /> Center
		        <input type="radio" name="img_align" id="img_align" value="right" <?php if($rows['img_align'] == 'right') { ?>checked="" <?php } ?> /> Right
	        </p>
        </div>
        <label for="img_pos" class="col-sm-2 control-label">이미지 영역(본문 기준)</label>
        <div>
	        <p class="form-control-static">
		        <input type="radio" name="img_pos" id="img_pos" value="t" <?php if($rows['img_pos'] == 't') { ?>checked="" <?php } ?> /> Top
		        <input type="radio" name="img_pos" id="img_pos" value="b" <?php if($rows['img_pos'] == 'b') { ?>checked="" <?php } ?> /> Bottom
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
<?php include_once('../footer_ui.php'); ?>
