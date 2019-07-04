<? include_once ('../header_ui.php'); ?>
<?
    // 이미 로그인 중이 아니라면 사용 불가
    if (!$session_id) {
        redirect(FALSE, '로그인 후에 이용 가능합니다.');
    }

    // 데이터베이스에서 회원 정보 불러오기
    $sql = "SELECT user_id, user_name, user_nic, email, tel, reg_date, edit_date
                FROM members WHERE id=%d";
    $result = $db -> query($sql, array($session_u_id));

    // 실행결과 점검하기
    if (!$result) {
        redirect(FALSE, '회원정보를 읽어오는데 실패했습니다. 관리자에게 문의 바랍니다.');
    }

    // 조회된 결과 수
    if ($db -> num_rows() < 1) {
        redirect(FALSE, '회원정보를 찾을 수 없습니다.');
    }

    // 조회결과를 배열로 변환 --> 컬럼이름이 배열의 라벨이 된다.
    $row = $db -> fetch_array();
?>

        <script src="http://dmaps.daum.net/map_js_init/postcode.js"></script>
        <script src="../js/openDaumPostcode.js"></script>

            <div class='page-header'>
                <h1>회원정보 수정</h1>
            </div>
            <!-- 정보 수정 폼 시작 -->
            <form name="myform" method="post" action="edit_ok.php" role="form">
                <fieldset>
                    <div class="form-group">
                        <label for='user_id'>아이디</label>
                        <p class="form-control-static"><?=$row['user_id']?></p>
                    </div>
                    <div class="form-group">
                        <label for='user_pw'>현재 비밀번호</label>
                        <input type="password" name="user_pw" id="user_pw" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for='new_user_pw'>변경할 비밀번호</label>
                        <input type="password" name="new_user_pw" id="new_user_pw" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for='new_user_pw'>비밀번호 확인</label>
                        <input type="password" name="new_user_pw_re" id="new_user_pw_re" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for='user_name'>이름</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" value="<?=$row['user_name']?>"/>
                    </div>
                    <div class="form-group">
                        <label for='user_nic'>닉네임</label>
                        <input type="text" name="user_nic" id="user_nic" class="form-control" value="<?=$row['user_nic']?>"/>
                    </div>
                    <div class="form-group">
                        <label for='email'>이메일</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?=$row['email']?>"/>
                    </div>
                    <div class="form-group">
                        <label for='tel'>연락처</label>
                        <input type="tel" name="tel" id="tel" class="form-control" value="<?=$row['tel']?>"/>
                    </div>
                    <div class="form-group">
                        <label>가입일시</label>
                        <p class="form-control-static"><?=$row['reg_date']?></p>
                    </div>
                    <div class="form-group">
                        <label>최근 변경 일시</label>
                        <p class="form-control-static"><?=$row['edit_date']?></p>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">변경하기</button>
                        <button type="reset" class="btn btn-danger">다시작성</button>
                        <a href="index.php" class="btn btn-info">돌아가기</a>
                    </div>
                </fieldset>
            </form>
            <!-- 정보 수정 폼 끝 -->

<? include_once ('../footer_ui.php'); ?>
