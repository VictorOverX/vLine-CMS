// Toggle RTL mode for demo
// ----------------------------------- 


(function(window, document, $, undefined){

  $(function(){
    var maincss = $('#maincss');
    $('#chk-rtl').on('change', function(){
      
      maincss.attr('href', this.checked ? 'css/app-rtl.css' : 'css/app.css' );

    });

  });

})(window, document, window.jQuery);