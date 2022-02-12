<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Icon Box
 */
class Engitech_MessageBox extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'imessagebox';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Message Box', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-alert';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Message Box', 'engitech' ),
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
					'class' => __( 'Custom Icon', 'engitech' ),
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
					'value' => 'fas fa-info',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_type' => 'font',
				]
			]
		);
	    $this->add_control(
			'icon_class',
			[
				'label' => __( 'Custom Class', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'flaticon-info', 'engitech' ),
				'condition' => [
					'icon_type' => 'class',
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Information Box', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'des',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'We help ambitious businesses like yours generate.', 'engitech' ),
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_box_section',
			[
				'label' => __( 'Box', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_bg',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .message-box' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .message-box' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding Box', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .message-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accs_box_shadow',
				'selector' => '{{WRAPPER}} .message-box',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Icon', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_bg',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-main' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-main' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-main i, {{WRAPPER}} .icon-main span:before' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->add_responsive_control(
			'icon_space',
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
					'{{WRAPPER}} .content-box' => 'padding-left: calc({{SIZE}}{{UNIT}} + 46px);',
				],
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
					'{{WRAPPER}} .message-box h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .message-box h6' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .message-box h6',
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
					'{{WRAPPER}} .message-box p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .message-box p',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="message-box">
			<div class="icon-main">
		        <?php if( !empty( $settings['icon_font']['value'] ) ) { ?><i class="<?php echo esc_attr( $settings['icon_font']['value'] ); ?>"></i><?php } ?>
		        <?php if( !empty( $settings['icon_class'] ) ) { ?><span class="<?php echo esc_attr( $settings['icon_class'] ); ?>"></span><?php } ?>
	        </div>
	        <div class="content-box">
	            <h6><?php echo $settings['title']; ?></h6>
	            <p><?php echo $settings['des']; ?></p>
	        </div>
	        <i class="flaticon-close"></i>
	    </div>
	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_MessageBox() );