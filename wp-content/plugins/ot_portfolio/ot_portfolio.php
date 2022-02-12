<?php
/*
	Plugin Name: OT Portfolios
	Plugin URI: http://oceanthemes.net/
	Description: Declares a plugin that will create a custom post type displaying portfolios.
	Version: 1.0
	Author: OceanThemes
	Author URI: http://oceanthemes.net/
	Text Domain: ot-portfolio
	Domain Path: /lang
	License: GPLv2 or later
*/

/* UPDATE 
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function 
*/
function ot_portfolio_update() {
	load_plugin_textdomain('ot-portfolio', FALSE, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('plugins_loaded', 'ot_portfolio_update');

add_action( 'init', 'register_ocean_portfolio' );
function register_ocean_portfolio() {
    /* In Permalink Settings page */	
	$slug = get_option( 'wpse30021_portfolio_base' );
    if( ! $slug ) $slug = __( 'portfolio', 'ot-portfolio' );
	
    $labels = array( 
        'name' => __( 'Portfolios', 'ot-portfolio' ),
        'singular_name' => $slug, //In Permalink Settings page
		'menu_name' => __( 'Portfolios', 'ot-portfolio' ),
        'add_new' => __( 'Add New', 'ot-portfolio' ),
        'add_new_item' => __( 'Add New Portfolio', 'ot-portfolio' ),
		'new_item' => __( 'New Portfolio', 'ot-portfolio' ),
        'edit_item' => __( 'Edit Portfolio', 'ot-portfolio' ),
		'view_item' => __( 'View Portfolio', 'ot-portfolio' ),
		'all_items' => __('All Portfolios','ot-portfolio'),        
        'search_items' => __( 'Search Portfolios', 'ot-portfolio' ),
		'parent_item_colon' => __( 'Parent Portfolios:', 'ot-portfolio' ),
        'not_found' => __( 'No portfolios found..', 'ot-portfolio' ),		
        'not_found_in_trash' => __( 'No portfolios found in Trash.', 'ot-portfolio' ),                
    );	

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __( 'List Portfolio', 'ot-portfolio' ),
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats', 'excerpt' ),
        'taxonomies' => array('categories','tags' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-portfolio',
        'show_in_nav_menus' => true,
		'show_in_admin_bar'   => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => $slug ), //In Permalink Settings page
        'capability_type' => 'post'
    );
    register_post_type( 'ot_portfolio', $args );
}

add_action( 'init', 'create_categories_hierarchical_taxonomy', 0 );
//create a custom taxonomy name it Skillss for your posts
function create_categories_hierarchical_taxonomy() {

	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI
	$labels = array(
		'name' => __( 'Categories', 'ot-portfolio' ),
		'singular_name' => __( 'Categories', 'ot-portfolio' ),
		'search_items' =>  __( 'Search Categories','ot-portfolio' ),
		'all_items' => __( 'All Categories','ot-portfolio' ),
		'parent_item' => __( 'Parent Categories','ot-portfolio' ),
		'parent_item_colon' => __( 'Parent Categories:','ot-portfolio' ),
		'edit_item' => __( 'Edit Categories','ot-portfolio' ), 
		'update_item' => __( 'Update Categories','ot-portfolio' ),
		'add_new_item' => __( 'Add New Categories','ot-portfolio' ),
		'new_item_name' => __( 'New Categories Name','ot-portfolio' ),
		'menu_name' => __( 'Categories','ot-portfolio' ),
	);     
	// Now register the taxonomy
	register_taxonomy('portfolio_cat',array('ot_portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => __( 'portfolio-category', 'ot-portfolio' ) ), //In Permalink Settings page
	));

}

add_action( 'init', 'create_tags_hierarchical_taxonomy', 0 );
//create a custom taxonomy name it Skillss for your posts
function create_tags_hierarchical_taxonomy() {
	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI

	$labels = array(
		'name' => __( 'Tags', 'ot-portfolio' ),
		'singular_name' => __( 'Tags', 'ot-portfolio' ),
		'search_items' =>  __( 'Search Tags','ot-portfolio' ),
		'all_items' => __( 'All Tags','ot-portfolio' ),
		'parent_item' => __( 'Parent Tags','ot-portfolio' ),
		'parent_item_colon' => __( 'Parent Tags:','ot-portfolio' ),
		'edit_item' => __( 'Edit Tags','ot-portfolio' ), 
		'update_item' => __( 'Update Tags','ot-portfolio' ),
		'add_new_item' => __( 'Add New Tags','ot-portfolio' ),
		'new_item_name' => __( 'New Tags Name','ot-portfolio' ),
		'menu_name' => __( 'Tags','ot-portfolio' ),
	);     
	// Now register the taxonomy
	register_taxonomy('portfolio_tag',array('ot_portfolio'), array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => __( 'portfolio-tag', 'ot-portfolio' ) ), //In Permalink Settings page
	));
}

