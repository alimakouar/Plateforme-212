<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Icon Box 1
 */
class Engitech_IconBox extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iiconbox1';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Icon Box 1', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-icon-box';
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
				'label' => __( 'Icon Box', 'engitech' ),
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
					]
				],
				// 'prefix_class' => 'engitech%s-align-',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
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
				'default' => __( 'flaticon-report', 'engitech' ),
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
				'default' => __( 'Content Marketing', 'engitech' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'des',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'You can provide the answers that your potential customers are trying to find, so you can become the industry.', 'engitech' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'engitech' ),
			]
		);

		$this->end_controls_section();

		//Style
		
		$this->start_controls_section(
			'style_icon_section',
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
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-main i, {{WRAPPER}} .icon-main span:before' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon-main img, {{WRAPPER}} .icon-main svg' => 'width: {{SIZE}}{{UNIT}};'
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
					'{{WRAPPER}} .icon-main' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .icon-main i, {{WRAPPER}} .icon-main span' => 'color: {{VALUE}};',
					'{{WRAPPER}} .icon-main svg' => 'fill: {{VALUE}};',
				],
				'condition' => [
					'icon_type' => ['font','class']
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'engitech' ),
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
					'{{WRAPPER}} .icon-box-s1 h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .icon-box-s1 h5' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .icon-box-s1 h5',
			]
		);

		//Line
		$this->add_control(
			'heading_line',
			[
				'label' => __( 'Line', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'line_space',
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
					'{{WRAPPER}} .icon-box-s1 .line-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'line_hheight',
			[
				'label' => __( 'Height', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box-s1 .line-box' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-s1 .line-box' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'line_hover_color',
			[
				'label' => __( 'Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-s1 .line-box:after' => 'background: {{VALUE}};',
				]
			]
		);

		//Description
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
					'{{WRAPPER}} .icon-box-s1 p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .icon-box-s1 p',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$title = $settings['title'];
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'iconbox', 'href', $settings['link']['url'] );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'iconbox', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'iconbox', 'rel', 'nofollow' );
			}
			
			$title = '<a '. $this->get_render_attribute_string( 'iconbox' ).'>'. $settings['title'] . '</a>';
			
		}

		?>
		<div class="icon-box-s1">
			<div class="icon-main">
		        <?php if( $settings['icon_type'] == 'font' ) { Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] ); } ?>
			    <?php if( $settings['icon_type'] == 'image' ) { ?><img src="<?php echo esc_attr( $settings['icon_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"><?php } ?>
		        <?php if( $settings['icon_type'] == 'class' ) { ?><span class="<?php echo esc_attr( $settings['icon_class'] ); ?>"></span><?php } ?>
	        </div>
	        <h5><?php echo $title; ?></h5>
	        <div class="line-box"></div>
	        <p><?php echo $settings['des']; ?></p>
	    </div>
	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_IconBox() );