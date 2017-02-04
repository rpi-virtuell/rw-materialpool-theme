<?php
/**
 * The Template for displaying all single themenseite
 *
 * This template can be overridden by copying it to yourtheme/materialpool/single-themenseite.php.
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
                   get_template_part('template-parts/themenseiten/content', get_post_format());

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .wrap -->

<?php get_footer();