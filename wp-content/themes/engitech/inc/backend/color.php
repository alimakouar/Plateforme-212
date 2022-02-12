<?php 

//Custom Style Frontend
if(!function_exists('engitech_color_scheme')){
    function engitech_color_scheme(){
        $color_scheme = '';

        //Main Color
        if( engitech_get_option('main_color') != '#43baff' || engitech_get_option('second_color') != '#7141b1' ){
            $color_scheme = 
            '
        /****Main Color****/

        	/*Background Color*/
            .bg-primary,
            .octf-btn,
            .octf-btn.octf-btn-second:hover, .octf-btn.octf-btn-second:focus,
            .main-navigation > ul > li:before,
            .cart-icon .count,
            .post-box .post-cat a,
            .post-box .btn-play:hover i,
            .page-pagination li span, .page-pagination li a:hover,
            .blog-post .share-post a,
            .post-nav a:before,
            .widget-area .widget .widget-title:before,
            .search-form .search-submit,
            .icon-box-s2.s2:after,
            .tech-box:hover,
            .ot-image-box:after,
            .service-box .icon-main,
            .serv-box-2:hover .icon-main,
            .project-slider .projects-box:hover .portfolio-info .btn-link,
            .project-slider .slick-arrow:hover,
            .ot-counter h6:before,
            .ot-progress .progress-bar,
            .video-popup a:hover,
            .ot-tabs .tab-link,
            .ot-tabs .tab-link.current, .ot-tabs .tab-link:hover,
            .ot-industries .indus-item .item-inner .overlay:after,
            .mc4wp-form-fields .subscribe-inner-form .subscribe-btn-icon{background:'.engitech_get_option('main_color').';}

            /*Border Color*/
            .post-box .btn-play:hover:before, .post-box .btn-play:hover:after,
            .page-pagination li span, .page-pagination li a:hover,
            .tech-box:hover,
            .video-popup a:hover span{border-color:'.engitech_get_option('main_color').';}

            /*Color*/
            .text-primary,
            .slick-arrow:not(.slick-disabled):hover,
            .btn-details,
            .btn-details:visited,
            a:hover, a:focus, a:active,
            .header-topbar a:hover,
            .extra-text a,
            .header-style-3 .header-topbar a:hover,
            .main-navigation ul > li > a:hover,
            .main-navigation ul li li a:before,
            .main-navigation ul li li a:hover,.main-navigation ul ul li.current-menu-item > a,.main-navigation ul ul li.current-menu-ancestor > a,
            .main-navigation ul > li.menu-item-has-children > a:hover:after,
            .octf-btn-cta .contact-header i,
            .header-style-3 .main-navigation ul.menu > li > a:hover,.header-style-3 .octf-btn-cta .octf-cta-icons i:hover,
            .header_mobile .mobile_nav .mobile_mainmenu li li a:hover,.header_mobile .mobile_nav .mobile_mainmenu ul > li > ul > li.current-menu-ancestor > a,
            .header_mobile .mobile_nav .mobile_mainmenu > li > a:hover, .header_mobile .mobile_nav .mobile_mainmenu > li.current-menu-item > a,.header_mobile .mobile_nav .mobile_mainmenu > li.current-menu-ancestor > a,
            .page-header,
            .page-header .breadcrumbs li:before,
            .post-box .entry-meta a:hover,
            .post-box .link-box a:hover,
            .post-box .btn-play i,
            .post-box .btn-readmore > a,
            .blog-post .author-bio .author-info .author-socials a:hover,
            .drop-cap span,
            .comments-area .comment-item .comment-meta .comment-reply-link,
            .comment-respond .comment-reply-title small a:hover,
            .icon-box-s2 .content-box h5 a:hover,
            .project-slider .projects-box .portfolio-info .btn-link i,
            .contact-info i,
            .ot-accordions .acc-item .acc-toggle:hover,
            .ot-accordions .acc-item.current .acc-toggle,
            .ot-accordions .acc-item.current .acc-toggle i,
            .ot-counter h6,
            .ot-counter2 .s-num,
            .team-wrap .team-social a:hover,
            .ot-pricing-table .inner-table h2,
            .ot-pricing-table .inner-table .details ul li.active:before,
            .ot-countdown li.seperator,
            .video-popup a,
            .dc-text .elementor-drop-cap span,
            .footer-menu ul li a:hover,
            .mc4wp-form-fields .subscribe-inner-form .subscribe-btn-icon:hover,
            #back-to-top{color: '.engitech_get_option('main_color').';}

            .wpcf7 .main-form{background-image: linear-gradient(90deg,'.engitech_get_option('main_color').' 0%,'.engitech_get_option('second_color').' 100%);}
			

		/****Second Color****/
        
		    /*Background Color*/
                  .bg-second,
                  .octf-btn:hover, .octf-btn:focus,
                  .octf-btn.octf-btn-second,
                  .octf-btn.octf-btn-second:visited,
                  .post-box .post-cat a:hover,
                  .blog-post .tagcloud a:hover,
                  .widget .tagcloud a:hover,
                  .search-form .search-submit:hover,
                  .icon-box-s1 .line-box:after,
                  .project_filters li a:after,
                  .ot-tabs .tab-link:hover, .ot-tabs .tab-link:focus,
                  .wpcf7 .main-form button:hover{background:'.engitech_get_option('second_color').';}

                  /*Color*/
                  blockquote:before,
                  .text-second,
                  .slick-dots li.slick-active button:before,
                  a,
                  a:visited,
                  .post-box .entry-meta,
                  .post-box .entry-meta a,
                  .post-box .link-box i,
                  .post-box .quote-box i,
                  .comment-form .logged-in-as a:hover,
                  .widget-area .widget ul:not(.recent-news) > li a:hover,
                  .widget-area .widget_categories ul li a:before,.widget-area .widget_product_categories ul li a:before,.widget-area .widget_archive ul li a:before,
                  .widget-area .widget_categories ul li a:hover,.widget-area .widget_product_categories ul li a:hover,.widget-area .widget_archive ul li a:hover,
                  .widget-area .widget_categories ul li a:hover + span,.widget-area .widget_product_categories ul li a:hover + span,.widget-area .widget_archive ul li a:hover + span,
                  .widget .recent-news h6 a:hover,
                  .ot-heading > span,
                  .icon-box-s1 .icon-main,
                  .icon-box-s2.s1 .icon-main, .icon-box-s2.s3 .icon-main,
                  .icon-box-s2.s2 .icon-main,
                  .serv-box .content-box ul li a:before,
                  .serv-box .content-box ul li:hover a, .serv-box .content-box ul li.active a,
                  .project_filters li a:hover, .project_filters li a.selected,
                  .ot-pricing-table .octf-btn:hover,
                  .dc-text.dc-text-second .elementor-drop-cap span{color: '.engitech_get_option('second_color').';}

			';
        }

        if(! empty($color_scheme)){
			echo '<style type="text/css">'.$color_scheme.'</style>';
		}
    }
}
add_action('wp_head', 'engitech_color_scheme');

