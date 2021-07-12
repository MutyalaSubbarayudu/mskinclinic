// RADIANTTHEMES CASE STUDIES SLIDER.
var WidgetRadiantCASESTUDIESHandler = function ($scope, $) {
    $(".radiantthemes-case-studies-slider.owl-carousel").each(function(){
		$(this).owlCarousel({
			nav: true,
			dots: false,
			mouseDrag: true,
			touchDrag: true,
			navText:['<span class="ti-arrow-left"> </span>','<span class="ti-arrow-right"> </span>'],
			loop: jQuery(this).data("case-studies-mobileitem") ,
			autoplay: jQuery(this).data("case-studies-mobileitem") ,
			autoplayTimeout: jQuery(this).data("case-studies-mobileitem") ,
			responsive:{
		        0:{ items: jQuery(this).data("case-studies-mobileitem") },
		        321:{ items: jQuery(this).data("case-studies-mobileitem") },
		        480:{ items: jQuery(this).data("case-studies-tabitem") },
		        768:{ items: jQuery(this).data("case-studies-tabitem") },
		        992:{ items: jQuery(this).data("case-studies-desktopitem") },
		        1200:{ items: jQuery(this).data("case-studies-desktopitem") }
		    }
        });
        if ( $(this).hasClass("has-fancybox") ) {
            $(this).find(".fancybox").fancybox({
                animationEffect: "zoom-in-out",
                animationDuration: 500,
                zoomOpacity: "auto",
            });
        }
	});
}
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-case_studies_slider.default",
		WidgetRadiantCASESTUDIESHandler
	);
});