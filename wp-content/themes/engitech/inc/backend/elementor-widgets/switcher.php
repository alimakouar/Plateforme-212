<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Switcher
 */
class Engitech_Switcher extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iswitcher';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Switcher(Pricing Table)', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-dual-button';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Switcher', 'engitech' ),
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
				// 'prefix_class' => 'engitech%s-align-',
				'selectors' => [
					'{{WRAPPER}} .ot-switcher' => 'text-align: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'title_left',
			[
				'label' => __( 'Title Left', 'engitech' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Monthly', 'engitech' ),
                'label_block' => true,
			]
        );
        $this->add_control(
			'title_right',
			[
				'label' => __( 'Title Right', 'engitech' ),
				'type' => Controls_Manager::TEXT,
                'default' => __( 'Yearly', 'engitech' ),
                'label_block' => true,
			]
		);

		$this->end_controls_section();

		//Styling
	
		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Switcher', 'engitech' ),
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
					'{{WRAPPER}} .switch' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-switcher > span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-switcher > span',
			]
		);

		$this->end_controls_tabs();

		//Title
		$this->add_control(
			'heading_toggle',
			[
				'label' => __( 'Toggle', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'toggle_bg',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'toggle_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slider:before' => 'background: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="ot-switcher">
            <span class="l-switch active"><?php echo $settings['title_left']; ?></span>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
			<span class="r-switch"><?php echo $settings['title_right']; ?></span>
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Switcher() );