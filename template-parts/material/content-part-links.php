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
        <h4>Siehe auch:</h4>
        <?php // echo do_shortcode( '[facetwp template="material_verweise"]'); ?>
    </div>
<?php endif; ?>

<?php if ( Materialpool_Material::is_werk() ) : ?>
    <div class="material-detail-children material-links">
        <h3>Dies ist ein Werk. Folgende Bände sind zugeordnet:</h3>
        <?php Materialpool_Material::volumes_html( true ); ?>
    </div>

<?php endif; ?>

<?php if ( Materialpool_Material::is_part_of_werk() ) : ?>
    <div class="material-detail-parent material-links">
        <h3>Dieser Band ist teil eines Werks. Folgende Bände umfasst das Werk:</h3>
        <?php Materialpool_Material::sibling_volumes_html( true ); ?>
    </div>
<?php endif; ?>
