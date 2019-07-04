<?
header("Content-Type: text/html; charset=utf-8");
$strings = array (
	'tmpl' => array(),
	'ko' => array (
		/***** Top Bar Start *****/
		// Language Select Start
		'langKR' => '한국어',
		'langEN' => '영어',
		'langFR' => '프랑스어',
		'langCN' => '중국어',
		'language' => '한국어',
		// Language Select End
		// Member Login - logout Start
		'login' => "로그인",
		'logout' => '로그아웃',
		'MemberJoin' => '회원가입',
		'MemberEdit' => '회원정보수정',
		'ResetPW' => '비밀번호 재설정',
		'Administrator' => '관리자',
		'MemberOut' => '회원 탈퇴',
		// Member Login - logout End
		/***** Top Bar End *****/
		/***** Navigation Start *****/
		/* Main - 1 */
		'Navi1About' => '소개',
		/* Main - 2 */
		'Navi2Portfolio' => '포트폴리오',
		// sub - 2-1
		'Navi21WorkOf3D' => '3D 작품',
		// sub - 2-2
		'Navi21WorkOfWebsite' => '웹 사이트',
		// sub - 2-3
		'Navi21WorkOfArt' => '일러스트 아트',
		/* Main - 3 */
		'Navi3CollectionOfPoems' => '詩집',
		// sub - 3-1
		'FirstBookOfPoems' => '이야기 마당',
		// sub - 3-2
		'EventMovie' => '행사 동영상',
		// sub - 3-3
		'PraiseSocietyGethering' => '찬양단 모임',
		// sub - 3-4
		'MissionarySocietyGethering' => '선교단 모임',
		/* Main - 4 */
		'Navi4Study' => '스터디',
		// sub - 4-1
		'Navi41WebDevelopment' => '웹 개발',
		/***** Navigation End *****/
		'Yes' => "예",
		'no' => "아니오",
		'cancel' => "취소"
	),
	'en' => array (
		/***** Top Bar Start *****/
		// Language Select Start
		'langKR' => 'korean',
		'langEN' => 'english',
		'langFR' => 'French',
		'langCN' => 'Chinese',
		'langJP' => 'Japanese',
		'language' => 'english',
		// Language Select End
		// Member Login - logout Start
		'login' => "Sign in",
		'logout' => 'Sign Out',
		'MemberJoin' => 'Join',
		'MemberEdit' => 'My FlatSharp',
		'ResetPW' => 'Password Reset',
		'Administrator' => 'Administrator',
		'MemberOut' => 'Member Out',
		// Member Login - logout End
		/***** Top Bar End *****/
		/* Main - 1 */
		'Navi1About' => 'About US',
		/* Main - 2 */
		'Navi2Portfolio' => 'Portfolio',
		// sub - 2-1
		'Navi21WorkOf3D' => 'Work of 3D',
		// sub - 2-2
		'Navi21WorkOfWebsite' => 'Work of web site',
		// sub - 2-3
		'Navi21WorkOfArt' => 'Work of Illust ART',
		/* Main - 3 */
		'Navi3CollectionOfPoems' => 'Collection of poems',
		// sub - 3-1
		'Episode' => '이야기 마당',
		// sub - 3-2
		'EventMovie' => '행사 동영상',
		// sub - 3-3
		'PraiseSocietyGethering' => '찬양단 모임',
		// sub - 3-4
		'MissionarySocietyGethering' => '선교단 모임',
		/* Main - 4 */
		'Navi4Study' => 'Study',
		// sub - 4-1
		'Navi41WebDevelopment' => 'Web Development',
		/***** Navigation End *****/
		'Yes' => "예",
		'no' => "아니오",
		'cancel' => "취소"
	)
);
//echo json_encode($strings, 256 );

echo json_encode($strings,JSON_UNESCAPED_UNICODE);

?>