<?php get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-obsessing_over' ); ?>

		<?php 

			if ( have_posts() ) : ?>

				<div class="span8">
					
					<h1><?php single_term_title(); ?></h1>

					<section class="isotope" data-isotope-options="{ itemSelector: '.item' }">

						<article class="sizer">&nbsp;</article>
				
						<?php while ( have_posts() ) : the_post(); ?>

							<article class="item">

								<?php the_post_thumbnail( 'featured-image'); ?>

								<div class="post-tags">
									<span class="border-bottom">Obsessing Over</span>
									<h3><?php the_terms( $post->ID, 'brands', '', ' ', '' ); ?></h3>
									<h5><?php the_title(); ?></h5>
									<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">SHOPP <?php include('img/arrow.svg'); ?></a>
								</div>

							</article>

						<?php endwhile; ?>

					</section>

				</div>

			<?php endif; ?>

	</div>

<?php get_footer();