jQuery('.colorbox').colorbox({maxWidth:'95%', maxHeight:'95%'});

/* Colorbox resize function */
var resizeTimer;
function resizeColorBox()
{
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
            if (jQuery('#cboxOverlay').is(':visible')) {
                    jQuery.colorbox.load(true);
            }
    }, 300)
}

// Resize Colorbox when resizing window or changing mobile device orientation
jQuery(window).resize(resizeColorBox);
window.addEventListener("orientationchange", resizeColorBox, false);