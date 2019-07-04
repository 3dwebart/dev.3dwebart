$(function() {
	function printTime() {
		var clock = $("#clock");
		var now = new Date();

		clock.innerHTML = now.getFullYear() + "년 " +
		(now.getMonth()+1) + "월 " +
		now.getDate() + "일 " +
		now.getHours() + "시 " +
		now.getMinutes() + "분 " +
		now.getSeconds() + "초";

		setTimeout("printTime()", 1000);
	}
	/*
	window.onload = function() {
		printTime();
	};
	*/

	/* initialize shuffle plugin */
	var $grid = $('#grid');

	$grid.shuffle({
		itemSelector: '.item' // the selector for the items in the grid
	});

	/* reshuffle when user clicks a filter item */
	$('#filter a').click(function (e) {
		e.preventDefault();

		// set active class
		$('#filter a').removeClass('active');
		$(this).addClass('active');

		// get group name from clicked item
		var groupName = $(this).attr('data-group');

		// reshuffle grid
		$grid.shuffle('shuffle', groupName );
	});
});