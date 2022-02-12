<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Pricing Table 3
 */
class Engitech_Pricing_Table3 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipricingtable3';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Pricing Table 3', 'engitech' );
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
					'{{WRAPPER}} .ot-pricing-table-s3' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'FREE', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '<sup>$</sup>0', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price_for',
			[
				'label' => __( 'Text Under Price', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '/m', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'des',
			[
				'label' => __( 'Description', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Start your business with a simple and efficient account to manage', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'label_link',
			[
				'label' => 'Button',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Get Started', 'engitech' ),
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
		$this->add_control(
			'more_btn',
			[
				'label' => 'More Button',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'More Details', 'engitech' ),
			]
		);

		$this->add_control(
			'more_link',
			[
				'label' => __( 'More Link', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'engitech' )
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_table_section',
			[
				'label' => __( 'General', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_box',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s3' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ibox_box_shadow',
				'selector' => '{{WRAPPER}} .ot-pricing-table-s3',
				'separator' => 'before',
			]
		);		
		
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
					'{{WRAPPER}} .ot-pricing-table-s3 .price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-pricing-table-s3 .price' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table-s3 .price',
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
		$this->add_control(
			'price_for_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .price span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_for_typography',
				'selector' => '{{WRAPPER}} .price span',
			]
		);

		//Des
		$this->add_control(
			'heading_shortxt',
			[
				'label' => __( 'Description', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'des!' => '',
				]
			]
		);
		
		$this->add_responsive_control(
			'shortxt_space',
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
					'{{WRAPPER}} .des-table' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'des!' => '',
				]
			]
		);
		$this->add_control(
			'shortxt_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .des-table' => 'color: {{VALUE}};',
				],
				'condition' => [
					'des!' => '',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'shortxt_typography',
				'selector' => '{{WRAPPER}} .des-table',
				'condition' => [
					'des!' => '',
				]
			]
		);

		//Button 1
		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button 1', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table-s3 .table-btn',
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s3 .table-btn' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .ot-pricing-table-s3 .table-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'engitech' ),
			]
		);
		$this->add_control(
			'btn_hbg_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s3 .table-btn:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hcolor',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s3 .table-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		//Button 2
		$this->add_control(
			'heading_btn2',
			[
				'label' => __( 'Button 2', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn2_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table-s3 .more-btn',
			]
		);
		$this->start_controls_tabs( 'tabs_button2_style' );

		$this->start_controls_tab(
			'tab_button2_normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);
		$this->add_control(
			'btn2_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s3 .more-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button2_hover',
			[
				'label' => __( 'Hover', 'engitech' ),
			]
		);
		$this->add_control(
			'btn2_hcolor',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s3 .more-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

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
		$this->add_render_attribute( 'button', 'class', 'table-btn' );

		if ( ! empty( $settings['more_link']['url'] ) ) {
			$this->add_render_attribute( 'more', 'href', $settings['more_link']['url'] );

			if ( $settings['more_link']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			if ( $settings['more_link']['nofollow'] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}
		$this->add_render_attribute( 'more', 'class', 'more-btn' );

		?>

		<div class="ot-pricing-table-s3">
			<?php if( $settings['title'] != '' ) { echo '<h4 class="title-table">'.$settings['title'].'</h4>'; } ?>
			<?php if( $settings['price'] != '' ) { echo '<div class="price">'.$settings['price'].'<span>'.$settings['price_for'].'</span></div>'; } ?>
			<?php if( $settings['des'] != '' ) { echo '<div class="des-table">'.$settings['des'].'</div>'; } ?>
			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo esc_html( $settings['label_link'] ); ?></a>
			<?php if( $settings['more_btn'] != '' ) { echo '<a '.$this->get_render_attribute_string( 'more' ).'>'.esc_html( $settings['more_btn'] ).'</a>'; } ?>
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Pricing_Table3() );