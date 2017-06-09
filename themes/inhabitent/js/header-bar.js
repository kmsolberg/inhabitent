(function($) {
  $(function() {
    $('#masthead').addClass('nav-static');
    var scroll_start = 0;
    // var startchange = $('.hero');
    var offset = $('.shop-section').offset();
    $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
        $('#masthead').removeClass('nav-static')
      } else {
        $('#masthead').addClass('nav-static')
      }
    });
  });

})(jQuery);
