(function ($) {
  $(document).ready(function () {

    Modernizr.load({
      load: [
        '/sites/andromeda.dk/themes/nebula/scripts/respond.min.js',
        '/sites/andromeda.dk/themes/nebula/scripts/respond.matchmedia.addListener.min.js'
      ],
      complete: function () {
        Modernizr.load({
          load: [
            "/sites/andromeda.dk/themes/nebula/scripts/matchMedia.js",
            "/sites/andromeda.dk/themes/nebula/scripts/enquire.min.js"
          ],
          complete: function () {
            enquire.register("only screen and (max-width:767px)", function () {
              // Move menu items.
              var sec_menu = $('#block-menu-block-2 .menu');
              var main_menu = $('#block-menu-block-1 .menu');
              var items = $('li', sec_menu);

              // Append menu item to main menu.
              main_menu.append(items);

              // Add mobile menu icon
              sec_menu.append('<div class="js-mobile--menu"><i class="icon-menu"></i>Menu</div>');
              sec_menu.show();

              // Toggle menu.
              $('.js-mobile--menu').click(function () {
                main_menu.toggle();
              });

              // Fix sec. menu.
              $('.secondary-content .menu-name-main-menu .menu').ReSmenu();
            });
          },
        });
      }
    });
  });
})(jQuery);
