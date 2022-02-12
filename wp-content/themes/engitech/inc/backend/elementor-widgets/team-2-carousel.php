<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Team Carousel 
 */
class Engitech_Team_Carousel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'imembercarousel';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Team Carousel', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-person';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		/**TAB_CONTENT**/
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Member Team', 'engitech' ),
			]
		);

		$repeater = new Repeater();


		$repeater->add_control(
	       'member_image',
	        [
	            'label' => esc_html__( 'Photo', 'engitech' ),
	            'type'  => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				]
		    ]
		);

	    $repeater->add_control(
		    'member_name',
	      	[
	          	'label' => esc_html__( 'Name', 'engitech' ),
	          	'type'  => Controls_Manager::TEXT,
				'default' => esc_html__( 'Peter Perish', 'engitech' ),
	    	]
	    );

	    $repeater->add_control(
		    'member_extra',
	      	[
	          	'label' => esc_html__( 'Extra/Job', 'engitech' ),
	          	'type'  => Controls_Manager::TEXTAREA,
	          	'default' => esc_html__( 'Chiff Executive Officer', 'engitech' ),
	    	]
	    );
	    $repeater->add_control(
		    'member_desc',
	      	[
	          	'label' => esc_html__( 'Description', 'engitech' ),
	          	'type'  => Controls_Manager::TEXTAREA,
	          	'default' => '',
	    	]
	    );
	    $repeater->add_control(
			'link',
			[
				'label' => __( 'Link To Details', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://', 'engitech' ),
			]
		);

		$repeater->add_control(
			'socials',
			[
				'label' => __( 'Socials', 'engitech' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'engitech' ),
				'label_off' => __( 'Hide', 'engitech' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before',
			]
		);

        $repeater->add_control(
		    'social1',
	      	[
	          	'label' => esc_html__( 'Icon Social 1', 'engitech' ),
                'type'  => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'fa-brand',
				],
				'condition' => [
					'socials' => 'yes',
				],
	    	]
	    );
	    $repeater->add_control(
			'social1_link',
			[
				'label' => __( 'Link Social 1', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://twitter.com/', 'engitech' ),
				'condition' => [
					'socials' => 'yes',
				],
			]
		);
		$repeater->add_control(
		    'social2',
	      	[
	          	'label' => esc_html__( 'Icon Social 2', 'engitech' ),
                'type'  => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brand',
				],
				'separator' => 'before',
				'condition' => [
					'socials' => 'yes',
				],
	    	]
	    );
	    $repeater->add_control(
			'social2_link',
			[
				'label' => __( 'Link Social 2', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://facebook.com/', 'engitech' ),
				'condition' => [
					'socials' => 'yes',
				],
			]
		);

		$repeater->add_control(
		    'social3',
	      	[
	          	'label' => esc_html__( 'Icon Social 3', 'engitech' ),
                'type'  => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fab fa-pinterest-p',
					'library' => 'fa-brand',
				],
				'separator' => 'before',
				'condition' => [
					'socials' => 'yes',
				],
	    	]
	    );
	    $repeater->add_control(
			'social3_link',
			[
				'label' => __( 'Link Social 3', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://pinterest.com/', 'engitech' ),
				'condition' => [
					'socials' => 'yes',
				],
			]
		);

		$this->add_control(
		    'members',
		    [
		        'label'       => esc_html__( 'Teams', 'engitech' ),
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => true,
		        'default'     => [],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{member_name}}}',
		    ]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'member_image_size',
				'exclude' => ['1536x1536', '2048x2048'],
				'include' => [],
				'default' => 'full',
			]
		);

		$this->add_control(
			'heading_slider',
			[
				'label' => __( 'Slider', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'tshow',
			[
				'label' => __( 'Slides to Show', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => __( '1', 'engitech' ),
					'2' => __( '2', 'engitech' ),
					'3' => __( '3', 'engitech' ),
					'4' => __( '4', 'engitech' ),
					'5' => __( '5', 'engitech' ),
				]
			]
		);
		$this->add_control(
			'tscroll',
			[
				'label' => __( 'Slides to Scroll', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __( '1', 'engitech' ),
					'2' => __( '2', 'engitech' ),
					'3' => __( '3', 'engitech' ),
					'4' => __( '4', 'engitech' ),
					'5' => __( '5', 'engitech' ),
				]
			]
		);
		$this->add_control(
			'tarrow',
			[
				'label' => __( 'Nav Slider', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => __( 'Yes', 'engitech' ),
					'false' => __( 'No', 'engitech' ),
				]
			]
		);
		$this->add_control(
			'tarrow_position',
			[
				'label' => __( 'Nav Position', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'mid',
				'options' => [
					'mid' => __( 'Middle', 'engitech' ),
					'top' => __( 'Top', 'engitech' ),
				],
				'condition' => [
					'tarrow' => 'true',
				]
			]
		);
		$this->add_control(
			'tdots',
			[
				'label' => __( 'Dots Slider', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => __( 'Yes', 'engitech' ),
					'false' => __( 'No', 'engitech' ),
				]
			]
		);

		$this->end_controls_section();

		/**TAB_STYLE**/

		$this->start_controls_section(
			'photo_style',
			[
				'label' => esc_html__( 'Photo', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'photo_size',
			[
				'label' => __( 'Width', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-team__thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'photo_space',
			[
				'label' => esc_html__( 'Spacing', 'engitech' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-team__thumb' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'radius_photo',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-team__thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'team_box_shadow',
				'label' => __( 'Box Shadow', 'engitech' ),
				'selector' => '{{WRAPPER}} .ot-team:hover .ot-team__thumb',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'info_style',
			[
				'label' => esc_html__( 'Info Box', 'engitech' ),
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
					]
				],
				'selectors' => [
					'{{WRAPPER}} .ot-team' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		/* title */
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
				'label' => esc_html__( 'Spacing', 'engitech' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-team__info h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ot-team__info h5, {{WRAPPER}} .ot-team__info h5 a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label'     => esc_html__( 'Color Hover', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ot-team__info h5 a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Typography', 'engitech' ),
				'selector' => '{{WRAPPER}} .ot-team__info h5',
			]
		);

		/* extra */
		$this->add_control(
			'heading_job',
			[
				'label' => __( 'Job', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'job_space',
			[
				'label' => esc_html__( 'Spacing', 'engitech' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-team__info span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'job_color',
			[
				'label'     => esc_html__( 'Color', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ot-team__info span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'label'    => esc_html__( 'Typography', 'engitech' ),
					'selector' => '{{WRAPPER}} .ot-team__info span',
				]
		);

		/* description */
		$this->add_control(
			'heading_desc',
			[
				'label' => __( 'Description', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'desc_space',
			[
				'label' => esc_html__( 'Spacing', 'engitech' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-team__info p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label'     => esc_html__( 'Color', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ot-team__info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'desc_typography',
					'label'    => esc_html__( 'Typography', 'engitech' ),
					'selector' => '{{WRAPPER}} .ot-team__info p',
				]
		);

		$this->end_controls_section();

		/* socials */
		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Socials', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_social_space',
			[
				'label' => esc_html__( 'Spacing', 'engitech' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-social a' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .team-social a:last-child' => 'margin-right: 0;',
				],
			]
		);
		$this->add_responsive_control(
			'icon_social_size',
			[
				'label' => esc_html__( 'Size', 'engitech' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 30,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-social a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_social_color',
			[
				'label'     => esc_html__( 'Color', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-social a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .team-social a svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_hover_color',
			[
				'label'     => esc_html__( 'Color Hover', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-social a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .team-social a:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Dots.
		$this->start_controls_section(
			'style_dots',
			[
				'label' => __( 'Dots', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'tdots' => 'true',
				]
			]
		);
		$this->add_responsive_control(
			'spacing_dots',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%' => [
						'min' => -100,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'dots_hcolor',
			[
				'label' => __( 'Color Active', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-dots li.slick-active button:before' => 'color: {{VALUE}};',
				]
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
		$this->add_responsive_control(
			'nav_align',
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
				'selectors' => [
					'{{WRAPPER}} .custom-nav-top' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'tarrow_position' => 'top'
				]
			]
		);
		$this->add_control(
			'spacing_nav',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%' => [
						'min' => -100,
						'max' => 200,
					],
				],
				'selectors' => [					
					'{{WRAPPER}} .prev-nav' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .next-nav' => 'right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .custom-nav-top' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-nav' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .ot-nav:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_bgcolor',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-nav' => 'background: {{VALUE}};',
				],
				'condition' => [
					'tarrow_position' => 'top'
				]
			]
		);
		$this->add_control(
			'arrow_hbgcolor',
			[
				'label' => __( 'Background Hover', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-nav:hover' => 'background: {{VALUE}};',
				],
				'condition' => [
					'tarrow_position' => 'top'
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<?php if( $settings['tarrow'] == 'true' && $settings['tarrow_position'] =='top' ){ ?>
	    <div class="custom-nav-top">
			<button type="button" class="ot-nav ot-prev"><i class="flaticon-back"></i></button>
			<button type="button" class="ot-nav ot-next"><i class="flaticon-right-arrow-1"></i></button>
		</div>
		<?php } ?>

		<div class="ot-team-slider" data-show="<?php echo $settings['tshow']; ?>" data-scroll="<?php echo $settings['tscroll']; ?>" data-dots="<?php echo $settings['tdots']; ?>" data-arrow="<?php echo $settings['tarrow']; ?>" data-arrow-pos="<?php echo $settings['tarrow_position']; ?>">

			<?php foreach ( $settings['members'] as $key => $mem ) : 
			$image_url = Group_Control_Image_Size::get_attachment_image_src( $mem['member_image']['id'], 'member_image_size', $settings );
            $image_html = '<img src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( $mem['member_name'] ) . '">';
			$tname = $mem['member_name'];

			if ( ! empty( $mem['link']['url'] ) ) {
				$this->add_link_attributes( 'm_link' . $key, $mem['link'] );
				$this->add_render_attribute( 'm_link' . $key, 'class', 'title-link' );
				$tname = '<a ' .$this->get_render_attribute_string( 'm_link' . $key ). '>' .$tname. '</a>';
			}

			?>
			<div>
				<div class="ot-team">
					<?php if( $image_url ) { ?>
					<div class="ot-team__thumb">
						<?php echo $image_html; ?>
					</div>
					<?php } ?>
					<div class="ot-team__info">
						<?php if ( ! empty($mem['member_name'] ) ) { echo '<h5 class="tname">' .$tname. '</h5>'; } ?>
						<?php if ( ! empty($mem['member_extra'] ) ) { echo '<span>' .$mem['member_extra']. '</span>'; } ?>
						<?php if ( ! empty($mem['member_desc'] ) ) { echo '<p>' .$mem['member_desc']. '</p>'; } ?>

						<?php if ( ! empty( $mem['socials'] ) ) : ?>
						<div class="team-social">
							<?php if ( ! empty( $mem['social1']['value'] ) ) {
								$icon_tag = sprintf( '<i class="%1$s"></i>', $mem['social1']['value'] );
								$this->add_link_attributes( 'm_social1' . $key , $mem['social1_link'] );
								$social_tag = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string('m_social1' . $key), $icon_tag );
								echo $social_tag;
							} ?>
	                       	<?php if ( ! empty( $mem['social2']['value'] ) ) {
								$icon_tag = sprintf( '<i class="%1$s"></i>', $mem['social2']['value'] );
								$this->add_link_attributes( 'm_social2' . $key , $mem['social2_link'] );
								$social_tag = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string('m_social2' . $key), $icon_tag );
								echo $social_tag;
							} ?>
							<?php if ( ! empty( $mem['social3']['value'] ) ) {
								$icon_tag = sprintf( '<i class="%1$s"></i>', $mem['social3']['value'] );
								$this->add_link_attributes( 'm_social3' . $key , $mem['social3_link'] );
								$social_tag = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string('m_social3' . $key), $icon_tag );
								echo $social_tag;
							} ?>
						</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	        
	    <?php
	}

	protected function content_template() {}
}
// After the Engitech_Team_Carousel class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Team_Carousel() );