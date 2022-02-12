<?php

use Elementor\Controls_Stack;
use Elementor\Controls_Manager;
use Elementor\Element_Column;
use Elementor\Core\Base\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class OT_Element_Column extends Module {

	public function __construct() {

		$this->add_actions();
	}

	public function get_name() {
		return 'ot-content-align';
	}

	/**
	 * @param $element    Controls_Stack
	 * @param $section_id string
	 */
	public function register_controls( Controls_Stack $element, $section_id ) {
		if ( ! $element instanceof Element_Column ) {
			return;
		}
		$required_section_id = 'layout';

		if ( $required_section_id !== $section_id ) {
			return;
		}

		$element->add_responsive_control(
			'_ot_column_min_width',
			[
				'label'        => esc_html__( 'Min Width (px)', 'engitech' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'unit' => 'px',
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'device_args'     => [
					Controls_Stack::RESPONSIVE_DESKTOP => [
						'selectors' => [
							'{{WRAPPER}}' => 'min-width: {{SIZE}}{{UNIT}}',
						],
					],
					Controls_Stack::RESPONSIVE_TABLET => [
						'selectors' => [
							'{{WRAPPER}}' => 'min-width: {{SIZE}}{{UNIT}}',
						],
					],
					Controls_Stack::RESPONSIVE_MOBILE => [
						'selectors' => [
							'{{WRAPPER}}' => 'min-width: {{SIZE}}{{UNIT}}',
						],
					],
				],
				'separator' => 'before',
			]
		);

		$element->add_control(
			'_ot_content_align',
			[
				'label'        => esc_html__( 'Content Align', 'engitech' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'vertical'   => [
						'title' => esc_html__( 'Vertical', 'engitech' ),
						'icon'  => 'eicon-ellipsis-v',
					],
					'horizontal' => [
						'title' => esc_html__( 'Horizontal', 'engitech' ),
						'icon'  => 'eicon-ellipsis-h',
					],
				],
				'default'      => 'vertical',
				'prefix_class' => 'ot-flex-column-',
			]
		);

		$element->update_control(
			'content_position',
			['prefix_class' => 'ot-column-items-',]
		);
	}

	protected function add_actions() {
		add_action( 'elementor/element/before_section_end', [ $this, 'register_controls' ], 10, 2 );
	}
}

new OT_Element_Column();
