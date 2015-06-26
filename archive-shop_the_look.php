<?php get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-shop_the_look' ); ?>

		<?php 

			if ( have_posts() ) : ?>

				<div class="span8">
					
					<h1>Shopp The Look</h1>
				
					<?php while ( have_posts() ) : the_post(); ?>

						<article class="post-content">
							
							<?php the_post_thumbnail( 'shopp-the-look-thumb' ); ?>

							<div class="post-tags">
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<span><?php the_terms( $post->ID, 'topp_tags', '', ' ', '' ); ?></span>
							</div>

							<a class="look-link" href="<?php the_permalink(); ?>">SHOPP THE LOOK <?php include('img/arrow.svg'); ?></a>

						</article>

					<?php endwhile; ?>

				</div>

			<?php endif; ?>

	</div>

<?php get_footer();