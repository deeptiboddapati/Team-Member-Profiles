(function($) {
  //validate all setting forms
  $('.settings-form').each(function() {
    $(this).validate();
  });

  //cmb2 validation
  $('.cmb2-wrap').each(function() {
    $(this).closest('form').validate();

    $(this).find('.cmb2-text-url').each(function() {
      console.log(this);
      $(this).rules( "add", {
        url: true,
      });
    });
  });
})(jQuery);