<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Tab Titles
 */
class Engitech_Tab_Titles extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itabtitle';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Tab Titles(Vertical)', 'engitech' );
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
			]
		);
		$repeater->add_control(
			'titles',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Collaborate',
			]
		);
		$repeater->add_control(
			'des',
			[
				'label' => __( 'Description', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Work as a team to help your customers get all the answers',
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
					'{{WRAPPER}} .tab-titles .title-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_titles',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .title-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'radius_titles',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .title-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'titles_bcolor',
			[
				'label' => __( 'Border Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .title-item' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'titles_hbcolor',
			[
				'label' => __( 'Border Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .title-item:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .icon-main i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon-main svg' => 'width: {{SIZE}}{{UNIT}};'
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
					'{{WRAPPER}} .icon-main' => 'margin-right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .icon-main i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .icon-main svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'texts_section',
			[
				'label' => __( 'Texts', 'engitech' ),
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
					'{{WRAPPER}} .title-item h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .title-item h5' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .title-item:hover h5' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .title-item h5',
			]
		);

		//Des
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
					'{{WRAPPER}} .title-item .long-text' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .title-item .long-text',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="tab-titles">
			<?php foreach ( $settings['title_boxes'] as $box ) : ?>
			<div class="title-item" data-link="<?php echo esc_url($box['title_link']); ?>">
				<?php if( $box['icon_font']['value'] != '' ) { ?>
				<div class="icon-main">
					<?php Icons_Manager::render_icon( $box['icon_font'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<?php } ?>
				<div class="texts">
					<h5><?php echo $box['titles']; ?></h5>
					<?php if( $box['des'] ) { echo '<div class="long-text">'.$box['des'].'</div>'; } ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Tab_Titles() );