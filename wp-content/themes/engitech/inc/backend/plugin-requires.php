<?php
/**
 * Register required, recommended plugins for theme
 *
 * @link http://tgmpluginactivation.com/configuration/
 *
 * @package Engitech
 */
require_once get_template_directory() . '/inc/libs/class-tgm-plugin-activation.php';
function engitech_register_required_plugins() {
	$protocol = is_ssl() ? 'https' : 'http';
	$plugins = array(
		array(
			'name'               => esc_html__( 'Meta Box', 'engitech' ),
			'slug'               => 'meta-box',
			'required'           => true,
		),
		array(
			'name'               => esc_html__( 'Kirki', 'engitech' ),
			'slug'               => 'kirki',
			'required'           => true,
		),
		array(
			'name'               => esc_html__( 'Elementor Page Builder', 'engitech' ),
			'slug'               => 'elementor',
			'required'           => true,
		),
		array(
            'name'               => esc_html__( 'Contact Form 7', 'engitech' ),
            'slug'               => 'contact-form-7',
            'required'           => false,
        ),
        array(
            'name'               => esc_html__( 'MailChimp for WordPress', 'engitech' ),
            'slug'               => 'mailchimp-for-wp',
            'required'           => false,
        ),
        array(
            'name'               => esc_html__( 'OT Portfolio', 'engitech' ), // The plugin name.
            'slug'               => 'ot_portfolio', // The plugin slug (typically the folder name).
            'source'             => esc_url($protocol.'://oceanthemes.s3.amazonaws.com/plugins/ot_portfolio.zip'), // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => esc_html__( 'Revolution Slider', 'engitech' ), // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => esc_url($protocol.'://oceanthemes.s3.amazonaws.com/plugins/revslider.zip'),// The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '6.5.12', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
        ),
        array(            
            'name'               => esc_html__( 'OT One Click Demo Content', 'engitech' ), // The plugin name.
            'slug'               => 'soo-demo-importer', // The plugin slug (typically the folder name).
            'source'             => esc_url($protocol.'://oceanthemes.s3.amazonaws.com/plugins/soo-demo-importer.zip'), // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
	);
	$config  = array(
		'domain'       => 'engitech',
		'default_path' => '',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'engitech' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'engitech' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'engitech' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'engitech' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'engitech' ),
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'engitech' ),
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'engitech' ),
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'engitech' ),
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'engitech' ),
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'engitech' ),
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'engitech' ),
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'engitech' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'engitech' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'engitech' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'engitech' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'engitech' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'engitech' ),
			'nag_type'                        => 'updated',
		),
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'engitech_register_required_plugins' );
