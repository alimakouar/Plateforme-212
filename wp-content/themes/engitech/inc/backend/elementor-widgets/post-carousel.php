<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: News Slider
 */
class Engitech_Post_Carousel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipost_carousel';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Post Carousel', 'engitech' );
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
        $this->add_control(
			'detail_btn',
			[
				'label' => 'Button',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '<i class="flaticon-right-arrow-1"></i>LEARN MORE', 'engitech' ),
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
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'General', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'info_padd',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .post-box .inner-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'info_border',
			[
				'label' => __( 'Border Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-box .inner-post' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		//Content Style
		$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Content', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE
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

		$this->end_controls_section();

		// Dots.
		$this->start_controls_section(
			'style_dots',
			[
				'label' => __( 'Dots', 'engitech' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
		?>

		<div class="post-carousel pgrid" data-show="<?php echo $settings['tshow']; ?>" data-scroll="<?php echo $settings['scroll']; ?>" data-dots="<?php echo $settings['tdots']; ?>" data-arrow="<?php echo $settings['tarrow']; ?>">
        <?php
        	$number_show = (!empty($settings['number_show']) ? $settings['number_show'] : 9);
        	$exc = (!empty($settings['exc']) ? $settings['exc'] : 15);

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
									<?php the_post_thumbnail('engitech-slider-post-thumbnail'); ?>
								</a>
							</div>					       
					    <?php } ?>
					    <div class="inner-post">
							<div class="entry-header">

								<?php if ( 'post' === get_post_type() ) : if( engitech_get_option( 'post_entry_meta' ) ) { ?>
								<div class="entry-meta">
									<?php engitech_post_meta(); ?>
								</div><!-- .entry-meta -->
								<?php } endif; ?>

								<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

							</div><!-- .entry-header -->
							
							<div class="btn-readmore">
								<?php if( $settings['detail_btn'] ){ ?><a href="<?php the_permalink(); ?>"><?php echo $settings['detail_btn']; ?></a><?php } ?>
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
}
// After the Engitech_Post_Carousel class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Post_Carousel() );