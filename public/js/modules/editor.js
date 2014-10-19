$('.editable').each(function() {
  var $this = $(this);

  $this.wrap('<div class="editable-wrapper"/>');
  var $w = $(this).parent();

  $w.prepend('<div id="js-countable" class="editable js-local">' + $this.val()+'</div>');

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


/**
 * Leave without saving scene
 */
$('a').click(function(e) {
  e.preventDefault();

  var url = $(this).attr('href');
  var localContent = $('.js-local').html();
  var remoteContent = $('.js-remote').val();
  var body = $('body');

  if(localContent != remoteContent)
  {
    modalBox = '<div id="modal" class="modal-overlay">';
    modalBox += '<div class="modal">';
    modalBox += '<p class="modal__text">You\'ve made changes to your scene that haven\'t been saved.</p>';
    modalBox += '<p class="modal__text">Do you really want to leave?</p>';
    modalBox += '<div class="modal__buttons">';
    modalBox += '<button class="modal__button js-proceed">LEAVE WITHOUT SAVING</button>';
    modalBox += '<button class="modal__button js-save">STAY ON PAGE</button>';
    modalBox += '</div>';
    modalBox += '</div>';
    modalBox += '</div>';

    body.append(modalBox);

    $('.js-proceed').click(function() {
      window.location.href = url;
    });


    $('.js-save').click(function() {
      $('#modal').remove();
    });
  }
  else {
    window.location.href = url;
  }
});