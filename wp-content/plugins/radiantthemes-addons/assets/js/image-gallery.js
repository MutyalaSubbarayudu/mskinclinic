// RADIANTTHEMES IMAGE GALLERY.
var WidgetRadiantImageGalleryHandler = function ($scope, $) {
    if (document.querySelector('.rt-image-gallery.element-seven.swiper-container')) {
        var clientSlider = document.querySelector('.rt-image-gallery.element-seven.swiper-container');
        var mobileItemsSelector = parseInt(clientSlider.dataset.mobileItems);
        var tabItemsSelector = parseInt(clientSlider.dataset.tabItems);
        var desktopItemsSelector = parseInt(clientSlider.dataset.desktopItems);
        var postgapSelector = parseInt(clientSlider.dataset.spacer);
    }

    var swiper = new Swiper(".rt-image-gallery.element-seven.swiper-container", {
        slidesPerView: mobileItemsSelector,
        spaceBetween: postgapSelector,
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: mobileItemsSelector,
                spaceBetween: postgapSelector,
            },
            768: {
                slidesPerView: tabItemsSelector,
                spaceBetween: postgapSelector,
            },
            1024: {
                slidesPerView: desktopItemsSelector,
                spaceBetween: postgapSelector,
            },
        }
    });
}

jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-image-gallery.default",
        WidgetRadiantImageGalleryHandler
    );
});