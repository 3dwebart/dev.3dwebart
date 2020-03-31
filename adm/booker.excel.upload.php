<?php
include_once('./_common.php');


include_once('./admin.head.php');
?>
<form action="booker.excel.upload.update.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<table class="table">
		<caption></caption>
		<tbody>
			<tr>
				<td>파일</td>
				<td><input type="file" name="excelFile"/></td>
			</tr>
		</tbody>
	</table>
	<input type="submit" value="업로드"/>
</form>
<?php include_once('./admin.tail.php'); ?>