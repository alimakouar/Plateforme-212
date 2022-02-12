<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Menu
 */
class Engitech_Menu extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'imenu';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Nav Menu', 'engitech' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-nav-menu';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_engitech_header' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Menu', 'engitech' ),
			]
		);

		$menus = $this->get_available_menus();
		$this->add_control(
			'nav_menu',
			[
				'label' => esc_html__( 'Select Menu', 'engitech' ),
				'type' => Controls_Manager::SELECT,
				'multiple' => false,
				'options' => $menus,
				'default' => array_keys( $menus )[0],
				'save_default' => true,

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
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/*** Style ***/
		//menu parents
		$this->start_controls_section(
			'style_menu_section',
			[
				'label' => __( 'Menu Parents', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'space_item',
			[
				'label' => __( 'Spacing Items', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li' => 'margin: 0 {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .main-navigation > ul > li:last-child' => 'margin-right: 0;',
					'{{WRAPPER}} .main-navigation > ul > li:first-child' => 'margin-left: 0;',
				],
			]
		);
		$this->add_responsive_control(
			'padding_item',
			[
				'label' => __( 'Padding Top/Bottom', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li > a' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li > a, {{WRAPPER}} .main-navigation > ul > li.menu-item-has-children > a:after' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'text_hover_color',
			[
				'label' => __( 'Text Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li:hover > a, {{WRAPPER}} .main-navigation > ul > li > a.mPS2id-highlight, {{WRAPPER}} .main-navigation > ul > li.menu-item-has-children:hover > a:after' => 'color: {{VALUE}};',
					'{{WRAPPER}} .main-navigation > ul > li:before, {{WRAPPER}} .main-navigation > ul > li > a.mPS2id-highlight:before' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_typography',
				'selector' => '{{WRAPPER}} .main-navigation > ul',
			]
		);
		$this->add_control(
			'under_line',
			[
				'label' => __( 'Under Line', 'engitech' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'engitech' ),
				'label_off' => __( 'Hide', 'engitech' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		//menu child
		$this->start_controls_section(
			'style_smenu_section',
			[
				'label' => __( 'Dropdown Menus', 'engitech' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'smenu_width',
			[
				'label' => __( 'Width', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 250,
						'max' => 700,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-navigation ul li ul' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'smenu_radius',
			[
				'label' => __( 'Border Radius', 'engitech' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .main-navigation ul ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'smenu_shadow',
				'selector' => '{{WRAPPER}} .main-navigation ul ul',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'bg_s_color',
			[
				'label' => __( 'Background Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation ul ul, {{WRAPPER}} .main-navigation ul ul:after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_title',
			[
				'label' => __( 'Menu Items', 'engitech' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'text_s_color',
			[
				'label' => __( 'Text Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation ul ul a, {{WRAPPER}} .main-navigation ul ul > li.menu-item-has-children > a:after' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'text_s_hover_color',
			[
				'label' => __( 'Text Hover Color', 'engitech' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation ul ul a:hover, {{WRAPPER}} .main-navigation:not(.no-line) ul li li a:before, {{WRAPPER}} .main-navigation ul ul li.current-menu-item > a, {{WRAPPER}} .main-navigation ul ul > li.menu-item-has-children > a:hover:after' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'smenu_typography',
				'selector' => '{{WRAPPER}} .main-navigation ul ul a',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'is_line',
			[
				'label' => __( 'Hover With Line', 'engitech' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'engitech' ),
				'label_off' => __( 'Hide', 'engitech' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	protected function get_available_menus(){
		$menus = wp_get_nav_menus();
		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
    }


   	protected function render() {
		$settings = $this->get_settings_for_display();
		$active_mmenu = in_array('ot_mega-menu/ot_mega-menu.php', apply_filters('active_plugins', get_option('active_plugins')));
	?>
			<nav id="site-navigation" class="main-navigation <?php if( $settings['is_line'] != 'yes' ) echo 'no-line'; if( $settings['under_line'] != 'yes' ) echo ' no-under-line'; ?>">			
				<?php
					wp_nav_menu( array(
						'menu' 			 => $settings['nav_menu'],
						'menu_id'        => 'primary-menu',
						'container'      => 'ul',
						'theme_location' => '__no_such_location',
    					'fallback_cb'    => '__return_empty_string', 
    					'walker'         => $active_mmenu ? new \Ot_Mega_Menu_Walker() : '',
					) );
				?>
			</nav>
	    <?php
	}

	protected function content_template() {}
}
// After the Engitech_Menu class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Engitech_Menu() );