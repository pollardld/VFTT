<aside class="span4">
	
	<section class="sidebar-content span9 sidebar-topp-posts">

		<h2>Recent Posts</h2>

		<hr />
		
		<?php
			
			$args = array(
				'post_type' => 'post',
			   	'post_per_page' => 12,
			   	'offset' => 1
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?> 

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<div>
						<a href="<?php the_permalink(); ?>">
							<?php 
								$title = get_the_title();
								
								if ( strlen( $title ) > 100 ) {
									$titleSubString = substr( $title, 0, 97 ); 
									echo $titleSubString . ' ...';
								} else {
									echo $title;
								}
							?>
						</a>
					</div>

				<?php endwhile;

				wp_reset_postdata(); ?>

			<?php endif; ?>


	</section>

	<?php 
		
	$ads = get_field( 'advertisements' );

	if ( $ads ) :?>

		<section class="span9 sidebar-ads">

			<?php foreach( $ads as $ad ) :

				$source = get_field( 'source', $ad['id'] ); ?>

				<a href="<?php echo $source; ?>" target="_blank" class="ad-link">
					<img src="<?php echo $ad['sizes']['medium'] ?>" />
				</a>
				
		
			<?php endforeach; ?>

		</section>

	<?php endif; ?>

</aside>