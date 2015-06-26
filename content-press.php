<h1>Press</h1>

<div class="press-container">

	<?php 

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		// WP Query
		$pressArgs = array(
			'post_type' => 'press',
			'posts_per_page' => 6,
			'paged' => $paged
		);

		$pressQuery = new WP_Query( $pressArgs );

		if ( $pressQuery->have_posts() ) : while ( $pressQuery->have_posts() ) : $pressQuery->the_post(); ?>
	
			<div class="span6 press-post">
				<div class="press-thumb">
					<?php the_post_thumbnail( 'similar-thumb' ); ?>
				</div>
				<p><?php the_title();?></p>
		    	<a href="<?php the_field('source'); ?>" title="<?php the_title();?>" class="look-link" target="_blank">VIEW POST <?php include('img/arrow.svg'); ?></a>
		    </div>
		
		<?php endwhile; ?>

		<?php wp_reset_query(); ?>

		<?php endif; ?>

</div>

<section class="modal-nav">
	<a data-posts="-6" href="#presspage" class="more back" style="display: none;">Back</a>
	<a data-posts="6" href="#presspage" class="more forward">More</a>
</section>