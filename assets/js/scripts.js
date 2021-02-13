function scroll_to(clicked_link, nav_height) {
    var element_class = clicked_link.attr('href').replace('#', '.');
    var scroll_to = 0;
    if (element_class != '.top-content') {
        element_class += '-container';
        scroll_to = $(element_class).offset().top - nav_height;
    }
    if ($(window).scrollTop() != scroll_to) {
        $('html, body').stop().animate({ scrollTop: scroll_to }, 1000);
    }
}

$(document).ready(function() {

    // Social plus button function
    $('.plus-button').click(function() {
        $(this).toggleClass('open');
        $('.social-button').toggleClass('active');
    });

});
//# sourceURL=pen.js

jQuery(document).ready(function() {

    /*
        Navigation
    */
    $('a.scroll-link').on('click', function(e) {
        e.preventDefault();
        scroll_to($(this), $('nav').outerHeight());
    });

    /*
        Background
    */
    $('.section-4-container').backstretch("assets/img/backgrounds/bg.jpg");

    /*
	    Wow
	*/
    new WOW().init();

    /*
        Carousel
    */

});


jQuery(document).ready(function() {

    /*
        Sidebar
    */
    $('.dismiss, .overlay').on('click', function() {
        $('.sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('.open-menu').on('click', function(e) {
        e.preventDefault();
        $('.sidebar').addClass('active');
        $('.overlay').addClass('active');
        // close opened sub-menus
        $('.collapse.show').toggleClass('show');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    /* change sidebar style */
    $('a.btn-customized-dark').on('click', function(e) {
        e.preventDefault();
        $('.sidebar').removeClass('light');
    });
    $('a.btn-customized-light').on('click', function(e) {
        e.preventDefault();
        $('.sidebar').addClass('light');
    });
    /* replace the default browser scrollbar in the sidebar, in case the sidebar menu has a height that is bigger than the viewport */
    $('.sidebar').mCustomScrollbar({
        theme: "minimal-dark"
    });

    /*
        Navigation
    */
    $('a.scroll-link').on('click', function(e) {
        e.preventDefault();
        scroll_to($(this), 0);
    });

    $('.to-top a').on('click', function(e) {
        e.preventDefault();
        if ($(window).scrollTop() != 0) {
            $('html, body').stop().animate({ scrollTop: 0 }, 1000);
        }
    });
    /* make the active menu item change color as the page scrolls up and down */
    /* we add 2 waypoints for each direction "up/down" with different offsets, because the "up" direction doesn't work with only one waypoint */
    $('.section-container').waypoint(function(direction) {
        if (direction === 'down') {
            $('.menu-elements li').removeClass('active');
            $('.menu-elements a[href="#' + this.element.id + '"]').parents('li').addClass('active');
            //console.log(this.element.id + ' hit, direction ' + direction);
        }
    }, {
        offset: '0'
    });
    $('.section-container').waypoint(function(direction) {
        if (direction === 'up') {
            $('.menu-elements li').removeClass('active');
            $('.menu-elements a[href="#' + this.element.id + '"]').parents('li').addClass('active');
            //console.log(this.element.id + ' hit, direction ' + direction);
        }
    }, {
        offset: '-5'
    });

    /*
        Background slideshow
    */
    $('.top-content').backstretch("assets/img/backgrounds/1.jpg");
    $('.section-4-container').backstretch("assets/img/backgrounds/2.jpg");
    $('.section-6-container').backstretch("assets/img/backgrounds/1.jpg");

    /*
	    Wow
	*/
    new WOW().init();

});

$(document).ready(function() {
    $("#myCarousel").on("slide.bs.carousel", function(e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 1;
        var totalItems = $(".carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $(".carousel-item")
                        .eq(i)
                        .appendTo(".carousel-inner");
                } else {
                    $(".carousel-item")
                        .eq(0)
                        .appendTo($(this).find(".carousel-inner"));
                }
            }
        }
    });
});