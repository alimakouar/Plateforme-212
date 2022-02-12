<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: News Slider
 */
class Engitech_Post_Carousel2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipost_carousel2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Post Carousel 2', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-posts-carousel';
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
				'label' => __( 'Post Carousel', 'engitech' ),
			]
		);

		$this->add_control(
			'post_cat',
			[
				'label' => __( 'Select Categories', 'engitech' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_cate_post(),
				'multiple' => true,
				'label_block' => true,
				'placeholder' => __( 'All Categories', 'engitech' ),
			]
		);

		$this->add_control(
			'number_show',
			[
				'label' => __( 'Show Number Posts', 'engitech' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '9',
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'post_thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => ['1536x1536', '2048x2048'],
				'include' => [],
				'default' => 'full',
			]
		);
		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'detail_btn',
			[
				'label' =>  __( 'Label', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'engitech' ),
			]
		);
		$this->add_control(
			'btn_icon',
			[
				'label' => __( 'Icon', 'onum' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'fa4compatibility' => 'icon',
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
				'default' => '3',
				'options' => [
					'2' => __( '2', 'engitech' ),
					'3' => __( '3', 'engitech' ),
					'4' => __( '4', 'engitech' ),
				]
			]
		);
		$this->add_control(
			'scroll',
			[
				'label' => __( 'Slides to Scroll', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __( '1', 'engitech' ),
					'2' => __( '2', 'engitech' ),
					'3' => __( '3', 'engitech' ),
					'4' => __( '4', 'engitech' ),
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

		/*Style*/

		//Content Style
		$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Content', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'heading_image',
			[
				'label' => __( 'Image', 'engitech' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_responsive_control(
			'img_spacing',
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
					'{{WRAPPER}} .post-box .entry-media' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'img_radius',
			[
				'label' => esc_html__( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-box .entry-media img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'heading_cat',
			[
				'label' => __( 'Category', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-box .post-cat a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'cat_bgcolor',
			[
				'label' => __( 'Background', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-box .post-cat a' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bg_typography',
				'selector' => '{{WRAPPER}} .post-box .post-cat a',
			]
		);

		$this->add_control(
			'heading_meta',
			[
				'label' => __( 'Entry Meta', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'meta_spacing',
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
					'{{WRAPPER}} .post-box .entry-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .entry-meta a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .entry-meta.divider > span:not(:last-child):after' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'selector' => '{{WRAPPER}} .post-box .entry-meta',
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_spacing',
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
					'{{WRAPPER}} .post-box .inner-post h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .entry-title a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .post-box .inner-post h3',
			]
		);

		$this->end_controls_section();

		//Button
		$this->start_controls_section(
			'btn_section',
			[
				'label' => __( 'Button', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'detail_btn[value]!' => '',
				]
			]
		);
		$this->add_control(
			'btn_readmore_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-readmore a' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'btn_readmore_color_hover',
			[
				'label' => __( 'Color Hover', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-readmore a:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_readmore_typography',
				'selector' => '{{WRAPPER}} .btn-readmore a'
			]
		);

		$this->add_control(
			'heading_btn_icon',
			[
				'label' => __( 'Icon', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'btn_icon_spacing',
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
					'{{WRAPPER}} .btn-readmore > a svg' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .btn-readmore > a i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_icon_size',
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
					'{{WRAPPER}} .btn-readmore > a svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .btn-readmore > a i:before' => 'font-size: {{SIZE}}{{UNIT}};',
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
		// echo"<pre>";print_r($settings);
		?>

		<div class="post-carousel post-carousel-2 pgrid" data-show="<?php echo $settings['tshow']; ?>" data-scroll="<?php echo $settings['scroll']; ?>" data-dots="<?php echo $settings['tdots']; ?>" data-arrow="<?php echo $settings['tarrow']; ?>">
        <?php
        	$number_show = (!empty($settings['number_show']) ? $settings['number_show'] : 9);
        	$exc = (!empty($settings['exc']) ? $settings['exc'] : 15);

        	if ( empty( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
				/*add old default*/
				$settings['icon'] = 'flaticon-right-arrow-1';
			}

			if ( ! empty( $settings['icon'] ) ) {
				$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
				$this->add_render_attribute( 'icon', 'aria-hidden', 'true' );
			}
        	$migrated = isset( $settings['__fa4_migrated']['btn_icon'] );
			$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();

        	if( $settings['post_cat'] ){
                $args = array(
		            'post_type' => 'post',
		            'post_status' => 'publish',
		            'posts_per_page' => $number_show,
		            'tax_query' => array(
				        array(
				            'taxonomy' => 'category',
				            'field'    => 'slug',
				            'terms'    => $settings['post_cat']
				        ),
				    ),
		        );
            }else{
                $args = array(
                    'post_type' => 'post',
		            'post_status' => 'publish',
		            'posts_per_page' => $number_show,
                );
            }

	        $blogpost = new \WP_Query($args);
	        if($blogpost->have_posts()) : while($blogpost->have_posts()) : $blogpost->the_post(); ?> 

				<article class="post-box blog-item">
					<div class="post-inner">
					    <?php if ( has_post_thumbnail() ) { ?>
					        <div class="entry-media">
								<?php engitech_posted_in(); ?>
								<a href="<?php the_permalink(); ?>">
									<?php $this->render_post_thumbnail(); ?>
								</a>
							</div>					       
					    <?php } ?>
					    <div class="inner-post">
							<div class="entry-header">

								<?php if ( 'post' === get_post_type() ) : if( engitech_get_option( 'post_entry_meta' ) ) { ?>
								<div class="entry-meta divider">
									<?php engitech_post_meta2(); ?>
								</div><!-- .entry-meta -->
								<?php } endif; ?>

								<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

							</div><!-- .entry-header -->
							
							<div class="btn-readmore">
								<?php if( $settings['detail_btn'] ){ ?>
									<a href="<?php the_permalink(); ?>">
										<?php echo $settings['detail_btn']; ?>
										<?php if ( $is_new || $migrated ) :					
											Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] );					
											else : ?>
											<i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>
										<?php endif; ?>
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</article>

	        <?php endwhile; wp_reset_postdata(); endif; ?>
	    </div>
		<?php
	}

	protected function content_template() {}

	protected function select_param_cate_post() {
		$args = array( 'orderby=name&order=ASC&hide_empty=0' );
		$terms = get_terms( 'category', $args );
		$cat = array();
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){		    
		    foreach ( $terms as $term ) {
		        $cat[$term->slug] = $term->name;
		    }
		}
	  	return $cat;
	}
	protected function render_post_thumbnail() {
		$settings = $this->get_settings();
		$settings['post_thumbnail'] = [
			'id' => get_post_thumbnail_id(),
		];
		$thumbnail_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'post_thumbnail' );
		echo $thumbnail_html;
	}
}
// After the Engitech_Post_Carousel2 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Post_Carousel2() );