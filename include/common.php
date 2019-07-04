<?php
	/*
	GET 파라미터를 리턴한다.
	이 떄 값의 여부를 판단하여 값이 없을 경우 두 번째로 전달되는 기본값으로 대처한다.
	*/
	$con = " "; // 검색하려는 내용
	$keyword = ""; // 검색어
	$class = ""; // span태그 class이름
	function keywordHightlight($keyword, $class, $con) {
		if ($keyword) {
			$pattern = '/'.$keyword.'/i';
			$replacement = '<span class="'.$class.'">\0</span>';
			$str = preg_replace($pattern, $replacement, $con, -1);
		} else {
			$str = $con;
		}
		return $str;
	}

	// GET
	if (!function_exists('get')) {
		function get($field, $default = false) {
			$value = $default;
			if (isset($_GET[$field])) {
				$value = $_GET[$field];
				if (!$value) {
					$value = $default;
				}
			}
			return $value;
		}
	}

	// POST
	if (!function_exists('post')) {
		function post($field, $default = false) {
			$value = $default;
			if (isset($_POST[$field])) {
				$value = $_POST[$field];
				if (!$value) {
					$value = $default;
				}
			}
			return $value;
		}
	}

	// GET_COOKIE
	if (!function_exists('get_cookie')) {
		function get_cookie($field, $default = false) {
			$value = $default;

			if (isset($_COOKIE[$field])) {
				$value = $_COOKIE[$field];

				if (!$value) {
					$value = $default;
				}
			}
			return $value;
		}
	}

	// GET_SESSION
	if (!function_exists('get_session')) {
		function get_session($field, $default = false) {
			$value = $default;

			if (isset($_SESSION[$field])) {
				$value = $_SESSION[$field];

				if (!$value) {
					$value = $default;
				}
			}
			return $value;
		}
	}

	// REDIRECT
	if(!function_exists('redirect')) {
		function redirect($url=FALSE, $msg=FALSE, $exit = TRUE) {
			$html = "<!doctype html>";
			$html.= "<html>";
			$html.= "<head>";
			$html.= "<meta charset='utf-8'>";

			if ($msg) {
				$html.= "<script type='text/javascript'>alert('".$msg."');</script>";
			}

			if ($url) {
				$html.="<meta http-equiv='refresh' content='0; url=".$url."'>";
			} else {
				$html.="<script type='text/javascript'>history.back();</script>";
			}

			$html.= "</head>";
			$html.= "<body></body>";
			$html.= "</html>";
			echo($html);

			if ($exit == TRUE) {
				exit();
			}
		}
	}

	// Randum 비밀번호 생성
	/** 인증번호 만들기 **/
	if(!function_exists('get_random_string')) {
		function get_random_string($len = 8) {
			$k = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$Randum = "";
			for ($i = 0; $i < $len ; $i++) { 
				$Randum.=substr($k, rand(0, strlen($k)-1),1);
			}
			return $Randum;
		}
	}

	/***** 파일 업로드 구현 *****/
	if (!function_exists('upload')) {
		function upload($name, $type, $size, $tmp_name, $array_ext = FALSE, $max_size = FALSE) {
			/** 1) 최대 용량이 지정되지 않은 경우 기본 용량은 20M **/
			if (!$max_size) {
				$max_size = 32 * 1024 * 1024;
			}

			/** 2) 업로드 정보 중에서 하나라도 값이 없다면 업로드 실패 **/
			if (!$name || !$type || !$size || !$tmp_name) {
				return -1; // 업로드 된 파일 없음
			}

			/** 3) 확장자 처리 **/
			$p = strrpos($name, '.') + 1;
			$l = strlen($name);
			$file_ext = strtolower(substr($name, $p, $l - $p));

			if (is_array($array_ext)) {
				$find = FALSE;
				for ($i = 0; $i < count($array_ext); $i++) {
					if ($file_ext == strtolower($array_ext[$i])) {
						$find = TRUE;
						break;
					}
				}

				if (!$find) {
					return -2; // 허용된 확장자 아님
				}
			}

			/** 4) 업로드된 파일의 용량과 설정된 최대 용량 비교 **/
			if ($size > $max_size) {
				return -3; // 허용된 용량 초과
			}

			/** 5) 파일이 업로드될 폴더 작업 **/
			$upload_dir_uri = "/attach/".date('Ymd', time()).'/';
			$upload_dir_path = $_SERVER['DOCUMENT_ROOT'].$upload_dir_uri;

			// 폴더가 없으면 만든다.
			if (!file_exists($upload_dir_path)) {
				$dir_create = mkdir($upload_dir_path, 0777, true);

				if (!$dir_create) {
					return -4; // 업로드 폴더 생성 실패
				}
			}

			/** 6) 파일 복사하기 **/
			// 일단 무한 루프
			// 파일이름
			$file_name = time().'.'.$file_ext;
			for ($i = 1; $i > 0 ; $i++) { 
				// 파일이 복사될 웹상의 경로
				$upload_uri = $upload_dir_uri.$file_name;
				// 파일이 복사될 전체 경로
				$upload_path = $upload_dir_path.$file_name;

				// 이미 같은 파일명이 있다면 이름 변경 후 반복 다시 수행
				if (file_exists($upload_path)) {
					$file_name = time()."_".$i.".".$file_ext;
					continue;
				}

				// 파일복사, 퍼머션 변경, 루프중단
				copy($tmp_name, $upload_path);
				chmod($upload_path, 0777);
				break;
			}

			/** 7) 업로드된 파일의 정보를 배열로 구성하기 **/
			$result['dir']         = $upload_dir_uri;
			$result['file_name']   = $file_name;
			$result['file_type']   = $type;
			$result['file_size']   = $size;
			$result['origin_name'] = $name;
			$result['full_path']   = $upload_path;
			return $result;
		}
	}

	/***** 파일 멀티 업로드 구현 *****/
	if (!function_exists('do_upload')) {
		function do_upload($field, $array_ext = FALSE, $max_size = FALSE) {
			// 리턴할 데이터
			$data = FALSE;

			/** 1) 해당 필드가 존재하는지 체크 **/
			if (!isset($_FILES[$field])) {
				return FALSE; // 업로드 필드 없음
			}

			/** 2) 임시폴더에 업로드된 파일의 정보 얻기 **/
			$name     = $_FILES[$field]['name'];
			$type     = $_FILES[$field]['type'];
			$size     = $_FILES[$field]['size'];
			$tmp_name = $_FILES[$field]['tmp_name'];

			/** 3) 싱글, 멀티 업로드 구분 **/
			if (!is_array($name)) {
				// 파일이름이 배열이 아닌 경우 (싱글업로드)
				$data = upload($name, $type, $size, $tmp_name, $array_ext, $max_size);
			} else {
				// 멀티업로드
				$count = count($name);
				$data = array();

				for ($i = 0; $i <  $count; $i++) { 
					$data[$i] = upload($name[$i], $type[$i], $size[$i], $tmp_name[$i], $array_ext[$i], $max_size[$i]);
				}
			}
			return $data;
		}
	}
	/***** 원본 이미지 --> 썸네일로 만드는 함수 *****/
	/**
	 * easy image resize function
	 * @param  $file - file name to resize
	 * @param  $string - The image data, as a string
	 * @param  $width - new image width
	 * @param  $height - new image height
	 * @param  $proportional - keep image proportional, default is no
	 * @param  $output - name of the new file (include path if needed)
	 * @param  $delete_original - if true the original image will be deleted
	 * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
	 * @param  $quality - enter 1-100 (100 is best quality) default is 100
	 * @return boolean|resource
	 */
	function smart_resize_image($file,
                              $string             = null,
                              $width              = 0,
                              $height             = 0,
                              $proportional       = false,
                              $output             = 'file',
                              $delete_original    = true,
                              $use_linux_commands = false,
                              $quality = 100) {

		if ( $height <= 0 && $width <= 0 ) return false;
		if ( $file === null && $string === null ) return false;
		# Setting defaults and meta
		$info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
		$image                        = '';
		$final_width                  = 0;
		$final_height                 = 0;
		list($width_old, $height_old) = $info;
		$cropHeight = $cropWidth = 0;
		# Calculating proportionality
		if ($proportional) {
			if      ($width  == 0)  $factor = $height/$height_old;
			elseif  ($height == 0)  $factor = $width/$width_old;
			else                    $factor = min( $width / $width_old, $height / $height_old );
			$final_width  = round( $width_old * $factor );
			$final_height = round( $height_old * $factor );
		} else {
			$final_width = ( $width <= 0 ) ? $width_old : $width;
			$final_height = ( $height <= 0 ) ? $height_old : $height;
			$widthX = $width_old / $width;
			$heightX = $height_old / $height;

			$x = min($widthX, $heightX);
			$cropWidth = ($width_old - $width * $x) / 2;
			$cropHeight = ($height_old - $height * $x) / 2;
		}
		# Loading image to memory according to type
		switch ( $info[2] ) {
			case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
			case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
			case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
			default: return false;
		}

		# This is the resizing/resampling/transparency-preserving magic
		$image_resized = imagecreatetruecolor( $final_width, $final_height );
		if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
			$transparency = imagecolortransparent($image);
			$palletsize = imagecolorstotal($image);
			if ($transparency >= 0 && $transparency < $palletsize) {
				$transparent_color  = imagecolorsforindex($image, $transparency);
				$transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
				imagefill($image_resized, 0, 0, $transparency);
				imagecolortransparent($image_resized, $transparency);
			}
			elseif ($info[2] == IMAGETYPE_PNG) {
				imagealphablending($image_resized, false);
				$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
				imagefill($image_resized, 0, 0, $color);
				imagesavealpha($image_resized, true);
			}
		}
		imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);

		# Taking care of original, if needed
		if ( $delete_original ) {
			if ( $use_linux_commands ) exec('rm '.$file);
			else @unlink($file);
		}

		# Preparing a method of providing result
		switch ( strtolower($output) ) {
			case 'browser':
				$mime = image_type_to_mime_type($info[2]);
				header("Content-type: $mime");
				$output = NULL;
			break;
			case 'file':
				$output = $file;
			break;
			case 'return':
				return $image_resized;
			break;
			default:
			break;
		}

		# Writing image according to type to the output destination and image quality
		switch ( $info[2] ) {
			case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
			case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
			case IMAGETYPE_PNG:
				$quality = 9 - (int)((0.9*$quality)/10.0);
				imagepng($image_resized, $output, $quality);
			break;
			default: return false;
		}
		return true;
	}

	$member_max_level = 5; // 최대 회원 레벨
	$admin_max_level = 5; // 최대 관리자 레벨
?>