<aside class="span4">
	<section class="span9 sidebar-topp-tags">
		
		<h2>Topp Tags</h2>
		
		<hr />
		
		<?php

		$allTags = get_terms( 'topp_tags', array (
			'orderby' => 'count',
			'order' => 'DESC',
			'hide_empty' => true,
			'number' => 15
		));

		foreach( $allTags as $term ) : 
		?>
			
			<div>
				<a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
			</div>

		<?php endforeach; ?>

	</section>

	<section class="span9 search-looks sidebar-search">
			
		<h2>Search</h2>
		<h2>Shopp the Look</h2>

		<form role="search" method="get" class="search-form" action="/">
			<input type="search" name="s" title="Search for:" />
			<input type="hidden" name="post_type" value="shop_the_look" />
			<input type="submit" class="search-submit" value="Search" />
		</form>
			
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