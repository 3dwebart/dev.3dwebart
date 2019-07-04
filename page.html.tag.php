<?php include_once("header_ui.php"); ?>
	<link href="assets/frontend/layout/css/page.html.tag.css" rel="stylesheet">
	<!-- Theme styles END -->
<!-- Head END -->
<script type="text/javascript">
	$(function() {
		$("li").is(":last-child").css("background", "1px solid #333");
	});
</script>
	<!-- 메인 내용 Start -->
	<div class="main">
		<div class="container">
			<ul class="fixed-index-menu">
				<li>
					<a href="#A">
						A
					</a>
				</li>
				<li>
					<a href="#B">
						B
					</a>
				</li>
				<li>
					<a href="#C">
						C
					</a>
				</li>
				<li>
					<a href="#D">
						D
					</a>
				</li>
				<li>
					<a href="#E">
						E
					</a>
				</li>
				<li>
					<a href="#F">
						F
					</a>
				</li>
				<li>
					<a href="#G">
						G
					</a>
				</li>
				<li>
					<a href="#H">
						H
					</a>
				</li>
				<li>
					<a href="#I">
						I
					</a>
				</li>
				<li>
					<a href="#J">
						J
					</a>
				</li>
				<li>
					<a href="#K">
						K
					</a>
				</li>
				<li>
					<a href="#L">
						L
					</a>
				</li>
				<li>
					<a href="#M">
						M
					</a>
				</li>
				<li>
					<a href="#N">
						N
					</a>
				</li>
				<li>
					<a href="#O">
						O
					</a>
				</li>
				<li>
					<a href="#P">
						P
					</a>
				</li>
				<li>
					<a href="#Q">
						Q
					</a>
				</li>
				<li>
					<a href="#R">
						R
					</a>
				</li>
				<li>
					<a href="#S">
						S
					</a>
				</li>
				<li>
					<a href="#T">
						T
					</a>
				</li>
				<li>
					<a href="#U">
						U
					</a>
				</li>
				<li>
					<a href="#V">
						V
					</a>
				</li>
				<li>
					<a href="#W">
						W
					</a>
				</li>
				<li>
					<a href="#X">
						X
					</a>
				</li>
				<li>
					<a href="#Y">
						Y
					</a>
				</li>
				<li>
					<a href="#Z">
						Z
					</a>
				</li>
			</ul>
			<!-- 좌측 탭메와 우측 미니 슬라이더 Start -->
			<div class="row mix-block margin-bottom-40">
				<h1 class="alert alert-warning border-warning">
					HTML TAG Dictionary
				</h1>
				<div class="note note-info">
					아래 코딩은 웹 2.0 이전의 코딩 방법을 정리해 놓은 것이다.<br />
					현제 쓰이고 있는 것도 있지만 웹 표준과 웹 접근성의 문제로 인해 사라진 코딩도 있다.<br />
					아래 내용이 필요한 경우는 기존의 웹에서 약간의 리뉴얼을 하게 될 때 필요해 질 수도 있기 때문에 아래 내용을 숙지하고 있으면 웹 2.0과 HTML5에서 적용시 많은 도움이 되리라고 본다.
				</div>
				<div class="note note-danger">
					HTML문서는 기본적으로 시작부분이 있으면 끝나는 부분이 있다.<br />
		            시작부분은 &lt;와 &gt;사이에 태그명을 넣어주면 되고 끝나는 부분은 &lt;와 &gt;사이에 /태그명을 넣어주면 된다.<br />
					단, 몇가지 특수한 태그는 끝나는 부분이 없다.<br />
		            예} &lt;br&gt; &lt;img ...&gt;<br />
					잠시 웹표준형 코딩 방법을 살펴보면 위와 같은 코딩에 자체적으로 /를 넣어준다.<br />
		            예} &lt;br /&gt; &lt;img ... /&gt;
				</div>
				<div class="note note-success">
							<a name="doctype">웹 페이지 작성시 필수 입력 사항 doctype</a><br />
							<span class="bold red-text">doctype은 웹페이지 작성시 항상 최 상위에 명시 되어야 한다.</span><br /><br />
							
							trict(엄격): 사용이 중지된 요소를 금지한다.<br />
							Transitional(변이): 사용이 중지된 요소를 허용한다.<br />
							Frameset(프레임셋): 대부분 프레임 관련 요소에서만 허용한다.<br /><br />
							
							html4,html5,xhtml의 관계<br /><br />
							
							<a href="http://ko.wikipedia.org/wiki/HTML">위키 백과 참조</a><br /><br />
							
							DOCTYPE이란?<br /><br />
							
							웹페이지를 올바르게 처리하게 위해 선언하는 문서 유형 정의(Document Type Definition)를 사용해야하는데 이 부분을 브라우저가 알 수 있어야만 원하는 모습이 제대로 표현된다<br />
							DOCTYPE은 문서 유형을 정의하는 구문이라 할 수 있으며 HTML4,XHTML,HTML5에 따라 달라진다.<br /><br />
							
							<h3 class="bold">HTML4.01 DOCTYPE</h3>
							이전 버전으로 제작된 HTML문서와의 호환성을 유지<br /><br />

							&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/html4/loose.dtd"&gt;<br /><br />
							
							정확한 표준모드를 유지<br /><br />
							
							&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/html4/strict.dtd"&gt;<br /><br />
							
							프레임셋을 사용하는 웹사이트에 사용<br /><br />
							
							&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/html4/frameset.dtd"&gt;<br /><br />
							
							<h3 class="bold">XHTML1.0 DOCTYPE</h3>
							
							이전 버전으로 제작된 HTML문서와의 호환성을 유지<br /><br />
							
							&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"&gt;<br />
							(일반 xhtml문서의 경우 기존 태그와의 호환성 떄문에 가장 많이 사용되는 doctype형식이다)<br /><br />
							
							정확한 표준모드를 유지<br /><br />
							
							&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"&gt;<br /><br />
							
							프레임셋을 사용하는 웹사이트에 사용<br />
							<span class="red-text">** Frameset은 HTML5의 표준에서 제외되었기 떄문에 가급적 사용하지 않는 것이 바람직하다.</span><br /><br />
							
							&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"&gt;<br /><br />

							<h3 class="bold">XHTML1.1 DOCTYPE</h3>

							XML과 HTML을 1.0에 비해서 더 강력하게 결합한 형태.<br />
							HTML5가 등장한 이후 표준 제작이 중단되었다<br /><br />

							&lt;?xml version="1.0" encording="UTF-8"?&gt;<br />
							&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"&gt;
							
							<h3 class="bold">HTML5 DOCTYPE</h3>
							
							모든 부분에 사용<br /><br />
							
							&lt;!DOCTYPE HTML&gt;
				</div>
				<div class="row left-padding-30">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="A" >
							A
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;A&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">&lt;A&gt;링크 제목글 또는 이미지&lt;/A&gt;</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<li class="col-md-12">
									<img src="assets/frontend/layout/img/html.jpg" class="img-responsive" />
								</li>
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
							</ul>
							<ul class="right-padding-20">
								<li class="col-md-12">
									<div class="col-md-3">
										href="URL"
									</div>
									<div class="col-md-9">
										하이퍼링크로 호출되는 파일
									</div>
								</li>
								
								<li class="col-md-12">
									<div class="col-md-3">
										name="이름"
									</div>
									<div class="col-md-9">
										중간 부분을 지정하기 위한 html 도큐먼트 부분 명명. 이 이름은 또 다른 &lt;A&gt;태그의 href= 속성에 사용될 수 있다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										target=""
									</div>
									<div class="col-md-9">
										"프레임 이름 또는 윈도우"<br />
										프레임과 함께 사용되는 파일이 디스플레이되어야 할 프레임이나 윈도우를 나타냄
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										_blank
									</div>
									<div class="col-md-9">
										새창 띄우기
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										_parent
									</div>
									<div class="col-md-9">
										프레임에서 바로 전 창으로 돌아감
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										_self
									</div>
									<div class="col-md-9">
										현제 창 또는 현제 프레임
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										_top
									</div>
									<div class="col-md-9">
										프레임으로 제작시 가장 최상위 창이 바뀜
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-12 note note-default non-bottom-margin">
										위 그림에서 보면 left.html과 content.html 파일이 bottom.html 파일안에서 돌아가고 bottom.html과 top.html은 index.html안에서 돌아간다
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-12 note note-default non-bottom-margin">
										_parent와 _top은 이런 식의 프레임 홈페이지에 많이 쓰이는데 _parent는 한단계 전, _top은 최상의의 파일을 바꿔준다.<br />
										즉 초록색 안에서 _parent를 타겟으로 지정하면 bottom.html 전체가 바뀌게 되고 똑같이 초록색 안이지만 _top을 타겟으로 지정하면 index.html 전체가 바뀌게 된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										사용 예
									</div>
									<div class="col-md-9">
										&lt;A href="http://www.naver.com" target="_balnk"&gt;네이버 새창&lt;/A&gt;<br />
										&lt;A href="http://www.naver.com" target="_self"&gt;네이버 현제창&lt;/A&gt;<br /><br />
										
										&lt;A name="gogo" target="_self"&gt;책갈피&lt;/A&gt;<br />
										&lt;A href="#gogo" target="_self"&gt;클릭하면 책갈피로 이동합니다&lt;/A&gt;
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;APPLET&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">페이지에 자바 애플릿을 삽입</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										align=""
									</div>
									<div class="col-md-9">
										"left" , "right" , "top" , "middle" "bottom"<br />
										에플릿의 출력 내용이 윈도우에 정렬되는 상태
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										lt="텍스트"
									</div>
									<div class="col-md-9">
										애플릿이 제대로 로드되지 않을 경우에 표시되는 텍스트
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										code="URL"
									</div>
									<div class="col-md-9">
										자바 애플릿의 이름
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										codebase="URL"
									</div>
									<div class="col-md-9">
										에플릿이 저장되어 있는 디렉토리
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										height=수치,width=수치
									</div>
									<div class="col-md-9">
										애플릿의 출력 내용의 가로와 세로의 크기(pixel 딘위 - ex : width: 300 height: 200 - 가로 300픽셀 세로 200픽셀)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										hspace=수치, vspace=수치
									</div>
									<div class="col-md-9">
										애플릿과 그 주변 텍스트 사이의 가로와 세로 공간으로, 픽셀값으로 나타냄
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										name=명칭
									</div>
									<div class="col-md-9">
										페이지상의 다른 에플릿들이 이 에플릿을 참조할 수 있는 이름
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;AREA&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">&lt;MAP&gt;태그로 제작된 이미지 맵 내에 링크 영역을 지정</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										alt="텍스트"
									</div>
									<div class="col-md-9">
										텍스트 브라우저에 표시될 텍스트
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										coords=""
									</div>
									<div class="col-md-9">
										좌표1.좌표2,좌표3...<br />
										영역의 경계선에 대한 좌표(각 형태는 좌표들을 지정하는데 나름대로의 규칙이 있다.)<br />
										coords="a,b,c,d"<br />
										a = topleft 좌표<br />
										b = topright 좌표<br />
										c = bottomleft 좌표<br />
										d = bottomright 좌표<br />
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										href="URL"
									</div>
									<div class="col-md-9">
										링크된 파일의 URL
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										nohref
									</div>
									<div class="col-md-9">
										링크를 갖고 있지 않도록 하는 영역을 정의
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										shape=""
									</div>
									<div class="col-md-9">
										"rect" or "circle" or "poly"<br />
										정의될 형태의 유형<br />
										rect : 맵 버튼의 형식은 사각형<br />
										circle : 맵 버튼의 형식은 원형<br />
										poly : 맵 버튼의 형식은 다각형
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										target="프레임"
									</div>
									<div class="col-md-9">
										_blank : 새창 띄우기<br />
										_parent : 프레임에서 바로 전 창으로 돌아감<br />
										_self : 현제 창 또는 현제 프레임<br />
										_top : 프레임으로 제작시 가장 최상위 창이 바뀜<br /><br />
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				
				
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="B" >
							B
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="bold_B">
						&lt;B&gt;내용&lt;/B&gt;
						</a>
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">볼드체로 설정할 텍스트를 표시 - <strong><large>알아두기 : &lt;B&gt;내용&lt;/B&gt;는 웹표준 에서는 <a href="#strong">&lt;strong&gt;&lt;/strong&gt;</a>을 사용합니다</large></strong></h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										예시
									</div>
									<div class="col-md-9">
										<b>볼드체</b>
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										코드
									</div>
									<div class="col-md-9">
										&lt;B&gt;볼드체&lt;/B&gt;
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;BASEFONT&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
								basefont 태그는 현재 본인이 사용하고 있는 HTML 문서에서 기본이 되는 글자크기를 지정하고자 할 때 사용하는 태그입니다.</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										
									</div>
									<div class="col-md-9">
										 명령어는 &lt;basefont size="숫자"&gt; 입니다.<br />
										 basefont는 닫는태그가 없으므로 &lt;/basefont&gt;를 사용할 필요가 없습니다.
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;BGSOUND&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">파일이 로드될 때, 음악이 재생됨</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										src="URL"
									</div>
									<div class="col-md-9">
										사운드 파일의 URL
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										loop=수치 or "infinite"
									</div>
									<div class="col-md-9">
										사운드 클립이 반복되는 횟수
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										예시
									</div>
									<div class="col-md-9">
										&lt;BGSOUND src="music/music.wmv" loop="infinite"&gt; 무한 반복<br />
										&lt;BGSOUND src="music/music.wmv" loop="3"&gt; 3번 반복
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										size="크기"
									</div>
									<div class="col-md-9">
										1에서 7까지의 글자크기. 3이 초기값임. 1에서7까지는 절대 수치이고, -1에서 +3까지는 상대크기.<br />
										※ 픽셀 단위로 지정할 수 있음 / 예) 12px
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;BIG&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">큰 크기로 텍스트를 나타냄</h5>
					</div>
				</div>
				
				
				
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;BODY&gt; 본문내용 &lt;/BODY&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">HTML의 가장 기본이 되는 최상위 태그인 &lt;html&gt;와 &lt;/html&gt;안의 본문 표시 영역</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-12 note note-success non-bottom-margin">
										아내 속성은 웹표준에서는 권장하지 않습니다.<br />
										웹표준에서는 아래 속성을 스타일시트로 정의 하는것을 권장합니다<br />
										기본 body태그의 속성에 이런것이 있다는 것만 알아두시기 비랍니다
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										alink="#RRGGBB" or "색이름(red/green/blue/white/black/orange등 기본 정의된 색상)"
									</div>
									<div class="col-md-9">
										마우스 오버 또는 클릭된 링크의 색상, 16진수의 RGB값이나 색이름
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										link="#RRGGBB" or "색이름"<br />(red/green/blue/white/black / orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										하이퍼 링크의 색상
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										vlink="#RRGGBB" or "색이름"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										한번 이상 방문한 링크의 색상
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										text="#RRGGBB" or "색이름"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										일반적 텍스트의 색상
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										bgcolor="#RRGGBB" or "색이름"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										배경색
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										background="URL"
									</div>
									<div class="col-md-9">
										배경으로 사용될 이미지 파일(웹용 파일인 jpg, png, gif만 사용 가능)<br /><br />
										<strong>
										※ 필자의 경험 - 
										가끔 jpg파일인데 왜 웹에서 아무것도 안보이냐고 하는 분들 있다.<br />
										문제는 확장자와 경로가 맞는데 왜 안되냐고 하는데 결론은 저장할 때 확장자는 jpg가 맞지만 color값이 RGB Color가 아니라 CMYK Color 였다는 것이다.<br />
										안되는 사람은 이 문제를 먼저 확인해보길...
										</strong>
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										bgproperties="fixed"
									</div>
									<div class="col-md-9">
										배경 이미지가 스크롤되지 않음
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										topmargin=수치
									</div>
									<div class="col-md-9">
										상단 여백 크기(단위 : 픽셀)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										rightmargin=수치
									</div>
									<div class="col-md-9">
										오른쪽 여백 크기(단위 : 픽셀)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										bottommargin=수치
									</div>
									<div class="col-md-9">
										아래쪽 여백 크기(단위 : 픽셀)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										leftmargin=수치
									</div>
									<div class="col-md-9">
										왼쪽 여백 크기(단위 : 픽셀)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										size="크기"
									</div>
									<div class="col-md-9">
										1에서 7까지의 글자크기. 3이 초기값임. 1에서7까지는 절대 수치이고, -1에서 +3까지는 상대크기.<br />
										※ 픽셀 단위로 지정할 수 있음 / 예) 12px
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										스타일 시트로 정의 했을 때
									</div>
									<div class="col-md-9">
										alink, link, vlink 는 다음과 같이 정의 할 수 있다<br /><br />
										링크 태그( &lt;a&gt; )의 기본 색은 파랑색<br />
										마우스 오버시 색상은 빨간색<br />
										방문한 링크의 색상은 초록색으로 정의 해 보겠다.<br /><br />
										&lt;style&gt;<br />
										a { /* &lt;a&gt; 태그의 모든 동작을 초기화 */<br />
										color: #0000FF; /* 또는 */<br />
										color: blue;<br />
										}<br /><br />
										
										a:hover { /* &lt;a&gt; 태그에 마우스가 올라갔을 떄 */<br />
										color: #FF0000; /* 또는 */<br />
										color: red;<br />
										}<br /><br />
										
										a:vlink { /* &lt;a&gt; 태그에 마우스가 올라갔을 떄 */<br />
										color: #00FF00; /* 또는 */<br />
										color: green;<br />
										}<br />
										&lt;/style&gt;<br /><br />
										
										여기에 body 태그 안에 들어갈 텍스트 색과은 흰색 배경색은 어두운 그레이 색으로 넣는다면<br /><br />
										
										&lt;style&gt;<br />
										a { /* &lt;a&gt; 태그의 모든 동작을 초기화 */<br />
										color: #0000FF; /* 또는 */<br />
										color: blue;<br />
										}<br /><br />
										
										a:hover { /* &lt;a&gt; 태그에 마우스가 올라갔을 떄 */<br />
										color: #FF0000; /* 또는 */<br />
										color: red;<br />
										}<br /><br />
										
										a:vlink { /* &lt;a&gt; 태그에 마우스가 올라갔을 떄 */<br />
										color: #00FF00; /* 또는 */<br />
										color: green;<br />
										}<br /><br />
										
										body {<br />
										background: #333333; /* 또는 */<br />
										background-color: #333333;<br />
										color: #FFFFFF;<br />
										}<br />
										&lt;/style&gt;<br /><br />
										
										여기에 배경이미지를 추가
										
										&lt;style&gt;<br />
										a { /* &lt;a&gt; 태그의 모든 동작을 초기화 */<br />
										color: #0000FF; /* 또는 */<br />
										color: blue;<br />
										}<br /><br />
										
										a:hover { /* &lt;a&gt; 태그에 마우스가 올라갔을 떄 */<br />
										color: #FF0000; /* 또는 */<br />
										color: red;<br />
										}<br /><br />
										
										a:vlink { /* &lt;a&gt; 태그에 마우스가 올라갔을 떄 */<br />
										color: #00FF00; /* 또는 */<br />
										color: green;<br />
										}<br /><br />
										
										body {<br />
										background: #333333 url(이미지 경로/이미지파일) 이미지 반복속성; /* 또는 */<br />
										background-color: #333333;<br />
										background-umage: url(이미지 경로/이미지파일) 이미지 반복속성;<br />
										color: #FFFFFF;<br />
										}<br />
										&lt;/style&gt;<br /><br />
										
										위에서 이미지 반복속성을 알아보면<br /><br />
										
										repeat : 화면에 가득 찰 때까지 반복(기본값)<br />
										no-repeat : 배경 이미지는 한번만 나옴<br />
										repeat-x : 가로축으로만 한줄로 반복<br />
										repeat-y : 세로축으로만 한줄로 반복<br /><br />
										
										no-repeat 일 때 배경이미지의 위치값을 줄 수 있다<br /><br />
										
										background: #333333 url(이미지 경로/이미지파일) 가로위치 세로위치;<br /><br />
										
										가로위치 - <br />
										left : 왼쪽<br />
										right : 오른쪽<br />
										center : 좌우 중앙<br />
										수치로 줄 경우 : 펙셀 단위로 기술 하며 해당 픽셀만큼 왼쪽에서 떨어진다<br /><br />
										
										세로위치 - <br/>
										top : 위쪽<br />
										bottom : 아래쪽<br />
										center : 상하 중앙<br />
										수치로 줄 경우 : 펙셀 단위로 기술 하며 해당 픽셀만큼 위쪽에서 떨어진다<br /><br />
										
										ex)<br />
										background: #333333 url(이미지 경로/이미지파일) no-repeat center top;/* 배경색은 어두운 그레이 색이고 배경이미지는 위쪽 가운데 붇는다 */<br />
										background: #333333 url(이미지 경로/이미지파일) no-repeat center center;/* 배경색은 어두운 그레이 색이고 배경이미지는 정중앙에 붇는다 */<br />
										background: #333333 url(이미지 경로/이미지파일) no-repeat 300px 200px;/* 배경색은 어두운 그레이 색이고 배경이미지는 왼쪽에서 300px 위쪽에서 200px 쩔어진 곳에 붙는다 */<br />			
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;BR&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">줄 내림(키보드 엔터기 기능</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										
									</div>
									<div class="col-md-9">
										<strong>TIP</strong><br />
										기본적으로 HTML은 줄내림 기능이 없다<br />
										그래서 줄내림을 위해서는 &lt;BR&gt;을 사용해야 된다<br />
										칸띄기도 지원되지 않으며 스페이스바를 10번 눌렀다고 해도 칸이 10칸 띄어지는 것이 하니라 한칸만 띄어지게 된다.<br />
										이 떄 사용 하는 것이 &amp;nbsp; 코드이다.<br />
										&amp;nbsp;코드를 여러번 써주면 써준 만큰 스페이스(공백)로 인삭한다.
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="C" >
							C
						</a>
					</h4>
				</div>
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;CENTER&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">가운데 정렬</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;CITE&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">인용문을 설정</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;CODE&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">컴퓨터 코드로 텍스트를 나타냄</h5>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="D" >
							D
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;DD&gt;
						&lt;DL&gt;
						&lt;DT&gt;
						&lt;/DT&gt;
						&lt;/DL&gt;
						&lt;/DD&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							&lt;DD&gt;정의 목록 그룹<br />
							&lt;DL&gt;정의 목록<br />
							&lt;DT&gt;정의 목록에서 용어로서 설정될 텍스트&lt;/DT&gt;<br />
							&lt;/DL&gt;<br />
							&lt;/DD&gt;<br />
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										
									</div>
									<div class="col-md-9">
										정의 목록에서 정의문으로 설정될 텍스트를 나타냄<br />
										&lt;DT&gt;와 &lt;DT&gt;안의 내용은 &lt;DL&gt;와 &lt;/DL&gt;안에 포함되고<br />
										&lt;DL&gt;과 &lt;/DL&gt;은 &lt;DD&gt;와 &lt;/DD&gt;안에 포함 된다
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;DFN&gt;&lt;/DFN&gt;
					</div>
					<div class="col-md-9 left-border non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							정의문을 설정
						</h5>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;DIR&gt;&lt;/DIR&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							세로 방향으로 놓여지는 리스트를 만든다(20항목까지) - 웹표준에서 제외된 태그입니다 어떤건지만 알고 넘어갑시다 ^^
						</h5>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;DIV&gt;&lt;/DIV&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							요소들의 세트를 그룹짓는다.<br />
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										
									</div>
									<div class="col-md-9">
										&lt;DIV&gt&lt;/DIV&gt;는 무속성이므로 스타일 시트로 크기 및 위차값등을 정의 할 수 있는 고급 코딩을 할 수 있다.<br />
										&lt;DIV&gt&lt;/DIV&gt;안에 포함되는 내용은 뒤에 나올 &lt;UL&gt&lt;LI&gt;&lt;OL&gt&lt;SPAN&gt;등등 무수히 많으며 속성 자체가
										무속성이므로 &lt;TABLE&gt;도 포함시켜 직관적으로 코딩 할 수 있다.<br />
										&lt;DIV&gt;가 갖고 있는 기본 속성은 align="left" , "right" , "center"로 좌우 정렬을 의미하지만 웹표준에서는 사용되지는 않는다.
										(웹표준에서는 사용되지 않고 스타일 시트로 정의하여 사용)
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="E" >
							E
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;EM&gt;&lt;/EM&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							강조될 텍스트를 나타냄
						</h5>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;EMBED&gt;&lt;/EMBED&gt;
					</div>
					<div class="col-md-9 left-border non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							페이지에 동영상, 음악, 플래시 파일을 삽입 - 현재 잘 사용되지 않는다
						</h5>
					
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										width=수치, height=수치
									</div>
									<div class="col-md-9">
										width=수치 height=수치 가로와 세로 크기, 단위 : 픽셀
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										name="이름"
									</div>
									<div class="col-md-9">
										다른 오브젝트들이 이것을 참조하는데 사용되는 이름
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										param="값"
									</div>
									<div class="col-md-9">
										프로그램에서 매개 변수로 지정되는 값
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										src="URL"
									</div>
									<div class="col-md-9">
										웹에 보여질 파일 경로/파일명.확장자
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="F" >
							F
						</a>
					</h4>
				</div>

				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;FONT&gt;&lt;/FONT&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							텍스트를 나타낼 떄 텍스트에 특별한 글자 속성을 부여함
						</h5>
					
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										color="#RRGGBB" 또는 "색이름"<br />(red/green/blue/white/black / orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										텍스트의 색, 16진수의 RGB값이나 색상명
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										face="글꼴명"
									</div>
									<div class="col-md-9">
										글꼴 이름
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										size="크기"
									</div>
									<div class="col-md-9">
										1에서 7까지의 글자 크기, 초기값은 3<br />
										-1에서 +3은 상대적인 크기임<br />
										※ 필셀 단위(px)로 부여 할 수도 있다<br />
										예시)&lt;FONT size="12px"&gt;
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row box-area box non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;FORM&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							폼을 작성할 때 가장 바깥 블록에 사용되는 태그문
						</h5>
					
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										action="URL"
									</div>
									<div class="col-md-9">
										전송 버튼을 클릭하면 작동.<br />
										양식 데이터가 해당 URL로 보내지게 하는 스크립트
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										method=""<br />
									</div>
									<div class="col-md-9">
										get 또는 post<br />
										get과 post의 목적은 사용자의 데이터를 서버로 전송하는게 목적이다.<br />
										그러면 둘다 목적이 갔으데 왜 get과 post로 나눴나?<br />
										왜냐하면 get뒤에 붙는 글자수는 255개로 제한이되어있다 그래서 255를 넘어가면 잘라버리게된다.<br />
										그렇지만 post는 ?뒤에 사용자의 데이터가 들어오는게 아니라<br />
										헤더 밑에 사용자의 데이터를 구분해서 제한없이 무제한으로 사용할수가 있다.<br /><br />

										<img src="assets/frontend/layout/img/get.gif" class="img-responsive" /><br />

										&lt;GET 방식&gt;<br /><br />

										<img src="assets/frontend/layout/img/post.gif" class="img-responsive" /><br />
										&lt;POST 방식&gt;<br /><br />

										위의 그림과 같이 get방식은 http해더에 사용자데이터가 포함되어있고<br />
										post방식은 http해더와 사용자 데이터가 분리되어 있는것을 알수 있을것이다.<br /><br />

										그렇기때문에 Web Server에서 파싱을 할때 get방식이냐 post방식이냐에 따라서 파싱을 다르게 해주어야할것이다.<br />
										get방식의 경우는 filePath부분을 분리해서 ?를 기준으로 나누면서 파싱을 해야 할 것이고<br />
										post방식은 "\r\n\r\n" 개행문자 2개를 기준으로 해더부분과 데이터부분을 나누면 될 것이다.<br />
										unix기반 os일경우에는 "\n\n"으로 나누면 될것이다.<br /><br />

										post 방식일 경우 content-length를 보고 사용자 데이터가 있는지 없는지 확인 할수 있을것이다.<br />
										0인경우가 사용자 데이터가 없는 경우일것이다.<br /><br />

										위에 설명 한것을 보면 http해더가 get이냐 post이냐에 따라서 해더가 바뀌는 것뿐이 없을 것같지만<br />
										http해더가 다르게 나오는 경우가 한가지 더있다.<br />
										파일(첨부파일)을 전송할때의  해더가 다르다.<br /><br />

										file은 get방식은 255바이트 뿐이 할수없기때문에 사용할수가 없고<br />
										post방식에서 사용이 가능하다<br />
										그래서 &lt;input type="file" method="post" enctype="multipart/form-data"&gt; 해주어야한다.<br />
										multipart는 파트가 여러개라는 의미이다.<br />
										나중에 헤더부분 그림을 올리겠다.<br /><br />

										Get과 Post file이 브라우저로 부터 넘오올때 http해더부분이 다르기 때문에 파싱을 각각 따로따로 해주어야한다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										size="크기"
									</div>
									<div class="col-md-9">
										1에서 7까지의 글자 크기, 초기값은 3<br />
										-1에서 +3은 상대적인 크기임<br />
										※ 필셀 단위(px)로 부여 할 수도 있다<br />
										예시)&lt;FONT size="12px"&gt;
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;FRAMESET&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							프레임 세트를 만드는 태그들을 표시
						</h5>
					
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										cols=""
									</div>
									<div class="col-md-9">
										col1,col2,col3...<br />
										"단"의 세트로서 프레임세트를 설정. 단의 세트는 각각에 폭을 지정하여 나타냄. 폭은 픽셀값으로 지정되는데, 윈도우 크기에 대한 백분율로 또는 그 단이 나머지 공간을 차지한다는 표시인 별표(*)로서 나타냄.한 개 이상의 단이 별표로 지정되면, 그 공간은 균일하게 그 단의 수로 나뉘게 된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										rows=""
									</div>
									<div class="col-md-9">
										row1,row2,row3...<br />
										"열"의 세트로서 프레임 세트를 설정. 열의 세트는 각각의 높이를 지정하여 나타냄. 높이는 픽셀값으로 지정되는데, 윈도우 크기에 대한 백분율 또는 그열이 나머지 공간을 차지한다는 표시인 별표(*)로서 나타냄. 한개 이상의 단이 별표로 지정되면 그 공간은 균일하게 그 단의 수로 나뉘게 된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										frameborder=
									</div>
									<div class="col-md-9">
										1 , 0 or "yes" , "no"<br />
										프레임 세트 주위에 테두리를 설정하거나(1또는 yes)없애 버림(0또는 no)(MS사의 브라우저는 수치를 사용하고, Netscape사 것은 단어를 사용.)
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;FRAME&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							프레임 세트 내의 각각의 프레임의 속성들을 규정 ※ 서로 다른2개 이상의 페이지를 하나의 페이지로 묶을 때 사용된다.
						</h5>
					
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										frameborder=1 , 0 or "yes" , "no"
									</div>
									<div class="col-md-9">
										프레임 주위에 테두리를 설정하거나(1또는 yes)삭제해 버림(0또는 no).(MS사의 브라우저는 숫자를 사용하고,Netscape는 단어를 사용.)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										marginwidth=수치
									</div>
									<div class="col-md-9">
										프레임들 사이의 공백(가로), 수치는 픽셀단위.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										marginheight=수치
									</div>
									<div class="col-md-9">
										프레임들 사이의 공백(세로), 수치는 픽셀단위.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										name="이름"
									</div>
									<div class="col-md-9">
										프레임에 대한 타겟명(&lt;A&gt;와 &lt;AREA&gt;태그를 사용하여 그 특정 프레임으로 강조된 파일들을 보냄)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										noresize
									</div>
									<div class="col-md-9">
										유저가 프레임 크기를 바꾸지 못함<br />
										※ 이 부분을 넣어주지 않으면 마우스 드레그로 프레임 사이즈를 변경 할 수 있다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										scrolling="yes" ,"no" , "auto"
									</div>
									<div class="col-md-9">
										스크롤 바를 포함시키거나 없애 버림. 초기값에("auto")은 프레임의 내용들이 테두리 밖으로 넘어갈 때만 스크롤 바가 나타남<br />
										yes : 무조건 스크롤바 나옴<br />
										no : 무조건 스크롤바 안나옴<br />
										auto : 해당 웹페이지의 크기에 따라 페이지가 작으면 안나오고 스크롤바가 안나오고, 페이지가 크면 스크롤바가 나온다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										src="URL"
									</div>
									<div class="col-md-9">
										해당 프레임에 놓여질 파일의 URL
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="G" >
							G
						</a>
					</h4>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="H" >
							H
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;H1&gt;&lt;/H1&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							텍스트 1단계 제목으로 나타냄(가장 큰 제목 크기)
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;H2&gt;&lt;/H2&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							텍스트 2단계 제목으로 나타냄
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;H3&gt;&lt;/H3&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							텍스트 3단계 제목으로 나타냄
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;H4&gt;&lt;/H4&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							텍스트 4단계 제목으로 나타냄
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;H5&gt;&lt;/H5&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							텍스트 5단계 제목으로 나타냄
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;H6&gt;&lt;/H6&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							텍스트 6단계 제목으로 나타냄
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;HEAD&gt;&lt;/HEAD&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							일잔벅으로 &lt;HTML&gt; 태그 바로 아래 들어가는 태그로써 HTML문서의 Header부분.<br />
							일반적으로 자바스크립트나 스타일시트 부분을 헤더부분에서 불러오며, 메타태그등을 사용시 이 부분 안에서 선언 한다.
						</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;HR&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							가로 괘선을 만든다 &lt;HR&gt; 태그는 닫는 태그가 없으므로 그냥 &lt;HR&gt; 로 표기하거나 xhtml 표준 방식인 &lt;HR /&gt; 로 표기 한다.
						</h5>
					
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										align=""
									</div>
									<div class="col-md-9">
										"left"또는 "right" 또는 "center"<br />
										문서에서 괘선의 정렬 상태
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										color="#RRGGBB" 또는 "색이름"
									</div>
									<div class="col-md-9">
										괘선의 색, RGB값이나(16진수) 색이름
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										noshade
									</div>
									<div class="col-md-9">
										괘선에 대한 초기값인 3D음영을 없앰
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										size=수치
									</div>
									<div class="col-md-9">
										괘선의 길이(픽셀값)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										width=수치
									</div>
									<div class="col-md-9">
										괘선의 폭(픽셀값)
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;HTML&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							노드상 가장 최상위에 존재하는 태그<br />
							모든 기본적인 html 문서의 시작과 끝을 표시한다<br />
							문서의 끝나는 부분은 &lt;/html&gt;
						</h5>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="I" >
							I
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;I&gt;&lt;/I&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							이탤릭체로 텍스트를 나타냄
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;IMG&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							이미지나 비디오 클립을 삽입
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										align=""
									</div>
									<div class="col-md-9">
										"left", "right", "center"
										문서속에서 이미지나 비디오클립의 좌우 정렬
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										valign=""
									</div>
									<div class="col-md-9">
										"top", "middle", "bottom"
										문서속에서 이미지나 비디오클립의 상하 정렬
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										alt="텍스트"
									</div>
									<div class="col-md-9">
										텍스트 전용 브라우저나 제대로 로드되지 않을 경우에 표시될 텍스트<br />
										<span class="red-text bold">중요 - 웹 접근성에 맞는 문법 표현을 위해 이미지 태그 사용시 alt속성은 필수 입력 사항이다.</span>
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										border=수치
									</div>
									<div class="col-md-9">
										테두리의 폭, 픽셀값(초기값은 border=1)<br />
										일반적으로 border=0 으로 해 놓는다.<br />
										이유는 이미지 버튼으로 사용시 버튼을 클릭하면 이미지에 테두리가 생기기 때문.<br />
										border 값을 주는 경우는 겔러리나 특수 목적에서 사용되는 경우가 있을 수 있다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										controls
									</div>
									<div class="col-md-9">
										비디오 조절, dynsrc=과 함께 사용됨
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										dynsrc="URL"
									</div>
									<div class="col-md-9">
										삽입될 AVI파일을 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										height=수치,width=수치
									</div>
									<div class="col-md-9">
										이미지나 비디오 클립의 가로(width)와 세로(height)의 크기(픽셀값)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										hspace=수치,vspace=수치
									</div>
									<div class="col-md-9">
										주변 텍스트와 사이의 가로와 세로 공간(픽셀값)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										ismap
									</div>
									<div class="col-md-9">
										이미지가 서버 측 이미지 맵임을 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										loop=수치 또는 "infinite"
									</div>
									<div class="col-md-9">
										dynsrc=와 함께 사용, 비디오 클립이 반복되는 횟수
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										src="URL"
									</div>
									<div class="col-md-9">
										삽입될 이미지의 URL
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										start="fileopen" , "mouseover"
									</div>
									<div class="col-md-9">
										dynsrc=와 함께 사용, 비디오 클립이 작동되게 해주는 이벤트
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										<a name="usemap">
										usemap="#이름"
										</a>
									</div>
									<div class="col-md-9">
										클라이언트 측 이미지 맵으로 사용될 맵의 명칭, 이 이름은 <MAP> 태그의 name=속성이 지정하는 것이다
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;INPUT&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							폼(&lt;FORM&gt;~&lt;/FORM&gt;)내에 입력 요소를 만든다
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										type=""
									</div>
									<div class="col-md-9">
										"text","password", "email","tel", "button", "checkbox", "radio", "submit", "image", "reset", "hidden"<br />
										삽입할 입력 요소의 유형
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="text"
									</div>
									<div class="col-md-9">
										입력폼 (ex : 이름 입력)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										minlength="길이"
									</div>
									<div class="col-md-9">
										type=text에 대하여, 엔트리의 최소 길이, 글자 수
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										maxlength="길이"
									</div>
									<div class="col-md-9">
										type=text에 대하여, 엔트리의 최대 길이, 글자 수
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="password"
									</div>
									<div class="col-md-9">
										비밀번호 입력폼 삽입시 사용<br />
										만약 비밀번호를 abcd 라고 입력하면 사용자 화면에서 보여지는 화면은 **** 로 보여지게 된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="email"
									</div>
									<div class="col-md-9">
										이메일 입력폼에 사용된다<br />
										입력 양식은 아이디@도메인으로 입력해야 된다
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="tel"
									</div>
									<div class="col-md-9">
										전화번호 입력 약식에 사용된다<br />
										이 양식으로 입력된 내용이 출력되면 스마트폰에서 번호를 누를때 전화 연결이 된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										size="크기"
									</div>
									<div class="col-md-9">
										type="text", "password", "email", ""tel"에 대하여, 텍스트 상자의 길이
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="button"
									</div>
									<div class="col-md-9">
										입력폼을 버튼 요소로 바꿔준다
										이때 버튼이름은 value="버튼이름" 으로 입력해줘야 한다<br />
										ex) &lt;input type="button" value="입력 내용 확인" /&gt;<br />
										위와 같이 해주게 되면 "입력 내용 확인" 이라는 버튼이 생성된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="checkbox"
									</div>
									<div class="col-md-9">
										
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										checked
									</div>
									<div class="col-md-9">
										type=checkbox, radio에 대하여, 초기값으로 선택해 놓을 상자나 버튼을 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="radio"
									</div>
									<div class="col-md-9">
										
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="submit"
									</div>
									<div class="col-md-9">
										
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="image"
									</div>
									<div class="col-md-9">
										
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										src="URL"
									</div>
									<div class="col-md-9">
										type=image에 대하여, 버튼으로 사용되는 이미지를 나타냄
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="reset"
									</div>
									<div class="col-md-9">
										
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="hidden"
									</div>
									<div class="col-md-9">
										
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										name="이름"(모든 type 공통 속성)
									</div>
									<div class="col-md-9">
										입력 내용이 CGI 등으로 보내질 때 변수명으로 사용되는 제어의 이름<br />
										type=radio에 대하여, 그룹내의 모든 라디오 버튼들은 똑같은 이름을 갖고 있음
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										value="이름"(모든 type 공통 속성)
									</div>
									<div class="col-md-9">
										type=checkbox : 상자가 체크되면 보내지는 변수 값.<br />
										type=text : 입력폼에서 기본적으로 나오게 될 초기 값 또는 보내지는 변수 값<br />
										type=submit, reset, button : 버튼 위에 표시된 텍스트
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										readonly(모든 type 공통 속성)
									</div>
									<div class="col-md-9">
										읽기 전용으로 만들어 줌
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="J" >
							J
						</a>
					</h4>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="K" >
							K
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;KBD&gt;&lt;/KBD&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							키보드 입력으로 설정될 텍스트
						</h5>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="L" >
							L
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="li">
						&lt;LI&gt;&lt;/LI&gt;
						</a>
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							번호 없는 목록<a href="#ul">&lt;ul&gt; (Un Order List) &lt;/ul&gt;</a> 번호 있는는 목록<a href="#ol">&lt;ol&gt; (Order List) &lt;/ol&gt;</a> 안에 새로운 항목을 만든다(&lt;DIR&gt;()웹표준에서는 제외된 항목),&lt;MENU&gt;,&lt;OL&gt;,&lt;UL&gt;과 사용)
						</h5>
					
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										type=""(type은 li에 직접 적용하기 보다는 상위인 ol또는 ul에 적용하여 사용하는것이 보편적이다)
									</div>
									<div class="col-md-9">
										"A","a","I","i","disc","circle","square", "decimal", "decimal-leading-zero"<br />
										항목에 대한 수치나 방점 스타일을 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="A"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 대문자 A B C ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="a"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 소문자 a b c ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="I"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 대문자 I II III ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="i"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 i ii iii ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="disc"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 채워진 작은 원이 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="circle"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 비어 있는 즉 테두리가 원인 작은 원이 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="square"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 채워진 작은 사각박스가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="decimal"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 1 2 3 ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="decimal-leading-zero"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 0부터 0 1 2 ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="none"
									</div>
									<div class="col-md-9">
										모든 스타일이 없이 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										value=수치
									</div>
									<div class="col-md-9">
										value 속성은 li 요소를 ol 요소의 하위 요소로 사용할 경우에만 사용할 수 있는 속성입니다.<br />
										목록의 순서를 지정할 수 있는 속성이기 때문에 반드시 정수형 값을 사용합니다.<br /><br />
										ex)<br />
										&lt;h4&gt;금주의 인기가요 - Top 5위부터 1위까지 확인하실 수 있습니다.&lt;/h4&gt;<br />
										&lt;ol&gt;<br />
											&lt;li value="5"&gt;좋은날 - 아이유&lt;/li&gt;<br />
											&lt;li value="4"&gt;바람이 분다 - 이소라&lt;/li&gt;<br />
											&lt;li value="3"&gt;꿈에 - 박정현&lt;/li&gt;<br />
											&lt;li value="2"&gt;왜 - 동방신기&lt;/li&gt;<br />
											&lt;li value="1"&gt;아잉 - 오렌지카라멜&lt;/li&gt;<br />
										&lt;/ol&gt;
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="M" >
							M
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;MAP&gt;&lt;/MAP&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							클라이언트 측 이미지 맵 지정 (&lt;IMG&gt;태그의 <a href="#usemap">usemap=속성으로 참조)</a>
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										name="이름"
									</div>
									<div class="col-md-9">
										맵에 이름을 붙여 줌
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;MARQUEE&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							화면위로 텍스트를 스크롤
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										align="top", "middle", "bottom"
									</div>
									<div class="col-md-9">
										문서에서의 정렬 상태를 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										behavior="scroll", "slide", "alternate"
									</div>
									<div class="col-md-9">
										스크롤 행동을 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										behavior="scroll"(초기값)
									</div>
									<div class="col-md-9">
										일정방향으로 스크롤
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										behavior="slide"
									</div>
									<div class="col-md-9">
										반대쪽에 도달할 때까지 스크롤
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										behavior="alternate"
									</div>
									<div class="col-md-9">
										좌우로 반복하기
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										bgcolor=""
									</div>
									<div class="col-md-9">
										#RRGGBB" or "색상명<br />
										(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										direction=""
									</div>
									<div class="col-md-9">
										"left", "right", "up", "down"
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										direction="left"
									</div>
									<div class="col-md-9">
										화면의 왼쪽으로 스크롤
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										direction="right"
									</div>
									<div class="col-md-9">
										화면의 오른쪽으로 스크롤
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										direction="up"
									</div>
									<div class="col-md-9">
										화면의 위쪽으로 스크롤
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										direction="down"
									</div>
									<div class="col-md-9">
										화면의 아래쪽으로 스크롤
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										height=수치 or %, weight=수치 or %
									</div>
									<div class="col-md-9">
										스크롤 영역의 가로(width)와 세로(height) 크기, 픽셀(px)값이나 화면 높이에 대한 백분율(%)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										hspace=수치, vspace=수치
									</div>
									<div class="col-md-9">
										&lt;marquee&gt;태그 주변 객체와의 사이의 가로와 세로 공간(픽셀값)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										loop=수치 or "infinite"
									</div>
									<div class="col-md-9">
										스크롤이 반복되는 횟수<br />
										infinite : 무한반복
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										scrollamount=수치
									</div>
									<div class="col-md-9">
										스크롤의 속도를 정해준다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										scrlldelay=수치
									</div>
									<div class="col-md-9">
										스크롤 지연값을 정해준다. 값을 많이 주면 점프하듯이 스크롤<br />
										1/1000초 단위
									</div>
								</li> 
							</ul>
						</div>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;MENU&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							&lt;menu&gt;태그로 둘러 쌓인 컨텐트에 각각의 &lt;menuitem&gt;태그를 배치하여 사용자가 해당 영역에서 마우스 오른쪽 바튼을 클릭하면 &lt;menuitem&gt; 요소들이 메뉴처럼 펼쳐지는 기능 
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;MENUITEM&gt;&lt;/MENUITEM&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							&lt;menu&gt;태그 안에 들어가는 리스트 항목
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;META /&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							html 문서에 대한 일반적 정보를 제공
						</h5>
						<h6 class="col-md-12 note note-success">
							우리가 메타데이터(meta data)라고 부르는 것이 있습니다.<br />
							쉽게 말해서 정보의 정보를 지칭하는 단어입니다. 우리가 무작위로 나열된 정보를 보다 효율적으로 분류하고 찾기 위해 또 다시 정보에 정보를 부여하게 되는 데 그 부여된 정보를 우리는 '메타데이터(meta data)'라고 합니다.<br /><br />
							
							웹에서 '페이지'는 정보를 뜻합니다.<br />
							하지만, 그 페이지에 대한 '정보'도 필요해지기 시작했습니다.<br />
							그래서 페이지의 정보를 표현하기 위해  페이지의 정보를 표현하는 '태그'인 &lt;meta&gt;태그가 등장했습니다.<br /><br />
							
							&lt;meta&gt;요소는 &lt;head&gt;요소 내에 위치하며 해당 페이지에 정보를 포함하고 있습니다.<br />
							이 메타요소는 페이지의 정보이기도 하며, 검색 엔진이 페이지를 파악할 수 있는 페이지에 대한 키워드, 제작자, 유효기간 설정같이 다양한 목적에 사용될 수 있습니다.<br /><br />
							
							&lt;meta&gt;요소는 빈 요소이므로 닫기 태그가 없으며 속성을 사용하여 정보를 설정합니다.<br /><br />
							
							&lt;meta name="description" content="나를 위한 에세이" /&gt;<br /><br />
							
							description : 페이지의 설명을 포함합니다.<br />
							검색엔진이 페이지에 대한 정보를 파악할 때 사용되며 최대 155자까지 입력할 수 있습니다. 이 설명은 검색엔진의 결과에서 나타나기도 합니다.<br /><br />
							
							&lt;meta name="keywords" content="에세이,자서전,블로그" /&gt;<br /><br />
							
							keywords : 사용자가 페이지를 찾기 위해 검색할 수 있는 단어목록에 해당됩니다. ,로 키워드를 구분하여 쓸 수 있습니다.<br /><br />
							
							&lt;meta name="robots" content="?" /&gt;<br />
							
							? = noindex, nofollow<br /><br />
							
							검색엔진이 해당 페이지를 검색결과에 추가할지 여부를 지정합니다.<br />
							noindex이면 해당 페이지를 검색결과에 추가하지 않습니다.<br />
							nofollow이면 검색엔진에 추가가 되지만 링크된 페이지는 추가되지 않습니다.<br /><br />
							
							http-equiv와 content또한 쌍으로 사용하게 됩니다.<br /><br />
							
							&lt;meta http-equiv="author" content="John lutece" /&gt;<br />
							작가의 이름을 넣습니다.<br /><br />
							
							&lt;meta http-equiv="pragma" /&gt;<br />
							페이지를 캐시에서 가져오지 않고 서버에서 항상 새로온 페이지를 가져옵니다.<br /><br />
							
							&lt;meta http-equiv="expires" content="Fri, 04 Apr 2014 23:59:59 GMT" /&gt;<br />
							캐시의 유효기간을 설정할 수 있습니다.<br /><br />
							
							캐시 : 임시로 저장된 데이터를 보관하는 공간이라고 생각하시면 됩니다.<br />
							우리가 흔히 접속했던 기록들이 남는 공간이기도 합니다.<br /><br />
							
							meta태그의 기본형<br /><br />
							xhtml 방식<br />
							&lt;meta http-equiv="content-type" content="text/html; charset=utf-8" /&gt;<br /><br />
							
							html5 방식<br />
							&lt;meta charset="utf-8" /&gt;<br /><br />
							
							모바일 웹을 위한 meta태그 설정<br />
							&lt;meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=dpi"&gt;
						</h6>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										content="값"
									</div>
									<div class="col-md-9">
										HTTP 행동을 위해 http-squiv으로 지정된 용도의 값. 자동 페이지 로드시 기다리는 시간을 초 단위로 나타냄
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										http-equiv="http 행동"
									</div>
									<div class="col-md-9">
										규정해 놓아야 할 HTTP행동. 자동 페이지 로딩시에는, http-equiv="refresh"를 사용
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										url="URL"
									</div>
									<div class="col-md-9">
										http-equiv="refresh"와 함께 사용되는데, 다음에 로드될 파일을 나타냄
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										charset=""
									</div>
									<div class="col-md-9">
										문서의 인코딩 값<br />
										국내 기준으로 euc-kr과 utf-8이 있다<br />
										euc-kr은 영어와 한글을 지원<br />
										utf-8 은 다국어 지원<br />
										요즘은 글로벌한 웹을 지향하기 떄문에 utf-8로 문서를 인코딩 하는 추세이다.
									</div>
								</li>
								<h5 class="col-md-12 alert alert-danger">
									모바일 웹을 위한 meta태그 설정
								</h5>
								<li class="col-md-12">
									<div class="col-md-3">
										name="viewport"
									</div>
									<div class="col-md-9">
										모바일 기기에 따른 해상도를 지원하게 해준다
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=midium-dpi"
									</div>
									<div class="col-md-9">
										크기와 모바일에서 확대, 축소 여부를 설정한다
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										width=device-width
									</div>
									<div class="col-md-9">
										가로 크리를 디바이스 즉, 모바일 기기의 크기에 맞게 맞춰준다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										initial-scale=1.0
									</div>
									<div class="col-md-9">
										기본 화면 배휼(1 = 100%)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										maximum-scale=1.0
									</div>
									<div class="col-md-9">
										최대 확대할 수 있는 배율(1 = 100%)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										minimum-scale=1.0
									</div>
									<div class="col-md-9">
										최대 축소 할 수 있는 배륳(1 = 100%)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										user-scalable=no
									</div>
									<div class="col-md-9">
										사용자가 터치로 확대 또는 축소 할 수 있는지 여부 : yes면 확대 축소 기능 활성화
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										target-densitydpi=dpi
									</div>
									<div class="col-md-9">
										서로 다른 장치들 간의 화면 가로 해상도를 일정하게(320px) 유지한다.<br />
										(겔럭시 노트와 같은 일부 폰은 제외)
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;MULTICOL&gt;(구식 태그이므로 어떤건지만 훑어 본다)
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							다단에 설정될 텍스트
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										cols=수치
									</div>
									<div class="col-md-9">
										단의 수
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										gutter=수치
									</div>
									<div class="col-md-9">
										단들 사이의 간격(픽셀값)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										width=수치
									</div>
									<div class="col-md-9">
										단의 폭, 픽셀값
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="N" >
							N
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;NOBR&gt;&lt;/NOBR&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							일정 부분의 텍스트에서 줄 바꿈 기능을 끈다. &lt;nobr&gt;과 &lt;/nobr&gt; 안에서 강제로 단어 바꿈을 하려면 &lt;wbr&gt; 태그를 사용한다.
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;NOEMBED&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							플러그 인을 지원하지 않는 브라우저들에 표시될 내용을 나타냄.
						</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;NOFRAMES&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							프레임을 지원하지 않는 브라우저들에 표시될 내용을 나타냄.(웹표준에서 프레임 태그 자체를 권장하지 않으므로 이런것이 있다라고만 알아두기 바란다.)
						</h5>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;NOSCRIPT&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							스크립트 언어를 지원하지 않는 브라우저들에 표시될 것을 나타냄.(이런 브라우저가 아직도 존재하는지는 모르겠음 ^^)
						</h5>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="O" >
							O
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;OBJECT&gt;&lt;/OBJECT&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							이미지, 매체 파일, 프로그램 등의 오브젝트를 삽입
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										align=""
									</div>
									<div class="col-md-9">
										"left", "right", "center", "top", "middle", "bottom"
										문서에서 오브젝트의 정렬 상태
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										border=수치
									</div>
									<div class="col-md-9">
										오브젝트 주위의 테두리의 폭 - 단위 : 픽셀(px)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										classid="class 지정자"
									</div>
									<div class="col-md-9">
										플러그 인이나 프로그램에 대한 지정(삽입될 오브젝트의 유형에 따라 달라짐)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										codebase="URL"
									</div>
									<div class="col-md-9">
										프로그램을 담고 있는 디렉토리
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										codetype="MIME 유형"
									</div>
									<div class="col-md-9">
										프로그램의 MIME 유형
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										data="URL"
									</div>
									<div class="col-md-9">
										페이지에 삽입될 오브젝트의
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										width=수치,height=수치
									</div>
									<div class="col-md-9">
										오브젝트의 가로(width)와 세로(height) 크기(단위 : 픽셀)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										hspace=수치,vspace=수치
									</div>
									<div class="col-md-9">
										오브젝트와 주변 객체와의 사이에 가로와 세로 간격(단위 : 픽셀)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										name="이름"
									</div>
									<div class="col-md-9">
										다른 프로그램들이 그 오브젝트를 참조하는데 사용하는 이름
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										shapes
									</div>
									<div class="col-md-9">
										이미지 맵에서처럼 오브젝트가 하이퍼 링크 형태가 되도록 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										standby="텍스트"
									</div>
									<div class="col-md-9">
										오브젝트가 로드되는 동안에 디스플레이되는 텍스트
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="MIME 유형"
									</div>
									<div class="col-md-9">
										오브젝트의 MIME유형
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										usemap="이름"
									</div>
									<div class="col-md-9">
										클라이언트 측 이미지 맵의 이름.
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="ol">
						&lt;OL&gt;&lt;/OL&gt;
						</a>
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							번호가 있는 목록(Order List)을 만든다. &lt;OL&gt;&lt;/OL&gt;안에는 <a href="#li">&lt;LI&gt;&lt;/LI&gt;</a>가 쓰인다
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										type=""(ol에서 type을 지정하면 하위인 li에 적용 된다)
									</div>
									<div class="col-md-9">
										"A","a","I","i","disc","circle","square", "decimal", "decimal-leading-zero"<br />
										항목에 대한 수치나 방점 스타일을 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="A"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 대문자 A B C ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="a"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 소문자 a b c ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="I"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 대문자 I II III ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="i"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 i ii iii ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="disc"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 채워진 작은 원이 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="circle"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 비어 있는 즉 테두리가 원인 작은 원이 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="square"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 채워진 작은 사각박스가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="decimal"(&lt;OL&gt;&lt;/OL&gt;의 기본 값)
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 1 2 3 ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="decimal-leading-zero"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 0부터 0 1 2 ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="none"
									</div>
									<div class="col-md-9">
										모든 스타일이 없이 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										start=숫자
									</div>
									<div class="col-md-9">
										시작번호를 지정
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="option">
						&lt;OPTION&gt;&lt;/OPTION&gt;
						</a>
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							드롭다운 박스의 하위 옵션을 만든다, <a href="#select">&lt;SELECT&gt; &lt;/SELECT&gt;</a>안에 사용
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										value="텍스트"
									</div>
									<div class="col-md-9">
										옵션을 선택하면 보내지는 값
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										selected
									</div>
									<div class="col-md-9">
										초기값으로 선택될 옵션을 지정
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="P" >
							P
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;P&gt;&lt;/P&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							하나의 단락
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										align=""
									</div>
									<div class="col-md-9">
										"left", "right", "center"<br />
										문서에서의 단락의 정렬 상태
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;PARAM&gt;&lt;/PARAM&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							프로그램에 매개 변수를 전달, &lt;OBJECT&gt;나 &lt;APPLET&gt; 태그와 함께 사용됨
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										name="명칭"
									</div>
									<div class="col-md-9">
										값이 배정될 매개변수의 이름
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										value="값"
									</div>
									<div class="col-md-9">
										매개 변수의 값
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										valuetype="data", "ref", "object"
									</div>
									<div class="col-md-9">
										값이 해석되는 방법을 나타냄:data는 초기값이고, ref는 URL,object는 같은 도큐먼트에서의 오브젝트의 URL
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="MIME유형"
									</div>
									<div class="col-md-9">
										데이터의 MIME 유형
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;PRE&gt;&lt;/PRE&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							태그가 무시된 텍스트를 나타냄<br />
							글 쓰기 하는 위치대로 글이 써지며 칸띄기(Enter)키나 공백(space Bar)키를 여러번 눌러보면 그만큼 칸이 떨어지게 된다.<br />
							주로 프로그램 소스코드를 표현할 때 많이 사용된다.
						</h5>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="Q" >
							Q
						</a>
					</h4>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="R" >
							R
						</a>
					</h4>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="S" >
							S
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="s_underline">
						&lt;S&gt;&lt;/S&gt;
						</a>						
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							밑줄체 텍스트 (<a href="#strike">&lt;STRIKE&gt;</a>와 동일)
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;SAMP&gt;&lt;/SAMP&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							견본으로 설정될 텍스트를 나타냄
						</h5>
					</div>
				</div>
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;SCRIPT&gt;&lt;/SCRIPT&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							스크립트 언어를 사용하기 위한 태그 - javascript와 JQuery를 사용한다
						</h5>
						<h5 class="col-md-12 note note-success">
							사용 방법 1 <br />
							&lt;script type="text/javascript" src="외부 자바스크립트 경로/외부자바스크립트 파일이름.js"&gt;&lt;script&gt;<br />
							사용 방법 2 <br />
							<pre>
&lt;script type="text/javascript"&gt;
	javascript soorce code OR JQuery soorce code
&lt;script&gt;
							</pre>
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										type=""
									</div>
									<div class="col-md-9">
										보편적인 type : text/javascript<br />
										텍스트로 작성한 자바스크립트라는 뜻이다.<br />
										일부 JQuery 플러그인 중에는 type을 개발자가 바꾼 내용으로 넣기도 한다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										language="명칭"
									</div>
									<div class="col-md-9">
										스크립트가 쓰여질 언어를 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										scr="URL"
									</div>
									<div class="col-md-9">
										외부 스크립트 파일을 지정
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="select">
						&lt;SELECT&gt;&lt;/SELECT&gt;
						</a>	
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							드롭다운 박스를 만든다. &lt;SELECT&gt;&lt;/SELECT&gt;안에는 <a href="#option">&lt;OPTION&gt;&lt;/OPTION&gt;</a>이 들어간다.
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										Multiple
									</div>
									<div class="col-md-9">
										스크롤 메뉴에 복수 선택 기능 부여
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										name="이름"
									</div>
									<div class="col-md-9">
										입력내용이 CGI 등 으로 보내질 때 변수명으로 사용되는 이름을 만든다
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										size="크기"
									</div>
									<div class="col-md-9">
										지정된 크기로 스크롤 메뉴를 만든다
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;SMALL&gt;&lt;/SMALL&gt;			
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							작은 크기로 텍스트를 표현한다
						</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;SPACER&gt;&lt;/SPACER&gt;			
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							웹페이지에 공백을 삽입하기 위해 사용합니다. HTML5에서 삭제되었습니다.
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										type=""
									</div>
									<div class="col-md-9">
										"horizontal", "vertical", "block"
										공백의 유형을 결정합니다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="horizontal"
									</div>
									<div class="col-md-9">
										행에 공간을 만들어줌
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="vertical"
									</div>
									<div class="col-md-9">
										다음 항목 위에 세로로 공간을 만들어줌
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="block"
									</div>
									<div class="col-md-9">
										사각형의 공간을 만듦
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										align="left", "right"
									</div>
									<div class="col-md-9">
										type=block 일때 ,공간 주위의 왼쪽이나 오른쪽을 텍스트로 둘러쌈
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										height=수치, width=수치
									</div>
									<div class="col-md-9">
										type=block 일때 ,빈 공간의 가로(width)와 세로(height)크기(단위 : 픽셀)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										size=수치
									</div>
									<div class="col-md-9">
										size : 공백의 크기를 결정합니다.
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="strike">
						&lt;STRIKE&gt;&lt;/STRIKE&gt;
						</a>						
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							밑줄체 텍스트 (<a href="#s_underline">&lt;S&gt;</a>와 동일)
						</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="strong">
						&lt;STRONG&gt;&lt;/STRONG&gt;
						</a>						
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							볼드체(굵은 글씨체를 표현한다. (<a href="#bold_B">&lt;B&gt;&lt;/B&gt;</a>와 동일)
						</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="select">
						&lt;SUB&gt;&lt;/SUB&gt;
						</a>						
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							아래첨자로 텍스트를 나타냄
						</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						<a name="select">
						&lt;SUP&gt;&lt;/SUP&gt;
						</a>						
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							윗첨자로 텍스트를 나타냄
						</h5>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="T" >
							T
						</a>
					</h4>
				</div>

				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;TABLE&gt;&lt;/TABLE&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							테이블의 메인이 되는 최상위 태그문
						</h5>
						<h5 class="col-md-12 note note-success">
							table의 기본 사용방법
							<pre>
&lt;table&gt;
	&lt;thead&gt;
		&lt;tr&gt;
			&lt;th&gt;
			&lt;/th&gt;
			&lt;th&gt;
			&lt;/th&gt;
		&lt;/tr&gt;
	&lt;/thead&gt;
	&lt;tbody&gt;
		&lt;tr&gt;
			&lt;td&gt;
			&lt;/td&gt;
			&lt;td&gt;
			&lt;/td&gt;
		&lt;/tr&gt;
	&lt;/tbody&gt;
	&lt;tfoot&gt;
		&lt;tr&gt;
			&lt;td&gt;
			&lt;/td&gt;
			&lt;td&gt;
			&lt;/td&gt;
		&lt;/tr&gt;
	&lt;/tfoot&gt;
&lt;/table&gt;
							</pre>
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										align="left", "right", "center"
									</div>
									<div class="col-md-9">
										문서에서의 정렬 상태를 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										bgcolor="#RRGGBB" or "색이름"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										표의 배경색
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										border=수치
									</div>
									<div class="col-md-9">
										행의 테두리의 두께(픽셀값)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										bordercolor="#RRGGBB" or "색이름"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										테이블의 테두리 색
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										cellpadding=수치
									</div>
									<div class="col-md-9">
										각 셀의 테두리와 그 내용 사이의 간격(픽셀값)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										width=수치 또는 %
									</div>
									<div class="col-md-9">
										테이블의 전체 폭으로, 픽셀값이나 윈도우 크기에 대한 백분율로 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										height=수치 또는 %
									</div>
									<div class="col-md-9">
										테이블의 전체 높이로, 픽셀값이나 윈도우 크기에 대한 백분율로 지정(높이 지정은 잘 하지 않는다.)
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										cols=수치
									</div>
									<div class="col-md-9">
										합칠 테이블에서 열의 수
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										rows=수치
									</div>
									<div class="col-md-9">
										합칠 테이블에서 행의 수
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;thead&gt;&lt;/thead&gt; / &lt;tbody&gt;&lt;/tbody&gt; / &lt;tfoot&gt;&lt;/tfoot&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							xhtml에서 도입된 테이블 코딩 방식으로 HTML5에도 적용 된다.<br />
							각기 상단 본문 하단을 담당하는 부분<br />
							&lt;thead&gt;&lt;/thead&gt; 와 &lt;tfoot&gt;&lt;/tfoot&gt;은 생략 가능하다.
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										&lt;thead&gt;&lt;/thead&gt;
									</div>
									<div class="col-md-9">
										테이블의 상단 영역
										주로 주제를 표시한다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										&lt;tbody&gt;&lt;/tbody&gt;
									</div>
									<div class="col-md-9">
										테이블의 본문영역
										내용을 표시한다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										&lt;tfoot&gt;&lt;/tfoot&gt;
									</div>
									<div class="col-md-9">
										테이블의 하단영역
										하단에 위치할 내용을 표시한다.
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;tr&gt;&lt;/tr&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							테이릅의 한 행을 포현
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										bgcolor="#RRGGBB" or "색상명"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										표의 행의 배경색
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										bordercolor="#RRGGBB" or "색상명"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										행의 테두리 색상
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										valign="top", "middle", "bottom", "baseline"
									</div>
									<div class="col-md-9">
										셀의 테두리에 대한 행의 내용들의 세로 정렬 상태
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;th&gt;&lt;/th&gt; OR &lt;td&gt;&lt;/td&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							테이릅의 한 행에 포함된 하나하나의 셀을 포현
						</h5>
						<h5 class="col-md-12 note note-success">
							&lt;thead&gt;&lt;/thead&gt; 또는 &lt;tbody&gt;&lt;/tbody&gt; 또는 &lt;tfoot&gt;&lt;/tfoot&gt;태그 안에서 &lt;tr&gt;&lt;/tr&gt;태그 안에 아느것을 써도 괜찮지만 &lt;th&gt;는 제목영역으로 기본 bold체이고 &lt;td&gt;는 기본 normal 체 이므로 사용 용도에 따라 사용한다
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										bgcolor="#RRGGBB" or "색상명"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										표의 열에 해당하는 셀의 배경색
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										bordercolor="#RRGGBB" or "색상명"<br />(red/green/blue/white/black/orange등 기본 정의된 색상)
									</div>
									<div class="col-md-9">
										열에 해당하는 셀의 테두리 색상
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										align="top", "center", "left", "right"
									</div>
									<div class="col-md-9">
										열에 해당하는 셀의 테두리에 대한 행의 내용들의 가로 정렬 상태
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										valign="top", "middle", "bottom", "baseline"
									</div>
									<div class="col-md-9">
										열에 해당하는 셀의 테두리에 대한 행의 내용들의 세로 정렬 상태
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										colspan="숫자"
									</div>
									<div class="col-md-9">
										열 합치기
										다음 행의 열에도 영향을 미치므로 합칠 열의 위치를 잘 잡아야 한다.<br />
										ex)3x3의 테이블이 있다고 가정한다면<br />
										첫 행에서 1번 2번 행을 합친다면<br />
										<pre>
테이블 위 생략...
&lt;tr&gt;
	&lt;td colspan="2"&gt;
	&lt;td&gt;
&lt;tr&gt;
&lt;tr&gt;
	&lt;td&gt;
	&lt;td&gt;
	&lt;td&gt;
&lt;tr&gt;
&lt;tr&gt;
	&lt;td&gt;
	&lt;td&gt;
	&lt;td&gt;
&lt;tr&gt;
테이블 아래 생략...
										</pre><br />
										<table border="1" width="100%;">
											<tbody>
												<tr>
													<td colspan="2" align="center">1번 2번 합침</td>
													<td align="center">3번</td>
												</tr>
												<tr>
													<td align="center">4번</td>
													<td align="center">5번</td>
													<td align="center">6번</td>
												</tr>
												<tr>
													<td align="center">7번</td>
													<td align="center">8번</td>
													<td align="center">9번</td>
												</tr>
											</tbody>
										</table>
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										rowspan="숫자"
									</div>
									<div class="col-md-9">
										행 합치기
										다음 행의 열에도 영향을 미치므로 합칠 열의 위치를 잘 잡아야 한다.<br />
										ex)3x3의 테이블이 있다고 가정한다면<br />
										첫 행에서 1번 행의 2번째 열과 2번 행의 2번째 열을 합친다면<br />
										즉...<br />
										2번열과 5번열을 합친다면<br />
										<pre>
