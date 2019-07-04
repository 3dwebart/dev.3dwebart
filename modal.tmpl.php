<?php
	$header_path = dirname(__FILE__)."/header.php";
	include_once($header_path);
?>
<script src="<?php echo($site_home); ?>/assets//frontend/layout/scripts/jquery.tmpl.min.js"></script>
<script src="<?php echo($site_home); ?>/assets//frontend/layout/scripts/jquery.tmplPlus.min.js"></script>
<!-- .modal -->
<div id="LoginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<!-- .modal-dialog -->
	<div class="modal-dialog">
		<!-- .modal-content -->
		<div class="modal-content">
			<!-- 제목 -->
			<div class="modal-header">
				<!-- 닫기버튼 -->
				
				<h4 class="modal-title" id="myModalLabel">
					로그인
					<button type="button" class="no-color-button" data-dismiss="modal" aria-hidden="true">
						<!--
						&times;
						-->
						<i class="fa fa-times fa-6"></i>
					</button>
				</h4>
			</div>
			<!-- 내용 -->
			<div class="modal-body">
				<input type="text" name="user_id" class="form-control login-id" placeholder="아이디" />
				<input type="password" name="user_pw" class="form-control login-pw" placeholder="비밀번호" />
			</div>
			<!-- 하단 -->
			<div class="modal-footer">
				<button type="button" class="btn btn-primary login-ok hidden-sm hidden-xs">
					로그인
				</button>
				<button type="button" class="btn btn-primary btn-block login-ok hidden-lg hidden-md">
					로그인
				</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
