<?php
/**
 * Template Name: Suche
 * Template Post Type: page
 *
 * @version 1.0
 *
 */

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }


    if ( 'iframe' == $wp_query->query_vars[ 'mpembed'] ) {
        get_header( 'materialpool-iframe' );
    } else {
        get_header( 'materialpool');
    }

    ?>

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
                                            <?php echo facetwp_display( 'facet', 'alpika' ); ?>
                                            <?php echo facetwp_display( 'facet', 'vorauswahl' ); ?>

                                        </div>
                                        <div class="second-search-facets">
                                            <?php echo facetwp_display( 'facet', 'schlagworte' ); ?>
                                            <?php echo facetwp_display( 'facet', 'inklusion' ); ?>
                                            <?php echo facetwp_display( 'facet', 'organisation' ); ?>
                                            <?php echo facetwp_display( 'facet', 'autor' ); ?>
                                            <?php echo facetwp_display( 'facet', 'lizenz' ); ?>
                                            <?php echo facetwp_display( 'facet', 'sprache' ); ?>
                                            <?php echo facetwp_display( 'facet', 'verfuegbarkeit' ); ?>
                                            <?php echo facetwp_display( 'facet', 'zugaenglichkeit' ); ?>
                                            <?php echo facetwp_display( 'facet', 'werkzeuge' ); ?>
                                            <?php echo facetwp_display( 'facet', 'erscheinungsjahr' ); ?>
                                        </div>
                                        <div class="advanced-search-facets" style="display:none">
                                            <?php echo facetwp_display( 'facet', 'erfassungsdatum' ); ?>
                                            <?php echo facetwp_display( 'facet', 'bewertung' ); ?>
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
                                    <div class="material-old">
                                        <?php echo facetwp_display( 'facet', 'test' ); ?>
                                    </div>
                                    <div class="material-results"><?php echo facetwp_display( 'template', 'example' ); ?></div>
                                    <div class="material-pager"><?php echo facetwp_display( 'pager' ); ?></div></div><div id="page-loader"></div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </main>
        </div>


<?php

if ( 'iframe' == $wp_query->query_vars[ 'mpembed'] ) {
    get_footer('materialpool-iframe' );
} else {
	get_footer( );
}
