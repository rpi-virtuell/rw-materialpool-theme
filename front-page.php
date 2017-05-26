<?php
/**
 * Template Name: Startseite
 * Template Post Type: page
 *
 * @version 1.0
 *
 */

get_header();
global $post;
?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <div class="startseite-block-header">
                    <p>Herzlich willkommen im neuen Materialpool</p>
                    <div class="startseite-block-content">
                        <?php
                        $freitext = get_metadata( 'post', $post->ID, 'startseite_freitext', true );
                        echo do_shortcode( $freitext );
                        ?>
                    </div>
                </div>

                <div class="clear"></div>
                <div class="startseite-block-header">
                    <p>Aktuell</p>
                    <div class="startseite-block-content material-results">
                        <?php echo facetwp_display( 'template', 'startseite_aktuell' ); ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="startseite-block-header">
                    <P>Neu im Materialpool</P>
                    <div class="startseite-block-content  material-results">
                       <?php echo facetwp_display( 'template', 'startseite_neue_materialien' ); ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="startseite-block-header">
                    <P>Frei lizensierte Bildungsmedien (OER)</P>
                    <div class="startseite-block-content  material-results">
                        <?php echo facetwp_display( 'template', 'startseite_oer' ); ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="startseite-block-header">
                    <p>Specials</p>
                    <div class="startseite-block-content material-results">
                        <?php echo facetwp_display( 'template', 'startseite_specials' ); ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="startseite-block-header">
                    <p>Über uns</p>
                    <div class="startseite-block-content">
                        <?php
                        $about = get_metadata( 'post', $post->ID, 'startseite_about', true );
                        echo do_shortcode( $about );
                        ?>
                    </div>
                </div>
                <div class="clear"></div>

            </main><!-- #main -->
        </div><!-- #primary -->
        <div id="secondary" style="display: none"></div>
    </div><!-- .wrap -->

<?php get_footer();
