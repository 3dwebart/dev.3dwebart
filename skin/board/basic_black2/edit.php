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
<?php
    if($cate) {
        $category   = explode('|', $cate);
        $cate_id    = explode(',', $category[0]);
        $cate_name  = explode(',', $category[1]);
        echo('<input type="hidden" name="cate" value="'.$cate.'">');
    }

    if($explanation) {
        $tmp_ex     = explode('||', $explanation);
        $ex1        = explode('|', $tmp_ex[0]);
        $ex2        = explode('|', $tmp_ex[1]);
        echo('<input type="hidden" name="cate" value="'.$explanation.'">');
    } else {
        $ex1 = null;
        $ex2 = null;
    }
?>
<div class="detail-contents col-xs-12">
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
    <?php if($cate) { ?>
    <!-- 카테고리 -->
    <?php
        $chk_cate = explode(',', $rows['cate']);
        $chk_cate_cnt = count($chk_cate);
    ?>

    <div class="form-group">
        <label for="link" class="col-sm-2 control-label">카테고리</label>
        <div class="col-sm-7">
            <p class="form-control-static">
                <?php for($i = 0; $i < count($cate_id); $i++) { ?>
                <input type="checkbox" name="cate_id[]" id="<?php echo($cate_id[$i])?>" value="<?php echo($cate_id[$i])?>"<?php for($tmp = 0; $tmp < $chk_cate_cnt; $tmp++) {if($chk_cate[$tmp] == $cate_id[$i]) {?> checked<?php }} ?>> <label for="<?php echo($cate_id[$i])?>"><?php echo($cate_name[$i])?></label> &nbsp;&nbsp;
                <?php } ?>
            </p>
        </div>
    </div>

    <?php } ?>
    <!-- 제목 -->
    <div class="form-group">
        <label for="subject" class="col-sm-2 control-label">제목</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="subject" name="subject"
                value="<?=$rows['subject']?>">
        </div>
    </div>
    <!-- 설명 -->
    <div class="form-group">
        <label for="ex1" class="col-sm-2 control-label">설명(제목)</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="ex1" name="ex1" value="<?php echo($ex1); ?>">
        </div>
        <label for="ex2" class="col-sm-2 control-label">설명(내용)</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="ex2" name="ex2" value="<?php echo($ex2); ?>">
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
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
