var topLink = $('.topLink');
var showTopLink = viewportSize().height;
topLink.hide();

$(window).scroll( function(){
  var y = $(window).scrollTop();
  if( y > showTopLink  ) {
    topLink.fadeIn('slow');
  } else {
    topLink.fadeOut('slow');
  }
});

topLink.click( function(e) {
  e.preventDefault();
  $('body').animate( {scrollTop : 0}, 'slow' );
});