var WidgetRadiantTestimonialHandler = function ($scope, $) {
    var spacerSwiper = parseInt($('.testimonial.swiper-container').attr("data-spacer"));
    var mobileItems = parseInt($('.testimonial.swiper-container').attr("data-mobile-items"));
    var tabItems = parseInt($('.testimonial.swiper-container').attr("data-tab-items"));
    var desktopItems = parseInt($('.testimonial.swiper-container').attr("data-desktop-items"));
    var testimonialSwiper = new Swiper('.testimonial.swiper-container', {
        slidesPerView: mobileItems,
        spaceBetween: spacerSwiper,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: mobileItems,
            },
            768: {
                slidesPerView: tabItems,
            },
            1024: {
                slidesPerView: desktopItems,
            },
        }
    });
};
jQuery(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction("frontend/element_ready/radiant-testimonial.default", WidgetRadiantTestimonialHandler);
});