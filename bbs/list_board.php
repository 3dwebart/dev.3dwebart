<?php
    include_once('../header_ui.php');
    include_once('bbs_config.php');

    $bbs_id  = get('bbs_id');
    $bo_name = get('bo_name');
    // 검색어
    $search = get('search');
    
    /* 공지글을 위한 배열 만들기 Start */
    $sql = "SELECT id, notice_yn_text, subject, writer, hit, reg_date, unix_timestamp(reg_date) AS timestamp FROM `%s` WHERE notice_yn = 'y' LIMIT 0, 5";
    $result = $db -> query($sql, array($bo_table));
    
    $notice_id = array();
    $notice_text = array();
    $notice_subject = array();
    $notice_writer = array();
    $notice_hit = array();
    $notice_reg_date = array();
    $notice_reg_timestamp = array();
    $notice_cnt = 0;
    while($row = $db -> fetch_assoc()) {
	    if($row['notice_yn_text']) {
		    $notice_text[$notice_cnt] = $row['notice_yn_text'];
	    } else {
			$notice_text[$notice_cnt] = '공지';
	    }
	    
	    $notice_id[$notice_cnt] = $row['id'];
	    $notice_subject[$notice_cnt] = $row['subject'];
	    $notice_writer[$notice_cnt] = $row['writer'];
	    $notice_hit[$notice_cnt] = $row['hit'];
	    $notice_reg_date[$notice_cnt] = $row['reg_date'];
	    $notice_reg_timestamp[$notice_cnt] = $row['timestamp'];
	    $notice_cnt++;
    }
    /* 공지글을 위한 배열 만들기 End */

    $sql = "SELECT list_count FROM bbs_config WHERE id = %d OR bo_name = '%s'";
    $result = $db -> query($sql, array($bbs_id, $bo_name));

    $listCnt = $db -> fetch_assoc();

    /***** 페이지 구현을 위한 변수 *****/
    //$list_count = 10;       // 한 페이지에 보여질 글의 목록 수
    $list_count = $listCnt['list_count'];
    $group_count = 5;       // 한 그룹에 표시할 페이지번호 개수
    $page = get('page', 1); // 현재 페이지 번호
    $total_count = 0;       // 전체 글 개수 조회

    // 검색 조건에 따른 전체 글 수 조회
    if ($search == FALSE) {
        $sql = "SELECT COUNT(id) FROM `%s` WHERE bbs_id = %d OR bbs_name = '%s'";
        $result = $db -> query($sql, array($bo_table, $bbs_id, $bo_name));
    } else {
        $sql = "SELECT COUNT(id) FROM `%s`
                WHERE (bbs_id = %d OR bbs_name = '%s') AND subject LIKE '%%%s%%' OR content LIKE '%%%s%%'";
        $result = $db -> query($sql, array($bo_table, $bbs_id, $bo_name, $search, $search));
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
<input type="hidden" name="page_title" value="<?php echo($page_title); ?>">
<div>
    <img src="<?php echo($thumb_path_web); ?>" alt="<?php echo($row['origin_name']); ?>" class="img-responsive" />
</div>
<?php
    }
    /******* 상단 이미지 뿌려주기 END ********/

	/* 리스트 화면 뿌려주기 Start */
	include_once($bbs_skin.'/list.php');
	/* 리스트 화면 뿌려주기 End */

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
    <img src="<?php echo($thumb_path_web); ?>" alt="<?php echo($row['origin_name']); ?>" class="img-responsive" />
</div>

<?php
    }
?>
<!--
</form>
-->
<?php include_once('../footer_ui.php'); ?>
