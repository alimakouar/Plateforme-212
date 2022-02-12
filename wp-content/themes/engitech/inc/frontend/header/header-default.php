<?php if ( engitech_get_option('topbar_switch') != false ) { ?>
	<!-- Top bar start -->
	<div class="header-topbar <?php if ( engitech_get_option('topbar_mobile') != false ) echo 'mobile-topbar'; if ( engitech_get_option('topbar_layout') == 'style2' ) echo ' style-2'; ?>">
		<div class="octf-area-wrap">
			<div class="<?php engitech_header_width_class(); ?>">	
                <?php if ( engitech_get_option('info_switch') != false ){ ?>
		            <!-- contact info -->
		            <ul class="topbar-info clearfix">
		                <?php $contact_infos = engitech_get_option( 'header_contact_info', array() ); ?>
		                <?php foreach ( $contact_infos as $contact_info ) { ?>
		                    <li>
		                        <?php if($contact_info['info_icon'] != ''){ ?><i class="<?php echo esc_attr($contact_info['info_icon']); ?>"></i><?php } ?>
		                        <?php echo wp_specialchars_decode($contact_info['info_content']); ?>
		                    </li>
		                <?php } ?>
		            </ul>
		            <!-- contact info close -->
				<?php } ?>	
				<?php if ( engitech_get_option('social_switch') != false ){ ?>
                    <!-- social icons -->
                    <ul class="social-list">
                        <?php $socials = engitech_get_option( 'header_socials', array() ); ?>
                        <?php foreach ( $socials as $social ) { ?>
                            <li><a href="<?php echo esc_url($social['social_link']); ?>" target="<?php echo esc_attr( engitech_get_option( 'social_target_link' ) ); ?>" ><i class="<?php echo esc_attr($social['social_icon']); ?>"></i></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- social icons close -->
				<?php }if ( engitech_get_option('extra_topbar') != '' && engitech_get_option( 'header_layout' ) == 'header2' ){ ?>
					<div class="extra-text">
						<?php echo wp_specialchars_decode( engitech_get_option('extra_topbar') ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- Top bar close -->
<?php } ?>

<!-- Main header start -->
<div class="octf-main-header">
	<div class="octf-area-wrap">
		<div class="<?php engitech_header_width_class(); ?> octf-mainbar-container">
			<div class="octf-mainbar">
				<div class="octf-mainbar-row octf-row">
					<div class="octf-col logo-col">
						<div id="site-logo" class="site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img <?php if ( engitech_get_option('logo_scroll') != '' ) { ?>class="logo-static"<?php } ?> src="<?php echo engitech_get_option('logo') ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								<?php if ( engitech_get_option('logo_scroll') != '' ) { ?>
									<img class="logo-scroll" src="<?php echo engitech_get_option('logo_scroll') ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								<?php } ?>
							</a>
						</div>
					</div>
					<div class="octf-col menu-col">
						<nav id="site-navigation" class="main-navigation">			
							<?php
								$active_mmenu = in_array('ot_mega-menu/ot_mega-menu.php', apply_filters('active_plugins', get_option('active_plugins')));
								$primary = array(
									'theme_location' => 'primary',
									'menu_id'        => 'primary-menu',
									'container'      => 'ul',
    								'fallback_cb'    => '__return_empty_string', 
    								'walker'         => $active_mmenu ? new \Ot_Mega_Menu_Walker() : '',
								);
								if ( has_nav_menu( 'primary' ) ) {
				                    wp_nav_menu( $primary );
				                }
							?>
						</nav><!-- #site-navigation -->
					</div>
					<?php if ( engitech_get_option('search_switch') || engitech_get_option('header_cta_switch') || engitech_get_option('cart_switch') || engitech_get_option('contact_switch') ){ ?>
					<div class="octf-col cta-col text-right">
						<!-- Call To Action -->
						<div class="octf-btn-cta">

							<?php if ( engitech_get_option('cart_switch') == true && class_exists( 'woocommerce' ) ){ ?>
								<div class="octf-header-module cart-btn-hover">
									<div class="h-cart-btn octf-cta-icons">
										<a class="cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'engitech' ); ?>"><i class="flaticon-shopper"></i> <span class="count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
										</a>	
									</div>	
									<?php if( !is_cart() && !is_checkout() ) { ?>
									<div class="site-header-cart">
										<?php the_widget( 'WC_Widget_Cart', array( 'title' => '' ) ); ?>
									</div>	
									<?php } ?>
								</div>
							<?php } ?>

							<?php if ( engitech_get_option('search_switch') ){ ?>
							<div class="octf-header-module">
								<div class="toggle_search octf-cta-icons">
									<i class="flaticon-search"></i>
								</div>
								<!-- Form Search on Header -->
								<div class="h-search-form-field">
									<div class="h-search-form-inner">
										<?php get_search_form(); ?>
									</div>									
								</div>
							</div>
							<?php } ?>

							<?php if ( engitech_get_option('contact_switch') ){ ?>
							<div class="octf-header-module">
								<div class="btn-cta-group contact-header">
									<i class="<?php echo esc_attr( engitech_get_option('contact_icon') ); ?>"></i>
									<div class="cinfo-header">
										<span><?php echo wp_specialchars_decode( engitech_get_option('contact_text') ); ?></span>
										<span class="main-text"><?php echo wp_specialchars_decode( engitech_get_option('contact_num') ); ?></span>
									</div>
								</div>
							</div>
							<?php } ?>

							<?php if ( engitech_get_option('header_cta_switch') ){ ?>
							<div class="octf-header-module">
								<div class="btn-cta-group btn-cta-header">
									<a class="octf-btn octf-btn-third" href="<?php echo esc_url_raw( engitech_get_option('cta_link_header') ); ?>"><?php echo engitech_get_option('cta_text_header'); ?></a>
								</div>
							</div>
							<?php } ?>

						</div>								
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>