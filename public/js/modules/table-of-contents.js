$('.js-scene').hide();
$('.js-current').parent().show();



$('.js-chapter').click(function() {
	$(this).parent().children('.js-scene').slideToggle();

	$('.js-toggleTriangle').toggleClass('open');
});



$('.js-expandScenes').click(function() {
	$('.js-scene').slideDown();
});



$('.js-collapseScenes').click(function() {
	$('.js-scene').slideUp();
});



$('.js-currentScene').click(function() {
	$('.js-scene').slideUp();
	$('.js-current').parent().slideDown();
});