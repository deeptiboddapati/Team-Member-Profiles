(function($) {

  $('.readmore').click(function(){
    $(this).slideUp();
    $(this).next('.description').slideDown('slow', function(){
    });
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