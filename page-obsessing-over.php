<?php 
/*
* Template Name: Obsessing Over
*/
get_header(); ?>

	<div class="main spread stuck-child">

		<?php get_template_part( 'content', 'sidebar-obsessing_over' ); ?>

		<?php 

			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			$args = array(
				'post_type' => 'obsessing_over',
				'posts_per_page' => 24,
			   	'orderby' => 'menu_order date',
			   	'paged' => $paged
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>

				<div class="span8">
					
					<h1 class="stuck behind"><?php the_title(); ?></h1>

					<section class="isotope" data-isotope-options="{ itemSelector: '.item' }">

						<article class="sizer">&nbsp;</article>

						<div class="items infinite">
				
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<article class="item infinite-item">

									<?php the_post_thumbnail( 'featured-image'); ?>

									<div class="post-tags">
										<?php 
											$terms = get_the_terms( $post->ID, 'brands' );

											if ( $terms ) {
												foreach ( $terms as $term ) {
		            								$term_link = get_term_link( $term, 'brands' );
										            echo '<a href="' . $term_link . '" class="tax-filter" rel="brands" title="' . $term->slug . '"><span class="border-bottom">' . $term->name . '</span></a>';
										    	}; 
										    }
								    	?>
										<h3><?php the_title(); ?></h3>
										<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">SHOPP <?php include('img/arrow.svg'); ?></a>
									</div>

									<?php 
										$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
										$current_url = home_url(add_query_arg(array(),$wp->request));
									?>

									<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a>
									<a href="<?php echo $imgUrl; ?>" class="zoom"></a>

								</article>

							<?php endwhile; ?>

						</div>

					</section>

					<section class="pagination-container nav-next clear infinite-item">
						<?php next_posts_link( '', $the_query->max_num_pages ); ?>
					</section>

				</div>
						
				<?php wp_reset_postdata(); ?>

			<?php endif; ?>			

	</div>

<?php get_footer();