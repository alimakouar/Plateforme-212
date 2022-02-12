<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Search
 */
class Engitech_Search extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'isearch';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Search Header', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-search';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech_header' ];
	}

	protected function register_controls() {
		
		/*** Style ***/
		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Icon', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .toggle-search i:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1b1d21',
				'selectors' => [
					'{{WRAPPER}} .toggle-search i' => 'color: {{VALUE}};',
				]
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'style_form_section',
			[
				'label' => __( 'Form', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'form_width',
			[
				'label' => __( 'Width', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .h-search-form-field' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bg_form_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .h-search-form-inner, {{WRAPPER}} .h-search-form-field:after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'form_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .h-search-form-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'form_shadow',
				'selector' => '{{WRAPPER}} .h-search-form-inner',
			]
		);
		$this->add_control(
			'input_title',
			[
				'label' => __( 'Input', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'text_form_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .h-search-form-inner input, {{WRAPPER}} .h-search-form-inner button, {{WRAPPER}} .h-search-form-inner ::placeholder' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_input_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .h-search-form-inner input' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label' => __( 'Button', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .search-form .search-submit i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bg_btn',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .search-form .search-submit' => 'background: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
			
	    	<div class="octf-search octf-btn-cta">
				<div class="toggle-search octf-cta-icons">
					<i class="flaticon-search"></i>
				</div>
				<!-- Form Search on Header -->
				<div class="h-search-form-field">
					<div class="h-search-form-inner">
						<?php get_search_form(); ?>
					</div>									
				</div>
			</div>
		    
	    <?php
	}

	protected function content_template() {}
}
// After the Engitech_Search class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Search() );