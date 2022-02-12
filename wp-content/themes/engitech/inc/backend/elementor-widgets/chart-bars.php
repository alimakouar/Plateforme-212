<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Chart Bars 
 */
class Engitech_Chart_Bars extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ichart';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Chart Bars', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-skill-bar';
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
				'label' => __( 'Content', 'engitech' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Play to earn', 'engitech' ),
			]
		);
		$this->add_control(
			'percent',
			[
				'label' => __( 'Percentage', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'description' => esc_html__( 'Round at most 2 decimal places', 'engitech' ),
				'default' => [
					'size' => 50,
					'unit' => '%',
				],
			]
		);
		$this->add_control(
			'bar_height',
			[
				'label' => __( 'Height', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bar_style_section',
			[
				'label' => __( 'Chart Bar', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'cborder_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ot-chart-bar .col-chart' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color',
				'label' => __( 'Background', 'engitech' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ot-chart-bar .col-chart',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_text_section',
			[
				'label' => __( 'Text', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::HEADING,
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
					'{{WRAPPER}} .chart-title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .chart-title' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'dot_color',
			[
				'label' => __( 'Dot Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle:before' => 'background-color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .chart-title',
			]
		);

		//Percentage
		$this->add_control(
			'heading_percent',
			[
				'label' => __( 'Percentage', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'per_space',
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
					'{{WRAPPER}} .percent' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'per_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .percent' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'per_typography',
				'selector' => '{{WRAPPER}} .percent',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		
		<div class="ot-chart-bar" data-percent="<?php echo esc_attr( $settings['percent']['size'] );?>" data-height="<?php echo esc_attr( $settings['bar_height']['size'] ); ?>">
			<div class="inner-bar">
				<span class="col-chart">
					<?php if( !empty($settings['percent']['size']) ){ ?><span class="percent"></span><?php } ?>
				</span>
				<h6 class="chart-title"><span class="circle"><?php echo $settings['title']; ?></span></h6>
			</div>
	    </div>
		
	    <?php 
	}

	protected function content_template() {}
}
// After the Engitech_Chart_Bars class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Chart_Bars() );