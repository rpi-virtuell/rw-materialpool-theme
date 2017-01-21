<?php
/**
 * The Template for displaying all single material
 *
 * This template can be overridden by copying it to yourtheme/materialpool/single-material.php.
 *
 * @since      0.0.1
 * @package    Materialpool
 * @author     Frank Staude <frank@staude.net>
 * @version    0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}




get_header( 'materialpool' ); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
                if ( ! Materialpool_Material::is_special() &&  ! Materialpool_Material::is_viewer()  &&  ! Materialpool_Material::is_embed()  ) {
                    get_template_part('template-parts/material/content', get_post_format());
                }else{
                    get_template_part('template-parts/material/content-special', get_post_format());
                }

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

                /*
                the_post_navigation( array(
                    'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
                    'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
                ) );
                */
            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

</div><!-- .wrap -->

<?php get_footer();