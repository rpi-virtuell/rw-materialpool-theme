<?php
/**
 */

get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header class="entry-header">
						<?php     single_term_title( '<h1 class="page-title">', '</h1>' ); ?>
                    </header><!-- .entry-header -->

						<?php echo term_description( ); ?>
                    <div class="entry-content material-detail">

                        <div class="material-detail-content-viewer material-column">

                            <header class="thema-header">
                                <div class="thema-facets">
                                    <ul id="thema-toc" class="thema-toc"></ul>
                                </div>
                                <div id="thema-description" class="thema-description"><?php the_content(); ?></div>
                            </header>

                            <header class="thema-header">

                                <div class="thema-description themenseite-gruppen">
									<?php
									$result = facetwp_display( 'template', 'werkzeug' );
									echo $result;
									?>
                                </div>
                            </header>

                        </div>


                        </article><!-- #post-## -->

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
