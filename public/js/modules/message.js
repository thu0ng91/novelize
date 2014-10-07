$(function() {
  $(".js-fade").delay(2000).fadeOut(800);
});

$("#closeMessage").click(function() {
  $(this).parent().fadeOut();
});