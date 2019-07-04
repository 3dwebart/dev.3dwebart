<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<section class="col-md-12 top-padding10 bottom-padding10 bottom-margin5 box">
    <h2 class="sound_only">회원로그인</h2>
    <!-- 로그인 전 외부로그인 시작 -->
    <form name="foutlogin" action="<?php echo $outlogin_action_url; ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
    <fieldset>
        <input type="hidden" name="url" value="<?php echo $outlogin_url; ?>">
        <div class="form-group">
        <input type="text" name="mb_id" required class="required form-control" maxlength="20" placeholder="회원아이디">
        <input type="password" name="mb_password" required class="required form-control" maxlength="20" placeholder="비밀번호">
        </div>
        <button type="submit" class="btn blue form-control">로그인</button>
        <div class="form-group text-center top-margin10">
            <a href="<?php echo G5_BBS_URL; ?>/register.php" class="btn green"><b>회원가입</b></a>
            <a href="<?php echo G5_BBS_URL; ?>/password_lost.php" class="btn yellow">정보찾기</a>
        </div>
        <div class="col-md-12 text-center">
            <input type="checkbox" name="auto_login" value="1" id="auto_login">
            <label for="auto_login" id="auto_login_label">자동로그인</label>
        </div>
    </fieldset>
    </form>
</section>
<div class="clearfix"></div>
<script>
$omi = $('#ol_id');
$omp = $('#ol_pw');
$omi_label = $('#ol_idlabel');
$omi_label.addClass('ol_idlabel');
$omp_label = $('#ol_pwlabel');
$omp_label.addClass('ol_pwlabel');

$(function() {
    $omi.focus(function() {
        $omi_label.css('visibility','hidden');
    });
    $omp.focus(function() {
        $omp_label.css('visibility','hidden');
    });
    $omi.blur(function() {
        $this = $(this);
        if($this.attr('id') == "ol_id" && $this.attr('value') == "") $omi_label.css('visibility','visible');
    });
    $omp.blur(function() {
        $this = $(this);
        if($this.attr('id') == "ol_pw" && $this.attr('value') == "") $omp_label.css('visibility','visible');
    });

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    return true;
}
</script>
<!-- 로그인 전 외부로그인 끝 -->