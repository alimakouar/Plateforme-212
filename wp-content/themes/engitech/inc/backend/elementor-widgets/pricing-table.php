<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Pricing Table
 */
class Engitech_Pricing_Table extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipricingtable';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Pricing Table', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-price-table';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Pricing Table', 'engitech' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'engitech' ),
				'type' => Controls_Manager::CHOOSE,
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
					]
				],
				// 'prefix_class' => 'engitech%s-align-',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'has_icon',
			[
				'label' => __( 'Icon Table', 'onum' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'onum' ),
				'label_off' => __( 'No', 'onum' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	
		$this->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'font',
				'options' => [
					'font' 	=> __( 'Font Icon', 'engitech' ),
					'image' => __( 'Image Icon', 'engitech' ),
					'class' => __( 'Custom Icon', 'engitech' ),
				],
				'condition' => [
					'has_icon' => 'yes',
				]
			]
		);
		$this->add_control(
			'icon_font',
			[
				'label' => __( 'Icon', 'engitech' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_type' => 'font',
					'has_icon' => 'yes',
				]
			]
		);
		$this->add_control(
	       'icon_image',
	        [
	           'label' => esc_html__( 'Photo', 'engitech' ),
	           'type'  => Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/images/analysis.png',
			  	],
			  	'condition' => [
					'icon_type' => 'image',
					'has_icon' => 'yes',
				]
		    ]
	    );
	    $this->add_control(
			'icon_class',
			[
				'label' => __( 'Custom Class', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'flaticon-report', 'engitech' ),
				'condition' => [
					'icon_type' => 'class',
					'has_icon' => 'yes',
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Standard', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '<sup>$</sup> 69.99', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price_for',
			[
				'label' => __( 'Text Under Price', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Monthly Package', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'details',
			[
				'label' => 'Details',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '<ul><li>Social Media Marketing</li><li>2.100 Keywords</li><li>One Way Link Building</li></ul>', 'engitech' ),
			]
		);

		$this->add_control(
			'label_link',
			[
				'label' => 'Button',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Choose Plane', 'engitech' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'engitech' )
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_table_section',
			[
				'label' => __( 'Table', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding Box', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		
		//Hover
		$this->start_controls_tabs( 'tabs_box_style' );

		$this->start_controls_tab(
			'tab_box_normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .ot-pricing-table',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'ibox_bg',
				'label' => __( 'Background', 'engitech' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ot-pricing-table',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ibox_box_shadow',
				'selector' => '{{WRAPPER}} .ot-pricing-table',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_box_hover',
			[
				'label' => __( 'Hover', 'engitech' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_hover_border',
				'selector' => '{{WRAPPER}} .ot-pricing-table:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'ibox_hover_bg',
				'label' => __( 'Background', 'engitech' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ot-pricing-table:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ibox_hover_box_shadow',
				'selector' => '{{WRAPPER}} .ot-pricing-table:hover',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label' => __( 'Title Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table:hover .title-table' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'price_hcolor',
			[
				'label' => __( 'Price Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table:hover h2' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'uprice_hcolor',
			[
				'label' => __( 'Under Price Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table:hover .inner-table > span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'des_hcolor',
			[
				'label' => __( 'Details Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table:hover .details' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'des_active_hcolor',
			[
				'label' => __( 'Details Active Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table:hover .details li.active' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_responsive_control(
			'title_space',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .title-table' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .title-table' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .title-table',
			]
		);

		//Price
		$this->add_control(
			'heading_price',
			[
				'label' => __( 'Price', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'price_space',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table h2' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table h2',
			]
		);

		//Under Price
		$this->add_control(
			'heading_price_for',
			[
				'label' => __( 'Under Price', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'uprice_space',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .inner-table > span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'price_for_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .inner-table > span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_for_typography',
				'selector' => '{{WRAPPER}} .inner-table > span',
			]
		);

		//Details
		$this->add_control(
			'heading_des',
			[
				'label' => __( 'Details', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'des_padding',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table .details' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		$this->add_control(
			'des_border_color',
			[
				'label' => __( 'Line Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table .details' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'des_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table .details ul' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'des_active_color',
			[
				'label' => __( 'Active Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table .details li.active' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table .details',
			]
		);
		$this->add_control(
			'icon_list',
			[
				'label' => __( 'Icon List', 'onum' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'onum' ),
				'label_off' => __( 'No', 'onum' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	

		//Button
		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table .octf-btn',
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table .octf-btn' => 'background: {{VALUE}};',
					'{{WRAPPER}} .octf-btn i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table .octf-btn' => 'color: {{VALUE}};',
				],
			]
		);

		//Icon
		$this->add_control(
			'heading_icon',
			[
				'label' => __( 'Icon', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'has_icon' => 'yes',
				]
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table .icon-main' => 'background: {{VALUE}};',
				],
				'condition' => [
					'has_icon' => 'yes',
				]
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table .icon-main' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-pricing-table .icon-main svg' => 'fill: {{VALUE}};',
				],
				'condition' => [
					'has_icon' => 'yes',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}
		$this->add_render_attribute( 'button', 'class', 'octf-btn' );

		?>

		<div class="ot-pricing-table">
			<?php if( $settings['has_icon'] ) { ?>
				<div class="icon-main">
					<?php if( $settings['icon_type'] == 'font' ) { Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] ); } ?>
			    	<?php if( $settings['icon_type'] == 'image' ) { ?><img src="<?php echo esc_attr( $settings['icon_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"><?php } ?>
		        	<?php if( $settings['icon_type'] == 'class' ) { ?><span class="<?php echo esc_attr( $settings['icon_class'] ); ?>"></span><?php } ?>
				</div>
			<?php } ?>
			<div class="inner-table">
				<h4 class="title-table"><?php echo esc_html( $settings['title'] ); ?></h4>
				<h2><?php echo $settings['price']; ?></h2>
				<span><?php echo esc_html( $settings['price_for'] ); ?></span>
				<div class="details <?php if( !$settings['icon_list'] ) echo 'no-icon'; ?>"><?php echo $settings['details']; ?></div>
				<a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo esc_html( $settings['label_link'] ); ?></a>
			</div>
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Pricing_Table() );