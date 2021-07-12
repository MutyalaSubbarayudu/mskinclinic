// RADIANTTHEMES SEARCH ELEMENT.
var WidgetRadiantSearchHandler = function ($scope, $) {
	$(document).ready(function() {
		$('#close-btn').click(function() {
			$('#search-overlay').fadeOut();
			$('.search-btn').show();
		});
		$('.search-btn').click(function() {
			$(this).hide();
			$('#search-overlay').fadeIn();
		});
	});
};
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-search.default",
		WidgetRadiantSearchHandler
	);
});
