<?php get_header(); ?>

	<div class="main spread stuck-child">

		<?php get_template_part( 'content', 'sidebar-inspired_by' ); ?>

		<div class="span8 single-inspiration">
					
			<h1 class="stuck behind"><?php the_title(); ?></h1>
		
			<?php while ( have_posts() ) : the_post(); ?>

				<article class="item">

					<?php the_post_thumbnail( 'medium' ); ?>

					<div class="post-tags">
						<span class="border-bottom">Inspired By</span>
						<h3><?php the_title(); ?></h3>
						<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">SOURCE <?php include('img/arrow.svg'); ?></a>
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

	</div>

<?php get_footer();