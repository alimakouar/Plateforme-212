<?php
/**
 * Hooks for importer
 *
 * @package Engitech
 */


/**
 * Importer the demo content
 *
 * @since  1.0
 *
 */
function engitech_importer() {
	return array(
		array(
			'name'       => 'Home 1 - Main Home',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home1.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home1-8/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 1',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 2 - IT Agency',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home2.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home1-8/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 2',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 3 - Software Company',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home3.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home1-8/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 3',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 4 - Web Development',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home4.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home1-8/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 4',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 5 - Startup Home',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home5.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home1-8/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 5',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 6 - Data Science',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home6.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home1-8/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 6',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 7 - SaaS App Landing',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home7.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home1-8/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 7',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 8 - Help Desk',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home8.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home1-8/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 8',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 9 - App Development',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home9.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home9/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 9',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 10 - Cyber Security',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home10.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home10/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 10',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 11 - Hosting',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home11.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home11/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 11',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 12 - Hardware Services',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home12.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home12/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 12',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 13 - ICO Landing Page (White)',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home13.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home13/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 13',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
		array(
			'name'       => 'Home 14 - ICO Landing Page (Purple)',
			'preview'    => 'https://engitech.s3.amazonaws.com/demo-content/home14.jpg',
			'content'    => 'https://engitech.s3.amazonaws.com/demo-content/home14/demo-content.xml',
			'customizer' => 'https://engitech.s3.amazonaws.com/demo-content/customizer.dat',
			'widgets'    => 'https://engitech.s3.amazonaws.com/demo-content/widgets.wie',
			'sliders'    => 'https://engitech.s3.amazonaws.com/demo-content/sliders.zip',
			'pages'      => array(
				'front_page' => 'Home 14',
				'blog'       => 'Blog',
				'shop'       => 'Shop',
				'cart'       => 'Cart',
				'checkout'   => 'Checkout',
				'my_account' => 'My Account',
			),
			'menus'      => array(
				'primary'   => 'main-menu',
			)
		),
	);
}

add_filter( 'soo_demo_packages', 'engitech_importer', 30 );