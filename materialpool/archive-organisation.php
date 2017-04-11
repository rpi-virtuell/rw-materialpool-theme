<?php
/**
 * The Template for displaying all autors aka archive
 *
 * @since      0.0.1
 * @package    Materialpool
 * @author     Frank Staude <frank@staude.net>
 * @version    0.0.2
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
                $id = get_the_ID();
                $name = Materialpool_Organisation::get_title_long();
                if ( $name == '' ) {
                    $name = Materialpool_Organisation::get_title();
                }
                $pic = Materialpool_Organisation::get_logo();

                ?>
                <div style="padding-top: 20px;">
                    <div style="float: left; width: 25%;"><img src="<?php echo $pic; ?>" style="max-width: 98%"></div>
                    <div style="float: left; width: 75%;"><h2><a href="<?php echo get_permalink( $id); ?>"><?php echo $name; ?></a></h2></div>
                    <div style="clear: both;"></div>

                </div>
                <?php
            endwhile; // End of the loop.

            posts_nav_link();
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

</div><!-- .wrap -->


<?php get_footer( 'materialpool' ); ?>
