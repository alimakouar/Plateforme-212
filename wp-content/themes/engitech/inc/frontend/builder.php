<?php
/** header desktop **/
if ( ! function_exists( 'engitech_header_builder' ) ) {
    function engitech_header_builder (){
        $header_builder = '';    

        if ( is_page() ) {
            if ( function_exists('rwmb_meta') ) {
                global $wp_query;
                $metabox_fb = rwmb_meta( 'select_header', 'field_type=select_advanced', $wp_query->get_queried_object_id() ); 
                if ($metabox_fb != '') {
                    $header_builder = $metabox_fb;
                }else{
                    $header_builder = engitech_get_option('header_select');
                }
            } 
        }else{
            $header_builder = engitech_get_option('header_select');
        }

        if( !$header_builder ) {
            get_template_part('inc/frontend/header/header-default');
        }else{
            echo '<div class="header-desktop">';
            if ( did_action( 'elementor/loaded' ) ) { 
                if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && is_plugin_active( 'wpml-string-translation/plugin.php' ) ) {
                    $translated_header_builder = apply_filters( 'wpml_object_id', $header_builder );
                    echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $translated_header_builder );
                }else{
                    echo \Elementor\Plugin::$instance->frontend->get_builder_content( $header_builder );
                }
            } 
            echo '</div>';
        }
    }
}

/** header mobile **/
if ( ! function_exists( 'engitech_mobile_builder' ) ) {
    function engitech_mobile_builder (){
        
        if ( is_page() ) {
            if ( function_exists('rwmb_meta') ) {
                global $wp_query;
                $metabox_hmb = rwmb_meta( 'select_header_mobile', 'field_type=select_advanced', $wp_query->get_queried_object_id() ); 
                if ($metabox_hmb != '') {
                    $mobile_builder = $metabox_hmb;
                }else{
                    $mobile_builder = engitech_get_option('header_mobile');
                }
            } 
        }else{
            $mobile_builder = engitech_get_option('header_mobile');
        }

        if( !$mobile_builder ) {
            get_template_part('inc/frontend/header/header-mobile');
        }else{
            echo '<div class="header-mobile">';
            if ( did_action( 'elementor/loaded' ) ) {  
                if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && is_plugin_active( 'wpml-string-translation/plugin.php' ) ) {
                    $translated_mheader_builder = apply_filters( 'wpml_object_id', $mobile_builder );
                    echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $translated_mheader_builder );
                } else {
                    echo \Elementor\Plugin::$instance->frontend->get_builder_content( $mobile_builder ); 
                }
            }
            echo '</div>';
        }
    }
}

/** side panel **/
if ( ! function_exists( 'engitech_sidepanel_builder' ) ) {
    function engitech_sidepanel_builder (){

        $panel_builder = engitech_get_option('sidepanel_layout');

        if( !$panel_builder ) {
            return;
        }else{
            if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && is_plugin_active( 'wpml-string-translation/plugin.php' ) ) {
                $translated_panel_builder = apply_filters( 'wpml_object_id', $panel_builder );
                echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $translated_panel_builder );
            } else {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content( $panel_builder ); 
            }
        }
    }
}

/** 404 template **/
if ( ! function_exists( 'engitech_404_builder' ) ) {
    function engitech_404_builder (){

        $error_builder = engitech_get_option('page_404');

        if( !$error_builder ) { ?>
            <div class="container">
                <div class="error-404 not-found text-center">
                    <h2><img class="error-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/404-error.png" alt="404"></h2>
                    <h1><?php wp_kses( _e( 'Sorry! Page Not Found!', 'engitech' ), wp_kses_allowed_html('post')  ); ?></h1>
                    <div class="content-404">
                        <p><?php wp_kses( _e( 'Oops! The page which you are looking for does not exist. Please return to the homepage.', 'engitech' ), wp_kses_allowed_html('post')  ); ?></p>
                        <?php get_search_form(); ?>
                        <a class="octf-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Take Me Home', 'engitech' ); ?></a>
                    </div>
                </div>
            </div>
        <?php }else{
            if ( did_action( 'elementor/loaded' ) ) {  
                if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && is_plugin_active( 'wpml-string-translation/plugin.php' ) ) {
                    $translated_error_builder = apply_filters( 'wpml_object_id', $error_builder );
                    echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $translated_error_builder );
                } else {
                    echo \Elementor\Plugin::$instance->frontend->get_builder_content( $error_builder );
                }
            }
        }
    }
}

/** footer **/
if ( ! function_exists( 'engitech_footer_builder' ) ) {
    function engitech_footer_builder (){
        $footer_builder = '';    

        if ( is_page() ) {
            if ( function_exists('rwmb_meta') ) {
                global $wp_query;
                $metabox_fb = rwmb_meta( 'select_footer', 'field_type=select_advanced', $wp_query->get_queried_object_id() ); 
                if ($metabox_fb != '') {
                    $footer_builder = $metabox_fb;
                }else{
                    $footer_builder = engitech_get_option('footer_layout');
                }
            } 
        }else{
            $footer_builder = engitech_get_option('footer_layout');
        }

        if( !$footer_builder ) {
            return;
        }else{
            echo '<footer id="site-footer" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">';
            if ( did_action( 'elementor/loaded' ) ) {
                if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && is_plugin_active( 'wpml-string-translation/plugin.php' ) ) {
                    $translated_footer_builder = apply_filters( 'wpml_object_id', $footer_builder );
                    echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $translated_footer_builder );
                } else {
                    echo \Elementor\Plugin::$instance->frontend->get_builder_content( $footer_builder );
                }
            }
            echo '</footer>';
        }
    }
}