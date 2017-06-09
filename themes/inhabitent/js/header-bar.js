(function($) {
  $(document).ready(function() {
    var scroll_start = 0;
    var startchange = $('.site-header');
    var offset = startchange.offset();
    $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start < offset.top) {
        console.log('top!')
      } else {
        console.log('nope')
      }
    });
  });

})(jQuery);
