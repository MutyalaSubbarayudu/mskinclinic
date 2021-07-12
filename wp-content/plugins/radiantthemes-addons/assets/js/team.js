// RADIANTTHEMES TEAM ELEMENT.
if (document.querySelector('.team.swiper-container')) {
    var teamSlider = document.querySelector('.team.swiper-container');
    var mobileItemsSelector = parseInt(teamSlider.dataset.mobileItems);
    var tabItemsSelector = parseInt(teamSlider.dataset.tabItems);
    var desktopItemsSelector = parseInt(teamSlider.dataset.desktopItems);
    var spacepostSelector = parseInt(teamSlider.dataset.spacer);
}

var swiper = new Swiper('.team.swiper-container', {
    slidesPerView: mobileItemsSelector,
    spaceBetween: spacepostSelector,
    loop: true,
    breakpoints: {
        640: {
            slidesPerView: mobileItemsSelector,
            spaceBetween: spacepostSelector,
        },
        768: {
            slidesPerView: tabItemsSelector,
            spaceBetween: spacepostSelector,
        },
        1024: {
            slidesPerView: desktopItemsSelector,
            spaceBetween: spacepostSelector,
        },
    }
});