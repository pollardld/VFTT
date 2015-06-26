<aside class="span4">
	<section class="span9 obsessing-over-sidebar obsessing-over-sidebar-one">
		
		<h2>Categories</h2>
		
		<hr />
		
		<?php obsessing_filter(); ?>

	</section>

	<section class="span9 obsessing-over-sidebar obsessing-over-sidebar-two">
		
		<h2>Brands</h2>
		
		<hr />
		
		<?php brands_filter(); ?>

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