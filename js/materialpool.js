/**
 * Created by Joachim on 03.02.2017.
 */
jQuery(document).ready(function ($) {

    var baseUrl = location.href;


    $(document).on('facetwp-loaded', function() {
        // Scroll to the top of the page after the page is refreshed
        $('html, body').animate({ scrollTop: 0 }, 500);
    });

    jQuery('.facetwp-facet-bildungsstufen_themenseite').on('click', function(){
        location.reload();
    });

    $(".material-detail-content-viewer").toc({

        // option to shorten headlines that are too long
        shorten: false,

        // strip them after
        stripAfter: 50,

        // speed of scrolling animation
        scrollSpeed: 400,

        // offset (useful if fixed positioned headers are used)
        scrollOffset: 100,

        // wrapper for toc (for example if displayed in bubble)
        //wrapWith: '<div class="thema-toc"/>',

        // toc container (parent element of toc)
        container: '#thema-toc'

    });

    jQuery('.rw-search-wrapper input#s').attr('name','fwp_suche');
    jQuery('.rpi-center-col form').attr('action','/facettierte-suche/')

});

