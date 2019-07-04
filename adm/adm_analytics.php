<?php
	include_once('../header.php');
	
	error_reporting(E_ALL);
ini_set("display_errors", 1);

	// 로그인중이 아니라면 탈퇴 불가.
	if ($session_is_admin != 'true') {
		redirect(FALSE, '관리자만 접근 가능합니다.');
	}

	if ($session_user_level > 1) {
		redirect(FALSE, '최고 관리자만 접근 가능합니다.');
	}

?>
<meta charset="utf-8" />
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-header">
				<h1 class="note note-warning">접속자 통계</h1>
			</div>
			<div>
<script type="text/javascript" src="http://radarurl.com/js/radarurl_widget.js"></script><script type="text/javascript">radarurl_call_radar_widgetv2({edition:"Dynamic",location:"bottomcenter"})</script><noscript><a href="http://radarurl.com/">RadarURL</a></noscript>
			</div>
		</div>
	</div>
<?php // include_once('footer_ui.php'); ?>