<?php get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-search' ); ?>
		
		<?php if ( have_posts() ) : ?>

			<div class="span8">

				<h1><?php printf( __( 'Search Results for "%s"', 'twentyfourteen' ), get_search_query() ); ?></h1>
					
				<section class="isotope" data-isotope-options="{ itemSelector: '.item' }">

					<article class="sizer">&nbsp;</article>
			
					<?php while ( have_posts() ) : the_post(); ?>

						<article class="item">

							<?php $thePostType = get_post_type( get_the_ID() ); ?>

							<?php if ( $thePostType == 'inspired_by' || $thePostType == 'obsessing_over' ) : ?>

								<a href="<?php the_field('source'); ?>" target="_blank">
									<?php the_post_thumbnail( 'featured-image'); ?>
								</a>

							<?php elseif ( $thePostType == 'topp_links' ) : ?>

								<a href="<?php the_field( 'source' ); ?>" target="_blank">
									<?php the_post_thumbnail( 'topp-link-thumb' ); ?>
								</a>

							<?php elseif ( $thePostType == 'shop_the_look' ) : ?>

								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'featured-image'); ?>
								</a>

							<?php else : ?>

								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'featured-image'); ?>
								</a>

								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

							<?php endif; ?>

						</article>

					<?php endwhile; ?>

				</section>

			</div>

		<?php else :

			get_template_part( 'content', 'none' );

		endif; ?>

	</div>

<?php get_footer();