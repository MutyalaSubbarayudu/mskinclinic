// RADIANTTHEMES IMAGE GALLERY.
var WidgetRadiantImageGalleryHandler = function ($scope, $) {

    //LIGHT BOX
    $(".rt-image-gallery.element-one .rt-image-gallery-item").each(function () {
        $(this).find(".pic-fancybox").html("<img src='" + jQuery(this).find(".light-box-content img").attr("src") + "' alt='" + jQuery(this).find(".light-box-content img").attr("alt") + "'>");
    });

    //MASONRY
    $('.rt-image-gallery-holder.isotope').isotope({
        percentPosition: true,
        layoutMode: 'packery',
    });

    $(".rt-image-gallery").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            nav: false,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            items: 1,
            thumbs: true,
            thumbImage: true,
        });
        $(this).find(".owl-thumb-item").css({
            "width": "calc(100% / " + $(this).data("thumbnail-items") + ")",
        });
    });
}

jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-image-gallery.default",
        WidgetRadiantImageGalleryHandler
    );
});