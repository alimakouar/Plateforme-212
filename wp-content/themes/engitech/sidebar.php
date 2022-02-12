<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Engitech
 */

if ( engitech_get_layout() === 'full-content' ) {
	return;
}

$sidebar = 'primary';

if ( ! is_active_sidebar( $sidebar ) ) {
	return;
}
?>

<aside id="primary-sidebar" class="widget-area primary-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->
