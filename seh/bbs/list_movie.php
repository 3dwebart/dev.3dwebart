<? include_once('../header_ui.php'); ?>
<? include_once('bbs_config.php'); ?>
<?
    $bbs_id = get('bbs_id');
    // 검색어
    $search = get('search');

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'notice'";
    $result = $db -> query($sql, array($bbs_id));

    $notice_find = $db -> fetch_row();

    $sql = "SELECT bo_name FROM bbs_config WHERE id = %d AND bo_name = 'movie'";
    $result = $db -> query($sql, array($bbs_id));

    $movie_find = $db -> fetch_row();

    /***** 페이지 구현을 위한 변수 *****/
    $list_count = 10;       // 한 페이지에 보여질 글의 목록 수
    $group_count = 5;       // 한 그룹에 표시할 페이지번호 개수
    $page = get('page', 1); // 현재 페이지 번호
    $total_count = 0;       // 전체 글 개수 조회

    // 검색 조건에 따른 전체 글 수 조회
    if ($search == FALSE) {
        $sql = "SELECT COUNT(id) FROM bbs_documents WHERE bbs_id=%d";
        $result = $db -> query($sql, array($bbs_id));
    } else {
        $sql = "SELECT COUNT(id) FROM bbs_documents
                WHERE bbs_id=%d AND subject LIKE '%%%s%%' OR content LIKE '%%%s%%'";
        $result = $db -> query($sql, array($bbs_id, $search, $search));
    }

    if ($result != FALSE) {
        $data = $db -> fetch_row();
        $total_count = $data[0];
    }

    /***** 페이지 구현을 위한 계산 *****/
    // 전체 페이지 수
    $total_page = intval(($total_count-1)/$list_count)+1;

    // 현재 페이지에 대한 오차 조절
    if ($page < 0)              $page = 1;
    if ($page > $total_page)    $page = $total_page;

    // 현재 페이징 그룹의 시작 페이지 번호
    $start_page = intval(($page - 1) / $group_count) * $group_count + 1;

    // 현재 페이징 그룹의 끝 페이지 번호
    $end_page = intval((($start_page - 1) + $group_count) / $group_count)
                * $group_count;

    // 끝 페이지 번호가 전체 페이지수를 초과하면 오차범위 조절
    if ($end_page > $total_page) $end_page = $total_page;

    // 검색 범위의 시작 위치
    $limit_start = ($page-1) * $list_count;

    // 이전 그룹의 마지막 페이지
    $prev_page = 0;
    $next_page = 0;

    if ($start_page > $group_count) {
        $prev_page = $start_page - 1;
    }

    if ($end_page < $total_page) {
        $next_page = $end_page + 1;
    }

    /******* 상단 이미지 뿌려주기 ********/
    $sql = "SELECT document_id, dir, file_name, file_type, file_size, origin_name, full_path FROM deco_files WHERE document_id = %d AND file_area = 'top'";

    $result = $db -> query($sql, array($bbs_id));

    $row = $db -> fetch_array();

    if ($db -> num_rows() > 0) {

        // 썸네일 이미지의 가로 크기
        $width = 1500;
        // 썸네일 이미지의 세로 크기
        $height = 400;
        // 저장되어 있는 파일 이름
        $file_name = $row['file_name'];
        // 생성된 썸네일의 파일이름 (thumb_640x480_파일명)
        $thumb_name = sprintf("thumb_%dx%d_%s", $width, $height, $file_name);
        // 파일이 저장되어 있는 Web상의 디렉토리 경로
        $dir = $row['dir'];
        // 파일이 저장되어 있는 실제 디렉토리 경로
        $full_dir = $_SERVER['DOCUMENT_ROOT'].$dir;
        // 현재 파일이 저장되어 있는 물리적인 파일 경로
        $orgin_path = $full_dir.$file_name;
        // 썸네일이 저장될 실제 디렉토리 결로
        $thumb_path = $full_dir.$thumb_name;
        // 썸네일이 저장될 web상의 결로
        $thumb_path_web = $dir.$thumb_name;
        /** 썸네일 만들기 **/
        if (!file_exists($thumb_path)) {
            smart_resize_image($orgin_path, null, $width, $height, false, $thumb_path, false);
        
            $sql = "INSERT INTO deco_files (
                document_id, file_area, dir, file_name, file_type, file_size, origin_name, full_path, reg_date, edit_date
                ) VALUES (%d, 'thumb_top', '%s', '%s', '%s', %d, '%s', '%s', now(), now())";
            $db -> query($sql, array(
                $row['document_id'], $row['dir'], $thumb_name, 
                $row['file_type'], $row['file_size'], 
                $row['origin_name'], $thumb_path
            ));
        }
