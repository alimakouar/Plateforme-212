<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Button
 */
class Engitech_Button extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ibutton';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Button', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-button';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	/**
	 * Get button sizes.
	 *
	 * Retrieve an array of button sizes for the button widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array An array containing button sizes.
	 */
	public static function get_button_style() {
		return [
			'btn-main' 	=> __( 'Normal Button', 'engitech' ),
			'btn-icon'  => __( 'Button With Icon', 'engitech' ),
		];
	}

	public static function get_button_color() {
		return [
			'primary' 	=> __( 'Primary Color', 'engitech' ),
			'second' 	=> __( 'Second Color', 'engitech' ),
			'arrow'   	=> __( 'With Arrow', 'engitech' ),
		];
	}

	protected function register_controls() {

		//Content Service box
		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'engitech' ),
			]
		);

		$this->add_control(
			'btn_style',
			[
				'label' => __( 'Style', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'primary',
				'options' => self::get_button_color(),
				'style_transfer' => true,
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
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Click here', 'engitech' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'engitech' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'General', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .octf-btn',
			]
		);

		//Hover
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-details, {{WRAPPER}} .octf-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'btn_style!' => 'arrow',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .octf-btn',
				'condition' => [
					'btn_style!' => 'arrow',
				]
			]
		);

		$this->add_responsive_control(
			'button_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'btn_style!' => 'arrow',
				]
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
			'hover_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-details:hover, {{WRAPPER}} .octf-btn:hover, {{WRAPPER}} .octf-btn:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn:hover, {{WRAPPER}} .octf-btn:focus' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'btn_style!' => 'arrow',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'selector' => '{{WRAPPER}} .octf-btn:hover',
				'condition' => [
					'btn_style!' => 'arrow',
				]
			]
		);
		
		$this->add_responsive_control(
			'button_hover_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .octf-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'btn_style!' => 'arrow',
				]
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'engitech' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'condition' => [
					'btn_style!' => 'arrow',
				]
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

		if( $settings['btn_style'] != 'arrow' ){
			$this->add_render_attribute( 'button', 'class', 'octf-btn' );

			$this->add_render_attribute( 'button', 'class', 'octf-btn-'.$settings['btn_style'] );
		}else{
			$this->add_render_attribute( 'button', 'class', 'btn-details' );
		}

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}

		?>
		<div class="ot-button">
			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo $settings['text']; ?></a>
	    </div>
	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Button() );