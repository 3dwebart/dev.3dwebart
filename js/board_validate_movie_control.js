$(function() {
	/*
	function onValKeyPress(type, event){
		var ev = window.event || event;
		alert(ev.keyCode);
		if(type=="num"){ //숫자만 입력
			if( (48 <= ev.keyCode && ev.keyCode <=57) || ev.keyCode == "8" ) return true; 
			else return false;
		} else if(type=="eng") { //영문만 입력
			if( (65 <= ev.keyCode && ev.keyCode <=90) || (97 <= ev.keyCode && ev.keyCode <=122) || ev.keyCode == 32 ) return true; 
			else return false;
		} else if(type=="engnum"){ //영문과 숫자만 입력
			if( (65 <= ev.keyCode && ev.keyCode <=90) || (97 <= ev.keyCode && ev.keyCode <=122) ) return true; 
			else if( (48 <= ev.keyCode && ev.keyCode <=57) || ev.keyCode == "8" ) return true; 
			return false;
		} else if(type=="han"){ //한글과 스페이스만 입력
			if( ev.keyCode==229 || ev.keyCode==197 || ev.keyCode == 32) return true;
			else return false;
		} else if(type=="numdash"){
			if( (48 <= ev.keyCode && ev.keyCode <=57) || ev.keyCode == "45" ) return true; 
			else return false;
		}
	}

	function onDateKeyPress(_obj){
		if( !onValKeyPress("num", event) ) return false;
		var returnval = false;
		if(event.keyCode==8){
			if(_obj.value.length == 5){
				_obj.value = _obj.value.substring(0, 4);
				return false;
			}else if(_obj.value.length == 8){
				_obj.value = _obj.value.substring(0, 7);
				return false;
			}
		}

		if(_obj.value.length == 5){
			_obj.value =_obj.value.substring(0, 4) + "-" +_obj.value.substring(4, 5);
		}else if(_obj.value.length == 8){
			_obj.value =_obj.value.substring(0, 7) + "-" +_obj.value.substring(7, 8);
		}
	}

	function onDateKeyUpConfirm(_obj){
		if(_obj.value.length == 10){
			returnval = datecheckwithalert(clear_datedata(_obj.value),'1',true);
			if(!returnval){
				_obj.select();
			}
		}
	}

	function datecheckwithalert(date,state,nolength) {
		//state : 년월일(1), 년월(2), 년(3)
		//nolength : 길이 0 인것을 허용하면 true, 아니면 false
		var dayarray= new Array(0,31,29,31,30,31,30,31,31,30,31,30,31);
		var year, month, day;

		if(state == 1){
			if(((date.length != 8) && !(nolength)) || (nolength && (date.length != 8 && date.length != 0))){
				alert("년월일을 YYYYMMDD 형식으로 입력바랍니다.");
				return false;
			}
			if(nolength && date.length == 0) return true;
			if(date.substr(0,4) < "1900" || date.substr(0,4) > "9999"){
				alert("년월일을 YYYYMMDD 형식으로 입력바랍니다.");
				return false;
			}
			if(date.substr(4,2) < "01" || date.substr(4,2) > "12"){
				alert("년월일을 YYYYMMDD 형식으로 입력바랍니다.");
				return false;
			}
			if(date.substr(6,2) < "01" || date.substr(4,2) > "31"){
				alert("년월일을 YYYYMMDD 형식으로 입력바랍니다.");
				return false;
			}

			year = parseInt(date.substr(0,4),10);
			month = parseInt(date.substr(4,2),10);
			day = parseInt(date.substr(6,2),10);
			if(year < 1900 || year > 9999){
				alert("년월일을 YYYYMMDD 형식으로 입력바랍니다.");
				return false;
			}
			if(month < 1 || month > 12){
				alert("년월일을 YYYYMMDD 형식으로 입력바랍니다.");
				return false;
			}
			if(day < 1 || day > dayarray[month]){
				alert("년월일을 YYYYMMDD 형식으로 입력바랍니다.");
				return false;
			}
			return true;
		}else if(state == 2){
			if(((date.length != 6) && !(nolength)) || (nolength && (date.length != 6 && date.length != 0))) {
				alert("년월일을 YYYYMM 형식으로 입력바랍니다.");
				return false;
			}
			if(nolength && date.length == 0) return true;
			if(date.substr(0,4) < "1900" || date.substr(0,4) > "9999"){
				alert("년월일을 YYYYMM 형식으로 입력바랍니다.");
				return false;
			}
			if(date.substr(4,2) < "01" || date.substr(4,2) > "12"){
				alert("년월일을 YYYYMM 형식으로 입력바랍니다.");
				return false;
			}
			year = parseInt(date.substr(0,4),10);
			month = parseInt(date.substr(4,2),10);
			if(year < 1900 || year > 9999){
				alert("년월일을 YYYYMM 형식으로 입력바랍니다.");
				return false;
			}
			if(month < 1 || month > 12){
				alert("년월일을 YYYYMM 형식으로 입력바랍니다.");
				return false;
			}
			return true;
		}else if(state == 3){
			if(((date.length != 4) && !(nolength)) || (nolength && (date.length != 4 && date.length != 0))){
				alert("년월일을 YYYY 형식으로 입력바랍니다.");
				return false;
			}
			if(nolength && date.length == 0) return true;
			if(date.substr(0,4) < "1900" || date.substr(0,4) > "9999"){
				alert("년월일을 YYYY 형식으로 입력바랍니다.");
				return false;
			}
			year = parseInt(date.substr(0,4),10);
			if(year < 1900){
				alert("년월일을 YYYY 형식으로 입력바랍니다.");
				return false;
			}
			return true;
		}
		return false;
	}

	function clear_datedata(_value) {
		var __value = "";
		_len = _value.length;
		for(i = 0; i < _len ; i++) {
			if(_value.charAt(i) != '-') {
				__value = __value + _value.charAt(i);
			}
		}
		return __value;
	}
	*/

	$(".form-horizontal").validate({
		//debug : true,
		rules : {
			movie_size : {
				required : true
			},
			movie_id : {
				required : true,
				eng : true
			},
			link : {
				required : false
			},
			subject : {
				required : true,
				minlength : 2
			},
			content : {
				required : true
			}
		},

		messages : {
			movie_size : {
				required : "화면비율을 선택해 주세요."
			},
			movie_id : {
				required : "아이디는 필수 입력 항목 입니다.",
				eng : "영문만 가능 합니다."
			},
			link : {
				required : "아이디는 필수입력 사항 입니다.",
			},
			subject : {
				required : "제목은 필수 입력 항목 입니다.",
				minlength : "최소 {0}글자 입니다."
			},
			content : {
				required : "내용은 필수 입력사항 입니다."
			}
		}
	});
});