<? include_once('../header_ui.php'); ?>
<? include_once('bbs_config.php'); ?>
<?
    // 글 번호 파라미터 처리
    $id = get('id');

    if (!$id) {
        redirect(FALSE, '글 번호가 없습니다.');
    }

    // 본문 읽기
    $sql_tmpl = "SELECT writer, email, movie_size, movie_id, link, subject, content
                 FROM bbs_documents WHERE id=%d";
    $result = $db -> query($sql_tmpl, array($id));

    if (!$result) {
        redirect(FALSE, '글 내용을 읽기 실패했습니다. 관리자에게 문의해 주세요.');
    }

    if ($db -> num_rows() < 1) {
        redirect(FALSE, '존재하지 않는 글 입니다.');
    }

    $rows = $db -> fetch_array();

    // 첨부파일의 경로를 가져온다.
    $sql = "SELECT id, origin_name FROM bbs_files WHERE document_id=%d";
    $result = $db -> query($sql, array($id));

    if (($notice_find > 0 && $session_user_id != 'admin') || ($movie_find > 0 && $session_user_id != 'admin') || ($about_sg_find > 0 && $session_user_id != 'admin')) {
        if ($now_url) {
            redirect($now_url, '글쓰기 권한이 없습니다.');
        } else {
            redirect($site_home, '글쓰기 권한이 없습니다.');
        }
    } else {
?>
<form class="form-horizontal" role="form" method="post" action="edit_ok.php" enctype="multipart/form-data">
    <!-- 글 번호 상태 유지 -->
    <input type='hidden' name='id' value='<?=$id?>' />
	<input type="hidden" name="bbs_id" value="<?=$bbs_id?>" />

<? if (!$session_id) { ?>
    <!-- 작성자 -->
    <div class="form-group">
        <label for="writer" class="col-sm-2 control-label">작성자</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="writer" name="writer"
                value="<?=$rows['writer']?>">
        </div>
    </div>
    <!-- 비밀번호 -->
    <div class="form-group">
        <label for="pwd" class="col-sm-2 control-label">비밀번호</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="pwd" name="pwd"
                placeholder='글 작성시에 설정한 비밀번호를 입력해 주세요.'>
        </div>
    </div>
    <!-- 이메일 -->
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">이메일</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email"
                value="<?=$rows['email']?>">
        </div>
    </div>
<? } ?>
    <!-- 링크 -->
    <div class="form-group">
        <label for="link" class="col-sm-2 control-label">링크</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="link" name="link"
                value="<?=$rows['link']?>">
        </div>
    </div>
    <!-- 제목 -->
    <div class="form-group">
        <label for="subject" class="col-sm-2 control-label">제목</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="subject" name="subject"
                value="<?=$rows['subject']?>">
        </div>
    </div>
    <!-- 내용 -->
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">내용</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows='10' id="content"
                name="content"><?=$rows['content']?></textarea>
        </div>
    </div>
    <!-- 첨부되어 있는 파일들 -->
    <div class="form-group">
        <label for="myfile" class="col-sm-2 control-label">첨부파일</label>
        <div class="col-sm-10">
            <input type="file" name="myfile[]" id="myfile" multiple />
<? while ($files = $db -> fetch_array()) { ?>
            <div class="radio">
            <label><input type="checkbox" name="delete[]" value="<?=$files['id']?>"> <?=$files['origin_name']?> 삭제하기</label>
            </div>
<? } ?>
        </div>
    </div>
    <!-- 버튼들 -->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">저장하기</button>
            <button type="reset" class="btn btn-danger">다시작성</button>
        </div>
    </div>
</form>
<? } ?>
<? include_once('../footer_ui.php'); ?>
