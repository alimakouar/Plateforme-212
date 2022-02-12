<?php
/**
 * Registering meta boxes
 *
 * Using Meta Box plugin: http://www.deluxeblogtips.com/meta-box/
 *
 * @see https://docs.metabox.io/
 *
 * @param array $meta_boxes Default meta boxes. By default, there are no meta boxes.
 *
 * @return array All registered meta boxes
 */
function engitech_register_meta_boxes( $meta_boxes ) {
	// Page Settings
	$meta_boxes[] = array(
		'id'       => 'page-settings',
		'title'    => esc_html__( 'Page Settings', 'engitech' ),
		'pages'    => array( 'page' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
            array(
                'id'        => 'page_layout',
                'name'      => esc_html__( 'Page Layout', 'engitech' ),
                'type'      => 'image_select',
                'options'   => array(
                    'full-content'    => get_template_directory_uri() . '/inc/backend/images/full.png',
                    'content-sidebar' => get_template_directory_uri() . '/inc/backend/images/right.png',
                    'sidebar-content' => get_template_directory_uri() . '/inc/backend/images/left.png',
                ),
                'std'       => 'full-content'
            ),
            array(
                'name'             => esc_html__( 'Page Header On/Off', 'engitech' ),
                'id'               => 'pheader_switch',
                'type'             => 'switch',
                'style'            => 'rounded',
                'on_label'         => 'On',
                'off_label'        => 'Off',
                'std'              => 'on'
            ),
            array(
                'name'             => esc_html__( 'Background Page Header', 'engitech' ),
                'id'               => 'pheader_bg_image',
                'type'             => 'image_advanced',
                'max_file_uploads' => 1,
            )
		),
	);

    $meta_boxes[] = array(
        'id'       => 'extra-settings',
        'title'    => esc_html__( 'Extra Settings', 'engitech' ),
        'pages'    => array( 'ot_portfolio' ),
        'context'  => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields'   => array(
            array(
                'name'             => esc_html__( 'Page Header On/Off', 'engitech' ),
                'id'               => 'pheader_switch',
                'type'             => 'switch',
                'style'            => 'rounded',
                'on_label'         => 'On',
                'off_label'        => 'Off',
                'std'              => 'on'
            ),
            array(
                'name'             => esc_html__( 'Background Page Header', 'engitech' ),
                'id'               => 'pheader_bg_image',
                'type'             => 'image_advanced',
                'max_file_uploads' => 1,
            )
        ),
    );
	$meta_boxes[] = array (
      'id' => 'select-header-footer',
      'title' => 'Header/Footer Settings',
      'pages' =>   array ( 'page' ),
      'context' => 'normal',
      'priority' => 'high',
      'autosave' => false,
      'fields' =>   array (  
      		array(
        		'name' 	=> 'Header Layout',
				'id' 	=> 'select_header',
				'type'  => 'post',
		    	'post_type'   => 'ot_header_builders',
		    	'field_type'  => 'select_advanced',
		    	'placeholder' => 'Select a header',
		    	'query_args'  => array(
		        	'post_status'    => 'publish',
		        	'posts_per_page' => - 1,
		        	'orderby' 		 => 'date',
		        	'order' 		 => 'ASC',
		    	),
			),
			array(
                'name'             => esc_html__( 'Header Transparent?', 'engitech' ),
                'id'               => 'is_trans',
				'type'             => 'select',
				'options'   => array(
                    'default'   => 'Default',
                    'yes' 		=> 'Yes',
                    'no' 		=> 'No',
                ),
                'std'       => 'default'
            ),
			array(
        		'name' 	=> 'Header Mobile Layout',
				'id' 	=> 'select_header_mobile',
				'type'  => 'post',
		    	'post_type'   => 'ot_header_builders',
		    	'field_type'  => 'select_advanced',
		    	'placeholder' => 'Select a header mobile',
		    	'query_args'  => array(
		        	'post_status'    => 'publish',
		        	'posts_per_page' => - 1,
		        	'orderby' 		 => 'date',
		        	'order' 		 => 'ASC',
		    	),
			),
	        array(
	        	'name' => 'Footer Layout',
				'id' => 'select_footer',
				'type'        => 'post',
			    'post_type'   => 'ot_footer_builders',
			    'field_type'  => 'select_advanced',
			    'placeholder' => 'Select a footer',
			    'query_args'  => array(
			        'post_status'    => 'publish',
			        'posts_per_page' => - 1,
			        'orderby' => 'date',
			        'order' => 'ASC',
			    ),
	        ),
      	),
    );

	// Post format's meta box
	$meta_boxes[] = array(
		'id'       => 'format_detail',
		'title'    => esc_html__( 'Format Details', 'engitech' ),
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name'             => esc_html__( 'Image', 'engitech' ),
				'id'               => 'post_image',
				'type'             => 'image_advanced',
				'class'            => 'image',
				'max_file_uploads' => 1,
				// Image size that displays in the edit page. Possible sizes small,medium,large,original
    			'image_size'       => 'thumbnail',
			),
			array(
				'name'  => esc_html__( 'Gallery', 'engitech' ),
				'id'    => 'post_gallery',
				'type'  => 'image_advanced',
				'class' => 'gallery',
				// Image size that displays in the edit page. Possible sizes small,medium,large,original
    			'image_size'       => 'thumbnail',
			),			
			array(
				'name'  => esc_html__( 'Audio', 'engitech' ),
				'id'    => 'post_audio',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'audio',
				'desc'  => 'Example: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',
			),
			array(
				'name'  => esc_html__( 'Video', 'engitech' ),
				'id'    => 'post_video',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'video',
				'desc'  => 'Example: https://vimeo.com/87959439',
			),
			array(
				'name'  => esc_html__( 'Background Video', 'engitech' ),
				'id'    => 'bg_video',
				'type'  => 'image_advanced',
				'class' => 'video',
				'max_file_uploads' => 1,
			),
			array(
				'name'  => esc_html__( 'Link', 'engitech' ),
				'id'    => 'post_link',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'link',
			),
			array(
				'name'  => esc_html__( 'Text Link', 'engitech' ),
				'id'    => 'text_link',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'link',
			),
			array(
				'name'  => esc_html__( 'Quote', 'engitech' ),
				'id'    => 'post_quote',
				'type'  => 'textarea',
				'class' => 'quote',
			),
			array(
				'name'  => esc_html__( 'Quote Name', 'engitech' ),
				'id'    => 'quote_name',
				'type'  => 'text',
				'class' => 'quote',
			)		
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'engitech_register_meta_boxes' );
