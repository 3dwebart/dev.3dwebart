<?php
	require '../youtube.inc.php';
	$youtube = new youtube;

	//$youtube->get(4);

	echo $youtube->embed_url(); 
    //results: *http://www.youtube.com/ipouIsX1phI*
    
    echo $youtube->video_title(); 
    //results: *MILLION DOLLAR HOLE IN ONE*

    echo $youtube->video_details(); 
    //results: *(NULL)*

    echo $youtube->video_url(); 
    // results: *http://www.youtube.com/watch?v=ipouIsX1phI*

     echo $youtube->video_thumbnail(); 
    // results: *(NULL)*




?>
<script src="mediaelement-and-player.min.js"></script>
<link rel="stylesheet" href="mediaelementplayer.css" />

<video width="640" height="360" id="player1" preload="none">
    <source type="video/youtube" src="http://www.youtube.com/watch?v=nOEw9iiopwI" />
</video>
<div width="640" height="360" src="http://www.youtube.com/embed/ipouIsX1phI?feature=player_detailpage" frameborder="0" allowfullscreen></div>