	(function() {
		jQuery(function() {
			// 모달 사이즈 및 중앙정렬 Start
			modalWidth = $('.modal .modal-dialog .modal-content').width();
			docWidth = $(document).width();
			modalLeft = ((docWidth - modalWidth) / 2) * -1;
			// 모달 사이즈 및 중앙정렬 End

			// 캐러셀 슬라이드 Start
			$('.film_roll_pager').css('margin-left', '300px');
			this.film_rolls || (this.film_rolls = []);
			this.film_rolls['cangoto-slider'] = new FilmRoll({
				container: '#cangoto-slider',
				height: 290
			});
			// 캐러셀 슬라이드 End

			$('.sliding-btn .left-btn').click(function() {
				LoadDetailData = $(this).attr('data-eveid-value');
				//alert(LoadDetailData);
				var EventSchedule = 0;
				var DayLabel = new Array('일', '월', '화', '수', '목', '금', '토');
				/*
				$.ajax({
					// 상세 페이지 내용 Json 형식으로 로드 URL 설정
					//url: "detail_data.php",
					type: "post",
					data: 
						{
							EVEID : LoadDetailData
						},
					dataType: "json",
					cache: false,
					timeout: 30000,
					success: function(data) {
						//debugger;
						jQuery('h3.modal-title').html(data.EVENAME);
						jQuery('img.slide-poster').attr('src', data.POSTER);
						jQuery('div.tel-number').html(data.TELNO);
						jQuery('div.info-place').html(data.INFO_PLACE);
						jQuery('div.original-price').html(data.COSTPRICE);
						jQuery('span.price_info').html(data.PRICE);
						
						//var s_Event_stiring = s_Event_stiring.toString(data.EVESTART);
						var s_EventYear = data.EVESTART.substring(0, 4);
						var s_EventWeek = data.EVESTART.substring(4, 6);
						var s_EventDate = data.EVESTART.substring(6, 8);
						var e_EventYear = data.EVEEND.substring(0, 4);
						var e_EventWeek = data.EVEEND.substring(4, 6);
						var e_EventDate = data.EVEEND.substring(6, 8);
						
						var s_dateFormat = s_EventYear + '-' + s_EventWeek + '-' + s_EventDate;
						var e_dateFormat = e_EventYear + '-' + e_EventWeek + '-' + e_EventDate;
						
						var EventStartDate = new Date(s_EventYear, s_EventWeek, s_EventDate);
						var EventEndDate = new Date(e_EventYear, e_EventWeek, e_EventDate);
						d_day = ((EventEndDate.getTime() - EventStartDate.getTime()) / 1000 / 60 / 60 / 24) + 1;
						var s_DayOfTheWeek = new Date(s_dateFormat).getDay();
						var e_DayOfTheWeek = new Date(e_dateFormat).getDay();
						
						var s_DayOfTheWeekLabel = DayLabel[s_DayOfTheWeek];
						var e_DayOfTheWeekLabel = DayLabel[e_DayOfTheWeek];
						
						var EventSchedule = s_EventWeek + '.' + s_EventDate + '(' + s_DayOfTheWeekLabel + ') ~ ' + e_EventWeek + '.' + e_EventDate + '(' + e_DayOfTheWeekLabel + ')';
						//var EventStartDate = new date(data.EVESTART).getDay();
						//var EventEndDate = new date(data.EVEEND).getDay();
						
						jQuery('div.event-schedule').html(EventSchedule);
						jQuery('div.event-d-day').html('D - ' + d_day);
						
					},
					error: function(xhr, textStatus, errorThrown) {
						$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
					}
				});
				*/
			});
		});
	}).call(this);