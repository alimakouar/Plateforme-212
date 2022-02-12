<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class Engitech_Roadmap_Slider extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iroadmap-slider';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Roadmap Carousel', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-time-line';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		//Content
		$this->start_controls_section(
			'section_general',
			[
				'label' => __('Roadmap Carousel', 'engitech')
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'content_timeline',
			[
				'label'       => __('Content', 'engitech'),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __('Idea for start ICO platform', 'engitech'),
			]
		);
		
		$repeater->add_control(
			'timeline',
			[
				'label'       => __('Timeline', 'engitech'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('2000', 'engitech'),
			]
		);
		$repeater->add_control(
			'is_current',
			[
				'label' => __( 'Is Current?', 'engitech' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'engitech' ),
				'label_off' => __( 'No', 'engitech' ),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'list_roadmap',
			[
				'label'      => __('Items', 'engitech'),
				'type'       => Controls_Manager::REPEATER,
				'show_label' => true,
				'default'    => [
					[
						'content_timeline' => esc_html__( 'Idea for start ICO platform', 'engitech' ),
						'timeline' => esc_html__( '2000', 'engitech' ),
					],
					[
						'content_timeline' => esc_html__( 'Start of the ICO concept', 'engitech' ),
						'timeline' => esc_html__( '2001', 'engitech' ),
					],
				],
				'title_field' => '{{{ timeline }}}',
				'fields'     =>  $repeater->get_controls(),
			]
		);

		$this->add_control(
			'tshow',
			[
				'label' => __( 'Slides to Show', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => __( '1', 'engitech' ),
					'2' => __( '2', 'engitech' ),
					'3' => __( '3', 'engitech' ),
					'4' => __( '4', 'engitech' ),
					'5' => __( '5', 'engitech' ),
				]
			]
		);
		$this->add_control(
			'tscroll',
			[
				'label' => __( 'Slides to Scroll', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __( '1', 'engitech' ),
					'2' => __( '2', 'engitech' ),
					'3' => __( '3', 'engitech' ),
					'4' => __( '4', 'engitech' ),
					'5' => __( '5', 'engitech' ),
				]
			]
		);
		$this->add_control(
			'tarrow',
			[
				'label' => __( 'Nav Slider', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => __( 'Yes', 'engitech' ),
					'false' => __( 'No', 'engitech' ),
				]
			]
		);
		$this->add_control(
			'tdots',
			[
				'label' => __( 'Dots Slider', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => __( 'Yes', 'engitech' ),
					'false' => __( 'No', 'engitech' ),
				]
			]
		);

		$this->end_controls_section();

		//Style general

		$this->start_controls_section(
			'content_style_section',
			[
				'label' => __( 'Roadmap', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'date_heading',
			[
				'label' => __( 'Date/Time', 'engitech' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		
		$this->add_control(
			'date_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .roadmap-item h6' => 'color: {{VALUE}};',
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .roadmap-item h6',
			]
		);
		
		$this->add_control(
			'line_heading',
			[
				'label' => __( 'Line', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .roadmap-carousel-container:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .roadmap-carousel:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .roadmap-carousel:after' => 'background: {{VALUE}};',
				]
			]
		);
		$this->start_controls_tabs( 'dot_tab_normal' );

		$this->start_controls_tab(
			'dot_normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);
		$this->add_control(
			'dot_color',
			[
				'label' => __( 'Dot Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .roadmap-item h6:after' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'dot_bgcolor',
			[
				'label' => __( 'Dot Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .roadmap-item h6:before' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'dot_shadow',
				'label' => __( 'Box Shadow', 'engitech' ),
				'selector' => '{{WRAPPER}} .roadmap-item h6:after',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'dot_current',
			[
				'label' => __( 'Current', 'engitech' ),
			]
		);
		$this->add_control(
			'cdot_color',
			[
				'label' => __( 'Dot Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .roadmap-item.roadmap-current h6:after' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'cdot_bgcolor',
			[
				'label' => __( 'Dot Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .roadmap-item.roadmap-current h6:before' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'cdot_shadow',
				'label' => __( 'Box Shadow', 'engitech' ),
				'selector' => '{{WRAPPER}} .roadmap-item.roadmap-current h6:after',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'content_heading',
			[
				'label' => __( 'Content', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .roadmap-item p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .roadmap-item:after' => 'background: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .roadmap-item p',
			]
		);

		$this->end_controls_section();

		// Dots.
		$this->start_controls_section(
			'style_dots',
			[
				'label' => __( 'Dots', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'spacing_dots',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%' => [
						'min' => -100,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'dots_bgcolor',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-dots button:before' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'dots_active_bgcolor',
			[
				'label' => __( 'Background Active', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-active button:before' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

		// Arrow.
		$this->start_controls_section(
			'style_nav',
			[
				'label' => __( 'Arrow', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'tarrow' => 'true',
				]
			]
		);		
		$this->add_control(
			'spacing_nav',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%' => [
						'min' => -100,
						'max' => 200,
					],
				],
				'selectors' => [					
					'{{WRAPPER}} .prev-nav' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .next-nav' => 'right: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-arrow' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_hcolor',
			[
				'label' => __( 'Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-arrow:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['list_roadmap'] ) ) {
			return;
		}

		?>
		<div class="roadmap-carousel-container">
	        <div class="roadmap-carousel" data-show="<?php echo $settings['tshow']; ?>" data-scroll="<?php echo $settings['tscroll']; ?>" data-dots="<?php echo $settings['tdots']; ?>" data-arrow="<?php echo $settings['tarrow']; ?>">
	            <?php foreach ( $settings['list_roadmap'] as $item ) : ?>
	            <div>
		            <div class="roadmap-item <?php if( !empty($item['is_current']) ) echo 'roadmap-current' ?>">
		                <h6><?php echo $item['timeline']; ?></h6>
		                <p><?php echo $item['content_timeline']; ?></p>
		            </div>
		        </div>
	            <?php endforeach; ?>
	        </div>
	    </div>
		
		<?php
	}

	protected function content_template() {}
}
// After the Engitech_Roadmap_Slider class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Roadmap_Slider() );