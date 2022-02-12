<?php
/**
 *
 * Template Name: Checkout & Cart Page
 * Description: A Page Template with a design.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Engitech
 */

get_header();
?>
    
<div class="entry-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-12">
                <main id="main" class="site-main">

                <?php
                while ( have_posts() ) : the_post();

                    the_content();

                endwhile; // End of the loop.
                ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
</div>

<?php
get_footer();