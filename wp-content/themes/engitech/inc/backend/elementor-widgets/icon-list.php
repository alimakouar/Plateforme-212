<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Engitech Icon List
 */
class Engitech_Icon_List extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ot-icon-list';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Icon List', 'engitech' );
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
				'label' => __( 'Icon List', 'engitech' ),
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'Layout', 'engitech' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'vertical',
				'options' => [
					'vertical' => [
						'title' => __( 'Default', 'engitech' ),
						'icon' => 'eicon-editor-list-ul',
					],
					'horizontal' => [
						'title' => __( 'Inline', 'engitech' ),
						'icon' => 'eicon-ellipsis-h',
					],
				],
				'render_type' => 'template',/*Live load*/
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
			'link',
			[
				'label' => __( 'Link', 'engitech' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'engitech' ),
			]
		);

		$this->add_control(
			'menu_list',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => __( 'List Menu Item #1', 'engitech' ),
					],
					[
						'text' => __( 'List Menu Item #2', 'engitech' ),
					],
					[
						'text' => __( 'List Menu Item #3', 'engitech' ),
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->add_control(
			'icon_view',
			[
				'label' => __( 'View Icon', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'engitech' ),
					'stacked' => __( 'Stacked', 'engitech' ),
				],
				'default' => 'default',
				'prefix_class' => 'ot-view-',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_menu_list',
			[
				'label' => __( 'List', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'space_between',
			[
				'label' => __( 'Space Between', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-list-item:not(:last-child, .--inline-item)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-icon-list-item.--inline-item:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'list_menu_align',
			[
				'label' => __( 'Alignment', 'engitech' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'engitech' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'engitech' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'engitech' ),
						'icon' => 'eicon-text-align-right',
					],

					'space-between' => [
						'title' => esc_html__( 'Justified', 'engitech' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors'	=> [
					'{{WRAPPER}} .ot-icon-list-item' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} ul.--inline-items' => 'justify-content: {{VALUE}}',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .ot-icon-list-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 14,
				],
				'range' => [
					'px' => [
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .ot-icon-list-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'condition' => [
					'icon_view' => 'stacked',
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
					'{{WRAPPER}} .ot-icon-list-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'icon_view' => 'stacked',
				],
			]
		);

		$this->start_controls_tabs( 'ot_icon_colors' );

		$this->start_controls_tab(
			'ot_icon_colors_normal',
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
					'{{WRAPPER}} .ot-icon-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-list-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bgcolor',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-list-icon' => 'background: {{VALUE}};'
				],
				'condition'	=> [
					'icon_view' => 'stacked'
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'ot_icon_colors_hover',
			[
				'label' => __( 'Hover', 'engitech' ),
			]
		);
		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-list-item:hover .ot-icon-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-list-item:hover .ot-icon-list-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bghcolor',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-list-item:hover .ot-icon-list-icon' => 'background: {{VALUE}};'
				],
				'condition'	=> [
					'icon_view' => 'stacked'
				]
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_text_style',
			[
				'label' => __( 'Text', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-list-item, {{WRAPPER}} .ot-icon-list-item a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color_hover',
			[
				'label' => __( 'Hover', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-list-item a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-list-item:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'underline_hover_height',
			[
				'label' => __( 'Height Hover Underline', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .title-link' => 'background-size: 0 {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .title-link:hover' => 'background-size: 100% {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .ot-icon-list-item',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>
	        <div class="ot-icon-list-wrapper">
	        	<ul class="unstyle ot-icon-list-items <?php if( 'horizontal' === $settings['view'] ) echo "--inline-items"; ?>">
	        		<?php foreach ( $settings['menu_list'] as $key => $item ) : 
	        			$migration_allowed = Icons_Manager::is_migration_allowed();
	        			?>
	        			<li class="ot-icon-list-item <?php if( 'horizontal' === $settings['view'] ) echo "--inline-item"; ?>">
	        				<?php
								if ( ! empty( $item['link']['url'] ) ) {
									$link_key = 'link_' . $key;

									$this->add_render_attribute( $link_key, 'class', 'title-link' );
									$this->add_link_attributes( $link_key, $item['link'] );
									?>
									<a <?php $this->print_render_attribute_string( $link_key ); ?>>

									<?php
								}
								$migrated = isset( $item['__fa4_migrated']['selected_icon'] );
								$is_new = ! isset( $item['icon'] ) && $migration_allowed;
								if ( ! empty( $item['icon'] ) || ( ! empty( $item['selected_icon']['value'] ) && $is_new ) ) :
							?>

							<span class="ot-icon-list-icon">
								<?php
								if ( $is_new || $migrated ) {
									Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] );
								} else { ?>
									<i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
								<?php } ?>
							</span>
							<?php endif; ?>
							<span class="ot-icon-list-text"><?php echo $item['text']; ?></span>
							<?php if ( ! empty( $item['link']['url'] ) ) : ?>
								</a>
							<?php endif; ?>
	        			</li>
	        		<?php endforeach ?>
	        	</ul>
	        </div>
	    <?php
	}

	protected function content_template() {}
}
// After the Engitech_Icon_List class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Icon_List() );