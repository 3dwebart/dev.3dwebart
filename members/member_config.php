<?php
	$sql = "SELECT member_skin, homepage, homepage_ess, address, address_ess, tel, tel_ess, fax, fax_ess, sign, sign_ess, self_intro, self_intro_ess, user_level, image_use, image_level, image_size, image_width, image_height, id_nic_ban, terms, policy FROM member_config";

	$result = $db -> query($sql);

	$member_config = $db -> fetch_assoc();

	$member_skin = $site_dir.'/skin/member/'.$member_config['member_skin'];
	$member_skin_path = $site_home.'/skin/member/'.$member_config['member_skin'];
?>

