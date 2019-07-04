<style>
	.notice_text {
		display: none;
	}
</style>
<link href="<?php echo($site_home); ?>/assets/frontend/layout/css/write-form.css" rel="stylesheet">
<script src="<?php echo($site_home); ?>/assets/frontend/layout/scripts/jQuery.MultiFile.min.js" type="text/javascript"></script>
<!-- <?php
	if($editor_yn == 'y') {
?>
<script type="text/javascript" src="<?php echo($site_home); ?>/plugins/ckeditor/ckeditor.js"></script>
<?php
	}
?> -->
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
/*
			if(jQuery(this).is(':checked') == false) {
				jQuery('.notice_text').find('input').val('');
			}
*/
			jQuery('.notice_text').toggle();
		});
	}) (jQuery);
</script>
<div class="clearfix"></div>
<div class="container">
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
    <div class="form-group">
        <label for="notice_yn" class="col-sm-2 control-label">공지글 사용</label>
        <div class="col-sm-7">
	        <p class="form-control-static">
            	<input type="checkbox" class="" id="notice_yn" name="notice_yn" value="y"> 사용
	        </p>
        </div>
        <label for="notice_yn" class="col-sm-3 error control-label"></label>
    </div>
    <div class="form-group notice_text">
        <label for="notice_yn_text" class="col-sm-2 control-label">공지글 사용 문구</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="notice_yn_text" name="notice_yn_text" placeholder="표기 없을시[공지] 로 표기됩니다.">
        </div>
        <label for="notice_yn" class="col-sm-3 error control-label"></label>
    </div>
    <!-- HTML 사용 -->
    <?php if($session_user_level < 3) { ?>
    <div class="form-group">
        <label for="html" class="col-sm-2 control-label">HTML 사용</label>
        <div class="col-sm-7">
	        <p class="form-control-static">
            	<input type="checkbox" class="" id="html" name="html" value="y"> 사용
	        </p>
        </div>
        <label for="notice_yn" class="col-sm-3 error control-label"></label>
    </div>
    <?php } ?>
    <!-- 링크 -->
    <div class="form-group">
        <label for="link" class="col-sm-2 control-label">링크</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="link" name="link" />
        </div>
    </div>
    <!-- 제목 -->
    <div class="form-group">
        <label for="subject" class="col-sm-2 control-label">제목</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="subject" name="subject">
        </div>
        <label for="subject" class="col-sm-3 error control-label"></label>
    </div>
    <div class="clearfix"></div>
    <!-- 내용 -->
    <div class="form-group top-margin20">
        <label for="content" class="col-sm-2 control-label">내용</label>
        <div class="col-sm-7">
            <textarea class="form-control" rows='10' id="content" name="content"></textarea>
        </div>
        <label for="content" class="col-sm-3 error control-label"></label>
    </div>
    <div class="clearfix"></div>
<!-- <?php
	if($editor_yn == 'y') {
?> -->
<script>
/*
    $(function(){
        CKEDITOR.replace( 'content', {//해당 이름으로 된 textarea에 에디터를 적용
            width:'100%',
            height:'400px',
            filebrowserImageUploadUrl: '/community/imageUpload' //여기 경로로 파일을 전달하여 업로드 시킨다.
        });

        CKEDITOR.on('dialogDefinition', function( ev ){
            var dialogName = ev.data.name;
            var dialogDefinition = ev.data.definition;
          
            switch (dialogName) {
                case 'image': //Image Properties dialog
                    //dialogDefinition.removeContents('info');
                    dialogDefinition.removeContents('Link');
                    dialogDefinition.removeContents('advanced');
                    break;
            }
        });
    });
*/
</script>
<!-- <?php
	}
?> -->
    <!-- 첨부파일 -->
    <div class="form-group">
	    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
        <label for="myfile" class="col-sm-2 control-label">첨부파일</label>
        <div class="col-sm-10">
            <input type="file" name="myfile[]" id="myfile" multiple />
        </div>
    </div>

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


