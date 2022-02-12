<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Engitech
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
    <div class="post-inner">
        <div class="inner-post">
            <div class="entry-header">

                <?php if ( 'post' === get_post_type() ) : if( engitech_get_option( 'post_entry_meta' ) ) { ?>
                <div class="entry-meta">
                    <?php engitech_post_meta(); ?>
                </div><!-- .entry-meta -->
                <?php } endif; ?>

                <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

            </div><!-- .entry-header -->

            <div class="entry-summary the-excerpt">

                <?php the_excerpt(); ?>

            </div><!-- .entry-content -->
            <div class="btn-readmore">
                <?php if(engitech_get_option('blog_read_more')){ ?><a href="<?php the_permalink(); ?>"><i class="flaticon-right-arrow-1"></i> <?php echo esc_html(engitech_get_option('blog_read_more')); ?></a><?php } ?>
            </div>
        </div>
    </div>
</article>
