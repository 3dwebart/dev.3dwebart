<? include_once('../header_ui.php'); ?>
<?php
  $lang = get('lang');
  //$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
 
  if ($lang == "ko") // 한국어
  {
    include_once('kr.php');
  }
  else if ($lang == "en") // 영어
  {
    include_once('en.php');
  }
  else // 일치하는 언어 없으면 한국어로 표시
  {
    include_once('kr.php');
  }

  $php_url = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
  $f_url = $_SERVER['HTTP_REFERER'];
  $get_url = strrpos($f_url, '?');
  $cut_url = substr($f_url, $get_url, 8);
  $result_url = substr($f_url, 0, $get_url);

?>
  <h1>브라우저 언어 : <?=$lang?></h1>
  <h2><? echo('php_url = http://'.$php_url);?></h2>
  <h2><? echo('f_url = '.$f_url);?></h2>
  <h2><? echo('get_url = '.$get_url);?></h2>
  <h2><? echo('cut_url = '.$cut_url);?></h2>
  <h2><? echo('result_url = '.$result_url);?></h2>
  <p>
    <strong>예</strong> : <?=$strings['Yes']?> <br>
    <strong>아니오</strong> : <?=$strings['no']?> <br>
    <strong>취소</strong> : <?=$strings['cancel']?> <br>
    <strong>로그인</strong> : <?=$strings['login']?> <br>
    <strong>이 메시지는 테스트 메시지입니다.</strong> : <?=$strings['msg']?> <br>
    <strong>이 페이지의 언어는 ~~어입니다.</strong> : <?=$strings['msg2']?>
    <?=$strings['img']?>
  </p>
  <a href="index.php?lang=ko" class="btn btn-success"><?=$strings['langKR']?></a>
  <a href="index.php?lang=en" class="btn btn-success"><?=$strings['langEN']?></a>
  <a href="index.php?lang=fr" class="btn btn-success"><?=$strings['langFR']?></a>
  <a href="index.php?lang=cn" class="btn btn-success"><?=$strings['langCN']?></a>

<? include_once('../footer_ui.php'); ?>