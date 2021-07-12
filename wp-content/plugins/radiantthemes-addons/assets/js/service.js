
if (document.querySelector('.rt-servicebox.element-one .swiper-container')) {
    var serviceboxSlider = document.querySelector('.rt-servicebox.element-one .swiper-container');
    var mobileItemsSelector3 = parseInt(serviceboxSlider.dataset.mobileItems);
    var tabItemsSelector3 = parseInt(serviceboxSlider.dataset.tabItems);
    var desktopItemsSelector3 = parseInt(serviceboxSlider.dataset.desktopItems);
    var spaceSelector3 = parseInt(serviceboxSlider.dataset.spacer);
}

var swiper = new Swiper('.rt-servicebox.element-one  .swiper-container', {
    slidesPerView: mobileItemsSelector3,
    loop: true,
    centeredSlides: true,
    freeMode: true,
    grabCursor: true,
    pagination: {
        el: '.swiper-pagination3',
        clickable: true,
    },
    navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
    breakpoints: {
        640: {
            slidesPerView: mobileItemsSelector3,
        },
        768: {
            slidesPerView: tabItemsSelector3,
            spaceBetween: spaceSelector3,
        },
        1024: {
            slidesPerView: desktopItemsSelector3,
            spaceBetween: spaceSelector3,
        },
    }
});