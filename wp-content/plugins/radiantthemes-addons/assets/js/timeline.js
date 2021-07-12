var WidgetRadiantTimelineHandler = function ($scope, $) {
	// RADIANTTHEMES TIMELINE.
	$(".radiantthemes-timeline").each(function () {
		$(this).find(".owl-carousel").owlCarousel({
			nav: false,
			dots: false,
			loop: true,
			autoplay: true,
			autoplayTimeout: 6000,
			items: 1,
			thumbs: true,
			thumbImage: false,
		});
	});
};

jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-timeline.default",
		WidgetRadiantTimelineHandler
	);
});
