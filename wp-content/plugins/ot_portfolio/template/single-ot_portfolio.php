<?php
 /**
 * The template for displaying all single ot portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Consultax
 */
 
 get_header(); 
?>

	<?php while (have_posts()) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

<?php get_footer(); ?>
