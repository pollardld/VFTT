<div class="span8 no-results">

	<h1><?php printf( __( 'Search Results for "%s"', 'twentyfourteen' ), get_search_query() ); ?></h1>

	<br />

	<p><?php printf( __( 'No search results for "%s"', 'twentyfourteen' ), get_search_query() ); ?></p>

	<section>
		
		<h5>Try another search</h5>
		
		<?php get_search_form(); ?>
	
	</section>

</div>