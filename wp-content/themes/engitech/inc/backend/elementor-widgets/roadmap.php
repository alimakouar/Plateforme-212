<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class Engitech_Roadmap extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iroadmap';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Roadmap', 'engitech' );
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
				'label' => __('General', 'engitech')
			]
		);
		$this->add_control(
			'number_timeline',
			[
				'label'       => __('Number Timeline', 'engitech'),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 4,
				'min'         => 2,
				'max'         => 10,
				'placeholder' => __('Timeline', 'engitech'),
				'description' => __( 'Min: 2 - Max: 10', 'engitech' ),
			]
		);

		$this->end_controls_section();

		$this->add_tables();

		//Style general

		$this->start_controls_section(
			'content_style_section',
			[
				'label' => __( 'Asset Content', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'timeline_heading',
			[
				'label' => __( 'Timeline', 'engitech' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		
		$this->add_responsive_control(
			'timeline_space',
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
					'{{WRAPPER}} .date-timeline' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'timeline_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .date-timeline' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Dots', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .circle:before' => 'background-color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'timeline_typography',
				'selector' => '{{WRAPPER}} .date-timeline',
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
		$this->add_responsive_control(
			'line_space',
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
					'{{WRAPPER}} .ot-timeline__list:before' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'line_background',
				'label' => __( 'Background', 'engitech' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .ot-timeline__list:before',
			]
		);
		$this->add_control(
			'content_heading',
			[
				'label' => __( 'Content', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'content_space',
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
					'{{WRAPPER}} .item-content-timeline:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .item-content-timeline' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'bgcontent',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .item-content-timeline' => 'background-color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .item-content-timeline',
			]
		);

		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .item-content-timeline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .item-content-timeline' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	function add_tables()
	{

		$repeater = new Repeater();

		$repeater->add_control(
			'content_timeline',
			[
				'label'       => __('Content', 'engitech'),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __('', 'engitech'),
			]
		);
		for ($i = 1; $i < 11; $i++) {
			$this->start_controls_section(
				'section_timeline_' . $i,
				[
					'label'     => __('Timeline ' . $i, 'engitech'),
					'operator'  => '>',
					'condition' => [
						'number_timeline' => $this->add_condition_value($i),
					]
				]
			);
			$this->add_control(
				'year_' . $i,
				[
					'label'       => __('Timeline', 'engitech'),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('2000', 'engitech'),
				]
			);
			
			$this->add_control(
				'list_timeline_' . $i,
				[
					'label'      => __('Content', 'engitech'),
					'type'       => Controls_Manager::REPEATER,
					'show_label' => true,
					'default'    => [
						[
							'content_timeline' => esc_html__( 'EngiTech Token Launch', 'engitech' ),
						],
						[
							'content_timeline' => esc_html__( 'First $500k + Dividend Distribution', 'engitech' ),
						],
					],
					'title_field' => '{{{ content_timeline }}}',
					'fields'     =>  $repeater->get_controls(),
				]
			);

			$this->end_controls_section();
		}
	}

	function add_condition_value($j)
	{
		$value = [];
		for ($i = $j; $i < 11; $i++) {
			$value[] = $i;
		}

		return $value;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="ot-timeline">
			<div class="ot-timeline__list">
				<?php 
					for ($x = 1; $x <= $settings['number_timeline']; $x++) {
						echo '<div class="item-timeline">';
							echo '<span class="date-timeline circle">' . $settings['year_'. $x] . '</span>';
							echo '<ul class="content-timeline unstyle">';
							foreach ($settings['list_timeline_'. $x] as $key => $item) {
								echo '<li class="item-content-timeline">'. $item['content_timeline'] . '</li>';
							}
							echo '</ul>';
						echo '</div>';
					}
				?>

			</div>
		</div>
			
		<?php
	}

	protected function content_template() {}
}
// After the Engitech_Roadmap class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Roadmap() );