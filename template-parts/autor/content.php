<?php
/**
 * Created by PhpStorm.
 * User: Joachim
 * Date: 23.01.2017
 * Time: 17:22
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<article id="autor-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( is_sticky() && is_home() ) :
        echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
    endif;
    ?>
    <header class="entry-header">
        <?php
        if ( 'autor' === get_post_type() ) :
            if ( is_single() ) {
                ?><h1 class="entry-title">Materialien von <?php Materialpool_Autor::firstname();?> <?php Materialpool_Autor::lastname();?></h1><?php
            } else {
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }

        endif; ?>
    </header><!-- .entry-header -->
    <div class="entry-content autor">

        <div class="autor-left">
            <?php if(Materialpool_Autor::get_picture()):?>
                <div class="autor-image">
                    <?php Materialpool_Autor::picture_html(); ?><br>
                    <?php Materialpool_Autor::firstname();?> <?php Materialpool_Autor::lastname();?>
                </div>
            <?php else:?>
                <h3 class="image-alt">
                    <?php Materialpool_Autor::firstname();?> <?php Materialpool_Autor::lastname();?>
                </h3>
            <?php endif;?>
            <div class="first-search-facets">
                <?php echo facetwp_display( 'facet', 'bildungsstufe' ); ?>
                <?php echo facetwp_display( 'facet', 'medientyp' ); ?>

            </div>

            <div class="material-detail-buttons">
                <a class="cta-button" href="<?php Materialpool_Autor::url(); ?>">Webseite</a>
            </div>
        </div>
        <div class="autor-content">

                <div class="material-suche">
                    <?php echo facetwp_display( 'facet', 'suche' ); ?>
                </div>
                <div class="clear"></div>
                <div class="material-selection">
                    <?php echo facetwp_display( 'selections' ); ?>
                </div>
                <div>
                    <div class="material-counter">
                        <?php echo facetwp_display( 'counts' ); ?> Treffer
                    </div>
                    <div class="material-pager">
                        <?php echo facetwp_display( 'pager' ); ?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="material-results"><?php echo facetwp_display( 'template', 'material_autor' ); ?></div>
                <div class="material-pager"><?php echo facetwp_display( 'pager' ); ?></div>

        </div>
        <div class="autor-right material-meta-container">
            <div class="material-detail-meta-author material-meta">
                <h4>Organisationen</h4>
                    <?php Materialpool_Autor::organisation_html_cover(); ?>
            </div>
            <?php if(Materialpool_Autor::get_count_posts_per_autor()>4):?>
            <div class="autor-right badges material-meta">
                <h4>Auszeichnungen</h4>
                <div class="author-badge <?php if(Materialpool_Autor::get_count_posts_per_autor()>4) echo 'grau' ;?>">
                    5+ Materialien<br>
                    bei rpi-virtuell
                </div>

            </div>
            <?php endif;?>
        </div>



    </div>
</article>