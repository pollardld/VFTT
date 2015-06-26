<?php 
/*
* Template Name: Topp Links
*/
get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-topp_links' ); ?>

		<?php 

			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			$args = array(
				'post_type' => 'topp_links',
			   	'posts_per_page' => 12,
			   	'order' => 'DESC',
			   	'paged' => $paged
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>

				<div class="span8">
					
					<h1><?php the_title(); ?></h1>

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<article class="span4 topp-link-content">
							
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

					<section class="pagination-container clear">
						<?php next_posts_link( '<div class="pagination-box">More</div>', $the_query->max_num_pages ); ?>
					</section>

					<?php wp_reset_postdata(); ?>
				
				</div>

			<?php endif; ?>

	</div>

<?php get_footer();