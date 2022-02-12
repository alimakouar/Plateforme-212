<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package ENGITECH
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function engitech_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'engitech_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function engitech_woocommerce_scripts() {
	wp_enqueue_style( 'engitech-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css' );
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'engitech-woocommerce-style' );
	}
}
add_action( 'wp_enqueue_scripts', 'engitech_woocommerce_scripts' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function engitech_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'engitech_woocommerce_active_body_class' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function engitech_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'engitech_woocommerce_thumbnail_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function engitech_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'engitech_woocommerce_related_products_args' );

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'engitech_wc_breadcrumbs' );
function engitech_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	add_action( 'engitech_woocommerce_breadcrumb', 'woocommerce_breadcrumb' );
}

/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'engitech_woocommerce_breadcrumbs' );
function engitech_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ul id="breadcrumbs" class="breadcrumbs" itemprop="breadcrumb">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'engitech' ),
        );
}

/**
 * Remove the product link 
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );
add_action('woocommerce_shop_loop_item_title', 'engitech_change_products_title', 10 );
function engitech_change_products_title() {
    echo '<h2 class="woocommerce-loop-product__title"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h2>';
}

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'engitech_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function engitech_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area <?php engitech_shop_content_columns(); ?>">
			<main id="main" class="site-main" role="main">
			<?php
	}
}
add_action( 'woocommerce_before_main_content', 'engitech_woocommerce_wrapper_before' );

if ( ! function_exists( 'engitech_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function engitech_woocommerce_wrapper_after() {
			?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'engitech_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 */

if ( ! function_exists( 'engitech_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 * @link https://docs.woocommerce.com/document/show-cart-contents-total/
	 */
	function engitech_woocommerce_cart_link_fragment( $fragments ) {
		$item_count_text = sprintf( WC()->cart->get_cart_contents_count() );

		$fragments['span.cart-count'] = '<span class="cart-count count">'.$item_count_text.'</span>';

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'engitech_woocommerce_cart_link_fragment' );


if ( ! function_exists( 'engitech_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function engitech_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
			<ul id="site-header-cart" class="site-header-cart">
				<li class="<?php echo esc_attr( $class ); ?>">
					<?php engitech_woocommerce_cart_link(); ?>
				</li>
				<li>
					<?php
						$instance = array(
							'title' => '',
						);
						the_widget( 'WC_Widget_Cart', $instance );
					?>
				</li>
			</ul>
		<?php
	}
}

//Get layout shop page.
if ( ! function_exists( 'engitech_get_shop_layout' ) ) :
	function engitech_get_shop_layout() {
		// Get layout.
		if( is_product() ){
			$page_layout = engitech_get_option( 'single_shop_layout' );
		}else{
			$page_layout = engitech_get_option( 'shop_layout' );
		}

		return $page_layout;
	}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'engitech_shop_content_columns' ) ) :
	function engitech_shop_content_columns() {

		$shop_content_width = array();

		// Check if layout is one column.
		if ( 'content-sidebar' === engitech_get_shop_layout() && is_active_sidebar( 'shop-sidebar' ) ) {
			$shop_content_width[] = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
		}elseif ('sidebar-content' === engitech_get_shop_layout() && is_active_sidebar( 'shop-sidebar' ) ) {
			$shop_content_width[] = 'col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right';
		}else{
			$shop_content_width[] = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
		}

		// return the $classes array
    	echo implode( ' ', $shop_content_width );
	}
endif;

