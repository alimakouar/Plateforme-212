<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Portfolio Filter
 */
class Engitech_SocialShare extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'otsocialshare';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Engitech Social Share', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-share';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'engitech' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'social_share',
			[
				'label' => __( 'Social Share Buttons', 'engitech' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'facebook'  => __( 'Facebook', 'engitech' ),					
					'twitter' => __( 'Twitter', 'engitech' ),
					'google'  => __( 'Google Plus', 'engitech' ),					
					'pinterest' => __( 'Pinterest', 'engitech' ),
					'linkedin'  => __( 'Linkedin', 'engitech' ),					
					'buffer' => __( 'Buffer', 'engitech' ),
					'digg'  => __( 'Digg', 'engitech' ),					
					'reddit' => __( 'Reddit', 'engitech' ),
					'tumbleupon'  => __( 'Tumbleupon', 'engitech' ),					
					'tumblr' => __( 'Tumblr', 'engitech' ),
					'vk' => __( 'Vk', 'engitech' ),
					'email' => __( 'Email', 'engitech' ),
					'print' => __( 'Print', 'engitech' ),
				],
				'default' => [ 'facebook', 'twitter', 'pinterest', 'linkedin' ],
			]
		);

		$this->add_control(
			'social_shape',
			[
				'label' => __( 'Shape', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'rounded'  => __( 'Rounded', 'engitech' ),
					'square' => __( 'Square', 'engitech' ),
					'circle' => __( 'Circle', 'engitech' ),
				],
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'engitech' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
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
					'{{WRAPPER}} .otf-social-share' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
				'toggle' => true,
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'select_color',
			[
				'label' => __( 'Color', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default_color',
				'options' => [
					'default_color'  => __( 'Official Color', 'engitech' ),
					'custom_color' => __( 'Custom', 'engitech' ),
				],
			]
		);
		$this->add_control(
			'social_bgcolor',
			[
				'label' => __( 'Primary Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .otf-social-share a' => 'background-color: {{VALUE}};'
				],
				'condition' => [
					'select_color' => 'custom_color',
				]
			]
		);
		$this->add_control(
			'social_color',
			[
				'label' => __( 'Secondary Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .otf-social-share a' => 'color: {{VALUE}};'
				],
				'condition' => [
					'select_color' => 'custom_color',
				]
			]
		);
		$this->add_responsive_control(
			'social_size',
			[
				'label' => __( 'Size', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .otf-social-share a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'social_padding',
			[
				'label' => __( 'Padding', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .otf-social-share a' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'social_space',
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
					'{{WRAPPER}} .otf-social-share a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'social_border_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .otf-social-share a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();		
		
		global $post;
	    // Get current page URL 
	    $postURL = urlencode(get_permalink());

	    // Get current page title
	    $postTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');        
	    
	    // Get Post Thumbnail for pinterest
	    $postThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	    // Get current page excerpt
	    $postExcerpt = wp_strip_all_tags( get_the_excerpt(), true );

	    // Get site name
	    $site_title = get_bloginfo( 'name' );

	    // Construct sharing URL without using any script
	    $twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL.'&amp;via='.$site_title;
	    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postURL.'&amp;title='.$postTitle;
	    $googleURL = 'https://plus.google.com/share?url='.$postURL;
	    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
	    $bufferURL = 'https://bufferapp.com/add?url='.$postURL.'&amp;text='.$postTitle;
	    $diggURL = 'https://www.digg.com/submit?url='.$postURL;
	    $redditURL = 'https://reddit.com/submit?url='.$postURL.'&amp;title='.$postTitle;
	    $stumbleuponURL = 'https://www.stumbleupon.com/submit?url='.$postURL.'&amp;title='.$postTitle;
	    $tumblrURL = 'https://www.tumblr.com/share/link?url='.$postURL.'&amp;title='.$postTitle;
	    $vkURL = 'https://vk.com/share.php?url='.$postURL;
	    $yummlyURL = 'https://www.yummly.com/urb/verify?url='.$postURL.'&amp;title='.$postTitle;
	    $mailURL = 'mailto:?Subject='.$postTitle.'&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 '.$postURL;

	    $whatsappURL = 'whatsapp://send?text='.$postTitle . ' ' . $postURL;

	    // Based on popular demand added Pinterest too
	    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$postURL.'&amp;media='.$postThumbnail[0].'&amp;description='.$postTitle;
		
		$variable = '';
	    $variable .= '<div class="otf-social-share clearfix shape-' . $settings['social_shape'] . '">';
	    foreach ( $settings['social_share'] as $item ) {
			if ($item == 'facebook') {
				$variable .= '<a class="share-facebook" href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
			}
			if ($item == 'twitter') {
				$variable .= '<a class="share-twitter" href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
			}
			if ($item == 'google') {
				$variable .= '<a class="share-google" href="'.$googleURL.'" target="_blank"><i class="fab fa-google-plus-g"></i></a>';  
			}
			if ($item == 'pinterest') {
				$variable .= '<a class="share-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><i class="fab fa-pinterest-p"></i></a>';
			}
			if ($item == 'linkedin') {
				$variable .= '<a class="share-linkedin" href="'.$linkedInURL.'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
			}
			if ($item == 'buffer') {
				$variable .= '<a class="share-buffer" href="'.$bufferURL.'" target="_blank"><i class="fab fa-buffer"></i></a>';
			}
			if ($item == 'digg') {
		    	$variable .= '<a class="share-digg" href="'.$diggURL.'" target="_blank"><i class="fab fa-digg"></i></a>';
		    }
			if ($item == 'reddit') {
		    	$variable .= '<a class="share-reddit" href="'.$redditURL.'" target="_blank"><i class="fab fa-reddit"></i></a>'; 
		    }
			if ($item == 'tumbleupon') {
		    	$variable .= '<a class="share-tumbleupon" href="'.$stumbleuponURL.'" target="_blank"><i class="fab fa-stumbleupon"></i></a>'; 
		    }
			if ($item == 'tumblr') {   
		    	$variable .= '<a class="share-tumblr" href="'.$tumblrURL.'" target="_blank"><i class="fab fa-tumblr"></i></a>'; 
		    }
			if ($item == 'vk') {    	        
		    	$variable .= '<a class="share-vk" href="'.$vkURL.'" target="_blank"><i class="fab fa-vk"></i></a>';   
		    }			
			if ($item == 'email') {
		    	$variable .= '<a class="share-email" href="'.$mailURL.'"><i class="fa fa-envelope"></i></a>';
		    }
			if ($item == 'print') {
			    $variable .= '<a class="share-print" href="javascript:;" onclick="window.print()"><i class="fa fa-print"></i></a>';
			}
		}
	    $variable .= '</div>';  

	    echo $variable;

	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_SocialShare() );