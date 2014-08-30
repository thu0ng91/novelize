$(function() {
  $(".js-fade").delay(4000).fadeOut(300);
});

$("#closeMessage").click(function() {
  $(this).parent().fadeOut();
});