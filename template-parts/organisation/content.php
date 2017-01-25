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
<article id="organisation-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( is_sticky() && is_home() ) :
        echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
    endif;
    ?>
    <header class="entry-header">
        <?php
        if ( 'organisation' === get_post_type() ) :
            if ( is_single() ) {
                ?><h1 class="entry-title">Materialien von <?php Materialpool_Organisation::title();?> </h1><?php
            } else {
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }

        endif; ?>
    </header><!-- .entry-header -->
    <div class="entry-content organisation">

        <div class="organisation-left">

            <div class="organisation-image" style="background-image: url('<?php echo Materialpool_Organisation::get_logo(); ?>'); background-repeat: no-repeat; ">
                <img src="<?php echo Materialpool_Organisation::get_logo(); ?>" sytle="opacity:0">
            </div>
            <div>
                <?php if(Materialpool_Organisation::is_alpika()):?>
                    <p>
                    Dieses Institut ist Teil der
                    <a href="http://www.relinet.de/alpika.html">Arbeitsgemeinschaft</a> der Leiterinnen und Leiter der
                    Pädagogischen Institute und Katechetischen Ämter in der Evangelischen Kirche an.
                    </p>
                <?php endif;?>
            </div>
            <div class="material-detail-buttons">
                <a class="cta-button" href="<?php echo Materialpool_Organisation::get_url(); ?>">Webseite</a>
            </div>
        </div>
        <div class="organisation-content">

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
            <div class="material-results"><?php echo facetwp_display( 'template', 'material_organisation' ); ?></div>
            <div class="material-pager"><?php echo facetwp_display( 'pager' ); ?></div>

        </div>
        <?php if(Materialpool_Organisation::get_autor()[0]):?>
        <div class="organisation-right material-meta-container">
            <div class="material-detail-meta-author material-meta">
                <h4>Zugehörige Autorinnen und Autoren</h4>
                <?php Materialpool_Organisation::autor_html_picture(); ?>
            </div>
        </div>
        <?php
        endif;?>


    </div>
</article>