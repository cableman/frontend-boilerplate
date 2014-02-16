(function ($) {
  $(document).ready(function() {
    enquire.register("only screen and (max-width:767px)", function () {
      // Move menu items.
      var sec_menu = $('#block-menu-block-2 .menu');
      var main_menu = $('#block-menu-block-1 .menu');
      var items = $('li', sec_menu);

      // Append menu item to main menu.
      main_menu.append(items);

      // Add mobile menu icon
      sec_menu.append('<div class="js-mobile--menu"><i class="icon-menu"></i>Menu</div>');

      // Hide main menu.
      main_menu.hide();

      // Toggle menu.
      $('.js-mobile--menu').click(function () {
        main_menu.toggle();
      });
    });
  });
})(jQuery);
