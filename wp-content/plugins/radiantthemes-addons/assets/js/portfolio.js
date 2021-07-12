var WidgetRadiantPortfolioHandler = function ($scope, $) {

	// RADIANTTHEMES PORTFOLIO SLIDER.
	$(".rt-portfolio-slider.owl-carousel").each(function () {
		$(this).owlCarousel({
			nav: true,
			dots: false,
			mouseDrag: false,
			touchDrag: true,
			loop: $(this).data("portfolio-mobileitem"),
			autoplay: $(this).data("portfolio-mobileitem"),
			autoplayTimeout: $(this).data("portfolio-mobileitem"),
			responsive: {
				0: { items: $(this).data("portfolio-mobileitem") },
				321: { items: $(this).data("portfolio-mobileitem") },
				480: { items: $(this).data("portfolio-tabitem") },
				768: { items: $(this).data("portfolio-tabitem") },
				992: { items: $(this).data("portfolio-desktopitem") },
				1200: { items: $(this).data("portfolio-desktopitem") }
			}
		});
		if ($(this).hasClass("has-fancybox")) {
			$(this).find(".fancybox").fancybox({
				animationEffect: "zoom-in-out",
				animationDuration: 500,
				zoomOpacity: "auto",
			});
		}
	});

	// RADIANTTHEMES PORTFOLIO BOX.
	$(window).on('load', PortfolioBox);
	setTimeout(PortfolioBox, 500);
	function PortfolioBox() {
		$(".rt-portfolio-box.isotope").each(function () {
			$(this).isotope({
				percentPosition: true,
				//layoutMode: 'packery',
				layoutMode: 'masonry',
			});
			$(this).find(".fancybox").fancybox({
				animationEffect: "zoom-in-out",
				animationDuration: 500,
				zoomOpacity: "auto",
			});
		});
	};

};

jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-portfolio.default",
		WidgetRadiantPortfolioHandler
	);
});
