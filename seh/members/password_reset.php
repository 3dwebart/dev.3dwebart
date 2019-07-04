<? include_once ('../header_ui.php'); ?>

            <div class='page-header'>
                <h1>비밀번호 재설정</h1>
            </div>
            <!-- 이메일 입력 폼 시작 -->
            <form name="myform" method="post" action="password_reset_ok.php" role="form" class='form-inline'>
                <fieldset>
                    <div class="form-group">
                        <label for='email'>가입시 입력한 이메일</label>
                        <input type="email" name="email" id="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">확인</button>
                        <button type="reset" class="btn btn-danger">취소</button>
                    </div>
                </fieldset>
            </form>
            <!-- 이메일 입력 폼 끝 -->

<? include_once ('../footer_ui.php'); ?>
