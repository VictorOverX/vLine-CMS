// LOAD CUSTOM CSS
// ----------------------------------- 

(function(window, document, $, undefined){

  $(function(){

    $('[data-load-css]').on('click', function (e) {
        
      var element = $(this);

      if(element.is('a'))
        e.preventDefault();
      
      var uri = element.data('loadCss'),
          link;

      if(uri) {
        link = createLink(uri);
        if ( !link ) {
          $.error('Error creating stylesheet link element.');
        }
      }
      else {
        $.error('No stylesheet location defined.');
      }

    });
  });

  function createLink(uri) {
    var linkId = 'autoloaded-stylesheet',
        oldLink = $('#'+linkId).attr('id', linkId + '-old');

    $('head').append($('<link/>').attr({
      'id':   linkId,
      'rel':  'stylesheet',
      'href': uri
    }));

    if( oldLink.length ) {
      oldLink.remove();
    }

    return $('#'+linkId);
  }


})(window, document, window.jQuery);
