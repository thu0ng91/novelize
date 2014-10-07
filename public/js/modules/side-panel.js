$('.js-sidePanelToggle').click(function() {

	var container = $('.app-container'),
		  sidePanel = $('.side-panel');

	if ( $(this).hasClass('closed') ) {

		container.css('padding-right', '360px');
		sidePanel.css('right', '0');
		$(this).removeClass('closed');
		$(this).addClass('opened');

	} else {

		container.css('padding-right', '10px');
		sidePanel.css('right', '-350px');
		$(this).addClass('closed');
		$(this).removeClass('opened');

	}


});