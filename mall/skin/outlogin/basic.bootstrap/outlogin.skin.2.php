<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>
<style>
    .information {
        margin: 30px 0px;
    }

    .non-left-padding {
        padding-left: 0;
    }

    .non-right-padding {
        padding-right: 0;
    }
</style>
<!-- 로그인 후 아웃로그인 시작 { -->
<section id="ol_after" class="ol box">
    <header>
        <h2 class="sound_only">나의 회원정보</h2>
        <div class="alert alert-info"><strong><?php echo $nick ?>님</strong></div>
        <?php if ($is_admin == 'super' || $is_auth) {  ?><a href="<?php echo G5_ADMIN_URL ?>" class="btn blue form-control">관리자 모드</a><?php }  ?>
    </header>
    
    <div class="button-group information">
        <div class="col-md-4 non-left-padding non-right-padding">
            <a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class="col-md-12 col-sm-12 col-xs-12 btn blue">
                <span class="sound_only">안 읽은 </span>쪽지
                <strong><?php echo $memo_not_read ?></strong>
            </a>
        </div>
        <div class="col-md-4 non-left-padding non-right-padding">
            <a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" class="col-md-12 col-sm-12 col-xs-12 btn yellow">
                포인트 <strong><?php echo $point ?></strong>
            </a>
        </div>
        <div class="col-md-4 non-left-padding non-right-padding">
            <a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" class="col-md-12 col-sm-12 col-xs-12 btn green">스크랩</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group information">
        <div class="col-md-12 text-center">
            <a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" class="btn yellow">정보수정</a>
            <a href="<?php echo G5_BBS_URL ?>/logout.php" class="btn red">로그아웃</a>
        </div>
    </div>
    <div class="clearfix"></div>
</section>
<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- } 로그인 후 아웃로그인 끝 -->
