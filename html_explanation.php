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