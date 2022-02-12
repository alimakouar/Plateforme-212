<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Testimonial Slider
 */
class Engitech_Testimonials3 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itestimonials3';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Testimonial Slider 3', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_testimonials',
			[
				'label' => __( 'Testimonials', 'engitech' ),
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'tcontent',
			[
				'label' => __( 'Content', 'engitech' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => '10',
				'default' => '"I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment."',
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => __( 'Name', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Emilia Clarke',
			]
		);

		$repeater->add_control(
			'tjob',
			[
				'label' => __( 'Job/Address', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Developer',
			]
		);

		$this->add_control(
		    'testi_slider',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [
		            [
		            	'tstar'  => [
							'url' => get_template_directory_uri().'/images/5star.png',
						],
		             	'tcontent' => __( '"I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment."', 'engitech' ),
		                'timage'  => [
							'url' => '',
						],
						'tname'	  => 'Emilia Clarke',
						'tjob'	  => 'Developer'
		 
		            ],
		            [
		            	'tstar'  => [
							'url' => get_template_directory_uri().'/images/5star.png',
						],
		             	'tcontent' => __( '"I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment."', 'engitech' ),
		                'timage'  => [
							'url' => '',
						],
						'tname'	  => 'Emilia Clarke',
						'tjob'	  => 'Developer'
		 
		            ],
		            
		        ],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{title}}}',
		    ]
		);
		$this->add_control(
			'tarrow',
			[
				'label' => __( 'Nav Slider', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => __( 'Yes', 'engitech' ),
					'false' => __( 'No', 'engitech' ),
				]
			]
		);
		$this->add_control(
			'pagi',
			[
				'label' => __( 'Paging Slider', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'engitech' ),
					'no'  => __( 'No', 'engitech' ),
				]
			]
		);

		$this->end_controls_section();

		// Styling.
		$this->start_controls_section(
			'style_tcontent',
			[
				'label' => __( 'Content', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);		$this->add_control(
		'tcontent_bg',
			[
				'label' => __( 'Border Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-testimonials-3 .ttext:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tcontent_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-testimonials-3 .ttext' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ot-testimonials-3 .ttext',
			]
		);

		$this->end_controls_section();

		// Name.
		$this->start_controls_section(
			'style_tname',
			[
				'label' => __( 'Name', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-testimonials-3 h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .ot-testimonials-3 h6',
			]
		);

		$this->add_control(
			'spacing_name',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-testimonials-3 h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Job/Address.
		$this->start_controls_section(
			'style_tjob',
			[
				'label' => __( 'Job/Address', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'job_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .t-head span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'selector' => '{{WRAPPER}} .t-head span',
			]
		);		

		$this->end_controls_section();

		// Paging.
		$this->start_controls_section(
			'style_dots',
			[
				'label' => __( 'Paging', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'spacing_pagi',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pagingInfo' => 'marin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'pagi_bgcolor',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pagingInfo' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'pagi_active_bgcolor',
			[
				'label' => __( 'Color Active', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pagingInfo span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pagi_typography',
				'selector' => '{{WRAPPER}} .pagingInfo',
			]
		);	

		$this->end_controls_section();

		// Arrow.
		$this->start_controls_section(
			'style_nav',
			[
				'label' => __( 'Arrow', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'tarrow' => 'true',
				]
			]
		);		
		$this->add_control(
			'spacing_nav',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [					
					'{{WRAPPER}} .slick-arrow' => 'bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-arrow' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_hcolor',
			[
				'label' => __( 'Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-arrow:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="ot-testimonials-3">						
			<div class="testimonial-inner ot-testimonials-slider-3" data-arrow="<?php echo $settings['tarrow']; ?>">
				<?php if ( ! empty( $settings['testi_slider'] ) ) : foreach ( $settings['testi_slider'] as $testi ) : ?>
				<div>
					<div class="testi-item">
						<div class="ttext">
				        	<?php echo $testi['tcontent']; ?>
				        </div>
						<div class="t-head">
							<?php if($testi['timage']['url']) { ?>
				        		<img src="<?php echo $testi['timage']['url']; ?>" alt="<?php echo $testi['tname']; ?>">
				        	<?php } ?>
				        	<div class="tinfo">
				        		<h6><?php echo $testi['title']; ?></h6>
				        		<?php if($testi['tjob']) { ?><span><?php echo $testi['tjob']; ?></span><?php } ?>
				        	</div>
			        	</div>
				        
		        	</div>
				</div>
				<?php endforeach; endif; ?>
			</div>
			<?php if( $settings['pagi'] == 'yes' ) { ?>
				<div class="pagingInfo"></div>
			<?php } ?>
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Testimonials3() );