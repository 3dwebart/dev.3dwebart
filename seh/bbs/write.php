<? include_once('../header_ui.php'); ?>
<? include_once('bbs_config.php'); ?>
<?php
    $now_url = post('now_url');
    $bbs_id = get('bbs_id');

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'slogan'";
    $result = $db -> query($sql, array($bbs_id));

    $slogan_find = $db -> fetch_row();

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'notice'";
    $result = $db -> query($sql, array($bbs_id));

    $notice_find = $db -> fetch_row();

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'movie'";
    $result = $db -> query($sql, array($bbs_id));

    $movie_find = $db -> fetch_row();

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'about_sg'";
    $result = $db -> query($sql, array($bbs_id));

    $about_sg_find = $db -> fetch_row();

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'history'";
    $result = $db -> query($sql, array($bbs_id));

    $history_find = $db -> fetch_row();

    if (($notice_find > 0 && $session_user_id != 'admin') || ($movie_find > 0 && $session_user_id != 'admin') || ($about_sg_find > 0 && $session_user_id != 'admin') || ($history_find > 0 && $session_user_id != 'admin')) {
        if ($now_url) {
            redirect($now_url, '글쓰기 권한이 없습니다.');
        } else {
            redirect($site_home, '글쓰기 권한이 없습니다.');
        }
    } else {
?>
<link rel="stylesheet" href="<?=$css_home?>/validate.css">
<script type="text/javascript" src="<?=$plugins_home?>/validation/jquery.validate.min.js"></script>
<? if ($movie_find) { ?>
    <script type="text/javascript" src="<?=$js_home?>/board_validate_movie_control.js"></script>
<? } else if (!$session_id) { ?>
    <script type="text/javascript" src="<?=$js_home?>/board_validate_not_session.js"></script>
<? } else { ?> 
    <script type="text/javascript" src="<?=$js_home?>/board_validate.js"></script>
<? } ?>
<form class="form-horizontal" role="form" method="post" action="write_ok.php" enctype="multipart/form-data">

	<input type="hidden" name="bbs_id" value="<?=$bbs_id?>" />

<? if (!$session_id) { ?>
    <!-- 작성자 -->
    <div class="form-group">
        <label for="writer" class="col-sm-2 control-label">작성자</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="writer" name="writer">
        </div>
        <label for="writer" class="col-sm-3 error control-label"></label>
    </div>
    <!-- 비밀번호 -->
    <div class="form-group">
        <label for="pwd" class="col-sm-2 control-label">비밀번호</label>
        <div class="col-sm-7">
            <input type="password" class="form-control" id="pwd" name="pwd">
        </div>
         <label for="writer" class="col-sm-3 error control-label"></label>
    </div>
    <!-- 이메일 -->
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">이메일</label>
        <div class="col-sm-7">
            <input type="email" class="form-control" id="email" name="email">
        </div>
         <label for="writer" class="col-sm-3 error control-label"></label>
    </div>
<? } ?>
<? if ($movie_find > 0) { ?>
<script>
    $(function() {
        $('.writeOK').click(function() {
            if (!$('#movie_size').is(':checked')) {
                alert('동영상 비울을 선택해 주세요.');
                return;
            };
        });
        /*
        var type_s;
        var url_s;
        var date_s;
        var div_id_S;
        var return_type;
     
        //before_content = $(div_content).html();
     
        //영문숫자만
        jQuery.validator.addMethod("engnumber", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/.val();
        });
        //영문만
        jQuery.validator.addMethod("eng", function (value, element) {
            return this.optional(element) || /^[a-zA-Z]+$/.val();
        });
        //숫자만
        jQuery.validator.addMethod("number", function (value, element) {
            return this.optional(element) || /^[0-9]+$/.val();
        });
        //한글만
        $.validator.addMethod("kor", function (value, element) {
            return this.optional(element) || /^[\uAC00-\uD7A3]+$/.val();
        }, "");
*/
    });
</script>
    <!-- 제목 -->
    <div class="form-group">
        <label for="movie_size" class="col-sm-2 control-label">동영상 비율</label>
        <div class="col-sm-7">
            <div class="input-group"  style="width: 100px;">
                <span class="input-group-addon">
                    <input type="radio" id="movie_size" name="movie_size" value="wide" aria-label="wide" aria-describedby="inputError2Status" />
                    Wide
                </span>
                <span class="input-group-addon">
                    <input type="radio" id="movie_size" name="movie_size" value="vga" aria-label="vga" aria-describedby="inputError2Status" />
                    Vga
                </span>
            </div><!-- /input-group -->
        </div>
        <label for="movie_size" class="col-sm-3 error control-label"></label>
    </div>
    <div class="form-group">
        <label for="movie_id" class="col-sm-2 control-label">동영상 아이디</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="movie_id" name="movie_id">
        </div>
        <label for="movie_id" class="col-sm-3 error control-label"></label>
    </div>
<? } ?>
    <!-- 링크 -->
    <? if (!$about_sg_find && !$history_find && !$slogan_find) { ?>
    <div class="form-group">
        <label for="link" class="col-sm-2 control-label">링크</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="link" name="link">
        </div>
        <label for="writer" class="col-sm-3 error control-label"></label>
    </div>
    <? } ?>
    <!-- 제목 -->
    <div class="form-group">
        <label for="subject" class="col-sm-2 control-label">제목</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="subject" name="subject">
        </div>
        <label for="subject" class="col-sm-3 error control-label"></label>
    </div>
    <!-- 내용 -->
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">내용</label>
        <div class="col-sm-7">
            <textarea class="form-control" rows='10' id="content" name="content"></textarea>
        </div>
        <label for="content" class="col-sm-3 error control-label"></label>
    </div>
    <!-- 첨부파일 -->
    <div class="form-group">
        <label for="myfile" class="col-sm-2 control-label">첨부파일</label>
        <div class="col-sm-10">
            <input type="file" name="myfile[]" id="myfile" multiple />
        </div>
    </div>
    <!-- 버튼들 -->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 text-center">
            <button type="submit" class="btn btn-primary writeOK">저장하기</button>
            <button type="reset" class="btn btn-danger">다시작성</button>
        </div>
    </div>
</form>
<? } ?>
<? include_once('../footer_ui.php'); ?>
