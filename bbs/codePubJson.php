<?php
	$viewJson = array();
	for($i = 0; $i < count($content); $i++) {
		$viewJson[$i] = [
			'code_type' => $code_type[$i],
			'filePresence' => $filePresence[$i],
			'content' => $content[$i]
		];
	}

	//json_encode($viewJson);
	$viewJsonCode = json_encode($viewJson,JSON_UNESCAPED_UNICODE);
	//echo $viewJsonCode;
?>