<?php

// Load the theme's custom Widgets so that they appear in the Elementor element panel.
add_action( 'elementor/widgets/widgets_registered', 'engitech_register_elementor_widgets' );
function engitech_register_elementor_widgets() {
    // We check if the Elementor plugin has been installed / activated.
    if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {
        // Include Elementor Widget files here.
        
        // Remove this 2 require_once line below after completed the theme.
        require_once( get_template_directory() . '/inc/backend/elementor-widgets/widgets.php' );
        require_once( get_template_directory() . '/inc/backend/elementor-widgets/header/widgets.php' );
    }
}

// Add a custom 'category_engitech' category for to the Elementor element panel so that our theme's widgets have their own category.
add_action( 'elementor/init', function() {
    \Elementor\Plugin::$instance->elements_manager->add_category( 
        'category_engitech',
        [
            'title' => __( 'Engitech', 'engitech' ),
            'icon' => 'fa fa-plug', //default icon
        ],
        1 // position
    );
    \Elementor\Plugin::$instance->elements_manager->add_category( 
        'category_engitech_header',
        [
            'title' => __( 'OT Header', 'engitech' ),
            'icon' => 'fa fa-plug', //default icon
        ],
        2 // position
    );
});

function engitech_add_cpt_support() {
    
    //if exists, assign to $cpt_support var
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    //check if option DOESN'T exist in db
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'ot_portfolio', 'ot_service', 'ot_header_builders', 'ot_footer_builders' ]; //create array of our default supported post types
        update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
    }
    
    //if it DOES exist, but portfolio is NOT defined
    else if( ! in_array( array('ot_portfolio', 'ot_service', 'ot_header_builders', 'ot_footer_builders'), $cpt_support ) ) {
        $cpt_support[] = 'ot_portfolio'; //append to array
        $cpt_support[] = 'ot_service'; //append to array
        $cpt_support[] = 'ot_header_builders'; //append to array
        $cpt_support[] = 'ot_footer_builders'; //append to array
        update_option( 'elementor_cpt_support', $cpt_support ); //update database
    }
    
    //otherwise do nothing, portfolio already exists in elementor_cpt_support option
}
add_action( 'after_switch_theme', 'engitech_add_cpt_support' );

// Upload SVG for Elementor
function engitech_unfiltered_files_upload() {
    
    //if exists, assign to $cpt_support var
    $cpt_support = get_option( 'elementor_unfiltered_files_upload' );
    
    //check if option DOESN'T exist in db
    if( ! $cpt_support ) {
        $cpt_support = '1'; //create string value default to enable upload svg
        update_option( 'elementor_unfiltered_files_upload', $cpt_support ); //write it to the database
    }
}
add_action( 'elementor/init', 'engitech_unfiltered_files_upload' );

