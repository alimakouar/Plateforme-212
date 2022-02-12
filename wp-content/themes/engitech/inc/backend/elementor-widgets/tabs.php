<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Tabs
 */
class Engitech_Tabs extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itabs';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Tabs', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-tabs';
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
				'label' => __( 'Tabs', 'engitech' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Title & Description', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'engitech' ),
				'placeholder' => __( 'Tab Title', 'engitech' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => __( 'Content', 'engitech' ),
				'default' => __( 'Tab Content', 'engitech' ),
				'placeholder' => __( 'Tab Content', 'engitech' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);

		$this->add_control(
			'ot_tabs',
			[
				'label' => __( 'Tabs Items', 'engitech' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'Tab #1', 'engitech' ),
						'tab_content' => __( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'engitech' ),
					],
					[
						'tab_title' => __( 'Tab #2', 'engitech' ),
						'tab_content' => __( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'engitech' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Tabs', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'style_title',
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
					'{{WRAPPER}} .ot-tabs .tab-link' => 'margin: 0 calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .ot-tabs .tabs-heading' => 'margin: 0 calc(-{{SIZE}}{{UNIT}}/2);',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-tabs .tab-link',
				'separator' => 'before',
			]
		);
		
		$this->start_controls_tabs( 'tabs_title_style' );

		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);

		$this->add_control(
			'title_bgcolor',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs .tab-link:not(.current)' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs .tab-link:not(.current)' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_active',
			[
				'label' => __( 'Active/Hover', 'engitech' ),
			]
		);

		$this->add_control(
			'title_bg_active',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs .tab-link.current, {{WRAPPER}} .ot-tabs .tab-link:hover' => 'background: {{VALUE}};',
				]
			]
		);
		
		$this->add_control(
			'title_color_active',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs .tab-link.current, {{WRAPPER}} .ot-tabs .tab-link:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		//Content
		$this->add_control(
			'style_content',
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
					'{{WRAPPER}} .ot-tabs .tab-content' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ot-tabs .tab-content',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'selector' => '{{WRAPPER}} .ot-tabs .tab-content',
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-tabs .tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="ot-tabs">
			<?php $random = rand(1,1000); if ( $settings['ot_tabs'] ) : ?>
			<ul class="tabs-heading unstyle">
				<?php $i = 1; foreach ( $settings['ot_tabs'] as $tabs ) { ?>
				<li class="tab-link octf-btn" data-tab="tab-<?php echo esc_attr($i.$random); ?>"><?php echo $tabs['tab_title']; ?></li>
				<?php $i++; } ?>
			</ul>
			<?php $j = 1; foreach ( $settings['ot_tabs'] as $tabs ) { ?>
			<div id="tab-<?php echo esc_attr($j.$random); ?>" class="tab-content">
				<?php echo $tabs['tab_content']; ?>
			</div>
			<?php $j++; } endif; ?>
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Tabs() );