/**
 * Register widget area for shop page.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function engitech_woocommerce_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Shop Sidebar', 'engitech' ),
        'id'            => 'shop-sidebar',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'engitech_woocommerce_widgets_init' );


/* Customizer Shop */
function engitech_shop_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'engitech',
	);

	$panels = array();

	$sections = array(		
        'single_product'           => array(
			'title'       => esc_html__( 'Single Product', 'engitech' ),
			'description' => '',
			'priority'    => 16,
			'capability'  => 'edit_theme_options',
			'panel'       => 'woocommerce',
		),
	);

	$fields = array(
		// Shop Page
		'shop_layout'           => array(
			'type'        => 'radio-image',
			'label'       => esc_html__( 'Shop Layout', 'engitech' ),
			'section'     => 'woocommerce_product_catalog',
			'default'     => 'content-sidebar',
			'priority'    => 7,
			'description' => esc_html__( 'Select default sidebar for the shop page.', 'engitech' ),
			'choices'     => array(
				'content-sidebar' 	=> get_template_directory_uri() . '/inc/backend/images/right.png',
				'sidebar-content' 	=> get_template_directory_uri() . '/inc/backend/images/left.png',
				'full-content' 		=> get_template_directory_uri() . '/inc/backend/images/full.png',
			)
		),		

        // Single Product Page
        'single_shop_layout'           => array(
            'type'        => 'radio-image',
            'label'       => esc_html__( 'Single Product Layout', 'engitech' ),
            'section'     => 'single_product',
            'default'     => 'content-sidebar',
            'priority'    => 1,
            'choices'     => array(
				'content-sidebar' 	=> get_template_directory_uri() . '/inc/backend/images/right.png',
				'sidebar-content' 	=> get_template_directory_uri() . '/inc/backend/images/left.png',
				'full-content' 		=> get_template_directory_uri() . '/inc/backend/images/full.png',
			)
        ),
        'page_title_product'    => array(
            'type'     => 'text',
            'label'    => esc_html__( 'Title Page Header', 'engitech' ),
            'section'  => 'single_product',
            'default'  => 'Product Details',
            'priority' => 1,
        ),
        'related_product_switch'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Related Product On/Off?', 'engitech' ),
            'section'     => 'single_product',
            'default'     => 0,
            'priority'    => 2,
        ), 
	);

	$settings['panels']   = apply_filters( 'engitech_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'engitech_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'engitech_customize_fields', $fields );

	return $settings;
}

$engitech_customize = new Engitech_Customize( engitech_shop_customize_settings() );

//Custom Style Frontend
if(!function_exists('engitech_woo_color_scheme')){
    function engitech_woo_color_scheme(){
        $color_scheme = array();

        /* WooCommerce Customize colors */
        if( engitech_get_option('main_color') != '#43baff' || engitech_get_option('second_color') != '#7141b1' ){
            $color_scheme[] = 
            '	
            /**Main**/
                .woocommerce ul.products li.product .price .woocommerce-Price-amount, .woocommerce-page ul.products li.product .price .woocommerce-Price-amount,
                .woocommerce .woocommerce-Price-amount,
				.woocommerce div.product p.price,
				.woocommerce div.product span.price{
				  color: '.engitech_get_option('main_color').';
				}

				.woocommerce ul.products li.product .added_to_cart, .woocommerce-page ul.products li.product .added_to_cart,
				.woocommerce-mini-cart__buttons a.button.wc-forward,
				.woocommerce .widget_price_filter .price_slider_amount button.button,
				.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,.woocommerce input.button:hover, .woocommerce button.button.alt.disabled:hover,
				.woocommerce button.button,
				.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
				.woocommerce div.product .woocommerce-tabs ul.tabs li.active a{
					background-color: '.engitech_get_option('main_color').';
				}

			/**Second**/

                .woocommerce table.shop_table td.product-name a:hover,
				.woocommerce-message:before,
				.woocommerce-info:before,
				.woocommerce ul.product_list_widget li a:not(.remove):hover,
				.woocommerce .woocommerce-widget-layered-nav-list li a:hover{
					color: '.engitech_get_option('second_color').';
				}
				.woocommerce-mini-cart__buttons a.button.checkout{
					border-color: '.engitech_get_option('second_color').';
				}
				.woocommerce-message,
				.woocommerce-info{
				  	border-top-color: '.engitech_get_option('second_color').';
				}
				.woocommerce ul.products li.product .added_to_cart:hover, .woocommerce-page ul.products li.product .added_to_cart:hover,
				.woocommerce-mini-cart__buttons a.button.wc-forward:hover,
				.woocommerce-mini-cart__buttons a.button.checkout:hover,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
				.woocommerce #respond input#submit.alt, .woocommerce a.button.alt,.woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button,.woocommerce input.button, .woocommerce button.button.alt.disabled,
				.woocommerce button.button:hover {
					background-color: '.engitech_get_option('second_color').';
				}

			';
        }

        if(! empty($color_scheme)){
			echo '<style type="text/css">'. implode( ' ', $color_scheme ) .'</style>';
		}
    }
}
add_action('wp_head', 'engitech_woo_color_scheme');