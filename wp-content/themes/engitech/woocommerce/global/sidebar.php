<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( engitech_get_shop_layout() === 'full-content' ) {
	return;
}

$sidebar = 'shop-sidebar';

if ( ! is_active_sidebar( $sidebar ) ) {
	return;
}
?>

<aside id="primary-sidebar" class="shop-sidebar widget-area col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->

