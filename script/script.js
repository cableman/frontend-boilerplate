(function ($) {
  $(document).ready(function() {
    enquire.register("screen and (max-width:768px)", function() {
      // Move menu items.
      var sec_menu = $('#block-menu-block-2 .menu');
      var main_menu = $('#block-menu-block-1 .menu');
      var items = $('li', sec_menu);

      // Append menu item to main menu.
      main_menu.append($('li', sec_menu));

      // Remove the sec. menu.
      $('#block-menu-block-2').remove();
    });
  });
})(jQuery);
