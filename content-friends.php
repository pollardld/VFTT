<h1>Friends</h1>

<div class="friends-container">

	<?php 

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		// WP Query
		$friendsArgs = array(
			'post_type' => 'friends',
			'posts_per_page' => 6,
			'paged' => $paged
		);

		$friendsQuery = new WP_Query( $friendsArgs );

		if ( $friendsQuery->have_posts() ) : while ( $friendsQuery->have_posts() ) : $friendsQuery->the_post(); ?>
	
			<div class="span6 friends-post">
				<div class="friends-img-wrap">
					<?php the_post_thumbnail( 'topp-link-thumb' ); ?>
				</div>
				<h3><?php the_title();?></h3>
	    		<a href="<?php the_field('source'); ?>" title="<?php the_title();?>" class="look-link" target="_blank">VISIT WEBSITE <?php include('img/arrow.svg'); ?></a>
		    </div>
		
		<?php endwhile; ?>

		<?php wp_reset_query(); ?>

		<?php endif; ?>

</div>

<section class="modal-nav">
	<a data-posts="-6" href="#friendspage" class="more-friends back-friends" style="display: none;">Back</a>
	<a data-posts="6" href="#friendspage" class="more-friends forward-friends">More</a>
</section>