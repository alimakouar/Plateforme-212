<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Contact Info
 */
class Engitech_Counter extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'icounter';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Counter', 'engitech' );
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
			'box_style',
			[
				'label' 	=> __( 'Style:', 'engitech' ),
				'type'  	=> Controls_Manager::SELECT,
				'default' 	=> 's1',
				'options' 	=> [
					's1'  => __( 'Number Top', 'engitech' ),
					's2'  => __( 'Number Bottom', 'engitech' ),
				]
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
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
			'style_content_section',
			[
				'label' => __( 'Style', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Icon
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
					'{{WRAPPER}} .ot-counter span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .ot-counter span',
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
					'{{WRAPPER}} .ot-counter h6' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-counter.s2 h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-counter h6' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-counter h6:before' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-counter h6',
			]
		);

		//Dot
		$this->add_control(
			'heading_dot',
			[
				'label' => __( 'Dot', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'dot_space',
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
					'{{WRAPPER}} .ot-counter h6, {{WRAPPER}} .ot-counter .num' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'dot_size',
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
					'{{WRAPPER}} .ot-counter h6:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; margin-top: {{SIZE}}{{UNIT}}/2;',
				],
			]
		);
		$this->add_control(
			'dot_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-counter h6:before' => 'background: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
			<?php if( $settings['box_style'] === 's2' ) {  ?>
				<div class="icounter ot-counter s2">
					<?php if( $settings['title'] ) { ?><h6><?php echo $settings['title']; ?></h6><?php } ?>
		        	<div>
		        		<span class="num" data-to="<?php echo $settings['number']; ?>" data-time= "<?php echo $settings['time']['size']; ?>"></span>
		        		<span><?php echo $settings['extra']; ?></span>
		        	</div>
			    </div>
		    <?php }else { ?>
		    	<div class="icounter ot-counter">
		        	<div>
		        		<span class="num" data-to="<?php echo $settings['number']; ?>" data-time= "<?php echo $settings['time']['size']; ?>"></span>
		        		<span><?php echo $settings['extra']; ?></span>
		        	</div>
		        	<?php if( $settings['title'] ) { ?><h6><?php echo $settings['title']; ?></h6><?php } ?>      				        
			    </div>
		    <?php } ?>
	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Counter() );