<?php
/**
 * Template Name: Suche altes Material
 * Template Post Type: page
 *
 * @version 1.0
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'materialpool' ); ?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="wrap">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <div class="entry-content material-facet-search">
                                <div class="material-facetscontainer">
                                    <div class="mfacet-wrap">
                                        <div class="first-search-facets">
                                            <?php echo facetwp_display( 'facet', 'bildungsstufe' ); ?>
                                            <?php echo facetwp_display( 'facet', 'medientyp' ); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="material-resultcontainer">
                                    <div class="material-suche">
                                        <?php echo facetwp_display( 'facet', 'suche' ); ?>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="material-selection"><?php echo facetwp_display( 'selections' ); ?></div>
                                    <div>
                                        <div class="material-counter">
                                            <?php echo facetwp_display( 'counts' ); ?> Treffer
                                        </div>
                                        <div class="material-pager">
                                            <?php echo facetwp_display( 'pager' ); ?>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="material-results"><?php echo facetwp_display( 'template', 'materialalt' ); ?></div>
                                    <div class="material-pager"><?php echo facetwp_display( 'pager' ); ?></div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </main>
        </div>
        <div id="secondary" style="display: none"></div>
    </div>
<?php get_footer();