/**
 * Load template file for portfolio single
 *
 * @since  1.0.0
 *
 * @param  string $template
 *
 * @return string
 */
add_filter( 'template_include', 'ot_portfolio_include_template_function', 1 ); 
function ot_portfolio_include_template_function( $template_path ) {
    if ( get_post_type() == 'ot_portfolio' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-ot_portfolio.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path(__FILE__) . 'template/single-ot_portfolio.php';
            }
        }
    }
    return $template_path;
}

// Add to admin_init function
add_filter('manage_edit-portfolio_columns', 'add_new_portfolio_columns');
function add_new_portfolio_columns($portfolio_columns) { 
	$new_columns['cb'] = '<input type="checkbox" />'; 	
	$new_columns['featured_image'] = 'Featured Image';
    $new_columns['title'] = _x('Title', 'ot-portfolio');
    $new_columns['author'] = _x('Author', 'ot-portfolio');
    $new_columns['taxonomy-portfolio_cat'] = _x('Categories', 'ot-portfolio');
	$new_columns['taxonomy-portfolio_tag'] = _x('Tags', 'ot-portfolio');
	$new_columns['comments'] = '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>';
    $new_columns['date'] = _x('Date', 'ot-portfolio');

    return $new_columns;
}

// Add to admin_init function
add_action('manage_portfolio_posts_custom_column', 'manage_portfolio_columns', 10, 2);
function manage_portfolio_columns($column, $post_id) {
    global $post;
    switch ($column) {
        case 'taxonomy-portfolio_cat':
            $terms = get_the_terms($post_id, 'taxonomy-portfolio_cat');
            if (!empty($terms)) {
                $out = array();
                foreach ($terms as $term) {
                    $out[] = sprintf('<a href="%s&post_type=ot_portfolio">%s</a>', esc_url(add_query_arg(array(
                        'post_type' => $post->post_type,
                        'taxonomy-portfolio_cat' => $term->slug
                    ), 'edit.php')), esc_html(sanitize_term_field('name', $term->name, $term->term_id, 'taxonomy-portfolio_cat', 'display')));
                }
                echo join(', ', $out);
            } else {
                _e('No Portfolio Category', 'ot-portfolio');
            }
            break;
        case 'taxonomy-portfolio_tag':
            $terms = get_the_terms($post_id, 'taxonomy-portfolio_tag');
            if (!empty($terms)) {
                $out = array();
                foreach ($terms as $term) {
                    $out[] = sprintf('<a href="%s&post_type=ot_portfolio">%s</a>', esc_url(add_query_arg(array(
                        'post_type' => $post->post_type,
                        'taxonomy-portfolio_tag' => $term->slug
                    ), 'edit.php')), esc_html(sanitize_term_field('name', $term->name, $term->term_id, 'taxonomy-portfolio_tag', 'display')));
                }
                echo join(', ', $out);
            } else {
                _e('No Portfolio Tag', 'ot-portfolio');
            }
            break;    
        default:
            break;
    } // end switch
}

/**
 * get featured image function
 */
function portfolio_featured_image($post_ID) {
	$post_thumbnail_id = get_post_thumbnail_id($post_ID);
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
		return $post_thumbnail_img[0];
	}
}
/**
 * show featured image in column
 */
function portfolio_columns_content($column_name, $post_ID) {
	if ($column_name == 'featured_image') {
		$post_featured_image = portfolio_featured_image($post_ID);
		if ($post_featured_image) {
			echo '<img src="' . $post_featured_image . '" />';
		}
	}
}
add_action('manage_portfolio_posts_custom_column', 'portfolio_columns_content', 10, 2);

/**
 * Easy change slug cutom post type name in url to the permalink settings page.
 */
add_action( 'load-options-permalink.php', 'wpse30021_portfolio_load_permalinks' );
function wpse30021_portfolio_load_permalinks()
{
	if( isset( $_POST['wpse30021_portfolio_base'] ) )
	{
		update_option( 'wpse30021_portfolio_base', sanitize_title_with_dashes( $_POST['wpse30021_portfolio_base'] ) );
	}
	
	// Add a settings field to the permalink page
	add_settings_field( 'wpse30021_portfolio_base', __( 'OT Portfolio base', 'ot-portfolio' ), 'wpse30021_portfolio_field_callback', 'permalink', 'optional' );	
}
function wpse30021_portfolio_field_callback()
{
	$value = get_option( 'wpse30021_portfolio_base' );	
	echo '<input type="text" value="' . esc_attr( $value ) . '" name="wpse30021_portfolio_base" id="wpse30021_portfolio_base" class="regular-text" />';
}

?>