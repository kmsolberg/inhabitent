(function($) {

  $(document).ready(function() {
      
    $('.icon-search').click(function(event){
        event.preventDefault();
        $('.main-navigation .search-field').toggle('fast');
        $('.main-navigation [type="search"]').focus();
    });
    $(document).click( function(event){
      if( !$('.search-field').is(event.target)){
      $('.main-navigation .search-field').hide('fast');
      }
    });
  });

})(jQuery);