//Custom Second Font
if(!function_exists('engitech_second_font')){
      function engitech_second_font(){
            $value = engitech_get_option( 'second_font', [] );

            if ( !empty( $value['font-family'] ) && $value['font-family'] != 'Montserrat' ) {
            $second_font = 
            'h1, h2, h3, h4, h5, h6,
            blockquote,
            .font-second,
            .topbar_languages select,
            .octf-btn-cta .contact-header span.main-text, .octf-btn-cta .contact-header span a,
            .post-box .post-cat a,
            .post-box .entry-meta,
            .post-box .link-box a,
            .post-box .quote-box .quote-text,
            .blog-post .share-post a,
            .drop-cap,
            .comment-form .logged-in-as,
            .service-box .big-number,
            .serv-box-2 .big-number,
            .ot-accordions .acc-item .acc-toggle,
            .support-box .number-box,
            .ot-counter,
            .ot-counter2 .s-num,
            .ot-counter2 .b-num,
            .circle-progress .inner-bar > span,
            .ot-countdown li span,
            .video-popup > span,
            .dc-text .elementor-drop-cap,
            div.elementor-widget-heading.elementor-widget-heading .elementor-heading-title,
            .footer-menu ul li a,
            .woocommerce ul.products li.product, .woocommerce-page ul.products li.product,
            .woocommerce table.shop_table,
            .woocommerce .quantity .qty,
            .cart_totals h2,
            #add_payment_method .cart-collaterals .cart_totals table td, 
            #add_payment_method .cart-collaterals .cart_totals table th,
            .woocommerce-cart .cart-collaterals .cart_totals table td, 
            .woocommerce-cart .cart-collaterals .cart_totals table th,
            .woocommerce-checkout .cart-collaterals .cart_totals table td,
            .woocommerce-checkout .cart-collaterals .cart_totals table th,
            .woocommerce ul.product_list_widget li a:not(.remove),
            .woocommerce .widget_shopping_cart .cart_list .quantity,
            .woocommerce .widget_shopping_cart .total strong,
            .woocommerce.widget_shopping_cart .total strong,
            .woocommerce .widget_shopping_cart .total .woocommerce-Price-amount,
            .woocommerce.widget_shopping_cart .total .woocommerce-Price-amount,
            .woocommerce .woocommerce-widget-layered-nav-list,
            .woocommerce .widget_price_filter .price_slider_amount,
            .woocommerce .widget_price_filter .price_slider_amount button.button,
            .product_meta > span,
            .woocommerce div.product .entry-summary p.price,
            .woocommerce div.product .entry-summary span.price{font-family: '.sprintf( $value['font-family'] ).';}
            ';
            }

            if(! empty($second_font)){
                  echo '<style id="engitech-inline-styles" type="text/css">'.$second_font.'</style>';
            }
      }
}
add_action('wp_head', 'engitech_second_font');