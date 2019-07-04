<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 하단 파일 경로 지정 : 이 코드는 가능한 삭제하지 마십시오.
if ($config['cf_include_tail'] && is_file(G5_PATH.'/'.$config['cf_include_tail'])) {
    include_once(G5_PATH.'/'.$config['cf_include_tail']);
    return; // 이 코드의 아래는 실행을 하지 않습니다.
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;
}
?>
    </div>
</div>

<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<!--
<div id="ft">
-->

    <div class="container">
        <div class="col-md-6">
            <?php echo popular('basic.bootstrap'); // 인기검색어  ?>
        </div>
        <div class="col-md-6">
            <?php echo visit('basic.bootstrap'); // 접속자집계 ?>
        </div>
    </div>
    <!--
    <div id="ft_catch"><img src="<?php echo G5_IMG_URL; ?>/ft.png" alt="<?php echo G5_VERSION ?>"></div>

    <div id="ft_company">
    </div>
    -->
    <div class="ft_copy">
        <div class="container hidden-sm hidden-xs">
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보취급방침</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a>
            Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.
            <a href="#hd" class="ft_totop">상단으로</a>
        </div>
        <div class="container hidden-md hidden-lg">
            <div class="co;-md-12">
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a>
            </div>
            <div class="co;-md-12">
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보취급방침</a>
            </div>
            <div class="co;-md-12">
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a>
            </div>
            <div class="co;-md-12">
            Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.
            </div>
            <div class="co;-md-12">
            <a href="#hd" class="ft_totop">상단으로</a>
            </div>
        </div>
    </div>


<?php
    if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) {
?>
<a href="<?php echo get_device_change_url(); ?>">
<i class="fa fa-mobile"></i>모바일 버전으로 보기
</a>
<?php
    }

    if ($config['cf_analytics']) {
        echo $config['cf_analytics'];
    }
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_PATH."/tail.sub.php");
?>