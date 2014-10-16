/*
 * Toggle Side Panel
 */
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


/*
 * Toggle Side Panel Lists
 */
(function(){
	var menuButtons = $('.js-menuButton');
	var listButtons = $('.js-listButton');
	var panels = $('.js-panelContent');

	var charactersButton = $('#charactersButton');
	var locationsButton = $('#locationsButton');
	var itemsButton = $('#itemsButton');
	var notesButton = $('#notesButton');

	var charactersList = $('#charactersList');
	var locationsList = $('#locationsList');
	var itemsList = $('#itemsList');
	var notesList = $('#notesList');

	var charactersBack = $('.js-charactersBack');
	var locationsBack = $('.js-locationsBack');
	var itemsBack = $('.js-itemsBack');
	var notesBack = $('.js-notesBack');

	// Initial Setup
	panels.hide();
	charactersButton.addClass('active');
	charactersList.show();

	// Resets
	function resetMenu() {
		panels.hide();
		menuButtons.removeClass('active');
	}

	// Click on characters button
	charactersButton.click(function () {
		resetMenu();

		charactersButton.addClass('active');
		charactersList.show();
	});

	// Click on locations button
	locationsButton.click(function () {
		resetMenu();

		locationsButton.addClass('active');
		locationsList.show();
	});

	// Click on items button
	itemsButton.click(function () {
		resetMenu();

		itemsButton.addClass('active');
		itemsList.show();
	});

	// Click on notes button
	notesButton.click(function () {
		resetMenu();

		notesButton.addClass('active');
		notesList.show();
	});

	// Click on list button
	listButtons.click(function() {
		var buttonId = $(this).attr('id');
		var id = buttonId.split('-')[1];
		var type = buttonId.replace('Button-' + id, '');

		var listPanel = '#' + type + 'Panel-' + id;

		panels.hide();
		$(listPanel).show();
	});

	// Click on characters button
	charactersBack.click(function () {
		resetMenu();

		charactersButton.addClass('active');
		charactersList.show();
	});

	// Click on locations button
	locationsBack.click(function () {
		resetMenu();

		locationsButton.addClass('active');
		locationsList.show();
	});

	// Click on items button
	itemsBack.click(function () {
		resetMenu();

		itemsButton.addClass('active');
		itemsList.show();
	});

	// Click on notes button
	notesBack.click(function () {
		resetMenu();

		notesButton.addClass('active');
		notesList.show();
	});

})();