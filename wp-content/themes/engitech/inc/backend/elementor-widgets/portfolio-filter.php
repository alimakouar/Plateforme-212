<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Portfolio Filter
 */
class Engitech_PortfolioFilter extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipfilter';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Portfolio Filter', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {

		//Content
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'engitech' ),
			]
		);
		$this->add_control(
			'project_cat',
			[
				'label' => __( 'Select Categories', 'engitech' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_cate_project(),
				'multiple' => true,
				'label_block' => true,
				'placeholder' => __( 'All Categories', 'engitech' ),
			]
		);
		$this->add_control(
			'filter',
			[
				'label' => __( 'Show Filter', 'engitech' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'engitech' ),
				'label_off' => __( 'Hide', 'engitech' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'all_text',
			[
				'label' => __( 'All Text', 'engitech' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'All',
				'condition' => [
					'filter' => 'yes',
				],
			]
		);
		$this->add_control(
			'column',
			[
				'label' => __( 'Columns', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2'  	=> __( '2 Column', 'engitech' ),
					'3' 	=> __( '3 Column', 'engitech' ),
					'4' 	=> __( '4 Column', 'engitech' ),
					'5' 	=> __( '5 Column', 'engitech' ),
				],
			]
		);		
		$this->add_responsive_control(
			'w_gaps',
			[
				'label' => __( 'Gap Width', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .project-item' => 'padding: calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .projects-grid' => 'margin: calc(-{{SIZE}}{{UNIT}}/2);',
				],
			]
		);
		$this->add_control(
			'project_num',
			[
				'label' => __( 'Show Number Projects', 'engitech' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '9',
			]
		);		
		$this->add_control(
			'layout',
			[
				'label' => __( 'Portfolio Style', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1'  	=> __( 'Grid', 'engitech' ),
					'style-2' 	=> __( 'Masonry', 'engitech' ),
				],
			]
		);
		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'filter_style_section',
			[
				'label' => __( 'Filter', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'filter' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'filter_align',
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
					'{{WRAPPER}} .project_filters' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'filter_spacing',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .project_filters' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'filter_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .project_filters li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project_filters li a:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'filter_hcolor',
			[
				'label' => __( 'Text Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .project_filters li a:hover, {{WRAPPER}} .project_filters li a.selected' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project_filters li a:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filter_typography',
				'selector' => '{{WRAPPER}} .project_filters li a',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'overlay_style_section',
			[
				'label' => __( 'Overlay Box', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'overlay_align',
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
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info .portfolio-info-inner' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'overlay_width',
			[
				'label' => __( 'Width 100%', 'onum' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'onum' ),
				'label_off' => __( 'No', 'onum' ),
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'layout' => 'style-2',
				]
			]
		);
		$this->add_responsive_control(
			'overlay_pos',
			[
				'label' => __( 'Position Bottom', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info' => 'bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .projects-box ' => 'border-bottom-width: calc(0px - {{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'layout' => 'style-2',
				]
			]
		);
		$this->add_responsive_control(
			'overlay_pos_hover',
			[
				'label' => __( 'Position Bottom Hover', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .projects-box:hover .portfolio-info' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'style-2',
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'overlay_background',
				'label' => __( 'Background', 'engitech' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .projects-box .portfolio-info',
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
					'{{WRAPPER}} .projects-box .portfolio-info h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .projects-box .portfolio-info h5 a' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .projects-box .portfolio-info h5 a',
			]
		);

		//Category
		$this->add_control(
			'heading_overlay',
			[
				'label' => __( 'Category', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_cat',
			[
				'label' => __( 'Show Category', 'engitech' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'engitech' ),
				'label_off' => __( 'Hide', 'engitech' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info .portfolio-cates a, {{WRAPPER}} .projects-box .portfolio-info .portfolio-cates span' => 'color: {{VALUE}};',
				],
				'condition' => [
					'show_cat' => 'yes',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .projects-box .portfolio-info .portfolio-cates a, {{WRAPPER}} .projects-box .portfolio-info .portfolio-cates span',
				'condition' => [
					'show_cat' => 'yes',
				]
			]
		);
		$this->end_controls_section();		

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="project-filter-wrapper">
	        <?php if( 'yes' === $settings['filter'] ) { ?>
        		<ul class="project_filters">
        			<?php if( $settings['all_text'] ) { ?>
        			 	<li><a href="#" data-filter="*" class="selected"><?php echo esc_html( $settings['all_text'] ); ?></a></li>
        			<?php } ?>
	                <?php
	                if( $settings['project_cat'] ){
	                    $categories = $settings['project_cat'];
	                    foreach( (array)$categories as $categorie){
	                        $cates = get_term_by('slug', $categorie, 'portfolio_cat');
	                        $cat_name = $cates->name;
	                        $cat_id   = 'category-' . $cates->term_id;

	                ?>
	                	<li><a href='#' data-filter='.<?php echo esc_attr( $cat_id ); ?>'><?php echo esc_html( $cat_name ); ?></a></li>	                   
	                <?php } }else{
	                    $categories = get_terms('portfolio_cat');
	                    foreach( (array)$categories as $categorie){
	                        $cat_name = $categorie->name;
		                    $cat_id   = 'category-' . $categorie->term_id;
	                    ?>
	                    <li><a href='#' data-filter='.<?php echo esc_attr( $cat_id ); ?>'><?php echo esc_html( $cat_name ); ?></a></li>	                    
	                <?php } } ?>
				</ul>
	        <?php } ?>

	        <div class="projects-grid projects-<?php echo $settings['layout']; if( $settings['column'] == '5' ){ echo ' pf_5_cols'; }elseif( $settings['column'] == '4' ){ echo ' pf_4_cols'; }elseif( $settings['column'] == '2' ){ echo ' pf_2_cols'; }else{ echo ''; } ?>">
	        	
	            <?php
	            if( $settings['project_cat'] ){
	                $args = array(	                    
	                    'post_type' => 'ot_portfolio',
	                    'post_status' => 'publish',
	                    'posts_per_page' => $settings['project_num'],
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'portfolio_cat',
	                            'field' => 'slug',
	                            'terms' => $settings['project_cat'],
	                        ),
	                    ),              
	                );
	            }else{
	                $args = array(
	                    'post_type' => 'ot_portfolio',
	                    'post_status' => 'publish',
	                    'posts_per_page' => $settings['project_num'],
	                );
	            }
	            $wp_query = new \WP_Query($args);
	            while ($wp_query -> have_posts()) : $wp_query -> the_post();
	                $cates 	   = get_the_terms(get_the_ID(),'portfolio_cat');
	                $cate_id   = '';
	                foreach((array)$cates as $cate){
	                    if($cates){
	                        $cate_id   .= 'category-' . $cate->term_id . ' ';
	                    }
	                }
	            ?>

	            	<div class="project-item <?php echo esc_attr( $cate_id ); ?>">
						<div class="projects-box">
							<div class="projects-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ) {
											if( $settings['layout'] == 'style-2' ){
												the_post_thumbnail( 'engitech-portfolio-thumbnail-masonry');
											}else {
												the_post_thumbnail( 'engitech-portfolio-thumbnail-grid');
											}			
										}
									?>
								</a>
							</div>
							<div class="portfolio-info <?php if( 'yes' === $settings['overlay_width'] ) echo 'full-width'; ?>">
								<?php if( $settings['layout'] == 'style-1' ) echo '<a class="overlay" href="'.get_the_permalink().'"></a>'; ?>
								<div class="portfolio-info-inner">
									<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
									<?php 
										if( 'yes' === $settings['show_cat'] ) {
											$terms = get_the_terms( get_the_ID(), 'portfolio_cat' );	
											if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) :
												echo '<p class="portfolio-cates">';	 
											    foreach ( $terms as $term ) {
											    	// The $term is an object, so we don't need to specify the $taxonomy.
									    			$term_link = get_term_link( $term );
									    			// If there was an error, continue to the next term.
												    if ( is_wp_error( $term_link ) ) {
												        continue;
												    }
											        // We successfully got a link. Print it out.
									    			echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a><span>/</span>';
											    }		                         
											    
												echo '</p>';    
											endif; 
										}
									?> 
								</div>
							</div>
						</div>
					</div>

	            <?php endwhile; wp_reset_postdata(); ?>
	        </div>
	    </div>

	    <?php
	}

	protected function content_template() {}

	protected function select_param_cate_project() {
	  	$category = get_terms( 'portfolio_cat' );
	  	$cat = array();
	  	foreach( $category as $item ) {
	     	if( $item ) {
	        	$cat[$item->slug] = $item->name;
	     	}
	  	}
	  	return $cat;
	}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_PortfolioFilter() );