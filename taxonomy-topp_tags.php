<?php get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-shop_the_look' ); ?>

		<?php 

			if ( have_posts() ) : ?>

				<div class="span8">
					
					<h1><?php single_term_title(); ?></h1>
				
					<?php while ( have_posts() ) : the_post(); ?>

						<article class="post-content">
							
							<?php the_post_thumbnail( 'medium' ); ?>

							<div class="post-tags">
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
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

				</div>

			<?php endif; ?>

	</div>

<?php get_footer();