<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Image Slider 2
 */
class Engitech_Image_Carousel2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iimagecarousel2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Client Logos 2', 'engitech' );
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
		    'list_images',
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

		$num_column = range( 2, 6 );
		$num_column = array_combine( $num_column, $num_column );
		$this->add_responsive_control(
			'num_column',
			[
				'label' => __( 'Columns', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Default (4)', 'engitech' ),
				] + $num_column,
				'default' => ''
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
			'img_height',
			[
				'label' => __( 'Min Height', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .partner-item' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label'     => esc_html__( 'Border', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .partner-item' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .partner-item img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'img_css_filters',
				'selector' => '{{WRAPPER}} .partner-item img',
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
					'{{WRAPPER}} .partner-item:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'img_css_filters_hover',
				'selector' => '{{WRAPPER}} .partner-item:hover img',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['list_images'] ) ) {
			return;
		}
		$col = !empty( $settings['num_column'] ) ? $settings['num_column'] : 4;
		$list_logos = [];

			foreach ( $settings['list_images'] as $key => $item ) {
				
				$title = $item['title'];
	            $image_url = Group_Control_Image_Size::get_attachment_image_src( $item['image_partner']['id'], 'image_partner_size', $settings );
	            $image_html = '<img src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( $title ) . '">';
	            $link_tag = '';
	            $sub_class = '';
	            if ( ! empty( $item['image_link']['url'] ) ) {
					$this->add_link_attributes( 'link' . $key, $item['image_link'] );
					$link_tag = '<a '.$this->get_render_attribute_string('link' . $key).'>';
				}

				if( $key % $col === 0 ) { 
					$sub_class = ' first-col';
				}
	            
				$logo_grid = '<div class="partner-item flex-middle' . $sub_class . '">' . $link_tag . '<figure>' . $image_html . '</figure>';

				if( $link_tag ){
					$logo_grid .= '</a>';
				}
				$logo_grid .= '</div>';

				if( !empty( $image_url ) ){
					$list_logos[] = $logo_grid;
				}
			}
			if ( empty( $list_logos ) ) {
				return;
			}
		?>
		
		<div class="partner-grid logo-grid col-<?php echo esc_attr($col); ?>">
            <?php echo implode( '', $list_logos ); ?>
        </div>

		<?php 
		
	}

	protected function content_template() {}

}
// After the Engitech_Image_Carousel2 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Image_Carousel2() );