?>
<form method='get' action='index.php'>
<div>
    <img src="<?=$thumb_path_web?>" alt="<?=$row['origin_name']?>" class="img-responsive" />
</div>
<?php
    }
    /******* 상단 이미지 뿌려주기 END ********/

    /***** 데이터 조회 *****/
    // 글 목록 조회하기
    if ($search == FALSE) {
        $sql = "SELECT a.id, a.subject, a.writer, a.hit, a.reg_date,
                    unix_timestamp(reg_date) as timestamp,
                    (SELECT COUNT(b.id) FROM bbs_comments AS `b`
                     WHERE b.document_id=a.id) AS comment_count
                FROM bbs_documents AS `a`
                WHERE a.bbs_id=%d
                ORDER BY id DESC
                LIMIT %d, %d";
        $result = $db -> query($sql, array($bbs_id, $limit_start, $list_count));
    } else {
        $sql = "SELECT a.id, a.subject, a.writer, a.hit, a.reg_date,
                    unix_timestamp(reg_date) as timestamp,
                    (SELECT COUNT(b.id) FROM bbs_comments AS `b`
                     WHERE b.document_id=a.id) AS comment_count
                FROM bbs_documents AS `a`
                WHERE bbs_id=%d AND subject LIKE '%%%s%%' OR content LIKE '%%%s%%'
                ORDER BY id DESC
                LIMIT %d, %d";
        $result = $db -> query($sql, array($bbs_id, $search, $search,
                                        $limit_start, $list_count));
    }

    if (!$result) {
        redirect(FALSE, '글 목록을 읽는데 실패했습니다.
                        관리자에게 문의해 주세요.');
    }

    // 전체 글 목록 수
    $count = $db -> num_rows();
?>
<!-- 글 목록 시작 -->
<table class='table'>
    <thead>
        <tr>
            <th class='text-center' style='width: 100px'>번호</th>
            <th class='text-center'>제목</th>
            <th class='text-center' style='width: 120px'>작성자</th>
            <th class='text-center' style='width: 100px'>조회수</th>
            <th class='text-center' style='width: 120px'>작성일</th>
        </tr>
    </thead>
    <tbody>
<?
    if ($count > 0) {

        // 하루 전 시간. 이 시간보다 작성일시가 크면 신규 글로 간주.
        $new_time = time() - (24 * 60 * 60);

        $x = $total_count - ($list_count * ($page - 1));

        while ($row = $db -> fetch_array()) {
?>
        <tr>
            <td class='text-center'>
                <?//=$row['id']?>
                <?=$x--?>
            </td>
            <td><a href='read.php?bbs_id=<?=$bbs_id?>&id=<?=$row['id']?>'>
                    <?=htmlspecialchars($row['subject'])?></a>
<?
            if ($row['comment_count'] > 0) {
                printf("&nbsp;<span class='label label-info'>%d</span>",
                    $row['comment_count']);
            }
            if ($row['timestamp'] > $new_time) {
                echo("&nbsp;<span class='label label-warning'>new</span>");
            }
?>
            </td>
            <td class='text-center'>
                <?=htmlspecialchars($row['writer'])?></td>
            <td class='text-center'><?=$row['hit']?></td>
            <td class='text-center'><?=substr($row['reg_date'], 0, 10)?></td>
        </tr>
<?
        }
    } else {
?>
        <tr>
            <td colspan='5' class='text-center' style='line-height: 100px;'>
                조회된 글이 없습니다.</td>
        </tr>
<?
    }
?>
    </tbody>
</table>

<!-- 검색폼 + 글 쓰기 버튼 -->
<div class='clearfix'>
    <div class='pull-left'>
        <input type="hidden" name="bbs_id" value="<?=$bbs_id?>" />
        <div class="input-group" style="width: 200px;">
            <input type="text" name='search' class="form-control"
                value="<?=$search?>" />
            <span class="input-group-btn">
                <button class="btn btn-success" type="submit">
                    <i class='glyphicon glyphicon-search'></i>
                </button>
            </span>
        </div>
    </div>
    <div class='pull-right'>
    <?php
        if ($notice_find > 0 || $movie_find > 0) {
            if ($session_user_id != 'admin') {
                echo('');
            } else {
    ?>
            <a href="write.php?bbs_id=<?=$bbs_id?>" class='btn btn-primary'>글 쓰기</a><div></div>
    <?php
            } 
        } else {
    ?>
        <a href="write.php?bbs_id=<?=$bbs_id?>" class='btn btn-primary'>글 쓰기</a>
    <? } ?>
        
    </div>
</div>

<!-- 페이지 번호 -->
<nav class='text-center'>
    <ul class="pagination">
        <!-- 이전 그룹 -->
<? if ($prev_page > 0) { ?>
        <li><a href="index.php?bbs_id=<?=$bbs_id?>&page=<?=$prev_page?>&search=<?=$search?>">
                <span aria-hidden="true">&laquo;</span></a></li>
<? } else { ?>
        <li class='disabled'><a href="#">
                <span aria-hidden="true">&laquo;</span></a></li>
<? } ?>

        <!-- 페이지 번호 -->
<?
    for ($i=$start_page; $i<=$end_page; $i++) {
        if ($i == $page) {
?>
        <li class='active'><a href="#"><?=$i?></a></li>
<?
        } else {
?>
        <li><a href="index.php?bbs_id=<?=$bbs_id?>&page=<?=$i?>&search=<?=$search?>"><?=$i?></a></li>
<?
        }
    }
?>
        <!-- 다음 그룹 -->
<? if ($next_page > 0) { ?>
        <li><a href="index.php?bbs_id=<?=$bbs_id?>&page=<?=$next_page?>&search=<?=$search?>">
                <span aria-hidden="true">&raquo;</span></a></li>
<? } else { ?>
        <li class='disabled'><a href="#">
                <span aria-hidden="true">&raquo;</span></a></li>
<? } ?>
    </ul>
</nav>
<?php
    $sql = "SELECT document_id, dir, file_name, file_type, file_size, origin_name, full_path FROM deco_files WHERE document_id = %d AND file_area = 'bottom'";

    $result = $db -> query($sql, array($bbs_id));

    $row = $db -> fetch_array();

    if ($db -> num_rows() > 0) {

        // 썸네일 이미지의 가로 크기
        $width = 1500;
        // 썸네일 이미지의 세로 크기
        $height = 200;
        // 저장되어 있는 파일 이름
        $file_name = $row['file_name'];
        // 생성된 썸네일의 파일이름 (thumb_640x480_파일명)
        $thumb_name = sprintf("thumb_%dx%d_%s", $width, $height, $file_name);
        // 파일이 저장되어 있는 Web상의 디렉토리 경로
        $dir = $row['dir'];
        // 파일이 저장되어 있는 실제 디렉토리 경로
        $full_dir = $_SERVER['DOCUMENT_ROOT'].$dir;
        // 현재 파일이 저장되어 있는 물리적인 파일 경로
        $orgin_path = $full_dir.$file_name;
        // 썸네일이 저장될 실제 디렉토리 결로
        $thumb_path = $full_dir.$thumb_name;
        // 썸네일이 저장될 web상의 결로
        $thumb_path_web = $dir.$thumb_name;
        /** 썸네일 만들기 **/
        if (!file_exists($thumb_path)) {
            smart_resize_image($orgin_path, null, $width, $height, false, $thumb_path, false);

            $sql = "INSERT INTO deco_files (
                document_id, file_area, dir, file_name, file_type, file_size, origin_name, full_path, reg_date, edit_date
                ) VALUES (%d, 'thumb_bottom', '%s', '%s', '%s', %d, '%s', '%s', now(), now())";
            $db -> query($sql, array(
                $row['document_id'], $row['dir'], $thumb_name, 
                $row['file_type'], $row['file_size'], 
                $row['origin_name'], $thumb_path
            ));
        }
?>

<div>
    <img src="<?=$thumb_path_web?>" alt="<?=$row['origin_name']?>" class="img-responsive" />
</div>

<?php
    }
?>
</form>
<? include_once('../footer_ui.php'); ?>
