<? include_once('../header_ui.php'); ?>

<?php
  $lang = post('lang', 'kr');
  //$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
 
  if ($lang == "ko") // 한국어
  {
    include_once('kr.php');
  }
  else if ($lang == "en") // 영어
  {
    include_once('en.php');
  }
  else // 일치하는 언어 없으면 영어로 표시
  {
    include_once('kr.php');
  }
  
  $language = $lang;
  
?>
<script>
  $(function() {
    $('.btn-kr').click(function() {
      $('.myform > .hidden-form').attr('value', 'kr');
      $('.myform').attr('method', 'post');
      $('.myform').attr('action', 'index2.php');
      $('.myform').submit();
    });
    $('.btn-en').click(function() {
      $('.myform > .hidden-form').attr('value', 'en');
      $('.myform').attr('method', 'post');
      $('.myform').attr('action', 'index2.php');
      $('.myform').submit();
    });
    $('.btn-fr').click(function() {
      $('.myform > .hidden-form').attr('value', 'fr');
      $('.myform').attr('method', 'post');
      $('.myform').attr('action', 'index2.php');
      $('.myform').submit();
    });
    $('.btn-cn').click(function() {
      $('.myform > .hidden-form').arrt('value', 'cn');
      $('.myform').attr('method', 'post');
      $('.myform').attr('action', 'index2.php');
      $('.myform').submit();
    });
    $('.btn-home').click(function() {
      $('.myform').attr('method', 'post');
      $('.myform').attr('action', 'index2.php');
      $('.myform').submit();
    });
  });
</script>
<form class="myform" method="post" action="">
      <input type="hidden" name="lang" value="" class="hidden-form">
  <h1>브라우저 언어 : <?=$lang?></h1>
  <p>
    <strong>예</strong> : <?=$strings['Yes']?> <br>
    <strong>아니오</strong> : <?=$strings['no']?> <br>
    <strong>취소</strong> : <?=$strings['cancel']?> <br>
    <strong>로그인</strong> : <?=$strings['login']?> <br>
    <strong>이 메시지는 테스트 메시지입니다.</strong> : <?=$strings['msg']?> <br>
    <strong>이 페이지의 언어는 ~~어입니다.</strong> : <?=$strings['msg2']?><br />
    
  </p>
      <button type="submit" class="btn btn-success btn-kr"><?=$strings['langKR']?></button>
      <button type="submit" class="btn btn-success btn-en"><?=$strings['langEN']?></button>
      <button type="submit" class="btn btn-success btn-fr"><?=$strings['langFR']?></button>
      <button type="submit" class="btn btn-success btn-cn"><?=$strings['langCN']?></button>
      <button type="submit" class="btn btn-success btn-home">home</button>
  </form>

<? include_once('../footer_ui.php'); ?>