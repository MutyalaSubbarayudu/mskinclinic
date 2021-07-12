(function($) {
    "use strict";
    jQuery(document).on("ready", function() {
        jQuery(window).on("scroll", function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery(".scrollup").addClass("active");
            } else {
                jQuery(".scrollup").removeClass("active");
            }
        });
        jQuery(".scrollup").on("click", function() {
            jQuery("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        jQuery(".header-flyout-searchbar i, .header-flyout-searchbar span[class*='ti-']").on("click", function() {
            jQuery("body").toggleClass("flyout-searchbar-active");
        });
        jQuery(".flyout-search-close").on("click", function() {
            jQuery("body").removeClass("flyout-searchbar-active");
        });
        jQuery(".comments-area .comment-form > p input[type='submit']").each(function() {
            jQuery(this).replaceWith("<button type='submit'><span>" + jQuery(this).attr("value") + "</span></button>");
        });
        jQuery(".comments-area .comment-form > p input[type='reset']").each(function() {
            jQuery(this).replaceWith("<button type='reset'><span>" + jQuery(this).attr("value") + "</span></button>");
        });
        jQuery("[data-toggle='tooltip']").tooltip();
        jQuery(".header-responsive-nav").each(function() {
            jQuery(this).sidr({
                side: 'right',
                speed: 600,
                displace: false,
                renaming: false,
                source: '.mobile-menu',
                name: 'mobile-menu',
                onOpen: function() {
                    jQuery("body").addClass("mobile-menu-open");
                },
                onClose: function() {
                    jQuery("body").removeClass("mobile-menu-open");
                },
            });
            jQuery(".mobile-menu-close, .overlay").on("click", function() {
                jQuery.sidr('close', 'mobile-menu');
            });
        });
        jQuery(".header-hamburger-menu").each(function() {
            jQuery(this).sidr({
                side: 'right',
                speed: 400,
                displace: false,
                renaming: false,
                source: '.hamburger-menu-holder',
                name: 'hamburger-menu',
                onOpen: function() {
                    jQuery("body").addClass("hamburger-menu-open");
                },
                onClose: function() {
                    jQuery("body").removeClass("hamburger-menu-open");
                },
            });
            jQuery(".hamburger-menu-close-lines").on("click", function() {
                jQuery.sidr('close', 'hamburger-menu');
            });
        });
       
        jQuery(".responsive-sidemenu-open").each(function() {
            jQuery(this).sidr({
                side: 'left',
                speed: 600,
                displace: false,
                renaming: false,
                source: '.sidemenu-holder',
                name: 'sidemenu',
                onOpen: function() {
                    jQuery("body").addClass("sidemenu-open");
                },
                onClose: function() {
                    jQuery("body").removeClass("sidemenu-open");
                },
            });
            jQuery(".responsive-sidemenu-close").on("click", function() {
                jQuery.sidr('close', 'sidemenu');
            });
        });
      
        jQuery(".header-sidebar-menu-open, .mobile-sidebar-menu-open").each(function() {
            jQuery(this).sidr({
                side: 'left',
                speed: 300,
                displace: false,
                renaming: false,
                source: '.sidemenu-holder',
                name: 'sidemenu',
                onOpen: function() {
                    jQuery("body").addClass("sidemenu-open");
                },
                onClose: function() {
                    jQuery("body").removeClass("sidemenu-open");
                },
            });
            jQuery(".sidemenu-close").on("click", function() {
                jQuery.sidr('close', 'sidemenu');
            });
        });
        
        jQuery(".header-flyout-menu").on("click", function() {
            jQuery("body").addClass("flyout-menu-active");
        });
        jQuery(".flyout-menu-close").on("click", function() {
            jQuery("body").removeClass("flyout-menu-active");
        });
        
        jQuery(".header-slideout-menu").on("click", function() {
            jQuery("body").addClass("slideout-menu-active");
        });
        jQuery(".slideout-menu-close").on("click", function() {
            jQuery("body").removeClass("slideout-menu-active");
        });
        
        jQuery(".header-flexi-menu").on("click", function() {
            jQuery("body").addClass("flexi-menu-active");
        });
        jQuery(".flexi-menu-close").on("click", function() {
            jQuery("body").removeClass("flexi-menu-active");
        });
        
        jQuery(".sidr .menu-item-has-children").each(function() {
            jQuery(this).children("ul, .rt-mega-menu, div ul").css({
                "display": "none",
            });
            jQuery(this).append("<span class='radiantthemes-open-submenu'></span>");
            jQuery(this).find(".radiantthemes-open-submenu").on("click", function() {
                jQuery(this).parent(".menu-item-has-children").toggleClass("radiantthemes-menu-open");
                jQuery(this).parent(".menu-item-has-children").children("ul, .rt-mega-menu").slideToggle(700);
            });
        });
        jQuery("body[data-page-transition='1'] a:not(.fancybox):not(.video-link):not([data-fancybox])").each(function() {
            jQuery(this).on("click", function(event) {
                let PageLink = jQuery(this).attr("href");
                if ("#" == PageLink) {} else if (PageLink.startsWith("#")) {} else {
                    event.preventDefault();
                    jQuery("body").addClass("page-transition-active");
                    setTimeout(function() {
                        window.location.href = PageLink;
                    }, 700);
                }
            });
        });
        
        jQuery(".matchHeight").matchHeight();
        
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            mobile: true,
            live: true,
            scrollContainer: null,
        });
        wow.init();
       
        jQuery("img").attr("data-no-retina", "");
        jQuery(".radiantthemes-retina img").removeAttr("data-no-retina");
        jQuery(".fancybox").fancybox({
            animationEffect: "zoom-in-out",
            animationDuration: 500,
            zoomOpacity: "auto",
        });
    });
    jQuery(window).on("load", function() {
        setTimeout(function() {
            jQuery(".preloader").addClass("loaded");
        }, jQuery(".preloader").data("preloader-timeout"));
        setTimeout(function() {
            jQuery(".page-transition-layer").removeClass("i-am-active");
        }, 700);
        setTimeout(function() {
            jQuery(".matchHeight").matchHeight();
        }, 2000);
        setTimeout(function() {
            jQuery(".isotope-blog-style").isotope({
                itemSelector: '.isotope-blog-style-item',
                layoutMode: 'masonry',
            });
        }, 100);
        if (jQuery(window).width() > 768) {
            jQuery(document).ready(StuckingFooter);
            jQuery(window).resize(StuckingFooter);

            function StuckingFooter() {
                jQuery(".footer-custom-stucking-container").css({
                    "height": jQuery(".footer-custom-stucking-mode").innerHeight(),
                });
            };
        }
        if (jQuery.fn.owlCarousel) {
            jQuery('.blog-carousel').owlCarousel({
                stagePadding: 250,
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 6000,
                smartSpeed: 2500,
                lazyLoad: true,
                margin: 0,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 0
                    },
                    600: {
                        items: 2,
                        margin: 10,
                    },
                    1000: {
                        items: 2,
                    }
                }
            });
        }
        if (jQuery.fn.owlCarousel) {
            jQuery('.landing-portfolio-carousel').owlCarousel({
                center: true,
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 6000,
                smartSpeed: 2500,
                lazyLoad: true,
                margin: 0,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 0
                    },
                    600: {
                        items: 2,
                        margin: 10,
                    },
                    1000: {
                        items: 2,
                    }
                }
            });
        }
        
        $('select.rt-selectbox, select.mptt-navigation-select, .widget_archive select, .widget_categories select, .widget_text select, .wp-block-archives-dropdown select, .wp-block-categories-dropdown select').each(function(index) {
  $(this).each(function() {
    var $el = $(this);
    $el.insertBefore($el.parent('.rt-select-wrapper'));
    $el.next('.rt-select-wrapper').remove();
    $el.css({
      'opacity': 0,
      'position': 'absolute',
      'left': 0,
      'right': 0,
      'top': 0,
      'bottom': 0
    });
    var $comboWrap = $('<span class="rt-select-wrapper" />').insertAfter($el);
    var $text = $('<span class="rt-select-text" />').appendTo($comboWrap);
    var $button = $('<span class="rt-select-button" />').appendTo($comboWrap);
    $el.appendTo($comboWrap);
    $el.change(function() {
      $text.text($('option:selected', $el).text());
    });
    $text.text($('option:selected', $el).text());
    $el.comboWrap = $comboWrap;
  });
});
        setTimeout(function() {
            jQuery(".radiantthemes-counterup").each(function() {
                jQuery(this).text(jQuery(this).data("counterup-value"));
            });
        }, 1);
    });
})(jQuery);