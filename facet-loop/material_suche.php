<?php
    /**Abfragekriterien**/
    return array(
        "post_type" => array(
            "material",
            "themenseite"
        ),
        "post_status" => "publish",
        "orderby" => "date",
        "order" => "DESC",
        "posts_per_page" => 10
    );
?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php

    if ( false === ( $transient = get_transient( 'facet_serach2_entry-'.$post->ID ) ) ) {
        ob_start();

        ?>
        <?php if (get_post_type() == 'themenseite'): ?>

            <div class="facet-treffer themenseite">
                <h2><a href="<?php the_permalink(); ?>">Themenseite: <?php the_title(); ?></a></h2>
                <div class="themenseite-treffer">
                    <div class="themenseite-thumb">
                        <img src="<?php echo catch_thema_image() ?>">
                    </div>
                    <div class="thema-description">
                        <p class="thema-excerpt">
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>

        <?php else: ?>

            <div class="facet-treffer<?php echo (Materialpool_Material::is_alpika()) ? ' alpika' : ''; ?><?php echo (Materialpool_Material::is_special()) ? ' special' : ''; ?>">
                <div class="facet-treffer-mediatyps">
                    <ul>
                        <?php $type = Materialpool_Material::get_mediatyps_root();
                        foreach ($type as $val) {
                            ?>
                            <li>
							<span title="<?php echo $val['name']; ?>" class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x" style="color: <?php echo $val['farbe']; ?>"></i>
								<i class="fa <?php echo $val['icon']; ?> fa-stack-1x icon-weiss"></i>
							</span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="facet-treffer-content">
                    <h2>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php echo Materialpool_Material::rating_facet_html(); ?>
                    </h2>
                    <p class="search-head">
                        <?php if (Materialpool_Material::get_organisation()[0]) {
                            echo Materialpool_Material::organisation_facet_html() . '<br>';
                        }
                        if (Materialpool_Material::get_autor()) {
                            echo Materialpool_Material::autor_facet_html();
                        }
                        ?>
                    </p>
                    <p class="search-description">
                        <?php echo Materialpool_Material::cover_facet_html(); ?>
                        <strong><?php Materialpool_Material::shortdescription(); ?></strong><br>
                        <?php echo wp_trim_words(wp_strip_all_tags(Materialpool_Material::get_description())); ?>
                    </p>
                    <div class="facet-tags">
                        <?php echo Materialpool_Material::bildungsstufe_facet_html(); ?>
                        <?php echo Materialpool_Material::inklusion_facet_html(); ?>

                    </div>
                    <div style="clear: both;"></div>
                    <p class="schlagworte">
                        <strong>Schlagworte: </strong> <?php echo Materialpool_Material::get_schlagworte_html(); ?>
                </div>
                <div class="clear"></div>

            </div>
        <?php endif;
        $buffer = ob_get_contents();
        ob_end_clean();
        echo $buffer;
        set_transient( 'facet_serach2_entry-'.$post->ID, $buffer );
    } else {
        echo $transient;
    }
    ?>
    <?php echo Materialpool_Material::cb_themenseite(); ?>


<?php endwhile; ?>