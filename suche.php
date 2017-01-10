<?php
/**
 * Template Name: Suche
 * Template Post Type: page
 *
 * @version 1.0
 *
 */

get_header(); ?>

    <div class="wrap">
        <aside id="secondary" class="widget-area facetwp-template" role="complementary">
            <section class="widget">
                <h2>Bewertung</h2>
                <?php echo facetwp_display( 'facet', 'bewertung' ); ?>
            </section>

            <section class="widget">
                <h2>Erscheinungsjahr</h2>
                <?php echo facetwp_display( 'facet', 'erscheinungsjahr' ); ?>
            </section>

            <section class="widget">
                <h2>Erscheinungsjahr</h2>
                <?php echo facetwp_display( 'facet', 'erscheinungsjahr' ); ?>
            </section>

            <section class="widget">
                <h2>Erfassungsdatum</h2>
                <?php echo facetwp_display( 'facet', 'erfassungsdatum' ); ?>
            </section>

            <section class="widget">
                <h2>Autor</h2>
                <?php echo facetwp_display( 'facet', 'autor' ); ?>
            </section>

            <section class="widget">
                <h2>Organisation</h2>
                <?php echo facetwp_display( 'facet', 'organisation' ); ?>
            </section>

            <section class="widget">
                <h2>Bildungsstufe</h2>
                <?php echo facetwp_display( 'facet', 'bildungsstufe' ); ?>
            </section>

            <section class="widget">
                <h2>Inklusion</h2>
                <?php echo facetwp_display( 'facet', 'inklusion' ); ?>
            </section>

            <section class="widget">
                <h2>Lizenz</h2>
                <?php echo facetwp_display( 'facet', 'lizenz' ); ?>
            </section>

            <section class="widget">
                <h2>Medientyp</h2>
                <?php echo facetwp_display( 'facet', 'medientyp' ); ?>
            </section>

            <section class="widget">
                <h2>Schlagworte</h2>
                <?php echo facetwp_display( 'facet', 'schlagworte' ); ?>
            </section>

            <section class="widget">
                <h2>Sprache</h2>
                <?php echo facetwp_display( 'facet', 'sprache' ); ?>
            </section>

            <section class="widget">
                <h2>Verfügbarkeit</h2>
                <?php echo facetwp_display( 'facet', 'verfuegbarkeit' ); ?>
            </section>

            <section class="widget">
                <h2>Zugänglichkeit</h2>
                <?php echo facetwp_display( 'facet', 'zugaenglichkeit' ); ?>
            </section>

        </aside><!-- #secondary -->
        <div id="primary" class="content-area">
            <main id="main" class="site-main  facetwp-template" role="main">

                <?php echo facetwp_display( 'facet', 'suche' ); ?>

                <?php echo facetwp_display( 'facet', 'alphabet' ); ?>

                <?php echo facetwp_display( 'template', 'example' ); ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .wrap -->

<?php get_footer();
