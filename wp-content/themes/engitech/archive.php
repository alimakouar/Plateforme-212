<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Engitech
 */

get_header(); ?>

<div class="entry-content">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area <?php engitech_content_columns(); ?>">
				<main id="main" class="site-main">

				<?php if( get_the_archive_description() ) { ?>
				<div class="des-category">
					<?php echo '<h3>' .single_cat_title( '', false ). '</h3>'; the_archive_description(); ?>
				</div>
				<?php }if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

						engitech_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>	
</div>

<?php
get_footer();

