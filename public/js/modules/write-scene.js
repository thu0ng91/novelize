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
