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

if ( ! Materialpool_Material::is_special() &&  ! Materialpool_Material::is_viewer() ) {


get_header( 'materialpool' ); ?>
<section  class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="material-detail-left">
            <?php echo  Materialpool_Material::cover_facet_html(); ?>
            <br>
            <?php echo Materialpool_Material::cta_link(); ?><br>
            <?php echo Materialpool_Material::cta_url2clipboard(); ?>

        </div>
        <div class="material-detail-content">
            <div class="facet-treffer-mediatyps">
                <ul>
                    <?php $type = Materialpool_Material::get_mediatyps_root();
                    foreach ( $type as $val ) {
                        ?>
                        <li>
                    <span title="<?php echo $val[ 'name' ]; ?>" class="fa-stack fa-2x">
                        <i  class="fa fa-circle fa-stack-2x" style="color: <?php echo $val[ 'farbe' ]; ?>"></i>
                        <i class="fa <?php echo $val[ 'icon' ]; ?> fa-stack-1x icon-weiss"></i>
                    </span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="material-detail-header facet-treffer-content">
                <h2><?php the_title(); ?></h2>
                <strong>URL</strong> <a href="<?php Materialpool_Material::url(); ?>"><?php Materialpool_Material::url(); ?></a><br>
                <?php Materialpool_Material::shortdescription(); ?><br>

                <div class="material-detail-main">
                    <div class="material-detail-middle">
                        <?php Materialpool_Material::description(); ?>
                        <br>
                        <?php Materialpool_Material::description_footer(); ?>
                    </div>
                    <div class="material-detail-right">
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
</section>
<?php get_footer( 'materialpool' ); ?>


<?php } else {

    get_header( 'materialpool' ); ?>
    <section  class="content-area">
        <div id="content" class="site-content" role="main">
            <div class="material-detail-left">
                <?php //echo  Materialpool_Material::cover_facet_html(); ?>
            </div>
            <div class="material-detail-content">
                <div class="facet-treffer-mediatyps">
                    <ul>
                        <?php $type = Materialpool_Material::get_mediatyps_root();
                        foreach ( $type as $val ) {
                            ?>
                            <li>
                    <span title="<?php echo $val[ 'name' ]; ?>" class="fa-stack fa-2x">
                        <i  class="fa fa-circle fa-stack-2x" style="color: <?php echo $val[ 'farbe' ]; ?>"></i>
                        <i class="fa <?php echo $val[ 'icon' ]; ?> fa-stack-1x icon-weiss"></i>
                    </span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="material-detail-header facet-treffer-content">
                    <h2><?php the_title(); ?></h2>
                    <strong>URL</strong> <a href="<?php Materialpool_Material::url(); ?>"><?php Materialpool_Material::url(); ?></a><br>
                    <?php Materialpool_Material::shortdescription(); ?><br><br><br>
                    <p>
                        HIER DANN GGF PDF/DOC Viewer oder Video?
                    </p>
                    <div class="material-detail-main">
                        <div class="material-detail-middle">
                            <?php echo  Materialpool_Material::cover_facet_html(); ?>
                            <?php Materialpool_Material::description(); ?><br>
                            <?php Materialpool_Material::description_footer(); ?>
                        </div>
                        <div class="material-detail-right">
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
    </section>
    <?php get_footer( 'materialpool' ); ?>

<?php } ?>