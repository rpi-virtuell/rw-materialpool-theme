<?php
/**
 * Template Name: Startseite
 * Template Post Type: page
 *
 * @version 1.0
 *
 */

get_header();
global $post;
?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php
                $show_title = get_metadata( 'post', $post->ID, 'show_title', true );
                if ( $show_title == 1 ) {
                ?>
                <div class="startseite-block-header">
                    <p><?php
	                    $startseite_title = get_metadata( 'post', $post->ID, 'startseite_title', true );
	                    echo do_shortcode( $startseite_title );
	                    ?></p>
                    <div class="startseite-block-content">
                        <?php
                        $freitext = get_metadata( 'post', $post->ID, 'startseite_freitext', true );
                        echo do_shortcode( $freitext );
                        ?>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="clear"></div>

	            <?php
	            $show_aktuell = get_metadata( 'post', $post->ID, 'show_aktuell', true );
	            if ( $show_aktuell == 1 ) {
		            ?>
                <div class="startseite-block-header">
                    <p><?php
	                    $startseite_aktuell_titel = get_metadata( 'post', $post->ID, 'startseite_aktuell_titel', true );
	                    echo do_shortcode( $startseite_aktuell_titel );
	                    ?></p>
                    <div class="startseite-block-content material-results">
                        <div class="facetwp-template" data-name="startseite_aktuell">
                        <?php
                        $startseite_aktuell = get_metadata( 'post', $post->ID, 'startseite_aktuell', false );
                        $IDlistArr = array();
                        foreach ( $startseite_aktuell as $entry ) {
                            $IDlistArr[] = $entry['ID'];
                        }
	                    $args = array(
		                    'post__in'                      => $IDlistArr ,
		                    'post_type'              => array( 'material' ),
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
	                    wp_reset_postdata();
	                    ?>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
	            <?php
	            }
	            ?>
	            <?php
	            $show_neu = get_metadata( 'post', $post->ID, 'show_neu', true );
	            if ( $show_neu == 1 ) {
		            ?>
                <div class="startseite-block-header">
                    <P><?php
	                    $startseite_neu_titel = get_metadata( 'post', $post->ID, 'startseite_neu_titel', true );
	                    echo do_shortcode( $startseite_neu_titel );
	                    ?></P>
                    <div class="startseite-block-content  material-results">
                       <?php echo facetwp_display( 'template', 'startseite_neue_materialien' ); ?>
                    </div>
                </div>
                <div class="clear"></div>
	            <?php
	            }
	            ?>
	            <?php
	            $show_oer = get_metadata( 'post', $post->ID, 'show_oer', true );
	            if ( $show_oer == 1 ) {
		            ?>
                <div class="startseite-block-header">
                    <P><?php
	                    $startseite_oer_titel = get_metadata( 'post', $post->ID, 'startseite_oer_titel', true );
	                    echo do_shortcode( $startseite_oer_titel );
	                    ?></P>
                    <div class="startseite-block-content  material-results">
                        <?php echo facetwp_display( 'template', 'startseite_oer' ); ?>
                    </div>
                </div>
                <div class="clear"></div>
	            <?php
	            }
	            ?>
	            <?php
	            $show_special = get_metadata( 'post', $post->ID, 'show_special', true );
	            if ( $show_special == 1 ) {
		            ?>
                <div class="startseite-block-header">
                    <p><?php
	                    $startseite_special_titel = get_metadata( 'post', $post->ID, 'startseite_special_titel', true );
	                    echo do_shortcode( $startseite_special_titel );
	                    ?></p>
                    <div class="startseite-block-content material-results">
                        <?php echo facetwp_display( 'template', 'startseite_specials' ); ?>
                    </div>
                </div>
                <div class="clear"></div>
	            <?php
	            }
	            ?>
	            <?php
	            $show_about = get_metadata( 'post', $post->ID, 'show_about', true );
	            if ( $show_about == 1 ) {
		            ?>
                <div class="startseite-block-header">
                    <p><?php
	                    $startseite_about_titel = get_metadata( 'post', $post->ID, 'startseite_about_titel', true );
	                    echo do_shortcode( $startseite_about_titel );
	                    ?></p>
                    <div class="startseite-block-content">
                        <?php
                        $about = get_metadata( 'post', $post->ID, 'startseite_about', true );
                        echo do_shortcode( $about );
                        ?>
                    </div>
                </div>
                <div class="clear"></div>
	            <?php
	            }
	            ?>

            </main><!-- #main -->
        </div><!-- #primary -->
        <div id="secondary" style="display: none"></div>
    </div><!-- .wrap -->

<?php get_footer();
