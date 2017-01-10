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
                    <P>Aktuell</P>
                    <div class="startseite-block-content">
                        Auflistung Aktueller Materialien (Redaktionsauswahl)
                    </div>
                </div>
                <div class="startseite-block-header">
                    <P>Neues Material</P>
                    <div class="startseite-block-content">
                        Auflistung neuer Materialien.
                    </div>
                </div>
                <div class="startseite-block-header">
                    <P>Freies Material</P>
                    <div class="startseite-block-content">
                        Auflistung freier Materialien
                    </div>
                </div>
                <div class="startseite-block-header">
                    <p>Freitext</p>
                    <div class="startseite-block-content">
                    <?php
                        $freitext = get_metadata( 'post', $post->ID, 'startseite_freitext', true );
                        echo do_shortcode( $freitext );
                    ?>
                    </div>
                </div>
                <div class="startseite-block-header">
                    <P>Dienste RPI</P>
                    <div class="startseite-block-content">
                        Die RPI Dienste
                    </div>
                </div>
                <div class="startseite-block-header">
                    <P>Specials</P>
                    <div class="startseite-block-content">
                        Die neuesten Specials
                    </div>
                </div>
                <div class="startseite-block-header">
                    <p>Über uns</p>
                    <div class="startseite-block-content">
                        <?php
                        $about = get_metadata( 'post', $post->ID, 'startseite_about', true );
                        echo do_shortcode( $about );
                        ?>
                    </div>
                </div>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
