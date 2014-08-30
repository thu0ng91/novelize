$('.descriptionButton').click(function() {

  $(this).parent().children('.description').toggle();

  $(this).text(function(i, text){
      return text === "show description" ? "hide description" : "show description";
  })
});