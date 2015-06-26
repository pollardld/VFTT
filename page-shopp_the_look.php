<?php 
/*
* Template Name: Shopp The Look
*/
get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-shop_the_look' ); ?>

		<?php 

			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			
			$args = array(
				'post_type' => 'shop_the_look',
			   	'posts_per_page' => 24,
			   	'orderby' => 'menu_order date',
			   	'paged' => $paged
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>

				<div class="span8">
					
					<h1>Shopp The Look</h1>
				
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<article class="post-content span6">
							
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'shopp-the-look-thumb'); ?></a>

							<div class="post-tags">
								<h3><?php the_title(); ?></h3>
								<span><?php the_terms( $post->ID, 'topp_tags', '', ' ', '' ); ?></span>
							</div>

							<a class="look-link" href="<?php the_permalink(); ?>">SHOPP THE LOOK <?php include('img/arrow.svg'); ?></a>

							<?php 
								$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								$current_url = home_url(add_query_arg(array(),$wp->request));
							?>

							<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a>
							<a href="<?php echo $imgUrl; ?>" class="zoom"></a>

						</article>

					<?php endwhile; ?>

					<section class="pagination-container">
						<?php next_posts_link( '<div class="pagination-box">More</div>', $the_query->max_num_pages ); ?>
					</section>

					<?php wp_reset_postdata(); ?>

				</div>

			<?php endif; ?>

	</div>

<?php get_footer();