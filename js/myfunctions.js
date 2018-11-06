(function($){
    "use strict";
    $(document).ready(function() {

          $('body').click(function(event){
             console.log("elem clicked: ",event.target);
          });

        // Smooth scrolling using jQuery easing.
        $('li.js-scroll-trigger a[href*="#"]:not([href="#"])').click(function(e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: (target.offset().top - 54)
            }, 1000, "easeInOutExpo"); return false;
          }
        }
        });

      // Closes responsive menu when a scroll trigger link is clicked.
       $('li.js-scroll-trigger a').click(function() {
         var wd = $(window).width();
         // hides depending on the viewport size
         if (wd > 600) {
           $('nav > div.inside-navigation').collapse('hide');
         }
       });

       // Activate scrollspy to add active class to navbar items on scroll.
       $('body').scrollspy({
         target: 'nav#site-navigation',
         offset: 56
       });

       window.addEventListener("scroll", function(event) {
           var top = this.scrollY,
               left =this.scrollX;
          if (top>183) {
            $('.elementor-2284').hide();
            $("nav#site-navigation").addClass("navbar-shrink");
          } else  {
            $("nav#site-navigation").removeClass("navbar-shrink");
            $('.elementor-2284').show();
          }
          $('#primary-menu ul#menu-main-menu').find('li').removeClass('sfHover');
       }, false);

       console.log('rbtm jz');

       //click li closes ul Generate Menu sfHover
       $('#primary-menu').on('click focus','li>a', function(event) {
          console.log('onclick: ', event);
         // $('#primary-menu ul#menu-main-menu').find('li').text('rbtm');
         // $('#primary-menu ul#menu-main-menu').find('li').removeClass('sfHover');

       });

       // css selector in calendar parent
       $("#wp-calendar tbody>tr>td").find("a").parents('td').css("background-color", "#778899");
       $("#wp-calendar tfoot>tr").find("#prev>a").parents('td').addClass("prevbtn");
       $("#wp-calendar tfoot>tr").find("#next>a").parents('td').addClass("nextbtn");
    });
})(jQuery);
