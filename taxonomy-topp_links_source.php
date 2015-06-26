<?php get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-topp_links' ); ?>

		<?php 

			if ( have_posts() ) : ?>

				<div class="span8">
					
					<h1><?php single_term_title(); ?></h1>
				
						<?php while ( have_posts() ) : the_post(); ?>

							<article class="topp-link-content span6">
							
								<?php the_post_thumbnail( 'topp-link-thumb' ); ?>

								<span><?php the_title(); ?></span>
									
								<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">
									<?php 
										$term_list = wp_get_post_terms($post->ID, 'topp_links_source', array("fields" => "names"));
										echo $term_list[0];
									?>
									<?php include('img/arrow.svg'); ?>
								</a>

							</article>

						<?php endwhile; ?>

				</div>

			<?php endif; ?>

	</div>

<?php get_footer();