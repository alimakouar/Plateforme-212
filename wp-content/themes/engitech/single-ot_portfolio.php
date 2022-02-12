<?php
/**
 * The template for displaying all portfolios
 *
 * This is the template that displays all portfolio by default.
 * Please note that this is the WordPress construct of portfolios
 * and that other 'portfolios' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Engitech
 */

get_header();
?>

<?php
    while ( have_posts() ) : the_post();
        the_content();                            
    endwhile; // End of the loop.
?>

<?php if( engitech_get_option('pf_nav') || engitech_get_option('pf_related_switch') ) { ?>
<div class="entry-content project-bottom">
    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                
                <?php if( engitech_get_option('pf_nav') ) { ?>
                <div class="single-portfolio-navigation">
                    <?php engitech_single_post_nav(); ?>
                </div>
                <?php } ?>

                <?php if( engitech_get_option('pf_related_switch') ) { ?>
                <div class="portfolio-related-posts-wrap">
                    <div class="portfolio-related-title-wrap">
                        <h2 class="portfolio-related-title"><?php esc_html_e('Related Projects', 'engitech'); ?></h2>
                    </div>
                    <div class="portfolio-related-posts projects-grid <?php engitech_portfolio_option_class(); ?>">                    
                        <?php 
                        // get the custom post type's taxonomy terms                    
                        $custom_taxterms = wp_get_object_terms( $post->ID, 'portfolio_cat', array('fields' => 'ids') );
                        // arguments
                        $args = array(
                            'post_type' => 'ot_portfolio',
                            'post_status' => 'publish',
                            'posts_per_page' => 3, // you may edit this number
                            'ignore_sticky_posts' => 1,
                            'orderby' => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'portfolio_cat',
                                    'field' => 'id',
                                    'terms' => $custom_taxterms
                                )
                            ),
                            'post__not_in' => array ($post->ID),
                        );
                        $second_query = new WP_Query( $args );

                        //Loop through posts and display...
                        if($second_query->have_posts()) : while ($second_query->have_posts() ) : $second_query->the_post(); 
                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_type() );
                        endwhile; wp_reset_query(); endif; 
                        ?>
                    </div>
                </div>
                <?php } ?>
            </main><!-- #main -->
        </div><!-- #primary -->            
    </div>
</div>
<?php } ?>

<?php
get_footer();