<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Sidepanel
 */
class Engitech_Sidepanel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'isidepanel';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Side Panel', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-sidebar';
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
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .panel-btn svg' => 'fill: {{VALUE}};',
				]
			]
		);
		$this->add_control(
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
					'{{WRAPPER}} .panel-btn svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_panel_section',
			[
				'label' => __( 'Side Panel', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'panel_size',
			[
				'label' => __( 'Width', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 100,
						'max'  => 1000,
						'step' => 10,
					],
				],
				'selectors' => [
					'#side-panel' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bg_panel',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#side-panel' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'bg_close',
			[
				'label' => __( 'Background Close Button', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#side-panel .side-panel-close' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'color_close',
			[
				'label' => __( 'Color Close Button', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#side-panel .side-panel-close' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
			
	    	<div class="octf-sidepanel octf-cta-header">
				<div class="site-overlay panel-overlay"></div>
				<div id="panel-btn" class="panel-btn octf-cta-icons">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 					viewBox="0 0 270 270" style="enable-background:new 0 0 270 270;" xml:space="preserve">
					<g>
						<g>
							<path d="M114,0H10C4.5,0,0,4.5,0,10v104c0,5.5,4.5,10,10,10h104c5.5,0,10-4.5,10-10V10C124,4.5,119.5,0,114,0z M104,104H20V20h84
								V104z"/>
						</g>
					</g>
					<g>
						<g>
							<path d="M260,0H156c-5.5,0-10,4.5-10,10v104c0,5.5,4.5,10,10,10h104c5.5,0,10-4.5,10-10V10C270,4.5,265.5,0,260,0z M250,104h-84
								V20h84V104z"/>
						</g>
					</g>
					<g>
						<g>
							<path d="M114,146H10c-5.5,0-10,4.5-10,10v104c0,5.5,4.5,10,10,10h104c5.5,0,10-4.5,10-10V156C124,150.5,119.5,146,114,146z
								 M104,250H20v-84h84V250z"/>
						</g>
					</g>
					<g>
						<g>
							<path d="M260,146H156c-5.5,0-10,4.5-10,10v104c0,5.5,4.5,10,10,10h104c5.5,0,10-4.5,10-10V156C270,150.5,265.5,146,260,146z
								 M250,250h-84v-84h84V250z"/>
						</g>
					</g>
					</svg>
				</div>
			</div>
		    
	    <?php
	}

	protected function content_template() {}
}
// After the Engitech_Sidepanel class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Sidepanel() );