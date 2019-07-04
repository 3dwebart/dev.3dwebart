<? include_once('../header_ui.php'); ?>
<? include_once('bbs_config.php'); ?>
<?
    // 글 번호 파라미터 처리
    $id = get('id');

    if (!$id) {
        redirect(FALSE, '글 번호가 없습니다.');
    }
?>
<div style='width: 300px; margin: 50px auto;'>
    <form name="myform" method="post" action="delete_ok.php" role="form">
        <!-- 글 번호 상태 유지 -->
        <input type='hidden' name='id' value='<?=$id?>' />
		<input type="hidden" name="bbs_id" value="<?=$bbs_id?>" />
        <fieldset>
            <div class="form-group">
            <? if (!$session_id) { ?>
                <label for='pwd'>비밀번호</label>
                <input type="password" name="pwd" id="pwd" class="form-control"/>
            <? } else { ?>
                <p>정말 삭제하시겠습니까?</p>
            <? } ?>
            </div>
            <div class="form-group">
                <button type='submit' class='btn btn-danger btn-block'>
                    삭제하기</button>
                <button type='reset' class='btn btn-primary btn-block'>
                    삭제취소</button>
            </div>
        </fieldset>
    </form>
</div>
<? include_once('../footer_ui.php'); ?>
