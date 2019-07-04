<style>
	.notice_text {
		display: none;
	}

    .row {
        margin: 5px 0;
    }
</style>
<link href="<?php echo($site_home); ?>/assets/frontend/layout/css/write-form.css" rel="stylesheet">
<script src="<?php echo($site_home); ?>/assets/frontend/layout/scripts/jQuery.MultiFile.min.js" type="text/javascript"></script>
<div class="clearfix"></div>
<?php
    if($cate) {
        $category   = explode('|', $cate);
        $cate_id    = explode(',', $category[0]);
        $cate_name  = explode(',', $category[1]);
        echo('<input type="hidden" name="cate" value="'.$cate.'">');
    }
?>

<div class="detail-contents col-xs-12">
	<input type="hidden" name="bbs_id" value="<?php echo($bbs_id); ?>" />
	<input type="hidden" name="bo_name" value="<?php echo($bo_name); ?>" />
	<div class="alert alert-success">
		<i class="fa fa-pencil-square-o"></i>
		글쓰기
	</div>
<?php if (!$session_user_id) { ?>
	<!-- 작성자 -->
	<div class="form-group">
		<label for="writer" class="col-sm-2 control-label">작성자</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="writer" name="writer">
		</div>
		<label for="writer" class="col-sm-3 error control-label"></label>
	</div>
	<div class="clearfix"></div>
	<!-- 비밀번호 -->
	<div class="form-group">
		<label for="pwd" class="col-sm-2 control-label">비밀번호</label>
		<div class="col-sm-7">
			<input type="password" class="form-control" id="pwd" name="pwd">
		</div>
		<label for="writer" class="col-sm-3 error control-label"></label>
	</div>
	<div class="clearfix"></div>
	<!-- 이메일 -->
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">이메일</label>
		<div class="col-sm-7">
			<input type="email" class="form-control" id="email" name="email">
		</div>
		<label for="writer" class="col-sm-3 error control-label"></label>
	</div>
	<div class="clearfix"></div>
<?php } ?>
	<!-- 공지글 사용 -->
    <div class="row">
        <div class="form-group">
            <label for="notice_yn" class="col-sm-2 control-label">공지글 사용</label>
            <div class="col-sm-7">
    	        <p class="form-control-static">
                	<input type="checkbox" class="" id="notice_yn" name="notice_yn" value="y"> 사용
    	        </p>
            </div>
            <label for="notice_yn" class="col-sm-3 error control-label"></label>
        </div>
    </div>
    <div class="row">
        <div class="form-group notice_text">
            <label for="notice_yn_text" class="col-sm-2 control-label">공지글 사용 문구</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="notice_yn_text" name="notice_yn_text" placeholder="표기 없을시[공지] 로 표기됩니다.">
            </div>
            <label for="notice_yn" class="col-sm-3 error control-label"></label>
        </div>
    </div>
    <!-- HTML 사용 -->
    <?php if($session_user_level < 3) { ?>
    <div class="row">
        <div class="form-group">
            <label for="html" class="col-sm-2 control-label">HTML 사용</label>
            <div class="col-sm-7">
    	        <p class="form-control-static">
                	<input type="checkbox" class="" id="html" name="html" value="y"> 사용
    	        </p>
            </div>
            <label for="notice_yn" class="col-sm-3 error control-label"></label>
        </div>
    </div>
    <?php } ?>
    <!-- 링크 -->
    <div class="row">
        <div class="form-group">
            <label for="link" class="col-sm-2 control-label">링크</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="link" name="link" />
            </div>
        </div>
    </div>
    <?php if($cate) { ?>
    <!-- 카테고리 -->
    <div class="row">
        <div class="form-group">
            <label for="link" class="col-sm-2 control-label">카테고리</label>
            <div class="col-sm-7">
                <p class="form-control-static">
                    <?php for($i = 0; $i < count($cate_id); $i++) { ?>
                    <input type="checkbox" name="cate_id[]" id="<?php echo($cate_id[$i])?>" value="<?php echo($cate_id[$i])?>"> <label for="<?php echo($cate_id[$i])?>"><?php echo($cate_name[$i])?></label> &nbsp;&nbsp;
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- 제목 -->
    <div class="row">
        <div class="form-group">
            <label for="subject" class="col-sm-2 control-label">제목</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <label for="subject" class="col-sm-3 error control-label"></label>
        </div>
    </div>
    <!-- 내용 -->
    <div class="row">
        <div class="form-group content-area top-margin20">
            <label for="content" class="col-sm-2 control-label">내용</label>
            <div class="col-sm-7">
                <textarea class="form-control" rows='10' id="content" name="content"></textarea>
            </div>
            <!--
            <label for="content" class="col-sm-3 error control-label"></label>
            -->
            <div class="clearfix"></div>
        </div>
    <!-- 첨부파일 -->
        <div class="form-group files">
            <label for="myfile" class="col-sm-2 control-label">첨부파일</label>
            <div class="col-sm-7">
                <!-- <input type="file" name="myfile[]" id="myfile" multiple /> -->
                <input type="file" name="myfile[]" id="myfile" multiple="" />
            </div>
            <div class="col-sm-3" class="add-del-btns">
                <button type="button" class="btn btn-primary add-btn"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
    	    <label for="img_align" class="col-sm-2 control-label">이미지 좌우정렬</label>
            <div class="col-sm-4">
    	        <p class="form-control-static">
                	<input type="radio" name="img_align" id="img_align" value="left" /> left
                	<input type="radio" name="img_align" id="img_align" value="center" checked="" /> center
                	<input type="radio" name="img_align" id="img_align" value="right" checked="" /> right
    	        </p>
            </div>
            <label for="img_pos" class="col-sm-2 control-label">이미지 영역(본문 기준)</label>
            <div class="col-sm-4">
    	        <p class="form-control-static">
                	<input type="radio" name="img_pos" id="img_pos" value="t" /> Top
                	<input type="radio" name="img_pos" id="img_pos" value="b" checked="" /> Bottom
    	        </p>
            </div>
        </div>
    </div>
	<div class="clearfix"></div>
    <div class="form-group top-margin20 bottom-margin100">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary writeOK">
				<i class="fa fa-save"></i>
				저장하기
			</button>
        </div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
(function($) {
    jQuery('.myform').addClass('form-horizontal');
    
    jQuery(document).on('keydown', 'input, select', function(event) {
        if(event.which == 13) {
            event.preventDefault();
            jQuery('.myform').attr('method', 'post');
            jQuery('.myform').attr('action', 'write_ok.php');
            jQuery('.myform').submit();
        }
    });
    
    jQuery(document).on('click', '.writeOK', function() {
        jQuery('.myform').attr('method', 'post');
        jQuery('.myform').attr('action', 'write_ok.php');
        jQuery('.myform').submit();
    });
    
    jQuery(document).on('click', 'input[name="notice_yn"]', function() {
        jQuery('.notice_text').toggle();
    });

    jQuery(document).on('click', '.add-btn', function() {
        files_cnt = jQuery('.files').length;
        if(files_cnt >= 4) {
            alert('파일은 한 게시판에' + files_cnt + '개 이상은 올릴 수 없습니다.');
        } else {
            files_group = jQuery(this).parent().parent().parent();
            append_files = '<div class="form-group files">' + 
            '<label for="myfile" class="col-sm-2 control-label">첨부파일</label>' +
            '<div class="col-sm-7">' + 
                '<input type="file" name="myfile[]" id="myfile" />' + 
            '</div>' + 
            '<div class="col-sm-3" class="add-del-btns">' + 
                '<button type="button" class="btn btn-primary add-btn"><i class="fa fa-plus"></i></button>' + 
                '<button type="button" class="btn btn-danger del-btn"><i class="fa fa-minus"></i></button>' + 
            '</div>' + 
        '</div>';
            files_group.append(append_files);
        }
    });

    jQuery(document).on('click', '.add-con-btn', function() {
        content_cnt = jQuery('.content-area').length;
        if(content_cnt >= 4) {
            alert('내용은 한 게시판에' + content_cnt + '개 이상은 올릴 수 없습니다.');
        } else {
            content_group = jQuery(this).parent().parent().parent();
            append_content = '<div class="form-group content-area top-margin20">' + 
            '<label for="myfile" class="col-sm-2 control-label">내용</label>' +
            '<div class="col-sm-7">' + 
                '<textarea class="form-control" rows="10" id="content" name="content"></textarea>' + 
            '</div>' + 
            '<div class="col-sm-3" class="add-del-btns">' + 
                '<button type="button" class="btn btn-primary add-con-btn"><i class="fa fa-plus"></i></button>' + 
                '<button type="button" class="btn btn-danger del-con-btn"><i class="fa fa-minus"></i></button>' + 
            '</div>' + 
        '</div>';
            content_group.append(append_content);
        }
    });

    jQuery(document).on('click', '.del-btn', function() {
        jQuery(this).parent().parent().remove();
    });

    jQuery(document).on('click', '.del-del-btn', function() {
        jQuery(this).parent().parent().remove();
    });
}) (jQuery);
</script>