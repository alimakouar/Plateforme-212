<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Engitech
 */

/** 
 * Add body class by filter 
 * 
 */
add_filter( 'body_class', 'engitech_body_class_names', 999 );
function engitech_body_class_names( $classes ) {
	
	$theme = wp_get_theme();
	if( is_child_theme() ) { $theme = wp_get_theme()->parent(); }

  	$classes[] = 'engitech-theme-ver-'.$theme->version;

  	$classes[] = 'wordpress-version-'.get_bloginfo( 'version' );

  	return $classes;
}

/**
 *  Add specific CSS class to header
 */
function engitech_header_class() {

	$header_classes = array();

	if( engitech_get_option('header_select') == '' ){
		if ( engitech_get_option('header_desktop_sticky') != false ){ 
			$header_classes[] = 'sticky-header'; 
		}

		if( engitech_get_option('header_layout') == "header2" ){
			$header_classes[] = 'header-style-2';
		}elseif( engitech_get_option('header_layout') == "header3" ) {
			$header_classes[] = 'header-style-3';
		}else{
			$header_classes[] = 'header-style-1';
		}

		if( is_front_page() ){
			if ( engitech_get_option('header_homepage') != false ){
				$header_classes[] = 'header-overlay';
			} 
		}

		if ( engitech_get_option( 'header_width' ) && engitech_get_option( 'header_layout' ) == 'header2' ){
			$header_classes[] = 'header-fullwidth';
		}

		if ( engitech_get_option('header_mobile_sticky') ){ 
			$header_classes[] = 'mobile-header-sticky'; 
		}
		echo implode( ' ', $header_classes );
	}else{
		$header_classes = '';
		if ( engitech_get_option('header_fixed') != false ){
			$header_classes = 'header-overlay';
		}else{
			$header_classes = 'header-static';
		}
		if ( function_exists('rwmb_meta') ) {
			if( rwmb_meta('is_trans') == 'yes'){
				$header_classes = 'header-overlay';
			}if( rwmb_meta('is_trans') == 'no'){
				$header_classes = 'header-static';
			}
		}
		echo $header_classes;
	}
    
}

function engitech_header_width_class() {

	$header_width_classes = array();

	if ( ( engitech_get_option( 'header_width' ) && engitech_get_option( 'header_layout' ) == 'header2' ) ) :
		$header_width_classes[] = 'container-fluid';
	else :
		$header_width_classes[] = 'container';
	endif; 

    // return the $classes array
    echo implode( ' ', $header_width_classes );
}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function engitech_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'engitech_pingback_header' );

//Get layout post & page.
if ( ! function_exists( 'engitech_get_layout' ) ) :
	function engitech_get_layout() {
		// Get layout.
		if( is_page() && !is_home() && function_exists( 'rwmb_meta' ) ) {
			$page_layout = rwmb_meta('page_layout');
		}elseif( is_single() ){
			$page_layout = engitech_get_option( 'single_post_layout' );
		}else{
			$page_layout = engitech_get_option( 'blog_layout' );
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
if ( ! function_exists( 'engitech_content_columns' ) ) :
	function engitech_content_columns() {

		$blog_content_width = array();

		// Check if layout is one column.
		if ( 'content-sidebar' === engitech_get_layout() && is_active_sidebar( 'primary' ) ) {
			$blog_content_width[] = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
		}elseif ('sidebar-content' === engitech_get_layout() && is_active_sidebar( 'primary' ) ) {
			$blog_content_width[] = 'col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right';
		}else{
			$blog_content_width[] = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
		}

		// return the $classes array
    	echo implode( ' ', $blog_content_width );
	}
endif;

/* Portfolio Column */
if ( ! function_exists( 'engitech_portfolio_option_class' ) ) :
	function engitech_portfolio_option_class() {

		$portfolio_option_class = array();

		if( engitech_get_option('portfolio_column') == "2cl" ){
			$portfolio_option_class[] = 'pf_2_cols';
		}elseif( engitech_get_option('portfolio_column') == "4cl" ) {
			$portfolio_option_class[] = 'pf_4_cols';
		}elseif( engitech_get_option('portfolio_column') == "5cl" ) {
			$portfolio_option_class[] = 'pf_5_cols';
		}else{
			$portfolio_option_class[] = '';
		}

		if( engitech_get_option('portfolio_style') == "style2" ) {
			$portfolio_option_class[] = 'projects-style-2 ';
		}else{
			$portfolio_option_class[] = 'projects-style-1 ';
		}

	    // return the $classes array
	    echo implode( ' ', $portfolio_option_class );
	}
endif;

/**
 * Change Posts Per Page for Portfolio Archive.
 * 
 * @param object $query data
 *
 */
function engitech_change_portfolio_posts_per_page( $query ) {
	$portfolio_ppp = (!empty( engitech_get_option('portfolio_posts_per_page') ) ? engitech_get_option('portfolio_posts_per_page') : '6');

	if ( !is_singular() && !is_admin() ) {		
	    if ( $query->is_post_type_archive( 'ot_portfolio' ) || $query->is_tax('portfolio_cat') && ! is_admin() && $query->is_main_query() ) {
	        $query->set( 'posts_per_page', $portfolio_ppp );
	    }
	}
    return $query;
}
add_filter( 'pre_get_posts', 'engitech_change_portfolio_posts_per_page' );

/**
 * Back-To-Top on Footer
 */
if( !function_exists('engitech_custom_back_to_top') ) {
    function engitech_custom_back_to_top() {     
	    if( engitech_get_option('backtotop') != false ){
	    	echo '<a id="back-to-top" href="#" class="show"><i class="flaticon-up-arrow"></i></a>';
	    }
    }
}
add_action('wp_footer', 'engitech_custom_back_to_top');

/**
 * Google Atlantic
 */
function engitech_hook_javascript() {
   
    echo engitech_get_option('js_code');     
    
}
add_action('wp_head', 'engitech_hook_javascript');

// [oceanthemes_date time_custom="F j, Y"]
function oceanthemes_date_func( $atts ) {
    $date_format = shortcode_atts( array(
        'time_custom' => 'Y',        
    ), $atts );

    $dt = new DateTime("now");
    $gmt_timestamp = $dt->format("{$date_format['time_custom']}");

    return $gmt_timestamp;
}
add_shortcode( 'oceanthemes_date', 'oceanthemes_date_func' );