(function($) {
  //validate all setting forms
  $('.settings-form').each(function() {
    $(this).validate();
  });

  //cmb2 validation
  $('.cmb2-wrap').each(function() {
    $(this).closest('form').validate();

    $(this).find('.cmb2-text-url').each(function() {
      $(this).rules( "add", {
        url: true,
      });
    });
  });

  $('.readmore').click(function(){
    $(this).slideUp();
    $(this).next('.description').slideDown('slow', function(){
    });
    // $(this).next('.description').addClass('active');
  });
  $(document).ready(function(){
    $('.description').slideUp();
  })

  $('.readless').click(function(){
    $(this).parent().slideUp();
    console.log($(this).parent().prev('.readmore'));
    $(this).parent().prev('.readmore').slideDown();
  });
})(jQuery);