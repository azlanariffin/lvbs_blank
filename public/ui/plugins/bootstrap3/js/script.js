$(document).ready(function () {
  var trigger = $('.menu-panel'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      menu_panel();      
    });

    function menu_panel() {

      if (isClosed === true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});