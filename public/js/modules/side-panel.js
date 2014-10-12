$('.js-sidePanelToggle').click(function() {

	var container = $('.app-container');
	var sidePanel = $('.side-panel');
	var sceneToolbar = $('.write-scene__toolbar__wrapper');

	if ( $(this).hasClass('closed') ) {

		container.css('padding-right', '360px');
		sceneToolbar.css('padding-right', '325px');
		sidePanel.css('right', '0');
		$(this).removeClass('closed');
		$(this).addClass('opened');

	} else {

		container.css('padding-right', '10px');
		sceneToolbar.css('padding-right', '10px');
		sidePanel.css('right', '-350px');
		$(this).addClass('closed');
		$(this).removeClass('opened');

	}


});