<?php
	include_once('./header_ui.php');

	$member_skin    = post('member_skin');
	$homepage       = post('homepage', 'n');
	$homepage_ess   = post('homepage_ess', 'n');
	$address        = post('Address', 'n');
	$address_ess    = post('address_ess', 'n');
	$tel            = post('tel', 'n');
	$tel_ess        = post('tel_ess', 'n');
	$fax            = post('fax', 'n');
	$fax_ess        = post('fax_ess', 'n');
	$sign           = post('sign', 'n');
	$sign_ess       = post('sign_ess', 'n');
	$self_intro     = post('self_intro', 'n');
	$self_intro_ess = post('self_intro_ess', 'n');
	$user_level     = post('user_level');
	$image_use      = post('image_use');
	$image_level    = post('image_level');
	$image_size     = post('image_size');
	$image_width    = post('image_width');
	$image_height   = post('image_height');
	$id_nic_ban     = post('id_nic_ban');
	$terms          = post('terms');
	$policy         = post('policy');

	$sql = "UPDATE member_config 
			SET member_skin = '%s', 
			homepage = '%s', homepage_ess = '%s', 
			address = '%s', address_ess = '%s', 
			tel = '%s', tel_ess = '%s', fax = '%s', fax_ess = '%s', 
			sign = '%s', sign_ess = '%s', self_intro = '%s', self_intro_ess = '%s', 
			user_level = %d, image_use = %d, image_level = %d, 
			image_size = %d, image_width = %d, image_height = %d, 
			id_nic_ban = '%s', 
			terms = '%s', 
			policy = '%s'";
	$result = $db -> query($sql, array(
				$member_skin, 
				$homepage, $homepage_ess,
				$address, $address_ess, 
				$tel, $tel_ess, $fax, $fax_ess, 
				$sign, $sign_ess, $self_intro, $self_intro_ess, 
				$user_level, $image_use, $image_level, 
				$image_size, $image_width, $image_height, 
				$id_nic_ban, 
				$terms, 
				$policy
  			));

	if(!$result) {
		redirect(false, '게시판 설정에 실패 하였습니다.\n관리자에게 문의하여 주십시오.');
	}

	redirect(false, '기세판 설정을 완료하였습니다.');

	include_once('./footer_ui.php');
?>