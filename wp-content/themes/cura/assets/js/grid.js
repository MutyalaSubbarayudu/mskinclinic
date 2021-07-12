(function($) {
    "use strict";
    jQuery(document).ready(function () {
        jQuery('.masonry-video').each(function () {
            jQuery(this)
                .find('.video-link')
                .fancybox({ defaults: { speed: 1000 } });
        });
    });
})(jQuery);
if (document.getElementById('grid-bx')) {
    new AnimscrollOn(document.getElementById('grid-bx'), {
        minDuration: 0.4,
        maxDuration: 0.7,
        viewportFactor: 0.2,
    });
}
