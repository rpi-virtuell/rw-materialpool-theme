<?php
/**
 * Zeigt Verweise und Werk(parent) / Band(child) Verknüpfungen zu einem Material
 * User: Joachim
 * Date: 21.01.2017
 * Time: 07:34
 */
?>
<?php if ( Materialpool_Material::has_verweise() ) : ?>
    <div class="material-detail-verweise material-links">
        <h4>Siehe dazu auch folgendes Material:</h4>
        <?php echo facetwp_display( 'template', 'material_verweise' ); ?>
    </div>
<?php endif; ?>

<?php if ( Materialpool_Material::is_part_of_werk() ) : ?>
    <div class="material-detail-parent material-links">
        <h4>Dieses Material ist aus der Sammlung:</h4>
        <strong><?php Materialpool_Material::werk_html( true ); ?></strong>
        <ul><?php Materialpool_Material::sibling_volumes_html(true); ?></ul>
    </div>
<?php endif; ?>

<?php if ( Materialpool_Material::is_werk() ) : ?>
    <div class="material-detail-children material-links">
        <h4>Zu "<?php the_title( '<b>', '</b>' );?>" gehören weitere Materialien:</h4>
        <?php Materialpool_Material::volumes_html( true ); ?>
    </div>

<?php endif; ?>

