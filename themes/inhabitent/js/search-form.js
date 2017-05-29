(function($) {

  $(document).ready(function() {
      
    $('.icon-search').click(function(event){
        event.preventDefault();
        event.stopPropagation();
        $('.main-navigation .search-field').toggle('fast')
    });
    $(document).click( function(event){
      if( !$('.search-field').is(event.target)){
      $('.main-navigation .search-field').hide('fast');
      }
    });
  });

})(jQuery);
