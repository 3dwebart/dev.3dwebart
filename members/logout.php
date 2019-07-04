<?php
    include_once('../header.php');
    session_destroy();
    redirect($site_home, '안녕히 가세요.'); 
?>
