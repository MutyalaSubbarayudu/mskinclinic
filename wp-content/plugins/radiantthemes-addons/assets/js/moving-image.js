var WidgetRadiantMovingImageHandler = function ($scope, $) {
	var frontlayer = $('.frontlayer');
	var overlay = $('.overlay');
    // Move front layer a bit more than the bg layer.
	frontlayer.animate({
		textIndent: 0
	}, {
		step: function(now, fx) {
			overlay.mousemove(function(e) {
				var amountMovedX = (e.pageX * -1 / 26);
				var amountMovedY = (e.pageY * -1 / 16);
				frontlayer.css({
					'-webkit-transform': 'translate3d(' + amountMovedX + 'px,' + amountMovedY + 'px, 0)',
					'-moz-transform': 'translate3d(' + amountMovedX + 'px,' + amountMovedY + 'px, 0)',
					'-ms-transform': 'translate3d(' + amountMovedX + 'px,' + amountMovedY + 'px, 0)',
					'-o-transform': 'translate3d(' + amountMovedX + 'px,' + amountMovedY + 'px, 0)',
					'transform': 'translate3d(' + amountMovedX + 'px,' + amountMovedY + 'px, 0)'
				});
			});
		},
		duration: 3000
	}, 'easeOutCubic');
};

jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-moving-image.default",
		WidgetRadiantMovingImageHandler
	);
});
