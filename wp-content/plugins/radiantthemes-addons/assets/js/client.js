var WidgetRadiantClientHandler = function ($scope, $) {
    if (document.querySelector('.clients.swiper-container')) {
        var clientSlider = document.querySelector('.clients.swiper-container');
        var mobileItemsSelector3 = parseInt(clientSlider.dataset.mobileItems);
        var tabItemsSelector3 = parseInt(clientSlider.dataset.tabItems);
        var desktopItemsSelector3 = parseInt(clientSlider.dataset.desktopItems);
        var postgapItemsSelector = parseInt(clientSlider.dataset.spacer);
    }

    var clientswiper = new Swiper('.clients.swiper-container', {
        slidesPerView: mobileItemsSelector3,
        spaceBetween: postgapItemsSelector,
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: mobileItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            768: {
                slidesPerView: tabItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
            1024: {
                slidesPerView: desktopItemsSelector3,
                spaceBetween: postgapItemsSelector,
            },
        }
    });
}
jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-client.default",
        WidgetRadiantClientHandler
    );
});