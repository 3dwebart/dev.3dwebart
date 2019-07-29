<style>
	.notice_text {
		display: none;
	}
    .hidden-btn {
        /*visibility: visible;*/
    }
</style>
<div class="clearfix"></div>
<div class="container">
	<input type="hidden" name="bbs_id" value="<?php echo($bbs_id); ?>" />
	<input type="hidden" name="bo_name" value="<?php echo($bo_name); ?>" />
	<div class="alert alert-success">
		<i class="fa fa-pencil-square-o"></i>
		글쓰기
	</div>
    <!-- <h1>TEST : chr(30) = <?php echo chr(30); ?></h1> -->
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
    <div class="content-group">
        <div class="form-group top-margin20 content-block">
            
            <div class="col-sm-offset-9 col-sm-3">
                <div class="btn-group origin-btn">
                    <button class="btn btn-default text-add">TEXT</button>
                    <button class="btn btn-success  dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Code </button>
                    <button class="btn btn-warning file-add">Image</button>
                    <div class="dropdown-menu">
                        <button class="code-add btn btn-info btn-block" data-code="html">html</button>
                        <button class="code-add btn btn-info btn-block" data-code="css">CSS</button>
                        <button class="code-add btn btn-info btn-block" data-code="javascript">javascript</button>
                        <button class="code-add btn btn-info btn-block" data-code="php">php</button>
                        <button class="code-add btn btn-info btn-block" data-code="sql">MySQL</button>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        
        <!-- 첨부파일 -->
       
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
<link href="<?php echo($site_home); ?>/assets/frontend/layout/css/write-form.css" rel="stylesheet">
<script src="<?php echo($site_home); ?>/assets/frontend/layout/scripts/jQuery.MultiFile.min.js" type="text/javascript"></script>
<script type="text/javascript">
    (function($) {
        //function err
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
            var errV = 0;

            if(jQuery('#subject').val() == '') {
                alert('제목은 필수 입력 입니다.');
                jQuery('#subject').focus();
                return false;
            }

            jQuery('.content-block').each(function() {
                if(jQuery(this).find('textarea').val() == '') {
                    var msgMainAgent = jQuery(this).find('label').text();
                    var errorMsg = msgMainAgent + '에 해당하는 내용이 없습니다.\n내용을 입력해 주세요.';
                    alert(errorMsg);
                    jQuery(this).find('textarea').focus();
                    errV = 1;
                    //return errV;
                }
            });

            if(errV == 1) {
                //alert(errorMsg);
                return false;
            }  else {
                jQuery('.myform').attr('method', 'post');
                jQuery('.myform').attr('action', 'write_ok.php');
                jQuery('.myform').submit();
            }
            
            // jQuery('.myform').attr('method', 'post');
            // jQuery('.myform').attr('action', 'write_ok.php');
            // jQuery('.myform').submit();
        });
        
        jQuery(document).on('click', 'input[name="notice_yn"]', function() {
            jQuery('.notice_text').toggle();
        });
        var cntID = 0;

        var addButton = '<div class="col-sm-4">' +
                '<div class="btn-group">' +
                    '<button class="btn btn-default text-add">TEXT</button>' +
                    '<button class="btn btn-success  dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Code </button>' +
                    '<button class="btn btn-warning file-add">Image</button>' +
                    '<button class="btn btn-danger delete-btn hidden-btn"><i class="fa fa-close" visible="true"></i></button>' + 
                    '<div class="dropdown-menu">' +
                        '<button class="code-add btn btn-info btn-block" data-code="html">html</button>' +
                        '<button class="code-add btn btn-info btn-block" data-code="css">CSS</button>' +
                        '<button class="code-add btn btn-info btn-block" data-code="js">js</button>' + 
                        '<button class="code-add btn btn-info btn-block" data-code="php">php</button>' + 
                        '<button class="code-add btn btn-info btn-block" data-code="sql">MySQL</button>' + 
                    '</div>' + 
                '</div>' + 
            '</div>';

        var add_content = '<label for="content" class="col-sm-2 control-label content-type">내용</label>' + 
            '<div class="col-sm-6">' +
                '<textarea class="form-control" rows="10" id="content" name="content[]"></textarea>' +
            '</div>' +
            addButton + 
            '<input type="hidden" name="code_type[]" class="code_type" />' +
            '<input type="hidden" name="filePresence[]" class="filePresence" value="0" />' +
            '<div class="clearfix"></div>';
        var add_file = '<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />' + 
            '<label for="myfile" class="col-sm-2 control-label content-type">첨부파일</label>' + 
            '<div class="col-sm-6">' + 
                '<input type="file" name="myfile[]" id="myfile" />' + 
            '</div>' + 
            addButton + 
            '<input type="hidden" name="content[]" value="" />' +
            '<input type="hidden" name="code_type[]" class="code_type" value="file" />' +
            '<input type="hidden" name="filePresence[]" class="filePresence" value="1" />' +
            '<input type="hidden" name="content[]" class="content" value="" />' +
            '<div class="clearfix"></div>';
        function MinDelBtnLength(lengthBox) {
            if(jQuery('.content-block').length > 1) {
                jQuery('.content-block').eq(lengthBox - 1).find('.delete-btn').removeClass('hidden-btn');
                jQuery('.delete-btn').attr('disabled', false);
            } else {
                jQuery('.delete-btn').addClass('hidden-btn');
                jQuery('.delete-btn').attr('disabled', true);
            }
        }

        function ContentType(tit) {
            if(tit != 'file') {
                jQuery('.code_type').last().val(tit);
            }
        }

        jQuery(document).on('click', '.text-add', function() {
            cntID++;
            if(jQuery(this).parent().hasClass('origin-btn') == true) {
                jQuery(this).parent().parent().parent().remove();
            }
            var add_new_content = jQuery('<div class="form-group top-margin20 content-block">').html(add_content);
            jQuery('.content-group').append(jQuery('<div class="form-group top-margin20 content-block">').html(add_content));
            var length_text_box = jQuery('.content-block').length;
            var contentTitle = 'text';
            jQuery('.content-block').eq(length_text_box - 1).find('.content-type').text('text');
            var controlID = jQuery('.content-block').eq(length_text_box - 1).find('label').attr('for') + cntID;
            jQuery('.content-block').eq(length_text_box - 1).find('label').attr('for', controlID);
            jQuery('.content-block').eq(length_text_box - 1).find('textarea').attr('id', controlID);

            MinDelBtnLength(length_text_box);
            ContentType(contentTitle);

            return false;
        });

        jQuery(document).on('click', '.code-add', function() {
            cntID++;
            if(jQuery(this).parent().parent().hasClass('origin-btn') == true) {
                jQuery(this).parent().parent().parent().parent().remove();
            }
            var codeType = jQuery(this).data('code');
            var add_new_content = jQuery('<div class="form-group top-margin20 content-block">').html(add_content);
            jQuery('.content-group').append(jQuery('<div class="form-group top-margin20 content-block">').html(add_content));
            var length_code_box = jQuery('.content-block').length;
            var contentTitle = codeType;
            jQuery('.content-block').eq(length_code_box - 1).find('.content-type').text(codeType);
            var controlCodeID = jQuery('.content-block').eq(length_code_box - 1).find('label').attr('for') + cntID;
            jQuery('.content-block').eq(length_code_box - 1).find('label').attr('for', controlCodeID);
            jQuery('.content-block').eq(length_code_box - 1).find('textarea').attr('id', controlCodeID);

            MinDelBtnLength(length_code_box);
            ContentType(contentTitle);

            return false;
        });

        jQuery(document).on('click', '.file-add', function() {
            cntID++;
            if(jQuery(this).parent().hasClass('origin-btn') == true) {
                jQuery(this).parent().parent().parent().remove();
            }
            var add_new_content = jQuery('<div class="form-group content-block file-block">').html(add_file);
            jQuery('.content-group').append(jQuery('<div class="form-group content-block file-block">').html(add_file));
            var length_code_box = jQuery('.content-block').length;
            jQuery('.content-block').eq(length_code_box - 1).find('.content-type').text('첨부파일');
            var contentTitle = 'file';
            var controlCodeID = jQuery('.content-block').eq(length_code_box - 1).find('label').attr('for') + cntID;
            jQuery('.content-block').eq(length_code_box - 1).find('label').attr('for', controlCodeID);
            jQuery('.content-block').eq(length_code_box - 1).find('input').attr('id', controlCodeID);

            MinDelBtnLength(length_code_box);
            ContentType(contentTitle);

            return false;
        });

        jQuery(document).on('click', '.delete-btn', function() {
            jQuery(this).parent().parent().parent().remove();
            if(jQuery('.content-block').length > 1) {
                jQuery('.delete-btn').attr('disabled', false);
            } else {
                jQuery('.delete-btn').attr('disabled', true);
            }
        });
    }) (jQuery);
</script>

