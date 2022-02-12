<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Contact Info
 */
class Engitech_Counter3 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'icounter3';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Counter 3', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-counter';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Counter', 'engitech' ),
			]
		);
		$this->add_control(
			'icon_font',
			[
				'label' => __( 'Icon', 'engitech' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title:', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Projects Done', 'engitech' ),
			]
		);

		$this->add_control(
			'number',
			[
				'label' => 'Number:',
				'type' => Controls_Manager::TEXT,
				'default' => __( '1990', 'engitech' ),
			]
		);

		$this->add_control(
			'extra',
			[
				'label' => __( 'After Number:', 'engitech' ),
				'type' => Controls_Manager::TEXT,
			]
		);		

		$this->add_control(
			'time',
			[
				'label' => __( 'Duration', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 1000,
						'max'  => 10000,
						'step' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 2000,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_box_section',
			[
				'label' => __( 'General', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_box',
			[
				'label' => __( 'Background Box', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-counter3' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => 'Padding Box',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-counter3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-counter3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Content', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		//Icon
		$this->add_control(
			'heading_icon',
			[
				'label' => __( 'Icon', 'engitech' ),
				'type' => Controls_Manager::HEADING,
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
					'{{WRAPPER}} .icon-main svg' => 'fill: {{VALUE}};'
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
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-main i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon-main svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
		
		//Number
		$this->add_control(
			'heading_number',
			[
				'label' => __( 'Number', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-counter3 span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .ot-counter3 span',
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
					'{{WRAPPER}} .ot-counter3 h6' => 'margin-top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-counter3 h6' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-counter3 h6:before' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-counter3 h6',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
	    	<div class="icounter ot-counter3">
	    		<div class="icon-main">
			        <?php if( $settings['icon_font'] != '' ) { Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] ); } ?>
		        </div>
	        	<div>
	        		<span class="num" data-to="<?php echo $settings['number']; ?>" data-time= "<?php echo $settings['time']['size']; ?>"></span>
	        		<span><?php echo $settings['extra']; ?></span>
	        		<?php if( $settings['title'] ) { ?><h6><?php echo $settings['title']; ?></h6><?php } ?>     				        
	        	</div>
		    </div>
	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Counter3() );