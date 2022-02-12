<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Flip Box
 */
class Engitech_Support_Box extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'isupport_box';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Flip Box', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-flip-box';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		//Content Flip box
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Flip Box', 'engitech' ),
			]
		);

		$this->add_control(
	       'image_box',
	        [
	           'label' => esc_html__( 'Image', 'engitech' ),
	           'type'  => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				]
		    ]
	    );

	    $this->add_control(
			'number_box',
			[
				'label' => __( 'Number', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '01', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'For Partners', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'des',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Entrust full-cycle implementation of your software product to our experienced BAs, UI/UX designers, developers.', 'engitech' ),
			]
		);

		$this->add_control(
			'btn_box',
			[
				'label' => __( 'Button', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '<i class="flaticon-right-arrow-1"></i> LEARN MORE', 'engitech' ),
				'label_block' => true,
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

		/***Style***/

		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sp_box_shadow',
				'selector' => '{{WRAPPER}} .inner-box',
				'separator' => 'before',
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
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .support-box h3' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .support-box h3',
			]
		);

		//Number
		$this->add_control(
			'heading_number_main',
			[
				'label' => __( 'Number', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .number-box',
			]
		);

		//Hover
		$this->start_controls_tabs( 'tabs_number_style' );

		$this->start_controls_tab(
			'tab_number_normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .number-box' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_number_hover',
			[
				'label' => __( 'Hover', 'engitech' ),
			]
		);

		$this->add_control(
			'hover_number_color',
			[
				'label' => __( 'Number Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .overlay .number-box' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		//Overlay
		$this->start_controls_section(
			'style_overlay_section',
			[
				'label' => __( 'Overlay', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'overlay_padding',
			[
				'label' => __( 'Padding Box', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .support-box .overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'overlay_bg',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .support-box .overlay' => 'background: {{VALUE}};',
				],
			]
		);

		//Description
		$this->add_control(
			'heading_des',
			[
				'label' => __( 'Description', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'des_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .overlay' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .overlay',
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
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-details' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .btn-details',
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

		$this->add_render_attribute( 'button', 'class', 'btn-details' );

		?>

		<div class="support-box">
			<div class="inner-box">
				<div class="overlay flex-middle">
					<span class="number-box"><?php echo $settings['number_box']; ?></span>
					<div class="inner">
						<p><?php echo $settings['des']; ?></p>
						<a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo $settings['btn_box']; ?></a>
					</div>
				</div>
				<div class="content-box">
					<span class="number-box"><?php echo $settings['number_box']; ?></span>
					<h3><?php echo $settings['title']; ?></h3>
					<img src="<?php echo esc_attr( $settings['image_box']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
				</div>
			</div>
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Support_Box() );