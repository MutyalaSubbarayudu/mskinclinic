var WidgetRadiantAccordionHandler = function ($scope, $) {
	// RADIANTTHEMES ACCORDION.
	$(".radiantthemes-accordion-item").each(function () {
		$(this).find(".radiantthemes-accordion-item-body").hide();
		$(this).find(".radiantthemes-accordion-item-title").click(function () {
		    $(this).parent().children(".radiantthemes-accordion-item-body").slideToggle("500");
            $(this).parent().toggleClass("radiantthemes-active");
		});
	});
	
	////////////
//Accordian Action
var action = 'click';
var speed = "500";


//Document.Ready
$(document).ready(function () {
    t=$('.ques_bx li').attr('class')
    //Question handler
    $('li.' + t).on(action, function () {
        //gets next element
        //opens .a of selected question
        $(this).next().slideToggle(speed)
            //selects all other answers and slides up any open answer
            .siblings('li.a').slideUp();

        //Grab img from clicked question
        var plus = $(this).children('.plus');
        //Remove Minus class from all images except the active
        $('.plus').not(plus).removeClass('minus');
        //toggle rotate class
        plus.toggleClass('minus');

    }); //End on click
    $('.accord_bx_sec ul li').eq(0).trigger('click');
}); //End Ready

	///////
};

jQuery(window).on("elementor/frontend/init", function () {
	elementorFrontend.hooks.addAction(
		"frontend/element_ready/radiant-accordion.default",
		WidgetRadiantAccordionHandler
	);
});
