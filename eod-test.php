<?php
	$str = <<< EOD
	find ./ -name "*.php" -exec perl -pi -e "s/\<\?=/\<\?php\ echo\ /g" "{}" \;<br /><br />

	git remote set-url https://github.com/3dwebart/html.git

	origin  3dwebart@github.com:3dwebart/html.git

	git remote add git_html https://github.com/3dwebart/html
EOD;
	echo($str);
?>