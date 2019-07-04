<?php
    include_once('../header_ui.php');
    include_once('bbs_config.php');

    // 글 번호 및 댓글번호 파라미터 처리
    $id = get('id');
    $comment_id = get('comment_id');

    if (!$id) { redirect(FALSE, '글 번호가 없습니다.'); }
    if (!$comment_id) { redirect(FALSE, '댓글 번호가 없습니다.'); }

    // 댓글 내용 읽기
    $sql_tmpl = "SELECT writer, email, content
                 FROM `%s` WHERE id=%d";
    $result = $db -> query($sql_tmpl, array($bo_comm, $comment_id));

    if (!$result) {
        redirect(FALSE, '댓글 내용을 읽기 실패했습니다.
                        관리자에게 문의해 주세요.');
    }

    if ($db -> num_rows() < 1) {
        redirect(FALSE, '존재하지 않는 댓글 입니다.');
    }

    $comments = $db -> fetch_array();
?>
<form role="form" method="post" action="comment_edit_ok.php">
    <!-- 글 번호 상태 유지 -->
    <input type='hidden' name='id' value='<?php echo($id); ?>' />
    <input type='hidden' name='comment_id' value='<?php echo($comment_id); ?>' />
	<input type="hidden" name="bbs_id" value="<?php echo($bbs_id); ?>" />
    <fieldset>
        <legend>댓글 수정</legend>
        <div class='form-group form-inline'>
            <?php if (!$session_u_id) { ?>
            <div class="form-group">
                <input type="text" name="writer" class="form-control"
                    placeholder='작성자' value="<?php echo($comments['writer']); ?>"/>
            </div>
            <div class="form-group">
                <input type="password" name="pwd" class="form-control"
                    placeholder='비밀번호'/>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control"
                    placeholder='이메일' value="<?php echo($comments['email']); ?>"/>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-success">저장</button>
        </div>
        <div class='form-group'>
            <textarea class="form-control"
                name='content'><?php echo($comments['content']); ?></textarea>
        </div>
    </fieldset>
</form>
<?php include_once('../footer_ui.php'); ?>
