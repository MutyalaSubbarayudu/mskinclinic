var WidgetRadiantSliderHandler = function ($scope, $) {
	$(".rt-slider.owl-carousel").each(function () {
		$(this).owlCarousel({
			thumbs: false,
			thumbImage: false,
			nav: $(this).data("owl-nav"),
			dots: $(this).data("owl-dots"),
			loop: $(this).data("owl-loop"),
			center: true,
			autoplay: $(this).data("owl-autoplay"),
			autoplayTimeout: $(this).data("owl-autoplay-timeout"),
			slideTransition: 'linear',
			autoplayHoverPause: true,
			margin: 30,
			rewindNav: false,
			responsive: {
				0: { items: $(this).data("owl-mobile-items") },
				321: { items: $(this).data("owl-mobile-items") },
				480: { items: $(this).data("owl-tab-items") },
				768: { items: $(this).data("owl-tab-items") },
				992: { items: $(this).data("owl-desktop-items") },
				1200: { items: $(this).data("owl-desktop-items") }
			}
		});
	});
}
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-slider.default",
		WidgetRadiantSliderHandler
	);
});