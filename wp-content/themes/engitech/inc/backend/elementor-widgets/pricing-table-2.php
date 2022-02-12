<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Pricing Table 2
 */
class Engitech_Pricing_Table2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipricingtable2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Pricing Table 2', 'engitech' );
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
		$this->add_control(
			'box_style',
			[
				'label' => __( 'Style', 'engitech' ),
				'type'  => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => [
					's1' 	=> __( 'Style 1', 'engitech' ),
					's2' 	=> __( 'Style 2', 'engitech' ),
				]
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
					'{{WRAPPER}} .ot-pricing-table-s2' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'featured_text',
			[
				'label' => __( 'Featured?', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'engitech' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'business', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '<sup>$</sup>9.99', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price_for',
			[
				'label' => __( 'Text Under Price', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '/ month', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'des',
			[
				'label' => __( 'Description', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '', 'engitech' ),
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
				'default' => __( 'Get Started Now', 'engitech' ),
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
				'label' => __( 'Box Style', 'engitech' ),
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
					'{{WRAPPER}} .ot-pricing-table-s2' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .ot-pricing-table-s2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-pricing-table-s2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'heading_shadow',
			[
				'label' => __( 'Hover Box Shadow', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ibox_box_shadow',
				'selector' => '{{WRAPPER}} .ot-pricing-table-s2',
				'separator' => 'before',
			]
		);		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content Style', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Featured
		$this->add_control(
			'heading_featured',
			[
				'label' => __( 'Featured', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'featured_text!' => '',
				]
			]
		);
		$this->add_control(
			'featured_bg',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .featured' => 'background: {{VALUE}};',
				],
				'condition' => [
					'featured_text!' => '',
				]
			]
		);
		$this->add_control(
			'featured_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .featured' => 'color: {{VALUE}};',
				],
				'condition' => [
					'featured_text!' => '',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'featured_typography',
				'selector' => '{{WRAPPER}} .featured',
				'condition' => [
					'featured_text!' => '',
				]
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
					'{{WRAPPER}} .ot-pricing-table-s2 .price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-pricing-table-s2 .price' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table-s2 .price',
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
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s2 .details' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-pricing-table-s2 ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'des_border_color',
			[
				'label' => __( 'Border Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s2 ul li' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table-s2 .details',
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
				'selector' => '{{WRAPPER}} .ot-pricing-table-s2 .table-btn',
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s2 .table-btn' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .ot-pricing-table-s2 .table-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hbg_color',
			[
				'label' => __( 'Hover Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s2 .table-btn:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hcolor',
			[
				'label' => __( 'Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table-s2 .table-btn:hover' => 'color: {{VALUE}};',
				],
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
		$this->add_render_attribute( 'button', 'class', 'table-btn' );

		?>

		<div class="ot-pricing-table-s2 <?php echo esc_attr( $settings['box_style'] ); ?>">
			<?php if( $settings['featured_text'] != '' ) { echo '<div class="featured">'.$settings['featured_text'].'</div>'; } ?>
			<?php if( $settings['title'] != '' ) { echo '<h4 class="title-table">'.$settings['title'].'</h4>'; } ?>
			<?php if( $settings['price'] != '' ) { echo '<div class="price">'.$settings['price'].'<span>'.$settings['price_for'].'</span></div>'; } ?>
			<?php if( $settings['des'] != '' ) { echo '<div class="des-table">'.$settings['des'].'</div>'; } ?>
			<?php if( $settings['details'] != '' ) { echo '<div class="details">'.$settings['details'].'</div>'; } ?>
			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo esc_html( $settings['label_link'] ); ?></a>
			
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Pricing_Table2() );