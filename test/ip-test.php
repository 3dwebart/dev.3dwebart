
<?php
/*
	error_reporting(E_ALL); 
	ini_set('display_errors', 1);
	include_once('header.php');
	include_once('include/class.db.php');
	include_once('include/common.php');
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$ip2 = $_SERVER['HTTP_CLIENT_IP'];
	$ip3 = $_SERVER['HTTP_X_FORWARDED_FOR'];
	echo('<h1>ip = '.$ip.'</h1>');
	echo('<h1>ip2 = '.$ip2.'</h1>');
	echo('<h1>ip3 = '.$ip3.'</h1>');
*/
	
	
?>
<?php  
 function getRealIpAddr(){  
    if(!empty($_SERVER['HTTP_CLIENT_IP']) && getenv('HTTP_CLIENT_IP')){  
        return $_SERVER['HTTP_CLIENT_IP'];  
    } 
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && getenv('HTTP_X_FORWARDED_FOR')){  
        return $_SERVER['HTTP_X_FORWARDED_FOR'];  
    } 
    elseif(!empty($_SERVER['REMOTE_HOST']) && getenv('REMOTE_HOST')){  
        return $_SERVER['REMOTE_HOST'];  
    } 
    elseif(!empty($_SERVER['REMOTE_ADDR']) && getenv('REMOTE_ADDR')){  
        return $_SERVER['REMOTE_ADDR'];  
    }  
    return false;  
 } 


 if($ip = getRealIpAddr()){ 
     echo $ip; 
 } 
 ?>
<?php
/*
	error_reporting(E_ALL); 
	ini_set('display_errors', 1);
	include_once('header.php');
	include_once('include/class.db.php');
	include_once('include/common.php');
	
	function getRealIpAddr() {  
	    if (!emptyempty($_SERVER['HTTP_CLIENT_IP'])) { //check ip from share internet  
	        $ip=$_SERVER['HTTP_CLIENT_IP'];  
	    } elseif (!emptyempty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy  
	        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];  
	    } else {  
	        $ip=$_SERVER['REMOTE_ADDR'];  
	    }  
	    return $ip;  
	}
	echo(getRealIpAddr());
*/
?>