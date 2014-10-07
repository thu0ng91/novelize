$('.editable').each(function() {
  var $this = $(this);

  $this.wrap('<div class="editable-wrapper"/>');
  var $w = $(this).parent();

  $w.prepend('<div class="editable">' + $this.val()+'</div>');

  $this.hide();

  var editor = new MediumEditor('.editable', {
    buttons: ['bold', 'italic', 'underline', 'header1', 'header2'],
    placeholder: 'Start typing here...highlight to edit'
  });
});

$('form').submit(function(){
  $('.editable-wrapper').each(function(){
    $(this).find('textarea').val($(this).find('.editable').html());
  });
});