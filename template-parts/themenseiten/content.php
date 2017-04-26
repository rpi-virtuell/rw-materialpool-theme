<?php
/**
 *
 */

global $themenseite_material_id_list;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( is_sticky() && is_home() ) :
        echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
    endif;
    ?>
    <header class="entry-header">
       <?php     the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
            </a>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>

    <div class="entry-content material-detail">

        <div class="material-detail-content-viewer material-column">

            <header class="thema-header">
                <div class="thema-facets">
                    <ul id="thema-toc" class="thema-toc"></ul>
                </div>
                <div id="thema-description" class="thema-description"><?php the_content(); ?></div>
            </header>

            <header class="thema-header">
                <div class="thema-facets">
                    <?php echo facetwp_display( 'facet', 'bildungsstufen_themenseite' ); ?>
                </div>
                <div class="thema-description themenseite-gruppen">
                <?php foreach ( Materialpool_Themenseite::get_gruppen() as $gruppe ) {
                    $result = facetwp_display( 'template', 'thema' );

                    if(strlen($result) > 100){
                    ?>
                    <div class="themenseite-gruppe material-column">
                        <h2><?php echo $gruppe[ 'gruppe' ]; ?></h2>
                        <div>
                            <p><?php echo do_shortcode( $gruppe[ 'gruppenbeschreibung' ] ); ?></p>
                            <?php $themenseite_material_id_list = explode( ',', $gruppe[ 'auswahl'] ); ?>
                            <div class="material-results"><?php echo $result; ?></div>
                        </div>
                    </div>
                <?php }} ?>
                </div>
            </header>

        </div>


</article><!-- #post-## -->
