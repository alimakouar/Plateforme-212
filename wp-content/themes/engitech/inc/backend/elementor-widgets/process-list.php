<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Engitech Process List
 */
class Engitech_Process_List extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ot-process-list';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Process List', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-bullet-list';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Process List', 'engitech' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'text',
			[
				'label' => __( 'Text', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'List Menu Item', 'engitech' ),
				'default' => __( 'List Menu Item', 'engitech' ),
			]
		);

		$repeater->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'engitech' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [],
				'fa4compatibility' => 'icon',
			]
		);

		$repeater->add_control(
			'p_time',
			[
				'label' => __( 'Time', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'List Menu Item', 'engitech' ),
				'default' => __( '10:29 AM', 'engitech' ),
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
			'data_process',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => __( 'List Menu Item #1', 'engitech' ),
						'link' => [
							'url' => '#'
						]
					],
					[
						'text' => __( 'List Menu Item #2', 'engitech' ),
						'link' => [
							'url' => '#'
						]
					],
					[
						'text' => __( 'List Menu Item #3', 'engitech' ),
						'link' => [
							'url' => '#'
						]
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_data_process',
			[
				'label' => __( 'General', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'process_list_space',
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
					'{{WRAPPER}} .ot-process-list-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'process_list_padding',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'ot_general_tab_normal' );

		$this->start_controls_tab(
			'process_list_normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);
		$this->add_control(
			'plist_bgcolor',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'plist_bradius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'heading_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_spacing',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
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
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-process-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-process-list-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'heading_title',
			[
				'label' => esc_html__( 'Title', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .ot-process-list-item',
			]
		);
		
		$this->end_controls_tab();

		$this->start_controls_tab(
			'process_list_hover',
			[
				'label' => __( 'Active', 'engitech' ),
			]
		);
		$this->add_control(
			'plist_scale',
			[
				'label' => __( 'Scale', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 2,
						'min' => 0.10,
						'step' => 0.05,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item.process-current' => 'transform: scale({{SIZE}});',
				],
			]
		);
		$this->add_control(
			'plist_bghcolor',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item.process-current' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'plist_bhradius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item.process-current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'heading_hicon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'icon_hsize',
			[
				'label' => __( 'Size', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item.process-current .ot-process-list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item.process-current .ot-process-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-process-list-item.process-current .ot-process-list-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'heading_htext',
			[
				'label' => esc_html__( 'Title', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'text_color_hover',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-process-list-item.process-current' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'htext_typography',
				'selector' => '{{WRAPPER}} .ot-process-list-item.process-current',
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>
	        <div class="ot-process-list-wrapper">
	        	<ul class="ot-process-list-items unstyle">
	        		<?php foreach ( $settings['data_process'] as $key => $item ) : 
	        			$migration_allowed = Icons_Manager::is_migration_allowed();
	        			?>
	        			<li class="ot-process-list-item <?php if( !empty($item['is_current']) ) echo 'process-current' ?>">
	        				<div class="ot-title-process">
		        				<?php
									$migrated = isset( $item['__fa4_migrated']['selected_icon'] );
									$is_new = ! isset( $item['icon'] ) && $migration_allowed;
									if ( ! empty( $item['icon'] ) || ( ! empty( $item['selected_icon']['value'] ) && $is_new ) ) :
								?>

								<span class="ot-process-list-icon">
									<?php
									if ( $is_new || $migrated ) {
										Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] );
									} else { ?>
										<i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
									<?php } ?>
								</span>
								<?php endif; ?>
								<span class="ot-process-list-text"><?php echo $item['text']; ?></span>
							</div>
							<div class="ot-time-process">
								<span><?php echo $item['p_time']; ?></span>
							</div>
	        			</li>
	        		<?php endforeach ?>
	        	</ul>
	        </div>
	    <?php
	}

	protected function content_template() {}
}
// After the Engitech_Process_List class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Process_List() );