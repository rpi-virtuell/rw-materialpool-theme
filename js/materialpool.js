/**
 * Created by Joachim on 03.02.2017.
 */
jQuery(document).ready(function ($) {

    var baseUrl = location.href;


    $(document).on('facetwp-loaded', function() {
        // Scroll to the top of the page after the page is refreshed
        //$('html, body').animate({ scrollTop: 0 }, 500);
        jQuery( '.themenseite-gruppen' ).accordion({
            collapsible: true,
            heightStyle: 'content',
            header:'h2'
        });
    });


    jQuery('.facetwp-facet-bildungsstufen_themenseite').on('mouseup', function(){
       /*
        jQuery('body').css('opacity','0.2');
        setTimeout(function(){
            location.reload();
        }, 200);
*/
    });


    $("#thema-toc").toc({content: "#thema-description", headings: "h2"});

    $("#thema-toc li a").on('click', function () {
        var id = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(id).offset().top -110
        }, 800);
    })


    jQuery('.rw-search-wrapper input#s').attr('name','fwp_suche');
    jQuery('.rpi-center-col form').attr('action','/facettierte-suche/');

    jQuery( document ).ajaxStart(function() {
        jQuery('#page-loader').addClass('facetwp-loading');
    });
    jQuery( document ).ajaxComplete(function() {
        jQuery('#page-loader').removeClass('facetwp-loading');
    });


    jQuery('.page-template-suche-php .facet-treffer-content h2 a ').each(function() {
        var currHref = $(this).attr("href");
        if (currHref.indexOf('?') > 0)
            jQuery(this).attr("href",currHref+"&sq="+ encodeURIComponent(window.location));
        else
            jQuery(this).attr("href",currHref+"?sq="+ encodeURIComponent(window.location));
    });

    jQuery( document ).ajaxComplete(function( event, request, settings ) {
        jQuery('.page-template-suche-php .facet-treffer-content h2 a ').each(function() {
            var currHref = $(this).attr("href");
            if (currHref.indexOf('?') > 0)
                jQuery(this).attr("href",currHref+"&sq="+ encodeURIComponent(window.location));
            else
                jQuery(this).attr("href",currHref+"?sq="+ encodeURIComponent(window.location));
        });
    });
});
