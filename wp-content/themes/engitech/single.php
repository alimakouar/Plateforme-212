<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Engitech
 */

get_header();

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) { ?>
	<div class="entry-content">
		<div class="container">
			<div class="row">
				<div id="primary" class="content-area <?php engitech_content_columns(); ?>">
					<main id="main" class="site-main">
						
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content','single' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
				
				<?php get_sidebar(); ?>
			</div>
		</div>	
	</div>
<?php }

get_footer();