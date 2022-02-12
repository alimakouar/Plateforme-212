<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Team 2 
 */
class Engitech_Team2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'imember2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Team 2', 'engitech' );
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

		$this->add_control(
	       'member_image',
	        [
	            'label' => esc_html__( 'Photo', 'engitech' ),
	            'type'  => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				]
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
		    'member_name',
	      	[
	          	'label' => esc_html__( 'Name', 'engitech' ),
	          	'type'  => Controls_Manager::TEXT,
				'default' => esc_html__( 'Peter Perish', 'engitech' ),
	    	]
	    );

	    $this->add_control(
		    'member_extra',
	      	[
	          	'label' => esc_html__( 'Extra/Job', 'engitech' ),
	          	'type'  => Controls_Manager::TEXTAREA,
	          	'default' => esc_html__( 'Chiff Executive Officer', 'engitech' ),
	    	]
	    );
	    $this->add_control(
		    'member_desc',
	      	[
	          	'label' => esc_html__( 'Description', 'engitech' ),
	          	'type'  => Controls_Manager::TEXTAREA,
	          	'default' => '',
	    	]
	    );

		$repeater = new Repeater();
		$repeater->add_control(
	      	'title',
		    [
		        'label'   => esc_html__( 'Name', 'engitech' ),
		        'type'    => Controls_Manager::TEXT,
		        'default' => esc_html__( 'Social', 'engitech' ),
		    ]
	    );

        $repeater->add_control(
            'social_icon',
            [
                'label' => esc_html__( 'Icon', 'engitech' ),
                'type'  => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'fa-brand',
				],
            ]
        );

        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__( 'Link', 'engitech' ),
                'type'  => Controls_Manager::URL,
                'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://', 'engitech' ),
				'default' => [
					'url' => '#', 
				],
            ]
		);

		$this->add_control(
		    'social_share',
		    [
		        'label'       => esc_html__( 'Socials', 'engitech' ),
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => true,
		        'default'     => [
		            [
		             	'title'       => esc_html__( 'Facebook', 'engitech' ),
		                'social_link' => esc_html__( 'https://www.facebook.com/', 'engitech' ),
		                'social_icon' => [
							'value' => 'fab fa-facebook-f',
							'library' => 'fa-brand',
						],
		 
		            ],
		            [
		             	'title'       => esc_html__( 'Instagram', 'engitech' ),
		                'social_link' => esc_html__( 'https://www.instagram.com/', 'engitech' ),
		                'social_icon' => [
							'value' => 'fab fa-instagram',
							'library' => 'fa-brand',
						],
		 
		            ],
		            [
		             	'title'       => esc_html__( 'Linkedin', 'engitech' ),
		                'social_link' => esc_html__( 'https://www.linkedin.com/', 'engitech' ),
		                'social_icon' => [
							'value' => 'fab fa-linkedin-in',
							'library' => 'fa-brand',
						],

		            ]
		        ],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{title}}}',
		    ]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Link To Details', 'engitech' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://', 'engitech' ),
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
				'condition' => [
					'link[url]!'  => ''
				]
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
				'condition'	=> [
					'member_desc!' => ''
				]
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
				'condition'	=> [
					'member_desc!' => ''
				]
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
				'condition'	=> [
					'member_desc!' => ''
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'desc_typography',
					'label'    => esc_html__( 'Typography', 'engitech' ),
					'selector' => '{{WRAPPER}} .ot-team__info p',
					'condition'	=> [
						'member_desc!' => ''
					]
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
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$photo = Group_Control_Image_Size::get_attachment_image_html( $settings, 'member_image_size', 'member_image' );
		$tname = $settings['member_name'];

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'm_link', 'href', $settings['link']['url'] );
			$this->add_render_attribute( 'm_link', 'class', 'title-link' );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'm_link', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'm_link', 'rel', 'nofollow' );
			}
			$tname = '<a ' .$this->get_render_attribute_string( 'm_link' ). '>' .$tname. '</a>';
		}

		$this->add_render_attribute( 'team-box', 'class', 'ot-team' );
		?>

		<div <?php echo $this->get_render_attribute_string( 'team-box' ); ?>>
			<div class="ot-team__thumb">
				<?php if( $settings['member_image']['url'] ) { echo $photo; } ?>
			</div>
			<div class="ot-team__info">
				<?php if ( $settings['member_name'] ) { echo '<h5 class="tname">' .$tname. '</h5>'; } ?>
				<?php if ( $settings['member_extra'] ) { echo '<span>' .$settings['member_extra']. '</span>'; } ?>
				<?php if ( $settings['member_desc'] ) { echo '<p>' .$settings['member_desc']. '</p>'; } ?>
				<?php if ( ! empty( $settings['social_share'] ) ) : ?>
				<div class="team-social">
					<?php foreach ( $settings['social_share'] as $key => $social ) : ?>
						<?php 
							$link_key = 'link_' . $key;
							$this->add_render_attribute( $link_key, 'class', [
								strtolower($social['title']),
								'elementor-repeater-item-' . $social['_id'],
							] );
						?>
						<?php if ( ! empty( $social['social_link'] ) ) : ?>
							<a <?php echo $this->get_render_attribute_string( $link_key ); ?> <?php if($social['social_link']['is_external'])
							{ echo 'target="_blank"'; }else{ echo 'rel="nofollow"';}?> 
									href="<?php echo $social['social_link']['url'];?>"">
									<?php Icons_Manager::render_icon( $social['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</a>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	        
	    <?php
	}

	protected function content_template() {}
}
// After the Engitech_Team2 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Team2() );