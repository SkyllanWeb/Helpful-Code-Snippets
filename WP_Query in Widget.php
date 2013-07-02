<?php if(pmpro_hasMembershipLevel(array(1,2))) { ?>

		<?php

		// The Query
		$the_query = new WP_Query( 'cat=2&posts_per_page=3' );
		
		echo '<h2>Latest Training Articles</h2>';
		echo '<ul>';
		// The Loop
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
		}
		echo '</ul>';
		/* Restore original Post Data 
		 * NB: Because we are using new WP_Query we aren't stomping on the 
		 * original $wp_query and it does not need to be reset.
		*/
		wp_reset_postdata();
		

		/* The 2nd Query (without global var) */
		$query2 = new WP_Query( 'cat=3&posts_per_page=3' );
		
		echo '<h2 class="2h2">Latest Training Videos</h2>';
		echo '<ul>';
		// The Loop
		while ( $query2->have_posts() ) {
			$query2->the_post();
			echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
		}
		echo '</ul>';
		// Restore original Post Data
		wp_reset_postdata();

		?>

<?php } else { ?>

		<?php if ( function_exists( 'useful_banner_manager_banners' ) ) { useful_banner_manager_banners( '6', 1 ); } ?>

<?php } ?>