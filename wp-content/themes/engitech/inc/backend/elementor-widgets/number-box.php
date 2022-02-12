<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Service Box
 */
class Engitech_Number_Box extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iservice_box';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Number Box', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-number-field';
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
				'label' => __( 'Number Box', 'engitech' ),
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
				]
			]
		);

	    $this->add_control(
			'number_box',
			[
				'label' => __( 'Box Number', 'engitech' ),
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
				'default' => __( 'Content Marketing', 'engitech' ),
				'label_block' => true,
				'label_block' => true,
			]
		);

		$this->add_control(
			'des',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'You can provide the answers that your potential customers are trying to find, so you can become the industry.', 'engitech' ),
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

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding Box', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .s-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			Group_Control_Background::get_type(),
			[
				'name' => 'box_bg_color',
				'label' => __( 'Background', 'engitech' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .s-box',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow',
				'selector' => '{{WRAPPER}} .s-box',
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
			Group_Control_Background::get_type(),
			[
				'name' => 'box_bg_hover_color',
				'label' => __( 'Background', 'engitech' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .s-box:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_hover_box_shadow',
				'selector' => '{{WRAPPER}} .s-box:hover',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		//Icon
		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Icon', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .content-box' => 'padding-left: calc({{SIZE}}{{UNIT}} + 40px);',
				],
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
			'icon_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-main' => 'color: {{VALUE}};',
					'{{WRAPPER}} .icon-main svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-main' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_hover',
			[
				'label' => __( 'Hover', 'engitech' ),
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .s-box:hover .icon-main' => 'color: {{VALUE}};',
					'{{WRAPPER}} .s-box:hover .icon-main svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .s-box:hover .icon-main' => 'background: {{VALUE}};',
				],
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
					'{{WRAPPER}} .s-box h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .s-box h5' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label' => __( 'Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .s-box:hover h5' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .s-box h5',
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
					'{{WRAPPER}} .s-box p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'des_hcolor',
			[
				'label' => __( 'Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .s-box:hover p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .s-box p',
			]
		);

		//Number
		$this->add_control(
			'heading_number_big',
			[
				'label' => __( 'Number', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'number_big_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .big-number' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hover_number_big_color',
			[
				'label' => __( 'Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .s-box:hover .big-number' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'num_big_typography',
				'selector' => '{{WRAPPER}} .big-number',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="service-box s-box">
			<span class="big-number"><?php echo $settings['number_box']; ?></span>
			<div class="icon-main">
		        <?php if( $settings['icon_type'] == 'font' ) { Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] ); } ?>
			    <?php if( $settings['icon_type'] == 'image' ) { ?><img src="<?php echo esc_attr( $settings['icon_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"><?php } ?>
		        <?php if( $settings['icon_type'] == 'class' ) { ?><span class="<?php echo esc_attr( $settings['icon_class'] ); ?>"></span><?php } ?>
	        </div>
	        <div class="content-box">
	            <h5><?php echo $settings['title']; ?></h5>
	            <p><?php echo $settings['des']; ?></p>
	        </div>
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Number_Box() );