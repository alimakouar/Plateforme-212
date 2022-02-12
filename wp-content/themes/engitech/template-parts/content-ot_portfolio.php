<?php 
	$termsArray = get_the_terms( $post->ID, "portfolio_cat" );  //Get the terms for this particular item
	$termsString = ""; //initialize the string that will contain the terms
	foreach ( $termsArray as $term ) { // for each term 
		$termsString .= $term->slug.' '; //create a string that has all the slugs 
	}
?> 
<div class="<?php echo $termsString; ?> project-item">
	<div class="projects-box">
		<div class="projects-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php
					if ( has_post_thumbnail() ) {
						if( engitech_get_option('portfolio_style') == 'style2' ){
							the_post_thumbnail( 'engitech-portfolio-thumbnail-masonry');
						}else {
							the_post_thumbnail( 'engitech-portfolio-thumbnail-grid');
						}
					}
				?>
			</a>
		</div>
		<div class="portfolio-info">
			<a class="overlay" href="<?php the_permalink(); ?>"></a>
			<div class="portfolio-info-inner">
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<?php 
					$terms = get_the_terms( get_the_ID(), 'portfolio_cat' );	
					if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) :
						echo '<p class="portfolio-cates">';	 
					    foreach ( $terms as $term ) {
					    	// The $term is an object, so we don't need to specify the $taxonomy.
			    			$term_link = get_term_link( $term );
			    			// If there was an error, continue to the next term.
						    if ( is_wp_error( $term_link ) ) {
						        continue;
						    }
					        // We successfully got a link. Print it out.
			    			echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a><span>/</span>';
					    }		                         
					    
						echo '</p>';    
					endif; 
				?> 
			</div>
		</div>
	</div>
</div>