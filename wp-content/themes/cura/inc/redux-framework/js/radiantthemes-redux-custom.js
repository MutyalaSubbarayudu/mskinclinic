jQuery(document).on("ready", function(){
	// DATEPICKER
	jQuery("input[id='coming_soon_datetime']").each(function(){
		jQuery(this).attr("readonly", "readonly");
		jQuery(this).appendDtpicker();
	});
	jQuery( "#redux-defaults-section-sticky" ).before( '<button class="test-reset" type="button">Reset</button>' );
	jQuery( ".test-reset" ).click(function() {
        jQuery("#redux-defaults-section-sticky").show();
        jQuery("#redux-defaults-sticky").show();
        jQuery(".test-reset").hide();
        setTimeout(function() {
            jQuery("#redux-defaults-section-sticky").hide();
            jQuery("#redux-defaults-sticky").hide();
            jQuery(".test-reset").show();       
        }, 9000);
    });
});
jQuery(window).on("load", function(){
	setTimeout(function(){
		// SUBHEADER TOGGLE
		jQuery(".enable-toggle").next().hide();
		jQuery(".enable-toggle").addClass("i-am-toggled");
		jQuery(".enable-toggle").on("click", function(){
			jQuery(this).next().toggle();
			jQuery(this).toggleClass("i-am-toggled");
		});
	}, 2000);
});