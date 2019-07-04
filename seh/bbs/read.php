<? include_once('../header_ui.php'); ?>
<? include_once('bbs_config.php'); ?>

<script type="text/javascript" src="../js/lightbox.min.js"></script>
<link href="../css/lightbox.css" rel="stylesheet" />

<?
    // 글 번호 파라미터 처리
    $id = get('id');

    if (!$id) {
        redirect(FALSE, '글 번호가 없습니다.');
    }

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'notice'";
    $result = $db -> query($sql, array($bbs_id));

    $notice_find = $db -> fetch_row();

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'movie'";
    $result = $db -> query($sql, array($bbs_id));

    $movie_find = $db -> fetch_row();

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'about_sg'";
    $result = $db -> query($sql, array($bbs_id));

    $about_sg_find = $db -> fetch_row();

    // 본문 읽기
    $sql_tmpl = "SELECT writer, email, movie_size, movie_id, link, subject, content, hit, reg_date
                 FROM bbs_documents WHERE id=%d";
    $result = $db -> query($sql_tmpl, array($id));

    if (!$result) {
        redirect(FALSE, '글 내용을 읽어오는데 실패했습니다. 관리자에게 문의해 주세요.');
    }

    if ($db -> num_rows() < 1) {
        redirect(FALSE, '존재하지 않는 글 입니다.');
    }

    $rows = $db -> fetch_array();

    // 다음 글 조회
    $next_subject = '다음 글이 없습니다.';
    $sql_tmpl = "SELECT id, subject FROM bbs_documents
                 WHERE bbs_id=%d AND id > %d ORDER BY id ASC LIMIT 0, 1";
    $result = $db -> query($sql_tmpl, array($bbs_id, $id));

    if ($result != FALSE) {
        if ($db -> num_rows() > 0) {
            $next_rows = $db -> fetch_array();
            $next_subject = sprintf('<a href="read.php?bbs_id=%d&id=%d">%s</a>',
                                $bbs_id, $next_rows['id'], htmlspecialchars($next_rows['subject']));
        }
    }

    // 이전 글 조회
    $prev_subject = '이전 글이 없습니다.';
    $sql_tmpl = "SELECT id, subject FROM bbs_documents
                 WHERE bbs_id=%d AND id < %d ORDER BY id DESC LIMIT 0, 1";
    $result = $db -> query($sql_tmpl, array($bbs_id, $id));

    if ($result != FALSE) {
        if ($db -> num_rows() > 0) {
            $prev_rows = $db -> fetch_array();
            $prev_subject = sprintf('<a href="read.php?bbs_id=%d&id=%d">%s</a>',
                                $bbs_id, $prev_rows['id'], htmlspecialchars($prev_rows['subject']));
        }
    }

    // 조회수 갱신
    $sql_tmpl = "UPDATE bbs_documents SET hit=hit+1 WHERE id=%d";
    $result = $db -> query($sql_tmpl, array($id));

    if (!$result) {
        redirect(FALSE, '조회수 갱신에 실패했습니다. 관리자에게 문의해 주세요.');
    }

    // 첨부파일 정보 조회
    $sql_tmpl = "SELECT id, concat(dir, file_name) as file_path,
                origin_name, file_type FROM bbs_files WHERE document_id=%d";
    $files = $db -> query($sql_tmpl, array($id));

    //$files_validate = $db -> fetch_row();
?>
<? 
    if ( $notice_find > 0 || $movie_find > 0 || $about_sg_find > 0 ) {
        if ($session_user_id == 'admin') {
?>
<div class="alert alert-info" role="alert">
    <h3 style='margin: 0'>
        <?=htmlspecialchars($rows['subject'])?><br/>
        <small>
            <?=htmlspecialchars($rows['writer'])?>
            <a href='mailto:<?=$rows['email']?>'>
                <i class='glyphicon glyphicon-envelope'></i></a> /
            <?=$rows['reg_date']?> /
            hit: <?=$rows['hit']?>
        </small>
    </h3>
</div>
<?
        } else {
            echo('');
        }
?>
    <?//=nl2br(htmlspecialchars($rows['content']))?>
<? } else { ?>
<!-- 제목, 작성자, 작성일시, 조회수 -->
<div class="alert alert-info" role="alert">
    <h3 style='margin: 0'>
        <?=htmlspecialchars($rows['subject'])?><br/>
        <small>
            <?=htmlspecialchars($rows['writer'])?>
            <a href='mailto:<?=$rows['email']?>'>
                <i class='glyphicon glyphicon-envelope'></i></a> /
            <?=$rows['reg_date']?> /
            hit: <?=$rows['hit']?>
        </small>
    </h3>
</div>
<? } ?>
<?
    if ($db -> num_rows() < 1) {
        echo('');
    } else {
?>
<!-- 첨부파일 정보 출력하기 -->
<ol class="breadcrumb">
<?
     if ($files) {
        while ($file_info = $db -> fetch_array()) {
?>
    <li><a href="<?=$file_info['file_path']?>">
            <?=$file_info['origin_name']?></a></li>
<?
        }
    }
?>
</ol>
<?
    }
?>

<!-- 내용 -->
<section style='padding: 0 10px 20px 10px'>
    <? if ($rows['movie_id']) { ?>
    <? if ($rows['movie_size'] == 'wide') { ?>
    
    <div class="embed-responsive embed-responsive-16by9">
    
    <iframe  class="embed-responsive-item" src="//www.youtube.com/embed/<?=$rows['movie_id']?>?feature=player_detailpage"></iframe>
    
    </div>
    <? } ?>
    <? if ($rows['movie_size'] == 'vga') { ?>
    
    <div class="embed-responsive embed-responsive-4by3">
    
    <iframe  class="embed-responsive-item" src="//www.youtube.com/embed/<?=$rows['movie_id']?>?feature=player_detailpage"></iframe>
    
    </div>
    <? } ?>
    <? } ?>
    <!-- 16:9 aspect ratio -->
    <!--
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="..."></iframe>
</div>
-->

