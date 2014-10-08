$(function() {
  $(".js-fade").delay(4000).fadeOut(800);
});

$("#closeMessage").click(function() {
  $(this).parent().fadeOut();
});