<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Image Slider
 */
class Engitech_Domain_Carousel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'idomaincarousel';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Domain List', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-slider-push';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Domains', 'engitech' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			[
				'label' => __( 'Name', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '.com', 'engitech' ),
			]
		);
		$repeater->add_control(
			'price',
			[
				'label' => __( 'Price', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '$10.99/m', 'engitech' ),
			]
		);
		$repeater->add_control(
			'dlink',
			[
				'label' => __( 'Link', 'engitech' ),
				'type' => Controls_Manager::URL,
				'default' => [],
			]
		);
		
		$this->add_control(
		    'domains',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{title}}}',
		    ]
		);

		$slides_show = range( 1, 10 );
		$slides_show = array_combine( $slides_show, $slides_show );

		$this->add_responsive_control(
			'slides_show',
			[
				'label' => __( 'Slides To Show', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Default', 'engitech' ),
				] + $slides_show,
				'default' => ''
			]
		);

		$this->add_responsive_control(
			'tscroll',
			[
				'label' => __( 'Slides to Scroll', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'engitech' ),
				] + $slides_show,
			]
		);
		$this->add_control(
			'dots',
			[
				'label'   => __( 'Dots', 'engitech' ),
				'type' 	  => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true'  => __( 'Yes', 'engitech' ),
					'false' => __( 'No', 'engitech' ),
				],
			]
		);

		$this->end_controls_section();

		//Style

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_general',
			[
				'label' => __( 'General', 'engitech' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-item' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bg_hcolor',
			[
				'label' => __( 'Background Hover', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-item:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .domain-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ibox_box_shadow',
				'selector' => '{{WRAPPER}} .domain-item',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'heading_name',
			[
				'label' => __( 'Name', 'engitech' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-item h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'name_hcolor',
			[
				'label' => __( 'Color Hover', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-item:hover h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .domain-item h4',
			]
		);
		$this->add_responsive_control(
			'name_space',
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
					'{{WRAPPER}} .domain-item h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_price',
			[
				'label' => __( 'Name', 'engitech' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-item span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'price_hcolor',
			[
				'label' => __( 'Color Hover', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-item:hover span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .domain-item span',
			]
		);

        $this->end_controls_section();  

        //Dots
		$this->start_controls_section(
			'dots_section',
			[
				'label' => __( 'Dots', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'dots_spacing',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 0,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'dots_size',
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
					'{{WRAPPER}} .slick-dots li button:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'dot_style',
			[
				'label' => __( 'Dot', 'engitech' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
            'dots_bgcolor',
            [
                'label' => __( 'Color', 'engitech' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
				],
            ]
        );

        $this->add_control(
            'dots_active_bgcolor',
            [
                'label' => __( 'Color Active', 'engitech' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .slick-dots li.slick-active button:before' => 'color: {{VALUE}};',
				],
            ]
        );

        $this->end_controls_section();      

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['domains'] ) ) {
			return;
		}

		$slides = [];

		foreach ( $settings['domains'] as $key => $domain ) {
            $link_tag = '';
            if ( ! empty( $domain['dlink']['url'] ) ) {
				$this->add_render_attribute( 'link' . $key, 'href', $domain['dlink']['url'] );

				if ( $domain['dlink']['is_external'] ) {
					$this->add_render_attribute( 'link' . $key, 'target', '_blank' );
				}

				if ( $domain['dlink']['nofollow'] ) {
					$this->add_render_attribute( 'link' . $key, 'rel', 'nofollow' );
				}
				$link_tag = '<a '.$this->get_render_attribute_string('link' . $key).'></a>';
			}
            
            $domain_html = '<h4>'.$domain['title'].'</h4><span>'.$domain['price'].'</span>';
			$slide_html  = '<div><div class="domain-item">' . $link_tag . $domain_html;

			$slide_html .= '</div></div>';
			$slides[] = $slide_html;
		}
		if ( empty( $slides ) ) {
			return;
		}
		?>
		
		<div class="domain-list" data-show="<?php echo esc_attr( $settings['slides_show'] ); ?>" data-show-tablet="<?php echo esc_attr( $settings['slides_show_tablet'] ); ?>" data-show-mobile="<?php echo esc_attr( $settings['slides_show_mobile'] ); ?>" data-scroll="<?php echo $settings['tscroll']; ?>" data-scroll-tablet="<?php echo $settings['tscroll_tablet']; ?>" data-scroll-mobile="<?php echo $settings['tscroll_mobile']; ?>" data-dots="<?php echo $settings['dots']; ?>">
		    <?php echo implode( '', $slides ); ?>
	    </div>
		<?php 
		
	}

	protected function content_template() {}

}
// After the Engitech_Image_Carousel class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Domain_Carousel() );