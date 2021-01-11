<?php
/**
 * Zeigt Titel, Beschreibung und Inhalte eines Materials im Contentbereich
 * User: Joachim
 * Date: 21.01.2017
 * Time: 07:34
 */
?>
<?php if ( Materialpool_Material::has_verweise() ) : ?>
    <div class="material-detail-verweise material-links ">
        <h4>Siehe dazu auch folgendes Material:</h4>

        <div class="startseite-block-content material-results">
            <div class="facetwp-template">
			    <?php
			    $ar = Materialpool_Material::get_verweise_ids();

			    global $post;
			    if ( $ar !== false && sizeof( $ar) != 0 ) {
                    $args = array(
                        'post__in'                      => $ar,
                        'post_type'              => array( 'material' ),
                        'posts_per_page'        => 100,

                    );
                    $my_query = new WP_Query( $args );
                    while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                        <div class="facet-treffer<?php echo (Materialpool_Material::is_alpika())?' alpika':'';?><?php echo (Materialpool_Material::is_special())?' special':'';?>">
                            <div class="facet-treffer-content">
                                <?php if (Materialpool_Material::cover_facet_html()  && !in_array(strrchr(Materialpool_Material::get_url(),'.'),array('.docx','.doc','.odt')) ):?>
                                    <div class="material-cover">
                                        <?php echo  Materialpool_Material::cover_facet_html(); ?>
                                    </div>
                                <?php endif; ?>
                                <p class="material-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                <p class="search-description">
                                    <?php Materialpool_Material::shortdescription(); ?><br>
                                    <?php //echo wp_trim_words(  wp_strip_all_tags ( Materialpool_Material::get_description() )) ; ?>
                                </p>
                                <p class="search-head">
                                    <?php if(Materialpool_Material::get_organisation()[0]){
                                        echo Materialpool_Material::organisation_facet_html().'<br>';
                                    }
                                    if(Materialpool_Material::get_autor()) {
                                        echo Materialpool_Material::autor_facet_html();
                                    }
                                    ?>
                                </p>
                            </div><div class="clear"></div>

                        </div>
                    <?php endwhile;
			    }
			    wp_reset_postdata();
			    unset( $my_query);

			    ?>


            </div>
        </div>
    </div>
<?php endif; ?>


