/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Hero Slider
4. Init SVG
5. Initialize Hamburger
6. Initialize Testimonials Slider
7. Initialize Parallax


******************************/

$(document).ready(function () {
    "use strict";

    /* 

	1. Vars and Inits

	*/

    var hambActive = false;
    var menuActive = false;

    initHeroSlider();
    initHamburger();

    /* 

	2. Set Header

	*/

    /*

	3. Init Hero Slider

	*/

    function initHeroSlider() {
        if ($(".hero_slider").length) {
            var owl = $(".hero_slider");

            owl.owlCarousel({
                items: 1,
                loop: true,
                smartSpeed: 800,
                autoplay: true,
                nav: true,
                dots: true,
            });

            // add animate.css class(es) to the elements to be animated
            function setAnimation(_elem, _InOut) {
                // Store all animationend event name in a string.
                // cf animate.css documentation
                var animationEndEvent =
                    "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";

                _elem.each(function () {
                    var $elem = $(this);
                    var $animationType =
                        "animated " + $elem.data("animation-" + _InOut);

                    $elem
                        .addClass($animationType)
                        .one(animationEndEvent, function () {
                            $elem.removeClass($animationType); // remove animate.css Class at the end of the animations
                        });
                });
            }

            // Fired before current slide change
            owl.on("change.owl.carousel", function (event) {
                var $currentItem = $(".owl-item", owl).eq(event.item.index);
                var $elemsToanim = $currentItem.find("[data-animation-out]");
                setAnimation($elemsToanim, "out");
            });

            // Fired after current slide has been changed
            owl.on("changed.owl.carousel", function (event) {
                var $currentItem = $(".owl-item", owl).eq(event.item.index);
                var $elemsToanim = $currentItem.find("[data-animation-in]");
                setAnimation($elemsToanim, "in");
            });

            // Handle Custom Navigation
            if ($(".hero_slider_left").length) {
                var owlPrev = $(".hero_slider_left");
                owlPrev.on("click", function () {
                    owl.trigger("prev.owl.carousel");
                });
            }

            if ($(".hero_slider_right").length) {
                var owlNext = $(".hero_slider_right");
                owlNext.on("click", function () {
                    owl.trigger("next.owl.carousel");
                });
            }
        }
    }

    /* 

	4. Init SVG

	*/

    /* 

	5. Initialize Hamburger

	*/

    function initHamburger() {
        if ($(".hamburger_container").length) {
            var hamb = $(".hamburger_container");

            hamb.on("click", function (event) {
                event.stopPropagation();

                if (!menuActive) {
                    openMenu();

                    $(document).one("click", function cls(e) {
                        if ($(e.target).hasClass("menu_mm")) {
                            $(document).one("click", cls);
                        } else {
                            closeMenu();
                        }
                    });
                } else {
                    $(".menu_container").removeClass("active");
                    menuActive = false;
                }
            });
        }
    }

    function openMenu() {
        var fs = $(".menu_container");
        fs.addClass("active");
        hambActive = true;
        menuActive = true;
    }

    function closeMenu() {
        var fs = $(".menu_container");
        fs.removeClass("active");
        hambActive = false;
        menuActive = false;
    }
});
