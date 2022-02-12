<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Tab Titles
 */
class Engitech_Tab_Titles2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itabtitle2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Tab Titles(Horizontal)', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-site-title';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Titles', 'engitech' ),
			]
		);

		$repeater = new Repeater();
		
		$repeater->add_control(
			'titles',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Collaborate',
			]
		);
		$repeater->add_control(
			'title_link',
			[
				'label' => __( 'Link to ID Content', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => '#tab-1',
			]
		);

		$this->add_control(
		    'title_boxes',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{titles}}}',
		    ]
		);

		$this->end_controls_section();

		//Styling
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'General', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
				'selectors' => [
					'{{WRAPPER}} .tab-titles-2' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'titles_space',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .title-item-2' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();		

		$this->start_controls_section(
			'texts_section',
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
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_space',
			[
				'label' => __( 'Width', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .title-item-2' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .title-item-2 h5' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .title-item-2:hover h5, {{WRAPPER}} .tab-active h5' => 'color: {{VALUE}};',
					'{{WRAPPER}} .title-item-2.tab-active' => 'border-color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .title-item-2 h5',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="tab-titles-2">
			<?php foreach ( $settings['title_boxes'] as $box ) : ?>
			<div class="title-item-2" data-link="<?php echo esc_url($box['title_link']); ?>">
				<h5><?php echo $box['titles']; ?></h5>
			</div>
			<?php endforeach; ?>
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Tab_Titles2() );