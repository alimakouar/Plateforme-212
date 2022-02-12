<!-- #site-header-open -->
<header id="site-header" class="site-header <?php engitech_header_class(); ?>">

    <!-- #header-desktop-open -->
    <?php engitech_header_builder(); ?>
    <!-- #header-desktop-close -->

    <!-- #header-mobile-open -->
    <?php engitech_mobile_builder(); ?>
    <!-- #header-mobile-close -->

</header>
<!-- #site-header-close -->
<!-- #side-panel-open -->
<?php if( engitech_get_option('sidepanel_layout') ) { ?>
    <div id="side-panel" class="side-panel <?php if( engitech_get_option('panel_left') ) echo 'on-left'; ?>">
        <a href="#" class="side-panel-close"><i class="flaticon-close"></i></a>
        <div class="side-panel-block">
            <?php if ( did_action( 'elementor/loaded' ) ) engitech_sidepanel_builder(); ?>	
        </div>
    </div>
<?php } ?>
<!-- #side-panel-close -->