<?php

require_once 'Thumbnail.class.php';


$watermark = new ThumbnailWatermark;
$Thumbnail_path = 'Thumbnail';
$sourcefiles = Array(
	'sample_1.jpg',
	'sample_2.jpg'
);

Thumbnail::setOption('debug', true);

for ($L1 = 0; $L1 < count($sourcefiles); $L1++)
{

	// case 1
	// 크기를 120x120 으로 설정하고 크기 안에 이미지가 모두 보이도록 설정
	// 워터마크는 사용안함
	Thumbnail::create($sourcefiles[$L1],
					  120, 120,
					  SCALE_SHOW_ALL,
					  Array(
						  'savepath' => '%PATH%%FILENAME%_thumb-case-1.%EXT%'
					  ));

	// case 2
	// 크기를 120x120 으로 설정하고 크기 안에 이미지가 모두 보이도록 설정
	Thumbnail::create($sourcefiles[$L1],
					  120, 120,
					  SCALE_SHOW_ALL,
					  Array(
						  'preprocess' => Array(&$watermark, 'preprocess'),
						  'postprocess' => Array(&$watermark, 'postprocess'),
						  'savepath' => '%PATH%%FILENAME%_thumb-case-2.%EXT%'
					  ));

	// case 3
	// 크기를 120x120 으로 설정하고 이미지가 크기에 꽉 차도록 설정
	Thumbnail::create($sourcefiles[$L1],
					  120, 120,
					  SCALE_EXACT_FIT,
					  Array(
						  'preprocess' => Array(&$watermark, 'preprocess'),
						  'postprocess' => Array(&$watermark, 'postprocess'),
						  'savepath' => $Thumbnail_path.'/%FILENAME%.%EXT%'
					  ));

	// case 4
	// 넓이만 120 픽셀로 고정하고, 기본 옵션을 PNG 파일로 출력하도록 설정
	Thumbnail::setOption('export', EXPORT_PNG);
	Thumbnail::create($sourcefiles[$L1],
					  120, null,
					  null,
					  Array(
						  'preprocess' => Array(&$watermark, 'preprocess'),
						  'postprocess' => Array(&$watermark, 'postprocess'),
						  'savepath' => '%PATH%%FILENAME%_thumb-case-4.%EXT%'
					  ));
	Thumbnail::setOption('export', EXPORT_JPG);

}