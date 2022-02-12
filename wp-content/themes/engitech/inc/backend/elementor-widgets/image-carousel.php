<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Image Slider
 */
class Engitech_Image_Carousel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iimagecarousel';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Client Logos', 'engitech' );
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
				'label' => __( 'Logo Images', 'engitech' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			[
				'label' => __( 'Name', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'engitech' ),
			]
		);
		$repeater->add_control(
			'image_partner',
			[
				'label' => __( 'Image', 'engitech' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'image_link',
			[
				'label' => __( 'Link', 'engitech' ),
				'type' => Controls_Manager::URL,
				'default' => [],
			]
		);
		$this->add_control(
		    'image_carousel',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{title}}}',
		    ]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image_partner_size', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => ['1536x1536', '2048x2048'],
				'include' => [],
				'default' => 'full',
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
			'image_style_section',
			[
				'label' => __( 'Image', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'img_spacing',
			[
				'label' => __( 'Image Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .img-item img' => 'margin: 0 {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .client-logos' => 'margin: 0 -{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'img_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => __( 'Normal', 'engitech' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => __( 'Opacity', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .img-item img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'img_css_filters',
				'selector' => '{{WRAPPER}} .img-item img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'img_hover_effects',
			[
				'label' => __( 'Hover', 'engitech' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label' => __( 'Opacity', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .img-item img:hover' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'img_css_filters_hover',
				'selector' => '{{WRAPPER}} .img-item img:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		//Dots
		$this->start_controls_section(
			'dots_section',
			[
				'label' => __( 'Dots', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'dots' => 'true',
				],
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

		if ( empty( $settings['image_carousel'] ) ) {
			return;
		}

		$slides = [];

		foreach ( $settings['image_carousel'] as $key => $attachment ) {
			$title = $attachment['title'];
            $image_url = Group_Control_Image_Size::get_attachment_image_src( $attachment['image_partner']['id'], 'image_partner_size', $settings );
            $image_html = '<img src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( $title ) . '">';
            $link_tag = '';
            if ( ! empty( $attachment['image_link']['url'] ) ) {
				$this->add_render_attribute( 'link' . $key, 'href', $attachment['image_link']['url'] );

				if ( $attachment['image_link']['is_external'] ) {
					$this->add_render_attribute( 'link' . $key, 'target', '_blank' );
				}

				if ( $attachment['image_link']['nofollow'] ) {
					$this->add_render_attribute( 'link' . $key, 'rel', 'nofollow' );
				}
				$link_tag = '<a '.$this->get_render_attribute_string('link' . $key).'>';
			}
            
			$slide_html = '<div><div class="img-item">' . $link_tag . '<figure>' . $image_html . '</figure>';

			if( $link_tag ){
				$slide_html .= '</a>';
			}
			$slide_html .= '</div></div>';
			if( $image_url ){
				$slides[] = $slide_html;
			}
		}
		if ( empty( $slides ) ) {
			return;
		}
		?>
		
		<div class="client-logos" data-show="<?php echo esc_attr( $settings['slides_show'] ); ?>" data-show-tablet="<?php echo esc_attr( $settings['slides_show_tablet'] ); ?>" data-show-mobile="<?php echo esc_attr( $settings['slides_show_mobile'] ); ?>" data-scroll="<?php echo $settings['tscroll']; ?>" data-scroll-tablet="<?php echo $settings['tscroll_tablet']; ?>" data-scroll-mobile="<?php echo $settings['tscroll_mobile']; ?>" data-gaps="<?php echo esc_attr( $settings['img_spacing']['size'] ); ?>" data-gaps-tablet="<?php echo esc_attr( $settings['img_spacing_tablet']['size'] ); ?>" data-gaps-mobile="<?php echo $settings['img_spacing_mobile']['size']; ?>" data-dots="<?php echo $settings['dots']; ?>">
		    <?php echo implode( '', $slides ); ?>
	    </div>
		<?php 
		
	}

	protected function content_template() {}

}
// After the Engitech_Image_Carousel class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Image_Carousel() );