<div class="header_mobile">
	<div class="container">
		<div class="mlogo_wrapper clearfix">
	        <div class="mobile_logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo engitech_get_option('logo_mobile') ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</a>
	    	</div>
	        <div id="mmenu_toggle">
		        <button></button>
		    </div>
		    <?php if ( engitech_get_option('header_cta_switch') && engitech_get_option('cta_mobile') ){ ?>
			<div class="octf-header-module">
				<div class="btn-cta-group btn-cta-header">
					<a class="octf-btn octf-btn-third" href="<?php echo esc_url_raw( engitech_get_option('cta_link_header') ); ?>"><?php echo engitech_get_option('cta_text_header'); ?></a>
				</div>
			</div>
			<?php } ?>
	    </div>
	    <div class="mmenu_wrapper">		
			<div class="mobile_nav collapse">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'mobile_mainmenu',
						'container'      => '',
					) );
				?>
			</div>   	
	    </div>
    </div>
</div>