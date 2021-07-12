

jQuery(document).ready(function () {
    jQuery('.ti-shopping-cart').mouseover(function(){
       jQuery('.cart-block').fadeIn();
    });
    jQuery('#close-btn-search').click(function() {
		jQuery('#search-overlay').slideUp();
		jQuery('.search-btn').show();
	});
	jQuery('.search-btn').click(function() {
		jQuery(this).hide();
		jQuery('#search-overlay').slideDown();
	});
	jQuery(".matchHeight").matchHeight();
	jQuery(".rt-beforeafter").each(function () {
		jQuery(this).beforeAfter();
	});
	jQuery(".rt-countdown").each(function () {
		jQuery(this).countdown(jQuery(this).data("countdown"), function (event) {
			jQuery(this).html(event.strftime("<div class='time'><strong>%D</strong> Days</div> <div class='time'><strong>%H</strong> Hours</div> <div class='time'><strong>%M</strong> Min</div> <div class='time'><strong>%S</strong> Sec</div>"));
		});
	});
	jQuery(".rt-counterup .rt-counterup-value").each(function () {
		jQuery(this).counterUp({
			delay: jQuery(this).data("counterup-delay"),
			time: jQuery(this).data("counterup-time"),
		});
	});
	jQuery(".rt-tab").each(function () {
		jQuery(this).find("ul.nav-tabs a:first").tab("show");
	});
	jQuery(".radiantthemes-typewriter-text").each(function () {
		jQuery(this).children(".typed-writer").typed({
			stringsElement: jQuery(this).children(".typed-strings"),
			typeSpeed: jQuery(this).data("typewriter-typespeed"),
			startDelay: jQuery(this).data("typewriter-startdelay"),
			backSpeed: jQuery(this).data("typewriter-backspeed"),
			backDelay: jQuery(this).data("typewriter-backdelay"),
			shuffle: jQuery(this).data("typewriter-shuffle"),
			loop: jQuery(this).data("typewriter-loop"),
			loopCount: false,
			showCursor: false,
			cursorChar: "|",
		});
	});
	jQuery(".radiantthemes-circular-progress-bar-main").circlos();
	jQuery(".radiantthemes-twitter-widget-holder").each(function () {
		twitterFetcher.fetch({
			"profile": {
				"screenName": jQuery(this).data("twitter-box-username")
			},
			"domId": jQuery(this).attr("id"),
			"maxTweets": jQuery(this).data("twitter-box-maxtweets"),
			"enableLinks": jQuery(this).data("twitter-box-enablelinks"),
			"showUser": jQuery(this).data("twitter-box-showuser"),
			"showTime": jQuery(this).data("twitter-box-showtime"),
			"showImages": jQuery(this).data("twitter-box-showimages"),
			"lang": 'en',
		});
	});
});
jQuery(window).on('load', function () {
	jQuery(".matchHeight").matchHeight();
	setTimeout(function () {
		jQuery(".matchHeight").matchHeight();
	}, 500);
	jQuery(".team.owl-carousel").each(function () {
		jQuery(this).owlCarousel({
			nav: jQuery(this).data("owl-nav"),
			dots: jQuery(this).data("owl-dots"),
			loop: jQuery(this).data("owl-loop"),
			autoplay: jQuery(this).data("owl-autoplay"),
			autoplayTimeout: jQuery(this).data("owl-autoplay-timeout"),
			responsive: {
				0: {
					items: jQuery(this).data("owl-mobile-items")
				},
				321: {
					items: jQuery(this).data("owl-mobile-items")
				},
				480: {
					items: jQuery(this).data("owl-tab-items")
				},
				768: {
					items: jQuery(this).data("owl-tab-items")
				},
				992: {
					items: jQuery(this).data("owl-desktop-items")
				},
				1200: {
					items: jQuery(this).data("owl-desktop-items")
				}
			}
		});
	});
	jQuery(".team:not(.owl-carousel)").each(function () {
		jQuery(this).children().css({
			"width": "calc(100% / " + jQuery(this).data("row-items") + ")",
		});
	});
	jQuery(".clients.owl-carousel").each(function () {
		jQuery(this).owlCarousel({
			nav: jQuery(this).data("owl-nav"),
			dots: jQuery(this).data("owl-dots"),
			loop: jQuery(this).data("owl-loop"),
			autoplay: jQuery(this).data("owl-autoplay"),
			autoplayTimeout: jQuery(this).data("owl-autoplay-timeout"),
			responsive: {
				0: {
					items: jQuery(this).data("owl-mobile-items")
				},
				321: {
					items: jQuery(this).data("owl-mobile-items")
				},
				480: {
					items: jQuery(this).data("owl-tab-items")
				},
				768: {
					items: jQuery(this).data("owl-tab-items")
				},
				992: {
					items: jQuery(this).data("owl-desktop-items")
				},
				1200: {
					items: jQuery(this).data("owl-desktop-items")
				}
			}
		});
	});
	jQuery(".clients:not(.owl-carousel)").each(function () {
		jQuery(this).children().css({
			"width": "calc(100% / " + jQuery(this).data("row-items") + ")",
		});
	});
	jQuery(".rt-image-slider.owl-carousel").each(function () {
		jQuery(this).owlCarousel({
			nav: true,
			dots: true,
			loop: true,
			autoplay: true,
			autoplayTimeout: 6000,
			responsive: {
				0: {
					items: jQuery(this).data("owl-mobile-items")
				},
				321: {
					items: jQuery(this).data("owl-mobile-items")
				},
				480: {
					items: jQuery(this).data("owl-tab-items")
				},
				768: {
					items: jQuery(this).data("owl-tab-items")
				},
				992: {
					items: jQuery(this).data("owl-desktop-items")
				},
				1200: {
					items: jQuery(this).data("owl-desktop-items")
				}
			}
		});
		jQuery(this).find(".fancybox").fancybox({
			animationEffect: "zoom-in-out",
			animationDuration: 500,
			zoomOpacity: "auto",
		});
	});
	jQuery(".radiantthemes-case-studies-slider.owl-carousel").each(function () {
		jQuery(this).owlCarousel({
			nav: false,
			dots: false,
			mouseDrag: false,
			touchDrag: true,
			loop: jQuery(this).data("case-studies-mobileitem"),
			autoplay: jQuery(this).data("case-studies-mobileitem"),
			autoplayTimeout: jQuery(this).data("case-studies-mobileitem"),
			responsive: {
				0: {
					items: jQuery(this).data("case-studies-mobileitem")
				},
				321: {
					items: jQuery(this).data("case-studies-mobileitem")
				},
				480: {
					items: jQuery(this).data("case-studies-tabitem")
				},
				768: {
					items: jQuery(this).data("case-studies-tabitem")
				},
				992: {
					items: jQuery(this).data("case-studies-desktopitem")
				},
				1200: {
					items: jQuery(this).data("case-studies-desktopitem")
				}
			}
		});
		if (jQuery(this).hasClass("has-fancybox")) {
			jQuery(this).find(".fancybox").fancybox({
				animationEffect: "zoom-in-out",
				animationDuration: 500,
				zoomOpacity: "auto",
			});
		}
	});
	jQuery(".rt-case-study-box.isotope").each(function () {
		var $RTCaseStudyBoxElementOne = jQuery(this).isotope({
			layoutMode: 'masonry',
		});
		jQuery(this).parent().children(".rt-case-study-box-filter > button:last-child").addClass("current-menu-item");
		jQuery(this).parent().children(".rt-case-study-box-filter").on('click', 'button', function () {
			jQuery(this).parent().find("button").removeClass("current-menu-item");
			jQuery(this).attr("class", "current-menu-item");
			$RTCaseStudyBoxElementOne.isotope({
				filter: jQuery(this).attr("data-filter"),
			});
		});
		if (jQuery(this).hasClass("has-fancybox")) {
			jQuery(this).find(".fancybox").fancybox({
				animationEffect: "zoom-in-out",
				animationDuration: 500,
				zoomOpacity: "auto",
			});
		}
	});
	jQuery(".rt-flip-box").each(function () {
		jQuery(this).children(".holder").justFlipIt({
			FlipX: jQuery(this).data("flip-box-x"),
			Template: jQuery(this).find(".second-card"),
		});
		jQuery(this).find(".first-card").unwrap();
	});
	jQuery('.elementor-menu-toggle').click(function () {
		jQuery('.wraper_header_main').toggleClass("mobile-menu-open");
		jQuery('body').toggleClass("mobile-menu-active");
	});
	jQuery(".wraper_header .elementor-navigation").before("<div class='mobile-menu-close hidden-lg hidden-md visible-sm visible-xs'></div>");
	jQuery(".wraper_header .wraper_header_main > nav ul.elementor-nav-menu li.menu-item-has-children > .sub-menu, .header_holder .wraper_header_main > nav ul.elementor-nav-menu li.mega-parent-menu > .main-megamenu-holder > ul.mega-child-menu").after("<span class='radiantthemes-open-submenu  hidden-lg hidden-md visible-sm visible-xs'></span>");
	jQuery(".radiantthemes-open-submenu").click(function () {
		jQuery(this).parent().children(".sub-menu, .main-megamenu-holder > .mega-child-menu").slideToggle(500);
		jQuery('.wraper_header .wraper_header_main > nav ul.elementor-nav-menu li.menu-item-has-children, .header_holder .wraper_header_main > nav ul.elementor-nav-menu li.mega-parent-menu').toggleClass("radiantthemes-menu-open");
		jQuery(this).parent().children('.radiantthemes-open-submenu').toggleClass("active");
	});
	jQuery(".mobile-menu-close").click(function () {
		jQuery(".wraper_header_main").toggleClass("mobile-menu-open");
		jQuery("body").toggleClass("mobile-menu-active");
	});
	jQuery('.overlay').click(function () {
		jQuery(".wraper_header_main").toggleClass("mobile-menu-open");
		jQuery("body").toggleClass("mobile-menu-active");
	});
});
jQuery(".rt-portfolio-box.isotope").each(function () {
	var $RTportfolioBoxElementOne = jQuery(this).isotope({
		layoutMode: 'masonry',
	});
	jQuery(this).parent().children(".rt-portfolio-box-filter > button:last-child").addClass("current-menu-item");
	jQuery(this).parent().children(".rt-portfolio-box-filter").on('click', 'button', function () {
		jQuery(this).parent().find("button").removeClass("current-menu-item");
		jQuery(this).attr("class", "current-menu-item");
		$RTportfolioBoxElementOne.isotope({
			filter: jQuery(this).attr("data-filter"),
		});
	});
	if (jQuery(this).hasClass("has-fancybox")) {
		jQuery(this).find(".fancybox").fancybox({
			animationEffect: "zoom-in-out",
			animationDuration: 500,
			zoomOpacity: "auto",
		});
	}
});










