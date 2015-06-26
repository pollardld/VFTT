<aside class="span4">
	<section class="sidebar-content span9">
		<h2>Post Your</h2>
		<h2>View</h2>
		<hr />
		<p>TAG YOUR PHOTOS</p>
		<h3>#VIEWFROMTHETOPP</h3>
		<p>TO BE FEATURED!</p>
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