테이블 위 생략...
&lt;tr&gt;
	&lt;td&gt;
	&lt;td rowspan="2"&gt;
	&lt;td&gt;
&lt;tr&gt;
&lt;tr&gt;
	&lt;td&gt;
	&lt;td&gt;
&lt;tr&gt;
&lt;tr&gt;
	&lt;td&gt;
	&lt;td&gt;
	&lt;td&gt;
&lt;tr&gt;
테이블 아래 생략...
										</pre><br />
										<table border="1" width="100%;">
											<tbody>
												<tr>
													<td align="center">1번</td>
													<td align="center" rowspan="2">척번쨰 2번열과 두번쨰 행의 5번열을 합침</td>
													<td align="center">3번</td>
												</tr>
												<tr>
													<td align="center">4번</td>
													<td align="center">6번</td>
												</tr>
												<tr>
													<td align="center">7번</td>
													<td align="center">8번</td>
													<td align="center">9번</td>
												</tr>
											</tbody>
										</table>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="U" >
							U
						</a>
					</h4>
				</div>

				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;U&gt;&lt;U&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							밑줄이 쳐질 텍스트를 나타냄
						</h5>
					</div>
				</div>

				<div class="row box-area non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;UL&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger">
							번호 없는 목록(Un Order List)을 만든다.
						</h5>
						<div class="contentsd-explanation">
							<ul class="right-padding-20">
								<h4 class="col-md-3 alert alert-info text-center">
									속성
								</h4>
								<h4 class="col-md-9 alert alert-info text-center">
									설명
								</h4>
								<li class="col-md-12">
									<div class="col-md-3">
										type=""(ol에서 type을 지정하면 하위인 li에 적용 된다)
									</div>
									<div class="col-md-9">
										"A","a","I","i","disc","circle","square", "decimal", "decimal-leading-zero"<br />
										항목에 대한 수치나 방점 스타일을 지정
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="A"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 대문자 A B C ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="a"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 소문자 a b c ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="I"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 대문자 I II III ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="i"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 i ii iii ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="disc"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 채워진 작은 원이 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="circle"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 비어 있는 즉 테두리가 원인 작은 원이 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="square"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 안이 채워진 작은 사각박스가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="decimal"(&lt;OL&gt;&lt;/OL&gt;의 기본 값)
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 1 2 3 ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="decimal-leading-zero"
									</div>
									<div class="col-md-9">
										li를 여러개 사용 했다면 li 안에 들어간 항목과 별개로 항목 앞에 li의 순서대로 로마 숫자 표기로 소문자 0부터 0 1 2 ... 라는 순서가 표시된다.
									</div>
								</li>
								<li class="col-md-12">
									<div class="col-md-3">
										type="none"
									</div>
									<div class="col-md-9">
										모든 스타일이 없이 표시된다.
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="V" >
							V
						</a>
					</h4>
				</div>
				
				<div class="row box-area box-area-top non-left-margin non-right-margin">
					<div class="col-md-3">
						&lt;VAR&gt;&lt;/I&gt;
					</div>
					<div class="col-md-9 left-border  non-left-padding non-right-padding">
						<h5 class="col-md-12 alert alert-danger non-bottom-margin">
							변수로 설정될 텍스트를 나타냄
						</h5>
					</div>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="W" >
							W
						</a>
					</h4>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="X" >
							X
						</a>
					</h4>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="Y" >
							Y
						</a>
					</h4>
				</div>
				
				<div class="row left-padding-30 top-margin-20">
					<h4 class="row col-md-12 alert alert-success text-center">
						<a name="Z" >
							Z
						</a>
					</h4>
				</div>
			</div>
			<!-- 좌측 탭메와 우측 미니 슬라이더 End -->
		</div>
	</div>
	<!-- 메인 내용 End -->
	<?php include_once("footer_ui.php"); ?>

	<!-- Load javascripts at bottom, this will reduce page load time -->
	<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
	<!--[if lt IE 9]>
		<script src="assets/global/plugins/respond.min.js"></script>
	<![endif]-->
	<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
	<script src="assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
	<!-- pop up -->
	<script src="assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
	<!-- slider for products -->
	<script src="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

	<!-- BEGIN RevolutionSlider -->
	<script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
	<script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
	<script src="assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
	<!-- END RevolutionSlider -->

	<script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			Layout.init();    
			Layout.initOWL();
			RevosliderInit.initRevoSlider();
			Layout.initTwitter();
			//Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
			//Layout.initNavScrolling(); 
		});
	</script>
	<!-- END PAGE LEVEL JAVASCRIPTS -->
	<!-- 구글 웹폰트 로드 -->
	<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.10/webfont.js"></script>
	<script type="text/javascript">
		WebFont.load({

			// For google fonts
			google: {
				families: ['Droid Sans', 'Droid Serif']
			}
			// For early access or custom font
			custom: {
				families: ['Nanum Gothic'],
				urls: ['http://fonts.googleapis.com/earlyaccess/nanumgothic.css']
			}
		});
	</script>
	<!-- 구글 웹폰트 로드 -->
</body>
<!-- END BODY -->
</html>