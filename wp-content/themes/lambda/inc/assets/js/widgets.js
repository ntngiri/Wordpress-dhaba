/**
 * Oxygenna.com
 *
 * $Template:: *(TEMPLATE_NAME)*
 * $Copyright:: *(COPYRIGHT)*
 * $Licence:: *(LICENCE)*
 */
(function( $ ){
    for(var i = 0 ; i < 4 ; i++) {
        if(i >= oxyWidgetInfo.footerColumns) {
            $('#footer-' + (i+1)).parent().css('pointer-events', 'none').css('opacity', '0.4');
        }
        if(i >= oxyWidgetInfo.upperFooterColumns) {
            $('#upper-footer-' + (i+1)).parent().css('pointer-events', 'none').css('opacity', '0.4');
        }
    }
})( jQuery );