// header post type
add_action( 'init', 'engitech_create_header_builder' ); 
function engitech_create_header_builder() {
    register_post_type( 'ot_header_builders',
        array(
            'labels' => array(
                'name' => 'Header Builder',
                'singular_name' => 'Header Builder',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Header Builder',
                'edit' => 'Edit',
                'edit_item' => 'Edit Header Builder',
                'new_item' => 'New Header Builder',
                'view' => 'View',
                'view_item' => 'View Header Builder',
                'search_items' => 'Search Header Builders',
                'not_found' => 'No Header Builders found',
                'not_found_in_trash' => 'No Header Builders found in Trash',
                'parent' => 'Parent Header Builder'
            ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'menu_position' => 60,
            'supports' => array( 'title', 'editor' ),
            'menu_icon' => 'dashicons-editor-kitchensink',
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'capability_type' => 'post'
        )
    );
}

// footer post type
add_action( 'init', 'engitech_create_footer_builder' ); 
function engitech_create_footer_builder() {
    register_post_type( 'ot_footer_builders',
        array(
            'labels' => array(
                'name' => 'Footer Builder',
                'singular_name' => 'Footer Builder',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Footer Builder',
                'edit' => 'Edit',
                'edit_item' => 'Edit Footer Builder',
                'new_item' => 'New Footer Builder',
                'view' => 'View',
                'view_item' => 'View Footer Builder',
                'search_items' => 'Search Footer Builders',
                'not_found' => 'No Footer Builders found',
                'not_found_in_trash' => 'No Footer Builders found in Trash',
                'parent' => 'Parent Footer Builder'
            ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'menu_position' => 60,
            'supports' => array( 'title', 'editor' ),
            'menu_icon' => 'dashicons-editor-kitchensink',
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'capability_type' => 'post'
        )
    );
}

/*Fix Elementor Pro*/
function engitech_register_elementor_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_all_core_location();

}
add_action( 'elementor/theme/register_locations', 'engitech_register_elementor_locations' );

/*** add options to sections ***/
add_action('elementor/element/section/section_structure/after_section_end', function( $section, $args ) {

    /* header options */
    $section->start_controls_section(
        'header_custom_class',
        [
            'label' => __( 'For Header', 'engitech' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
    $section->add_control(
        'sticky_class',
        [
            'label'        => __( 'Sticky On/Off', 'engitech' ),
            'type'         => Elementor\Controls_Manager::SWITCHER,
            'return_value' => 'is-fixed',
            'prefix_class' => '',
        ]
    );
    $section->add_control(
        'sticky_background',
        [
            'label'     => __( 'Background Scroll', 'engitech' ),
            'type'      => Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.elementor-section.is-stuck' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sticky_class' => 'is-fixed',
            ],
        ]
    );
    $section->add_responsive_control(
        'offset_space',
        [
            'label' => __( 'Offset', 'engitech' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.is-stuck' => 'top: {{SIZE}}{{UNIT}};',
                '.admin-bar {{WRAPPER}}.is-stuck' => 'top: calc({{SIZE}}{{UNIT}} + 32px);',
            ],
            'condition' => [
                'sticky_class' => 'is-fixed',
            ],
        ]
    );

    $section->end_controls_section();

}, 10, 2 );

/*Add options to main section*/
add_action('elementor/element/section/section_layout/after_section_start', function( $section, $args ) {

    $section->add_control(
        'layout_section',
        [
            'label' => __( 'Display Section', 'engitech' ),
            'type' => Elementor\Controls_Manager::CHOOSE,
            'default' => 'traditional',
            'options' => [
                'layout_block' => [
                    'title' => __( 'Default', 'engitech' ),
                    'icon' => 'eicon-editor-list-ul',
                ],
                'layout_inline' => [
                    'title' => __( 'Inline', 'engitech' ),
                    'icon' => 'eicon-ellipsis-h',
                ],
            ],
            'label_block' => false,
            'prefix_class' => 'ot-',
        ]
    );
    $section->add_responsive_control(
        'content_align',
        [
            'label' => __( 'Alignment', 'engitech' ),
            'type' => Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left'    => [
                    'title' => __( 'Left', 'engitech' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'engitech' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'engitech' ),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => __( 'Justified', 'engitech' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'prefix_class' => 'ot%s-align-',
            'default' => '',
            'condition' => [
                'layout_section'    => 'layout_inline'
            ],
        ]
    );

}, 10, 3 );

/*Add options to sections*/
add_action('elementor/element/section/section_typo/after_section_end', function( $section, $args ) {

    /*Grid Lines*/
    $section->start_controls_section(
        'section_custom_lines',
        [
            'label' => __( 'Grid Lines', 'onum' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $section->add_control(
        'lines_class',
        [
            'label'        => __( 'Grid Lines On/Off', 'onum' ),
            'type'         => Elementor\Controls_Manager::SWITCHER,
            'return_value' => 'has-lines',
            'prefix_class' => '',
        ]
    );
    $section->add_control(
        'heading_line1',
        [
            'label' => __( 'Line Left', 'onum' ),
            'type' => Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'line1_space',
        [
            'label' => __( 'Position Line', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-left' => 'top: {{SIZE}}{{UNIT}}; height: calc(100% - {{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'line1_color',
        [
            'label'        => __( 'Line Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-left' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'dot1_space',
        [
            'label' => __( 'Position Dot', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-left span' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'dot1_color',
        [
            'label'        => __( 'Dot Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-left span' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );

    $section->add_control(
        'heading_line2',
        [
            'label' => __( 'Line Center Left', 'onum' ),
            'type' => Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'line2_space',
        [
            'label' => __( 'Position Line', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-cleft' => 'top: {{SIZE}}{{UNIT}}; height: calc(100% - {{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'line2_color',
        [
            'label'        => __( 'Line Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-cleft' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'dot2_space',
        [
            'label' => __( 'Position Dot', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-cleft span' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'dot2_color',
        [
            'label'        => __( 'Dot Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-cleft span' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );

    $section->add_control(
        'heading_line5',
        [
            'label' => __( 'Line Center', 'onum' ),
            'type' => Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'line5_space',
        [
            'label' => __( 'Position Line', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-center' => 'top: {{SIZE}}{{UNIT}}; height: calc(100% - {{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'line5_color',
        [
            'label'        => __( 'Line Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-center' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'dot5_space',
        [
            'label' => __( 'Position Dot', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-center span' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'dot5_color',
        [
            'label'        => __( 'Dot Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-center span' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );

    $section->add_control(
        'heading_line3',
        [
            'label' => __( 'Line Center Right', 'onum' ),
            'type' => Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'line3_space',
        [
            'label' => __( 'Position Line', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-cright' => 'top: {{SIZE}}{{UNIT}}; height: calc(100% - {{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'line3_color',
        [
            'label'        => __( 'Line Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-cright' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'dot3_space',
        [
            'label' => __( 'Position Dot', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-cright span' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'dot3_color',
        [
            'label'        => __( 'Dot Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-cright span' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );

    $section->add_control(
        'heading_line4',
        [
            'label' => __( 'Line Right', 'onum' ),
            'type' => Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'line4_space',
        [
            'label' => __( 'Position Line', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => -200,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-right' => 'top: {{SIZE}}{{UNIT}}; height: calc(100% - {{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'line4_color',
        [
            'label'        => __( 'Line Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-right' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_responsive_control(
        'dot4_space',
        [
            'label' => __( 'Position Dot', 'onum' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .line-right span' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->add_control(
        'dot4_color',
        [
            'label'        => __( 'Dot Color', 'onum' ),
            'type'         => Elementor\Controls_Manager::COLOR,
            'default'      => '',
            'selectors'    => [
                '{{WRAPPER}} .line-right span' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'lines_class' => 'has-lines',
            ],
        ]
    );
    $section->end_controls_section();

}, 10, 2 );

/*** add options to columns ***/
if ( did_action( 'elementor/loaded' ) ) {
    require get_template_directory() . '/inc/backend/column.php';
}