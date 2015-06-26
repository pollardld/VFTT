<aside class="span4">
	<section class="span9 sidebar-topp-tags">
		
		<h2>Sources</h2>
		
		<hr />
		
		<?php

		$allCats = get_terms( 'topp_links_source', array (
			'orderby' => 'count',
			'order' => 'DESC',
			'hide_empty' => true,
			'number' => 15
		));

		foreach( $allCats as $cat ) : 
		?>
			
			<div>
				<a href="<?php echo get_term_link( $cat ); ?>"><?php echo $cat->name; ?></a>
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