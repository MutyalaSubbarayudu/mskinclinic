(function ($) {
	var PremiumProgressBarWidgetHandler = function ($scope, $) {
		var $progressbarElem = $scope.find(".premium-progressbar-container"),
			settings = $progressbarElem.data("settings"),
			length = settings.progress_length,
			speed = settings.speed;

		var $progressbar = $progressbarElem.find(".premium-progressbar-bar");

		if (settings.gradient)
			$progressbar.css("background", "linear-gradient(-45deg, " + settings.gradient + ")");

		$progressbar.animate({
			width: length + "%"
		}, speed);

	};

	var PremiumProgressBarScrollWidgetHandler = function ($scope, $) {
		elementorFrontend.waypoint($scope, function () {
			PremiumProgressBarWidgetHandler($(this));
		}, {
			offset: Waypoint.viewportHeight() - 150,
			triggerOnce: true
		});
	};

	$(window).on("elementor/frontend/init", function () {
		if (elementorFrontend.isEditMode()) {
			elementorFrontend.hooks.addAction(
				"frontend/element_ready/radiant-progressbar.default", PremiumProgressBarWidgetHandler);
		} else {
			elementorFrontend.hooks.addAction(
				"frontend/element_ready/radiant-progressbar.default", PremiumProgressBarScrollWidgetHandler);
		}
	});
})(jQuery);