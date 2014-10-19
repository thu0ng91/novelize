/**
 * Novel Write Scene functions
 */


/**
 * Description Functions
 */
// Hide description initially
$('.js-descriptionBox').hide();

// Show/Hide description on button click
$('.js-descriptionButton').click(function(e) {
	e.preventDefault();

	$('.js-descriptionBox').slideToggle();

	if( $('.js-descriptionButton').text() == 'SHOW DESCRIPTION' )
	{
		$('.js-descriptionButton').text('HIDE DESCRIPTION');
	} else {
		$('.js-descriptionButton').text('SHOW DESCRIPTION');
	}
});


/**
 * Toolbar Position
 */
function positionWriteScreen(){

	var writeForm = $(".write-scene");
	var writeFormHeight = viewportSize().height - 154;
	var writeFormWidth = writeForm.outerWidth();

	writeForm.css('min-height', writeFormHeight);
	$('.write-scene__toolbar__wrapper').css('width', writeFormWidth);
}

positionWriteScreen();
$(window).resize(function() {
	positionWriteScreen()
});