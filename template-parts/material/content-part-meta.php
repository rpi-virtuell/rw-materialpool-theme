<?php
/**
 * Zeigt auf der Material-Detailseite die rechte Spalte
 * User: Joachim
 * Date: 20.01.2017
 * Time: 22:44
 */
?>
<?php if(Materialpool_Material::is_special()):?>
    <div class="materialpool-special-logo">
        rpi-virtuell special<br>

    </div>
    <div class="clear"></div>
<?php endif;?>

<div class="facet-treffer-mediatyps material-meta">
    <?php $type = Materialpool_Material::get_mediatyps_root();
    foreach ( $type as $val ) {
        ?>

        <span title="<?php echo $val[ 'name' ]; ?>" class="fa-stack fa-2x">
            <i  class="fa fa-circle fa-stack-2x" style="color: <?php echo $val[ 'farbe' ]; ?>"></i>
            <i class="fa <?php echo $val[ 'icon' ]; ?> fa-stack-1x icon-weiss"></i>
        </span>

    <?php } ?>
</div>
<div class="material-detail-meta-rating material-meta">
    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
</div>
<div class="material-meta" style="clear: both;height:10px;"></div>

<div class="material-detail-meta-author material-meta">
    <?php if(Materialpool_Material::has_organisation() || Materialpool_Material::has_autor() ): ?>
        <h4>Herkunft</h4>
        <div class="material-meta-content-entry">

        <?php if(Materialpool_Material::has_organisation()): ?>
            <?php Materialpool_Material::organisation_html_cover(); ?>
        <?php endif;?>
        <?php if( Materialpool_Material::has_autor() ):?>
            <?php Materialpool_Material::autor_html_picture(); ?>
        <?php endif;?>
        </div>
    <?php endif;?>

</div>

<div class="material-detail-bildungsstufe material-meta">
    <?php if (Materialpool_Material::bildungsstufen()):?>
        <h4>Bildungskontext</h4>
        <div class="material-meta-content-entry">
            <div>
                <?php echo Materialpool_Material::bildungsstufen();?>
                <?php if ( Materialpool_Material::inklusion_facet_html() != '' ) :?>
                , inklusiver Unterricht.
                <?php endif;?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php if(!Materialpool_Material::is_special()):?>
    <div class="material-detail-meta-access material-meta">
        <h4>Verfügbarkeit</h4>
        <div class="material-meta-content-entry">
            <?php Materialpool_Material::availability(); ?>
        </div>
    </div>
<?php endif;?>