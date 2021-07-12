	// RADIANTTHEMES TYPEWRITER ELEMENT.
var WidgetRadiantTypewriter-textHandler = function ($scope, $) {
jQuery(".radiantthemes-typewriter-text").each(function(){
        jQuery(this).children(".typed-writer").typed({
            stringsElement: jQuery(this).children(".typed-strings") ,
            typeSpeed: jQuery(this).data("typewriter-typespeed") ,
            startDelay: jQuery(this).data("typewriter-startdelay") ,
            backSpeed: jQuery(this).data("typewriter-backspeed") ,
            backDelay: jQuery(this).data("typewriter-backdelay") ,
            shuffle: jQuery(this).data("typewriter-shuffle") ,
            loop: jQuery(this).data("typewriter-loop") ,
            loopCount: false, // false = infinite
            showCursor: false,
            cursorChar: "|",
        });
    });
};
jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-typewriter-text.default",
		WidgetRadiantTypewriter-textHandler
	);
});