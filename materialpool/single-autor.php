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
    <section  class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="autor-detail-left">
                <?php Materialpool_Autor::picture_html(); ?>
                <br>
            </div>
            <div class="material-detail-content">
                <div class="material-detail-header facet-treffer-content">
                    <h2><?php Materialpool_Autor::firstname(); ?> <?php Materialpool_Autor::lastname(); ?>
                    </h2>
                    <strong>URL</strong> <?php Materialpool_Autor::url_html(); ?><br>

                    <div class="autor-detail-main">
                        <h3>Organisationen des Autors:</h3><br>
                        <?php Materialpool_Autor::organisation_html_cover(); ?>
                        <div class="clear"></div>
                        <h3>Material des Autors:</h3><br>
                        <?php  echo do_shortcode( '[facetwp template="material_autor"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer( 'materialpool' ); ?>

