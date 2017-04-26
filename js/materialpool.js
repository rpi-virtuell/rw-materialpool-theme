/**
 * Created by Joachim on 03.02.2017.
 */
jQuery(document).ready(function ($) {

    var baseUrl = location.href;


    $(document).on('facetwp-loaded', function() {
        // Scroll to the top of the page after the page is refreshed
        //$('html, body').animate({ scrollTop: 0 }, 500);
    });


    jQuery('.facetwp-facet-bildungsstufen_themenseite').on('mouseup', function(){
       /*
        jQuery('body').css('opacity','0.2');
        setTimeout(function(){
            location.reload();
        }, 200);
*/
    });


    $("#thema-toc").toc({content: "body", headings: "h2"});

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


    jQuery( '.themenseite-gruppen' ).accordion({
        collapsible: true,
        active:false,
        heightStyle: 'content',
        header:'h2'
    });

});

