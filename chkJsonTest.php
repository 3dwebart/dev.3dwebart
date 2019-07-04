<?php
$chk1 = '[
	{
		"code_type": "text",
		"filePresence": "0",
		"content": "first text"
	},
	{
		"code_type": "css",
		"filePresence": "0",
		"content": "css:style"
	},
	{
		"code_type": "html",
		"filePresence": "0",
		"content": "</html>"
	},
	{
		"code_type": "js",
		"filePresence": "0",
		"content": "js = \"javascript\""
	},
	{
		"code_type": "",
		"filePresence": "1",
		"content": ""
	},
	{
		"code_type": "text",
		"filePresence": "0",
		"content": "last text"
	}
]';
$chk2 = 'test';
$chk3 = '[
	{
		"code_type": "text",
		"filePresence": "0",
		"content": "first text"
	},
	{
		"code_type": "css",
		"filePresence": "0",
		"content": "css:style"
	},
	{
		"code_type": "html",
		"filePresence": "0",
		"content": "</html>"
	},
	{
		"code_type": "text",
		"filePresence": "0",
		"content": "last text"
	}
]';
function isJson($string) {
 json_decode($string);
 return (json_last_error() == JSON_ERROR_NONE);
}
echo '<h1>chk1 = '.isJson($chk1).'</h1>';
echo '<h1>sch2 = '.isJson($chk2).'</h1>';
echo '<h1>sch3 = '.isJson($chk3).'</h1>';
$array = isJson($chk1);
for ($i=0; $i < count($array); $i++) {
	echo('<h1>json_'.$i.' = '.$array[$i].'</h1>');
}
echo '<h1>chk1 origin = '.$chk1.'</h1>';
?>