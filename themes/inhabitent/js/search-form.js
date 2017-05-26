(function($) {

  $(document).ready(function() {
      
    $('.icon-search').click(function(event){
        event.preventDefault();
        event.stopPropagation();
        $('.search-field').toggle('fast')
    });
    $(document).click( function(event){
      if( !$('.search-field').is(event.target)){
      $('.search-field').hide('fast');
      }
    });
  });

})(jQuery);
