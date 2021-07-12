var WidgetRadiantBlogHandler = function ($scope, $) {
    if (document.querySelector('.blog.swiper-container')) {
        var blogSlider = document.querySelector('.blog.swiper-container');
        var mobileItemsSelector = parseInt(blogSlider.dataset.mobileItems);
        var tabItemsSelector = parseInt(blogSlider.dataset.tabItems);
        var desktopItemsSelector = parseInt(blogSlider.dataset.desktopItems);
    } else {
        var blogSlider = 'test';
        var mobileItemsSelector = 3;
        var tabItemsSelector = 2;
        var desktopItemsSelector = 1;
    }
    var swiper = new Swiper('.blog.swiper-container', {
        slidesPerView: mobileItemsSelector,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: mobileItemsSelector,
            },
            768: {
                slidesPerView: tabItemsSelector,
            },
            1024: {
                slidesPerView: desktopItemsSelector,
            },
        }
    });
}
jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/radiant-blog.default",
        WidgetRadiantBlogHandler
    );
});