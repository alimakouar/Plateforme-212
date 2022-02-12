<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Team
 */
class Engitech_Team extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'imember';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Team', 'engitech' );
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
				'name' => 'img_thumbnail',
				'exclude' => [],
				'include' => [],
				'default' => 'full',
			]
		);

	    $this->add_control(
		    'member_name',
	      	[
	          'label' => esc_html__( 'Name', 'engitech' ),
	          'type'  => Controls_Manager::TEXT,
	          'default' => esc_html__( 'Jonathan Morgan', 'engitech' ),
	    	]
	    );

	    $this->add_control(
		    'member_extra',
	      	[
	          'label' => esc_html__( 'Extra/Job', 'engitech' ),
	          'type'  => Controls_Manager::TEXTAREA,
	          'default' => esc_html__( 'WEB Designer', 'engitech' ),
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
					'url' => 'https://', 
				],
            ]
        );

        $repeater->add_control(
			'social_bg',
			[
				'label'     => esc_html__( 'Background', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .bg-social' => 'background: {{VALUE}};',
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
		             	'title'       => esc_html__( 'Twitter', 'engitech' ),
		                'social_link' => esc_html__( 'https://www.twitter.com/', 'engitech' ),
		                'social_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brand',
						],
		 
		            ],
		            [
		             	'title'       => esc_html__( 'Facebook', 'engitech' ),
		                'social_link' => esc_html__( 'https://www.facebook.com/', 'engitech' ),
		                'social_icon' => [
							'value' => 'fab fa-facebook-f',
							'library' => 'fa-brand',
						],
		 
		            ],
		            [
		             	'title'       => esc_html__( 'Pinterest', 'engitech' ),
		                'social_link' => esc_html__( 'https://www.pinterest.com/', 'engitech' ),
		                'social_icon' => [
							'value' => 'fab fa-pinterest-p',
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
			'content_style',
			[
				'label' => esc_html__( 'Infomation', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'info_bg',
			[
				'label'     => esc_html__( 'Background', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'info_hover_bg',
			[
				'label'     => esc_html__( 'Background Hover', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'info_padding',
			[
				'label' => esc_html__( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => esc_html__( 'Spacing', 'engitech' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-info h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .team-wrap .team-info h4, {{WRAPPER}} .team-wrap .team-info h4 a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typography',
					'label'    => esc_html__( 'Typography', 'engitech' ),
					'selector' => '{{WRAPPER}} .team-wrap .team-info h4',
				]
		);

		//Extra
		$this->add_control(
			'heading_job',
			[
				'label' => __( 'Extra/Job', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'job_color',
			[
				'label'     => esc_html__( 'Color', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-info > span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'label'    => esc_html__( 'Typography', 'engitech' ),
					'selector' => '{{WRAPPER}} .team-wrap .team-info > span',
				]
		);

		$this->end_controls_section();

		//Socials
		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Socials', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bg_share',
			[
				'label'     => esc_html__( 'Background', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-social div' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Font Size', 'engitech' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 40,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-social a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
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
					'{{WRAPPER}} .team-wrap .team-social a' => 'margin: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Color', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-social a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'engitech' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-social a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'm_link', 'href', $settings['link']['url'] );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'm_link', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'm_link', 'rel', 'nofollow' );
			}
		}

		?>

		<div class="team-wrap">
			<?php if( $settings['member_image']['url'] ) { ?>
			<div class="team-thumb">
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'img_thumbnail', 'member_image' );?>
				<?php if ( ! empty( $settings['social_share'] ) ) : ?>
                    <div class="team-social flex-middle">
                    	<div>
                        <?php foreach ( $settings['social_share'] as $social ) : ?>
                            <?php if ( ! empty( $social['social_link'] ) ) : ?>
                                <a <?php if($social['social_link']['is_external'])
                                { echo 'target="_blank"'; }else{ echo 'rel="nofollow"';}?> 
                                        href="<?php echo $social['social_link']['url'];?>" class="<?php echo strtolower($social['title']);?>">
                                     <i class="<?php echo esc_attr( $social['social_icon']['value']); ?>"></i>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    	</div>
                    </div>  
                <?php endif; ?>
			</div>
			<?php } ?>
			<div class="team-info">
				<h4><?php if ( ! empty( $settings['link']['url'] ) ) echo '<a ' .$this->get_render_attribute_string( 'm_link' ). '>' . $settings['member_name'] . '</a>'; else echo $settings['member_name']; ?></h4>
				<span><?php echo $settings['member_extra']; ?></span>
			</div>
		</div>
	        
	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Team() );