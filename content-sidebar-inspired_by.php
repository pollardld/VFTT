<aside class="span4">
	
	<section class="sidebar-content span9 sidebar-inspired-by">
		
		<h2>Categories</h2>
		
		<hr />
		
		<?php

		$inspirationCats = get_terms( 'inspired_by_category', array (
			'orderby' => 'title',
			'order' => 'ASC',
			'hide_empty' => true,
			'number' => 12
		));

		foreach( $inspirationCats as $category ) : ?>
			
			<div>
				<a href="<?php echo get_term_link( $category ); ?>"><?php echo $category->name; ?></a>
			</div>

		<?php endforeach; ?>

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