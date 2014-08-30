function resetSectionMenu() {
  $('.js-sectionButton').removeClass('active')
  $('.js-sectionPanel').hide();
}


$('.js-sectionButton').click(function() {

  // reset page
  resetSectionMenu();

  // get the section type
  sectionType = $(this).attr('id').replace('sectionButton--', '');
  panelId = "#sectionPanel--" + sectionType;

  // activate the right button and panel
  $(this).addClass('active');
  $(panelId).show();

}); 