<!-- 4:3 aspect ratio -->
<!--
<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="..."></iframe>
</div>
-->

    <?=nl2br(htmlspecialchars($rows['content']))?>

<?
    // 첨부파일이 있다면?
    if ($files) {
        $db -> move_first();
?>
<ol class="list-unstyled" style="margin: 10px auto">
<?
        while ($file_info = $db -> fetch_array()) {
            if (strpos($file_info['file_type'], 'image') > -1) {
?>
    <li>
        <p>
            <a href="<?=$file_info['file_path']?>" data-lightbox="roadtrip">
                <img src="<?=$file_info['file_path']?>"
                    class="img-responsive img-thumbnail" />
            </a>
        </p>
    </li>
<?
            }
        }
?>
</ol>
<?
    }
?>
</section>

<!-- 다음글/이전글 -->
<table class='table table-bordered'>
    <tbody>
        <tr>
            <th class='success' style='width: 100px'>다음글</th>
            <td><?=$next_subject?></td>
        </tr>
        <tr>
            <th class='success' style='width: 100px'>이전글</th>
            <td><?=$prev_subject?></td>
        </tr>
    </tbody>
</table>

<!-- 버튼들 -->
<div class='clearfix'>
    <div class='pull-right'>
        <a href='index.php?bbs_id=<?=$bbs_id?>' class='btn btn-info'>목록보기</a>
    <?
        if ( $notice_find > 0 || $movie_find > 0 || $about_sg_find > 0 ) {
            if ($session_user_id == 'admin') {
    ?>
        <a href='write.php?bbs_id=<?=$bbs_id?>' class='btn btn-primary'>글쓰기</a>
        <a href='edit.php?bbs_id=<?=$bbs_id?>&id=<?=$id?>' class='btn btn-warning'>수정하기</a>
        <a href='delete.php?bbs_id=<?=$bbs_id?>&id=<?=$id?>' class='btn btn-danger'>삭제하기</a>
    <?
            } else {
                echo('');
            }
        } else {
    ?>
        <a href='write.php?bbs_id=<?=$bbs_id?>' class='btn btn-primary'>글쓰기</a>
        <a href='edit.php?bbs_id=<?=$bbs_id?>&id=<?=$id?>' class='btn btn-warning'>수정하기</a>
        <a href='delete.php?bbs_id=<?=$bbs_id?>&id=<?=$id?>' class='btn btn-danger'>삭제하기</a>
    <? } ?>
    </div>
</div>

<!-- 덧글 작성 폼 -->
<hr />
<form role="form" method="post" action="comment_ok.php">
    <!-- 글 번호 상태 유지 -->
    <input type='hidden' name='id' value='<?=$id?>' />
	<input type="hidden" name="bbs_id" value="<?=$bbs_id?>" />
    <fieldset>
        <div class='form-group form-inline'>
        	<? if (!$session_id) { ?>
            <div class="form-group">
                <input type="text" name="writer" class="form-control"
                    placeholder='작성자'/>
            </div>
            <div class="form-group">
                <input type="password" name="pwd" class="form-control"
                    placeholder='비밀번호'/>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control"
                    placeholder='이메일'/>
            </div>
            <? } ?>
            <button type="submit" class="btn btn-success">저장</button>
        </div>
        <div class='form-group'>
            <textarea class="form-control" name='content'></textarea>
        </div>
    </fieldset>
</form>

<!-- 덧글 리스트 -->
<hr />
<ul class="media-list">
<?
    $sql = "SELECT id, writer, email, content, reg_date FROM bbs_comments
            WHERE document_id=%d ORDER BY id ASC";
    $result = $db -> query($sql, array($id));

    if ($result) {
        if ($db -> num_rows() > 0) {
            while ($comments = $db -> fetch_array()) {
?>
    <li class="media" style='border-bottom: 1px dotted #ccc'>
        <div class="media-body" style='display: block;'>
            <h4 class="media-heading clearfix" style='margin-bottom: -5px;'>
                <!-- 작성자,작성일시 -->
                <div class='pull-left'>
                    <?=htmlspecialchars($comments['writer'])?>
                    <small>
                        <a href='mailto:<?=htmlspecialchars($comments['email'])?>'>
                            <i class='glyphicon glyphicon-envelope'></i></a> /
                        <?=$comments['reg_date']?>
                    </small>
                </div>
                <!-- 수정,삭제 버튼 -->
                <div class='pull-right'>
                    <a href='comment_edit.php?bbs_id=<?=$bbs_id?>&id=<?=$id?>&comment_id=<?=$comments['id']?>'
                        class='btn btn-default btn-sm'>
                        <i class='glyphicon glyphicon-edit'></i>
                    </a>
                    <a href='comment_delete.php?bbs_id=<?=$bbs_id?>&id=<?=$id?>&comment_id=<?=$comments['id']?>'
                        class='btn btn-default btn-sm'>
                        <i class='glyphicon glyphicon-remove'></i>
                    </a>
                </div>
            </h4>
            <!-- 내용 -->
            <p>
                <?=nl2br(htmlspecialchars($comments['content']))?>
            </p>
        </div>
    </li>
<?
            }
        }
    }
?>
</ul>

<? include_once('../footer_ui.php'); ?>
