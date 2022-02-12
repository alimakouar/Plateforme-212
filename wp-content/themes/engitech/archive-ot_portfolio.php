<?php
/**
 * The template for displaying archive portfolio pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Engitech
 */

get_header(); ?>

<div class="entry-content">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-md-12">
				<main id="main" class="site-main">
					
					<ul class="project_filters">
					    <li><a href="#" data-filter="*" class="selected"><?php esc_html_e('All', 'engitech'); ?></a></li>
						<?php 
							$terms = get_terms("portfolio_cat"); // get all categories, but you can use any taxonomy
							$count = count($terms); //How many are they?
							if ( $count > 0 ){  //If there are more than 0 terms
							 	foreach ( $terms as $term ) {  //for each term:
									echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
									//create a list item with the current term slug for sorting, and name for label
							 	}
						 	} 
						?>
					</ul>	

					<?php if ( have_posts() ) : ?>
						<div id="projects_grid" class="projects-grid <?php engitech_portfolio_option_class(); ?>">
							<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile; 
							?>
						</div>
						<div class="pagination-wrapper">
							<?php engitech_posts_navigation(); ?>
						</div>
					<?php 	
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>									
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</div>

<?php
get_footer();

