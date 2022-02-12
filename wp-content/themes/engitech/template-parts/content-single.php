<?php
/**
 * Template part for displaying single post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Engitech
 */

?>

<?php                                                     
    $format = get_post_format();
    $link_video  = get_post_meta(get_the_ID(),'post_video', true);
    $link_audio  = get_post_meta(get_the_ID(),'post_audio', true);
    $link_link   = get_post_meta(get_the_ID(),'post_link', true);
    $text_link   = get_post_meta(get_the_ID(),'text_link', true);
    $quote_text  = get_post_meta(get_the_ID(),'post_quote', true);
    $quote_name  = get_post_meta(get_the_ID(),'quote_name', true);
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post post-box'); ?>>
    <?php if( $format == 'gallery' ) { ?>

            <div class="entry-media">
                <?php engitech_posted_in(); ?>
                <div class="gallery-post">
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                    <?php $images = rwmb_meta( 'post_gallery', array( 'size' => 'full' ) ); ?>
                    <?php if($images){ ?>              
                        <?php foreach ( $images as $image ) {  ?>                           
                            <div>
                                <div class="item-image">
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="<?php echo esc_attr( $image['width'] ); ?>" height="<?php echo esc_attr( $image['height'] ); ?>">
                                </div>
                            </div>
                        <?php } ?>                
                    <?php } ?>
                <?php } ?>
                </div>
            </div>          

        <?php }elseif( $format == 'image' ) { ?>

            <div class="entry-media">
                <?php engitech_posted_in(); ?>
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                    <?php $images = rwmb_meta( 'post_image', array( 'size' => 'full' ) ); ?>
                    <?php if($images){ ?>              
                        <?php foreach ( $images as $image ) {  ?>                           
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="<?php echo esc_attr( $image['width'] ); ?>" height="<?php echo esc_attr( $image['height'] ); ?>">
                        <?php } ?>                
                    <?php } ?>
                <?php } ?>
            </div>
            
        <?php }elseif( $format == 'audio' ){ ?>
            <div class="entry-media">
                <?php engitech_posted_in(); ?>
            </div>
            <div class="audio-box padding-box">
                <iframe scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
            </div>

        <?php }elseif( $format == 'video' ){ ?>

            <div class="entry-media">
                <?php engitech_posted_in(); ?>
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                    <?php $images = rwmb_meta( 'bg_video', array( 'size' => 'full' ) ); ?>
                    <?php if($images){ ?>             
                        <a class="btn-play" href="<?php echo esc_url( $link_video ); ?>">
                            <i class="flaticon-play"></i>
                        </a> 
                        <?php foreach ( $images as $image ) {  ?>
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="<?php echo esc_attr( $image['width'] ); ?>" height="<?php echo esc_attr( $image['height'] ); ?>">
                        <?php } ?>                
                    <?php } ?>
                <?php } ?>
            </div>

        <?php }elseif( $format == 'link' ){ ?>
            <div class="entry-media">
                <?php engitech_posted_in(); ?>
            </div>
            <div class="link-box padding-box">
                <i class="flaticon-chain"></i>
                <a href="<?php echo esc_url( $link_link ); ?>"><?php echo esc_html( $text_link ); ?></a>
            </div>

        <?php }elseif( $format == 'quote' ){ ?>
            <div class="entry-media">
                <?php engitech_posted_in(); ?>
            </div>
            <div class="quote-box padding-box font-second">
                <i class="flaticon-edit-tools-1"></i>
                <div class="quote-text">
                    <?php echo esc_html( $quote_text ); ?>
                    <span><?php echo esc_html( $quote_name ); ?></span>
                </div>
            </div>

        <?php }elseif ( has_post_thumbnail() ) { ?>

            <div class="entry-media">
                <?php engitech_posted_in(); ?>
                <?php the_post_thumbnail(); ?>
            </div>
            
        <?php }else{ ?>
            
            <div class="entry-media">
                <?php engitech_posted_in(); ?>
            </div>

        <?php } ?>
    <div class="inner-post">
        <header class="entry-header">

            <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php engitech_post_meta(); ?>
            </div><!-- .entry-meta -->
            <?php endif; ?>

            <?php if( engitech_get_option( 'ptitle_post' ) ) the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        </header><!-- .entry-header -->

        <div class="entry-summary">

            <?php

                the_content(sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'engitech'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ));

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'engitech'),
                    'after' => '</div>',
                ));
            ?>

        </div><!-- .entry-content -->
        <div class="entry-footer clearfix">
            <?php engitech_entry_footer(); ?>
        </div>
        <?php if( engitech_get_option('post_socials') ) engitech_socials_share(); ?>
        <?php if( engitech_get_option('author_box') ) engitech_author_info_box(); ?>
        <?php if( engitech_get_option('post_nav') ) engitech_single_post_nav(); ?>
    </div>
</article>
