var WidgetRadiantPopupVideoHandler = function ($scope, $) {
	// RADIANTTHEMES POPUP VIDEO.
	$(".rt-popup-video").each(function () {
		$(this).find(".video-link").fancybox({
			defaults: {
				speed: 1000,
			},
		});
	});
};

jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-popup-video.default",
		WidgetRadiantPopupVideoHandler
	);
});
