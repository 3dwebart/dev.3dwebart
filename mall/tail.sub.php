<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 사용자가 지정한 tail.sub.php 파일이 있다면 include
if(defined('G5_TAIL_SUB_FILE') && is_file(G5_PATH.'/'.G5_TAIL_SUB_FILE)) {
    include_once(G5_PATH.'/'.G5_TAIL_SUB_FILE);
    return;
}
?>

<?php if ($is_admin == 'super') {  ?><!-- <div style='float:left; text-align:center;'>RUN TIME : <?php echo get_microtime()-$begin_time; ?><br></div> --><?php }  ?>

<!-- ie6,7에서 사이드뷰가 게시판 목록에서 아래 사이드뷰에 가려지는 현상 수정 -->
<!--[if lte IE 7]>
<script>
$(function() {
    var $sv_use = $(".sv_use");
    var count = $sv_use.length;

    $sv_use.each(function() {
        $(this).css("z-index", count);
        $(this).css("position", "relative");
        count = count - 1;
    });
});
</script>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo G5_URL ?>/assets/global/plugins/respond.min.js"></script>
<![endif]--> 
<script src="<?php echo G5_URL ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo G5_URL ?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo G5_URL ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
<script src="<?php echo G5_URL ?>/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="<?php echo G5_URL ?>/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="<?php echo G5_URL ?>/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

<!-- BEGIN RevolutionSlider -->  
<script src="<?php echo G5_URL ?>/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
<script src="<?php echo G5_URL ?>/assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
<script src="<?php echo G5_URL ?>/assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
<!-- END RevolutionSlider -->

<script src="<?php echo G5_URL ?>/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();    
        Layout.initOWL();
        RevosliderInit.initRevoSlider();
        Layout.initTwitter();
        //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
        //Layout.initNavScrolling(); 
    });
</script>
</body>
</html>
<?php echo html_end(); // HTML 마지막 처리 함수 : 반드시 넣어주시기 바랍니다. ?>