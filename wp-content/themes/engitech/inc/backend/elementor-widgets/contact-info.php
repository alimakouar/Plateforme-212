<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Contact Info
 */
class Engitech_Contact_Info extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'icontact_info';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Contact Info', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-info-box';
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
			'icon_type',
			[
				'label' => __( 'Icon Type', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'font',
				'options' => [
					'font' 	=> __( 'Font Icon', 'engitech' ),
					'image' => __( 'Image Icon', 'engitech' ),
					'class' => __( 'Custom Icon', 'engitech' ),
				]
			]
		);
		$this->add_control(
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
				'condition' => [
					'icon_type' => 'font',
				]
			]
		);
		$this->add_control(
	       'icon_image',
	        [
	           'label' => esc_html__( 'Photo', 'engitech' ),
	           'type'  => Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/images/analysis.png',
			  	],
			  	'condition' => [
					'icon_type' => 'image',
				]
		    ]
	    );
	    $this->add_control(
			'icon_class',
			[
				'label' => __( 'Custom Class', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'flaticon-world-globe', 'engitech' ),
				'condition' => [
					'icon_type' => 'class',
				]
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Our Address:', 'engitech' ),
			]
		);

		$this->add_control(
			'des',
			[
				'label' => 'Infomation',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '411 University St, Seattle, USA', 'engitech' ),
			]
		);	

		$this->add_control(
			'box_style',
			[
				'label' 	=> __( 'Box Style', 'engitech' ),
				'type'  	=> Controls_Manager::SELECT,
				'default' 	=> 's1',
				'options' 	=> [
					's1'  => __( 'Icon Left', 'engitech' ),
					's2'  => __( 'Icon Center', 'engitech' ),
				]
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

		//General
		$this->add_control(
			'heading_general',
			[
				'label' => __( 'General', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'box_style' => 's1',
				]
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding Box', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .contact-info.box-style1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'box_style' => 's1',
				]
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
					'{{WRAPPER}} .contact-info i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .contact-info svg' => 'fill: {{VALUE}};',
				],
				'condition' => [
					'icon_type!' => 'image',
				]
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
					'{{WRAPPER}} .contact-info i:before' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .contact-info img, {{WRAPPER}} .contact-info svg' => 'width: {{SIZE}}{{UNIT}};',
				]
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
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .contact-info .info-text' => 'padding-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .box-style2 .box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .box-style1 h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .box-style2 h6' => 'margin-top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .contact-info h6' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .contact-info h6',
			]
		);

		//Description
		$this->add_control(
			'heading_des',
			[
				'label' => __( 'Details', 'engitech' ),
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
					'{{WRAPPER}} .contact-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .contact-info p',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
			<?php if( $settings['box_style'] === 's2' ) {  ?>
				<div class="contact-info box-style2">
					<div class="box-icon">
						<?php if( $settings['icon_type'] == 'font' ) { Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] ); } ?>
			    		<?php if( $settings['icon_type'] == 'image' ) { ?><img src="<?php echo esc_attr( $settings['icon_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"><?php } ?>
		        		<?php if( $settings['icon_type'] == 'class' ) { ?><i class="<?php echo esc_attr( $settings['icon_class'] ); ?>"></i><?php } ?>
					</div>
		        	<p><?php echo $settings['des']; ?></p>
		        	<h6><?php echo $settings['title']; ?></h6>			        				        
			    </div>
		    <?php }else { ?>
		    	<div class="contact-info box-style1">
					<?php if( $settings['icon_type'] == 'font' ) { Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] ); } ?>
			    <?php if( $settings['icon_type'] == 'image' ) { ?><img src="<?php echo esc_attr( $settings['icon_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"><?php } ?>
		        <?php if( $settings['icon_type'] == 'class' ) { ?><i class="<?php echo esc_attr( $settings['icon_class'] ); ?>"></i><?php } ?>
			        <div class="info-text">
			        	<h6><?php echo $settings['title']; ?></h6>
			        	<p><?php echo $settings['des']; ?></p>
			        </div>
			    </div>
		    <?php } ?>
	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Contact_Info() );