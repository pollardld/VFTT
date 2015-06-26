<?php get_header(); ?>

	<div class="main spread">

		<?php 
			if ( have_posts() ) :
				
				get_template_part( 'content', 'sidebar' );
				
				while ( have_posts() ) : the_post(); ?>

					<div class="span8">
						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>
					</div>

				<?php 
				endwhile;

			endif;
		?>

	</div>

<?php get_footer();