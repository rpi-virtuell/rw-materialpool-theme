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

if ( ! Materialpool_Material::is_special() &&  ! Materialpool_Material::is_viewer()  &&  ! Materialpool_Material::is_embed()  ) {


    get_header( 'materialpool' ); ?>
    <section  class="content-area">


        <div id="content" class="site-content" role="main">
            <div class="material-detail-top-header">
                <h2><?php the_title(); ?></h2>
            </div>
            <div>
                <div class="material-detail-left">


                    <?php echo  Materialpool_Material::cover_facet_html_noallign(); ?>
                    <a href="<?php Materialpool_Material::url(); ?>"><?php Materialpool_Material::url_shorten(); ?></a><br>
                    <br>
                    <?php echo Materialpool_Material::cta_link(); ?><br>
                    <?php echo Materialpool_Material::cta_url2clipboard(); ?>

                </div>
                <div class="material-detail-content">
                    <div class="material-detail-header facet-treffer-content">
                        <span class="material-detail-shortdescription"><?php Materialpool_Material::shortdescription(); ?></span><br>
                        <div class="material-detail-main">
                            <div class="material-detail-middle">
                                <?php Materialpool_Material::description(); ?>
                                <br>
                                <?php Materialpool_Material::description_footer(); ?>
                                <?php if ( Materialpool_Material::has_verweise() ) { ?>
                                    <div class="">
                                        <h3>Siehe auch</h3>
                                        <?php  echo do_shortcode( '[facetwp template="material_verweise"]'); ?>
                                    </div>
                                <?php } ?>

                                <?php if ( Materialpool_Material::is_werk() ) { ?>
                                    <h3>Dies ist ein Werk. Folgende Bände sind zugeordnet:</h3>
                                    <?php Materialpool_Material::volumes_html( true ); ?><br>
                                <?php } ?>


                                <?php if ( Materialpool_Material::is_part_of_werk() ) { ?>

                                    <h3>Dieser Band ist teil eines Werks. Folgende Bände umfasst das Werk:</h3>
                                    <?php Materialpool_Material::sibling_volumes_html( true ); ?><br>
                                <?php } ?>


                            </div>
                            <div class="material-detail-right">
                                <div class="facet-treffer-mediatyps">
                                    <?php $type = Materialpool_Material::get_mediatyps_root();
                                    foreach ( $type as $val ) {
                                        ?>

                                        <span title="<?php echo $val[ 'name' ]; ?>" class="fa-stack fa-2x">
                                <i  class="fa fa-circle fa-stack-2x" style="color: <?php echo $val[ 'farbe' ]; ?>"></i>
                                <i class="fa <?php echo $val[ 'icon' ]; ?> fa-stack-1x icon-weiss"></i>
                            </span>

                                    <?php } ?>
                                </div>
                                <div class="clear"></div>
                                <?php if(function_exists('the_ratings')) { the_ratings(); } ?><br>
                                <strong>Verfügbarkeit</strong><br>
                                <?php Materialpool_Material::availability(); ?>
                                <br>

                                <?php Materialpool_Material::organisation_html_cover(); ?>
                                <br>

                                <?php Materialpool_Material::autor_html_picture(); ?>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer( 'materialpool' ); ?>


<?php } else {

    get_header( 'materialpool' ); ?>
    <section  class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="material-detail-top-header">
                <h2><?php the_title(); ?></h2>
            </div>
            <div>
                <div class="material-detail-content">
                    <div class="material-detail-header facet-treffer-content">
                        <p>
                            <?php if ( Materialpool_Material::is_viewer() ) {
                                echo do_shortcode( '[viewerjs "'. Materialpool_Material::get_url() .'" ]' );
                            } else {
                                echo wp_oembed_get( "https://youtu.be/9XooVQp3et4", array( 'width' => '900'));
                            }
                            ?>

                        </p>

                        <div class="material-detail-main">
                            <div class="material-detail-middle">
                                <span class="material-detail-shortdescription"><?php Materialpool_Material::shortdescription(); ?></span><br><br><br>
                                <a href="<?php Materialpool_Material::url(); ?>"><?php Materialpool_Material::url_shorten(); ?></a><br>

                                <?php echo  Materialpool_Material::cover_facet_html(); ?>
                                <?php Materialpool_Material::description(); ?><br>
                                <?php Materialpool_Material::description_footer(); ?>
                                <?php if ( Materialpool_Material::has_verweise() ) { ?>
                                    <div class="">
                                        <h3>Siehe auch</h3>
                                        <?php  echo do_shortcode( '[facetwp template="material_verweise"]'); ?>
                                    </div>
                                <?php } ?>

                                <?php if ( Materialpool_Material::is_werk() ) { ?>
                                    <h3>Dies ist ein Werk. Folgende Bände sind zugeordnet:</h3>
                                    <?php Materialpool_Material::volumes_html( true ); ?><br>
                                <?php } ?>


                                <?php if ( Materialpool_Material::is_part_of_werk() ) { ?>

                                    <h3>Dieser Band ist teil eines Werks. Folgende Bände umfasst das Werk:</h3>
                                    <?php Materialpool_Material::sibling_volumes_html( true ); ?><br>
                                <?php } ?>

                            </div>
                            <div class="material-detail-right">
                                <div class="facet-treffer-mediatyps">
                                    <?php $type = Materialpool_Material::get_mediatyps_root();
                                    foreach ( $type as $val ) {
                                        ?>

                                        <span title="<?php echo $val[ 'name' ]; ?>" class="fa-stack fa-2x">
                                <i  class="fa fa-circle fa-stack-2x" style="color: <?php echo $val[ 'farbe' ]; ?>"></i>
                                <i class="fa <?php echo $val[ 'icon' ]; ?> fa-stack-1x icon-weiss"></i>
                            </span>

                                    <?php } ?>
                                </div>
                                <div class="clear"></div>
                                <?php if(function_exists('the_ratings')) { the_ratings(); } ?><br>
                                <strong>Verfügbarkeit</strong><br>
                                <?php Materialpool_Material::availability(); ?>
                                <br>

                                <?php Materialpool_Material::organisation_html_cover(); ?>
                                <br>

                                <?php Materialpool_Material::autor_html_picture(); ?>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer( 'materialpool' ); ?>

<?php } ?>